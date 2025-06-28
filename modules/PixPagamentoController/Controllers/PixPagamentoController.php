<?php

namespace Modules\PixPagamentoController\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PixPagamentoController extends Controller
{

    public string $accessToken_public = env("MERCADO_PAGO_SANDBOX_ACCESS_TOKEN");
    public function index()
    {
        return view('PixPagamentoController::hello');
    }

    
    public function gerarPix(Request $request)
    {
        try {
            // Recupera o token do Mercado Pago do arquivo .env
            $accessToken = $this->accessToken_public;

            if (!$accessToken) {
                throw new \Exception('Token de acesso do Mercado Pago não configurado.');
            }

            // Recupera o usuário autenticado
            $user = Auth::user();

            if (!$user) {
                throw new \Exception('Usuário não autenticado.');
            }

            // Monta os dados da requisição
            $data = [
                "transaction_amount" => (float) $request->input('valor', 10.00),
                "description" => "Pagamento via PIX",
                "payment_method_id" => "pix",
                "external_reference" => $user->id,
                "payer" => [
                    "email" => $user->email,
                    "first_name" => $user->name,
                    "last_name" => $user->familiname ?? '',
                    "identification" => [
                        "type" => "CPF",
                        "number" => preg_replace('/\D/', '', $user->CPF ?? '')
                    ]
                ]
            ];

            // Inicia a requisição cURL
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.mercadopago.com/v1/payments",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer {$accessToken}",
                    "Content-Type: application/json"
                ],
                CURLOPT_POSTFIELDS => json_encode($data),
            ]);

            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if (curl_errno($curl)) {
                $error = curl_error($curl);
                curl_close($curl);
                throw new \Exception($error);
            }

            curl_close($curl);

            if ($httpcode != 201 && $httpcode != 200) {
                $errorData = json_decode($response, true);
                $message = $errorData['message'] ?? ($errorData['error'] ?? 'Erro desconhecido ao criar pagamento');
                throw new \Exception($message);
            }

            $payment = json_decode($response);
            // Salva o ID do pagamento no campo id_pagamento_mp do usuário
            // Atualiza o usuário autenticado antes de salvar o id_pagamento_mp
            $user = User::find(Auth::id());
            if ($user) {
                $user->id_pagamento_mp = $payment->id ?? null;
                $user->save();
            }
            

            // Retorna a view com os dados do QR Code
            return view('pix', [
                'qr_code_base64' => $payment->point_of_interaction->transaction_data->qr_code_base64 ?? null,
                'qr_code_texto' => $payment->point_of_interaction->transaction_data->qr_code ?? null,
                'id_pagamento' => $payment->id ?? null,
                'status' => $payment->status ?? null,
            ]);
        } catch (\Exception $e) {
            return view('pix', [
                'erro' => 'Erro ao criar pagamento PIX',
                'mensagem' => $e->getMessage()
            ]);
        }
    }

 public function webhookPix(Request $request)
    {
        // Log da requisição recebida (opcional)
        Log::info('Webhook recebido:', $request->all());

        // Verifica se a estrutura esperada está presente
        if (!$request->has('data.id')) {
            Log::warning('Webhook sem data.id');
            return response()->json(['error' => 'data.id não fornecido'], 400);
        }

        $paymentId = $request->input('data.id');
        
        // Recupera o token do Mercado Pago do arquivo .env
        $accessToken = $this->accessToken_public;

        $url = "https://api.mercadopago.com/v1/payments/{$paymentId}";

        // Faz a requisição HTTP usando a Facade Http do Laravel
        $response = Http::withToken($accessToken)
            ->acceptJson()
            ->get($url);

        if (!$response->successful()) {
            Log::error("Erro ao consultar pagamento Mercado Pago: " . $response->body());
            return response()->json(['error' => 'Erro ao consultar o pagamento'], 500);
        }

        $pagamento = $response->json();

        // Verifica se o pagamento foi aprovado
        if (isset($pagamento['status']) && $pagamento['status'] === 'approved') {

            // Recupera o usuário via external_reference (ex: 'user_42')
            if (isset($pagamento['external_reference'])) {
                $ref = $pagamento['external_reference'];

                // Ex: 'user_42' => 42
                
                $user = User::where('id_pagamento_mp', $paymentId)->first();

                if ($user) {
                    $user->pagamento_pix = json_encode($pagamento, JSON_UNESCAPED_UNICODE);
                    $user->data_vencimento = Carbon::now()->addDays(30)->toDateString();
                    $user->is_blocked = false;
                    $user->save();

                    Log::info("Usuário com id_pagamento {$paymentId} atualizado com sucesso.");
                } else {
                    Log::warning("Usuário com external_reference {$ref} não encontrado.");
                }
            } else {
                Log::warning("Pagamento aprovado, mas sem external_reference.");
            }
        } else {
            Log::info("Pagamento {$paymentId} não aprovado. Status: " . ($pagamento['status'] ?? 'desconhecido'));
        }

        return response()->json(['message' => 'Webhook processado'], 200);
    }
}

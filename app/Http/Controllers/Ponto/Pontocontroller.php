<?php

namespace App\Http\Controllers\Ponto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartaoponto;
class Pontocontroller extends Controller
{
    public function index()
{

// Soma total de horas trabalhadas no período
    $totalHoras = Cartaoponto::sum('hora_trabalhadas');

    // Formata para exibir como 08:00 (opcional, só estética)
    $totalHorasFormatado = sprintf('%02d:00', $totalHoras);

    // Configurações do salário
    $salarioBase = 1730;

    // Calcula o valor da hora (baseado em 220 horas mensais padrão)
    $valorHora = $salarioBase / 220;

    // Salário bruto proporcional às horas
    $salarioBruto = $totalHoras * $valorHora;

    // 💰 INSS simplificado (você pode depois usar a tabela progressiva oficial)
    if ($salarioBruto <= 1412.00) {
        $inss = $salarioBruto * 0.075;
    } elseif ($salarioBruto <= 2666.68) {
        $inss = $salarioBruto * 0.09;
    } elseif ($salarioBruto <= 4000.03) {
        $inss = $salarioBruto * 0.12;
    } else {
        $inss = $salarioBruto * 0.14;
    }

    // Salário líquido após desconto do INSS
    $salarioLiquido = $salarioBruto - $inss;
      $pontos = Cartaoponto::all();  // ou paginate() se preferir paginação
    return view('ponto.create', compact('pontos',  'totalHorasFormatado',
        'salarioBruto',
        'inss',
        'salarioLiquido'));
    }

 public function store(Request $request)
    {
        // Validação dos dados enviados pelo formulário
        $validated = $request->validate([
            'data' => 'required|string',
            'dia_da_semana' => 'required|string',
            'hora_entrada' => 'nullable|string',
            'hora_entrada_almoco' => 'nullable|string',
            'hora_saida_almoco' => 'nullable|string',
            'hora_saida' => 'nullable|string',
            'hora_extra_entrada' => 'nullable|string',
            'hora_extra_saida' => 'nullable|string',
            'hora_trabalhadas' => 'required|string',
        ]);

        // Criação do registro no banco de dados
        Cartaoponto::create($validated);

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('ponto.index')->with('success', 'Registro de ponto salvo com sucesso!');
    }
}

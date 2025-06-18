<?php

namespace Modules\TesteNeurodivergencia\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TesteNeurodivergencia\Models\TesteNeurodivergencia;
use Barryvdh\DomPDF\Facade\Pdf;

class TesteNeurodivergenciaController extends Controller
{
    public function __construct()
{
    view()->addNamespace('TesteNeurodivergencia', base_path('modules/TesteNeurodivergencia/Views'));
}
    public function index()
    {
        return view('TesteNeurodivergencia::hello');
    }





   public function submitForm(Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'answers' => 'required|array',
    ]);

    // Inicializa as pontuações
    $scores = [
        'TDAH' => 0,
        'TEA' => 0,
        'TOD' => 0,
        'Processamento Sensorial' => 0,
        'Dislexia/Ansiedade Social' => 0,
    ];

    // Faz a contagem
    foreach ($data['answers'] as $key => $value) {
        $val = intval($value);

        if (str_contains($key, 'tdah')) $scores['TDAH'] += $val;
        if (str_contains($key, 'tea')) $scores['TEA'] += $val;
        if (str_contains($key, 'tod')) $scores['TOD'] += $val;
        if (str_contains($key, 'sensorial')) $scores['Processamento Sensorial'] += $val;
        if (str_contains($key, 'dislexia')) $scores['Dislexia/Ansiedade Social'] += $val;
    }

    arsort($scores);
    $result = array_key_first($scores); // Maior pontuação

    // Salva no banco
    $test = TesteNeurodivergencia::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'answers' => json_encode($data['answers']),
        'scores' => json_encode($scores),
        'diagnosis' => $result,
    ]);

    return view('TesteNeurodivergencia::result', [
        'test' => $test,
        'scores' => $scores,
        'result' => $result,
    ]);
}
  public function gerarPdf(Request $request)
{
    $data = $request->validate([
        'test' => 'required',
        'scores' => 'required',
        'result' => 'required|string',
        'respostas' => 'required',
        'questions' => 'required',
    ]);

    // Passando os dados corretos para a view
    $pdf = Pdf::loadView('TesteNeurodivergencia::result', [
        'test' => json_decode($data['test']),
        'scores' => json_decode($data['scores'], true),
        'result' => $data['result'],
        'respostas' => json_decode($data['respostas'], true),
        'questions' => json_decode($data['questions'], true),
    ]);

    return $pdf->download('resultado_teste.pdf');
}
}

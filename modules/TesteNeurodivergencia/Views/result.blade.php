@extends('layouts.app')

@section('content')



@php
$questions = [
    'tdah1' => 'Você se distrai facilmente com sons, objetos ou estímulos ao redor?',
    'tdah2' => 'Tem dificuldade em manter o foco em tarefas longas ou monótonas?',
    'tdah3' => 'Perde objetos importantes com frequência (chaves, carteira, documentos)?',
    'tdah4' => 'Esquece compromissos, prazos ou tarefas rotineiras?',
    'tdah5' => 'Costuma começar tarefas e não concluir?',
    'tdah6' => 'Sente inquietação constante, como mexer mãos, pernas ou se remexer na cadeira?',
    'tdah7' => 'Interrompe ou fala por cima dos outros durante conversas?',
    'tdah8' => 'Tem dificuldade em esperar sua vez em filas ou conversas?',
    'tdah9' => 'Age por impulso, sem pensar nas consequências?',
    'tdah10' => 'Sente-se frequentemente sobrecarregado por ter muitas ideias ao mesmo tempo?',

    'tea1' => 'Tem dificuldade em entender ironias, piadas ou expressões não literais?',
    'tea2' => 'Prefere rotinas rígidas e se incomoda com mudanças inesperadas?',
    'tea3' => 'Tem dificuldade em manter contato visual durante conversas?',
    'tea4' => 'Prefere interagir mais com objetos ou atividades do que com pessoas?',
    'tea5' => 'Sente desconforto em situações sociais ou em grupos?',
    'tea6' => 'Costuma repetir movimentos (balançar, bater mãos, mexer objetos)?',
    'tea7' => 'Fala de forma muito literal ou monótona?',
    'tea8' => 'Tem hiperfoco em temas de interesse específico?',
    'tea9' => 'Sente desconforto com determinados sons, texturas, luzes ou cheiros?',
    'tea10' => 'Tem dificuldade em perceber ou entender emoções dos outros?',

    'tod1' => 'Fica irritado facilmente, mesmo por coisas pequenas?',
    'tod2' => 'Discute com adultos, autoridades ou figuras de liderança com frequência?',
    'tod3' => 'Recusa-se frequentemente a seguir regras ou pedidos?',
    'tod4' => 'Provoca intencionalmente outras pessoas?',
    'tod5' => 'Culpa os outros por seus próprios erros ou comportamentos?',
    'tod6' => 'Sente raiva constante ou fica ressentido com frequência?',
    'tod7' => 'É vingativo, guarda mágoas ou tenta se vingar?',
    'tod8' => 'Desafia ativamente a autoridade e ignora regras?',
    'tod9' => 'Perde a paciência frequentemente?',
    'tod10' => 'Fica irritado ou frustrado quando não consegue o que quer?',

    'sensorial1' => 'Sons altos te incomodam ou te deixam ansioso?',
    'sensorial2' => 'Determinadas texturas (roupas, alimentos, objetos) causam desconforto?',
    'sensorial3' => 'Se sente sobrecarregado em ambientes com muitas luzes, sons e movimentos?',
    'sensorial4' => 'Busca sensações intensas, como balançar, pular ou apertar objetos?',
    'sensorial5' => 'Tem dificuldade em perceber a força dos próprios movimentos (ex.: apertar forte demais)?',
    'sensorial6' => 'Evita determinados alimentos por causa da textura, cheiro ou sensação na boca?',
    'sensorial7' => 'Sente-se desconfortável ao ser tocado, mesmo que de forma leve?',
    'sensorial8' => 'Precisa de silêncio absoluto para se concentrar ou relaxar?',
    'sensorial9' => 'Tem hipersensibilidade à luz, cheiro ou som?',
    'sensorial10' => 'Busca contato constante com objetos (tocar, esfregar, apertar)?',

    'dislexia1' => 'Tem dificuldade para ler ou troca letras/palavras com frequência?',
    'dislexia2' => 'Tem dificuldade para escrever palavras corretamente, mesmo palavras simples?',
    'dislexia3' => 'Se sente extremamente ansioso em situações onde precisa falar em público ou se expor?',
    'dislexia4' => 'Evita interações sociais por medo de ser julgado?',
    'dislexia5' => 'Demora para processar informações escritas ou faladas?',
    'dislexia6' => 'Sente que sua mente “trava” em situações sociais?',
    'dislexia7' => 'Tem dificuldade em organizar pensamentos na fala ou na escrita?',
    'dislexia8' => 'Fica extremamente preocupado com o que os outros pensam sobre você?',
    'dislexia9' => 'Prefere atividades solitárias por se sentir desconfortável com grupos?',
    'dislexia10' => 'Sente frustração constante ao ler, escrever ou realizar tarefas escolares/trabalho?',
];
@endphp
@php
    $respostas = json_decode($test->answers, true);
    $scores = json_decode($test->scores, true);

    $mapaRespostas = [
        '1' => 'Nunca',
        '2' => 'Às vezes',
        '3' => 'Frequentemente'
    ];
@endphp

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3>Resultado do Teste</h3>
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $test->name }}</p>
            <p><strong>Email:</strong> {{ $test->email }}</p>

            <hr>

            <h4>Resultado Principal:</h4>
            <p class="fs-4 text-primary">{{ $test->diagnosis }}</p>

            <hr>

            <h4>Pontuação Detalhada:</h4>
            <ul class="list-group mb-4">
                @foreach ($scores as $label => $score)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $label }}
                        <span class="badge bg-light text-dark rounded-pill">{{ $score }}</span>
                    </li>
                @endforeach
            </ul>

            <hr>

            <h4>Respostas Detalhadas:</h4>
            <ul class="list-group">
                @foreach ($respostas as $pergunta => $valor)
                    <li class="list-group-item">
                        <strong>{{ $questions[$pergunta] ?? $pergunta }}:</strong>
                        <span class="badge 
                            @if($valor == '1') bg-light text-dark
                            @elseif($valor == '2') bg-light text-dark
                            @elseif($valor == '3') bg-light text-dark
                            @else bg-light text-dark
                            @endif">
                            {{ $mapaRespostas[$valor] ?? 'Sem resposta' }}
                        </span>
                    </li>
                @endforeach
            </ul>

          

            <form action="{{ route('test.pdf') }}" method="POST" >
                @csrf
               
                <input type="hidden" name="test" value="{{ json_encode($test) }}">
                <input type="hidden" name="scores" value="{{ json_encode($scores) }}">
                <input type="hidden" name="result" value="{{ $test->diagnosis }}">
                <input type="hidden" name="respostas" value="{{ json_encode($respostas) }}">
                <input type="hidden" name="questions" value="{{ json_encode($questions) }}">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-file-pdf-o"></i> Baixar PDF
                </button>
            </form>

        </div>
    </div>
</div>

@endsection

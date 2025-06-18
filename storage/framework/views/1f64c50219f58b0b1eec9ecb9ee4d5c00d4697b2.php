<?php $__env->startSection('content'); ?>


<?php
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
?>
 <section class="container py-5">

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Ocorreram alguns erros:</strong>
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0 fw-bold">Psicoteste de Neurodivergência</h4>
                    <small>Este teste não substitui uma avaliação clínica profissional</small>
                </div>
                <div class="card-body p-4">

                    <form action="<?php echo e(route('test.submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nome</label>
                                <input type="text" name="name" class="form-control shadow-sm" value="<?php echo e(Auth::user()->name); ?>&nbsp; <?php echo e(Auth::user()->familiname); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control shadow-sm" value="<?php echo e(Auth::user()->email); ?>" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        
                        <div class="row">
                            <?php $__currentLoopData = ['TDAH' => 'tdah', 'TEA' => 'tea', 'TOD' => 'tod', 'Sensorial' => 'sensorial', 'Dislexia/Ansiedade Social' => 'dislexia']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $prefix): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12">
                                    <h5 class="text-primary fw-bold mt-4 mb-3 border-bottom pb-2">
                                        <?php echo e($label); ?>

                                    </h5>
                                </div>

                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">
                                            <?php echo e($questions[$prefix . $i]); ?>

                                        </label>
                                        <select name="answers[<?php echo e($prefix . $i); ?>]" class="form-control shadow-sm" required>
                                            <option value="">Selecione</option>
                                            <option value="1">Nunca</option>
                                            <option value="2">Às vezes</option>
                                            <option value="3">Frequentemente</option>
                                        </select>
                                    </div>
                                <?php endfor; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-success px-5 py-2 shadow">
                                <i class="fa fa-paper-plane me-2"></i> Enviar Teste
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\modules/TesteNeurodivergencia/Views/hello.blade.php ENDPATH**/ ?>
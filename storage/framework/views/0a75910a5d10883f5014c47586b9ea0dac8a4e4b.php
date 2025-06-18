<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.barasuperior', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="0">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="<?php echo e(route('dashboard')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span><?php echo e(ucfirst(str_replace('.', ' > ', 'ponto.create'))); ?></span>
                </a>
            </li>

            <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<section id="main-content">
    <section class="wrapper">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Ops! Algo deu errado:</strong>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($erro); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <strong>Sucesso!</strong> <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        Registro de Ponto
                    </header>
                    <div class="card-body">
                       <form action="<?php echo e(route('ponto.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>



    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label>Data</label>
            <input 
                type="date" 
                name="data" 
                id="data" 
                class="form-control" 
                value="" 
                required>
        </div>

        <div class="col-md-3 mb-3">
            <label>Dia da Semana</label>
            <input 
                type="text" 
                name="dia_da_semana" 
                id="dia_da_semana" 
                class="form-control" 
                value="" 
                readonly 
                required>
        </div>

        <div class="col-md-3 mb-3">
            <label>Hora Entrada</label>
            <input 
                type="time" 
                name="hora_entrada" 
                class="form-control" 
                value="" >
        </div>

        <div class="col-md-3 mb-3">
            <label>Hora Entrada Almoço</label>
            <input 
                type="time" 
                name="hora_entrada_almoco" 
                class="form-control" 
                value="" >
        </div>

        <div class="col-md-3 mb-3">
            <label>Hora Saída Almoço</label>
            <input 
                type="time" 
                name="hora_saida_almoco" 
                class="form-control" 
                value="">
        </div>

        <div class="col-md-3 mb-3">
            <label>Hora Saída</label>
            <input 
                type="time" 
                name="hora_saida" 
                class="form-control" 
                value="" >
        </div>

        <div class="col-md-3 mb-3">
            <label>Hora Extra Entrada</label>
            <input 
                type="time" 
                name="hora_extra_entrada" 
                class="form-control" 
                value="">
        </div>

    

        <div class="col-md-3 mb-3">
            <label>Hora Extra Saída</label>
            <input 
                type="time" 
                name="hora_extra_saida" 
                class="form-control" 
                value="">
        </div>

        <div class="col-md-3 mb-3">
            <label>Horas Trabalhadas</label>
            <input 
                type="text" 
                name="hora_trabalhadas" 
                class="form-control" 
                value="">
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success mt-3">Salvar Ponto</button>
        </div>
    </div>
</form>

<script>
    document.getElementById('data').addEventListener('change', function() {
        const dataSelecionada = new Date(this.value + 'T00:00:00');
        if (!isNaN(dataSelecionada)) {
            const diasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
            const diaNome = diasSemana[dataSelecionada.getDay()];
            document.getElementById('dia_da_semana').value = diaNome;
        } else {
            document.getElementById('dia_da_semana').value = '';
        }
    });

    // Caso a data já esteja preenchida (ex: após validação), atualiza o dia da semana ao carregar a página
    window.addEventListener('load', function() {
        const dataInput = document.getElementById('data');
        if (dataInput.value) {
            const event = new Event('change');
            dataInput.dispatchEvent(event);
        }
    });
</script>

                    </div>
                </section>
            </div>
        </div>
        
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Pontos Registrados
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Dia da Semana</th>
                    <th>Hora Entrada</th>
                    <th>Hora Entrada Almoço</th>
                    <th>Hora Saída Almoço</th>
                    <th>Hora Saída</th>
                    <th>Hora Extra Entrada</th>
                    <th>Hora Extra Saída</th>
                    <th>Horas Trabalhadas</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $pontos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ponto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ponto->data); ?></td>
                        <td><?php echo e($ponto->dia_da_semana); ?></td>
                        <td><?php echo e($ponto->hora_entrada); ?></td>
                        <td><?php echo e($ponto->hora_entrada_almoco); ?></td>
                        <td><?php echo e($ponto->hora_saida_almoco ?? '-'); ?></td>
                        <td><?php echo e($ponto->hora_saida ?? '-'); ?></td>
                        <td><?php echo e($ponto->hora_extra_entrada ?? '-'); ?></td>
                        <td><?php echo e($ponto->hora_extra_saida ?? '-'); ?></td>
                        <td><?php echo e($ponto->hora_trabalhadas); ?></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <form action="#" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Confirma exclusão?')"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($pontos->isEmpty()): ?>
                    <tr>
                        <td colspan="10" class="text-center">Nenhum ponto registrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>

<?php echo $__env->make('ponto.sumario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\resources\views/ponto/create.blade.php ENDPATH**/ ?>
<?php if(session('message')): ?>
<div id="flash-message" class="alert alert-success">
    <?php echo e(session('message')); ?>

</div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Lista de usuarios
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="fa fa-user"></i> NOME</th>
                        <th><i class="fa fa-calendar"></i> Data de Vencimento</th>
                        <th><i class="fa fa-users"></i> Criado por</th>
                        <th><i class="fa fa-check-circle"></i> Status</th>
                        <th><i class="fa fa-cog"></i> Ações</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('funcionario.perfil', ['id' => $usuario->id])); ?>"><?php echo e($usuario->name); ?></a></td>
                        <td><?php echo e(\Carbon\Carbon::parse($usuario->data_vencimento)->format('d/m/Y H:i:s')); ?></td>
                        <td><?php echo e($usuario->created_by); ?></td>
                        <td><span class="badge badge-info label-mini"><?php echo e($usuario->status); ?></span></td>
                        <td>
                            <?php if($usuario->is_blocked): ?>
                            
                            <a href="<?php echo e(route('usuarios.desbloquear', ['id' => $usuario->id])); ?>" class="btn btn-warning btn-sm">
                                <i class="fa fa-unlock"></i>
                            </a>
                            <?php else: ?>
                            
                            <a href="<?php echo e(route('usuarios.bloquear', ['id' => $usuario->id])); ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-lock"></i>
                            </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('users.edit', $usuario->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                             <a href="<?php echo e(route('plano.renovar', $usuario->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i></a>
                           <form id="delete-user-<?php echo e($usuario->id); ?>" action="<?php echo e(route('users.destroy', $usuario->id)); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); 
                                if(confirm('Tem certeza que deseja deletar este usuário?')) {
                                    document.getElementById('delete-user-<?php echo e($usuario->id); ?>').submit();
                                }">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                        <td></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\resources\views/administracao/tabela_usuarios.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.barasuperior', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php

use Illuminate\Support\Str;

$uuid = (string) Str::uuid();

?>

<aside>
            <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;" tabindex="0">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                   <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>




<section id="main-content">
          <section class="wrapper">
         
 


<?php if(Auth::user()->is_admin): ?>
   <?php echo $__env->make('layouts.indicadores', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('administracao.tabela_usuarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
       <?php echo $uuid; ?>
    </div>
<?php else: ?>
    <div>Você é um usuário comum</div>
<?php endif; ?>
          </section>
      </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\resources\views/dashboard.blade.php ENDPATH**/ ?>
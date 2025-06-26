<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.barasuperior', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        <!-- page start-->
        <div class="directory-info-row">
            <div class="row">


                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <a class="mr-3" href="#">

                                    <img
                                        class="thumb media-object"
                                        style="background-color:rgb(206, 206, 206)!important;"
                                        src="<?php echo e($usuario->fotoperfil ? $usuario->fotoperfil : asset('img/default-avatar.png')); ?>"
                                        alt="<?php echo e($usuario->name); ?>">

                                </a>
                                <div class="media-body">
                                    <h4><?php echo e($usuario->name); ?><span class="text-muted small"> - <?php echo e($usuario->Occupation); ?></span></h4>
                                    <ul class="social-links">
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                    <address>
                                        <strong><?php echo e($usuario->email); ?></strong><br>

                                        <abbr title="Phone">Whatsapp:</abbr> <?php echo e($usuario->Mobile); ?>

                                    </address>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


















            </div>
        </div>
        <!--page end-->
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\modules/Uzuarios/Views/hello.blade.php ENDPATH**/ ?>
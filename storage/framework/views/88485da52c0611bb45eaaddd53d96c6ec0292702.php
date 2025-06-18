

<?php $__env->startSection('content'); ?>

<div class="container">

    <form class="form-signin" method="POST" action="<?php echo e(route('login')); ?>">
        <h2 class="form-signin-heading">sign in now</h2>
        <?php echo csrf_field(); ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="login-wrap">
            <input type="text" class="form-control" name="email" placeholder="User ID" autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>
    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\paineiestadoinicial\painel-2.0\resources\views/auth/login.blade.php ENDPATH**/ ?>
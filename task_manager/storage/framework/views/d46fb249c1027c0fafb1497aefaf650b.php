<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', config('app.projectname')); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="theme-color" content="#ffffff">
    <meta name="referrer" content="no-referrer"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fonts/fontawesome/css/all.min.css')); ?>">
    <script src="<?php echo e(asset('js/jquery/jquery-3.6.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</head>
<body class="<?php echo $__env->yieldContent('body_class'); ?>">
<div id="app" class="app_container">
    <?php if(!Route::is('auth')): ?>
        <div class="app_left_container">
            <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
    <div class="app_right_container">
        <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main id="content" class="container-fluid p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
</body>
</html>
<?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/layout/layout.blade.php ENDPATH**/ ?>
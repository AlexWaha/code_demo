<?php $__env->startSection('body_class', 'login_container'); ?>
<?php $__env->startSection('title', 'Dashboard Login'); ?>

<?php $__env->startSection('header', 'Dashboard Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <?php echo $__env->make('layout.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layout.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-lock"></i> Login</div>
                <div class="card-body">
                    <form id="form-login" action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="input-email" class="form-label"><?php echo e('Email'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                                <input type="text" name="email" value="" placeholder="<?php echo e('Email'); ?>"
                                       id="input-email" class="form-control"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input-password" class="form-label"><?php echo e('Password'); ?></label>
                            <div class="input-group mb-2">
                                <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                <input type="password" name="password" value="" placeholder="<?php echo e('Password'); ?>"
                                       id="input-password" class="form-control"/>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-key"></i> <?php echo e('Login'); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/login.blade.php ENDPATH**/ ?>
<header class="mb-2">
    <div class="container-fluid">
        <div class="row py-2 px-3">
            <div class="<?php if(auth()->user()): ?> col-10 <?php else: ?> col-12 <?php endif; ?>">
                <div class="h3"><?php echo $__env->yieldContent('header'); ?></div>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <ul class="list-unstyled m-0 p-0">
                        <li><a class="btn btn-dark" href="<?php echo e(route("logout")); ?>"><i class="fas fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/layout/header.blade.php ENDPATH**/ ?>
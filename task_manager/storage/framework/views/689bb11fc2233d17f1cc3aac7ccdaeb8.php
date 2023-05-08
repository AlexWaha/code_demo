<?php if(Session::has('alert-danger') || Session::has('alert-warning') || Session::has('alert-success') || Session::has('alert-info')): ?>
    <div class="flash-message text-center">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $class)): ?>
                <p class="alert alert-<?php echo e($class); ?>"><?php echo Session::get('alert-' . $class); ?></p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/layout/flash.blade.php ENDPATH**/ ?>
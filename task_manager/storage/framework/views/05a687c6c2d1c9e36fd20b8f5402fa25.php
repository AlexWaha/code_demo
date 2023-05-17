<?php $__env->startSection('title', 'Home - Dashboard'); ?>

<?php $__env->startSection('header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>Most recent Projects</strong>
                </div>
                <div class="card-body">
                    <?php if(!empty($projects)): ?>
                        <div class="row">
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-4">
                                    <div class="card mb-2">
                                        <div class="card-header"><a href="<?php echo e(route('projects.show', $project)); ?>"><?php echo e($project->title); ?></a></div>
                                        <div class="card-body">
                                            <div class="row mb-3 required">
                                                <div class="col-sm-2 col-form-label">Tasks:</div>
                                                <div class="col-sm-10 p-2">
                                                    <?php if($project->tasks): ?>
                                                        <ul class="list-unstyled">
                                                            <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('tasks.show', $task)); ?>"><?php echo e($task->title); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/dashboard.blade.php ENDPATH**/ ?>
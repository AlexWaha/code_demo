<?php $__env->startSection('title', 'Projects'); ?>

<?php $__env->startSection('header', 'Projects'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Projects</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add Status"><i class="fas fa-Status-plus"></i> <span
                                    class="d-none d-md-inline">Add project</span> </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('layout.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('layout.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center align-top">ID</th>
                                <th scope="col" class="text-start align-top">Title</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($projects->items())): ?>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" class="text-center align-middle"><a
                                                href="<?php echo e(route('projects.show', $project)); ?>"><?php echo e($project->id); ?></a>
                                        </th>
                                        <td class="text-start"><?php echo e($project->title); ?></td>
                                        <td class="text-center"><?php echo e($project->created_at); ?></td>
                                        <td class="text-center d-none d-lg-table-cell"><?php echo e($project->updated_at); ?></td>
                                        <td class="text-end">
                                            <?php if(auth()->user()->is_admin): ?>
                                                <form method="POST" action="<?php echo e(route('projects.destroy', $project)); ?>"
                                                      class="form-inline">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Show"
                                                       href="<?php echo e(route('projects.show', $project)); ?>">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="<?php echo e(route('projects.edit', $project)); ?>">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Show"
                                                   href="<?php echo e(route('projects.show', $project)); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="<?php echo e(route('projects.edit', $project)); ?>">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="p-2 text-center h5">Projects not found!</div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', ['navbar_menu' => 'projects'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/project/list.blade.php ENDPATH**/ ?>
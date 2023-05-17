<?php $__env->startSection('title', 'Statuses'); ?>

<?php $__env->startSection('header', 'Statuses'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Statuses</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="<?php echo e(route('statuses.create')); ?>" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add Status"><i class="fas fa-Status-plus"></i> <span
                                    class="d-none d-md-inline">Add Status</span> </a>
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
                                <th scope="col" class="text-start align-top">Name</th>
                                <th scope="col" class="text-center align-top">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($statuses->items())): ?>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr <?php if($status->deleted_at): ?> class="bg-danger bg-opacity-25" <?php endif; ?>>
                                        <th scope="row" class="text-center align-middle"><?php echo e($status->id); ?></th>
                                        <td class="text-start"><?php echo e($status->name); ?> <?php if($status->deleted_at): ?> <b class="text-danger">(Deleted)</b> <?php endif; ?></td>
                                        <td class="text-center"><?php echo e($status->created_at); ?></td>
                                        <td class="text-center d-none d-lg-table-cell"><?php echo e($status->updated_at); ?></td>
                                        <td class="text-end">
                                            <?php if(auth()->user()->is_admin && !$status->deleted_at): ?>
                                                <form method="POST" action="<?php echo e(route('statuses.destroy', $status)); ?>"
                                                      class="form-inline">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="<?php echo e(route('statuses.edit', $status)); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="<?php echo e(route('statuses.edit', $status)); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="p-2 text-center h5">Statuses not found!</div>
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

<?php echo $__env->make('layout.layout', ['navbar_menu' => 'statuses'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/status/list.blade.php ENDPATH**/ ?>
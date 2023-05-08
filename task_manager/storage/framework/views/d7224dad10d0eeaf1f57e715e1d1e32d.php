<?php $__env->startSection('title', 'Home - Users list'); ?>

<?php $__env->startSection('header', 'Users list'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Users list</strong>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('layout.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('layout.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-start">Name</th>
                            <th class="text-start">Email</th>
                            <th class="text-center">Is Admin</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Updated at</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><a
                                            href="<?php echo e(route('users.show', $user)); ?>"><?php echo e($user->id); ?></a></td>
                                    <td class="text-start"><?php echo e($user->name); ?></td>
                                    <td class="text-start"><?php echo e($user->email); ?></td>
                                    <td class="text-center">
                                        <?php if($user->is_admin): ?>
                                            <span class="badge bg-success">Yes</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">No</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?php echo e($user->created_at); ?></td>
                                    <td class="text-center"><?php echo e($user->updated_at); ?></td>
                                    <td class="text-end">
                                        <?php if(auth()->user()->is_admin): ?>
                                            <form method="POST"
                                                  action="<?php echo e(route('users.destroy', $user)); ?>"
                                                  class="form-inline">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="<?php echo e(route('users.edit', $user)); ?>">
                                                    <i class="fa fa-pencil"></i></a>
                                                <button type="submit" class="btn btn-danger"
                                                        data-bs-toggle="tooltip" title="Delete"
                                                        onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                               href="<?php echo e(route('users.edit', $user)); ?>">
                                                <i class="fa fa-pencil"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">
                                    <div class="p-2 text-center h5">Users not found!</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', ['navbar_menu' => 'users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/status/list.blade.php ENDPATH**/ ?>
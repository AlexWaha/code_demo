<?php $__env->startSection('title', 'Users list'); ?>

<?php $__env->startSection('header', 'Users list'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Users list</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add User"><i class="fas fa-user-plus"></i> <span
                                    class="d-none d-md-inline">Add User</span> </a>
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
                                <th scope="col" class="text-center align-middle">ID</th>
                                <th scope="col" class="text-start align-top">Name</th>
                                <th scope="col" class="text-start align-top">Email</th>
                                <th scope="col" class="text-center  align-top d-none d-lg-table-cell">Is Admin</th>
                                <th scope="col" class="text-center align-top">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($users->items())): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo e($user->id); ?></th>
                                        <td class="text-start"><?php echo e($user->name); ?></td>
                                        <td class="text-start"><?php echo e($user->email); ?></td>
                                        <td class="text-center d-none d-lg-table-cell">
                                            <?php if($user->is_admin): ?>
                                                <span class="badge bg-success">Yes</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">No</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center"><?php echo e($user->created_at); ?></td>
                                        <td class="text-center d-none d-lg-table-cell"><?php echo e($user->updated_at); ?></td>
                                        <td class="text-end">
                                            <?php if(auth()->user()->is_admin): ?>
                                                <form method="POST" action="<?php echo e(route('users.destroy', $user)); ?>"
                                                      class="form-inline">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="<?php echo e(route('users.edit', $user)); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php if($user->id !== auth()->user()->id): ?>
                                                        <button type="submit" class="btn btn-danger"
                                                                data-bs-toggle="tooltip" title="Delete"
                                                                onclick="return confirm('Are you sure?')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="tooltip" title="Delete" disabled>
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </form>
                                            <?php else: ?>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="<?php echo e(route('users.edit', $user)); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', ['navbar_menu' => 'users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/user/list.blade.php ENDPATH**/ ?>
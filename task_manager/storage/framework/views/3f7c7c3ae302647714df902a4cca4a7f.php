<?php
    $navbar_menu = $navbar_menu ?? '';
?>
<div class="app_left_container">
    <aside id="column_left">
        <div class="navbar_menu_btn">
            <div class="navbar_btn">
                <i class="fas fa-square-caret-left" data-bs-toggle="tooltip" data-bs-title="Toggle menu"></i>
                <span>Toggle menu</span>
            </div>
        </div>
        <ul class="navbar_menu">
            <li <?php if($navbar_menu == 'projects'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('projects.index')); ?>">
                    <i class="fas fa-rectangle-list" data-bs-title="Projects" data-bs-toggle="tooltip"></i>
                    <span class="menu_title">Projects</span>
                </a>
            </li>
            <li <?php if($navbar_menu == 'tasks'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('tasks.index')); ?>">
                    <i class="fas fa-tasks" data-bs-title="Tasks" data-bs-toggle="tooltip"></i>
                    <span class="menu_title">Tasks</span>
                </a>
            </li>
            <li <?php if($navbar_menu == 'statuses'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('statuses.index')); ?>">
                    <i class="fas fa-check-circle" data-bs-title="Statuses" data-bs-toggle="tooltip"></i>
                    <span class="menu_title">Statuses</span>
                </a>
            </li>
            <li <?php if($navbar_menu == 'users'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(route('users.index')); ?>">
                    <i class="fas fa-user" data-bs-title="Users" data-bs-toggle="tooltip"></i>
                    <span class="menu_title">Users</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
<?php /**PATH D:\OS\domains\test.local\task_manager\resources\views/layout/navbar.blade.php ENDPATH**/ ?>
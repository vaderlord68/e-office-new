<div class="sidebar <?php echo e(Helpers::getDevice() == 'DESKTOP' ? 'hide' : ''); ?>">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item hide">
                <a class="nav-link" href="<?php echo e(url('/adminlogin')); ?>">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Setting</li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/admin/W00F0001')); ?>">
                    <i class="nav-icon icon-speedometer"></i> Database</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/admin/W00F0002')); ?>">
                    <i class="nav-icon icon-speedometer"></i> Mail </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/admin/W00F0003')); ?>">
                    <i class="nav-icon icon-speedometer"></i> Environment </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
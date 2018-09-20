<ol class="breadcrumb">
    <?php
    $title = isset($title) ? $title : "";
    ?>
    <li class="breadcrumb-item text-primary"><strong><?php echo e($title); ?></strong></li>
    <li class="breadcrumb-item hide">
        <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active hide">Dashboard</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none hide">
        <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="#">
                <i class="icon-speech"></i>
            </a>
            <a class="btn" href="./">
                <i class="icon-graph"></i>  Dashboard</a>
            <a class="btn" href="#">
                <i class="icon-settings"></i>  Settings</a>
        </div>
    </li>
</ol>
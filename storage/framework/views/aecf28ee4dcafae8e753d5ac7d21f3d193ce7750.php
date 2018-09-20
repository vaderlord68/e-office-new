<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version  v2.0.0
* @link  https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
https://coreui.io/demo/#main.html
https://athemes.com/collections/free-bootstrap-admin-templates/
-->
<?php
$locale = Helpers::getLocale(); //return vi, en, zh, ja
?>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Diginet Corp.">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Admin Page</title>

    <!-- jQuery-UI -->
    <link href="<?php echo e(asset('plugins/jQueryUI/jquery-ui.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/jQueryUI/jquery-ui.theme.min.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/bootstrap/css/bootstrap.css')); ?>" media="all" rel="stylesheet" type="text/css"/>

    <!-- DatePicker -->
    <link href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- Select2 -->
    <link href="<?php echo e(asset('plugins/select2-4.0.5/dist/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- Paramquery -->
    <link href="<?php echo e(asset('plugins/paramquery-3.3.4/pqgrid.dev.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/paramquery-3.3.4/pqgrid.bootstrap.min.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/paramquery-3.3.4/pqgrid.ui.min.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/paramquery-3.3.4/themes/office/pqgrid.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
    <!-- Theme -->
    <link href="<?php echo e(url('admin/plugins/@coreui/coreui/dist/css/coreui.css')); ?>" rel="stylesheet">
    <!-- Icons-->
    <link href="<?php echo e(url('admin/plugins/@coreui/icons/css/coreui-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('admin/plugins/flag-icon-css/css/flag-icon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('admin/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('admin/plugins/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet">

    <!-- Main styles for this application-->
    <link href="<?php echo e(url('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('admin/plugins/pace-progress/css/pace.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('admin/plugins/spinkit/spinkit.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('css/common.css')); ?>" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<?php echo $__env->make('admin.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="app-body">
    <?php echo $__env->make('admin.layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main class="main">
        <!-- Breadcrumb-->
        <?php echo $__env->make('admin.layout.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.layout.container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </main>
    <?php echo $__env->make('admin.layout.aside-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<footer class="app-footer">
    <div>
        <a href="http://diginet.com.vn">Diginet Corp.</a>
        <span class="hide">&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto hide">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
    </div>
</footer>


<script type="text/javascript" src="<?php echo asset('js/jquery-3.3.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/jQueryUI/jquery-ui.js'); ?>"></script>
<script src="<?php echo e(url('admin/plugins/popper.js/dist/popper.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo asset('admin/plugins/bootstrap/dist/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datepicker/date.js'); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/datepicker/locales/bootstrap-datepicker.$locale.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/select2-4.0.5/dist/js/select2.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/select2-4.0.5/dist/js/i18n/$locale.js")); ?>"></script>
<!-- Inputmask -->
<script type="text/javascript" src="<?php echo asset('plugins/input-mask/jquery.inputmask.bundle.js'); ?>"></script>
<!-- Bootbox support confirmation dialog -->
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-bootbox/bootbox.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/paramquery-3.3.4/pqgrid.dev.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/paramquery-3.3.4/touch-punch/touch-punch.min.js'); ?>"></script>
<script src="<?php echo e(asset("plugins/paramquery-3.3.4/localize/pq-localize-$locale.js")); ?>" type="text/javascript"></script>
<!-- TinyMCE for editor -->
<script src="<?php echo e(asset('plugins/tinymce/tinymce.js')); ?>"></script>
<!-- CKeditor for editor -->
<script src="<?php echo e(asset('plugins/ckeditor5-build-classic/ckeditor.js')); ?>"></script>
<!-- CoreUI and necessary plugins-->
<script src="<?php echo e(url('admin/plugins/pace-progress/pace.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/perfect-scrollbar/dist/perfect-scrollbar.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/@coreui/coreui/dist/js/coreui.js')); ?>"></script>
<!-- Plugins and scripts required by this view-->



<script type="text/javascript" src="<?php echo asset('js/common.js'); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>
<div id="spinLoading" class="loading hide">Loading&#8230;</div>
</html>


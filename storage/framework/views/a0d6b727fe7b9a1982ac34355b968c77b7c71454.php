<!-- *************************************CSS ****************************************************************-->
<!-- jQuery-UI -->
<link href="<?php echo e(asset('plugins/jQueryUI/jquery-ui.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/jQueryUI/jquery-ui.theme.min.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<!--- Bootstrap-->
<link href="<?php echo e(asset('plugins/bootstrap/css/bootstrap.css')); ?>" media="all" rel="stylesheet" type="text/css"/>

<!-- Theme + fonts-->
<link href="<?php echo e(url('themes/@coreui/coreui/dist/css/coreui.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('themes/@coreui/icons/css/coreui-icons.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('plugins/flag-icon-css/css/flag-icon.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('plugins/fontawesome-pro-5.0.13/web-fonts-with-css/css/fontawesome-all.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('plugins/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet">

<!-- Full calendar-->
<link href="<?php echo e(asset('plugins/fullcalendar-3.9.0/fullcalendar.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('/plugins/fullcalendar-3.9.0/scheduler.min.css')); ?>" rel="stylesheet">
<!-- DatePicker -->
<link href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet" type="text/css"/>
<!-- Select2 -->
<link href="<?php echo e(asset('plugins/select2-4.0.5/dist/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
<!-- Paramquery -->
<link href="<?php echo e(asset('plugins/paramquery-3.3.4/pqgrid.dev.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/paramquery-3.3.4/pqgrid.bootstrap.min.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/paramquery-3.3.4/pqgrid.ui.min.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('plugins/paramquery-3.3.4/themes/office/pqgrid.css')); ?>" media="all" rel="stylesheet" type="text/css"/>
<!-- JS Tree -->
<link href="<?php echo e(asset('plugins/jstree/dist/themes/default/style.css')); ?>" rel="stylesheet" />
<!-- JS Context for content menu-->
<link href="<?php echo e(asset('plugins/contextjs/context.standalone.css')); ?>" rel="stylesheet" />

<!--Lightbox -->
<link href="<?php echo e(asset('plugins/lightbox/ekko-lightbox.css')); ?>" rel="stylesheet" >
<!-- Spin + progress -->
<link href="<?php echo e(asset('plugins/pace-progress/css/pace.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('plugins/spinkit/spinkit.css')); ?>" rel="stylesheet">
<!-- customize-->
<link href="<?php echo e(asset('css/common.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/affects.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet">

<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************JAVASCRIPT ****************************************************************-->

<!-- jQuery -->
<script type="text/javascript" src="<?php echo asset('js/jquery-3.3.1.min.js'); ?>"></script>
<!-- CoreUI and necessary plugins-->
<script type="text/javascript" src="<?php echo e(asset('plugins/pace-progress/pace.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/@coreui/coreui/dist/js/coreui.js')); ?>"></script>
<!-- Jquery UI -->
<script type="text/javascript" src="<?php echo asset('plugins/jQueryUI/jquery-ui.js'); ?>"></script>
<!-- Popper supports tooltip -->
<script type="text/javascript" src="<?php echo e(url('plugins/popper.js/dist/popper.min.js')); ?>"></script>
<!-- Bootstrap + bootstrap-confirmation -->
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-confirm/bootstrap-confirmation.js'); ?>"></script>
<!-- Moment -->
<script type="text/javascript" src="<?php echo asset('plugins/moment/moment.js'); ?>"></script>
<!-- Full calendar-->
<script src="<?php echo e(asset("plugins/fullcalendar-3.9.0/fullcalendar.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/fullcalendar-3.9.0/locale-all.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/fullcalendar-3.9.0/scheduler.min.js")); ?>"></script>
<!-- DatePicker -->
<script type="text/javascript" src="<?php echo asset('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datepicker/date.js'); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/datepicker/locales/bootstrap-datepicker.$locale.js")); ?>"></script>
<!-- Bootstrap select 2  -->
<script type="text/javascript" src="<?php echo e(asset("plugins/select2-4.0.5/dist/js/select2.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("plugins/select2-4.0.5/dist/js/i18n/$locale.js")); ?>"></script>
<!-- Inputmask -->
<script type="text/javascript" src="<?php echo asset('plugins/input-mask/jquery.inputmask.bundle.js'); ?>"></script>
<!-- Bootbox support confirmation dialog -->
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-bootbox/bootbox.js'); ?>"></script>
<!-- Paramquery-->
<script type="text/javascript" src="<?php echo asset('plugins/paramquery-3.3.4/pqgrid.dev.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/paramquery-3.3.4/touch-punch/touch-punch.min.js'); ?>"></script>
<script src="<?php echo e(asset("plugins/paramquery-3.3.4/localize/pq-localize-$locale.js")); ?>" type="text/javascript"></script>
<!-- JS Tree -->
<script src="<?php echo e(asset('plugins/jstree/dist/jstree.js')); ?>"></script>
<!-- JS Context for content menu-->
<script src="<?php echo e(asset('plugins/contextjs/context.js')); ?>"></script>
<!-- TinyMCE for editor -->
<script type="text/javascript" src="<?php echo e(asset('plugins/tinymce/tinymce.js')); ?>"></script>
<!-- CKeditor for editor -->
<script type="text/javascript" src="<?php echo e(asset('plugins/ckeditor/ckeditor.js')); ?>"></script>
<!-- Validation JS-->
<script src="<?php echo e(asset('plugins/validation-js/validate.min.js')); ?>"></script>
<!--Lightbox -->
<script src="<?php echo e(asset('plugins/lightbox/ekko-lightbox.js')); ?>"></script>
<!--Image Tool supports image resizeing -->
<script src="<?php echo e(asset('plugins/jssor-slider/ImageTools.js')); ?>"></script>

<!-- Plugins and scripts required by this view-->




<!-- Diginet Plugins -->
<script src="<?php echo e(asset("plugins/digi-menu/digi-menu.js")); ?>"></script>
<script src="<?php echo e(asset("plugins/digi-contextmenu/digi-contextmenu.js")); ?>"></script>
<script src="<?php echo e(asset('js/module/bi/folder-manage.js')); ?>"></script>
<script src="<?php echo e(asset("js/common.js")); ?>"></script>




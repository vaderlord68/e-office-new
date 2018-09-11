<html>
<head>
    <?php $__env->startSection('head'); ?>
        <?php echo $__env->make('page.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
</head>
<?php $__env->startSection('body'); ?>
    <body>
    <?php $__env->startSection("left"); ?>
        <?php echo $__env->make("page.left_panel", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection("right"); ?>
        <?php echo $__env->make("page.right_panel", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php echo $__env->make('page.footer_custom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection('footer'); ?>
    <?php echo $__env->yieldSection(); ?>
    </body>
<?php echo $__env->yieldSection(); ?>

<div id="divModalContainer"></div>
</html>

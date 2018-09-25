<div id="right-panel" class="right-panel">
    <?php $__env->startSection("top_menu"); ?>
        <?php echo $__env->make("page.content.top_menu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection("message_section"); ?>
        <?php echo $__env->make("page.content.message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make("page.content.alert-dismissible", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <div class="content mt-3">
        <?php $__env->startSection("body_content"); ?>

        <?php echo $__env->yieldSection(); ?>
        <?php echo $__env->make("page.loading_mask", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
</div>

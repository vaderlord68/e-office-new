<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <div class="module-bi">
        <div class="row">
            <div class="folder-sidebar col-sm-3">
                <?php $__env->startSection("folderTree"); ?>
                    <?php echo $__env->make("system.module.bi.folderTree", ["folderTree" => $folderTree], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldSection(); ?>
            </div>
            <div class="folder-content col-sm-9">
                <?php $__env->startSection("folderView"); ?>
                <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
    </div>
<?php $__env->startSection("deletePopup"); ?>
    <?php echo $__env->make("system.module.bi.deletePopup", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
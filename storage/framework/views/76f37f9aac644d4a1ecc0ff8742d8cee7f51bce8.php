<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <div class="row">
        <div class="col-sm-8">
            <img src="<?php echo e(asset('media/bg-test.png')); ?>" class="pull-left"  alt="">
        </div>
        <div class="col-sm-4">
            <img src="<?php echo e(asset('media/bg-test02.png')); ?>" class="pull-right" alt="">
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
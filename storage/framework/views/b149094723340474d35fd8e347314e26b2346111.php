<?php $__env->startSection('content'); ?>
    ##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##
    <div class="row">
        <div class="col-sm-8">
            <img src="<?php echo e(asset('media/bg-test.png')); ?>" class="pull-left"  alt="">
        </div>
        <div class="col-sm-4">
            <img src="<?php echo e(asset('media/bg-test02.png')); ?>" class="pull-right" alt="">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            //toggleSidebar();
        })
    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
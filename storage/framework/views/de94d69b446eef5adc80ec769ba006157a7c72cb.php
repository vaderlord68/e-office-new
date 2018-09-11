<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <div class="document">
        <div class="rơw">
            <div class="col-sm-3 pdl5 pdr5">
                <?php echo $__env->make('system.module.W76.W76F2150.components.Sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-sm-9  pdl5 pdr5">
                <?php echo $__env->make('system.module.W76.W76F2150.components.Wrapper', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<style>
    /*.document .document-sidebar{*/
        /*height: calc(100%);*/
    /*}*/
    /*.document .document-content{*/
        /*height: calc(100%);*/
    /*}*/
</style>



<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
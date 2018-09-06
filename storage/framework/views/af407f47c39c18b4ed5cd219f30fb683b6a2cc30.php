<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <section class="news-view">
        <div class="rơw">
            <div class="col-sm-3 news-box">
                <div class="well">
                    <?php echo $__env->make('system.module.W76.W76F2142.components.ChannelList', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('system.module.W76.W76F2142.components.LastestNewsList', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="col-sm-9 news-box" style="height: 300px;">
                <?php echo $__env->make('system.module.W76.W76F2142.components.Wrapper', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('news-wrapper'); ?>
    <label class="lbl-normal-value"><?php echo e(Helpers::getRS("Tin_tuc_noi_bo")); ?></label>
    <div class="well ">
        <label class="label font cut-detail"><?php echo e($newsRow->Title); ?></label>
        <span class="pull-right">
            <a href="<?php echo e(url('/w76f2141/edit?newsID='.$newsRow->NewsID)); ?>" title="<?php echo e(Helpers::getRS("Sua")); ?>"><i
                        class="fa fa-edit mgr10 text-yellow cursor-pointer icon"></i></a>
        </span>

        <div class="row">
            <div class="col-xs-2 pd10">
                <a><i class="fa fa-folder left"></i>
                    <?php echo e(isset($newsRow->CodeName) ? $newsRow->CodeName : ''); ?>

                </a>
            </div>
            <div class="col-xs-2 pd10">
                <a><i class="fa fa-eye left"></i>
                    <?php echo e(isset($newsRow-> ViewCount) ? $newsRow-> ViewCount : ''); ?>

                </a><?php echo e(Helpers::getRS("Luot_xem")); ?>

            </div>
            <div class="col-xs-3 pd10">
                <a><i class="fa fa-calendar left"></i>
                    <?php echo e(isset($newsRow-> ReleaseDate) ? $newsRow-> ReleaseDate : ''); ?>

                </a>
            </div>
            <div class="col-xs-2 pd10">
                <a><i class="fa fa-user left"></i>
                    <?php echo e(isset($newsRow-> Author) ? $newsRow-> Author : ''); ?>

                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a>
                    <?php echo isset($newsRow-> Content) ? $newsRow-> Content : ''; ?>

                </a>
            </div>
        </div>
    </div>
    <div class="well pd">
        <label class="lbl-normal-value"><?php echo e(Helpers::getRS("Tin_lien_quan")); ?></label>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php $__currentLoopData = $newRowDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a><?php echo e(isset($newDetail-> Title) ? $newDetail-> Title : ''); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.module.W76.W76F2142.components.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
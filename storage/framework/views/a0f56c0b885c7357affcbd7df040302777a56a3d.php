<?php $__env->startSection('news-wrapper'); ?>
    <div class="well">
        <label class="label"><?php echo e(Helpers::getRS("Tin_tuc")); ?></label>
        <?php $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $newsID = $newsRow->NewsID;
            $detailURL = url('/w76f2142/channel/?task=detail') . '&newsID=' . $newsID;
            ?>
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <a href="<?php echo e($detailURL); ?>"><img src="<?php echo e(isset($newsRow->Image) ? $newsRow->Image : ''); ?>"/></a>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?php echo e($detailURL); ?>" class="nav-link">
                                <?php echo e(isset($newsRow->Title) ? $newsRow->Title : ''); ?>

                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 ">
                            <a><i class="fa fa-calendar left"></i>
                                <?php echo e(isset($newsRow-> ReleaseDate) ? $newsRow-> ReleaseDate : ''); ?>

                            </a>
                        </div>
                        <div class="col-xs-2 pdl10">
                            <a><i class="fa fa-calendar left"></i>
                                <?php echo e(isset($newsRow-> ReleaseDate) ? $newsRow-> ReleaseDate : ''); ?>

                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a>
                                <?php echo e(isset($newsRow-> Content) ? $newsRow-> Content : ''); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.module.W76.W76F2142.components.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="news">
    <div class="card">
        <div class="card-header bld">
            <i class="fa fa-newspaper-o bld mgr10"></i><?php echo e(Helpers::getRS("Tin_moi_nhat_U")); ?>

        </div>

    </div>
    <ul class="list-group">
        <?php $__currentLoopData = $lastestNewsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $newsID = $row->NewsID;
            $detailURL = url('/w76f2142/lastest/?task=detail').'&newsID='.$newsID;
            ?>
            <li class="list-group">
                <div class="row pdt5">
                    <div class="col-sm-4">
                        <a href="<?php echo e($detailURL); ?>"><img src="<?php echo e(isset($row->Image) ? $row->Image : ''); ?>"/></a>
                    </div>
                    <div class="col-sm-8 t">
                        <a href="<?php echo e($detailURL); ?>" class="nav-link cut-latest">
                            <?php echo e(isset($row->Title) ? $row->Title : ''); ?>

                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</div>

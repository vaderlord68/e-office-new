
<div class="newslist">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-newspaper mgr10"></i><?php echo e(Helpers::getRS("Tin_moi_nhat_U")); ?>

        </div>
    </div>
    <ul class="list-group">

        <?php $__currentLoopData = $lastestNewsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $newsID = $row->NewsID;
            $detailURL = url('/w76f2142/lastest/?task=detail').'&newsID='.$newsID;
            ?>
            <li class="list-group">
                <div class="row pdb10">
                    <div class="col-sm-5 pdt10">
                        <a class="pdl10" href="<?php echo e($detailURL); ?>"><img class="latest-img" src="<?php echo e($row->Image); ?>"/></a>
                    </div>
                    <div class="col-sm-7 pdt10">
                        <a class="cut-latest" href="<?php echo e($detailURL); ?>">
                            <?php echo e(isset($row->Title) ? $row->Title : ''); ?>

                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</div>

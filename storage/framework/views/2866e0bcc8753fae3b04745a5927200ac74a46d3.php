<div class="well-right best-news">
    <span class="nav-link title-category"><?php echo e(Helpers::getRS("Tin_moi_nhat")); ?></span>
    <div class="list-category">
        <ul class="nav nav-pills flex-column">
            <?php $__currentLoopData = $lastestNewsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?php echo e(isset($row->Image) ? $row->Image : ''); ?>"/>
                        </div>
                        <div class="col-sm-8">
                            <a class="nav-link">
                                <?php echo e(isset($row->Title) ? $row->Title : ''); ?>

                            </a>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
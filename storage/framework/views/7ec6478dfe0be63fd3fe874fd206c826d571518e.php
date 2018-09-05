
<div class="news mgb10">
    <div class="card">
        <div class="card-header bld">
            <i class="fa fa-list bld mgr10"></i><?php echo e(Helpers::getRS("Chuyen_muc_U")); ?>

        </div>

    </div>
    <ul class="list-group">
        <?php $__currentLoopData = $channelIDList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="<?php echo e(url('/w76f2142/channel').'/?task=list&channelID='.$row->CodeID); ?>">
                    <i class="fa fa-arrow-circle-right mgr10"></i><?php echo e(isset($row->CodeName) ? $row->CodeName : ''); ?>

                    
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</div>



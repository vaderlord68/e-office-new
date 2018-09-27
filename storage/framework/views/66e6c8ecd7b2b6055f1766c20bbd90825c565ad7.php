<?php $__env->startSection('content'); ?>
    ##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##
    <?php
    $divisionIDList = json_decode($divisionIDList);
    $divisionIDW76F2231 = $divisionIDList[0]->OrgunitName;
    ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div id="divFullCalendar">
                    <?php echo $__env->make('modules.W80.W76F2230.W76F2230_Calender', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
        <div class="row pdt10">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div class="checkbox mgr10">
                    <div class="form-check">
                        <label class="form-check-label pdl0">
                            <input type="checkbox" class="form-check-input" id="" name="approveStatusW76F2230"
                                   value=""><?php echo e(Helpers::getRS("Cho_duyet")); ?>

                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div class="checkbox mgr10">
                    <div class="form-check">
                        <label class="form-check-label pdl0">
                            <input type="checkbox" class="form-check-input" id="" name="approveStatusW76F2230"
                                   value=""><?php echo e(Helpers::getRS("Da_duyet")); ?>

                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <label class="form-check-label pdt10"><?php echo e(Helpers::getRS("Don_vi")); ?></label>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <select name="divisionIDW76F2231" id="divisionIDW76F2231"
                        class="form-control" required>
                    <option value="">--</option>
                    <?php $__currentLoopData = $divisionIDList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divisionIDItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($divisionIDItem->OrgunitID); ?>"><?php echo e($divisionIDItem->OrgunitName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {

        });

    </script>
<?php $__env->stopSection(); ?>

<style>
    .fc-highlight {
        background: #c7a029 !important;
        opacity: .3;
    }
</style>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
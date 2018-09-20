<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header hide">
                    <strong>Environment</strong> setting
                </div>
                <form id="frmEnvironmentSetting" method="post" class="form-horizontal">
                    <?php $__currentLoopData = $arrEnv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <?php echo $__env->make('admin.components.alert-dissmiss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="lbl-normal-value" for="<?php echo e($key); ?>"><?php echo e($key); ?></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="<?php echo e($key); ?>" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-sm btn-danger">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $("#frmEnvironmentSetting").submit(function(evt){
            evt.preventDefault();
            showLoading();
            clearMessage();
            postMethod('<?php echo e(url("/admin/W00F0003/update")); ?>',function(res){
                hideLoading();
                var data = JSON.parse(res);
                switch (data.status){
                    case 'SUCC':
                        showSuccessMessage('Data saved sucessfully');
                        //window.location.href = '<?php echo e(url("/admin/database")); ?>';
                        break;
                    case 'ERROR':
                        showWarningMessage(data.message);
                        break;
                }
            }, $("#frmEnvironmentSetting").serialize())
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
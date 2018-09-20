<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header hide">
                    <strong>Database</strong> setting
                </div>
                <form id="frmDatabaseSetting" method="post" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <?php echo $__env->make('admin.components.alert-dissmiss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtServerName">Server name</label>

                            <div class="col-md-8">
                                <input type="text" id="txtServerName" name="txtServerName" class="form-control" autocomplete="off"
                                       placeholder="" autofocus value="<?php echo e($connection['host']); ?>" required>
                                <span class="help-block hide">Please enter your server name</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtUserName">User name</label>
                            <div class="col-md-8">
                                <input type="text" id="txtUserName" name="txtUserName" class="form-control" autocomplete="off"
                                       placeholder="" value="<?php echo e($connection['username']); ?>" required>
                                <span class="help-block hide">Please enter your username</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtPassword">Password</label>
                            <div class="col-md-8">
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" autocomplete="off"
                                       placeholder="" value="<?php echo e($connection['password']); ?>" required>
                                <span class="help-block hide">Please enter username</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtDatabaseName">Database name</label>
                            <div class="col-md-8">
                                <input type="text" id="txtDatabaseName" name="txtDatabaseName" class="form-control" autocomplete="off"
                                       placeholder="" value="<?php echo e($connection['database']); ?>" required>
                                <span class="help-block hide">Please enter database name</span>
                            </div>
                        </div>

                    </div>
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
        $("#frmDatabaseSetting").submit(function(evt){
            evt.preventDefault();
            showLoading();
            clearMessage();
            postMethod('<?php echo e(url("/admin/W00F0001/update")); ?>',function(res){
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
            }, $("#frmDatabaseSetting").serialize())
        });
    </script>
<?php $__env->stopSection(); ?>

<style>

</style>
<?php echo $__env->make('admin.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
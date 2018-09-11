<?php $__env->startSection('document-header'); ?>
   <h4>Thêm mới thư mục</h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('document-body'); ?>
  <div class="pd10 mg5">
      <form id="frmCreateFolder">
          <div class="row form-group">
              <div class="col-sm-2">
                  <label for="txtFolderName">Tên thư mục</label>
              </div>
              <div class="col-sm-4">
                  <input type="text" name="txtFolderName" class="form-control" id="txtFolderName" autofocus required>
              </div>
          </div>
          <div class="row form-group">
              <div class="col-sm-2">
                  <label for="txtFolderDescription">Mô tả</label>
              </div>
              <div class="col-sm-4">
            <textarea type="text" name="txtFolderDescription" class="form-control "
                      id="txtFolderDescription" required></textarea>
              </div>
          </div>
          <div class="row form-group">
              <div class="col-sm-6">
                  <button type="button" id="btnSaveFolder" class="btn btn-default pull-right"><i class="fa fa-save text-primary pdr5"></i> Lưu </button>
                  <button id="hdBtnSaveFolder" class="hide"></button>
              </div>
          </div>

          <input type="hidden" name="hdParentFolderID" value="<?php echo e($currentFolderID); ?>">
          <input type="hidden" name="hdFolderID" value="">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      </form>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
   <script type="text/javascript">
       $(document).ready(function(){
           $("#btnSaveFolder").click(function(){
               $("#hdBtnSaveFolder").trigger("click");

           });
           $("#frmCreateFolder").submit(function(evt){
               evt.preventDefault();
               postMethod("<?php echo e(url('/W76F2150/save-folder')); ?>", function(res){
                    var data = JSON.parse(res);
                    switch (data.status){
                        case 'OKAY':
                            window.location.href = document.referrer;
                            break;
                        case 'ERROR':
                            break;
                    }
               }, $("#frmCreateFolder").serialize())
           });
       });
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.module.W76.W76F2150.components.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
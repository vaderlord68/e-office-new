<?php $__env->startSection('document-header'); ?>
   <h4>Đăng tập tin</h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('document-body'); ?>
    <div class="pd10 mg5">
        <form id="frmCreateFolder">
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="txtDocName" class="hide">Đính kèm</label>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary" id="btnChoose" name="btnChoose">Chọn tập tin</button>
                    <input type="file" name="attFile" class="form-control hide" id="attFile">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="txtDocName">Tên tài liệu</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="txtDocName" class="form-control" id="txtDocName" autofocus required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="txtDocID">Số hiệu</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="txtDocID" class="form-control" id="txtDocID" autofocus required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="txtContent">Trích yếu</label>
                </div>
                <div class="col-sm-6">
            <textarea type="text" name="txtContent" class="form-control "
                      id="txtContent" ></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="cboDocType">Loại văn bản</label>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" id="cboDocType" name="cboDocType">
                        <?php $__currentLoopData = $docTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->CodeID); ?>"><?php echo e($row->CodeName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="cboFieldDoc">Lĩnh vực</label>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" id="cboFieldDoc" name="cboFieldDoc">
                        <?php $__currentLoopData = $docTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->CodeID); ?>"><?php echo e($row->CodeName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="cboOrgDoc">Cơ quan ban hành</label>
                </div>
                <div class="col-sm-6">
                    <select class="form-control" id="cboOrgDoc" name="cboOrgDoc">
                        <?php $__currentLoopData = $docTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->CodeID); ?>"><?php echo e($row->CodeName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="txtFolderDescription">Mô tả</label>
                </div>
                <div class="col-sm-6">
            <textarea type="text" name="txtFolderDescription" class="form-control "
                      id="txtFolderDescription" required></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-8">
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
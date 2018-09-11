<?php $__env->startSection('document-header'); ?>
   <button id="btnUploadFile" type="button" title="Đăng tập tin" class="btn btn-default  pull-right"><i class="fa fa-upload text-primary mgr5"></i>Đăng tập tin</button>
   <button id="btnCreateFolder" type="button" title="Tạo thư mục" class="btn btn-default  pull-right mgr5"><i class="fa fa-folder text-warning mgr5"></i>Tạo thư mục</button>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('document-body'); ?>
    <div id="divW76F2150">
        <div class="row form-group">
            <div class="col-sm-12">
                <?php echo $__env->make('page.content.alert-dismissible', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <div id="bootstrap-data-table_wrapper"
             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary" style="padding-left: 0px; padding-right: 0px;">
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table"
                           class="table table-striped table-bordered dataTable no-footer table-hover" role="grid"
                           aria-describedby="bootstrap-data-table_info">
                        <thead>
                        <tr role="row" class="verticle-align-middle">

                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                style="width: 15%">Tên
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 15%;">Người tạo
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 10%;">Ngày tạo
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 15%;">Người sửa cuối
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 10%;">Ngày sửa cuối
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                style="width: 1%">#
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $documentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr role="row" class="odd bi-table-item type-folder verticle-align-middle">
                                <td>
                                    <a href="<?php echo e(url('/W76F2150/?currentFolderID=').$row->ID); ?>">
                                        <span class="folder-icon"><img src="http://eoffice.local/media/default_folder_icon.png" alt=""></span>
                                        <?php echo e($row->FolderName); ?>

                                    </a>
                                </td>
                                <td><?php echo e($row->CreateUserID); ?></td>
                                <td><?php echo e($row->CreateDate); ?></td>
                                <td><?php echo e($row->LastModifyUserID); ?></td>
                                <td><?php echo e($row->LastModifyDate); ?></td>
                                <td><button id="btnDeleteFolder" type="button" title="Xoá thư mục" class="btn btn-default  pull-right mgr5"><i class="fa fa-trash text-red mgr5"></i></button></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot class="hide">
                        <tr role="row" class="odd bi-table-item type-folder">
                            <td colspan="6">
                                <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-warning">Lưu ý</span> Thư mục này trống
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnCreateFolder").click(function(evt){
            var instance = $('#jstree').jstree(true);
            var selectedNode =  instance.get_selected();
            hideAlert($("#divW76F2150"));
            if (selectedNode.length == 0){
                alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
            }else{

                //window.location.href = '<?php echo e(url("/W76F2150/create-folder")); ?>' + "/?currentFolderID=" + selectedNode[0];
                showFormDialogPost('<?php echo e(url("/W76F2150/create-folder")); ?>', 'popCreateFolder', {_token: '<?php echo e(csrf_token()); ?>', currentFolderID: selectedNode[0]}, null, null, function (res) {

                });
            }


        });

        $("#btnUploadFile").click(function(evt){
            var instance = $('#jstree').jstree(true);
            var selectedNode =  instance.get_selected();
            hideAlert($("#divW76F2150"));
            if (selectedNode.length == 0){
                alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
            }else{

                //window.location.href = '<?php echo e(url("/W76F2150/create-document")); ?>' + "/?currentFolderID=" + selectedNode[0];
                showFormDialogPost('<?php echo e(url("/W76F2150/create-document")); ?>', 'popCreateDocument', {_token: '<?php echo e(csrf_token()); ?>', currentFolderID: selectedNode[0]}, null, null, function (res) {
                    //merge

                });

            }
        });



        
            
            
            
                
                    
                
            
            
            
                

                
            
                

            
        
    });
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('system.module.W76.W76F2150.components.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
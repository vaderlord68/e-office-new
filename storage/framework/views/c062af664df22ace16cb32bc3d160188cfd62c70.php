<?php $__env->startSection("folderView"); ?>
    ##parent-placeholder-9f3e12f98d9ee531c43b3db281a9fcf165eca90f##
    <div class="card">
        <?php $__env->startSection("rightToolbar"); ?>
            <?php echo $__env->make("system.module.bi.rightToolbar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
        <div class="card-body">

            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="bootstrap-data-table"
                               class="table table-striped table-bordered dataTable no-footer table-hover" role="grid"
                               aria-describedby="bootstrap-data-table_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 5%">
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 20%">Tên
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Mô tả
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Người tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Ngày tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Người sửa cuối
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                    rowspan="1" colspan="1"
                                    style="width: 10%;">Ngày sửa cuối
                                </th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            /** List all folders */
                            if (count($childFolders) > 0) :
                            ?>
                            <?php
                            foreach ($childFolders as $folder) :
                            ?>
                            <?php
                            ?>
                            <tr role="row" class="odd bi-table-item type-folder" folder_id="<?php  echo $folder->ID?>">
                                <td></td>
                                <td><span class="folder-icon"><img src="<?php echo e(asset("/media/default_folder_icon.png")); ?>"
                                                                   alt=""></span><?php echo isset($folder->FolderName) ? $folder->FolderName : ""?>
                                </td>
                                <td><?php echo isset($folder->FolderDescription) ? $folder->FolderDescription : ""?></td>
                                <td><?php echo $folder->CreateUserID ? $folder->CreateUserID : ""?></td>
                                <td><?php echo $folder->CreateDate?></td>
                                <td><?php echo isset($folder->LastModifyUserID) ? $folder->LastModifyUserID : ""?></td>
                                <td><?php echo $folder->LastModifyDate?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            <?php endif;?>

                            <?php
                            /** List all documents */
                            if (count($childDocuments) > 0) :
                            ?>
                            <?php
                            foreach ($childDocuments as $document) :
                            ?>
                            <?php
                            ?>
                            <tr role="row" class="odd bi-table-item type-document" document_id="<?php  echo $document->ID?>">
                                <td style="text-align: center; vertical-align: middle">
                                    <span class="shareDocument" data-id="<?php echo e(isset($document->ID) ? $document->ID : ''); ?>"><i class="far fa-share"></i></span>
                                </td>
                                <td><span class="folder-icon"><img src="<?php echo e(asset("/media/default_document_icon.png")); ?>"
                                                                   alt=""></span><?php echo isset($document->ID) ? $document->FileName : ""?>
                                </td>
                                <td><?php ?></td>
                                <td><?php echo $document->CreateUserID ? $document->CreateUserID : ""?></td>
                                <td><?php echo $document->CreateDate?></td>
                                <td><?php echo isset($document->LastModifyUserID) ? $document->LastModifyUserID : ""?></td>
                                <td><?php echo $document->LastModifyDate?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            <?php endif;?>


                            </tbody>
                        </table>
                        <?php if ((count($childFolders) == 0) && (count($childDocuments) == 0)) :?>
                        <div class="col-sm-12">
                            <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-warning">Lưu ý</span> Thư mục này trống
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="popover-share hide">
                <?php echo $__env->make('system.module.bi.shareDocument', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
            </div>
        </div>
    </div>
    <script>
        //Bi
        //share document....
        $('.shareDocument').on('click', function () {
            var item_id = $(this).data('id');

            $.ajax({
                method: 'POST',
                url: '<?php echo e(url('/bi/folder/share')); ?>',
                data: {item_id: item_id, _token: '<?php echo e(csrf_token()); ?>'},
                success: function (data) {
                    $('.popover-share').html(data);
                    $(this).popover({
                        placement: "bottom",
                        trigger: "click",
                        html: true,
                        content: $('.popover-share').html()
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('system.module.bi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
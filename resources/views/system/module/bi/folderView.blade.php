<div class="card">
    <div class="card-header">
        <div class="left-table-header">
            <a id="bi-createFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-plus-circle"></i> Thêm mới</a>
            <a id="bi-openFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-folder-open"></i> Mở</a>
            <a id="bi-renameFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-pencil-square-o"></i> Đổi tên</a>
            <a id="bi-deleteFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-times-circle"></i> Xóa</a>
        </div>
        <div class="right-table-header">
            <input type="search" class="form-control form-control-sm searh-form" placeholder="Nhập từ khóa để tìm kiếm" aria-controls="bootstrap-data-table">
        </div>
    </div>
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
                                style="width: 20%">Tên
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
                            foreach ($childFolders as $folder) :
                        ?>
                        <tr role="row" class="odd">
                            <td><?php echo $folder->FolderName?></td>
                            <td><?php echo $folder->CreateUserID?></td>
                            <td><?php echo $folder->CreateDate?></td>
                            <td><?php echo $folder->LastModifyUserID?></td>
                            <td><?php echo $folder->LastModifyDate?></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
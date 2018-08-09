<?php
if (session()->get("parentFolderId")) {
    $parentFolderId = session("parentFolderId");
    echo "
<script>
var parentFolderId = '$parentFolderId';
</script>
";
    session()->remove("parentFolderId");
}
?>
<div class="card">
    <div class="card-header">
        <div class="left-table-header">
            <a id="bi-backFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-arrow-left"></i> Lùi lại</a>
            <a id="bi-createFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-plus-circle"></i> Thêm mới</a>
            <a id="bi-openFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-folder-open"></i> Mở</a>
            <a id="bi-renameFolder" class="toolbar-btn action-on-header" href="#">
                <i class="fa fa-pencil-square-o"></i> Đổi tên</a>
            <a id="deleteFolder" class="toolbar-btn action-on-header" href="#" type="button" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-times-circle"></i> Xóa</a>
        </div>
        <div class="right-table-header">
            <input type="search" class="form-control form-control-sm searh-form" placeholder="Nhập từ khóa để tìm kiếm"
                   aria-controls="bootstrap-data-table">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Xác nhận xóa thư mục này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="bi-deleteFolder">Đồng ý</button>
                </div>
            </div>
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
                        <?php if (count($childFolders) > 0) :?>
                        <?php
                        foreach ($childFolders as $folder) :
                        ?>
                        <?php
                        ?>
                        <tr role="row" class="odd bi-table-item" folder_id="<?php  echo $folder->ID?>">
                            <td><span class="folder-icon"><img src="{{ asset("/media/default_folder_icon.png") }}" alt=""></span><?php echo isset($folder->FolderName) ? $folder->FolderName: ""?></td>
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
                        </tbody>
                    </table>
                    <?php if (count($childFolders) == 0) :?>
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
    </div>
</div>
<style>
    .folder-icon img {
        height: 48px;
        margin-right: 10px;
    }
    .folder-icon img:hover {
        opacity: 0.6;
        transition: 0.3s;
        cursor: pointer;
    }
</style>
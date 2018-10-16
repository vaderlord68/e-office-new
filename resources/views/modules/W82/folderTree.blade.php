<div class="card">
    <div class="card-header">
        <i class="custom-jtree-icon"></i>
        <strong class="card-title">Quản lý thư mục</strong>
        <button id="bi-createFolder"  class="btn btn-outline-info pull-right" type="button"><i class="fa fa-plus-circle mgr5"></i>Thêm mới</button>
        <div class="tree-tool-bar hide">
            <a id="bi-createFolder" class="toolbar-btn action-on-header" href="">
                <i class="fa fa-plus-circle"></i> Thêm mới</a>
            <a id="bi-renameFolder" class="toolbar-btn action-on-header" href="">
                <i class="fa fa-pencil-square-o"></i> Đổi tên</a>
            <a id="deleteFolder" class="toolbar-btn action-on-header" href=""  data-toggle="modal" data-target="#deleteModal">
                <i class="fa fa-times-circle"></i> Xóa</a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="">Tài liệu ưa thích</h5>
        <div id="folder-tree-loading" class="hide">
            <img src="{{asset("media/loading_icon.gif")}}" class="hide" alt="" style="">
        </div>
        <div id="folderTree" style="display:none">
            {!!html_entity_decode($folderTree)!!}
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        //$(".folder-tree-loading").removeClass('hide').fadeIn();
    });
</script>
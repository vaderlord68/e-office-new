<div class="card-header">
    <div class="left-table-header">
        <?php if (!isset($searchView)) : ?>
        <a id="bi-createDocument" class="toolbar-btn action-on-header" href="/bi/module/document/new">
            <i class="fa fa-plus-circle"></i> Thêm tài liệu</a>
        <div>
            <span>
                <?php echo $currentDirectoryPath?>
            </span>
        </div>
        <?php endif;?>
    </div>
    <div class="right-table-header">
        <form action="/bi/folder/search" method="POST">
            <input type="search" class="form-control form-control-sm searh-form" placeholder="Nhập từ khóa để tìm kiếm"
                   aria-controls="bootstrap-data-table" name="keyword">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
</div>
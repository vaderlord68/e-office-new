<div class="card-header">
    <div class="left-table-header">
        <?php if (!isset($searchView)) : ?>
        <a id="bi-createDocument" class="toolbar-btn action-on-header" href="/bi/module/document/new">
            <i class="fa fa-plus-circle"></i> Thêm tài liệu</a>
        <div id="bi-folder-path">
            <?php foreach ($currentDirectoryPath as $item):?>
                <span><?php echo $item['name']?></span><strong class="path-separator">/</strong>
            <?php endforeach;?>
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
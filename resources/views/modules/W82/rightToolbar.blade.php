<div class="card-header">
    <div class="left-table-header">
        <div class="row">
            <div class="col-sm-6">
                <?php if (!isset($searchView)) : ?>
                <button id="bi-createDocument" class="btn btn-outline-info" type="button"><i
                            class="fa fa-plus-circle mgr5"></i><a style="text-decoration: none" href="/bi/module/document/new">Thêm tài liệu</a>
                </button>
                <a id="bi-createDocument" class="toolbar-btn action-on-header hide" href="/bi/module/document/new">
                    <i class="fa fa-plus-circle"></i> Thêm tài liệu</a>
                <div id="bi-folder-path" class="hide">
                    <?php foreach ($currentDirectoryPath as $item):?>
                    <span><?php echo $item['name']?></span><strong class="path-separator">/</strong>
                    <?php endforeach;?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-sm-6">
                <form action="/bi/folder/search" method="POST">
                    <input type="search" class="form-control" placeholder="Nhập từ khóa để tìm kiếm"
                           aria-controls="bootstrap-data-table" name="keyword">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>

    </div>
    <div class="right-table-header">

    </div>
</div>
<div class="card-header">
    <div class="left-table-header">
        <div class="col-md-12">
            <?php if (isset($FolderParentID)) :?>
            <a class="saveBtn-right-toolbar hide" href="#" id="submitCreateDocumentForm">Lưu</a>
            <button id="submitCreateDocumentForm" class="btn btn-outline-info" type="button"><i
                        class="fa fa-save  mgr5"></i><a style="text-decoration: none" href="#">Lưu</a>
            </button>
            <?php else:?>
            <a class="saveBtn-right-toolbar hide" href="/bi/document/edit?documentID=<?php echo $documentID?>"
               id="editDocument">Sửa</a>
            <button id="editDocument" class="btn btn-outline-info" type="button"><i
                        class="fa fa-edit  mgr5"></i><a style="text-decoration: none"
                                                              href="/bi/document/edit?documentID=<?php echo $documentID?>">Sửa</a>
            </button>
            <?php endif;?>
            <a class="cancelBtn-right-toolbar hide" href="#" onclick="history.back();">Quay lại</a>
            <button id="editDocument" class="btn btn-outline-info" type="button" onclick="history.back();"><i
                        class="fa fa-arrow-left  mgr5"></i><a style="text-decoration: none"
                                                              href="#">Quay lại</a>
            </button>
        </div>
    </div>
</div>
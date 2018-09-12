<?php
?>
@extends('system.module.bi')
@section("folderView")
    @parent
    <div class="card">
        @section("rightToolbar")
            @include("system.module.bi.documentRightToolbar" , ["FolderParentID" => $currentDocument->FolderID])
        @show
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="processDocument" action="/bi/document/edit/execute" method="post"
                              enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well-block">
                                            <!-- Form start -->
                                            <input type="hidden" value="<?php echo (string)$currentDocumentID?>"
                                                   name="ID">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentName">Tên tài
                                                            liệu</label>
                                                        <input class="form-control input-md" type="text"
                                                               id="DocumentName" name="DocumentName"
                                                               placeholder="Tên tài liệu"
                                                               value="<?php echo isset($currentDocument->Name) ? $currentDocument->Name : ""?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="StatusID">Phát hành</label>
                                                        <input
                                                            <?php echo $currentDocument->StatusID ? "checked" : ""?> type="checkbox"
                                                            id="StatusID" name="StatusID" class="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentContent">Nội
                                                            dung</label>
                                                        <textarea id="documentContent" name="DocumentContent"
                                                                  class="form-control input-md" rows="10" cols="10"
                                                                  style="resize: none; min-height: 300px">
                                                            <?php echo $currentDocument->Content?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <?php
                                                $attachedFiles = json_decode($currentDocument->AttachedFiles);
                                                if (isset($attachedFiles) && count($attachedFiles) > 0):
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <label class="control-label" for="DocumentContent">Những file đã
                                                            đính kèm</label>
                                                        <ul class="document-list list-attached-file">
                                                            <?php
                                                            foreach ($attachedFiles as $attachedFile) :
                                                            ?>
                                                            <?php
                                                            $attachedFileArg = explode("/",$attachedFile)
                                                            ?>
                                                            <li>
                                                                <a href="/storage/users-upload/<?php echo $attachedFile?>"><?php echo $attachedFileArg[1]?></a>
                                                                <a class="delete-file-link"
                                                                   href="/bi/document/deleteAttachment/<?php echo $currentDocumentID?>/<?php echo base64_encode($attachedFile)?>">
                                                                    Xóa
                                                                </a>
                                                            </li>
                                                            <?php endforeach;
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php
                                                endif;
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="form-group attachedFiles">
                                                        <label class="control-label" for="DocumentContent">Chọn file đính kèm</label>
                                                        <a id="bi-addFile" class="toolbar-btn action-on-header" href="">
                                                            <i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="DocumentContent">Tài liệu liên
                                                            quan</label>
                                                        <?php
                                                        if (isset($relatedDocuments) && is_a($relatedDocuments,"Illuminate\Support\Collection") && count($relatedDocuments) > 0) :
                                                        ?>
                                                        <ul class="document-list related-document-list">
                                                            <?php
                                                            foreach ($relatedDocuments as $relatedDocument) :
                                                            ?>
                                                            <li>
                                                                <a href="/bi/document/view?DocumentId=<?php echo $relatedDocument->ID?>"><?php echo isset($relatedDocument->Name) ? $relatedDocument->Name : ""?></a>
                                                            </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <?php
                                                        endif;
                                                        ?>
                                                        <button class="form-control input-md saveBtn-right-toolbar" data-toggle="modal"
                                                                data-target="#relatedDocumentModal" type="button"
                                                                id="documentRelated" name="DocumentRelated"
                                                                class="btn btn-info form-control input-md"
                                                                style="width: 100px;">Sửa
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- form end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @include("system.module.bi.relatedDocumentPopup", ["AllDocuments" => $AllDocuments, "AllRelatedDocuments" => $AllRelatedDocuments])
        @include("system.module.bi.script.documentCreateScript")
    </div>
@stop


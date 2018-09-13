@extends('system.module.bi')
@section("folderView")
    @parent
    <div class="card">
        @section("rightToolbar")
            @include("system.module.bi.documentRightToolbar", ["documentID" => $documentID])
        @show
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?php echo isset($document->Name) ? $document->Name : ""?></h1>
                        <div>
                            <strong>Ngày tạo: </strong><span><?php echo date("Y-m-d",strtotime($document->CreateDate))?></span>
                            <strong>Ngày sửa cuối: </strong><span><?php echo  date("Y-m-d",strtotime($document->LastModifyDate))?></span>
                        </div>
                        <div>
                            <strong>Người tạo: </strong><span><?php echo $document->CreateUserID?></span><strong>Người
                                sửa cuối: </strong><span><?php echo $document->LastModifyUserID?></span>
                        </div>
                        <p>
                            <?php
                            echo $document->Content;
                            ?>
                        </p>
                        <?php
                        $attachedFiles = json_decode($document->AttachedFiles);
                        if (is_array($attachedFiles) && count($attachedFiles) > 0):
                        ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="DocumentContent">Những file đã đính kèm</label>
                                <ul class="document-list list-attached-file">
                                    <?php

                                    foreach ($attachedFiles as $attachedFile) :
                                    ?>
                                    <li>
                                        <a href="/storage/users-upload/<?php echo $attachedFile?>"><?php echo $attachedFile?></a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php
                        if (isset($relatedDocuments) && is_a($relatedDocuments,"Illuminate\Support\Collection") && count($relatedDocuments) > 0) :
                            ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="DocumentContent" class="control-label">Các tài liệu liên quan</label>
                                <ul class="document-list">
                                    <?php
                                    foreach ($relatedDocuments as $relatedDocument) :
                                    ?>
                                    <li>
                                        <a href="/bi/document/view?DocumentId=<?php echo $relatedDocument->ID?>"><?php echo $relatedDocument->Name?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
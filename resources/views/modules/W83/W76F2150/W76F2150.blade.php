@extends('modules.W83.W76F2150.components.layout')
@section('document-header')
    <button id="btnUploadFile" type="button" title="Đăng tập tin" class="btn btn-default  pull-right"><i
                class="fa fa-upload text-primary mgr5"></i>Đăng tập tin
    </button>
@stop
@section('document-body')
    <div id="divW76F2150">
        <div class="row form-group hide">
            <div class="col-sm-12">
                @include('page.content.alert-dismissible')
            </div>
        </div>
        <div id="bootstrap-data-table_wrapper"
             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary"
             style="padding-left: 0px; padding-right: 0px;">
            <div class="row">
                <div class="col-sm-12">
                    <div id="dataGrid"></div>
                    <table id="tblW76F2150"
                           class="table table-striped table-bordered dataTable no-footer table-hover hide" role="grid"
                           aria-describedby="bootstrap-data-table_info">
                        <thead>
                        <tr role="row" class="verticle-align-middle">

                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                style="width: 15%">Tên
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 15%;">Người tạo
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 10%;">Ngày tạo
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 15%;">Người sửa cuối
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1"
                                style="width: 10%;">Ngày sửa cuối
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                style="width: 1%">#
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documentList as $row)
                            <tr role="row" class="odd bi-table-item type-folder verticle-align-middle">
                                <td>
                                    <a href="{{url('/W76F2150/?currentFolderID=').$row->ID}}">
                                        <span class="folder-icon"><img
                                                    src="http://eoffice.local/media/default_folder_icon.png"
                                                    alt=""></span>
                                        {{$row->FolderName}}
                                    </a>
                                </td>
                                <td>{{$row->CreateUserID}}</td>
                                <td>{{$row->CreateDate}}</td>
                                <td>{{$row->LastModifyUserID}}</td>
                                <td>{{$row->LastModifyDate}}</td>
                                <td>
                                    <button id="btnDeleteFolder" type="button" title="Xoá thư mục"
                                            class="btn btn-default  pull-right mgr5"><i
                                                class="fa fa-trash text-red mgr5"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="hide">
                        <tr role="row" class="odd bi-table-item type-folder">
                            <td colspan="6">
                                <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-warning">Lưu ý</span> Thư mục này trống
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">

        function showFormCreateDocument(file) {
            var instance = $('#jstree').jstree(true);
            var selectedNode = instance.get_selected();
            hideAlert($("#divW76F2150"));
            if (selectedNode.length == 0) {
                alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
            } else {

                //window.location.href = '{{url("/W76F2150/create-document")}}' + "/?currentFolderID=" + selectedNode[0];
                showFormDialogPost('{{url("/W76F2150/create-document")}}', 'popCreateDocument', {
                    _token: '{{csrf_token()}}',
                    currentFolderID: selectedNode[0],
                    file: file
                }, function () {
                    //alert("test");
                    console.log(file);
                    //$("#attFile").val(file);
                    //document.getElementById("attFile").value = file;
                }, null, function (res) {
                    //merge

                });

            }
        }

        $(function () {
            <?php

            \Debugbar::info($documentList);
            ?>
            $("#dataGrid").dxDataGrid({
                width: "100%",
                height: $(document).height() - 300,
                paging: {
                    pageSize: 10
                },
                pager: {
                    showPageSizeSelector: true,
                    allowedPageSizes: [10, 25, 50, 100]
                },
                remoteOperations: false,
                searchPanel: {
                    visible: true,
                    highlightCaseSensitive: true
                },
                selection: {
                    mode: "single"
                },
                allowColumnReordering: true,
                allowColumnResizing: true,
                columnAutoWidth: true,
                hoverStateEnabled: true,
                showBorders: true,
                showColumnLines: true,
                showRowLines: true,
                rowAlternationEnabled: true,
                dataSource: {!! json_encode($documentList) !!},
                keyExpr: "ID",
                columnChooser: {
                    enabled: true
                },
                loadPanel: {
                    enabled: true
                },
                columns: [

                    {
                        caption: 'Tên',
                        dataField: "Description",
                        dataType: "string",
                        width: 230,
                        alignment: "left",
                        cellTemplate: function (container, options) {
                            console.log(options);
                            if (options.data.Type == 'Folder'){
                                $("<div>")
                                    .append($("<i>", {
                                        "class": 'fa fa-folder text-primary mgr10',
                                        'style': 'font-size: 150%'
                                    }))
                                    .append(options.value)
                                    .appendTo(container);
                            }else{
                                $("<div>")
                                    .append($("<i>", {
                                        "class": 'fa fa-file text-text mgr10',
                                        'style': 'font-size: 150%'
                                    }))
                                    .append(options.value)
                                    .appendTo(container);
                            }

                        }
                    },
                    {
                        caption: 'Người tạo',
                        dataField: "CreateUserID",
                        dataType: "string",
                        width: 150,
                        alignment: "left"
                    }
                    , {
                        caption: 'Ngày tạo',
                        dataField: "CreateDate",
                        dataType: "date",
                        width: 200,
                        alignment: "center"
                    },
                    {
                        caption: 'Người cập nhật',
                        dataField: "LastModifyUserID",
                        dataType: "string",
                        width: 150,
                        alignment: "left"
                    }
                    , {
                        caption: 'Ngày cập nhật',
                        dataField: "LastModifyDate",
                        dataType: "date",
                        width: 200,
                        alignment: "center"
                    }
                ],
                onToolbarPreparing: function (e) {
                    var dataGrid = e.component;

                    e.toolbarOptions.items.unshift(
//                        {
//                            location: "before",
//                            template: function () {
//                                return $("<div/>")
//                                    .addClass("cursor-pointer")
//                                    .append($("<i>", {
//                                        "class": 'fa fa-plus  text-primary mgr10',
//                                        'style': 'font-size: 100%'
//                                    }))
//                                    .append(
//                                        $("<span />")
//                                            .text("Đăng tài liệu")
//                                    );
//
//                            }
//                        }
                         {
                            location: "after",
                            widget: "dxButton",
                             placeholder: "Đăng tài liệu",
                            options: {
                                icon: "upload",
                                onClick: function () {
                                    showFormCreateDocument();
                                }
                            }
                        }
                        , {
                            location: "after",
                            widget: "dxButton",
                            options: {
                                icon: "refresh",
                                onClick: function () {
                                    dataGrid.refresh();
                                }
                            }
                        });
                }
            });
        });

        $(document).ready(function () {
            $("#btnCreateFolder").click(function (evt) {

            });

            $("#btnUploadFile").click(function (evt) {
                showFormCreateDocument();
            });


            var holder = document.getElementById('tblW76F2150');
            holder.ondragover = function () {
                $(this).addClass('hover');
                return false;
            };
//        holder.onmouseout = function () {
//            $(this).removeClass('hover');
//            return false;
//        };
            holder.ondrop = function (e) {
                e.preventDefault();
                $(this).removeClass('hover');
                console.log("sdfdf");
                var file = e.dataTransfer.files[0];
                showFormCreateDocument(file);

                var reader = new FileReader();
                //reader.onload = function (event) {
                //$('#image_droped').attr('src', event.target.result);
                //};
                //reader.readAsDataURL(file);
            };

            {{--$("#btnDeleteFolder").click(function(evt){--}}
            {{--console.log("dfdsf");--}}
            {{--var idList = [];--}}
            {{--$.each($(".chkIDList"), function( index, el ) {--}}
            {{--if ($(el).is(":checked")){--}}
            {{--idList.push($(el).val());--}}
            {{--}--}}
            {{--});--}}
            {{--idList.push()--}}
            {{--if (idList.length > 0){--}}
            {{--postMethod('{{url("W76F2150/delete-folder")}}', function(res){--}}

            {{--},{idList: JSON.stringify(idList), _token: "{{csrf_token()}}"})--}}
            {{--}else{--}}
            {{--alertError("Bạn chưa chọn thư mục nào để xoá.")--}}

            {{--}--}}
            {{--});--}}
        });
    </script>
@stop

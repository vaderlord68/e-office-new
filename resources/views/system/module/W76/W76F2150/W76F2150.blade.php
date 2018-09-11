@extends('system.module.W76.W76F2150.components.layout')
@section('document-header')
   <button id="btnUploadFile" type="button" title="Đăng tập tin" class="btn btn-default  pull-right"><i class="fa fa-upload text-primary mgr5"></i>Đăng tập tin</button>
   <button id="btnCreateFolder" type="button" title="Tạo thư mục" class="btn btn-default  pull-right mgr5"><i class="fa fa-folder text-warning mgr5"></i>Tạo thư mục</button>
@stop
@section('document-body')
    <div id="divW76F2150">
        <div class="row form-group">
            <div class="col-sm-12">
                @include('page.content.alert-dismissible')
            </div>
        </div>
        <div id="bootstrap-data-table_wrapper"
             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary" style="padding-left: 0px; padding-right: 0px;">
            <div class="row">
                <div class="col-sm-12">
                    <table id="bootstrap-data-table"
                           class="table table-striped table-bordered dataTable no-footer table-hover" role="grid"
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
                                        <span class="folder-icon"><img src="http://eoffice.local/media/default_folder_icon.png" alt=""></span>
                                        {{$row->FolderName}}
                                    </a>
                                </td>
                                <td>{{$row->CreateUserID}}</td>
                                <td>{{$row->CreateDate}}</td>
                                <td>{{$row->LastModifyUserID}}</td>
                                <td>{{$row->LastModifyDate}}</td>
                                <td><button id="btnDeleteFolder" type="button" title="Xoá thư mục" class="btn btn-default  pull-right mgr5"><i class="fa fa-trash text-red mgr5"></i></button></td>
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
    $(document).ready(function(){
        $("#btnCreateFolder").click(function(evt){
            var instance = $('#jstree').jstree(true);
            var selectedNode =  instance.get_selected();
            hideAlert($("#divW76F2150"));
            if (selectedNode.length == 0){
                alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
            }else{

                //window.location.href = '{{url("/W76F2150/create-folder")}}' + "/?currentFolderID=" + selectedNode[0];
                showFormDialogPost('{{url("/W76F2150/create-folder")}}', 'popCreateFolder', {_token: '{{csrf_token()}}', currentFolderID: selectedNode[0]}, null, null, function (res) {

                });
            }


        });

        $("#btnUploadFile").click(function(evt){
            var instance = $('#jstree').jstree(true);
            var selectedNode =  instance.get_selected();
            hideAlert($("#divW76F2150"));
            if (selectedNode.length == 0){
                alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
            }else{

                //window.location.href = '{{url("/W76F2150/create-document")}}' + "/?currentFolderID=" + selectedNode[0];
                showFormDialogPost('{{url("/W76F2150/create-document")}}', 'popCreateDocument', {_token: '{{csrf_token()}}', currentFolderID: selectedNode[0]}, null, null, function (res) {
                    //merge

                });

            }
        });



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

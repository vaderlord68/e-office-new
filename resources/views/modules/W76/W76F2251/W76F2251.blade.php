@extends('layouts.layout')

@section('toolbar')
    <a class="btn" href="{{url('/W76F2251/save')}}">
        <i class="fal fa-save text-primary mgr5 text-bold"></i>Lưu
    </a>

    <a class="btn" href="{{url('/W76F2251/savenext')}}">
        <i class="fal fa-arrow-circle-right mgr5 text-bold"></i>Nhập tiếp
    </a>

    <a class="btn" href="#">
        <i class="fal fa-reply text-orangered rotateY180 text-bold"></i>
         Chuyển xử lý
    </a>

    <a class="btn" href="{{url('/W76F2250')}}">
        <i class="fal fa-arrow-circle-left text-orangered text-bold"></i>
         Quay lại
    </a>

    <a class="btn" href="{{url('/W76F2250')}}">
        <i class="fas fa-window-close text-orangered text-bold"></i>
         Đóng
    </a>
@stop

@section('content')
    @parent


    <div class="row hide">
        <div class="col-sm-12">
            <input type="text" id="txtSearch" name="txtSearch"/>
        </div>
    </div>
    <div class="row hide">
        <div class="col-sm-12">
            <div id="jstree" style="margin:5px auto;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header hide">
                    <strong>Cập nhật văn bản đến</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Số</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="txtDocNo" type="text" name="txtDocNo"
                                       placeholder="" autofocus autocomplete="off" required>
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Đơn vị</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="txtDivisionID" type="text" name="txtDivisionID"
                                       placeholder="" autocomplete="off" readonly>
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Nhóm văn bản</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="cboDocGroupID" name="cboDocGroupID" placeholder=""
                                        autocomplete="off" required>
                                    <option value="">--</option>
                                    @foreach($cboDocGroupID as $row)
                                        <option value="{{$row->CodeID}}">{{$row->CodeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Văn bản liên quan</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="txtRefDocNo" type="text" name="txtRefDocNo"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Cơ quan gửi</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="txtOrganization" type="text" name="txtOrganization"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Ngày nhận</label>
                            <div class="col-sm-2">
                                <div class="input-group ">
                                    <input class="form-control " id="dtpReceiverDate" type="text" name="dtpReceiverDate"
                                           placeholder="" autocomplete="off" required>
                                    <div class="input-group-append" onclick="$('#dtpReceiverDate').datepicker('show')">
                                            <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Độ khẩn cấp</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="cboEmergency" name="cboEmergency" placeholder=""
                                        autocomplete="off">
                                    <option value="">--</option>
                                    @foreach($cboEmergency as $row)
                                        <option value="{{$row->CodeID}}">{{$row->CodeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Độ bảo mật</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="cboSecurity" name="cboSecurity" placeholder=""
                                        autocomplete="off">
                                    <option value="">--</option>
                                    @foreach($cboSecurity as $row)
                                        <option value="{{$row->CodeID}}">{{$row->CodeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <button id="btnAttachment" class="btn btn-square btn-block btn-secondary" type="button">
                                    <i
                                            class="far fa-paperclip mgr5"></i>Đính kèm
                                </button>
                            </div>
                            <div class="col-sm-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Trích yếu</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="txtContent" name="txtContent" rows="9"
                                          placeholder="Content.." required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Người xử lý</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="txtProcessUser" name="txtProcessUser[]" placeholder="" required multiple="multiple">
                                    @foreach($processUserList as $row)
                                        <option value="{{$row->OrgunitID}}">{{$row->OrgunitName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="employees"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('#txtProcessUser').select2().on("change", function (e) {
                var arr = $(this).val();
                //var data = $("#employees").dxTreeList("getDataSource");
                var instance =$("#employees").dxTreeList("instance");
                var items = instance.getDataSource().items();
                data[0].TypeHandle = 1;
                instance.refresh();
            });

            $('#dtpReceiverDate').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '{{Helpers::getLocale()}}'
            });
        });

        var data = {!! $treeViewData !!};
        setTimeout(function () {
            console.log(data);
            $("#employees").dxTreeList({
                dataSource: data,
                keyExpr: "OrgunitID",
                parentIdExpr: "OrgunitParentID",
                showRowLines: true,
                showColumnLines: true,
                showBorders: true,
                wordWrapEnabled: true,
                columnAutoWidth: true,
                autoExpandAll: true,
                twoWayBindingEnabled: true,
                selection: {
                    mode: "single"
                },
                searchPanel: {
                    visible: true,
                    width: 250
                },
                headerFilter: {
                    visible: false
                },
                columnChooser: {
                    enabled: false
                },
                columns: [
                    {
                        dataField: "OrgunitName",
                        caption: "Cơ cấu tổ chức",
                        allowEditing: false,
                        alignment: "left",
                        cellTemplate: function (container, options) {
                            var rowData = options.data;
                            if (rowData.IsEmployee == 1) {
                                container
                                    .append('<img src="{{asset('img/avatars/6.jpg')}}" width="25px0" height="25px" style="border-radius: 10px; margin-right: 8px;" />' + rowData.OrgunitName);
                            } else {
                                container
                                    .append(rowData.OrgunitName);
                            }
                        },
                        setCellValue: function (newData, value, currentRowData) {
                            console.log(newData);
                            //console.log(value);
                            //console.log(currentRowData);
                            //newData.Count = value;
                            //newData.TotalPrice = currentRowData.Price * value;
                        }
                    }
                    , {
                        caption: "Xử lý",
                        dataField: "TypeHandle",
                        aliasField: "TypeHandle1",
                        allowEditing: false,
                        alignment: "center",
                        width: 70,
                        cellTemplate: function (cellElement, cellInfo) {
                            console.log(cellInfo);
                            var checked = Number(cellInfo.value) == 1 ? 'checked' : '';
                            cellElement
                                .append('<input type="checkbox" ' + checked + ' />');
                        },
                    }
                    , {
                        caption: "Phối hợp",
                        dataField: "TypeHandle",
                        aliasField: "TypeHandle2",
                        allowEditing: false,
                        alignment: "center",
                        width: 80,
                        cellTemplate: function (cellElement, cellInfo) {
                            console.log(cellInfo);
                            var checked = Number(cellInfo.value) == 2 ? 'checked' : '';
                            cellElement
                                .append('<input type="checkbox" ' + checked + ' />');
                        },
                    }
                    , {
                        caption: "Để biết",
                        dataField: "TypeHandle",
                        aliasField: "TypeHandle3",
                        allowEditing: false,
                        alignment: "center",
                        width: 70,
                        cellTemplate: function (cellElement, cellInfo) {
                            console.log(cellInfo);
                            var checked = Number(cellInfo.value) == 3 ? 'checked' : '';
                            cellElement
                                .append('<input type="checkbox" ' + checked + ' />');
                        },
                    }
                ],
                expandedRowKeys: [1],
                onSelectionChanged: function (e) { // Handler of the "selectionChanged" event
                    var currentSelectedRowKeys = e.currentSelectedRowKeys;
                    var currentDeselectedRowKeys = e.currentDeselectedRowKeys;
                    var allSelectedRowKeys = e.selectedRowKeys;
                    var allSelectedRowsData = e.selectedRowsData;
                    console.log(e);
                },
                onContentReady: function (e) {
                    //alert("onContentReady");
                },
                onCellClick: function (e) {
                    var dataField = e.column.aliasField;
                    var rowData = e.data;
                    var cellElement = e.cellElement;

                    switch (dataField) {
                        case 'TypeHandle1':

                            if ($(cellElement).find('input').is(":checked")) {
                                rowData.TypeHandle = 1;
                            } else {
                                rowData.TypeHandle = 0;
                            }
                            e.component.refresh();
                            break;
                        case 'TypeHandle2':

                            if ($(cellElement).find('input').is(":checked")) {
                                rowData.TypeHandle = 2;
                            } else {
                                rowData.TypeHandle = 0;
                            }
                            e.component.refresh();
                            break;
                        case 'TypeHandle3':

                            if ($(cellElement).find('input').is(":checked")) {
                                rowData.TypeHandle = 3;
                            } else {
                                rowData.TypeHandle = 0;
                            }
                            e.component.refresh();
                            break;
                    }
                    console.log(e);

                },
                editing: {
                    mode: "cell",
                    //allowAdding: true,
                    allowUpdating: true,
                    //allowDeleting: true
                },
            });
        }, 10);

        function setValue(cellElement) {
//            if ($(cellElement).find('input').is(":checked")){
//                $(cellElement).find('input').prop("checked", false);
//            }else{
//                $(cellElement).find('input').prop("checked", true);
//            }
        }

        {{--$('#jstree').jstree({--}}
        {{--//"plugins" : [ "wholerow", "checkbox" ],--}}
        {{--'core': {--}}
        {{--'data': {!! $treeViewData !!},--}}
        {{--"multiple": false,--}}
        {{--"animation": 0,--}}
        {{--"themes": {--}}
        {{--"variant": "large",--}}
        {{--"icons": false--}}
        {{--}--}}

        {{--},--}}
        {{--node_customize: {--}}
        {{--default: function (el, node) {--}}
        {{--console.log("test");--}}
        {{--$(el).find('a').append("HELLO");--}}
        {{--}--}}
        {{--},--}}
        {{--plugins: ["themes", "html_data", "search", "adv_search", "node_customize"]--}}

        {{--});--}}

        {{--$("#txtSearch").keyup(function (event) {--}}
        {{--setTimeout(function (evt) {--}}
        {{--$("#jstree").jstree("search", $("#txtSearch").val());--}}
        {{--}, 1000);--}}
        {{--});--}}

        {{--$("#txtSearch").keypress(function (event) {--}}
        {{--if (event.keyCode == 13) {--}}
        {{--$("#jstree").jstree("search", $(this).val());--}}
        {{--}--}}
        {{--});--}}

        {{--$('#jstree').on('changed.redraw_node', function (node, deep, is_callback) {--}}
        {{--console.log(node);--}}
        {{--})--}}


        {{--$('#jstree').on('changed.jstree', function (e, data) {--}}
        {{--console.log(data);--}}
        {{--var i, j, r = [];--}}
        {{--for (i = 0, j = data.selected.length; i < j; i++) {--}}
        {{--var id = data.instance.get_node(data.selected[i]).id;--}}
        {{--console.log(id);--}}
        {{--}--}}

        {{--})--}}

        {{--$('#jstree').on('click.jstree', function (e, data) {--}}
        {{--var instance = $('#jstree').jstree(true);--}}
        {{--var selectedNode = instance.get_selected();--}}

        {{--})--}}
    </script>
    <style>
        #employees {
            max-height: 440px;
        }
    </style>
@stop
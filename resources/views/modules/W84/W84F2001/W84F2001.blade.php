@extends('modules.W84.W84F2001.components.layout')
{{--@section('toolbar')--}}
    {{--<div class="card-header">--}}
        {{--<div class="row form-group ">--}}
            {{--<div class="col-sm-12">--}}
                {{--<button type="button" class="btn btn-primary ">Quay lại</button>--}}
                {{--<button type="button" class="btn btn-primary ">Tạo mới</button>--}}
                {{--<button type="button" class="btn btn-primary ">Lưu</button>--}}
                {{--<button type="button" class="btn btn-error ">Xóa</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@stop--}}
@section('w84f2001')
    @parent

    <?php
    if ($task == 'add') {
        $projectID = '';
        $projectName = '';
        $statusID = '';
        $employeeID = '';
        $remark = '';
        $startDate = date("d/m/Y");
        $deadline =date("d/m/Y");
    } else {
        $projectID = $projectProp->ProjectID;
        $projectName = $projectProp->ProjectName;
        $statusID = $projectProp->StatusID;
        $employeeID = $projectProp->EmployeeID;
        \Debugbar::info($employeeID);
        $remark = $projectProp->Remark;
        $startDate = date("d/m/Y", strtotime(str_replace('/', '-', $projectProp->StartDate)));
        $deadline = $projectProp->Deadline!='' ? date("d/m/Y", strtotime(str_replace('/', '-', $projectProp->Deadline   ))) : '';

    }
    ?>
    <div id="W84F2001" class="card">
        <form id="frmW84F2001" class="form-horizontal">
            <input type="submit" name="btnSubmit" id="btnSubmit" class="hide">
            <input type="hidden" name="currentButton" id="currentButton" value="" class="hide">
        <div class="card-header">
            <div class="row ">
                <div class="col-sm-12">
                    <button id="btnBack" type="button" class="btn btn-primary "><i class="fas fa-arrow-left mgr5"></i>Quay lại</button>
                    <button id="btnNext" type="button" class="btn btn-primary hide"><i class="fas fa-plus mgr5"></i>Tạo mới</button>
                    <button id="btnSave" type="button" class="btn btn-success  "><i class="far fa-save mgr5"></i>Lưu</button>
                    <button id="btnDelete" type="button" class="btn btn-danger "><i class="fas fa-trash-alt mgr5"></i>Xóa</button>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row mgb5">
                <div class="col-sm-2">
                    <label class="lbl-normal">Tên</label>
                    <label class="lbl-normal" style="color: red">*</label>
                </div>
                <div class="col-sm-10">
                    <input id="txtProjectName" name="ProjectName" class="form-control" type="text" required>
                </div>
            </div>

            <div class="row mgb5">
                <div class="col-sm-2">
                    <label class="lbl-normal">Mã dự án</label>
                    <label class="lbl-normal" style="color: red">*</label>
                </div>
                <div class="col-sm-4">
                    <input id="txtProjectID" name="ProjectID" class="form-control" type="text" required>
                </div>

                <div class="col-sm-2">
                    <label class="lbl-normal">Trạng thái</label>
                </div>
                <div class="col-sm-4">
                    <select id="cboStatusID" name="StatusID" class="form-control">

                        @foreach($statusList as $row)
                            <option value="{{$row->CodeID}}"  {{!empty($row->CodeID == $statusID) ? 'selected':''}}>{{$row->CodeName}}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mgb5">
                <div class="col-sm-2">
                    <label class="lbl-normal">Người phụ trách</label>

                </div>
                <div class="col-sm-4">
                    <select type="text" name="EmployeeID" id="cboEmployeeID" class="form-control">
                        <option value="">--</option>
                        @foreach($empFollowList as  $empFollowItem)
                            <option value="{{$empFollowItem->EmployeeID}}"  {{$empFollowItem->EmployeeID == $employeeID ? 'selected' : ''}}
                                    data-position="{{$empFollowItem->PositionName}}"
                                    data-img="{{$empFollowItem->Thumnail}}">
                                {{$empFollowItem->EmployeeName}}</option>
                        @endforeach
                    </select>
                </div>


            </div>




            <div class="row mgb5">
                <div class="col-sm-2">
                    <label class="lbl-normal">Mô tả</label>

                </div>
                <div class="col-sm-10">
                    <textarea rows="3" class="form-control" id="txtRemark" name="Remark"
                              style="resize: none"></textarea>
                </div>
            </div>

            <div class="row mgb5">
                <div class="col-sm-2">
                    <label class="lbl-normal">{{Helpers::getRS("Ngay_bat_dau")}}</label>

                </div>
                <div class="col-sm-4">
                    <input name="StartDate" id="dateStartDate" class="form-control" value="{{$startDate}}">
                </div>

                <div class="col-sm-2">
                    <label class="lbl-normal">{{Helpers::getRS("Han_xu_ly")}}</label>
                </div>
                <div class="col-sm-4">
                    <input name="Deadline" id="dateDeadline" class="form-control" value="{{$deadline}}">
                </div>
            </div>

            <div class="row mgb5">
                <div class="col-sm-2">
                    <label class="lbl-normal">Thành viên</label>

                </div>
                <div class="col-sm-2">
                    <button type="button" id="btnAddEmp" class="btn btn-success "><i class="fas fa-plus mgr5"></i>Thêm thành viên</button>
                </div>

            </div>

            <div class="row mgb5">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <div id="gridContainer">

                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>



    <script>
        var masterData = {!! json_encode($members) !!} ;
        var roles = {!! json_encode($roles) !!} ;
        var task = '{{$task}}';

        var oldValue =[];

        function LoadEdit(){
            if (task!='add'){

                $('#txtProjectID').prop("readOnly",true);
                $('#txtProjectID').val('{{$projectID}}');
                $('#txtProjectName').val('{{$projectName}}');


                $('#txtRemark').text('{{$remark}}');
            }else {
                $( "#btnDelete" ).addClass( "hide" );
            }
            if (task=='view'){
                $('#btnSave').prop("disabled",true);
                $( "#btnDelete" ).addClass( "hide" );
            }
        }
        $('#btnAddEmp').click(function(){
            masterData.forEach(function(row) {
                oldValue.push(row.EmployeeID);
            });
            showFormDialogPost('{{url("W84F2001/selection")}}', "modalSelection",
                {
                    keyID: '',
                    oldValue : oldValue,
                    _token: '{{csrf_token()}}'

                }, null,null, function () {
                    var value = window.responseData;
                    var bAddNew = false;
                    var bExistRow = false;
                    console.log(value);

                    if (value.length>0) {
                        console.log(masterData);
                        if (masterData.length<=0){
                            bAddNew = true;
                        }else {
                            bAddNew = false;
                        }
                        console.log(masterData);
                        value.forEach(function(element) {
                        if (bAddNew){
                            masterData.push({EmployeeID: element.EmployeeID, EmployeeName: element.EmployeeName, RoleID: '', Thumnail:element.Thumnail});
                        }else{
                            masterData.forEach(function(row) {
                                if(row.EmployeeID == element.EmployeeID){
                                    bExistRow=true;
                                }
                            });

                            if (!bExistRow) {
                                masterData.push({
                                    EmployeeID: element.EmployeeID,
                                    EmployeeName: element.EmployeeName,
                                    RoleID: '',
                                    Thumnail: element.Thumnail
                                });
                            }
                            else {
                                bExistRow = false;
                            }
                        }

                        });
                        $("#gridContainer").dxDataGrid({
                            dataSource: masterData
                        });
                        $("#gridContainer").dxDataGrid("refresh");
                        bAddNew = false;
                        console.log(masterData);
                    }
                });
        });

        $('#btnNext').click(function () {
            $( "#btnNext" ).addClass( "hide" );
            $( "#btnDelete" ).addClass( "hide" );
            $( "#btnSave" ).removeClass( "hide" );

            $('#txtProjectID').val('');
            $('#txtProjectName').val('');
            $('#txtRemark').val('');

            $("#dateStartDate").val('{{date("d/m/Y")}}');
            $("#dateDeadline").val('{{date("d/m/Y")}}');

            $("#cboStatusID").val($("#cboStatusID option:first").val());

            $('#cboEmployeeID').val('').trigger('change');
            $("#gridContainer").dxDataGrid({dataSource: []});
            $("#gridContainer").dxDataGrid("refresh");

        });

        $('#btnBack').click(function () {
            window.location.href = "{{url('/W84F2000')}}"
        });

        $('#btnSave').click(function () {
            $("#currentButton").val('save');
            ask_save(function () {
                ValidData();
            });
        });

        function ValidData(){

            validationElements($("#frmW84F2001"), function () {
                var end = convertStringToDate($("#dateDeadline").val());
                var begin = convertStringToDate($("#dateStartDate").val());
                $("#dateDeadline").get(0).setCustomValidity("");
                if (daydiff(begin, end) < 0 && $("#dateStartDate").val() != '' && $("#dateDeadline").val()!= '') {
                    $("#dateDeadline").val('');
                    //Ngay_tu_phai_nho_hon_ngay_den
                    $("#dateDeadline").get(0).setCustomValidity("{{__("Ngày từ phải nhỏ hơn ngày đến.")}}");
                }

                $("#btnSubmit").click();
            });
        }

        $("#frmW84F2001").submit(function (event) {
            event.preventDefault();
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }



            var dataGrid = $("#gridContainer").dxDataGrid("getDataSource");
            var dataAdjust = JSON.stringify(dataGrid._store._array);
console.log(dataAdjust);
            $.ajax({
                url: "/W84F2001/save" + task,
                dataType: "json",
                method: 'POST',
                data: $("#frmW84F2001").serialize() + "&" + $.param({"dataGrid": dataAdjust})
                + '&_token={{csrf_token()}}',
                success: function (resp) {
                    if(resp=='1'){
                        save_ok();
                        if (task=='add')
                        {
                            $( "#btnNext" ).removeClass( "hide" );
                            $( "#btnSave" ).addClass( "hide" );
                        }
                        $( "#btnDelete" ).removeClass( "hide" );
                    }else{
                        save_not_ok();
                    }
                },
                error: function () {

                }
            });

        });



        $('#cboEmployeeID').select2({
            templateResult: function (state) {
                if (!state.id) {
                    return state.text;
                }
//                    return $('<span>' + state.text + '</span><br><small>' + $(state.element).data('div') + '</small>');
                var html = '<div style="display: table;width: 100%">';
                html += '<div class="pull-left">';
                html += '<img style="height: 47px; width: 47px;border-radius: 50%" src="' + $(state.element).attr('data-img') + '" />'
                html += '</div>';
                html += '<div  style="margin-left: 55px !important;">';
                html += '<span>' + state.text + '</span><br><small>' + $(state.element).attr('data-position') + '</small>';
                html += '</div>';
                html += '</div>';

                return $(html);
            }
        });
        $('#dateStartDate').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });
        $('#dateDeadline').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });


        console.log(masterData);
        $(function () {
            LoadEdit();

            $("#gridContainer").dxDataGrid({
                dataSource: masterData,
                showBorders: true,
                rowAlternationEnabled: true,
//                editing: {
//                    mode: "row",
//                    allowDeleting: true,
////                    allowAdding: true
//                },
                editing: {
                    mode: "cell",
                    allowUpdating: true,
                    allowDeleting: true,
                },
//                editing: {
//                    mode: "batch",
//                    allowUpdating: true
//                },
                paging: {
                    pageSize: 3
                },
                pager: {
                    showPageSizeSelector: true,
                    allowedPageSizes: [3, 10, 20],
                    showInfo: true
                },
                columns: [
                    {
                        caption:"Tên nhân viên",
                        dataField: "EmployeeName",
                        allowEditing:false,
                    }, {
                        caption:"Vai trò",
                        dataField: "RoleID",
                        allowUpdating: true,
                        lookup: {
                            dataSource: roles,
                            displayExpr: "CodeName",
                            valueExpr: "CodeID"
                        }
                    }
                ]
            });

        });

    </script>


@stop
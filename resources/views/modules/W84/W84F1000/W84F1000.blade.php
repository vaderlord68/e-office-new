@extends('modules.W84.W84F1000.components.layout')
@section('w84f1000')
    @parent
    <?php
    if ($task == "edit" || $task == "view") {
        $TaskID = $rowData["TaskID"];
        $taskNameW84F1000 = $rowData["TaskName"];
        $employeeW84F1001 = "";
        $priorityW84F1001 = $rowData["Priority"];
        $projectIDW84F1001 = $rowData["ProjectID"];
        $projectStageW84F1001 = $rowData["ProjectStage"];
        $startDateW84F1001 = $rowData["StartDate"];
        $deadlineW84F1001 = $rowData["Deadline"];
        $empFollowW84F1001 = "";
        $descriptionW84F1001 = $rowData["Remark"];
    } else {
        $TaskID = "";
        $taskNameW84F1000 = "";
        $employeeW84F1001 = "";
        $priorityW84F1001 = "";
        $projectIDW84F1001 = "";
        $projectStageW84F1001 = "";
        $startDateW84F1001 = "";
        $deadlineW84F1001 = "";
        $empFollowW84F1001 = "";
        $descriptionW84F1001 = "";


    }
    ?>
    <section>

        <div class="task-list">
            <div class="row mgb5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="toolbar_TaskDetail">
                    </div>
                </div>
            </div>
            <form id="frm_TasDetail" name="frm_TasDeatil" method="post">
                {{csrf_field()}}
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Ten")}}</label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <input type="text" name="taskNameW84F1000" id="taskNameW84F1000" class="form-control"
                               maxlength="250"
                               autocomplete="off" value="{{$taskNameW84F1000}}" required>
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Nguoi_xu_ly")}}</label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <select type="text" name="employeeW84F1001" id="employeeW84F1001" class="form-control"
                                multiple>
                            @foreach($empFollowList as  $empFollowItem)
                                <option value="{{$empFollowItem->EmployeeID}}"
                                        {{ isset($empFollowW84F1001) && !empty($employeeW84F1001) && isset($empFollowItem->EmployeeID)
                                && in_array($empFollowItem->EmployeeID, $employeeW84F1001) ? 'selected' : '' }}
                                        data-position="{{$empFollowItem->PositionName}}"
                                        data-img="{{$empFollowItem->Thumnail}}">
                                    {{$empFollowItem->EmployeeName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Do_uu_tien")}}</label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <select name="priorityW84F1001" id="priorityW84F1001" class="form-control">
                            {{--<option value="">--</option>--}}
                            @foreach($priorityList as  $priorityItem)
                                <option value="{{$priorityItem->CodeID}}" {{$priorityItem->CodeID == $priorityW84F1001 ? 'selected': ''}}>{{$priorityItem->CodeName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Du_an")}}</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="projectIDW84F1001" id="projectIDW84F1001" class="form-control">
                            {{--<option value="">--</option>--}}
                            @foreach($projectList as  $projectItem)
                                <option value="{{$projectItem->ProjectID}}" {{$projectItem->ProjectID == $projectIDW84F1001 ? 'selected': ''}}>{{$projectItem->ProjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Hang_muc")}}</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="projectStageW84F1001" id="projectStageW84F1001" class="form-control">
                            {{--<option value="">--</option>--}}
                            @foreach($stageList as  $stageItem)
                                <option value="{{$stageItem->StageID}}" {{$priorityItem->StageID == $projectStageW84F1001 ? 'selected': ''}}>{{$stageItem->StageName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Ngay_bat_dau")}}</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <input name="startDateW84F1001" id="startDateW84F1001" class="form-control"
                               value="{{$startDateW84F1001}}">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Han_xu_ly")}}</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <input name="deadlineW84F1001" id="deadlineW84F1001" class="form-control"
                               value="{{$deadlineW84F1001}}">
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Nguoi_theo_doi")}}</label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <select type="text" name="empFollowW84F1001" id="empFollowW84F1001" class="form-control"
                                multiple>
                            @foreach($empFollowList as  $empFollowItem)
                                <option value="{{$empFollowItem->EmployeeID}}"
                                        {{ isset($empFollowW84F1001) && !empty($empFollowW84F1001) && isset($empFollowItem->EmployeeID)
                                && in_array($empFollowItem->EmployeeID, $empFollowW84F1001) ? 'selected' : '' }}
                                        data-position="{{$empFollowItem->PositionName}}"
                                        data-img="{{$empFollowItem->Thumnail}}">
                                    {{$empFollowItem->EmployeeName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Mo_ta")}}</label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <textarea type="text" name="descriptionW84F1001" id="descriptionW84F1001" class="form-control"
                              maxlength="250"
                              autocomplete="off" value="{{$descriptionW84F1001}}" style="height: 60px"></textarea>
                    </div>
                </div>
                <div class="row mgt10">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <button type="text" name="" id=""
                                class="form-control btn btn-info"
                                maxlength="250"
                                autocomplete="off" value=""><i
                                    class="fas fa-paperclip pdr10"></i>{{Helpers::getRS("Chon_tai_lieu_dinh_kem")}}
                        </button>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-lg-6">
                    </div>
                </div>
                <button type="submit" id="btnSubmitW84F1000" class="hide"></button>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $('#empFollowW84F1001').select2({
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
            $('#employeeW84F1001').select2({
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
            $('#startDateW84F1001').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '{{Session::get("locate")}}'
            });
            $('#deadlineW84F1001').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '{{Session::get("locate")}}'
            });
            $("#toolbar_TaskDetail").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnSave_Task",
                            icon: "far fa-save",
                            title: "{{Helpers::getRS('Luu')}}",
                            cls: "btn btn-info",
                            enable: true,
                            hidden: function () {
                                return false;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    frmW84F1000Save();
                                    console.log("tesst save");
                                });
                            }
                        }
                        , {
                            ID: "btnEdit_Task",
                            icon: "fas fa-edit ",
                            title: "{{Helpers::getRS('Sua')}}",
                            cls: "btn btn-info",
                            enable: true,
                            hidden: function () {
                                return false;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    window.location.href = "{{url('/W84F1000/edit')}}";
                                });
                            }
                        }
                        , {
                            ID: "btnAssign_Task",
                            icon: "fas fa-person-carry",
                            title: "{{Helpers::getRS('Giao_viec')}}",
                            cls: "btn btn-info",
                            enable: true,
                            hidden: function () {
                                return false;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    showFormDialogPost('{{url('/W84F1000/AssignTask')}}', 'myModalAssign', {_token: '{{csrf_token()}}'});
                                });
                            }
                        }
                        , {
                            ID: "btnUpdate_Process_Task",
                            icon: "fas fa-cog",
                            title: "{{Helpers::getRS('Cap_nhat_tien_do')}}",
                            cls: "btn btn-info",
                            enable: true,
                            hidden: function () {
                                return false;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    showFormDialogPost('{{url('/W84F1000/UpdateProcess')}}', 'myModalW84', {_token: '{{csrf_token()}}'});
                                    console.log("jsahdjsdhshdjk");
                                });
                            }
                        }
                        , {
                            ID: "btnDelete_Task",
                            icon: "fas fa-trash-alt",
                            title: "{{Helpers::getRS('Xoa')}}",
                            cls: "btn btn-danger",
                            enable: true,
                            hidden: function () {
                                return false;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                {{--console.log(ui);--}}
                                {{--ui.$btn.click(function () {--}}
                                {{--window.location.href = "{{url('/W76F2141/add')}}";--}}
                                {{--});--}}
                            }
                        }
                    ]
                }
            );
        });

        function frmW84F1000Save() {
            validationElements($("#frm_TasDetail"), function () {
                //Kiem tra nhung truong hop khac
//                checkID($("#txtContractNo"));
                console.log($("#frm_TasDetail").find("#btnSubmitW84F1000"));
                $("#frm_TasDetail").find("#btnSubmitW84F1000").click();
            });
        }

        $('#frm_TasDetail').on('submit', function (e) {

            e.preventDefault();
            var formData = $('#frm_TasDetail').serialize();
            console.log("abc");
            var url = "";
            var task = "{{$task}}";
            console.log(task);
            if (task == "add") {
                url = '{{url("/W84F1000/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/W784F1001/update")}}';
            }
            $.ajax({
                method: "POST",
                url: url,
                data: formData + "&TaskID={{$TaskID}}",
                success: function (res) {
                    var result = JSON.parse(res);
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message);
                            break;
                        case 'SUCC':
                            window.location.href = document.referrer.toString();
                            break;
                    }
                }
            });
        });


    </script>

@stop
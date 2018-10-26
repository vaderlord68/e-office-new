@extends('modules.W84.W84F1000.components.layout')
@section('w84f1000')
    @parent
    <?php
    if ($task != "add") {
        $TaskID = $rowData["TaskID"];
        $taskNameW84F1000 = $rowData["TaskName"];
        $employeeW84F1000 = $rowData["EmployeeID"];
        $priorityW84F1001 = $rowData["Priority"];
        $projectIDW84F1001 = $rowData["ProjectID"];
        $projectStageW84F1001 = $rowData["ProjectStage"];
        $startDateW84F1001 = $rowData["StartDate"];
        $deadlineW84F1001 = $rowData["Deadline"];
        $empFollowW84F1001 = $rowData["EmpFollow"];
        $descriptionW84F1001 = $rowData["Remark"];
        $imageW84 = asset('media/user.png');
    } else {
        // $master = json_decode($rowData);
        $TaskID = "";
        $taskNameW84F1000 = "";
        $txtCommentW84F1000 = "";
        $employeeW84F1000 = "";
        $priorityW84F1001 = "";
        $projectIDW84F1001 = "";
        $projectStageW84F1001 = "";
        $startDateW84F1001 = "";
        $deadlineW84F1001 = "";
        $empFollowW84F1001 = "";
        $descriptionW84F1001 = "";
        $imageW84 = asset('media/user.png');


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
                        <select type="text" name="employeeW84F1000" id="employeeW84F1000" class="form-control">
                            @foreach($empFollowList as  $empFollowItem)
                                <option value="{{$empFollowItem->EmployeeID}}"
                                        {{ !empty($employeeW84F1000) && $empFollowItem->EmployeeID == $employeeW84F1000 ? 'selected' : '' }}
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
                               value="{{$startDateW84F1001}}" autocomplete="off">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Han_xu_ly")}}</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <input name="deadlineW84F1001" id="deadlineW84F1001" class="form-control"
                               value="{{$deadlineW84F1001}}" autocomplete="off">
                    </div>
                </div>
                <div class="row mgb5">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Nguoi_theo_doi")}}</label>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <select type="text" name="empFollowW84F1001[]" id="empFollowW84F1001" class="form-control"
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
                              autocomplete="off" style="height: 60px">{{$descriptionW84F1001}}</textarea>
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
                <div class="row mgb5">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-lg-12">
                        <label class="lbl-normal" for="">{{Helpers::getRS("Thao_luan")}}</label>
                    </div>
                    <div class="col-sm-1">
                        <a><img src="{{$imageW84}}" class="cmmt-img"/>
                        </a>

                    </div>
                    <div class="col-sm-11 mgt10">
                        <input type="text" class="form-control" name="txtCommentW84F1000"
                               id="txtCommentW84F1000" autocomplete="off"
                               placeholder="{{ Helpers::getRS('Noi_dung_thao_luan') }}"
                               data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                               aria-controls="collapseExample">
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="row mgb5">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <button type="text" name="" id=""
                                    class="form-control btn btn-warning"
                                    maxlength="250"
                                    autocomplete="off" value=""><i
                                        class="fas fa-paperclip pdr10"></i>
                            </button>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <div id="toolbar_Comment" class="pull-right">

                            </div>
                        </div>
                    </div>
                    @if (isset($commentList) && !empty($commentList))
                        @foreach($commentList as $commentRow)
                            <div class="row mgb5">
                                <div class="col-sm-1">
                                    <a><img src="{{$commentRow->Thumnail or ''}}" class="like-img"/>
                                    </a>
                                </div>
                                <div class="col-sm-11 mgt17">
                                    <label class="pdr10 text-primary">
                                        {{$commentRow->CreateUserName or ''}}
                                    </label>
                                    <label>{{Helpers::getRS("Binh_luan")}}:
                                        {{$commentRow->Comment or ''}}
                                    </label>
                                </div>
                                {{--<div class="col-sm-6 mgt12 pull-left">--}}
                                {{--comment abv--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="row pdl25">
                                    <div class="col-xs-3" style="padding-left: 70px !important;">
                                        <label class="text-primary">
                                            <a title="like" id="like" data-commentid="{{$commentRow->CommentID}}"
                                               class="text-gray"><i class="fas fa-thumbs-up left"></i>
                                                {{$commentRow->CountLike or ''}}
                                            </a>{{Helpers::getRS("Thich")}}
                                        </label>
                                    </div>
                                    <div class="col-xs-3 pdl10">
                                        <a><i class="far fa-clock left"></i>
                                            {{$commentRow->CreateDate or ''}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
            $('#employeeW84F1000').select2({
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
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
                <?php
                \Debugbar::info("tess", $taskList);
                //                var_dump($taskList);die();
                ?>
            var isEdit = '{{ $taskList[0]->IsEdit }}';
            var isAssign = '{{$taskList[0]->IsAssign}}';
            var isProcessUpdate = '{{$taskList[0]->IsProcessUpdate}}';
            var isDelete = '{{$taskList[0]->IsDelete}}';

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
                                return isEdit != 1;
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
                                return isAssign != 1;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    showFormDialogPost('{{url('/W84F1000/AssignTask')}}', 'myModalAssign', "&TaskID={{$TaskID}}&_token={{ csrf_token() }}");
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
                                return isProcessUpdate != 1;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    showFormDialogPost('{{url('/W84F1000/process')}}', 'myModalW84', "&TaskID={{$TaskID}}&_token={{ csrf_token() }}");
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
                                return isDelete != 1;
                            },
                            type: "button",
                            render: function (ui) {
                            },
                            postRender: function (ui) {
                                console.log(ui);
                                ui.$btn.click(function () {
                                    var formData = $('#frm_TasDetail').serialize();
                                    ask_delete(function (ui) {
                                        $.ajax({
                                            method: "POST",
                                            url: '{{url('/W84F1000/delete')}}',
                                            data: formData + "&TaskID={{$TaskID}}&_token={{ csrf_token() }}",
                                            success: function (res) {
                                                var data = JSON.parse(res);
                                                switch (data.status) {
                                                    case "SUCC":
                                                        var $frm = $("#frm_TasDetail");
                                                        delete_ok(function () {
                                                            window.location.reload();
                                                        });
                                                        break;
                                                    case "ERROR":
                                                        alertError(data.message);
                                                        break;
                                                }
                                            }
                                        })
                                    });
                                });
                            }
                        }
                    ]
                }
            );
        });

        $("#toolbar_Comment").digiMenu({
                showText: true,
                buttonList: [
                    {
                        ID: "btnSave_Comment",
                        //icon: "far fa-save",
                        title: "{{Helpers::getRS('Dang_bai')}}",
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
                                updateComment();
                                console.log("tesst save");
                            });
                        }
                    }
                    , {
                        ID: "btnClose_Comment",
                        //icon: "fas fa-trash-alt",
                        title: "{{Helpers::getRS('Dong_U')}}",
                        cls: "btn btn-danger",
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
                                $("#collapseExample").toggleClass('show');
                                $("#txtCommentW84F1000").toggleClass('collapsed');
                                $("#txtCommentW84F1000").attr("aria-expanded", $("#collapseExample").hasClass('show'));
                            });
                        }
                    }
                ]
            }
        );


        function frmW84F1000Save() {
            validationElements($("#frm_TasDetail"), function () {
                //Kiem tra nhung truong hop khac
//                checkID($("#txtContractNo"));
                console.log($("#frm_TasDetail").find("#btnSubmitW84F1000"));
                $("#frm_TasDetail").find("#btnSubmitW84F1000").click();
            });
        }

        $('#like').on('click', function () {
            var el = this;
            var status = $(el).attr('title') == 'like' ? 1 : 0;
            var CommentID = $(el).attr('data-commentid');
            $.ajax({
                method: "POST",
                url: '{{url("/W84F1000/update_like")}}',
                data: {CommentID: CommentID, status: status, _token: '{{ csrf_token() }}'},
                success: function (res) {
                    var result = JSON.parse(res);
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message);
                            break;
                        case 'SUCC':
                            if (status == 1) {
                                $(el).attr('title', 'unlike');
                            } else {
                                $(el).attr('title', 'like');
                            }
                            $(el).text(result.count);
                            window.location.href = document.referrer.toString();
                            break;
                    }
                }
            });
        });
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
                url = '{{url("/W84F1000/update")}}';
            }
            if (task == "delete") {
                url = '{{url("/W84F1000/delete")}}';
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

        function updateComment() {
            var comments = $('#txtCommentW84F1000').val();
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: '{{ url('/W84F1000/update_comment') }}',
                data: {
                    comments: comments,
                    TaskID: '{{$TaskID}}',
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    var result = JSON.parse(res);
                    console.log("luu");
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message);
                            break;
                        case 'SUCC':
                            window.location.reload();
                            break;
                    }
                }
            });
        }

        $("#btnClose_Comment").click(function () {

        });

    </script>

@stop
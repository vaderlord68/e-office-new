@extends('modules.W84.W84F1000.components.layout')
@section('task-content')
    <section>
        <form>

        </form>
        <div class="row mgb5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="toolbar_TaskDetail">
                </div>
            </div>
        </div>
        <form id="frm_TasList" name="frm_TasList" method="post">
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Ten")}}</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" name="taskNameW84F1000" id="taskNameW84F1000" class="form-control"
                           maxlength="250"
                           autocomplete="off" value="" required>
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Nguoi_xu_ly")}}</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" name="employeeNameW84F1001" id="employeeNameW84F1001" class="form-control"
                           maxlength="250"
                           autocomplete="off" value="" >
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Do_uu_tien")}}</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <select name="priorityW84F1001" id="priorityW84F1001" class="form-control">
                        <option value="">--</option>
                        {{--@foreach($channelIDList as  $channelIDItem)--}}
                        {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Du_an")}}</label>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <select name="projectIDW84F1001" id="projectIDW84F1001" class="form-control"
                            >
                        <option value="">--</option>
                        {{--@foreach($channelIDList as  $channelIDItem)--}}
                        {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Giai_doan")}}</label>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <select name="projectStageW84F1001" id="projectStageW84F1001" class="form-control"
                            >
                        <option value="">--</option>
                        {{--@foreach($channelIDList as  $channelIDItem)--}}
                        {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Ngay_bat_dau")}}</label>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <input name="startDateW84F1001" id="startDateW84F1001" class="form-control">
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Han_xu_ly")}}</label>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <input name="deadlineW84F1001" id="deadlineW84F1001" class="form-control">
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Nguoi_theo_doi")}}</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" name="empFollowW84F1001" id="empFollowW84F1001" class="form-control"
                           maxlength="250"
                           autocomplete="off" value="" >
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3">
                    <label class="lbl-normal" for="">{{Helpers::getRS("Mo_ta")}}</label>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <textarea type="text" name="descriptionW84F1001" id="descriptionW84F1001" class="form-control" maxlength="250"
                              autocomplete="off" value="" style="height: 60px"></textarea>
                </div>
            </div>
        </form>
    </section>

    <script>
        $(document).ready(function () {
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
                            ID: "btnEdit_Task",
                            icon: "fas fa-edit",
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
                                {{--console.log(ui);--}}
                                {{--ui.$btn.click(function () {--}}
                                {{--window.location.href = "{{url('/W76F2141/add')}}";--}}
                                {{--});--}}
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
                                {{--console.log(ui);--}}
                                {{--ui.$btn.click(function () {--}}
                                {{--window.location.href = "{{url('/W76F2141/add')}}";--}}
                                {{--});--}}
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
                                    {{--showFormDialogPost("{{url('/W84F1001/add')}}", 'myModal');--}}
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
    </script>

@stop
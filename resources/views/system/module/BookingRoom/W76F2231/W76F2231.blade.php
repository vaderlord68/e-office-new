<div class="modal fadeInDown" id="myModal">
    <div class="modal-dialog " style="width: 95% !important; max-width: 95% !important;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{Helpers::getRS("Dang_ky_phong_hop")}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                \Debugbar::info($all);
                //                [FacilityID]
                //                ,[Description]
                //                ,[OrgunitID]
                //                ,[HostPerson]
                //                ,[Participants]
                //                ,[NumParticipants]
                //                ,[RequestedDateFrom]
                //                ,[RequestedDateTo]
                //                ,[IsBlackboard]
                //                ,[IsProjector]
                //                ,[IsEthernet]
                //                ,[IsPC]
                //                ,[IsMicrophone]
                //                ,[IsTeleCon]
                //                ,[IsWifi]
                //                ,[Logistics]
                //                ,[ApproveStatus]
                //                ,[ApprovalDate]
                //                ,[ApprovalUser]
                //                ,[ApprovalNotes]
                //                ,[CreateDate]
                //                ,[CreateUserID]
                //                ,[LastModifyDate]
                //                ,[LastModifyUserID]
                if ($task == "view" || $task == "edit") {//Edit
                    $master = $rowData;
                    $logisticsW76F2231 = $rowData["Logistics"];
                    $cbFacilityIDW76F2231 = $rowData["FacilityName"];

                    $start = '';
                    $end = '';
                    $date = '';
                    $userID = '';

                } else {
                    $start = $all["start"];
                    $end = $all["end"];
                    $date = $all["date"];
                    $logisticsW76F2231 = "";
                    $cbFacilityIDW76F2231 = "";
                    $descriptionW76F2231 = "";
                    $cbHostPersonW76F2231 = "";
                    $cbParticipantsW76f2231 = "";
                    $txtNumParticipantsW76F2231 = "";
                    $isBlackboardW76F2231 =0;
                    $isProjectorW76F2231 = 0;
                    $isProjectorW76F2231 = 0;
                    $isPCW76F2231 = 0;
                    $isMicrophoneW76F2231 = 0;
                    $isTeleConW76F2231 = 0;
                    \Debugbar::info(Auth::user());
                    $userID = Auth::user()->UserID;
                }
                ?>

                <section>
                    <div class="card">
                        {{--<div class="card-header">--}}
                        {{--<h4 class="card-title"></h4>--}}
                        {{--</div>--}}
                        <div class="card-body" id="modalW76F2231">
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                                <form id="formW76F2231" method="POST" enctype="multipart/form-data" action="">
                                    {{csrf_field()}}
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_tao")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <input type="text" class="form-control" id="authorW76F2141"
                                                   name="authorW76F2141"
                                                   class="form-control" value="{{$userID}}" autocomplete="off">
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Phong_hopU")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <select name="cbFacilityIDW76F2231" id="cbFacilityIDW76F2231"
                                                    class="form-control" required>
                                                <option value="">--</option>
                                                @foreach($facilityList as  $facilityListItem)
                                                    <option value="{{$facilityListItem->FacilityNo}}" {{$facilityListItem->FacilityNo == $cbFacilityIDW76F2231 ? 'selected': ''}}>{{$facilityListItem->FacilityName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Bat_dau")}}</label>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" id="dateFromW76F2231"
                                                       name="dateFromW76F2231" value="{{$date}}"
                                                       autocomplete="off" required>

                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" id="timeFromW76F2231"
                                                       name="timeFromW76F2231" value="{{$start}}"
                                                       autocomplete="off"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Ket_thuc")}}</label>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <input type="text" class="form-control" id="dateToW76F2231"
                                                   name="dateToW76F2231"
                                                   class="form-control" value="{{$date}}" autocomplete="off" required>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" id="timeToW76F2231"
                                                       name="timeToW76F2231" value="{{$end}}"
                                                       autocomplete="off"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Phong_ban")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select name="channelIDW76F2141" id="channelIDW76F2141" class="form-control"
                                            >
                                                <option value="">--</option>
                                                <option value="">dfffsf</option>
                                                <option value="">tytutyuyuyuon>
                                                {{--@foreach($channelIDList as  $channelIDItem)--}}
                                                {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Noi_dung")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <textarea type="text" style="height: 60px" class="form-control"
                                                      autocomplete="off" required
                                                      class="form-control" id="descriptionW76F2231"
                                                      name="descriptionW76F2231" value="">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_chu_tri")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select name="cbHostPersonW76F2231" id="cbHostPersonW76F2231"
                                                    class="form-control">
                                                <option value="">--</option>
                                                <option value="">zdfdf</option>
                                                <option value="">-dsfsf-</option>
                                                s
                                                {{--@foreach($channelIDList as  $channelIDItem)--}}
                                                {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_tham_du")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select name="cbParticipantsW76F2231" id="cbParticipantsW76F2231"
                                                    class="form-control" multiple>
                                                <option value="">--</option>
                                                <option value="">zdfdf</option>
                                                <option value="">-dsfsf-</option>
                                                <option value="">-uyiyutii-</option>
                                                <option value="">-dsbnbnmmfsf-</option>
                                                {{--@foreach($channelIDList as  $channelIDItem)--}}
                                                {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mgb5">
                                        <div class="col-sm-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Thiet_bi_yeu_cau")}}</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" id="isBlackboardW76F2231"
                                                               name="isBlackboardW76F2231"
                                                               class="hide">
                                                        <label class="pdl0">
                                                            <span class="fas fa-chalkboard mgr5"></span> {{Helpers::getRS("Bang_ghi")}}
                                                        </label>
                                                        <span class="fa fa-check mgl5 "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" id="isProjectorW76F2231"
                                                               name="isProjectorW76F2231" class="hide">
                                                        <label class="pdl0">
                                                            <span class="fas fa-procedures mgr5"></span> {{Helpers::getRS("May_chieu")}}
                                                        </label>
                                                        <span class="fa fa-check mgl5 "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isEthernetW76F2231"
                                                               name="isEthernetW76F2231">
                                                        <label class="pdl0"><span
                                                                    class="fab fa-ethereum mgr5"></span>Ethernet</label>
                                                        <span class="fa fa-check mgl5"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isMicrophoneW76F2231"
                                                               name="isMicrophoneW76F2231">
                                                        <label class="pdl0"><span class="fas fa-microphone mgr5"></span>
                                                            Microphone</label>
                                                        <span class="fa fa-check mgl5 "></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isPCW76F2231"
                                                               name="isPCW76F2231">
                                                        <label><span class="fas fa-desktop mgr5"></span> PC</label>
                                                        <span class="fa fa-check mgl5 "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isTeleConW76F2231"
                                                               name="isTeleConW76F2231">
                                                        <label><span class="fas fa-chess-queen mgr5"></span>
                                                            Tele-Conference
                                                        </label>
                                                        <span class="fa fa-check mgl5 "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isVideoConW76F2231"
                                                               name="isVideoConW76F2231">
                                                        <label><span class="fas fa-video mgr5"></span>
                                                            Video-Conference</label>
                                                        <span class="fa fa-check mgl5"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isWifiW76F2231"
                                                               name="isWifiW76F2231">
                                                        <label><span class="fas fa-wifi mgr5"></span> Wifi</label>
                                                        <span class="fa fa-check mgl5 "></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="row pdb10">
                                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                    <label class="lbl-normal">{{Helpers::getRS("So_luong")}}</label>
                                                </div>
                                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                    <input type="text" class="form-control"
                                                           id="txtNumParticipantsW76F2231"
                                                           name="txtNumParticipantsW76F2231"
                                                           class="form-control" maxlength="4"
                                                           onkeypress="return inputNumber(event);" min="1" step="1"
                                                           id="displayOrderW76F2231" value="1"
                                                           placeholder="" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="row mgb5">
                                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                    <label class="lbl-normal">{{Helpers::getRS("Hau_can")}}</label>
                                                </div>
                                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                    <div class="row mgb5">
                                                        @foreach($logisticsList as  $logisticsItem)
                                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                <div class="checkbox mgr10">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label pdl0" {{$logisticsItem->CodeID}}>
                                                                            <input type="checkbox"
                                                                                   class="form-check-input"
                                                                                   {{$task =='view' ? 'disabled': ''}}
                                                                                   id=""
                                                                                   name="logisticsW76F2231[]"
                                                                                   value="{{$logisticsItem->CodeID or ''}}"
                                                                                    {{ isset($logisticsW76F2231) && !empty($logisticsW76F2231) && isset($logisticsItem->CodeID) && in_array($logisticsItem->CodeID, $logisticsW76F2231) ? 'checked' : '' }}> {{$logisticsItem->CodeName or ''}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="btnSubmitW76F2231" class="hide"></button>
                                </form>
                            </div>
                        </div>
                        {{--<div class="card-footer">--}}
                        {{--<div id="toolbarW76F2231">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </section>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <div id="toolbarW76F2231">
                </div>
            </div>

        </div>
    </div>
</div>


<script>

    @if ($task == "add" || $task == "edit")
    $("#formW76F2231").on('click', '.service-facility', function () {
        var check = $(this).find("input[type=checkbox]").prop("checked");
        $(this).find("input[type=checkbox]").prop('checked', !check);
        if (check == true)
            $(this).find(".fa-check").addClass("hide");
        else
            $(this).find(".fa-check").removeClass("hide");
    });
    @else
    //$(".cls-logistics").attr('disabled',true);
    //        $("input, select").attr('disabled', true);
    @endif


    $(document).ready(function () {
        $('#cbParticipantsW76F2231').select2({});
        $('#txtNumParticipantsW76F2231').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 0,
            autoGroup: true,
            rightAlign: true
        });
        $('#requestedDateFromW76F2231').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });
        $('#requestedDateToW76F2231').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });

        $('#requestedTimeFromW76F2231').inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });
        $('#requestedTimeToW76F2231').inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });
        $("#toolbarW76F2231").digiMenu({
                showText: true,
                cls: 'none-border none-background',
                style: '',
                buttonList: [
                    {
                        ID: "btnSaveW76F22231",
                        icon: "fas fa-save",
                        title: "{{Helpers::getRS('Luu')}}",
                        enable: function () {
                            return true;
                        },
                        hidden: false,
                        type: "button",
                        cls: "btn  btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                frmW76F2231save();
                            });
                        }
                    }
                    , {
                        ID: "btnBack",
                        icon: "fas fa-arrow-left",
                        title: '{{Helpers::getRS("Quay_lai")}}',
                        enable: true,
                        hidden: false,
                        type: "button",
                        cls: "btn btn-danger pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                window.location.href = document.referrer.toString();
                            });
                        }
                    }
                ]
            }
        );

        function frmW76F2231save() {
            validationElements($("#formW76F2231"), function () {
                //Kiem tra nhung truong hop khac
                checkID($("#txtNumParticipantsW76F2231"));
                $("#formW76F2231").find("#btnSubmitW76F2231").click();
            });
        }

        $('#formW76F2231').submit(function (e) {
            e.preventDefault();

            //var formData = new FormData($('#formW76F2231')[0]);
            var formData = $('#formW76F2231').serialize();
            var url = "";
            var task = "{{$task}}";
            if (task == "add") {
                url = '{{url("/w76f2231/save")}}';
            }
            console.log(url);
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: url,
                data: formData + "&facilityID=",
                //processData: false,
                //contentType: false,
                success: function (res) {
//                    var result = JSON.parse(res);
//                    console.log("luu");
//                    switch (result.status) {
//                        case 'ERROR':
//                            alertError(result.message);
//                            break;
//                        case 'SUCC':
//                            window.location.href = document.referrer.toString();
//                            break;
//                    }
                }
            });
        });

    });

</script>
<style>
    .select2-container .select2-selection {
        min-height: 30px;
    }
</style>



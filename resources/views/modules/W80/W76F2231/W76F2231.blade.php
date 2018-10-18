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
                if ($task == "edit") {//Edit
                    $master = $rowData;
                    //\Debugbar::info($master);
                    $ID = $rowData["ID"];
                    $orgunitNameW76F2231 = session('W76P0000')->OrgUnitName;
                    $orgunitIDW76F2231 = session('W76P0000')->OrgUnitID;
                    $start = $all["start"];
                    $end = $all["end"];
                    $date = $all["date"];
                    $userID = Auth::user()->UserID;
                    $logisticsW76F2231 = $rowData["Logistics"];
                    $cbFacilityIDW76F2231 = $rowData["FacilityID"];
                    $descriptionW76F2231 = $rowData["Description"];
                    $approvalNotesW76F2231 = $rowData["ApprovalNotes"];
                    $cbHostPersonW76F2231 = $rowData["HostPerson"];
                    $cbParticipantsW76F2231 = $rowData["Participants"];
                    $txtNumParticipantsW76F2231 = $rowData["NumParticipants"];
                    $isBlackboardW76F2231 = $rowData["IsBlackboard"] == 1 ? "checked" : "";
                    $isProjectorW76F2231 = $rowData["IsProjector"] == 1 ? "checked" : "";
                    $isEthernetW76F2231 = $rowData["IsEthernet"] == 1 ? "checked" : "";
                    $isPCW76F2231 = $rowData["IsPC"] == 1 ? "checked" : "";
                    $isMicrophoneW76F2231 = $rowData["IsMicrophone"] == 1 ? "checked" : "";
                    $isTeleConW76F2231 = intval($rowData["IsTeleCon"]) == 1 ? "checked" : "";
                    $isWifiW76F2231 = $rowData["IsWifi"] == 1 ? "checked" : "";
                    // = $rowData["IsVideoCons"] == 1 ? "checked" : "";
                } else {
                    $ID = "";
                    $orgunitIDW76F2231 = session('W76P0000')->OrgUnitID;
                    $orgunitNameW76F2231 = session('W76P0000')->OrgUnitName;
                    $start = $all["start"];
                    $end = $all["end"];
                    $date = $all["date"];
                    $logisticsW76F2231 = "";
                    $cbFacilityIDW76F2231 = $all["roomID"];
                    $descriptionW76F2231 = "";
                    $approvalNotesW76F2231 = "";
                    $cbHostPersonW76F2231 = "";
                    $cbParticipantsW76F2231 = "";
                    $txtNumParticipantsW76F2231 = "";
                    $isBlackboardW76F2231 = 0;
                    $isProjectorW76F2231 = 0;
                    $isEthernetW76F2231 = 0;
                    $isPCW76F2231 = 0;
                    $isMicrophoneW76F2231 = 0;
                    $isTeleConW76F2231 = 0;
                    $isWifiW76F2231 = 0;
                    //$isVideoConW76F2231 = 0;
                    //\Debugbar::info(Auth::user());
                    $userID = Auth::user()->UserID;
                }
                ?>

                <section>
                    <div class="card">
                        {{--<div class="card-header">--}}
                        {{--<h4 class="card-title"></h4>--}}
                        {{--</div>--}}
                        <div class="card-body" id="modalW76F2231">
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    @include('page.content.alert-dismissible')
                                </div>
                            </div>
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                                <form id="formW76F2231" method="POST" enctype="multipart/form-data" action="">
                                    {{csrf_field()}}
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_tao")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <label>{{$userID}}
                                            </label>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Phong_hopU")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <select name="cbFacilityIDW76F2231" id="cbFacilityIDW76F2231"
                                                    class="form-control" maxlength="50" required>
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
                                                       placeholder="00:00"
                                                       name="dateFromW76F2231" value="{{$date}}"
                                                       autocomplete="off" readonly>
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
                                                   placeholder="00:00"
                                                   name="dateToW76F2231"
                                                   class="form-control" value="{{$date}}" autocomplete="off" readonly>
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
                                            <label class="lbl-normal">{{Helpers::getRS("Co_cau_to_chuc")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input name="orgunitNameW76F2231" id="orgunitNameW76F2231" maxlength="50"
                                                   class="form-control"
                                                   readonly="" value="{{$orgunitNameW76F2231}}">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Noi_dung")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <textarea type="text" style="height: 60px" class="form-control"
                                                      maxlength="1000"
                                                      autocomplete="off" required
                                                      class="form-control" id="descriptionW76F2231"
                                                      name="descriptionW76F2231">{{$descriptionW76F2231}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_chu_tri")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select name="cbHostPersonW76F2231" id="cbHostPersonW76F2231"
                                                    class="form-control" maxlength="50" required>
                                                <option value="">--</option>
                                                @foreach($hostPersonList as  $hostPersonListItem)
                                                    <option value="{{$hostPersonListItem->EmployeeCode}}" {{$hostPersonListItem->EmployeeCode == $cbHostPersonW76F2231 ? 'selected': ''}}>{{$hostPersonListItem->Fullname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_tham_du")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select name="cbParticipantsW76F2231[]" maxlength="500"
                                                    id="cbParticipantsW76F2231"
                                                    class="form-control" multiple>
                                                @foreach($participantsList as  $participantsListItem)
                                                    <option value="{{$participantsListItem->EmployeeCode}}"
                                                            {{ isset($cbParticipantsW76F2231) && !empty($cbParticipantsW76F2231) && isset($participantsListItem->EmployeeCode)
                                                    && in_array($participantsListItem->EmployeeCode, $cbParticipantsW76F2231) ? 'selected' : '' }}>{{$participantsListItem->Fullname}}</option>
                                                    {{--{{$participantsListItem->EmployeeCode == $cbParticipantsW76F2231 ? 'selected': ''}}--}}
                                                @endforeach
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
                                                               class="hide" value="1" {{$isBlackboardW76F2231}}>
                                                        <label class="pdl0">
                                                            <span class="fas fa-chalkboard mgr5"></span> {{Helpers::getRS("Bang_ghi")}}
                                                        </label>
                                                        <span class="fa fa-check mgl5  {{$isBlackboardW76F2231 == '' ? 'hide': ''}}"
                                                              value="1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" id="isProjectorW76F2231"
                                                               name="isProjectorW76F2231" class="hide"
                                                               value="1" {{$isProjectorW76F2231}}>
                                                        <label class="pdl0">
                                                            <span class="fas fa-procedures mgr5"></span> {{Helpers::getRS("May_chieu")}}
                                                        </label>
                                                        <span class="fa fa-check mgl5 {{$isProjectorW76F2231 == '' ? 'hide': ''}}"
                                                              value="1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isEthernetW76F2231"
                                                               name="isEthernetW76F2231"
                                                               value="1" {{$isEthernetW76F2231}}>
                                                        <label class="pdl0"><span
                                                                    class="fab fa-ethereum mgr5"></span>Ethernet</label>
                                                        <span class="fa fa-check mgl5 {{$isEthernetW76F2231  == '' ? 'hide': ''}}"
                                                              value="1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isMicrophoneW76F2231"
                                                               name="isMicrophoneW76F2231"
                                                               value="1" {{$isMicrophoneW76F2231}}>
                                                        <label class="pdl0"><span class="fas fa-microphone mgr5"></span>
                                                            Microphone</label>
                                                        <span class="fa fa-check mgl5 {{$isMicrophoneW76F2231  == '' ? 'hide': ''}}"
                                                              value="1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isPCW76F2231"
                                                               name="isPCW76F2231" value="1" {{$isPCW76F2231}}>
                                                        <label><span class="fas fa-desktop mgr5"></span> PC</label>
                                                        <span class="fa fa-check mgl5 {{$isPCW76F2231  == '' ? 'hide': ''}}"
                                                              value="1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isTeleConW76F2231"
                                                               name="isTeleConW76F2231"
                                                               value="1" {{$isTeleConW76F2231}}>
                                                        <label><span class="fas fa-chess-queen mgr5"></span>
                                                            Tele-Conference
                                                        </label>
                                                        <span class="fa fa-check mgl5 {{$isTeleConW76F2231 == '' ? 'hide': ''}}"
                                                              value="1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pdb10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="checkbox service-facility">
                                                        <input type="checkbox" class="hide" id="isWifiW76F2231"
                                                               name="isWifiW76F2231" value="1" {{$isWifiW76F2231}}>
                                                        <label><span class="fas fa-wifi mgr5"></span> Wifi</label>
                                                        <span class="fa fa-check mgl5  {{$isWifiW76F2231 == '' ? 'hide': ''}}"
                                                              value="1"></span>
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
                                                           value="{{$txtNumParticipantsW76F2231}}"
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
                                                                            <input type="checkbox" maxlength="500"
                                                                                   class="form-check-input" id=""
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
                                    <?php
                                    \Debugbar::info($permission);
                                    ?>
                                    <div class="row mgb5 {{$permission == 1 ? '' : 'hide'}}">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Ghi_chu_duyet")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control"
                                                   autocomplete="off" class="form-control" id="approvalNotesW76F2231"
                                                   name="approvalNotesW76F2231" maxlength="500"
                                                   value="{{$approvalNotesW76F2231}}">
                                            </input>
                                        </div>
                                    </div>
                                    <button id="btnSubmitW76F2231" class="hide"></button>
                                </form>
                            </div>
                        </div>
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
        $('#DateFromW76F2231').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });
        $('#DateToW76F2231').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });

        $('#timeFromW76F2231').inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });
        $('#timeToW76F2231').inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });

        var permission = '{{$permission}}';

        $("#toolbarW76F2231").digiMenu({
                showText: true,
                cls: 'none-border none-background',
                style: '',
                buttonList: [
                    {
                        ID: "btnBack",
                        icon: "fas fa-arrow-left",
                        title: '{{Helpers::getRS("Dong_U")}}',
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
                    , {
                        ID: "btnSaveW76F22231",
                        icon: "fas fa-save",
                        title: "{{Helpers::getRS('Gui_duyet')}}",
                        enable: true,
                        hidden: false,
                        type: "button",
                        cls: "btn btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                frmW76F2231save();
                            });
                        }
                    }
                    , {
                        ID: "btnEject",
                        icon: "fas fa-ban",
                        title: '{{Helpers::getRS("Tu_choi")}}',
                        enable: true,
                        hidden: function () {
                            return permission != 1;
                        },
                        type: "button",
                        cls: "btn btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                updateApproveStatus(2);
                            });
                        }
                    }
                    , {
                        ID: "btnApprove",
                        icon: "fas fa-save",
                        title: "{{Helpers::getRS('Duyet')}}",
                        enable: true,
                        hidden: function () {
                            return permission != 1;
                        },
                        type: "button",
                        cls: "btn  btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                updateApproveStatus(1);
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

        function updateApproveStatus(status) {
            var notes = $('#approvalNotesW76F2231').val();
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: '{{ url('/W76F2231/updateStatus') }}',
                data: {
                    status: status,
                    notes: notes,
                    id: '{{$ID}}',
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    var result = JSON.parse(res);
                    console.log("luu");
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message, $("#modalW76F2231"))
                            break;
                        case 'INVAILD':
                            alertError(result.message, $("#modalW76F2231"))
                            break;
                        case 'SUCC':
                            window.location.reload();
                            break;
                    }
                }
            });
        }

        $('#formW76F2231').submit(function (e) {
            e.preventDefault();

            //var formData = new FormData($('#formW76F2231')[0]);
            var formData = $('#formW76F2231').serialize();
            var url = "";
            var task = "{{$task}}";
            if (task == "add") {
                url = '{{url("/W76F2231/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/W76F2231/update")}}';
            }
            console.log(url);
            hideAlert();
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: url,
                data: formData + "&ID={{$ID}}" + "&orgunitIDW76F2231={{$orgunitIDW76F2231}}",
                // processData: false,
                //contentType: false,
                success: function (res) {
                    var result = JSON.parse(res);
                    console.log("luu");
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message, $("#modalW76F2231"))
                            break;
                        case 'EXIST':
                            alertError(result.message, $("#modalW76F2231"))
                            break;
                        case 'SUCC':
                            window.location.reload();
                            break;
                    }
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



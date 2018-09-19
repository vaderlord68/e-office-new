@extends('page.master')
@section('body_content')
    @parent
    <?php
    if ($task == "view" || $task == "edit") {//Edit
        $master = $rowData;
        $facilityID = $rowData["FacilityID"];
        $divisionIDW76F2201 = $rowData["DivisionID"];
        $coordinatorW76F2201 = $rowData["Coordinator"];
        $logisticsW76F2201 = $rowData["Logistics"];
        $txtFacilityNoW76F2201 = $rowData["FacilityNo"];
        $txtFacilityNameW76F2201 = $rowData["FacilityName"];
        $txtDescriptionW76F2201 = $rowData["Description"];
        $txtLocationW76F2201 = $rowData["Location"];
        $txtCapacityW76F2201 = $rowData["Capacity"];
        $disabledW76F2201 = $rowData["Disabled"];
        $isBlackboardW76F2201 = $rowData["IsBlackboard"];
        $isProjectorW76F2201 = $rowData["IsProjector"];
        $isEthernetW76F2201 = $rowData["IsEthernet"];
        $isPCW76F2201 = $rowData["IsPC"];
        $isMicrophoneW76F2201 = $rowData["IsMicrophone"];
        $isTeleConW76F2201 = $rowData["IsTeleCon"];
        $isWifiW76F2201 = $rowData["IsWifi"];
        $isVideoConW76F2201 = $rowData["IsVideoCon"];
        $displayOrderW76F2201 = $rowData["DisplayOrder"];
    } else {
        $facilityID = "";
        $divisionIDW76F2201 = "";
        $coordinatorW76F2201 = "";
        $logisticsW76F2201 = "";
        $txtFacilityNoW76F2201 = "";
        $txtFacilityNameW76F2201 = "";
        $txtDescriptionW76F2201 = "";
        $txtLocationW76F2201 = "";
        $txtCapacityW76F2201 = "";
        $disabledW76F2201 = 0;
        $isBlackboardW76F2201 = 0;
        $isProjectorW76F2201 = 0;
        $isEthernetW76F2201 = 0;
        $isPCW76F2201 = 0;
        $isMicrophoneW76F2201 = 0;
        $isTeleConW76F2201 = 0;
        $isWifiW76F2201 = 0;
        $isVideoConW76F2201 = 0;
        $displayOrderW76F2201 = 0;
    }
    ?>

    <section>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{Helpers::getRS('Cap_nhat_phong_hop')}}</h4>
            </div>
            <div class="card-body" id="modalW76F2201">
                <div id="bootstrap-data-table_wrapper"
                     class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                    <form id="formW76F2201" method="POST" enctype="multipart/form-data" action="">
                        {{csrf_field()}}
                        <div class="row">
                                <div class="col-sm-8">
                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Phong_hopU")}}</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" id="txtFacilityNoW76F2201" name="txtFacilityNoW76F2201"
                                               class="form-control"
                                               value="{{$txtFacilityNoW76F2201}}" required>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Ten_phong_hop")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <input type="text" id="txtFacilityNameW76F2201" name="txtFacilityNameW76F2201"
                                               class="form-control" value="{{$txtFacilityNameW76F2201}}" required>
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Dia_diem")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <input type="text" id="txtLocationW76F2201" name="txtLocationW76F2201"
                                               class="form-control"
                                               value="{{$txtLocationW76F2201}}">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("So_cho_ngoi")}}</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3-md-3 col-lg-3">
                                        <input class="form-control" type="text" class="form-control"
                                               name="txtCapacityW76F2201"
                                               maxlength="4" onkeypress="return inputNumber(event);" min="1" step="1"
                                               id="txtCapacityW76F2201" value="{{$txtCapacityW76F2201}}" placeholder=""
                                               autocomplete="off">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Ghi_chu")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <textarea type="text" id="txtDescriptionW76F2201" name="txtDescriptionW76F2201"
                                                  class="form-control"
                                                  autocomplete="off"
                                                  style="height: 60px">{{$txtDescriptionW76F2201}}</textarea>
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Hau_can")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        @foreach($logisticsList as  $logisticsItem)
                                            <a {{$logisticsItem->CodeID}}>
                                                <i class="checkbox mgr10">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                   {{$task =='view' ? 'disabled': ''}}
                                                                   id=""
                                                                   name="logisticsW76F2201[]"
                                                                   value="{{$logisticsItem->CodeID or ''}}"
                                                                    {{ isset($logisticsW76F2201) && !empty($logisticsW76F2201) && isset($logisticsItem->CodeID) && in_array($logisticsItem->CodeID, $logisticsW76F2201) ? 'checked' : '' }}> {{$logisticsItem->CodeName or ''}}
                                                        </label>
                                                    </div>
                                                </i>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Don_vi")}}</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <select name="divisionIDW76F2201" id="divisionIDW76F2201"
                                                class="form-control" required>
                                            <option value="">--</option>
                                            @foreach($divisionIDList as  $divisionIDItem)
                                                <option value="{{$divisionIDItem->OrgunitID}}" {{$divisionIDItem->OrgunitID == $divisionIDW76F2201 ? 'selected': ''}}>{{$divisionIDItem->OrgunitName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Nguoi_dieu_phoi")}}</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <select name="coordinatorW76F2201" id="coordinatorW76F2201"
                                                class="form-control">
                                            <option value="">--</option>
                                            @foreach($coordinatorList as  $coordinatorItem)
                                                <option value="{{$coordinatorItem->CodeID}}" {{$coordinatorItem->CodeID == $coordinatorW76F2201 ? 'selected': ''}}>{{$coordinatorItem->CodeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Thu_tu_hien_thi")}}</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input class="form-control" type="text" class="form-control"
                                               name="displayOrderW76F2201"
                                               maxlength="4" onkeypress="return inputNumber(event);" min="1" step="1"
                                               id="displayOrderW76F2201" value="{{$displayOrderW76F2201}}"
                                               placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="form-check-label mgt10">{{Helpers::getRS("Khong_su_dung")}}
                                        </label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <input type="checkbox" id="disabledW76F2201" name="disabledW76F2201"
                                               {{$disabledW76F2201 == 1 ? 'checked': ''}} value="1" class="mgt10">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <fieldset>
                                    <legend class="legend mgb5 pdb10">{{Helpers::getRS("Tien_ich_cua_phong_hop")}}</legend>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" id="isBlackboardW76F2201"
                                                       name="isBlackboardW76F2201"
                                                       class="hide" {{$isBlackboardW76F2201}}>
                                                <label>
                                                    <span class="fas fa-chalkboard mgr5"></span> {{Helpers::getRS("Bang_ghi")}}
                                                </label>
                                                <span class="fa fa-check mgl5 {{$isBlackboardW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" id="isProjectorW76F2201"
                                                       name="isProjectorW76F2201" class="hide" {{$isProjectorW76F2201}}>
                                                <label><span
                                                            class="fas fa-procedures mgr5"></span> {{Helpers::getRS("May_chieu")}}
                                                </label>
                                                <span class="fa fa-check mgl5 {{$isProjectorW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" id="isEthernetW76F2201"
                                                       name="isEthernetW76F2201" {{$isEthernetW76F2201}}>
                                                <label><span class="fab fa-ethereum mgr5"></span>Ethernet</label>
                                                <span class="fa fa-check mgl5 {{$isEthernetW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" id="isMicrophoneW76F2201"
                                                       name="isMicrophoneW76F2201" {{$isMicrophoneW76F2201}}>
                                                <label><span class="fas fa-microphone mgr5"></span> Microphone</label>
                                                <span class="fa fa-check mgl5 {{$isMicrophoneW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" id="isPCW76F2201"
                                                       name="isPCW76F2201" {{$isPCW76F2201}}>
                                                <label><span class="fas fa-desktop mgr5"></span> PC</label>
                                                <span class="fa fa-check mgl5 {{$isPCW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" id="isTeleConW76F2201"
                                                       name="isTeleConW76F2201" {{$isTeleConW76F2201}}>
                                                <label><span class="fas fa-chess-queen mgr5"></span> Tele-Conference
                                                </label>
                                                <span class="fa fa-check mgl5 {{$isTeleConW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" id="isVideoConW76F2201"
                                                       name="isVideoConW76F2201" {{$isVideoConW76F2201}}>
                                                <label><span class="fas fa-video mgr5"></span>
                                                    Video-Conference</label>
                                                <span class="fa fa-check mgl5 {{$isVideoConW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" id="isWifiW76F2201"
                                                       name="isWifiW76F2201" {{$isWifiW76F2201}}>
                                                <label><span class="fas fa-wifi mgr5"></span> Wifi</label>
                                                <span class="fa fa-check mgl5 {{$isWifiW76F2201}}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <button id="btnSubmitW76F2201" class="hide"></button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div id="toolbarW76F2201">
                </div>
            </div>
        </div>
    </section>


    <script>
        //        var fileW76F2201;
        @if ($task == "add" || $task == "edit")
        $("#formW76F2201").on('click', '.service-facility', function () {
            var check = $(this).find("input[type=checkbox]").prop("checked");
            $(this).find("input[type=checkbox]").prop('checked', !check);
            if (check == true)
                $(this).find(".fa-check").addClass("hide");
            else
                $(this).find(".fa-check").removeClass("hide");
        });
        @else
        //$(".cls-logistics").attr('disabled',true);
        //$("input, select").attr('disabled',true);
        @endif

        $(document).ready(function () {
            $('#displayOrderW76F2201').inputmask("numeric", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 0,
                autoGroup: true,
                rightAlign: true
            });
            $('#txtCapacityW76F2201').inputmask("numeric", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 0,
                autoGroup: true,
                rightAlign: true
            });
            $("#toolbarW76F2201").digiMenu({
                    showText: true,
                    cls: 'none-border none-background',
                    style: '',
                    buttonList: [
                        {
                            ID: "btnSaveW76F22201",
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
                                    frmW76F2001Save();
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
            enableControls('{{$task}}');
        });


        function frmW76F2001Save() {
            validationElements($("#formW76F2201"), function () {
                //Kiem tra nhung truong hop khac
                checkID($("#txtCapacityW76F2201"));
                checkID($("#displayOrderW76F2201"));
                $("#formW76F2201").find("#btnSubmitW76F2201").click();
            });
        }

        $('#formW76F2201').submit(function (e) {
            e.preventDefault();

            //var formData = new FormData($('#formW76F2201')[0]);
            var formData = $('#formW76F2201').serialize();
            var url = "";
            var task = "{{$task}}";
            if (task == "add") {
                url = '{{url("/w76f2201/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/w76f2201/update")}}';
            }
            console.log(url);
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: url,
                data: formData + "&facilityID={{$facilityID}}",
                //processData: false,
                //contentType: false,
                success: function (res) {
                    var result = JSON.parse(res);
                    console.log("luu");
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


        function enableControls(task) {
            switch (task) {
                case "view":
                    $('#txtFacilityNoW76F2201').prop('disabled', true);
                    $('#txtFacilityNameW76F2201').prop('disabled', true);
                    $('#txtLocationW76F2201').prop('disabled', true);
                    $('#txtCapacityW76F2201').prop('disabled', true);
                    $('#txtDescriptionW76F2201').prop('disabled', true);
                    $('#logisticsW76F2201').prop('disabled', true);
                    $('#divisionIDW76F2201').prop('disabled', true);
                    $('#coordinatorW76F2201').prop('disabled', true);
                    $('#displayOrderW76F2201').prop('disabled', true);
                    $('#disabledW76F2201').prop('disabled', true);
                    $("#toolbarW76F2201").data("digiMenu").hide('btnSaveW76F22201');
                    break;
                case "add":
                    $('#txtFacilityNoW76F2201').prop('disabled', false);
                    $('#txtFacilityNameW76F2201').prop('disabled', false);
                    $('#txtLocationW76F2201').prop('disabled', false);
                    $('#txtCapacityW76F2201').prop('disabled', false);
                    $('#txtDescriptionW76F2201').prop('disabled', false);
                    $('#logisticsW76F2201').prop('disabled', false);
                    $('#divisionIDW76F2201').prop('disabled', false);
                    $('#coordinatorW76F2201').prop('disabled', false);
                    $('#displayOrderW76F2201').prop('disabled', false);
                    $('#disabledW76F2201').prop('disabled', false);
                    break;
                case "edit":
                    $('#txtFacilityNoW76F2201').prop('disabled', true);
                    $('#txtFacilityNameW76F2201').prop('disabled', false);
                    $('#txtLocationW76F2201').prop('disabled', false);
                    $('#txtCapacityW76F2201').prop('disabled', false);
                    $('#txtDescriptionW76F2201').prop('disabled', false);
                    $('#logisticsW76F2201').prop('disabled', false);
                    $('#divisionIDW76F2201').prop('disabled', false);
                    $('#coordinatorW76F2201').prop('disabled', false);
                    $('#displayOrderW76F2201').prop('disabled', false);
                    $('#disabledW76F2201').prop('disabled', false);
                    $("#toolbarW76F2201").data("digiMenu").show('btnSaveW76F22201');
                    break;
//                    $("#toolbarW76F2201").data("digiMenu").show('btnSaveW76F22201');
                    break;
            }
        }
    </script>

@stop

@extends('page.master')
@section('body_content')
    @parent

    <section>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{Helpers::getRS('Cap_nhat_phong_hop')}}</h4>
            </div>
            <div class="card-body" id="modalW76F2201">
                <div id="bootstrap-data-table_wrapper"
                     class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                    <form id="formW76F2201" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Phong_hopU")}}</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" id="txtFacilityNoW76F2201" name="txtFacilityNoW76F2201"
                                               class="form-control"
                                               value="" required>
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
                                               class="form-control" value="" required>
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Dia_diem")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <input type="text" id="txtLocationW76F2201" name="txtLocationW76F2201"
                                               class="form-control"
                                               value="">
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
                                               id="txtCapacityW76F2201" value="" placeholder="" autocomplete="off">
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
                                                  autocomplete="off" style="height: 60px"></textarea>
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Hau_can")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <select name="cbLogisticsW76F2201" id="cbLogisticsW76F2201"
                                                class="form-control">
                                            <option value="">--</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    </div>
                                </div>

                                <div class="row mgb5">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Don_vi")}}</label>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <select name="cbDivisionIDW76F2201" id="cbDivisionIDW76F2201"
                                                class="form-control" required>
                                            <option value="">--</option>
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
                                        <select name="cbCoordinatorW76F2201" id="cbCoordinatorW76F2201"
                                                class="form-control">
                                            <option value="">--</option>
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
                                               id="displayOrderW76F2201" value="" placeholder="" autocomplete="off">
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
                                               value="" class="mgt10">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <fieldset>
                                    <legend class="legend mgb5 pdb10">{{Helpers::getRS("Tien_ich_cua_phong_hop")}}</legend>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" id="chkIsBlackboard" name="chkIsBlackboard"
                                                       class="hide">
                                                <label>
                                                    <span class="fas fa-chalkboard mgr5"></span> {{Helpers::getRS("Bang_ghi")}}
                                                </label>
                                                <span class="fa fa-check mgl5"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" name="chkIsProjector" class="hide">
                                                <label><span
                                                            class="fas fa-procedures mgr5"></span> {{Helpers::getRS("May_chieu")}}
                                                </label>
                                                <span class="fa fa-check mgl5"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" name="chkIsEthernet">
                                                <label><span class="fab fa-ethereum mgr5"></span>Ethernet</label>
                                                <span class="fa fa-check mgl5"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide"
                                                       name="chkIsMicrophone">
                                                <label><span class="fas fa-microphone mgr5"></span> Microphone</label>
                                                <span class="fa fa-check mgl5 }"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" name="chkIsPC">
                                                <label><span class="fas fa-desktop mgr5"></span> PC</label>
                                                <span class="fa fa-check mgl5 "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide" name="chkIsTeleCon">
                                                <label><span class="fas fa-chess-queen mgr5"></span> Tele-Conference
                                                </label>
                                                <span class="fa fa-check mgl5 "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide"
                                                       name="chkIsVideoCon">
                                                <label><span class="fas fa-video mgr5"></span>
                                                    Video-Conference</label>
                                                <span class="fa fa-check mgl5 "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pdb10">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="checkbox service-facility">
                                                <input type="checkbox" class="hide"
                                                       name="chkIsWifi">
                                                <label><span class="fas fa-wifi mgr5"></span> Wifi</label>
                                                <span class="fa fa-check mgl5 "></span>
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
        });
        enableControls('{{$task}}');



        function frmW76F2001Save() {
            validationElements($("#formW76F2201"), function () {
                //Kiem tra nhung truong hop khac
                checkID($("#txtCapacityW76F2201"));
                checkID($("#displayOrderW76F2201"));
                $("#formW76F2201").find("#btnSubmitW76F2201").click();
            });
        }

        function enableControls(task) {
            switch (task) {
                case "view":
                    $('#txtFacilityNoW76F2201').pop('disabled, true');
                    $('#txtFacilityNameW76F2201').pop('disabled, true');
                    $('#txtLocationW76F2201').pop('disabled, true');
                    $('#txtCapacityW76F2201').pop('disabled, true');
                    $('#txtDescriptionW76F2201').pop('disabled, true');
                    $('#cbLogisticsW76F2201').pop('disabled, true');
                    $('#cbDivisionIDW76F2201').pop('disabled, true');
                    $('#cbCoordinatorW76F2201').pop('disabled, true');
                    $('#displayOrderW76F2201').pop('disabled, true');
                    $('#disabledW76F2201').pop('disabled, true');
                    $("#toolbarW76F2201").data("digiMenu").hide('btnSaveW76F22201');
                    break;
                case "edit":
                    $('#txtFacilityNoW76F2201').pop('disabled, true');
                    $('#txtFacilityNameW76F2201').pop('disabled, false');
                    $('#txtLocationW76F2201').pop('disabled, false');
                    $('#txtCapacityW76F2201').pop('disabled, false');
                    $('#txtDescriptionW76F2201').pop('disabled, false');
                    $('#cbLogisticsW76F2201').pop('disabled, false');
                    $('#cbDivisionIDW76F2201').pop('disabled, false');
                    $('#cbCoordinatorW76F2201').pop('disabled, false');
                    $('#displayOrderW76F2201').pop('disabled, false');
                    $('#disabledW76F2201').pop('disabled, false');
                    $("#toolbarW76F2201").data("digiMenu").show('btnSaveW76F22201');
                    break;
                case "add":
                    $("#toolbarW76F2201").data("digiMenu").show('btnSaveW76F22201');
                    break;
            }
        }
    </script>

@stop

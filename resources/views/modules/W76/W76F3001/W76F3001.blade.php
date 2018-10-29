@extends('modules.W76.W76F3001.components.layout')
@section('w76f3001')
    <section>
        <?php
        if ($task == "edit" && $rowData != null) {
            $master = $rowData;
            //\Debugbar::info($rowData->UserID);

            //$positionIDW76F3001 = $rowData["PositionName"];
            $employeeID = $rowData->EmployeeID;
            $employeeCodeW76F3001 = $rowData->EmployeeID;
            $familyNameW76F3001 = $rowData->FamilyName;
            $middleNameW76F3001 = $rowData->MiddleName;
            $firstNameW76F3001 = $rowData->FirstName;
            $birthDate1W76F3001 = $rowData->BirthDate;
            $genderW76F3001 = $rowData->Gender;
            $emailW76F3001 = $rowData->Email;
            $email2W76F3001 = $rowData->Email2;
            $addressW76F3001 = $rowData->Address;
            $workPhoneW76F3001 = $rowData->WorkPhone;
            $mobilePhoneW76F3001 = $rowData->MobilePhone;
            $startDateW76F3001 = $rowData->StartDate;

            $orgunitIDW76F3001 = $rowData->OrgunitName;
            $highExecutiveIDW76F3001 = $rowData->EmployeeName;
            $supervisorIDW76F3001 = $rowData->EmployeeName;

            $positionIDW76F3001 = $rowData->PositionName;
            $orgunitIDW76F3001 = "";
            $highExecutiveIDW76F3001 = "";
            $supervisorIDW76F3001 = "";
            $imageW76 = asset('/media/no-photo.jpg');
        } else {
            $employeeID = "";
            $employeeCodeW76F3001 = "";
            $imageW76 = asset('/media/no-photo.jpg');
            $familyNameW76F3001 = "";
            $middleNameW76F3001 = "";
            $firstNameW76F3001 = "";
            $birthDate1W76F3001 = "";
            $genderW76F3001 = "";
            $emailW76F3001 = "";
            $email2W76F3001 = "";
            $addressW76F3001 = "";
            $workPhoneW76F3001 = "";
            $mobilePhoneW76F3001 = "";
            $startDateW76F3001 = "";


            $positionIDW76F3001 = "";
            $orgunitIDW76F3001 = "";
            $highExecutiveIDW76F3001 = "";
            $supervisorIDW76F3001 = "";

        }

        ?>
        <div class="task-list">
            <div class="row mgb5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="toolbar_W76F3001">
                    </div>
                </div>
            </div>
            <form id="frm_TasDetail" name="frm_TasDeatil" method="post">
                {{csrf_field()}}
                <div class="row mgb5">


                    <div class="col-sm-3 well-employee" style="margin-left: 15px; ">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-lg-12" style="padding: 10px">
                            <a><img src="{{$imageW76}}" class="new-account-img"/>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pdt10">
                            <label><i class="fas fa-phone-volume mgr5"></i>{{ Helpers::getRS('Di_dong')}}: <span
                                        id="OutputmobilePhoneW76F3001">{{$mobilePhoneW76F3001}}</span></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pdt10">
                            <label><i class="far fa-envelope mgr5"></i><span id="Outputemail2W76F3001">{{$email2W76F3001}}
                                    : </span></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pdt10">
                            <label><i class="fas fa-map-marker-alt mgr5"></i>{{ Helpers::getRS('Dia_chi')}}: <span
                                        id="OutputaddressW76F3001">{{$addressW76F3001}}</span></label>
                        </div>
                    </div>


                    <div class="col-sm-8 well-employee" style="margin-left: 15px;">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Account_Information"><i
                                            class="fas fa-newspaper mgr5"></i>{{Helpers::getRS("Thong_tin_tai_khoan")}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Organizational_Information"><i
                                            class="fas fa-users mgr5"></i>{{Helpers::getRS("Thong_tin_to_chuc")}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Access_Permission"><i
                                            class="fas fa-user-alt mgr5"></i>{{Helpers::getRS("Quyen_truy_cap")}}</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="Account_Information" class="row mgb5 container tab-pane active">
                                <div class="row mgb5" style="margin-left: 10px">
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Tai_khoan")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="employeeCodeW76F3001" id="employeeCodeW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$employeeCodeW76F3001}}" required>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Ho_U")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="familyNameW76F3001" id="familyNameW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$familyNameW76F3001}}" required>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Ten_dem")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="middleNameW76F3001" id="middleNameW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$middleNameW76F3001}}">
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Ten")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="firstNameW76F3001" id="firstNameW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$firstNameW76F3001}}" required>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Ngay_sinh")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mgb5">
                                        <input type="text" name="birthDate1W76F3001" id="birthDate1W76F3001"
                                               class="form-control" autocomplete="off" value="{{$birthDate1W76F3001}}">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Gioi_tinh")}}</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mgb5">
                                        <input type="text" name="genderW76F3001" id="genderW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$genderW76F3001}}">
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Email_cong_ty")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="emailW76F3001" id="emailW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$emailW76F3001}}">
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Email_ca_nhan")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="email2W76F3001" id="email2W76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$email2W76F3001}}">
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal"
                                               for="">{{Helpers::getRS("Dien_thoai_cong_ty")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="workPhoneW76F3001" id="workPhoneW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$workPhoneW76F3001}}">
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal"
                                               for="">{{Helpers::getRS("Dien_thoai_di_dong")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="mobilePhoneW76F3001" id="mobilePhoneW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$mobilePhoneW76F3001}}">
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Dia_chi")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                        <input type="text" name="addressW76F3001" id="addressW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$addressW76F3001}}">
                                    </div>
                                </div>
                            </div>

                            <div id="Organizational_Information" class="row mgb5 container tab-pane">
                                <div class="row mgb5" style="margin-left: 10px">
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-lg-4 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Co_cau_to_chuc")}}</label>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 mgb5">
                                        <select name="orgunitIDW76F3001" id="orgunitIDW76F3001" class="form-control">
                                            @foreach($orgunitList as  $orgunitItem)
                                                <option value="{{$orgunitItem->OrgunitID}}" {{$orgunitItem->OrgunitID == $orgunitIDW76F3001 ? 'selected': ''}}>{{$orgunitItem->OrgunitName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-lg-4 mgb5">
                                        <label class="lbl-normal"
                                               for="">{{Helpers::getRS("Chuc_danh_cong_viec_U")}}</label>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 mgb5">
                                        <select name="positionIDW76F3001" id="positionIDW76F3001" class="form-control">
                                            @foreach($positionIDList as  $positionItem)
                                                <option value="{{$positionItem->PositionID}}" {{$positionItem->PositionID == $positionIDW76F3001 ? 'selected': ''}}>{{$positionItem->PositionName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-lg-4 mgb5">
                                        <label class="lbl-normal"
                                               for="">{{Helpers::getRS("Nguoi_quan_ly_truc_tiep_")}}</label>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 mgb5">
                                        <select name="supervisorIDW76F3001" id="supervisorIDW76F3001"
                                                class="form-control">
                                            @foreach($supervisorList as  $supervisorItem)
                                                <option value="{{$supervisorItem->EmployeeID}}" {{$supervisorItem->EmployeeID == $supervisorIDW76F3001 ? 'selected': ''}}>{{$supervisorItem->EmployeeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-lg-4 mgb5">
                                        <label class="lbl-normal"
                                               for="">{{Helpers::getRS("Nguoi_quan_ly_cap_cao")}}</label>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 mgb5">
                                        <select name="highExecutiveIDW76F3001" id="highExecutiveIDW76F3001"
                                                class="form-control">
                                            @foreach($highExecutiveList as  $highExecutiveItem)
                                                <option value="{{$highExecutiveItem->EmployeeID}}" {{$highExecutiveItem->EmployeeID == $highExecutiveIDW76F3001 ? 'selected': ''}}>{{$highExecutiveItem->EmployeeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-lg-4 mgb5">
                                        <label class="lbl-normal" for="">{{Helpers::getRS("Ngay_vao_lam")}}</label>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 mgb5">
                                        <input type="text" name="startDateW76F3001" id="startDateW76F3001"
                                               class="form-control"
                                               maxlength="250"
                                               autocomplete="off" value="{{$startDateW76F3001}}">
                                    </div>
                                </div>
                            </div>
                            <div id="Access_Permission" class="row mgb5 container tab-pane">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="btnSubmitW84F1000" class="hide"></button>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function () {

            $("#other").click(function () {
                $("#target").keyup();
            });


            $('#birthDate1W76F3001').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '{{Session::get("locate")}}'
            });
            $('#startDateW76F3001').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '{{Session::get("locate")}}'
            });
            $("#toolbar_W76F3001").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnBack_W76F3001",
                            icon: "fas fa-arrow-left",
                            title: "{{Helpers::getRS('Quay_lai')}}",
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
                                    {{--window.location.href = "{{url('/W84F1000/edit')}}";--}}
                                });
                            }
                        }
                        , {
                            ID: "btnSave_W76F3001",
                            icon: "fas fa-save",
                            title: "{{Helpers::getRS('Luu')}}",
                            cls: "btn btn-success",
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
                                });
                            }
                        }
                        , {
                            ID: "btnAccount_W76F3001",
                            icon: "fas fa-cog",
                            title: "{{Helpers::getRS('Cap_quyen')}}",
                            cls: "btn btn-success",
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
                                    window.location.href = "{{url('/W76F3002/add')}}";
                                });
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
                url = '{{url("/W76F3001/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/W76F3001/update")}}';
            }
            {{--if (task == "delete") {--}}
            {{--url = '{{url("/W84F1000/delete")}}';--}}
            {{--}--}}

            $.ajax({
                method: "POST",
                url: url,
                data: formData +"$employeeID={{$employeeID}}",
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


        $(function () {
            var mobilePhoneW76F3001 = $("#mobilePhoneW76F3001");
            var OutputmobilePhoneW76F3001 = $("#OutputmobilePhoneW76F3001");
            var theOutputKeyUp = $("#theOutputKeyUp");
            var theOutputFocusOut = $("#theOutputFocusOut");

            mobilePhoneW76F3001.keyup(function (event) {
                keyReport(event, theOutputKeyUp);
            });

            mobilePhoneW76F3001.focusout(function (event) {
                theOutputFocusOut.html(".focusout() fired!");
            });

            mobilePhoneW76F3001.focus(function (event) {
                theOutputFocusOut.html(".focus() fired!");
            });

            var email2W76F3001 = $("#email2W76F3001");
            var Outputemail2W76F3001 = $("#Outputemail2W76F3001");

            email2W76F3001.keyup(function (event) {
                keyReport(event, theOutputKeyUp);
            });

            email2W76F3001.focusout(function (event) {
                theOutputFocusOut.html(".focusout() fired!");
            });

            email2W76F3001.focus(function (event) {
                theOutputFocusOut.html(".focus() fired!");
            });

            var addressW76F3001 = $("#addressW76F3001");
            var OutputaddressW76F3001 = $("#OutputaddressW76F3001");

            addressW76F3001.keyup(function (event) {
                keyReport(event, theOutputKeyUp);
            });

            addressW76F3001.focusout(function (event) {
                theOutputFocusOut.html(".focusout() fired!");
            });

            addressW76F3001.focus(function (event) {
                theOutputFocusOut.html(".focus() fired!");
            });

            function keyReport(event, output) {
                event.preventDefault();
                OutputmobilePhoneW76F3001.text(mobilePhoneW76F3001.val());
                Outputemail2W76F3001.text(email2W76F3001.val());
                OutputaddressW76F3001.text(addressW76F3001.val());
            }
        });


    </script>

    <style>
        .new-account-img {
            display: block;
            width: 200px;
            max-height: 200px;
            border-radius: 50%;

        }

        .card-account {
            border: 1px solid #20a8d8;
            padding: 10px;
            border-width: 2px;
        }

        /*.card-accent-primary {*/
        /*border: 1px solid #c8ced3;*/
        /*border-top-width: 2px;*/
        /*}*/
    </style>

@stop
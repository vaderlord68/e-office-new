@extends('layouts.layout')
@section('content')
    @parent
    <?php
    if ($task == "edit") {//Edit
        $carNo = $rowData->CarNo;
        $carBranch = $rowData->CarBranch;
        $description = $rowData->Description;
        $carTypeID = $rowData->CarTypeID;
        $carDriverID = $rowData->Driver;
        $isDisabled = $rowData->Disabled;
        $displayOrder = $rowData->DisplayOrder;
        $createDate = date('d/m/Y H:i', strtotime($rowData->CreateDate));
        $createUserID = $rowData->CreateUserID;
        $lastModifyDate = date('d/m/Y H:i', strtotime($rowData->CreateUserID));
        $lastModifyUserID = $rowData->LastModifyUserID;
    } else {
        $carNo = "";
        $carBranch = "";
        $description = "";
        $carTypeID = "";
        $carDriverID = "";
        $isDisabled = 1;
        $displayOrder = 0;
        $createDate = "";
        $createUserID = "";
        $lastModifyDate = "";
        $lastModifyUserID = "";
    }
    ?>

    <section>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{Helpers::getRS('Cap_nhat_xe_cong_tac')}}</h4>
            </div>
            <div class="card-body" id="modalW77F1001" style="padding: 15px">
                    <form id="formW77F1001" method="POST" enctype="multipart/form-data" action="">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("So_xe")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input type="text" id="txtCarNoW77F1001" maxlength="50" name="txtCarNoW77F1001"
                                               class="form-control"
                                               value="{{$carNo}}" required>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Hang_xe")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input type="text" id="txtCarBranchW77F1001" maxlength="100" name="txtCarBranchW77F1001"
                                               class="form-control" value="{{$carBranch}}" required>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Mo_ta")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <textarea type="text" id="txtDescriptionW77F1001" maxlength="4000" name="txtDescriptionW77F1001"
                                                  class="form-control"
                                                  autocomplete="off"
                                                  rows="5">{{$description}}</textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Loai_xe")}}</label>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <select name="slCarTypeW77F1001" id="slCarTypeW77F1001  "
                                                class="form-control" required>
                                            {{--<option value="">--</option>--}}
                                            @foreach($carTypes as  $type)
                                                <option value="{{$type->CarTypeID}}" {{$type->CarTypeID == $carTypeID ? 'selected': ''}}>{{$type->Description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Tai_xe")}}</label>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <select name="slCarDriverW77F1001" id="slCarDriverW77F1001  "
                                                class="form-control" required>
                                            {{--<option value="">--</option>--}}
                                            @foreach($carDrivers as  $driver)
                                                <option value="{{$driver->EmployeeID}}" {{$driver->EmployeeID == $carDriverID ? 'selected': ''}}>{{$driver->EmployeeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Thu_tu_hien_thi")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input class="form-control" type="number" class="form-control"
                                               name="displayOrderW77F1001"
                                               max="9999" min="0" oninput="validity.valid||(value == '' ? value='' : value=9999);"
                                               id="displayOrderW77F1001" value="{{$displayOrder}}"
                                               placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="form-check-label mgt10">{{Helpers::getRS("Hoat_dong_U")}}
                                        </label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <input type="checkbox" id="chkDisabledW77F1001" name="chkDisabledW77F1001"
                                               {{$isDisabled == 0 ? 'checked': ''}} value="0" class="mgt10 custom-checkbox">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="hdCarNoW77F1001" id="hdCarNoW77F1001" value="{{ $carNo }}" />
                        <button type="submit" id="btnSubmitW77F1001" class="hide"></button>
                    </form>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        @if ($task == 'edit')
                        <span class="text-muted">{{Helpers::getRS('Duoc_tao_vao') . ' ' . $createDate . ' ' . Helpers::getRS('boi') . ' ' . $createUserID }}</span><br>
                            @if (!empty($lastModifyUserID))
                                <span class="text-muted">{{Helpers::getRS('Lan_chinh_sua_cuoi')  . ' ' . $lastModifyDate . ' ' . Helpers::getRS('boi') . ' ' . $lastModifyUserID }}</span>
                            @endif
                        @endif
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right">
                        <div id="toolbarW77F1001"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function () {
            $("#toolbarW77F1001").digiMenu({
                showText: true,
                cls: 'none-border none-background',
                style: '',
                buttonList: [
                    {
                        ID: "btnSaveW77F1001",
                        icon: "fas fa-save",
                        title: "{{Helpers::getRS('Luu')}}",
                        enable: true,
                        hidden: false,
                        type: "button",
                        cls: "btn  btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                frmW77F1001Save();
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
            });
            enableControls('{{$task}}');
        });


        function frmW77F1001Save() {
            validationElements($("#formW77F1001"), function () {
                //Kiem tra nhung truong hop khac
                var carNo = $("#txtCarNoW77F1001").val();
                if (carNo.indexOf(' ') > -1) {
                    $("#txtCarNoW77F1001").get(0).setCustomValidity('{{ Helpers::getRS('Ma_co_ky_tu_khong_hop_le') }}');
                }
                $("#formW77F1001").find("#btnSubmitW77F1001").click();
            });
        }

        $('#formW77F1001').submit(function (e) {
            e.preventDefault();

            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: '{{ $task == 'add' ? url("/W77F1001/save") : url("/W77F1001/update") }}',
                data: $('#formW77F1001').serialize(),
                success: function (data) {
                    data = JSON.parse(data);
                    switch (data.status) {
                        case "EXIST":
                            alert_error(data.message);
                            break;
                        case 'ERROR':
                            alertError(data.message);
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
                case "add":
                    $('#txtCarNoW77F1001').prop('disabled', false);
                    $('#txtCarBranchW77F1001').prop('disabled', false);
                    $('#txtDescriptionW77F1001').prop('disabled', false);
                    $('#slCarTypeW77F1001').prop('disabled', false);
                    $('#slCarDriverW77F1001  ').prop('disabled', false);
                    $('#displayOrderW77F1001').prop('disabled', false);
                    $('#chkDisabledW77F1001').prop('disabled', false);
                    break;
                case "edit":
                    $('#txtCarNoW77F1001').prop('disabled', true);
                    $('#txtCarBranchW77F1001').prop('disabled', false);
                    $('#txtDescriptionW77F1001').prop('disabled', false);
                    $('#slCarTypeW77F1001').prop('disabled', false);
                    $('#slCarDriverW77F1001  ').prop('disabled', false);
                    $('#displayOrderW77F1001').prop('disabled', false);
                    $('#chkDisabledW77F1001').prop('disabled', false);
                    break;
            }
        }
    </script>

@stop

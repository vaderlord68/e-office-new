<div class="modal fadeInDown" id="myModal">
    <div class="modal-dialog " style="width: 95% !important; max-width: 95% !important;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{Helpers::getRS("Dang_ky_xe_")}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                if ($task == "edit") {//Edit
                    $master = $rowData;
                    $CarBookingID = $rowData["CarBookingID"];
                    $cbCarTypeIDW77F2001 = $rowData["CarTypeID"];
                    $cbCarNoIDW77F2001 = $rowData["CarNo"];
                    $descriptionW77F2001 = $rowData["Description"];
                    $orgunitNameW77F2001 = session('W76P0000')->OrgUnitName;
                    $orgunitIDW77F2001 = session('W76P0000')->OrgUnitID;
                    $cbParticipantsW77F2001 = $rowData["Participants"];
                    $txtNumParticipantsW77F2001 = $rowData["NumParticipants"];
                    $workPlaceW77F2001 = $rowData["WorkPlace"];
                    $start = $all["start"];
                    $end = $all["end"];
                    $date = $all["date"];
                    $userID = Auth::user()->UserID;
                    $approvalNotesW77F2001 = $rowData["ApprovalNotes"];

                } else {
                    $CarBookingID = "";
                    $cbCarTypeIDW77F2001 = "";
                    $descriptionW77F2001 = "";
                    $orgunitIDW77F2001 = session('W76P0000')->OrgUnitID;
                    $orgunitNameW77F2001 = session('W76P0000')->OrgUnitName;
                    $cbParticipantsW77F2001 = "";
                    $txtNumParticipantsW77F2001 = "";
                    $workPlaceW77F2001 = "";
                    $start = $all["start"];
                    $end = $all["end"];
                    $date = $all["date"];
                    $approvalNotesW77F2001 = "";
                    \Debugbar::info(Auth::user());
                    $userID = Auth::user()->UserID;
                }
                ?>

                <section>
                    <div class="card">
                        {{--<div class="card-header">--}}
                        {{--<h4 class="card-title"></h4>--}}
                        {{--</div>--}}
                        <div class="card-body" id="modalW77F2001">
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    @include('page.content.alert-dismissible')
                                </div>
                            </div>
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                                <form id="formW77F2001" method="POST" enctype="multipart/form-data" action="">
                                    {{csrf_field()}}
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_tao")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <label>
                                                {{$userID}}
                                            </label>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        </div>
                                    </div>

                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Loai_xe")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <select name="cbCarTypeIDW77F2001" id="cbCarTypeIDW77F2001"
                                                    class="form-control" maxlength="50" required>
                                                <option value="">--</option>
                                                <?php $term = []; ?>
                                                @foreach($carDList as  $type)
                                                    @if (!in_array($type->CarTypeID, $term))
                                                        <option value="{{$type->CarTypeID}}" {{$type->CarTypeID == $cbCarTypeIDW77F2001 ? 'selected': ''}}>{{$type->CarTypeName}}</option>
                                                        <?php  $term[] = $type->CarTypeID; ?>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("So_xe")}}</label>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <select name="cbCarNoW77F2001" id="cbCarNoW77F2001"
                                                    class="form-control" maxlength="50" required>
                                                @foreach($carNoList as  $carNoListItem)
                                                    <option value="{{$carNoListItem->CarNo}}"
                                                            {{$carNoListItem->CarNo == $cbCarTypeIDW77F2001 ? 'selected': ''}}
                                                            data-desc="{{$carNoListItem->Description}}">{{$carNoListItem->CarBranch}}</option>
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
                                                <input type="text" class="form-control" id="dateFromW77F2001"
                                                       name="dateFromW77F2001" value="{{$date}}"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" id="timeFromW77F2001"
                                                       name="timeFromW77F2001" value="{{$start}}"
                                                       autocomplete="off"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Ket_thuc")}}</label>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <input type="text" class="form-control" id="dateToW77F2001"
                                                   placeholder="00:00"
                                                   name="dateToW77F2001"
                                                   class="form-control" value="{{$date}}" autocomplete="off" required>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" id="timeToW77F2001"
                                                       name="timeToW77F2001" value="{{$end}}"
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
                                            <input name="orgunitNameW77F2001" id="orgunitNameW77F2001" maxlength="50"
                                                   class="form-control"
                                                   readonly="" value="{{$orgunitNameW77F2001}}">
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
                                                      class="form-control" id="descriptionW77F2001"
                                                      name="descriptionW77F2001">{{$descriptionW77F2001}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Noi_cong_tac")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control"
                                                   maxlength="1000"
                                                   autocomplete="off" required
                                                   class="form-control" id="workPlaceW77F2001"
                                                   name="workPlaceW77F2001" value="{{$workPlaceW77F2001}}">
                                            </input>
                                        </div>
                                    </div>

                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_di_cung")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select name="cbParticipantsW77F2001[]" maxlength="500"
                                                    id="cbParticipantsW77F2001"
                                                    class="form-control" multiple>
                                                @foreach($participantsList as  $participantsListItem)
                                                    <option value="{{$participantsListItem->EmployeeCode}}"
                                                            {{ isset($cbParticipantsW77F2001) && !empty($cbParticipantsW77F2001) && isset($participantsListItem->EmployeeCode)
                                                            && in_array($participantsListItem->EmployeeCode, $cbParticipantsW77F2001) ? 'selected' : '' }}>{{$participantsListItem->Fullname}}</option>
                                                    {{--{{$participantsListItem->EmployeeCode == $cbParticipantsW77F2001 ? 'selected': ''}}--}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("So_nguoi_di")}}</label>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <input type="text" class="form-control"
                                                   id="txtNumParticipantsW77F2001"
                                                   name="txtNumParticipantsW77F2001"
                                                   class="form-control" maxlength="4"
                                                   onkeypress="return inputNumber(event);" min="1" step="1"
                                                   value="{{$txtNumParticipantsW77F2001}}"
                                                   placeholder="" autocomplete="off" required>
                                        </div>
                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        </div>
                                    </div>

                                    <div class="row mgb5">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="lbl-normal">{{Helpers::getRS("Ghi_chu_duyet")}}</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control"
                                                   autocomplete="off" class="form-control" id="approvalNotesW77F2001"
                                                   name="approvalNotesW77F2001" maxlength="500"
                                                   value="{{$approvalNotesW77F2001}}">
                                            </input>
                                        </div>
                                    </div>

                                    <button id="btnSubmitW77F2001" class="hide"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div id="toolbarW77F2001">
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    @if ($task == "add" || $task == "edit")
    $("#formW77F2001").on('click', '.service-facility', function () {
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

    var listCarType = {!! json_encode($carDList) !!};


    $(document).ready(function () {

        $('#cbCarNoW77F2001').select2({
            templateResult: function (state) {
                if (!state.id) {
                    return state.text;
                }
                return $('<span>' + state.text + ' (' + state.id + ')</span><br><small>' + $(state.element).data('desc') + '</small>');
            }
        });

        $('#cbCarTypeIDW77F2001').on('change', function () {
            var carTypeCurrent = $(this).val();
            var listCar = $.grep(listCarType, function (val) {
                return val.CarTypeID == carTypeCurrent;
            });
            var options = '';
            console.log(listCarType);
            $.each(listCar, function (key, val) {
                options += '<option value="' + val.CarNo + '" data-desc="' + val.Description + '">' + val.CarBranch + '</option>';
            });
            $('#cbCarNoW77F2001').html(options);
            $('#cbCarNoW77F2001').select2({
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    return $('<span>' + state.text + ' (' + state.id + ')</span><br><small>' + $(state.element).data('desc') + '</small>');
                }
            });
        });

        $('#cbParticipantsW77F2001').select2({});
        $('#txtNumParticipantsW77F2001').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 0,
            autoGroup: true,
            rightAlign: true
        });
        $('#dateFromW77F2001').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });
        $('#dateToW77F2001').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Session::get("locate")}}'
        });

        $('#timeFromW77F2001').inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });
        $('#timeToW77F2001').inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });

        var permission = '{{Helpers::getPermission('W77F20001','')}}'

        $("#toolbarW77F2001").digiMenu({
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
                        ID: "btnSaveW77F2001",
                        icon: "fas fa-save",
                        title: "{{Helpers::getRS('Gui_duyet')}}",
                        enable: function () {
                            return true;
                        },
                        hidden: false,
                        type: "button",
                        cls: "btn btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                frmW77F2001save();
                            });
                        }
                    }
                    , {
                        ID: "btnEject",
                        icon: "fas fa-ban",
                        title: '{{Helpers::getRS("Tu_choi")}}',
                        enable: true,
                        hidden: function (ui) {
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
                        enable: function () {
                            return true;
                        },
                        hidden: function (ui) {
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

//
        function frmW77F2001save() {
            validationElements($("#formW77F2001"), function () {
                //Kiem tra nhung truong hop khac
                checkID($("#txtNumParticipantsW77F2001"));
                $("#formW77F2001").find("#btnSubmitW77F2001").click();
            });
        }

        function updateApproveStatus(status) {
            var notes = $('#approvalNotesW77F2001').val();
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: '{{ url('/W77F2001/updateStatus') }}',
                data: {
                    status: status,
                    notes: notes,
                    carBookingID: '{{$CarBookingID}}',
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    var result = JSON.parse(res);
                    console.log("luu");
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message, $("#modalW77F2001"))
                            break;
                        case 'INVAILD':
                            alertError(result.message, $("#modalW77F2001"))
                            break;
                        case 'SUCC':
                            window.location.reload();
                            break;
                    }
                }
            });
        }

        $('#formW77F2001').submit(function (e) {
            e.preventDefault();

            //var formData = new FormData($('#formW77F2231')[0]);
            var formData = $('#formW77F2001').serialize();
            var url = "";
            var task = "{{$task}}";
            if (task == "add") {
                url = '{{url("/W77F2001/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/W77F2001/update")}}';
            }
            console.log(url);
            hideAlert();
            $.ajax({
                //enctype: 'multipart/form-data',
                method: "POST",
                url: url,
                data: formData + "&CarBookingID={{$CarBookingID}}" + "&orgunitIDW77F2001={{$orgunitIDW77F2001}}",
                // processData: false,
                //contentType: false,
                success: function (res) {
                    var result = JSON.parse(res);
                    console.log("luu");
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message, $("#modalW77F2001"))
                            break;
                        case 'EXIST':
                            alertError(result.message, $("#modalW77F2001"))
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



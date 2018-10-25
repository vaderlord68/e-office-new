<div class="modal fadeInDown" id="myModalAssign">
    <div class="modal-dialog " style="width: 40% !important; max-width: 40% !important;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{Helpers::getRS("Giao_viec")}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="margin-bottom: -20px;">
                <?php
                if ($task == "AssignTask") {//Edit
                    $employee_AssignTask = $rowData["EmployeeID"];
                    $TaskID = $rowData["TaskID"];
                    //$ischeck_AssignTask = $rowData["$ischeck_AssignTask"] == 1 ? "checked" : "";
//                                    $cbCarTypeIDW77F2001 = $rowData["CarTypeID"];
//                                    $cbCarNoIDW77F2001 = $rowData["CarNo"];
//                                    $descriptionW77F2001 = $rowData["Description"];
//                                    $orgunitNameW77F2001 = session('W76P0000')->OrgUnitName;
//                                    $orgunitIDW77F2001 = session('W76P0000')->OrgUnitID;
//                                    $cbParticipantsW77F2001 = $rowData["Participants"];
//                                    $txtNumParticipantsW77F2001 = $rowData["NumParticipants"];
//                                    $workPlaceW77F2001 = $rowData["WorkPlace"];
//                                    $approvalNotesW77F2001 = $rowData["ApprovalNotes"];

                } else {
                    $employee_AssignTask = "";
                    $TaskID = "";
                    //$ischeck_AssignTask = 0;
//                                    $statusList = "";
//                                    $descriptionW77F2001 = "";
//                                    $orgunitIDW77F2001 = session('W76P0000')->OrgUnitID;
//                                    $orgunitNameW77F2001 = session('W76P0000')->OrgUnitName;
//                                    $cbParticipantsW77F2001 = "";
//                                    \Debugbar::info(Auth::user());
//                                    $userID = Auth::user()->UserID;
                }
                ?>
                <section>
                    <div class="card">
                        <div class="card-body" id="modalAssignTask">
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                                <form id="formAssignTask" method="POST" enctype="multipart/form-data" action="">
                                    {{csrf_field()}}
                                    <div class="row mgb5">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label class="lbl-normal">{{Helpers::getRS("Nguoi_xu_ly")}}</label>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            {{--khong su dung select2--}}
                                            <select name="employee_AssignTask" id="employee_AssignTask"
                                                    class="form-control">
                                                @foreach($emPloyeeList as  $emPloyeeItem)
                                                    <option value="{{$emPloyeeItem->EmployeeID}}"
                                                            {{ !empty($employee_AssignTask) && $emPloyeeItem->EmployeeID == $employee_AssignTask ? 'selected' : '' }}
                                                            data-position="{{$emPloyeeItem->PositionName}}"
                                                            data-img="{{$emPloyeeItem->Thumnail}}"
                                                    >{{$emPloyeeItem->EmployeeName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="ischeck_AssignTask" name="ischeck_AssignTask"
                                                           value="1">
                                                    {{Helpers::getRS("Can_theo_doi_")}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button id="btnSubmitAsignTask" class="hide"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div id="toolbarAssignTask">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#employee_AssignTask').select2({
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
        $("#toolbarAssignTask").digiMenu({
                showText: true,
                buttonList: [
                    {
                        ID: "btnSave_AssignTask",
                        icon: "fas fa-check",
                        title: "{{Helpers::getRS('Dong_y')}}",
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
                                frmAssignSave();
                            });
                        }
                    }
                    , {
                        ID: "btnClose_AssignTask",
                        icon: "fas fa-times",
                        title: "{{Helpers::getRS('_Dong')}}",
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
                                window.location.reload();
                            });
                        }
                    }
                ]
            }
        );
    });

    function frmAssignSave() {
        validationElements($("#formAssignTask"), function () {
            //Kiem tra nhung truong hop khac
//                checkID($("#txtContractNo"));
            console.log($("#formAssignTask").find("#btnSubmitAsignTask"));
            $("#formAssignTask").find("#btnSubmitAsignTask").click();
        });
    }

    $('#formAssignTask').on('submit', function (e) {
        e.preventDefault();
        var formData = $('#formAssignTask').serialize();
        console.log("abc");
        var url = "";
        var task = "{{$task}}";
        console.log(task);
        if (task == "AssignTask") {
            url = '{{url("/W84F1000/update_AssignTask")}}';
        }
        $.ajax({
            method: "POST",
            url: url,
            data: formData + "&TaskID={{$TaskID}}&_token={{ csrf_token() }}",
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
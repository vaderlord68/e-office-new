<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <?php
    use Illuminate\Support\Facades\Auth;
    if ($task == 'edit' || $task == 'view') {
        $ID = $rsData->ID;
        $fileName = $rsData->FileName;
        $txtContractNo = $rsData->ContractNo;
        $txtPartner = $rsData->Partner;
        $cboContractType = $rsData->ContractType;
        $cboSignerID = $rsData->SignerID;
        $cboStatusID = $rsData->StatusID;
        $dtpEffectDateFrom = $rsData->EffectDateFrom1;
        $dtpEffectDateTo = $rsData->EffectDateTo1;
        $txtContent = $rsData->Content;
        $txtSheftNo = $rsData->SheftNo;
        $txtFloorNo = $rsData->FloorNo;
        $txtPartitionNo = $rsData->PartitionNo;
        $txtFolderNo = $rsData->FolderNo;
        $CreateUserID = $rsData->CreateUserID;
        $CreateDate = $rsData->CreateDate1;
        $LastModifyUserID = $rsData->LastModifyUserID;
        $LastModifyDate = $rsData->LastModifyDate1;
    } else {
        $ID = '';
        $fileName = '';
        $txtContractNo = '';
        $txtPartner = '';
        $cboContractType = '';
        $cboSignerID = '';
        $cboStatusID = '';
        $dtpEffectDateFrom = '';
        $dtpEffectDateTo = '';
        $txtContent = '';
        $txtSheftNo = '';
        $txtFloorNo = '';
        $txtPartitionNo = '';
        $txtFolderNo = '';


        $CreateUserID = Auth::user()->UserID;
        $CreateDate = date('d/m/y');
        $LastModifyUserID = Auth::user()->UserID;
        $LastModifyDate = date('d/m/y');

    }

    ?>



    <div class="card document-sidebar">
        <div class="card-header">
            <h4>Thông tin hợp đồng</h4>
        </div>
        <div class="card-body">
            <form id="frmW76F2131">
                <section>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Số</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtContractNo" class="form-control" id="txtContractNo"
                                   <?php echo e($task == 'add' ? 'autofocus':''); ?>

                                   placeholder="" autocomplete="off" value="<?php echo e($txtContractNo); ?>"
                                   <?php echo e($task != 'add' ? 'readonly':''); ?> required>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Đối tác ký kết</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtPartner" class="form-control" id="txtPartner"
                                   <?php echo e($task != 'add' ? 'autofocus':''); ?>

                                   placeholder="" autocomplete="off" value="<?php echo e($txtPartner); ?>" required>
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Phân loại</label>
                        </div>
                        <div class="col-sm-4">
                            <select name="cboContractType" id="cboContractType" class="form-control" required>
                                <option value="">Chọn</option>
                                <?php $__currentLoopData = $rsContractType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->ID); ?>" <?php echo e($cboContractType == $row->ID ? 'selected': ''); ?>><?php echo e($row->Name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Người đại diện</label>
                        </div>
                        <div class="col-sm-4">
                            <select name="cboSignerID" id="cboSignerID" class="form-control" required>
                                <option value="">Chọn</option>
                                <?php $__currentLoopData = $rsSignerID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->ID); ?>" <?php echo e($cboSignerID == $row->ID ? 'selected': ''); ?>><?php echo e($row->Name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Trạng thái</label>
                        </div>
                        <div class="col-sm-4">
                            <select name="cboStatusID" id="cboStatusID" class="form-control" required>
                                <option value="">Chọn</option>
                                <?php $__currentLoopData = $rsStatusID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->ID); ?>" <?php echo e($cboStatusID == $row->ID ? 'selected': ''); ?>><?php echo e($row->Name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Ngày hiệu lực</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group ">
                                <input type="text" class="form-control" id="dtpEffectDateFrom"
                                       name="dtpEffectDateFrom" value="<?php echo e($dtpEffectDateFrom); ?>" autocomplete="off"
                                       required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Ngày hết hiệu lực</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group ">
                                <input type="text" class="form-control" id="dtpEffectDateTo"
                                       name="dtpEffectDateTo" value="<?php echo e($dtpEffectDateTo); ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-4">
                            <input type="file" id="fileAttachment" class="hide"/>
                            <button id="btnAttachment" onclick="$('#fileAttachment').click();" title="Đính kèm"
                                    type="button" class="btn btn-default">Đính kèm
                            </button>
                            <label id="attachmentName"><a target="_blank"
                                                          href="<?php echo e(url('/W76F2131/download?ID=').$ID); ?>"><?php echo e($fileName); ?></a></label>
                            <label id="attRemove"><a class="fas fa-trash-alt cursor-pointer text-red"></a></label>
                        </div>

                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Trích yếu nội dung</label>
                        </div>
                        <div class="col-sm-10">
                        <textarea type="text" id="txtContent" name="txtContent" class="form-control"
                                  autocomplete="off" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Kệ</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtSheftNo" class="form-control" id="txtSheftNo"
                                   placeholder="" autocomplete="off" value="<?php echo e($txtSheftNo); ?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Tầng</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtFloorNo" class="form-control" id="txtFloorNo"
                                   placeholder="" autocomplete="off" value="<?php echo e($txtFloorNo); ?>">
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Ngăn</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtPartitionNo" class="form-control" id="txtPartitionNo"
                                   placeholder="" autocomplete="off" value="<?php echo e($txtPartitionNo); ?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Thư mục</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtFolderNo" class="form-control" id="txtFolderNo"
                                   placeholder="" autocomplete="off" value="<?php echo e($txtFolderNo); ?>">
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Người tạo</label>
                        </div>
                        <div class="col-sm-4">
                            <label class="lbl-normal-value"><?php echo e($CreateUserID); ?></label>
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Ngày tạo</label>
                        </div>
                        <div class="col-sm-4">
                            <label class="lbl-normal-value"><?php echo e($CreateDate); ?></label>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-2">
                            <label class="lbl-normal">Người cập nhật</label>
                        </div>
                        <div class="col-sm-4">
                            <label class="lbl-normal-value"><?php echo e($LastModifyUserID); ?></label>
                        </div>
                        <div class="col-sm-2">
                            <label class="lbl-normal">Ngày cập nhật</label>
                        </div>
                        <div class="col-sm-4">
                            <label class="lbl-normal-value"><?php echo e($LastModifyDate); ?></label>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-sm-12">
                            <div id="toolbarW76F2131" class="pull-right" style="float: right"></div>
                        </div>
                    </div>
                    <button id="btnSubmitW76F2131" class="hide"></button>
                </section>
            </form>

        </div>
    </div>



    <script>
        var attachmentFile = null;
        $(document).ready(function () {
            $("#attRemove").click(function () {
                var id = "<?php echo e($ID); ?>";
                if (id != ""){
                    postMethod("<?php echo e(url('/W76F2131/removefile')); ?>", function (res) {
                        var result = JSON.parse(res);
                        switch (result.status) {
                            case 'ERROR':
                                alertError(result.message);
                                break;
                            case 'SUCC':
                                window.location.reload();
                                break;
                        }
                    }, {ID: id, _token: '<?php echo e(csrf_token()); ?>'});
                }else{
                    $("#fileAttachment").val('');
                    attachmentFile = null;
                    $("#attachmentName").html('');
                }

            });


            $('#dtpEffectDateFrom').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '<?php echo e(Helpers::getLocale()); ?>'
            });
            $('#dtpEffectDateTo').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '<?php echo e(Helpers::getLocale()); ?>'
            });
            $("#toolbarW76F2131").digiMenu({
                    showText: true,
                    cls: '',
                    style: 'border: none;float:right',
                    buttonList: [
                        {
                            ID: "btnSaveW76F2131",
                            icon: "fa fa-save",
                            title: "<?php echo e(Helpers::getRS('Luu')); ?>",
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
                                    frmW76F2131Save();
                                });
                            }
                        }
                        , {
                            ID: "btnBack",
                            icon: "fa fa-arrow-left",
                            title: '<?php echo e(Helpers::getRS("Quay_lai")); ?>',
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


        function frmW76F2131Save() {
            validationElements($("#frmW76F2131"), function () {
                //Kiem tra nhung truong hop khac
                checkID($("#txtContractNo"));
                $("#frmW76F2131").find("#btnSubmitW76F2131").click();
            });
        }

        $("#fileAttachment").on("change", function (event) {
            var arrFile = this.files;
            if (arrFile.length > 0) {
                attachmentFile = arrFile[0];
                console.log("test")
                $("#attachmentName").html(attachmentFile.name);
            }

        });


        $('#frmW76F2131').submit(function (e) {
            e.preventDefault();
            //get all values of this form
            var formData = new FormData($('#frmW76F2131')[0]);
            //var file= $("#fileAttachment").val();
            if (attachmentFile != null) {
                formData.append('file', attachmentFile);
            }

            formData.append('_token', '<?php echo e(csrf_token()); ?>');
            formData.append('ID', '<?php echo e($ID); ?>');

            var url = "";
            var task = "<?php echo e($task); ?>";
            if (task == "add") {
                url = '<?php echo e(url("/W76F2131/save")); ?>';
            }
            if (task == "edit") {
                url = '<?php echo e(url("/W76F2131/update")); ?>';
            }
            $.ajax({
                enctype: 'multipart/form-data',
                method: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
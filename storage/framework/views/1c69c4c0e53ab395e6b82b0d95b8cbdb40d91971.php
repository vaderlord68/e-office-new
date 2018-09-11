<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##

    <section>
        <form id="frmW76F2200" name="frmW76F2200" method="post">
            <div class="row form-group">
                <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <label class="lbl-normal"><?php echo e(Helpers::getRS("Tim_kiem")); ?></label>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <input type="text" class="form-control" id="txtDocNo" name="txtDocNo" autocomplete="off">
                </div>
            </div>
        </form>
        <div class="row mgb5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="toolbarW76F2200">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="gridW76F2200"></div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function () {
            $("#toolbarW76F2200").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnAddW76F2200",
                            icon: "fa fa-plus",
                            title: "<?php echo e(Helpers::getRS('Them_moi1')); ?>",
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
                                    window.location.href = "<?php echo e(url('/w76f2201/add')); ?>";
                                });
                            }
                        }
                    ]
                }
            );
            var obj = {
                width: '100%',
                height: 600,
                freezeCols: 1,
                numberCell: {show: false},
                selectionModel: {type: 'row', mode: 'single'},
                pageModel: {type: "local", rPP: 20},
                filterModel: {on: true, mode: "AND", header: true},
                scrollModel: {horizontal: true, autoFit: false, lastColumn: 'none'},
                showTitle: false,
                dataType: "JSON",
                wrap: false,
                hwrap: false,
                collapsible: false,
                postRenderInterval: -1,
                colModel: [
                    {
                        title: "<?php echo e(Helpers::getRS('Xu_ly')); ?>",
                        width: 100,
                        align: "center",
                        dataIndx: "View",
                        isExport: false,
                        editor: false,
                        render: function (ui) {
                            var str = '<a id="btnAddW76F2200" title="<?php echo e(Helpers::getRS("Xem")); ?>"><i class="fas fa-eye mgr10 text-primary cursor-pointer"></i></a>';
                            str += '<a id="btnEditW76F2200" title="<?php echo e(Helpers::getRS("Sua")); ?>"><i class="fas fa-edit mgr10 text-yellow cursor-pointer"></i></a>';
                            str += '<a id="btnDeleteW76F2200" title="<?php echo e(Helpers::getRS("Xoa")); ?>"><i class="fas fa-trash-alt text-danger cursor-pointer"></i></a>';
                            return str;
                        },
                        postRender: function (ui) {
                        }
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('Phong_hopU')); ?>",
                        width: 170,
                        align: "center",
                        dataIndx: "FacilityNo",
                        dataType: "string",
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('Ten_phong_hop')); ?>",
                        width: 220,
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        align: "center",
                        dataIndx: "FacilityName",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('Dia_diem')); ?>",
                        width: 250,
                        dataType: "string",
                        editor: false,
                        align: "center",
                        dataIndx: "Location",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('So_cho_ngoi')); ?>",
                        width: 120,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "Capacity",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('Ghi_chu')); ?>",
                        width: 280,
                        dataType: "string",
                        align: "center",
                        editor: false,
                        dataIndx: "Description",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('KSD')); ?>",
                        width: 150,
                        dataType: "string",
                        align: "center",
                        editor: false,
                        dataIndx: "Disabled",
                        render: function (ui) {
                            var rowData = ui.rowData;
//                            var isCheck = rowData.StatusID == 1 ? 'checked' : '';
//                            return '<input type="checkbox" ' + isCheck + ' disabled />';
                        }
                    }
                ],
                dataModel: {
                    data: {},
                },
                pageModel: {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]},
                complete: function (event, ui) {
                    var data = $("#gridW76F2200").pqGrid('option', 'dataModel.data');
                    if (data.length > 0) {
                        $("#gridW76F2200").pqGrid("setSelection", {rowIndx: 0});
                    }
                }
            };

            $("#gridW76F2200").pqGrid(obj);
            $("#gridW76F2200").pqGrid("option", $.paramquery.pqGrid.regional['<?php echo e(Session::get("locate")); ?>']);
            $("#gridW76F2200").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['<?php echo e(Session::get("locate")); ?>']);
            $("#gridW76F2200").pqGrid("refreshDataAndView");

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
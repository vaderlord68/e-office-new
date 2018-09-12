<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <section>
        <div class="row mgb5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="toolbarW76F2130">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="gridW76F2130"></div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $("#toolbarW76F2130").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnAddW76F2130",
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
                                    window.location.href = "<?php echo e(url('/w76f2131/add')); ?>";
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
                        width: 61,
                        align: "center",
                        dataIndx: "View",
                        isExport: false,
                        editor: false,
                        render: function (ui) {
                            var str = '<a id="btnEditW76F2130" title="<?php echo e(Helpers::getRS("Sua")); ?>"><i class="fa fa-edit mgr10 text-yellow cursor-pointer"></i></a>';
                                str += '<a id="btnDeleteW76F2130" title="<?php echo e(Helpers::getRS("Xoa")); ?>"><i class="fa fa-trash text-danger cursor-pointer"></i></a>';
                            return str;
                        },
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                grid = this,
                                $cell = grid.getCell(ui);
                            var rowData = ui.rowData;
                            $cell.find("#btnEditW76F2130").bind("click", function (evt) {
                                var data = {
                                    newsID: rowData.NewsID,
                                    channelID: rowData.ChannelID
                                }
                                window.location.href = "<?php echo e(url('/w76f2131/edit')); ?>" + "?" + $.param(data);
                            });
                            $cell.find("#btnDeleteW76F2130").bind("click", function (evt) {
                                ask_delete(function () {
                                    $.ajax({
                                        method: "POST",
                                        url: '<?php echo e(url('/w76f2130/delete')); ?>',
                                        data: {newsID: rowData.NewsID, _token: '<?php echo e(csrf_token()); ?>'},
                                        success: function (res) {
                                            var data = JSON.parse(res);
                                            switch (data.status) {
                                                case "SUCC":
                                                    var $grid = $("#gridW76F2130");
                                                    delete_ok(function () {
                                                        update4ParamGrid($grid,null, 'delete');
                                                    });
                                                    break;
                                                case "ERROR":
                                                    alertError(data.message);
                                                    break;
                                            }
                                        }
                                    })
                                });
//                                ask_delete(function(){
//                                    alert("sdfdsf");
//                                })
                            });
                        }
                    }
                    , {
                        title: "",
                        width: 110,
                        align: "center",
                        dataIndx: "NewsID",
                        editor: false,
                        hidden: true
                    }
                    , {
                        title: "<?php echo e(Helpers::getRS('Tieu_de')); ?>",
                        width: 220,
                        align: "center",
                        dataIndx: "Title",
                        dataType: "string",
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Chuyen_muc')); ?>",
                        width: 170,
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        align: "center",
                        dataIndx: "ChannelID",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Trang_thai')); ?>",
                        width: 90,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "StatusID",
                        render: function (ui) {
                            var rowData = ui.rowData;
                            var isCheck = rowData.StatusID == 1 ? 'checked' : '';
                            return '<input type="checkbox" ' + isCheck + ' disabled />';
                        }
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('So_luot_xem')); ?>",
                        width: 110,
                        dataType: "string",
                        editor: false,
                        align: "center",
                        dataIndx: "Hits",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Ngay_soan_thao')); ?>",
                        width: 180,
                        align: "center",
                        dataType: "date",
                        editor: false,
                        dataIndx: "CreateDate",
                        filter: {type: "textbox", condition: "equal", init: pqDatePicker, listeners: ['change']}
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Ngay_dang_tin')); ?>",
                        width: 180,
                        align: "center",
                        dataType: "date",
                        editor: false,
                        dataIndx: "ReleaseDate",
                        filter: {type: "textbox", condition: "equal", init: pqDatePicker, listeners: ['change']}
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Nguoi_dang_tin')); ?>",
                        width: 170,
                        dataType: "string",
                        editor: false,
                        dataIndx: "CreateUserID",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Tin_noi_bat')); ?>",
                        width: 90,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "IsHotNews",
                        render: function (ui) {
                            var rowData = ui.rowData;
                            var isCheck = rowData.IsHotNews == 1 ? 'checked' : '';
                            return '<input type="checkbox" ' + isCheck + ' disabled />';
                        }
                    },
                    {
                        title: "<?php echo e(Helpers::getRS('Tac_gia')); ?>",
                        width: 170,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "Author",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                ],
                dataModel: {
                    data: [],
                },
                pageModel: {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]},
                complete: function (event, ui) {
                    var data = $("#gridW76F2130").pqGrid('option', 'dataModel.data');
                    if (data.length > 0) {
                        $("#gridW76F2130").pqGrid("setSelection", {rowIndx: 0});
                    }
                }
            };

            $("#gridW76F2130").pqGrid(obj);
            $("#gridW76F2130").pqGrid("option", $.paramquery.pqGrid.regional['<?php echo e(Session::get("locate")); ?>']);
            $("#gridW76F2130").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['<?php echo e(Session::get("locate")); ?>']);
            $("#gridW76F2130").pqGrid("refreshDataAndView");

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
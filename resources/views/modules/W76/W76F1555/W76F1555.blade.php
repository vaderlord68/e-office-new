@extends('layouts.layout')
@section('content')
    @parent
    <?php
    //Helpers::setLang('vi');
    $lang = Helpers::getLang();
    $ListTypeName = "ListTypeName" . $lang;
    ?>
    <section id="sectionW76F1555">
        <div class="row form-group">
            <div class="col-md-4 ">
                <select class="form-control pull-left"
                        id="cboBlockIDW09F2022" name="cboBlockIDW09F2022">
                    @foreach($listTypeID as $item)
                        <option value="{{$item->ListTypeID}}">{{$item->$ListTypeName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="txtSearchValue" name="txtSearchValue">
            </div>
            <div class="col-md-2">
                <button id="btnSearch" class="btn btn-info mrgbtt"><span
                            class="fa fa-search text-yellow"></span>
                    &nbsp;</button>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="gridW76F1555"></div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-5 checkbox pull-left ">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" id="chkAllW76F1555" name="chkAllW76F1555" class="form-check-input"
                               checked="" value="0">{{Helpers::getRS('Hien_thi_danh_muc_khong_su_dung')}}
                    </label>
                </div>
            </div>
            <div class=" col-md-7 pull-right alert alert-danger alert-dismissable hide">
                <i class="icon fa fa-ban"></i> <span id="err">{{Helpers::getRS("Co_loi_xay_ra_trong_qua_trinh_gui_du_lieu")}}
                    !</span>
            </div>
        </div>

    </section>
    <script type="text/javascript">
        $(document).ready(function () {

            //define common ajax object for addition, update and delete.
            var ajaxObj = {
                dataType: "JSON",
                beforeSend: function () {
                    this.showLoading();
                },
                complete: function () {
                    this.hideLoading();
                },
                error: function () {
                    this.rollback();
                }
            };

            //to check whether any row is currently being edited.
            function isEditing(grid) {
                var rows = grid.getRowsByClass({cls: 'pq-row-edit'});
                if (rows.length > 0) {
                    var rowIndx = rows[0].rowIndx;
                    grid.goToPage({rowIndx: rowIndx});
                    //focus on editor if any
                    grid.editFirstCellInRow({rowIndx: rowIndx});
                    return true;
                }
                return false;
            }

            //called by add button in toolbar.
            function addRow(grid) {
                var listTypeID = $("#cboBlockIDW09F2022 option:selected").val();
                if (listTypeID == "")
                    return false;
                var rows = grid.getRowsByClass({cls: 'pq-row-edit'});
                if (rows.length > 0) {//already a row currently being edited.
                    var rowIndx = rows[0].rowIndx;
                    //focus on editor if any
                    grid.editFirstCellInRow({rowIndx: rowIndx});
                }
                else {
                    //append empty row in the first row.
                    var rowData = {
                        ListTypeID: "",
                        ID: "",
                        CodeID: "",
                        CodeName: "",
                        Remark: "",
                        DisplayOrder: 0,
                        IsDefault: 0,
                        Inactive: 0,
                        CreateUserID: "",
                        CreateDate: "",
                        LastModifyUserID: "",
                        LastModifyDate: ""
                    }; //empty row template
                    var rowIndx = grid.addRow({rowIndxPage: 0, rowData: rowData, checkEditable: false});
                    if (rowIndx < 0)
                        rowIndx = 0;
                    //start editing the new row.
                    editRow(rowIndx, grid, true);
                }
            }

            //called by delete button.
            function deleteRow(rowIndx, grid) {
                grid.addClass({rowIndx: rowIndx, cls: 'pq-row-delete'});

                ask_delete(function () {
                    var ProductID = grid.getRecId({rowIndx: rowIndx});
                    var ID = $("#cboBlockIDW09F2022 option:selected").val();
                    postMethod('{{url('W76F1555/delete')}}', function (res) {
                        //gan du lieu cho luoi
                        //setter
                        $("#gridW76F1555").pqGrid("option", "dataModel.data", res);
                        $("#gridW76F1555").pqGrid("refreshDataAndView");

                    }, {codeID: ProductID, listTypeID: ID, _token: '{{ csrf_token() }}'})
                });

            }

            //called by edit button.
            function editRow(rowIndx, grid, edit) {
                grid.addClass({rowIndx: rowIndx, cls: 'pq-row-edit'});
                if (edit) grid.editFirstCellInRow({rowIndx: rowIndx});

                //change edit button to update button and delete to cancel.
                var $tr = grid.getRow({rowIndx: rowIndx}),
                    $btn = $tr.find("a.edit_btn"),
                    $clsEdit = $btn.find('i').attr('class');
                $btn.find('i').attr('class', 'fa fa-save text-primary').css('font-size', '14px');
                $btn.unbind("click")
                    .click(function (evt) {
                        //evt.preventDefault();
                        $(this).attr('class', $clsEdit);
                        grid.refreshRow({rowIndx: rowIndx});
                        return update(rowIndx, grid);
                    });
                var $btnD = $tr.find("a.delete_btn"),
                    $clsD = $btnD.find('i').attr('class');
                $btnD.find('i').attr('class', 'fa fa-ban text-red').css('font-size', '14px');
                $btnD.unbind("click")
                    .click(function (evt) {
                        $(this).attr('class', $clsD);
                        grid.quitEditMode();
                        grid.removeClass({rowIndx: rowIndx, cls: 'pq-row-edit'})
                        $("#sectionW76F1555").find(".alert-danger").addClass('hide');
                        grid.rollback();

                    });
            }

            //called by update button.
            function update(rowIndx, grid) {

                if (grid.saveEditCell() == false) {
                    return false;
                }
                if (!grid.isValid({rowIndx: rowIndx, focusInvalid: true}).valid) {
                    return false;
                }
                if (!grid.isValid({rowIndx: rowIndx, focusInvalid: true}).valid) {
                    return false;
                }
                if (grid.isDirty()) {
                    var rowD = grid.getRowData({rowIndx: rowIndx});
                    var rowData = JSON.stringify(rowD);
                    grid.removeClass({rowIndx: rowIndx, cls: 'pq-row-edit'});

                    if (rowD["CodeID"] == "") {
                        editRow(rowIndx, grid, true);
                        grid.refreshRow({rowIndx: rowIndx});
                        grid.editFirstCellInRow({rowIndx: rowIndx});
                        validationCell(rowIndx, "CodeID", $grid, "{{Helpers::getRS( 'Ban_chua_nhap')}}" + " " + "{{Helpers::getRS( 'Ma')}}");
                        return false;
                    }

                    if (rowD["CodeName"] == "") {
                        editRow(rowIndx, grid, true);
                        grid.refreshRow({rowIndx: rowIndx});
                        grid.editFirstCellInRow({rowIndx: rowIndx});
                        validationCell(rowIndx, "CodeName", $grid, "{{Helpers::getRS( 'Ban_chua_nhap')}}" + " " + "{{Helpers::getRS( 'Ten')}}");
                        return false;
                    }

                    var ID = $("#cboBlockIDW09F2022 option:selected").val();
                    postMethod('{{url('W76F1555/update')}}', function (res) {
                        //setter
                        if (res != -1) {
                            $("#sectionW76F1555").find(".alert-danger").addClass('hide');
                            $("#gridW76F1555").pqGrid("option", "dataModel.data", res);
                            $("#gridW76F1555").pqGrid("refreshDataAndView");
                            grid.refreshRow({rowIndx: rowIndx});
                        }
                        else {
                            $("#sectionW76F1555").find("#err").html('{{Helpers::getRS('Ma_nay_da_ton_tai')}}');
                            $("#sectionW76F1555").find(".alert-danger").removeClass('hide');
                            editRow(rowIndx, grid, true);
                            grid.refreshRow({rowIndx: rowIndx});
                            grid.editFirstCellInRow({rowIndx: rowIndx});

                        }

                    }, {RowData: rowData, listTypeID: ID, _token: '{{ csrf_token() }}'})


                }
                else {
                    grid.quitEditMode();
                    grid.removeClass({rowIndx: rowIndx, cls: 'pq-row-edit'});
                    grid.refreshRow({rowIndx: rowIndx});
                }
            }

            function validationCell(rowIndx, colIndx, grid, msg) {
                //    grid = $("#gridW76F1555");
                //         grid.pqGrid("quitEditMode");
                //       grid.pqGrid("editCell", {rowIndx:rowIndx, dataIndx: colIndx});
                //  grid.pqGrid("editCell", {rowIndx: ui.rowIndx, dataIndx: ui.dataIndx});
                var obj = grid.pqGrid("getEditCell");
                var $editor = obj.$editor;
                //   $($editor).val(ui.newVal);
                $($editor).confirmation({
                    btnOkLabel: "",
                    btnCancelLabel: "",
                    rootSelector: $(".popover"),
                    placement: "right",
                    popout: true,
                    singleton: true,
                    animation: true,
                    template:
                    '<div class="popover"  style="width: 220px;display: inline-block;"><div class="arrow"></div>'
                    + '<div class="popover-content" style="text-align: center;padding:10px;width: auto"><span class="notify-grid"><i class="fa fa-exclamation-triangle text-danger " style="float:left"></i><label class="confirmContent">'
                    + msg
                    + '</label></span></div>'
                    + '</div>'
                });
                $($editor).confirmation('show');
            }

            var option = {
                width: '100%',
                height: 350,
                wrap: false,
                hwrap: false,
                //  resizable: true,
                showTitle: false,
                columnBorders: true,
                numberCell: {show: false, autoFit: true},
                filterModel: {on: true, mode: "OR", header: false},
                trackModel: {on: true}, //to turn on the track changes.
                toolbar: {
                    items: [
                        {
                            type: 'button',
                            cls: 'btn btn-success',
                            icon: 'ui-icon-plus',
                            label: "<i class='fa fa-plus mgr5'></i>{{Helpers::getRS("Them_moi1")}}",
                            listener: function () {
                                addRow(this);
                            }
                        }
                    ]
                },
                scrollModel: {autoFit: true},
                editor: {type: 'textbox', select: true, style: 'outline:none;'},
                validation: {icon: 'ui-icon-info'},
                //    title: "<b>Inline Editing</b>",
                colModel: [
                    {
                        title: "ListTypeID",
                        minWidth: 1,
                        dataType: "string",
                        dataIndx: "ListTypeID",
                        align: "left",
                        hidden: true,
                    }
                    , {
                        title: "ID",
                        minWidth: 1,
                        dataType: "string",
                        dataIndx: "ID",
                        align: "left",
                        hidden: true,
                    }

                    , {
                        title: "{{Helpers::getRS('Ma')}}",
                        minWidth: 150,
                        width: 170,
                        dataType: "string",
                        dataIndx: "CodeID",
                        //  cls: "text-uppercase",
                        align: "left",
                        editor: {type: 'textbox', style: "text-transform: uppercase;"},
                        editable: function (ui) {
                            var rowData = ui.rowData;
                            if (rowData['ID'] != '') {
                                return false;
                            }
                            else {
                                return true;
                            }
                        },
                    }
                    , {
                        title: "{{Helpers::getRS('Ten')}}",
                        minWidth: 200,
                        width: 270,
                        dataType: "string",
                        dataIndx: "CodeName",
                        align: "left",
                    }
                    , {
                        title: "{{Helpers::getRS('Ghi_chu')}}",
                        minWidth: 1,
                        width: 340,
                        dataType: "string",
                        dataIndx: "Remark",
                        align: "left"
                    }
                    , {
                        title: "{{Helpers::getRS('STT')}}",
                        minWidth: 80,
                        width: 80,
                        dataType: "integer",
                        dataIndx: "DisplayOrder",
                        align: "center"
                    }
                    , {
                        title: "{{Helpers::getRS('Mac_dinh')}}",
                        minWidth: 100,
                        width: 100,
                        dataType: "bool",
                        align: "center",
                        dataIndx: "IsDefault",
                        sortable: false,
                        editor: false,
                        type: 'checkbox',
                        render: function (ui) {
                            var rowData = ui.rowData;
                            return {
                                text: "<label><input type='checkbox' " + (rowData["IsDefault"] == 1 ? "checked" : "") + " /></label>"
                            };
                        }
                    }
                    , {
                        title: "{{Helpers::getRS('KSD')}}",
                        minWidth: 80,
                        width: 80,
                        dataType: "bool",
                        align: "center",
                        dataIndx: "Inactive",
                        sortable: false,
                        editor: false,
                        type: 'checkbox',
                        render: function (ui) {
                            var rowData = ui.rowData;
                            return {
                                text: "<label><input type='checkbox' " + (rowData["Inactive"] == 1 ? "checked" : "") + " /></label>"
                            };
                        }
                    }
                    , {
                        title: "",
                        editable: false,
                        minWidth: 80,
                        align: "center",
                        sortable: false,
                        render: function (ui) {
                            var $permission = "{{$permission->W76F1555_FULL}}";
                            //$permission = 0;
                            if ($permission == 1) {
                                return "<a  class='edit_btn'><i class='fa fa-edit text-yellow' style='padding-right: 10px'></i></a>\
                            <a  class='delete_btn'><i class='fa fa-trash text-danger'></i></a>";
                            } else {
                                return "<a><i class='fas fa-edit mgr10 text-gray' style='padding-right: 10px'></i></a>\
                            <a><i class='fas fa-trash-alt text-gray'></i></a>";
                            }
                        },
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                grid = this,
                                $cell = grid.getCell(ui);
                            $cell.find(".delete_btn")
                                .bind("click", function (evt) {
                                    deleteRow(rowIndx, grid);
                                });
                            //edit button
                            $cell.find(".edit_btn")
                                .bind("click", function (evt) {
                                    if (isEditing(grid)) {
                                        return false;
                                    }
                                    editRow(rowIndx, grid, true);
                                });

                            //if it has edit class, then edit the row.
                            if (grid.hasClass({rowData: ui.rowData, cls: 'pq-row-edit'})) {
                                editRow(rowIndx, grid);
                            }
                        }
                    }
                ],
                postRenderInterval: -1, //synchronous post rendering.
                dataModel: {
                    recIndx: "CodeID"
                },
                pageModel: {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]},
                //make rows editable based upon the class.
                editable: function (ui) {
                    return this.hasClass({rowIndx: ui.rowIndx, cls: 'pq-row-edit'});
                },
                create: function (evt, ui) {
                    filterW76F1555();
                    this.widget().pqTooltip();
                },
                cellBeforeSave: function (event, ui) {
                    $grid = $("#gridW76F1555");
                    var newVal = ui.newVal;
                    var oldVal = ui.oldVal;
                    switch (ui.dataIndx) {
                        case "CodeID":
                            if ((newVal.length == 0 && oldVal.length == 0 ) || newVal.length == 0) {
                                validationCell(ui.rowIndx, ui.dataIndx, $grid, "{{Helpers::getRS('Ban_chua_nhap')}}" + " " + "{{Helpers::getRS( 'Ma')}}");
                                return false;
                            }
                            var regex = /[^\w]/gi;
                            if (regex.test(ui.newVal) == true) {
                                validationCell(ui.rowIndx, ui.dataIndx, $grid, "{{Helpers::getRS( 'Ma_co_ky_tu_khong_hop_le')}}");
                                return false;
                            }
                            if (newVal.length > 50) {
                                validationCell(ui.rowIndx, ui.dataIndx, $grid, "{{Helpers::getRS( 'Gia_tri_vuot_qua_chieu_dai_cho_phep')}}");
                                return false;
                            }
                            break;
                        case "CodeName":
                            if ((newVal.length == 0 && oldVal.length == 0 ) || newVal.length == 0) {
                                validationCell(ui.rowIndx, ui.dataIndx, $grid, "{{Helpers::getRS( 'Ban_chua_nhap')}}" + " " + "{{Helpers::getRS( 'Ten')}}");
                                return false;
                            }
                            if (newVal.length > 250) {
                                validationCell(ui.rowIndx, ui.dataIndx, $grid, "{{Helpers::getRS('Gia_tri_vuot_qua_chieu_dai_cho_phep')}}");
                                return false;
                            }
                            break;
                        case "Remark":
                            if (newVal.length > 500) {
                                validationCell(ui.rowIndx, ui.dataIndx, $grid, "{{Helpers::getRS('Gia_tri_vuot_qua_chieu_dai_cho_phep')}}");
                                return false;
                            }
                            break;
                    }
                    $(".popover").remove();
                    return true;

                },
                cellSave: function (event, ui) {
                    if (ui.dataIndx == "CodeID") {
                        ui.rowData[ui.dataIndx] = (ui.rowData[ui.dataIndx]).toUpperCase();
                    }
                },


            };
            var grid = $("#gridW76F1555").pqGrid(option);
            //check the changes in grid before navigating to another page or refresh data.
            grid.pqGrid("option", $.paramquery.pqGrid.regional['{{Helpers::getLocale()}}']);
            grid.find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['{{Helpers::getLocale()}}']);
            grid.pqGrid("refreshDataAndView");

            $("#btnSearch").on("click", function (e) {
                $("#chkAllW76F1555").prop("checked", true);
                filterW76F1555();
            });

            $("#chkAllW76F1555").on("change", function (e) {
                $("#txtSearchValue").val("");
                filterW76F1555();
            });

            function filterW76F1555() {
                $("#gridW76F1555").pqGrid("filter", {
                    oper: 'replace',
                    data: [
                        {
                            dataIndx: 'Inactive',
                            condition: 'contain',
                            value: $("#chkAllW76F1555").is(":checked") ? "" : 0
                        },
                        {dataIndx: 'CodeID', condition: 'contain', value: $("#txtSearchValue").val()},
                        {dataIndx: 'CodeName', condition: 'contain', value: $("#txtSearchValue").val()},
                        {dataIndx: 'Remark', condition: 'contain', value: $("#txtSearchValue").val()}
                    ]
                }).pqGrid("refreshDataAndView");
            }

            $("#cboBlockIDW09F2022").change(function () {
                var type = $(this).val();
                postMethod('{{url('W76F1555/load')}}', function (res) {
                    $("#gridW76F1555").pqGrid("option", "dataModel.data", res);
                    $("#gridW76F1555").pqGrid("refreshDataAndView");
                }, {listTypeID: type, _token: '{{ csrf_token() }}'})
            });
            $("#cboBlockIDW09F2022").trigger("change");

        });


    </script>
@stop
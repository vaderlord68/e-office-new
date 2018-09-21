@extends('page.master')
@section('body_content')
    @parent
    <div class="card document-sidebar">
        <div class="card-header">
            <h4>Quản lý hợp đồng</h4>
        </div>
        <div class="card-body">
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
        </div>
    </div>



    <script>
        $(document).ready(function () {
            $("#toolbarW76F2130").digiMenu({
                    showText: true,
                    style: 'border: none',
                    buttonList: [
                        {
                            ID: "btnAddW76F2130",
                            icon: "fa fa-plus",
                            title: "{{Helpers::getRS('Them_moi1')}}",
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
                                    window.location.href = "{{url('/W76F2131/add')}}";
                                });
                            }
                        }
                    ]
                }
            );

            var groupModel = {
                on: true,
                dataIndx: ['ContractYear'],
                collapsed: [false],
                headerMenu: false,
                summaryEditType: false,
                //summaryInTitleRowType: '',
                merge: true,
                title: [
                    "{0}",
                    "{0}"
                ],
                //titleDefault: "{0} - (<b>{1})</b>",
            };


            var obj = {
                sortModel: {
                    number: false,
                    type: "local"

                },
                width: '100%',
                height: $(window).height() - 210,
                freezeCols: 1,
                numberCell: {show: false},
                selectionModel: {type: 'row', mode: 'single'},
                pageModel: {type: "local", rPP: 20},
                filterModel: {on: true, mode: "AND", header: true},
                scrollModel: {horizontal: true, autoFit: false, lastColumn: 'none'},
                showTitle: false,
                dataType: "JSON",
                wrap: true,
                hwrap: true,
                collapsible: false,
                postRenderInterval: -1,
                groupModel: groupModel,
                colModel: [
                    {
                        title: "#",
                        width: 61,
                        align: "center",
                        dataIndx: "View",
                        isExport: false,
                        editor: false,
                        sortable: false,
                        render: function (ui) {
                            console.log(ui);
                            if (ui.rowData.pq_close == true){
                                return "";
                            }else{
                                var str = '<a id="btnEditW76F2130" title="{{Helpers::getRS("Sua")}}"><i class="fa fa-edit mgr10 text-yellow cursor-pointer"></i></a>';
                                str += '<a id="btnDeleteW76F2130" title="{{Helpers::getRS("Xoa")}}"><i class="fa fa-trash text-danger cursor-pointer"></i></a>';
                                return str;
                            }

                        },
                        groupable: false,
                        nodrag: true,
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                grid = this,
                                $cell = grid.getCell(ui);
                            var rowData = ui.rowData;
                            $cell.find("#btnEditW76F2130").bind("click", function (evt) {
                                var data = {
                                    ID: rowData.ID
                                }
                                window.location.href = "{{url('/W76F2131/edit')}}" + "?" + $.param(data);
                            });
                            $cell.find("#btnDeleteW76F2130").bind("click", function (evt) {
                                ask_delete(function () {
                                    $.ajax({
                                        method: "POST",
                                        url: '{{url('/W76F2130/delete')}}',
                                        data: {ID: rowData.ID, _token: '{{ csrf_token() }}'},
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
                        width: 70,
                        align: "center",
                        dataIndx: "ID",
                        editor: false,
                        hidden: true
                    }
                    , {
                        title: "Số",
                        width: 140,
                        align: "left",
                        dataIndx: "ContractNo",
                        dataType: "string",
                        editor: false,
                        sortable: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "Đối tác ký kết",
                        width: 170,
                        align: "left",
                        dataIndx: "Partner",
                        dataType: "string",
                        editor: false,
                        sortable: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "Phân loại",
                        width: 170,
                        align: "center",
                        dataIndx: "ContractTypeName",
                        dataType: "string",
                        editor: false,
                        sortable: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "Người đại diện",
                        width: 170,
                        align: "center",
                        dataIndx: "SignerName",
                        dataType: "string",
                        editor: false,
                        sortable: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "Trích yếu",
                        width: 270,
                        align: "left",
                        dataIndx: "Content",
                        dataType: "string",
                        editor: false,
                        sortable: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "Hiệu lực từ",
                        width: 110,
                        align: "center",
                        dataIndx: "EffectDateFrom",
                        dataType: "date",
                        sortable: false,
                        editor: false,
                        filter: {type: "textbox", condition: "equal", init: pqDatePicker, listeners: ['change']},
                    }
                    , {
                        title: "Hiệu lực đến",
                        width: 110,
                        align: "center",
                        dataIndx: "EffectDateTo",
                        dataType: "date",
                        editor: false,
                        sortable: false,
                        filter: {type: "textbox", condition: "equal", init: pqDatePicker, listeners: ['change']},
                    }
                    , {
                        title: "Trạng thái",
                        width: 110,
                        align: "center",
                        dataIndx: "StatusName",
                        dataType: "string",
                        sortable: false,
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "Năm hợp đồng",
                        width: 150,
                        align: "center",
                        dataIndx: "ContractYear",
                        dataType: "string",
                        sortable: false,
                        editor: false,
                        hidden: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                ],
                dataModel: {
                    data: {!! $rsData !!},
                },
                pageModel: {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]},
                complete: function (event, ui) {
//                    var data = $("#gridW76F2130").pqGrid('option', 'dataModel.data');
//                    if (data.length > 0) {
//                        $("#gridW76F2130").pqGrid("setSelection", {rowIndx: 0});
//                    }
                }
            };

            $("#gridW76F2130").pqGrid(obj);
            $("#gridW76F2130").pqGrid("option", $.paramquery.pqGrid.regional['{{Session::get("locate")}}']);
            $("#gridW76F2130").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['{{Session::get("locate")}}']);
            $("#gridW76F2130").pqGrid("refreshDataAndView");

        });
    </script>
@stop

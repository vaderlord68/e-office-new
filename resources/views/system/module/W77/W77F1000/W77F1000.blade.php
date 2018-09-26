@extends('page.master')
@section('body_content')
    @parent
    <div class="card document-sidebar">
        <div class="card-header">
            <h4>{{ $title or '' }}</h4>
        </div>
        <div class="card-body" style="padding: 15px">
            <section>
                <form id="frmW76F2200" name="frmW76F2200" method="post">
                    <div class="row form-group">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                            <label class="lbl-normal">{{Helpers::getRS("Tim_kiem")}}</label>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="text" class="form-control" id="txtDocNo" name="txtSearchValueW76F2200"
                                   id="txtSearchValueW76F2200" placeholder="{{ Helpers::getRS('Tim_kiem_xe') }}"
                                   autocomplete="off" required>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <button type="submit" id="btnAddW76F2130" title="Thêm mới" class="btn btn-default smallbtn mgr5" style="margin-top: -2px">
                                <span class="fa fa-search text-yellow mgr5"></span>{{ Helpers::getRS('Tim_kiem') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row mgb5">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="toolbarW77F1000">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="gridW77F1000"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script>
        $(document).ready(function () {
            $("#toolbarW77F1000").digiMenu({
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
                                    window.location.href = "{{url('/W77F1001/add')}}";
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
                width: '100%',
//                flexHeight: true,
                height: 600,
                resizable: false,
                showTitle: false,
                collapsible: false,
                selectionModel: {type: 'row', mode: 'single'},
                filterModel: {on: true, mode: "AND", header: true},
                scrollModel: {autoFit: true},
                postRenderInterval: -1,
                cur_pos:1,
                numberCell: {show: false},
                freezeCols: 1,
                pageModel: {type: "local", rPP: 20},

                colModel: [
                    {
                        title: "{{Helpers::getRS('Xu_ly')}}",
                        width: 100,
                        align: "center",
                        dataIndx: "View",
                        isExport: false,
                        editor: false,
                        render: function (ui) {
                            var str = '<a id="btnViewW77F1000" title="{{Helpers::getRS("Xem")}}"><i class="fas fa-eye mgr10 text-primary cursor-pointer"></i></a>';
                            str += '<a id="btnEditW77F1000" title="{{Helpers::getRS("Sua")}}"><i class="fas fa-edit mgr10 text-yellow cursor-pointer"></i></a>';
                            str += '<a id="btnDeleteW77F1000" title="{{Helpers::getRS("Xoa")}}"><i class="fas fa-trash-alt text-danger cursor-pointer"></i></a>';
                            return str;
                        },
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                    grid = this,
                                    $cell = grid.getCell(ui);
                            var rowData = ui.rowData;
                            $cell.find("#btnEditW77F1000").bind("click", function (evt) {
                                var data = { carNo: rowData.CarNo };
                                window.location.href = "{{url('/W77F1001/edit')}}" + "?" + $.param(data);
                            });
                            $cell.find("#btnDeleteW77F1000").bind("click", function (evt) {
                                ask_delete(function () {
                                    $.ajax({
                                        method: "POST",
                                        url: '{{url('/w76f2200/delete')}}',
                                        data: {facilityID: rowData.FacilityID, _token: '{{ csrf_token() }}'},
                                        success: function (res) {
                                            var data = JSON.parse(res);
                                            switch (data.status) {
                                                case "SUCC":
                                                    var $grid = $("#gridW76F2200");
                                                    delete_ok(function () {
                                                        update4ParamGrid($grid, null, 'delete');
                                                    });
                                                    break;
                                                case "ERROR":
                                                    alertError(data.message);
                                                    break;
                                            }
                                        }
                                    })
                                });

                            });
                        }
                    }
                    , {
                        title: "{{Helpers::getRS('So_xe')}}",
                        width: 150,
                        align: "center",
                        dataIndx: "CarNo",
                        dataType: "string",
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "{{Helpers::getRS('Nhan_xe')}}",
                        width: 150,
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        align: "center",
                        dataIndx: "CarBranch",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "{{Helpers::getRS('Mo_ta')}}",
                        width: 250,
                        dataType: "string",
                        editor: false,
                        align: "left",
                        dataIndx: "DESCRIPTION",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "{{Helpers::getRS('Loai_xe')}}",
                        width: 120,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "CarTypeID",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "{{Helpers::getRS('Tai_xe')}}",
                        width: 200,
                        dataType: "string",
                        align: "center",
                        editor: false,
                        dataIndx: "DriverName",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "{{Helpers::getRS('Hoat_dong')}}",
                        width: 100,
                        dataType: "string",
                        align: "center",
                        editor: false,
                        dataIndx: "DISABLED",
                        render: function (ui) {
                            var rowData = ui.rowData;
                            var isCheck = rowData.Disabled == 1 ? 'checked' : '';
                            return '<input type="checkbox" ' + isCheck + ' disabled />';
                        }
                    }
                ],
                dataModel: {
                    data: {!! json_encode($rsData) !!},
                },
                pageModel: {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]},
            };

            $("#gridW77F1000").pqGrid(obj);
            $("#gridW77F1000").pqGrid("option", $.paramquery.pqGrid.regional['{{Session::get("locate")}}']);
            $("#gridW77F1000").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['{{Session::get("locate")}}']);
            $("#gridW77F1000").pqGrid("refreshDataAndView");

        });
    </script>
@stop

@extends('layouts.layout')
@section('content')
    @parent
    <?php
    $lastNewsModified = "";
    if (session("lastNewsModified")) {
        $lastNewsModified = session("lastNewsModified");
        session()->remove("lastNewsModified");
    }
    ?>
    <section>
        <form id="frmW76F2200" name="frmW76F2200" method="post">
            <div class="row form-group">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <label class="lbl-normal">{{Helpers::getRS("Tim_kiem")}}</label>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <input type="text" class="form-control" name="txtSearchValueW76F2200"
                           id="txtSearchValueW76F2200" autocomplete="off">
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <button class="btn btn-info mrgbtt" id="searchW76F2200"><span
                                class="fa fa-search text-yellow"></span>
                    </button>
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
                                    window.location.href = "{{url('/W76F2201/add')}}";
                                });
                            }
                        }
                        {{--, {--}}
                        {{--ID: "txtSearchValueW76F2200",--}}
                        {{--icon: "fa fa-search text-yellow",--}}
                        {{--title: "{{Helpers::getRS('Tim_kiem')}}",--}}
                        {{--enable: true,--}}
                        {{--hidden: function () {--}}
                        {{--return false;--}}
                        {{--},--}}
                        {{--cls: "",--}}
                        {{--type: "button",--}}
                        {{--render: function (ui) {--}}
                        {{--},--}}
                        {{--postRender: function (ui) {--}}
                        {{--ui.$btn.click(function () {--}}
                        {{--loadDataW76F2200();--}}

                        {{--});--}}
                        {{--}--}}
                        {{--}--}}

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
                        title: "{{Helpers::getRS('Xu_ly')}}",
                        width: 100,
                        align: "center",
                        dataIndx: "View",
                        isExport: false,
                        editor: false,
                        render: function (ui) {
                            var $permission = "{{$permission->W76F2200_FULL}}";
                            //$permission = 0;
                            if ($permission == 1) {
                                var str = '<a id="btnViewW76F2200" title="{{Helpers::getRS("Xem")}}"><i class="fas fa-eye mgr10 text-primary cursor-pointer"></i></a>';
                                str += '<a id="btnEditW76F2200" title="{{Helpers::getRS("Sua")}}"><i class="fas fa-edit mgr10 text-yellow cursor-pointer"></i></a>';
                                str += '<a id="btnDeleteW76F2200" title="{{Helpers::getRS("Xoa")}}"><i class="fas fa-trash-alt text-danger cursor-pointer"></i></a>';
                            } else {
                                var str = '<a id="btnViewW76F2200" title="{{Helpers::getRS("Xem")}}"><i class="fas fa-eye mgr10 text-primary cursor-pointer"></i></a>';
                                str += '<i class="fas fa-edit mgr10 text-gray"></i>';
                                str += '<i class="fas fa-trash-alt text-gray"></i>';
                            }
                            return str;
                        },
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                grid = this,
                                $cell = grid.getCell(ui);
                            var rowData = ui.rowData;
                            $cell.find("#btnViewW76F2200").bind("click", function (evt) {
                                var data = {
                                    facilityID: rowData.FacilityID
                                }
                                window.location.href = "{{url('/W76F2201/view')}}" + "?" + $.param(data);
                            });
                            $cell.find("#btnEditW76F2200").bind("click", function (evt) {
                                var data = {
                                    facilityID: rowData.FacilityID
                                }
                                window.location.href = "{{url('/W76F2201/edit')}}" + "?" + $.param(data);
                            });
                            $cell.find("#btnDeleteW76F2200").bind("click", function (evt) {
                                ask_delete(function () {
                                    $.ajax({
                                        method: "POST",
                                        url: '{{url('/W76F2200/delete')}}',
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
                        title: "{{Helpers::getRS('Phong_hopU')}}",
                        width: 170,
                        align: "center",
                        dataIndx: "FacilityNo",
                        dataType: "string",
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "{{Helpers::getRS('Ten_phong_hop')}}",
                        width: 220,
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        align: "left",
                        dataIndx: "FacilityName",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    }
                    , {
                        title: "{{Helpers::getRS('Dia_diem')}}",
                        width: 250,
                        dataType: "string",
                        editor: false,
                        align: "center",
                        dataIndx: "Location",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "{{Helpers::getRS('So_cho_ngoi')}}",
                        width: 120,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "Capacity",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "{{Helpers::getRS('Ghi_chu')}}",
                        width: 280,
                        dataType: "string",
                        align: "left",
                        editor: false,
                        dataIndx: "Description",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                    , {
                        title: "{{Helpers::getRS('KSD')}}",
                        width: 150,
                        dataType: "string",
                        align: "center",
                        editor: false,
                        dataIndx: "Disabled",
                        render: function (ui) {
                            var rowData = ui.rowData;
                            var isCheck = rowData.Disabled == 1 ? 'checked' : '';
                            return '<input type="checkbox" ' + isCheck + ' disabled />';
                        }
                    }
                ],
                dataModel: {
                    data: {!! ($newsCollection) !!},
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
            $("#gridW76F2200").pqGrid("option", $.paramquery.pqGrid.regional['{{Session::get("locate")}}']);
            $("#gridW76F2200").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['{{Session::get("locate")}}']);
            $("#gridW76F2200").pqGrid("refreshDataAndView");
        });
        setTimeout(function () {
            //loadDataW76F2200();
            resizePqGrid();
        }, 600);

        $("#frmW76F2200").on('submit', function (e) {
            e.preventDefault();
            loadDataW76F2200();
        });


        function loadDataW76F2200() {
            $("#gridW76F2200").pqGrid("showLoading");
            $.ajax({
                method: "POST",
                url: '{{url("/W76F2200/filter")}}',
                data: $("#frmW76F2200").serialize() + "&_token={{ csrf_token() }}",
                success: function (data) {
                    $("#gridW76F2200").pqGrid("hideLoading");
                    var temp = reformatData(JSON.parse(data), $("#gridW76F2200"));
                    $("#gridW76F2200").pqGrid("option", "dataModel.data", temp);
                    $("#gridW76F2200").pqGrid("refreshDataAndView");
                }
            });
        }


    </script>

@stop

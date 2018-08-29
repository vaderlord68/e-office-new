@extends('page.master')
@section('body_content')
    @parent
    <?php
    $lastNewsModified = "";
    if (session("lastNewsModified")) {
        $lastNewsModified = session("lastNewsModified");
        session()->remove("lastNewsModified");
    }
    ?>
    <section>
        <form id="frmW76F2140" name="frmW76F2140" method="post">
            <div class="row form-group">
                <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                    <label class="lbl-normal">{{Helpers::getRS("Tim_kiem")}}</label>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <input type="text" class="form-control" id="txtDocNo" name="txtDocNo" autocomplete="off">
                </div>
            </div>
        </form>
        <div class="row mgb5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="toolbarW76F2140">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="gridW76F2140"></div>
            </div>
        </div>
    </section>

    {{--<div class="module-news card">--}}
    {{--<div class="card-header">--}}
    {{--<div class="left-table-header">--}}
    {{--<a id="news-createNews" class="toolbar-btn action-on-header" href="/news/create">--}}
    {{--<i class="fa fa-plus-circle"></i> Thêm bài viết</a>--}}
    {{--</div>--}}
    {{--<div class="container filterBox">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
    {{--<label for="searchRelativeTitle">Tiêu đề</label>--}}
    {{--<input type="search"--}}
    {{--id=""--}}
    {{--class="form-control form-control-sm search-form search-toolbar search-auto-complete"--}}
    {{--placeholder="Nhập tiêu đề bài viết để tìm kiếm"--}}
    {{--aria-controls="bootstrap-data-table">--}}
    {{--<div class="search-toolbar search-suggestion-list">--}}
    {{--<ul>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('#searchRelativeTitle').keyup(function () {--}}
    {{--var searchTitle = $(this).val();--}}
    {{--var suggestionList = $(".search-suggestion-list ul");--}}
    {{--suggestionList.find("li").remove();--}}
    {{--if (!searchTitle == "") {--}}
    {{--var url = '/news/search/title?searchTitle=' + searchTitle;--}}
    {{--setTimeout(function () {--}}
    {{--$.ajax({--}}
    {{--url: url,--}}
    {{--type: "get",--}}
    {{--dataType: "text",--}}
    {{--success: function (result) {--}}
    {{--suggestionList.find("li").remove();--}}
    {{--var resultData = $.parseJSON(result);--}}
    {{--for (var i = 0; i < resultData.length; i++) {--}}
    {{--suggestionList.append("<li><a href='/news/manage/filter?searchTitle=" + resultData[i].Title + "'>" + resultData[i].Title + " - Người tạo:" + resultData[i].CreateUserID + " - Tác giả: " + resultData[i].Author + "</a></li>");--}}
    {{--}--}}
    {{--}--}}
    {{--});--}}
    {{--}, 300);--}}
    {{--}--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <script>
        $(document).ready(function () {
            $("#toolbarW76F2140").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnAddW76F2140",
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
                                    window.location.href = "{{url('/news/create')}}";
                                });
                            }
                        }
                    ]
                }
            );
            var obj = {
                width: '100%',
                height: 450,
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
                colModel : [
                    {
                        title: "{{Helpers::getRS('Xu_ly')}}",
                        width: 35,
                        align: "center",
                        dataIndx: "View",
                        isExport: false,
                        editor: false,
                        render: function (ui) {
                            var str = '<a id="btnEditW76F2140" title="{{Helpers::getRS("Sua")}}"><i class="fa fa-edit mgr10 text-yellow cursor-pointer"></i></a>';
                            str += '<a id="btnDeleteW76F2140" title="{{Helpers::getRS("Xoa")}}"><i class="fa fa-trash text-danger cursor-pointer"></i></a>';
                            return str;
                        },
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                grid = this,
                                $cell = grid.getCell(ui);
                            var rowData = ui.rowData;
                            $cell.find("#btnEditW76F2140").bind("click", function (evt) {
                                var newsID = rowData.NewsID;
                                window.location.href = "{{url('/news/edit')}}" + "/" + newsID;
                            });
                            $cell.find("#btnDeleteW76F2140").bind("click", function (evt) {
                                var newsID = rowData.NewsID;

                            });
                        }
                    }
                    , {
                        title: "",
                        width: 170,
                        align: "center",
                        dataIndx: "NewsID",
                        editor: false,
                        hidden: true
                    }
                    , {
                        title: "{{Helpers::getRS('Tieu_de')}}",
                        width: 170,
                        align: "center",
                        dataIndx: "Title",
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "{{Helpers::getRS('Chuyen_muc')}}",
                        width: 220,
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        align: "center",
                        dataIndx: "ChannelID",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "{{Helpers::getRS('Trang_thai')}}",
                        width: 150,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "StatusID",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    },
                    {
                        title: "{{Helpers::getRS('So_luot_xem')}}",
                        width: 150,
                        dataType: "date",
                        editor: false,
                        align: "center",
                        dataIndx: "ReleaseDate",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    },
                    {
                        title: "{{Helpers::getRS('Ngay_soan_thao')}}",
                        width: 150,
                        dataType: "date",
                        editor: false,
                        dataIndx: "CreateDate",
                        filter: {type: "textbox", condition: "equal", init: pqDatePicker, listeners: ['change']}
                    },
                    {
                        title: "{{Helpers::getRS('Ngay_dang_tin')}}",
                        width: 150,
                        dataType: "date",
                        editor: false,
                        dataIndx: "ReleaseDate",
                        filter: {type: "textbox", condition: "equal", init: pqDatePicker, listeners: ['change']}
                    },
                    {
                        title: "{{Helpers::getRS('Nguoi_dang_tin')}}",
                        width: 150,
                        dataType: "string",
                        editor: false,
                        dataIndx: "DocTypeName",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    },
                    {
                        title: "{{Helpers::getRS('Tin_noi_bat')}}",
                        width: 110,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "IsShowBestNews",
                        render: function (ui) {
                            var rowData = ui.rowData;
                            var isCheck = rowData.IsShowBestNews == 1 ? 'checked' : '';
                            return '<input type="checkbox" ' + isCheck + ' disabled />';
                        },
                    },
                    {
                        title: "{{Helpers::getRS('Tac_gia')}}",
                        width: 140,
                        align: "center",
                        dataType: "string",
                        editor: false,
                        dataIndx: "Author",
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                    }
                ],
                dataModel : {
                    data: {!! ($newsCollection) !!},
                },
                pageModel : {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]},
                complete: function (event, ui) {
                    var data = $("#gridW76F2140").pqGrid('option','dataModel.data');
                    if (data.length > 0){
                        $("#gridW76F2140").pqGrid( "setSelection", {rowIndx:0} );
                    }
                }
            };

            $("#gridW76F2140").pqGrid(obj);
            $("#gridW76F2140").pqGrid("option", $.paramquery.pqGrid.regional['{{Session::get("locate")}}']);
            $("#gridW76F2140").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['{{Session::get("locate")}}']);
            $("#gridW76F2140").pqGrid("refreshDataAndView");
            //        setTimeout(function () {
            //            loadDataW76F2120();
            //            resizePqGrid();
            //        }, 300);
        });
    </script>
@stop
@section("deletePopup")
    @include("system.module.news.delete")
@show
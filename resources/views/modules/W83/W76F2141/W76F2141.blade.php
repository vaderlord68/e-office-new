@extends('layouts.layout')
@section('content')
    @parent
    <?php
    if ($task == "view" || $task == "edit") {//Edit
        $master = json_decode($rowData);
        \Debugbar::info($master);
        $detail = $rowDataDetail;

        $newsID = $master->NewsID;
        $titleW76F2141 = $master->Title;
        $remarkW76F2141 = $master->Remark;
        $channelIDW76F2141 = $master->ChannelID;
        $authorW76F2141 = $master->Author;
        $status_idW76F2141 = $master->StatusID;
        $releaseDateW76F2141 = $master->ReleaseDate;
        $is_hotnewsW76F2141 = $master->IsHotNews;
        $is_ShowBestNewsW76F2141 = $master->IsShowBestNews;
        $keywordW76F2141 = $master->Keywords;
        $orderNoW76F2141 = $master->OrderNo;
        $contentW76F2141 = $master->Content;
        $CreateUserID = $master->CreateUserID;
        $image = $master->Image;
    } else { //add
        $master = json_decode($rowData);
        $detail = $rowDataDetail;

        $newsID = '';
        $titleW76F2141 = "";
        $remarkW76F2141 = "";
        $channelIDW76F2141 = "";
        $authorW76F2141 = Helpers::getUserID();
        $status_idW76F2141 = 0;
        $releaseDateW76F2141 = "";
        $is_hotnewsW76F2141 = 0;
        $is_ShowBestNewsW76F2141 = 0;
        $keywordW76F2141 = "";
        $orderNoW76F2141 = "";
        $contentW76F2141 = "";
        $CreateUserID = Helpers::getUserID();
        $image = asset('media/no-photo.jpg');
    }
    ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{Helpers::getRS('Them_moi_ban_tin')}}</h4>
        </div>
        <div class="card-body" id="modalW76F2141">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <form id="createNewsW76F2141" method="POST" action="/news/create/save" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="row mgb5">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input type="file" id="image" name="image" class="form-control hide">
                                    <a id="btnChooseThumbnail"
                                       data-footer="">
                                        <img src="{{htmlentities($image) }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="row mgb5">
                                <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                                    <label class="lbl-normal" for="">{{Helpers::getRS("Tieu_de")}}</label>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" name="titleW76F2141" id="titleW76F2141" class="form-control"
                                           maxlength="250"
                                           autocomplete="off" value="{{$titleW76F2141}}" required>
                                </div>
                            </div>
                            <div class="row mgb5">
                                <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                                    <label class="lbl-normal" for="">{{Helpers::getRS("Dien_giai")}}</label>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <textarea type="text" id="remarkW76F2141" name="remarkW76F2141" class="form-control"
                                      maxlength="2000"
                                      autocomplete="off" style="height: 60px">{{$remarkW76F2141}}</textarea>
                                </div>
                            </div>
                            <div class="row mgb5">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label class="lbl-normal">{{Helpers::getRS("Chuyen_muc")}}</label>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <select name="channelIDW76F2141" id="channelIDW76F2141" class="form-control"
                                            required>
                                        <option value="">--</option>
                                        @foreach($channelIDList as  $channelIDItem)
                                            <option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label class="lbl-normal">{{Helpers::getRS("Tac_gia")}}</label>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" id="authorW76F2141" name="authorW76F2141"
                                           readonly
                                           class="form-control" value="{{$authorW76F2141}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mgb5">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label class="lbl-normal">{{Helpers::getRS('Tu_khoa')}}</label>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" name="keywordW76F2141" class="form-control" id="keywordW76F2141"
                                           placeholder="" autocomplete="off" value="{{$keywordW76F2141}}">
                                </div>
                            </div>
                            <div class="row mgb5">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label class="lbl-normal">{{Helpers::getRS("Ngay_phat_hanh")}}</label>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" id="releaseDateW76F2141"
                                               name="releaseDateW76F2141" value="{{$releaseDateW76F2141}}"
                                               autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label class="lbl-normal">{{Helpers::getRS("Thu_tu_hien_thi")}}</label>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input class="form-control" type="text" class="form-control" name="orderNoW76F2141"
                                           maxlength="4" onkeypress="return inputNumber(event);" min="1" step="1"
                                           id="orderNoW76F2141" value="{{$orderNoW76F2141}}" placeholder=""
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="row mgb5">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="status_idW76F2141"
                                                   name="status_idW76F2141"
                                                   {{$status_idW76F2141 == 1 ? 'checked': ''}} value="1"> {{Helpers::getRS("Phat_hanh")}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="is_hotnewsW76F2141"
                                                   name="is_hotnewsW76F2141"
                                                   class="form-check-input"
                                                   {{$is_hotnewsW76F2141 == 1 ? 'checked': ''}} value="1">{{Helpers::getRS("Tin_noi_bat")}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="is_ShowBestNewsW76F2141"
                                                   name="is_ShowBestNewsW76F2141" value="1"
                                                   {{$is_ShowBestNewsW76F2141 == 1 ? 'checked':''}}
                                                   class="form-check-input">{{Helpers::getRS("Tin_moi_nhat")}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mgb10">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <textarea type="text" id="contentW76F2141" name="contentW76F2141" required
                                      class="form-control"
                                      cols="10" rows="10" autocomplete="off">{{$contentW76F2141}}</textarea>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <h4 class="lbl-normal-value">{{Helpers::getRS("Bai_viet_lien_quan")}}</h4>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <button type="button" class="btn btn-info" name="addNewsW76F2141" id="addNewsW76F2141">
                                ...
                            </button>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="gridW76F2141"></div>
                        </div>
                    </div>

                    <input type="hidden" name="CreateUserID" value="<?php echo $CreateUserID?>">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" id="smForm" style="display: none"/>
                    <button id="btnSubmitW76F2141" class="hide"></button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div id="toolbarW76F2141"></div>
        </div>
    </div>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        $(document).ready(function () {
            $("#btnChooseThumbnail").click(function () {
                $("#image").trigger('click');
            });

            $("#image").on("change", function (event) {
                console.log("file change");
                var file = this.files[0];
                if ((file.size / 1024 / 1024) > 25) {
                    //alert_warning('Vui lòng đính kèm tập tin nhở hơn 25MB.');
                    alertError('Vui lòng đính kèm tập tin nhở hơn 25MB.')
                } else if (check_file_type(file.name) == false) {
                    //alert_warning("Tập tin " + file.name + " không được hỗ trợ đính kèm.");
                    alertError("Tập tin " + file.name + " không được hỗ trợ đính kèm.");
                } else {
                    ImageTools.resize(file, {
                        height: 150,
                        //width: 200
                    }, function (blob, didItResize) {
                        blob_to_data_URL(blob, function (url) {
                            hideAlert();
                            $('#btnChooseThumbnail').attr('href', url);
                            $('#btnChooseThumbnail').find("img").attr('src', url);
                        });
                    });
                }
            });

            $("#addNewsW76F2141").click(function () {
                showFormDialogPost('{{url('/W76F2141/load-selectnews')}}', 'popW76F2141SelectNews', {_token: '{{csrf_token()}}', 'newsID': '{{$newsID}}'}, null, null, function (res) {
                    //merge
                    console.log("dsfsdf");
                    var selectedData = window.selectedNews;
                    var data = $("#gridW76F2141").pqGrid('option', 'dataModel.data');

                    data.mergeWithCondition(selectedData, 'RelatedNewsID', 'NewsID');


//                    $.each(selectedData ,function(index , row){
//                        var newsID = row.NewsID;
//                        var arrTemp = $.grep(data, function(item){
//                            return item.RelatedNewsID == newsID;
//                        });
//                        if (arrTemp.length == 0){
//                            data.push(row);
//                        }
//                    });




                    //var mergedData = data.concat(selectedData);

                    $("#gridW76F2141").pqGrid('option', 'dataModel.data', data);
                    $("#gridW76F2141").pqGrid('refreshDataAndView');
                });
            });


            $('#orderNoW76F2141').inputmask("numeric", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 0,
                autoGroup: true,
                //prefix: '$', //No Space, this will truncate the first character
                rightAlign: true
            });
            $('#releaseDateW76F2141').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: '{{Session::get("locate")}}'
            });
            CKEDITOR.replace('contentW76F2141', {
                removeButtons: 'Source',
                removePlugins: 'save,print,preview,find,about,maximize,showblocks,elementspath,spellchecker',
                resize_enabled: false,
                height: 400
            });
            $("#submitCreateNewsW76F2141").click(function () {
                $("#smForm").click();
            });

            $("#toolbarW76F2141").digiMenu({
                    showText: true,
                    cls: '',
                    style: 'border: none;float:right',
                    buttonList: [
                        {
                            ID: "btnSaveW76F2141",
                            icon: "fa fa-save",
                            title: "{{Helpers::getRS('Luu')}}",
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
                                    frmW76F2141Save();
                                });
                            }
                        }
                        , {
                            ID: "btnBack",
                            icon: "fa fa-arrow-left",
                            title: '{{Helpers::getRS("Quay_lai")}}',
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
            createGridW76F2141();
        });

        function createGridW76F2141() {
            var obj = {
                width: "100%",
                //height: 200,
                flexHeight: true,
                //freezeCols: 1,
                numberCell: {show: false},
                selectionModel: {type: 'row', mode: 'single'},
                scrollModel: {horizontal: false, autoFit: false, lastColumn: 'none'},
                showTitle: true,
                showBottom: true,
                showHeader: true,
                showTop: false,
                dataType: "JSON",
                wrap: true,
                hwrap: true,
                collapsible: false,
                postRenderInterval: -1,
                dataModel: {
                    data: {!! $detail !!},
                },
                colModel: [
                    {
                        title: "ID",
                        width: 399,
                        align: "left",
                        dataIndx: "ID",
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "NewsID",
                        width: 399,
                        align: "left",
                        dataIndx: "NewsID",
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "RelatedNewsID",
                        width: 399,
                        align: "left",
                        dataIndx: "RelatedNewsID",
                        dataType: "string",
                        editor: false,
                        hidden: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "{{Helpers::getRS('Tieu_de')}}",
                        width: 399,
                        align: "left",
                        dataIndx: "Title",
                        dataType: "string",
                        editor: false,
                        filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    },
                    {
                        title: "",
                        width: 20,
                        dataType: "string",
                        editable: true,
                        editor: false,
                        dataIndx: "View",
                        align: "center",
                        render: function (ui) {
                            var str = '<a id="btnDeleteW76F2141" title="{{Helpers::getRS("Xoa")}}"><i class="fas fa-trash-alt text-red cursor-pointer"></i></a>';
                            return str;
                        },
                        postRender: function (ui) {
                            var rowIndx = ui.rowIndx,
                                grid = this,
                                $cell = grid.getCell(ui);
                            var rowData = ui.rowData;
                            var $grid = $("#gridW76F2141")
                            //edit button
                            $cell.find("#btnDeleteW76F2141").bind("click", function (evt) {
                                update4ParamGrid($grid, null, 'delete');
                            });
                        }
                    }
                ]
            };
            var $grid = $("#gridW76F2141")
            $grid.pqGrid(obj);
            setTimeout(function () {
                $grid.pqGrid('refreshDataAndView');
            }, 500);
        }

        function frmW76F2141Save() {
            validationElements($("#createNewsW76F2141"), function () {
                //Kiem tra nhung truong hop khac
                checkID($("#orderNoW76F2141"));
                $("#createNewsW76F2141").find("#btnSubmitW76F2141").click();
            });
        }

        $('#createNewsW76F2141').submit(function (e) {
            e.preventDefault();
            //get all values of this form
            var formData = new FormData($('#createNewsW76F2141')[0]);
            var content = CKEDITOR.instances.contentW76F2141.getData();

            var relativeNews = $("#gridW76F2141").pqGrid('option', 'dataModel.data');
            var file = $("#image").val();

            formData.append('contentW76F2141', content);
            formData.append('newsID', '{{$newsID}}');
            formData.append('image', file);


            if (relativeNews.length > 0) {
                formData.append('relativeNews', JSON.stringify(relativeNews));
            }
            var url = "";
            var task = "{{$task}}";
            if (task == "add") {
                url = '{{url("/W76F2141/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/W76F2141/update")}}';
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
@stop
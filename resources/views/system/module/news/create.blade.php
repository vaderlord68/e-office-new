@extends('page.master')
@section('body_content')
@parent
<div class="card slider slide-in">
    <div class="col-sm-12" id="message-error" style="display: none;">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span><span id="content-message"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{Helpers::getRS('Them_moi_ban_tin')}}</h4>
        </div>
        <div class="card-body" id="modalW76F2141">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                <form id="createNewsW76F2141" method="POST" action="/news/create/save" enctype="multipart/form-data">
                    <div class="row mgb5">
                        <div class="col-sm-1 col-md-1 col-lg-1 col-lg-1">
                            <label class="lbl-normal" for="">{{Helpers::getRS("Tieu_de")}}</label>
                        </div>
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            <input type="text" name="titleW76F2141" id="titleW76F2141" class="form-control"
                                   autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <input type="file" name="image" class="form-control" style="height: 100px">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <textarea type="text" id="remarkW76F2141" name="remarkW76F2141" class="form-control"
                                      autocomplete="off" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label class="lbl-normal">{{Helpers::getRS("Chuyen_muc")}}</label>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <select name="channelIDW76F2141" id="channelIDW76F2141" class="form-control" required>
                                <option value="">--</option>
                                @foreach($channelIDList as  $channelIDItem)
                                    <option value="{{$channelIDItem->CodeID}}">{{$channelIDItem->CodeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <label class="lbl-normal">{{Helpers::getRS("Tac_gia")}}</label>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input type="text" class="form-control" id="authorW76F2141" name="authorW76F2141" readonly
                                   class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="status_idW76F2141"
                                           name="status_idW76F2141"> {{Helpers::getRS("Phat_hanh")}}
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label class="lbl-normal">{{Helpers::getRS("Ngay_phat_hanh")}}</label>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <div class="input-group ">
                                <input type="text" class="form-control" id="releaseDateW76F2141"
                                       name="releaseDateW76F2141" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" id="is_hotnewsW76F2141"
                                           name="is_hotnewsW76F2141"
                                           class="form-check-input">{{Helpers::getRS("Tin_noi_bat")}}
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" id="is_ShowBestNewsW76F2141"
                                           name="is_ShowBestNewsW76F2141" value="1"
                                           class="form-check-input">{{Helpers::getRS("Dang_tai_ban_tin_moi_nhat")}}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mgb5">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <label class="lbl-normal">{{Helpers::getRS('Tu_khoa')}}</label>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <input type="text" name="keywordW76F2141" class="form-control" id="keywordW76F2141"
                                   placeholder="" autocomplete="off">
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label class="lbl-normal">{{Helpers::getRS("Thu_tu_hien_thi")}}</label>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <input class="form-control" type="text" class="form-control" name="orderNoW76F2141"
                                   maxlength="4" onkeypress="return inputNumber(event);" min="1" step="1"
                                   id="orderNoW76F2141" value="" placeholder="" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <textarea type="text" id="contentW76F2141" name="contentW76F2141" required
                                      class="form-control"
                                      cols="10" rows="10" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label class="lbl-normal">{{Helpers::getRS("Bai_viet_lien_quan")}}</label>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <button class="btn btn-info" name="addNewsW76F2141" id="addNewsW76F2141" value=""
                                    placeholder="" autocomplete="off">
                                ...
                            </button>
                        </div>
                    </div>


                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button id="btnSubmitW76F2141" class="hide"></button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div id="toolbarW76F2141"></div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
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
            {{--$('#releaseDateW76F2141').datetimepicker({--}}
            {{--todayHighlight: true,--}}
            {{--autoclose: true,--}}
            {{--format: "dd/mm/yyyy",--}}
            {{--timeFormat:  "hh:mm:ss",--}}
            {{--language: '{{Session::get("locate")}}'--}}
            {{--});--}}
            //            tinymce.init({
            //                selector: '#contentW76F2141',
            //            });
            CKEDITOR.replace('contentW76F2141', {
                removeButtons: 'Source',
                removePlugins: 'save,print,preview,find,about,maximize,showblocks,elementspath,spellchecker',
                resize_enabled: false
                // The rest of options...
            });
            $("#submitCreateNewsW76F2141").click(function () {
                $("#smForm").click();
            });


        });

        $("#toolbarW76F2141").digiMenu({
                showText: true,
                cls: '',
                style: 'border: none;float:right',
                buttonList: [

                    {
                        ID: "btnSaveCloseW76F2141",
                        icon: "fa fa-save",
                        title: '{{Helpers::getRS("Luu_va_dongU")}}',
                        enable: true,
                        hidden: false,
                        type: "button",
                        cls: "btn btn-info pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                console.log("khanh test");
                                frmW76F2141Save();
                            });
                        }
                    }
                    , {
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
                        icon: "fa fa-arrow-left text-red",
                        title: '{{Helpers::getRS("Quay_lai")}}',
                        enable: true,
                        hidden: false,
                        type: "button",
                        cls: "btn btn-danger pull-right",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            ui.$btn.click(function () {
                                window.location.href = '{{url('/news/manage')}}';
                            });
                        }
                    }


                ]
            }
        );

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

            //get all attachment files
//            $.each(validatedFiles, function (key, value) {
//                formData.append('file[]', value);
//            });

            //get detail
                    {{--var $grid = $("#W76F2141Grid");--}}
                    {{--var detail = $grid.pqGrid("option", "dataModel.data");--}}
                    {{--detail = $.grep(detail, function(row){--}}
                    {{--return row.IsUpdate == 1;--}}
                    {{--});--}}
                    {{--formData.append('detail', JSON.stringify(detail));--}}
                    {{--formData.append('ID', '{{$ID}}');--}}

            var url = "";
            var task = "{{$task}}";
            if (task == "add") {
                url = '{{url("/news/create/save")}}';
            }
            if (task == "edit") {
                url = '{{url("/news/edit/save")}}';
            }
            //$(".l3loading").removeClass("hide");
            $.ajax({
                enctype: 'multipart/form-data',
                method: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log(res);
                    var result = JSON.parse(res);
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message);
                            break;
                        case 'SUCC':
                            window.location.href = '{{url('/news/manage')}}';
                            break;
                    }
                }
            });
        });
        // ClassicEditor
        //     .create( document.querySelector( '#documentContent' ) )
        //     .then( editor => {
        //         console.log( editor );
        //     } )
        //     .catch( error => {
        //         console.error( error );
        //     } );
        $("#btnBootbox").click(function () {
            //save_ok();
            ask_save(function () {
                alert("Yes")
            }, null, null, function () {
            }, null);
        });
    </script>
    @stop
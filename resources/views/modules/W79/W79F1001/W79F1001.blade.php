<div class="modal fade in down" id="modalAddScheduleW79F1000">
    <div class="modal-dialog modal-lg" style="">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{Helpers::getRS("Dang_ky_lich_lam_viec")}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <section>
                    <div class="card no-border">
                        {{--<div class="card-header">--}}
                        {{--<h4 class="card-title"></h4>--}}
                        {{--</div>--}}
                        <div class="card-body" id="modalW79F1001">
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    @include('page.content.alert-dismissible')
                                </div>
                            </div>
                            <form id="frmAddScheduleW79F1000" method="POST" action="">
                                {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Mo_ta")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <textarea type="text" id="txtDescriptionW79F1001" maxlength="4000" name="title"
                                                  class="form-control"
                                                  autocomplete="off"
                                                  rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Ngay_su_kien")}}</label>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <input type="text" id="txtDateW79F1001" maxlength="50" name="date"
                                                       class="form-control"
                                                       value="" required>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                                                <label class="lbl-normal">{{Helpers::getRS("Gio")}}</label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" id="txtTimeFromW79F1001" maxlength="50" name="start"
                                                       class="form-control"
                                                       value="" required>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" id="txtTimeToW79F1001" maxlength="50" name="end"
                                                       class="form-control"
                                                       value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <label class="lbl-normal">{{Helpers::getRS("Cong_viec")}}</label>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <select name="works" id="slWorkW79F1001"
                                                class="form-control" required>
                                            {{--<option value="">--</option>--}}
                                            @foreach($theWorks as  $work)
                                                <option value="{{$work->TaskID}}">{{$work->TaskName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>
                                </div>
                                <input type="hidden" name="mode" id="hdMode" value="" />
                                <input type="hidden" name="id" id="hdID" value="" />
                                <button type="submit" id="btnSubmitW79F1001" class="hide"></button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <div id="toolbarW79F1001">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#txtDateW79F1001').datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy",
        language: '{{Session::get("locate")}}'
    });
    $('#txtTimeFromW79F1001').inputmask({
        alias: "datetime",
        mask: "h:s",
        placeholder: "__:__"
    });
    $('#txtTimeToW79F1001').inputmask({
        alias: "datetime",
        mask: "h:s",
        placeholder: "__:__"
    });
    $("#toolbarW79F1001").digiMenu({
        showText: true,
        cls: 'none-border none-background',
        style: '',
        buttonList: [
            {
                ID: "btnSaveW77F1001",
                icon: "fas fa-save",
                title: "{{Helpers::getRS('Luu')}}",
                enable: true,
                hidden: false,
                type: "button",
                cls: "btn  btn-info pull-right",
                render: function (ui) {
                },
                postRender: function (ui) {
                    ui.$btn.click(function () {
                        $('#btnSubmitW79F1001').click();
                    });
                }
            }
        ]
    });
</script>

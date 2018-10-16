<div class="modal fadeInDown" id="myModalW84">
    <div class="modal-dialog " style="width: 40% !important; max-width: 40% !important;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{Helpers::getRS("Cap_nhat_tien_do")}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="margin-bottom: -20px;">
                <section>
                    <div class="card">
                        <div class="card-body" id="modalW77F2001">
                            <div id="bootstrap-data-table_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                                <form id="formW77F2001" method="POST" enctype="multipart/form-data" action="">
                                    {{csrf_field()}}
                                    <div class="row mgb5">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label class="lbl-normal">{{Helpers::getRS("Trang_thai")}}</label>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <select name="priorityW84F1001" id="priorityW84F1001" class="form-control">
                                                {{--<option value="">--</option>--}}
                                                @foreach($statusList as  $statusItem)
                                                <option value="{{$statusItem->CodeID}}" >{{$statusItem->CodeName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                        </div>
                                    </div>

                                    <div class="row mgb5">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label class="lbl-normal">{{Helpers::getRS("Tien_do")}}</label>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <select name="priorityW84F1001" id="priorityW84F1001" class="form-control">
                                                <option value="">--</option>
                                                {{--@foreach($channelIDList as  $channelIDItem)--}}
                                                {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                            <label class="label-process">%</label>
                                        </div>
                                    </div>

                                    <div class="row mgb5">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label class="lbl-normal">{{Helpers::getRS("Thoi_gian_xu_ly")}}</label>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <select name="priorityW84F1001" id="priorityW84F1001" class="form-control">
                                                <option value="">--</option>
                                                {{--@foreach($channelIDList as  $channelIDItem)--}}
                                                {{--<option value="{{$channelIDItem->CodeID}}" {{$channelIDItem->CodeID == $channelIDW76F2141 ? 'selected': ''}}>{{$channelIDItem->CodeName}}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                            <label class="label-process">{{Helpers::getRS("Gio")}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label class="lbl-normal">{{Helpers::getRS("Ghi_chu")}}</label>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <textarea name="priorityW84F1001" id="priorityW84F1001"
                                                      class="form-control"></textarea>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                        </div>
                                    </div>

                                    <button id="btnSubmitW84F1001" class="hide"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div id="toolbarUpdateProcess">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#toolbarUpdateProcess").digiMenu({
                showText: true,
                buttonList: [
                    {
                        ID: "btnSave_UpdateProcess",
                        icon: "fas fa-check",
                        title: "{{Helpers::getRS('Dong_y')}}",
                        cls: "btn btn-info",
                        enable: true,
                        hidden: function () {
                            return false;
                        },
                        type: "button",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            {{--console.log(ui);--}}
                            {{--ui.$btn.click(function () {--}}
                            {{--window.location.href = "{{url('/W76F2141/add')}}";--}}
                            {{--});--}}
                        }
                    }
                    , {
                        ID: "btnClose_UpdateProcess",
                        icon: "fas fa-times",
                        title: "{{Helpers::getRS('_Dong')}}",
                        cls: "btn btn-danger",
                        enable: true,
                        hidden: function () {
                            return false;
                        },
                        type: "button",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            {{--console.log(ui);--}}
                            {{--ui.$btn.click(function () {--}}
                            {{--window.location.href = "{{url('/W76F2141/add')}}";--}}
                            {{--});--}}
                        }
                    }
                ]
            }
        );
    });
</script>
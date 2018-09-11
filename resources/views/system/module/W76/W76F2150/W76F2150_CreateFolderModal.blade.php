<div class="modal fade" id="popCreateFolder">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm mới thư mục</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="frmCreateFolder"style="margin-bottom: 0px">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-sm-12">
                            @include('page.content.alert-dismissible')
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="txtFolderName">Tên thư mục</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" name="txtFolderName" class="form-control" id="txtFolderName" autofocus
                                   required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="txtFolderDescription">Mô tả</label>
                        </div>
                        <div class="col-sm-10">
                            <textarea type="text" name="txtFolderDescription" class="form-control "
                                      id="txtFolderDescription" required></textarea>
                        </div>
                    </div>


                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="btnSaveFolder" class="btn btn-default pull-right" ><i
                                class="fa fa-save text-primary"></i> Lưu
                    </button>
                    <button id="hdBtnSaveFolder" class="hide"></button>

                    <input type="hidden" name="hdParentFolderID" value="{{$currentFolderID}}">
                    <input type="hidden" name="hdFolderID" value="">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#btnSaveFolder").click(function () {
            $("#hdBtnSaveFolder").trigger("click");

        });
        $("#frmCreateFolder").submit(function (evt) {
            evt.preventDefault();
            postMethod("{{url('/W76F2150/save-folder')}}", function (res) {
                var data = JSON.parse(res);
                switch (data.status) {
                    case 'OKAY':
                        //hideAlert($("#popCreateFolder"));
                        //window.location.href = document.referrer;
                        window.location.reload();
                        break;
                    case 'ERROR':
                        alertError(data.message, $("#popCreateFolder"));
                        break;
                }
            }, $("#frmCreateFolder").serialize())
        });
    });
</script>
<div class="modal fade" id="popCreateFolder">
    <div class="modal-dialog">
        @php
            if ($type == 'create-folder'){
                $txtFolderName = '';
                $txtFolderDescription = '';
                $ID = '';
            }else{
                $txtFolderName = $rsData->FolderName;
                $txtFolderDescription = $rsData->FolderDescription;
                $ID = $rsData->ID;
            }

        @endphp
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
                        <div class="col-sm-3">
                            <label class="lbl-normal" for="txtFolderName">Tên thư mục</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="txtFolderName" class="form-control" id="txtFolderName"
                                   value="{{$txtFolderName}}" {{$type == 'edit-folder' ? '': 'autofocus'}} required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="lbl-normal" for="txtFolderDescription">Mô tả</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea type="text" name="txtFolderDescription" class="form-control "
                                      id="txtFolderDescription" {{$type == 'edit-folder' ? 'autofocus': ''}} required>{{$txtFolderDescription}}</textarea>
                        </div>
                    </div>


                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="btnSaveFolder" class="btn btn-default pull-right" ><i
                                class="fa fa-save text-primary"></i> Lưu
                    </button>
                    <button id="hdBtnSaveFolder" class="hide"></button>

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
            hideAlert($("#popCreateFolder"));
            var task = '{{$type}}';
            var url = '';
            if (task == 'create-folder'){
                url = "{{url('/W76F2150/save-folder')}}"
            }
            if (task == 'edit-folder'){
                url = "{{url('/W76F2150/update-folder')}}"
            }
            postMethod(url, function (res) {
                var data = JSON.parse(res);
                switch (data.status) {
                    case 'OKAY':
                        ///hideAlert($("#popCreateFolder"));
                        //window.location.href = document.referrer;
                       // window.location.reload();
                        $("#popCreateFolder").modal('hide');
                        break;
                    case 'ERROR':
                        alertError(data.message, $("#popCreateFolder"));
                        break;
                }
            }, $("#frmCreateFolder").serialize() + "&ID={{$ID}}" + "&currentFolderID={{$currentFolderID}}")
        });
    });
</script>

<style>

</style>
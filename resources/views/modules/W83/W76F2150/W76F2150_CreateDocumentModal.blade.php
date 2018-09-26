<div class="modal fade" id="popCreateDocument">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm mới thư mục</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="frmCreateFolder">
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="txtDocName">Tên tài liệu</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <input type="text" name="txtDocName" class="form-control" id="txtDocName" autofocus
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text hide" id="lblExtension">s</span>
                                </div>
                                <div class="input-group-append">
                                    <input type="file" name="attFile" class="form-control hide" id="attFile">
                                    <button type="button" class="btn btn-default" id="btnChoose" name="btnChoose">...
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="txtDocID">Số hiệu</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" name="txtDocID" class="form-control" id="txtDocID" autofocus required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="txtContent">Trích yếu</label>
                        </div>
                        <div class="col-sm-10">
            <textarea type="text" name="txtContent" class="form-control "
                      id="txtContent"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="cboDocType">Loại văn bản</label>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" id="cboDocType" name="cboDocType">
                                @foreach($docTypeList as $row)
                                    <option value="{{$row->CodeID}}">{{$row->CodeName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="cboFieldDoc">Lĩnh vực</label>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" id="cboFieldDoc" name="cboFieldDoc">
                                @foreach($docTypeList as $row)
                                    <option value="{{$row->CodeID}}">{{$row->CodeName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="cboOrgDoc">Cơ quan ban hành</label>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" id="cboOrgDoc" name="cboOrgDoc">
                                @foreach($docTypeList as $row)
                                    <option value="{{$row->CodeID}}">{{$row->CodeName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="txtFolderDescription">Mô tả</label>
                        </div>
                        <div class="col-sm-10">
            <textarea type="text" name="txtFolderDescription" class="form-control "
                      id="txtFolderDescription"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="hdParentFolderID" value="{{$currentFolderID}}">
                    <input type="hidden" name="hdFolderID" value="">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button id="hdBtnSaveFolder" class="hide"></button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="btnSaveFolder" class="btn btn-default pull-right"><i
                            class="fa fa-save text-primary pdr5"></i> Lưu
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var file = $("#attFile").val();
        console.log(file);
        $("#btnChoose").click(function(){
            $("#attFile").trigger('click');
        });

        $("#attFile").change(function(evt){
            var files = evt.target.files[0];

        });
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
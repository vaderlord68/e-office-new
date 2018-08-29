@extends('page.master')
@section('body_content')
    @parent
    <div class="card">
        <div class="card-header">
            <div class="left-table-header">
                <a class="saveBtn-right-toolbar" href="#" id="submitEditNewsW76F2141">Lưu</a>
                <a class="cancelBtn-right-toolbar" href="#" onclick="history.back();">Quay lại</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="bootstrap-data-table_wrapper"
             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
            <form id="editNewsW76F2141" method="POST" action="/news/edit/save" enctype="multipart/form-data">
                <div class="row mgb5">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">{{Helpers::getRS("Tieu_de")}}</label>
                            <input type="text" name="titleW76F2141" id="titleW76F2141" class="input-md form-control"
                                   value="{{ $news->Title or '' }}">
                        </div>
                    </div>
                </div>

                <div class="row mgb5">
                    <div class="col-md-4">
                        <input type="file" name="imageW76F2141" id="imageW76F2141" class="form-control" style="height: 100px">
                    </div>
                    <div class="col-md-8">
                        <textarea type="text" id="remarkW76F2141" name="remarkW76F2141" class="form-control"
                                  style="height: 100px">{{ $news->Remark or '' }}</textarea>
                    </div>
                </div>

                <div class="row mgb5" style="margin-top: 10px">
                    <div class="col-md-2">
                        <label class="lbl-normal pdr0 ">{{Helpers::getRS("Chuyen_muc")}}c</label>
                    </div>
                    <div class="col-md-6">
                        {{--<select name="channelID" id="channelID" class="form-control">--}}
                        {{--<option value="">--</option>--}}
                        {{--@foreach($channelIDList as  $channelIDItem)--}}
                        {{--<option value="{{$channelIDItem->CodeID}}">{{$channelIDItem->CodeName}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                    </div>
                    <div class="col-md-2">
                        <label class="lbl-normal pdr0 ">{{Helpers::getRS("Tac_gia")}}</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="authorW76F2141" name="authorW76F2141" class="input-md form-control"
                               autocomplete="off" value="{{ $news->Author or '' }}">
                    </div>
                </div>

                <div class="row mgb5" style="margin-top: 10px">
                    <div class="col-md-2 ">
                        <div class="checkbox">
                            <label class="lbl-normal pdr0 "><input type="checkbox" id="status_idW76F2141"
                                          name="status_idW76F2141" {{isset($news->StatusID)&&!empty($news->StatusID)&&$news->StatusID == 1 ? 'checked' : '' }}>{{Helpers::getRS("Phat_hanh")}}</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="lbl-normal pdr0 ">{{Helpers::getRS("Ngay_phat_hanh")}}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="releaseDateW76F2141" name="releaseDateW76F2141">
                            <option value="">--</option>
                            {{--@foreach($docTyeList as $docTyeListitem)--}}
                            {{--<option value="{{$docTyeListitem['ID']}}" {{$cbDocTypeW76F2121 == $docTyeListitem['ID'] ? 'selected':''}}>--}}
                            {{--{{$docTyeListitem['Name']}}--}}
                            {{--</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                    <div class="col-md-4">
                        hgghghh
                    </div>
                </div>

                <div class="row mgb5" style="margin-top: 10px">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="lbl-normal pdr0 "><input type="checkbox" id="is_hotnewsW76F2141"
                                          name="is_hotnewsW76F2141" {{isset($news->IsHotNews)&&!empty($news->IsHotNews)&&$news->IsHotNews == 1 ? 'checked' : '' }}>{{Helpers::getRS("Tin_noi_bat")}}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="lbl-normal pdr0 "><input type="checkbox" id="is_ShowBestNewsW76F2141"
                                      name="is_ShowBestNewsW76F2141" {{isset($news->IsShowBestNews)&&!empty($news->IsShowBestNews)&&$news->IsShowBestNews == 1 ? 'checked' : '' }}>{{Helpers::getRS("Dang_tai_ban_tin_moi_nhat")}}</label>
                    </div>
                    <div class="col-md-2">
                        <label class=" pdr0 liketext  lbl-normal">{{Helpers::getRS("Thu_tu_hien_thi")}}</label>
                </div>
                    <div class="col-md-4">
                        <input type="text" name="orderNoW76F2141" class="form-control" id="orderNoW76F2141" placeholder=""
                               value="{{ $news->OrderNo or '' }}">
                    </div>
                </div>

                <div class="row mgb5" style="margin-top: 5px">
                    <div class="col-md-2">
                        <label class="lbl-normal pdr0 ">{{Helpers::getRS("Tu_khoa")}}</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="keywordW76F2141" class="form-control" id="keywordW76F2141" placeholder=""
                               value="{{ $news->Keywords or '' }}">
                    </div>
                </div>

                <div class="row mgb5" style="margin-top: 10px">
                    <div class="col-md-12">
                        <textarea type="text" id="contentW76F2141" name="contentW76F2141" class="input-md form-control" cols="10"
                                  rows="10">{{ $news->Content or '' }}</textarea>
                    </div>
                </div>

                <div class="row mgb5" style="margin-top: 10px">
                    <div class="col-md-2">
                        <label class="lbl-normal pdr0 ">Bài viết liên quan</label>
                    </div>
                    <div class="col-md-2">
                        <a class="saveBtn-right-toolbar" href="#" id="submitEditNewsW76F2141">Thêm</a>
                    </div>
                </div>

                <input type="hidden" name="CreateUserID" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '#contentW76F2141',
            });
            $('#submitEditNewsW76F2141').on('click', function (event) {
                $('#editNewsW76F2141').submit();
            })
        })
    </script>
@stop
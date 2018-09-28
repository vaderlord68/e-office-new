@extends('layouts.layout')

@section('toolbar')
    <a class="btn" href="{{url('/W76F2251/save')}}">
        <i class="fal fa-save text-primary mgr5 text-bold"></i>Lưu
    </a>

    <a class="btn" href="{{url('/W76F2251/savenext')}}">
        <i class="fal fa-arrow-circle-right mgr5 text-bold"></i>Nhập tiếp
    </a>

    <a class="btn" href="#">
        <i class="fal fa-reply text-orangered rotateY180 text-bold"></i>
         Chuyển xử lý
    </a>

    <a class="btn" href="{{url('/W76F2250')}}">
        <i class="fal fa-arrow-circle-left text-orangered text-bold" ></i>
         Quay lại
    </a>

    <a class="btn" href="{{url('/W76F2250')}}">
        <i class="fas fa-window-close text-orangered text-bold" ></i>
         Đóng
    </a>
@stop

@section('content')
    @parent
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header hide">
                    <strong>Cập nhật văn bản đến</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Số</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autofocus autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Đơn vị</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Nhóm văn bản</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Văn bản liên quan</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Cơ quan gửi</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Ngày nhận</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Độ khẩn cấp</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Độ bảo mật</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Ngày nhận</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <button class="btn btn-square btn-block btn-secondary" type="button"><i class="far fa-paperclip mgr5"></i>Đính kèm</button>
                            </div>
                            <div class="col-sm-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Trích yếu</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9" placeholder="Content.."></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

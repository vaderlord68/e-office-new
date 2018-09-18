@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header hide">
                    <strong>Environment</strong> setting
                </div>
                <form id="frmEnvironmentSetting" method="post" class="form-horizontal">
                    @foreach($arrEnv as $key => $value)
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                @include('admin.components.alert-dissmiss')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="lbl-normal-value" for="{{$key}}">{{$key}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="{{$key}}" name="{{$key}}" value="{{$value}}" readonly>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-sm btn-danger">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        $("#frmEnvironmentSetting").submit(function(evt){
            evt.preventDefault();
            showLoading();
            clearMessage();
            postMethod('{{url("/admin/W00F0003/update")}}',function(res){
                hideLoading();
                var data = JSON.parse(res);
                switch (data.status){
                    case 'SUCC':
                        showSuccessMessage('Data saved sucessfully');
                        //window.location.href = '{{url("/admin/database")}}';
                        break;
                    case 'ERROR':
                        showWarningMessage(data.message);
                        break;
                }
            }, $("#frmEnvironmentSetting").serialize())
        });
    </script>
@stop

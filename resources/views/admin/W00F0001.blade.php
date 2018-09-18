@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header hide">
                    <strong>Database</strong> setting
                </div>
                <form id="frmDatabaseSetting" method="post" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                @include('admin.components.alert-dissmiss')
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtServerName">Server name</label>

                            <div class="col-md-8">
                                <input type="text" id="txtServerName" name="txtServerName" class="form-control" autocomplete="off"
                                       placeholder="" autofocus value="{{$connection['host']}}" required>
                                <span class="help-block hide">Please enter your server name</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtUserName">User name</label>
                            <div class="col-md-8">
                                <input type="text" id="txtUserName" name="txtUserName" class="form-control" autocomplete="off"
                                       placeholder="" value="{{$connection['username']}}" required>
                                <span class="help-block hide">Please enter your username</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtPassword">Password</label>
                            <div class="col-md-8">
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" autocomplete="off"
                                       placeholder="" value="{{$connection['password']}}" required>
                                <span class="help-block hide">Please enter username</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="txtDatabaseName">Database name</label>
                            <div class="col-md-8">
                                <input type="text" id="txtDatabaseName" name="txtDatabaseName" class="form-control" autocomplete="off"
                                       placeholder="" value="{{$connection['database']}}" required>
                                <span class="help-block hide">Please enter database name</span>
                            </div>
                        </div>

                    </div>
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
        $("#frmDatabaseSetting").submit(function(evt){
            evt.preventDefault();
            showLoading();
            clearMessage();
            postMethod('{{url("/admin/W00F0001/update")}}',function(res){
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
            }, $("#frmDatabaseSetting").serialize())
        });
    </script>
@stop

<style>

</style>
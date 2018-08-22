@section('head')
    @include('page.head')
@show
    <div class="login-page">
        <div class="logo-container">
            <img class="logo" src="{{ URL::asset('media/logo.png') }}"/>
        </div>
        <?php
        $errorMessage = session('errorMessage');
        $successMessage = session('successMessage');
        session()->remove('errorMessage');
        session()->remove('successMessage');
        ?>
        @if (isset($errorMessage))
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">Error</span> {{$errorMessage}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if (isset($successMessage))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{$successMessage}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="form">
            <div class="form-title">HỆ THỐNG VĂN PHÒNG ĐIỆN TỬ</div>
            <div class="region"></div>
            <form class="login-form" method="post" action="/login/post">
                <input type="text" name="UserName" placeholder="User account"/>
                <input type="password" name="UserPassword" placeholder="Password"/>
                <div class="button-form">
                    <button type="submit">Đăng nhập</button>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </div>
{{--@stop--}}
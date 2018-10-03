<div class="container-fluid pdl10 pdr10">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 mgb10">
                @include("partials.message")
                @include("partials.alert-dismissible")
            </div>
        </div>
        @yield('content')
    </div>
</div>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
https://coreui.io/demo/#main.html
https://athemes.com/collections/free-bootstrap-admin-templates/
-->
<?php
$locale = Helpers::getLocale(); //return vi, en, zh, ja
?>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Diginet Corp.">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Admin Page</title>

    <!-- jQuery-UI -->
    <link href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/jQueryUI/jquery-ui.theme.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" media="all" rel="stylesheet" type="text/css"/>

    <!-- DatePicker -->
    <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Select2 -->
    <link href="{{ asset('plugins/select2-4.0.5/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Paramquery -->
    <link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.dev.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.ui.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/paramquery-3.3.4/themes/office/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <!-- Theme -->
    <link href="{{url('themes/@coreui/coreui/dist/css/coreui.css')}}" rel="stylesheet">
    <!-- Icons-->
    <link href="{{url('themes/@coreui/icons/css/coreui-icons.css')}}" rel="stylesheet">
    <link href="{{url('plugins/flag-icon-css/css/flag-icon.css')}}" rel="stylesheet">
    <link href="{{url('plugins/fontawesome-pro-5.0.13/web-fonts-with-css/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{url('plugins/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application-->
    {{--<link href="{{url('css/style.css')}}" rel="stylesheet">--}}
    <link href="{{url('plugins/pace-progress/css/pace.min.css')}}" rel="stylesheet">
    <link href="{{url('plugins/spinkit/spinkit.css')}}" rel="stylesheet">
    <link href="{{url('css/common.css')}}" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
@include('admin.layouts.header')
<div class="app-body">
    @include('admin.layouts.sidebar')
    <main class="main">
        <!-- Breadcrumb-->
        @include('admin.layouts.breadcrumb')
        @include('admin.layouts.container')
    </main>
    @include('admin.layouts.aside-menu')
</div>
<footer class="app-footer">
    <div>
        <a href="http://diginet.com.vn">Diginet Corp.</a>
        <span class="hide">&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto hide">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
    </div>
</footer>


<script type="text/javascript" src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/jQueryUI/jquery-ui.js') !!}"></script>
<script src="{{url('plugins/popper.js/dist/popper.min.js')}}"></script>
<script type="text/javascript" src="{!! asset('plugins/bootstrap/js/bootstrap.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/datepicker/date.js') !!}"></script>
<script type="text/javascript" src="{{asset("plugins/datepicker/locales/bootstrap-datepicker.$locale.js") }}"></script>
<script type="text/javascript" src="{{asset("plugins/select2-4.0.5/dist/js/select2.js") }}"></script>
<script type="text/javascript" src="{{asset("plugins/select2-4.0.5/dist/js/i18n/$locale.js") }}"></script>
<!-- Inputmask -->
<script type="text/javascript" src="{!! asset('plugins/input-mask/jquery.inputmask.bundle.js') !!}"></script>
<!-- Bootbox support confirmation dialog -->
<script type="text/javascript" src="{!! asset('plugins/bootstrap-bootbox/bootbox.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/paramquery-3.3.4/pqgrid.dev.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/paramquery-3.3.4/touch-punch/touch-punch.min.js') !!}"></script>
<script src="{{asset("plugins/paramquery-3.3.4/localize/pq-localize-$locale.js")}}" type="text/javascript"></script>
<!-- TinyMCE for editor -->
<script src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>
<!-- CKeditor for editor -->
<script src="{{ asset('plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>
<!-- CoreUI and necessary plugins-->
{{--<script src="{{url('plugins/pace-progress/pace.js')}}"></script>--}}
<script src="{{url('plugins/perfect-scrollbar/dist/perfect-scrollbar.js')}}"></script>
<script src="{{url('themes/@coreui/coreui/dist/js/coreui.js')}}"></script>
<!-- Plugins and scripts required by this view-->
{{--<script src="{{url('plugins/chart.js/dist/Chart.js')}}"></script>--}}
{{--<script src="{{url('plugins/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.js')}}"></script>--}}
{{--<script src="{{url('js/main.js')}}"></script>--}}
<script type="text/javascript" src="{!! asset('js/common.js') !!}"></script>
@yield('script')
</body>
<div id="spinLoading" class="loading hide">Loading&#8230;</div>
</html>


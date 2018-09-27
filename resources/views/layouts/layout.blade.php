<!DOCTYPE html>
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
    <title>eOffice</title>
    @include('layouts.head')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
@include('layouts.top')
<div class="app-body ">
    @include('layouts.sidebar')
    <main class="main">
        @include('layouts.breadcrumb')
        @include('layouts.container')
    </main>
    @include('layouts.aside-menu')
</div>
<footer class="app-footer hide">
    @include('layouts.footer')
</footer>
</body>
<script>
    //store resources for using of javascript
    var langText = JSON.parse('{!! json_encode(\Lang::get('message')) !!}');
    var lang = "{{\Helpers::getLang()}}";

    $(".nav-item").click(function (evt) {
        $(".dropdown").removeClass('show');
    });
//    $(".nav-link").hover(function(){
//        $(".dropdown").removeClass('show');
//        $(".dropdown-menu").removeClass('show');
//
//    });


    $(document).ready(function(){
        setTimeout(function() {

            $(".app-body").removeClass("hide").fadeIn(function(){
                resizePqGrid();
            });
        }, 300 );

    });

    $(window).resize(function(){
        setTimeout(function() {
            resizePqGrid();
        }, 200 );
    });


</script>
@yield('script')
<div id="spinLoading" class="loading hide">Loading&#8230;</div>
</html>
<style>
    @if (Helpers::getDevice() == 'DESKTOP')
    .main{
        margin-left: 0px !important;
    }
    @endif
</style>
<div id="divModalContainer"></div>
</html>

<script>
    //store resources for using of javascript
    var langText = JSON.parse('{!! json_encode(Lang::get('message')) !!}');
    var lang = "{{Helpers::getLang()}}";

</script>



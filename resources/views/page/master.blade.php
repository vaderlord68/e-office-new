<html>
<head>
    @section('head')
        @include('page.head')
    @show
</head>
@section('body')
    <body>
    @section("left")
        @include("page.left_panel")
    @show
    @section("right")
        @include("page.right_panel")
    @show
    @include('page.footer_custom')
    @show
    @section('footer')
    @show

    </body>
@show

<div id="divModalContainer"></div>
</html>

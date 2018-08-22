<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]>
<html class="no-js" lang=""> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>HỆ THỐNG VĂN PHÒNG ĐIỆN TỬ</title>
<meta name="description" content="HỆ THỐNG VĂN PHÒNG ĐIỆN TỬ">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{asset("favicon.ico")}}"/>
<?php
$locale = Helpers::getLocale();
\Debugbar::info(session()->all());
?>

<!-- jQuery -->
<script type="text/javascript" src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>

<!-- jQuery-UI -->
<link href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/jQueryUI/jquery-ui.theme.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{!! asset('plugins/jQueryUI/jquery-ui.js') !!}"></script>

<!-- Bootstrap -->
<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{!! asset('plugins/bootstrap/js/bootstrap.js') !!}"></script>

<!-- DatePicker -->
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{!! asset('plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/datepicker/date.js') !!}"></script>
<script type="text/javascript" src="{{asset("plugins/datepicker/locales/bootstrap-datepicker.$locale.js") }}"></script>

<!-- Select2 -->
<link href="{{ asset('plugins/select2-4.0.5/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{asset("plugins/select2-4.0.5/dist/js/select2.js") }}"></script>
<script type="text/javascript" src="{{asset("plugins/select2-4.0.5/dist/js/i18n/$locale.js") }}"></script>


<!-- Inputmask -->
<script type="text/javascript" src="{!! asset('plugins/input-mask/jquery.inputmask.bundle.js') !!}"></script>

<!-- Paramquery -->
<link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.dev.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.ui.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/themes/office/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{!! asset('plugins/paramquery-3.3.4/pqgrid.dev.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/paramquery-3.3.4/touch-punch/touch-punch.min.js') !!}"></script>
<script src="{{asset("plugins/paramquery-3.3.4/localize/pq-localize-$locale.js")}}" type="text/javascript"></script>

<!-- JS Tree -->
<link rel="stylesheet" href="{{ asset('plugins/jstree/dist/themes/default/style.css') }}" />
<script src="{{ asset('plugins/jstree/dist/jstree.js') }}"></script>
<!-- JS Context for content menu-->
<link rel="stylesheet" href="{{ asset('plugins/contextjs/context.standalone.css') }}" />
<script src="{{ asset('plugins/contextjs/context.js') }}"></script>
<!-- TinyMCE for editor -->
<script src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>
<!-- CKeditor for editor -->
<script src="{{ asset('plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>
<!-- popper supports tooltip -->
<script src="{{ asset('js/popper.js') }}"></script>
<!--start Theme -->
<link rel="stylesheet" href="{{ asset('css/dashboard/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/cs-skin-elastic.css') }}">
<link rel="stylesheet" href="{{ asset('scss/dashboard/style.css') }}">
<link href="{{ asset('css/dashboard/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
<script src="{{ asset('js/dashboard/plugins.js') }}"></script>
<script src="{{ asset('js/dashboard/main.js') }}"></script>
<!-- end Theme -->

<script src="{{ asset('js/module/bi/folder-manage.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{!! asset('js/custom.js') !!}"></script>

<!-- Diginet Plugins -->
<link rel="stylesheet" href="{{ asset('plugins/digi-menu/digi-menu.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/digi-contextmenu/digi-contextmenu.css') }}">
<script src="{{asset("plugins/digi-menu/digi-menu.js")}}"></script>
<script src="{{asset("plugins/digi-contextmenu/digi-contextmenu.js")}}"></script>

<!-- Diginet common -->
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<script src="{{asset("js/common.js")}}"></script>


<script>
    jQuery(document).ready(function () {
        context.init({
            fadeSpeed: 100,
            filter: function ($obj) {},
            above: 'auto',
            preventDoubleContext: true,
            compress: false,
        });
        var subMenus = [
            {
                text: "Click me",
                href: "/",
                target: "_blank"
            },
        ]
    });
</script>
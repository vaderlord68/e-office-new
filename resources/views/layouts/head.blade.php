<!-- *************************************CSS ****************************************************************-->
<!-- jQuery-UI -->
<link href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/jQueryUI/jquery-ui.theme.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
<!--- Bootstrap-->
<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" media="all" rel="stylesheet" type="text/css"/>

<!-- Theme + fonts-->
<link href="{{url('themes/@coreui/coreui/dist/css/coreui.css')}}" rel="stylesheet">
<link href="{{url('themes/@coreui/icons/css/coreui-icons.css')}}" rel="stylesheet">
<link href="{{url('plugins/flag-icon-css/css/flag-icon.css')}}" rel="stylesheet">
<link href="{{url('plugins/fontawesome-pro-5.0.13/web-fonts-with-css/css/fontawesome-all.css')}}" rel="stylesheet">
<link href="{{url('plugins/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

<!-- Full calendar-->
<link href="{{ asset('plugins/fullcalendar-3.9.0/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('/plugins/fullcalendar-3.9.0/scheduler.min.css') }}" rel="stylesheet">
<!-- DatePicker -->
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
<!-- Select2 -->
<link href="{{ asset('plugins/select2-4.0.5/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

<!-- Paramquery -->
<link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.dev.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/themes/bootstrap/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/pqgrid.ui.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/paramquery-3.3.4/themes/office/pqgrid.css') }}" media="all" rel="stylesheet" type="text/css"/>

<!-- DevExtreme 18.1 -->
<link href="{{ asset('plugins/devextreme-18.1/css/dx.common.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/devextreme-18.1/css/dx.material.blue.light.css') }}" media="all" rel="stylesheet" type="text/css"/>

<!-- JS Tree -->
<link href="{{ asset('plugins/jstree/dist/themes/default/style.css') }}" rel="stylesheet" />
<!-- JS Context for content menu-->
<link href="{{ asset('plugins/contextjs/context.standalone.css') }}" rel="stylesheet" />

<!--Lightbox -->
<link href="{{ asset('plugins/lightbox/ekko-lightbox.css') }}" rel="stylesheet" >
<!-- Spin + progress -->
<link href="{{asset('plugins/pace-progress/css/pace.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/spinkit/spinkit.css')}}" rel="stylesheet">
<!-- customize-->
<link href="{{asset('css/common.css')}}" rel="stylesheet">
<link href="{{asset('css/affects.css')}}" rel="stylesheet">
<link href="{{url('css/style.css')}}" rel="stylesheet">

<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************************************************************************************** -->
<!-- *************************************JAVASCRIPT ****************************************************************-->

<!-- jQuery -->
<script type="text/javascript" src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
<!-- CoreUI and necessary plugins-->
{{--<script type="text/javascript" src="{{asset('plugins/pace-progress/pace.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/@coreui/coreui/dist/js/coreui.js')}}"></script>
<!-- Jquery UI -->
<script type="text/javascript" src="{!! asset('plugins/jQueryUI/jquery-ui.js') !!}"></script>
<!-- Popper supports tooltip -->
<script type="text/javascript" src="{{url('plugins/popper.js/dist/popper.min.js')}}"></script>
<!-- Bootstrap + bootstrap-confirmation -->
<script type="text/javascript" src="{!! asset('plugins/bootstrap/js/bootstrap.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/bootstrap-confirm/bootstrap-confirmation.js') !!}"></script>
<!-- Moment -->
<script type="text/javascript" src="{!! asset('plugins/moment/moment.js') !!}"></script>
<!-- Full calendar-->
<script src="{{asset("plugins/fullcalendar-3.9.0/fullcalendar.js")}}"></script>
<script src="{{asset("plugins/fullcalendar-3.9.0/locale-all.js")}}"></script>
<script src="{{asset("plugins/fullcalendar-3.9.0/scheduler.min.js")}}"></script>
<!-- DatePicker -->
<script type="text/javascript" src="{!! asset('plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/datepicker/date.js') !!}"></script>
<script type="text/javascript" src="{{asset("plugins/datepicker/locales/bootstrap-datepicker.$locale.js") }}"></script>
<!-- Bootstrap select 2  -->
<script type="text/javascript" src="{{asset("plugins/select2-4.0.5/dist/js/select2.js") }}"></script>
<script type="text/javascript" src="{{asset("plugins/select2-4.0.5/dist/js/i18n/$locale.js") }}"></script>
<!-- Inputmask -->
<script type="text/javascript" src="{!! asset('plugins/input-mask/jquery.inputmask.bundle.js') !!}"></script>
<!-- Bootbox support confirmation dialog -->
<script type="text/javascript" src="{!! asset('plugins/bootstrap-bootbox/bootbox.js') !!}"></script>
<!-- Paramquery-->
<script type="text/javascript" src="{!! asset('plugins/paramquery-3.3.4/pqgrid.dev.js') !!}"></script>
<script type="text/javascript" src="{!! asset('plugins/paramquery-3.3.4/touch-punch/touch-punch.min.js') !!}"></script>
<script src="{{asset("plugins/paramquery-3.3.4/localize/pq-localize-$locale.js")}}" type="text/javascript"></script>

<!-- DevExtreme 18.1 -->
<script src="{{asset("plugins/devextreme-18.1/js/dx.all.js")}}" type="text/javascript"></script>


<!-- JS Tree -->
<script src="{{ asset('plugins/jstree/dist/jstree.js') }}"></script>
<!-- JS Context for content menu-->
<script src="{{ asset('plugins/contextjs/context.js') }}"></script>
<!-- TinyMCE for editor -->
<script type="text/javascript" src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>
<!-- CKeditor for editor -->
<script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<!-- Validation JS-->
<script src="{{ asset('plugins/validation-js/validate.min.js') }}"></script>
<!--Lightbox -->
<script src="{{ asset('plugins/lightbox/ekko-lightbox.js') }}"></script>
<!--Image Tool supports image resizeing -->
<script src="{{ asset('plugins/jssor-slider/ImageTools.js') }}"></script>

<!-- Plugins and scripts required by this view-->
{{--<script src="{{url('plugins/chart.js/dist/Chart.js')}}"></script>--}}
{{--<script src="{{url('plugins/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.js')}}"></script>--}}
{{--<script src="{{url('js/main.js')}}"></script>--}}

<!-- Diginet Plugins -->
<script src="{{asset("plugins/digi-menu/digi-menu.js")}}"></script>
<script src="{{asset("plugins/digi-contextmenu/digi-contextmenu.js")}}"></script>

<script src="{{asset("js/common.js")}}"></script>




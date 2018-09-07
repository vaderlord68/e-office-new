@extends('page.master')
@section('body_content')
    @parent
    <div class="rơw">
        <div class="col-sm-3">
            @include('system.module.W76.W76F2150.components.Sidebar')
        </div>
        <div class="col-sm-9">
            @include('system.module.W76.W76F2150.components.Wrapper')
        </div>

    </div>
@stop

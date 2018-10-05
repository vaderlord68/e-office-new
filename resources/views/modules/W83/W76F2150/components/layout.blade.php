@extends('layouts.layout')
@section('content')
    @parent
    <div class="row">
        <div class="col-md-3">
            @include('modules.W83..W76F2150.components.Sidebar')
        </div>
        <div class="col-md-9">
            @include('modules.W83..W76F2150.components.Wrapper')
        </div>
    </div>

@stop
<style>
    /*.document .document-sidebar{*/
        /*height: calc(100%);*/
    /*}*/
    /*.document .document-content{*/
        /*height: calc(100%);*/
    /*}*/
</style>



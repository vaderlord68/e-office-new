@extends('layouts.layout')
@section('content')
    @parent
    <div class="document">
        <div class="rơw">
            <div class="col-sm-3 pdl5 pdr5">
                @include('system.module.W76.W76F2150.components.Sidebar')
            </div>
            <div class="col-sm-9  pdl5 pdr5">
                @include('system.module.W76.W76F2150.components.Wrapper')
            </div>

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



@extends('layouts.layout')
@section('content')
    <section class="task-section">
        <div class="row">
            <div class="col-sm-3">
                @include('modules.W76.W76F3000.components.sidebarW76')
            </div>
            <div id="" class="col-sm-8">
                @include('modules.W76.W76F3000.components.Account')
            </div>
            {{--<div class="col-sm-7">--}}
                {{--@yield('w84f1000')--}}
            {{--</div>--}}

        </div>
    </section>
@stop

@extends('layouts.layout')
@section('content')
    <section class="task-section">
        <div class="row">
            <div class="col-sm-2">
                @include('modules.W84.W84F1000.components.sidebarW84')
            </div>
            <div class="col-sm-3">
                @include('modules.W84.W84F1000.components.TaskList')
            </div>
            <div class="col-sm-7">
                @yield('w84f1000')
            </div>

        </div>
    </section>
@stop

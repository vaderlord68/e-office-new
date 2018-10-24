@extends('layouts.layout')
@section('content')
    <section class="task-section">
        <div class="row">
            <div class="col-sm-2">
                @include('modules.W84.W84F2000.components.sidebarW84')
            </div>
            <div class="col-sm-10">
                @yield('w84f2000')
            </div>

        </div>
    </section>
@stop

@extends('layouts.layout')
@section('content')
    <section class="news-view">
        <div class="row">
            <div class="col-sm-4">
                <div class="">
                    @include('modules.W86.W86F1000.components.OrganizationList')
                </div>
            </div>
            <div id="employeeListW86F1000" class="col-sm-8 news-box" style="height: 300px;">
            </div>

        </div>
    </section>
@stop

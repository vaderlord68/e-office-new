@extends('page.master')
@section('body_content')
    @parent
    <div class="row">
        <div class="col-sm-8">
            <img src="{{asset('media/bg-test.png')}}" class="pull-left"  alt="">
        </div>
        <div class="col-sm-4">
            <img src="{{asset('media/bg-test02.png')}}" class="pull-right" alt="">
        </div>
    </div>

@stop
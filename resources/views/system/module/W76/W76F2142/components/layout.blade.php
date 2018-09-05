@extends('page.master')
@section('body_content')
    @parent
    <section class="news-view">
        <div class="rơw">
            <div class="col-sm-3 news-box">
                <div class="well">
                    @include('system.module.W76.W76F2142.components.ChannelList')
                    @include('system.module.W76.W76F2142.components.LastestNewsList')
                </div>
            </div>
            <div class="col-sm-9 news-box" style="height: 300px;">
                @include('system.module.W76.W76F2142.components.Wrapper')
            </div>

        </div>
    </section>
@stop

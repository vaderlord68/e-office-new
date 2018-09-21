@extends('system.module.W76.W76F2142.components.layout')
@section('news-wrapper')
    <label class="lbl-normal-value">{{Helpers::getRS("Tin_tuc_noi_bo")}}</label>
    <span class="pull-right">
            <a href="{{url('/w76f2141/edit?newsID='.$newsRow->NewsID)}}" title="{{Helpers::getRS("Sua")}}"><i class="fa fa-edit mgr10 text-yellow cursor-pointer fs20 mgt5"></i></a>
        </span>
    <div class="">
        <label class="label font cut-detail">{{$newsRow->Title}}</label>
        <div class="row">
            <div class="col-xs-2 pd10">
                <a><i class="fa fa-folder left"></i>
                    {{$newsRow->CodeName or ''}}
                </a>
            </div>
            <div class="col-xs-2 pd10">
                <a><i class="fa fa-eye left"></i>
                    {{$newsRow-> ViewCount or ''}}
                </a>{{Helpers::getRS("Luot_xem")}}
            </div>
            <div class="col-xs-3 pd10">
                <a><i class="fa fa-calendar left"></i>
                    {{$newsRow-> ReleaseDate or ''}}
                </a>
            </div>
            <div class="col-xs-2 pd10">
                <a><i class="fa fa-user left"></i>
                    {{$newsRow-> Author or ''}}
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a>
                    {!! $newsRow-> Content or '' !!}
                </a>
            </div>
        </div>
    </div>
    <div class="well pd">
        <label class="lbl-normal-value">{{Helpers::getRS("Tin_lien_quan")}}</label>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @foreach($newRowDetail as $newDetail)
                    <li><a>{{$newDetail-> Title or ''}}</a></li>
                @endforeach
            </div>
        </div>
    </div>
@stop
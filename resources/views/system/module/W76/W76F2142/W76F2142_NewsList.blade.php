@extends('system.module.W76.W76F2142.components.layout')
@section('news-wrapper')
    <label class="labelb">{{Helpers::getRS("Tin_tuc_noi_bo")}}</label>
    <div class="well">
        @foreach($newsList as $newsRow)
            <?php
            $newsID = $newsRow->NewsID;
            $detailURL = url('/w76f2142/channel/?task=detail') . '&newsID=' . $newsID;
            ?>
            <div class="row pd5">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="row mgb5">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="{{$detailURL}}"><img src="{{$newsRow->Image or ''}}" class="container-img"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pdl10">
                    <div class="row font">
                        <div class="col-xs-12">
                            <a href="{{$detailURL}}" class="nav-link cut-title">
                                {{$newsRow->Title or ''}}
                            </a>
                        </div>
                    </div>
                    <div class="row mgl5">
                        <div class="col-xs-2 pdl10 ">
                            <a><i class="fa fa-eye left"></i>
                                {{$newsRow-> ViewCount or ''}}
                            </a>{{Helpers::getRS("Luot_xem")}}
                        </div>
                        <div class="col-xs-2 pdl10">
                            <a><i class="fa fa-calendar left"></i>
                                {{$newsRow-> ReleaseDate or ''}}
                            </a>
                        </div>
                    </div>
                    <div class="row mgl5">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cut-text">
                            <a>
                                {!! $newsRow-> Content or '' !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
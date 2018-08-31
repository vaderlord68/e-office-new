@extends('system.module.W76.W76F2142.components.layout')
@section('news-wrapper')
    <div class="well">
        <label class="label">{{Helpers::getRS("Tin_tuc")}}</label>
        @foreach($newsList as $newsRow)
            <?php
            $newsID = $newsRow->NewsID;
            $detailURL = url('/w76f2142/channel/?task=detail') . '&newsID=' . $newsID;
            ?>
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <a href="{{$detailURL}}"><img src="{{$newsRow->Image or ''}}"/></a>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{$detailURL}}" class="nav-link">
                                {{$newsRow->Title or ''}}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 ">
                            <a><i class="fa fa-calendar left"></i>
                                {{$newsRow-> ReleaseDate or ''}}
                            </a>
                        </div>
                        <div class="col-xs-2 pdl10">
                            <a><i class="fa fa-calendar left"></i>
                                {{$newsRow-> ReleaseDate or ''}}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a>
                                {{$newsRow-> Content or ''}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
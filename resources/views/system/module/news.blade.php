@extends('page.master')
@section('body_content')
    @parent
    <?php
    $channelIDList = $data['channelIDList'];
    $bestNews = $data['IsShowBestNews'];
    ?>

    <section class="news-view">
        <div class="rơw">
            <div class="col-sm-3 news-box">
                <div class="well">
                    <div class="well-right category">
                        <span class="nav-link title-category">{{Helpers::getRS("Chuyen_muc")}}</span>
                        <div class="list-category">
                            <ul class="nav nav-pills flex-column">
                                <?php

                                \Debugbar::info($channelIDList);
                                ?>

                                @foreach($channelIDList as  $row)
                                    <li class="list-group" name="channelIDshowNews" id="channelIDshowNews">
                                        <a class="nav-link" href="{{url('/news').'/list/?channelID='.$row->CodeID}}">
                                            {{$row->CodeName or ''}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="well-right best-news">
                        <span class="nav-link title-category">{{Helpers::getRS("Tin_moi_nhat")}}</span>
                        <div class="list-category">
                            <ul class="nav nav-pills flex-column">
                                @foreach($bestNews as  $row)
                                    <li class="list-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="{{$row->Image or ''}}"/>
                                            </div>
                                            <div class="col-sm-8">
                                                <a class="nav-link">
                                                    {{$row->Title or ''}}
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 news-box" style="height: 300px;">
                <div class="well">
                    <label class="label">{{Helpers::getRS("Tin_tuc")}}</label>
                    @foreach($newsList as $newsRow)
                        <?php
                            $newsID = $newsRow->NewsID;
                            $detailURL = url('/news/detail/').'?newsID='.$newsID;
                        ?>
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="{{$detailURL}}"><img src="{{$newsRow->Image or ''}}"/></a>
                            </div>
                            <div class="col-sm-7">
                                <a href="{{$detailURL}}" class="nav-link">
                                    {{$newsRow->Title or ''}}
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $("#channelIDshowNews").change(function () {
                console.log('test');
                postMethod('{{url("/news/view")}}', function (data) {
                    console.log('sdfds');
//                    $("#grdW76F2140_SelectNews").pqGrid('option','dataModel.data', JSON.parse(data) );
//                    $("#grdW76F2140_SelectNews").pqGrid('refreshDataAndView');
                }, {channelIDshowNews: $("#channelIDshowNews").val(), _token: '{{csrf_token()}}'});
            });
        });
    </script>

@stop


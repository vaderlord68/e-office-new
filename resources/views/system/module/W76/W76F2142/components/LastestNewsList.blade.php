<div class="well-right best-news hide">
    <span class="nav-link title-category">{{Helpers::getRS("Tin_moi_nhat")}}</span>
    <div class="list-category">
        <ul class="nav nav-pills flex-column">
            @foreach($lastestNewsList as  $row)
                <?php
                $newsID = $row->NewsID;
                $detailURL = url('/w76f2142/lastest/?task=detail').'&newsID='.$newsID;
                ?>
                <li class="list-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{$detailURL}}"><img src="{{$row->Image or ''}}"/></a>
                        </div>
                        <div class="col-sm-8">
                            <a href="{{$detailURL}}" class="nav-link">
                                {{$row->Title or ''}}
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>


<div class="news">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-newspaper-o mgr10"></i>{{Helpers::getRS("Tin_moi_nhat")}}
        </div>

    </div>
    <ul class="list-group">
        @foreach($lastestNewsList as  $row)
            <?php
            $newsID = $row->NewsID;
            $detailURL = url('/w76f2142/lastest/?task=detail').'&newsID='.$newsID;
            ?>
            <li class="list-group">
                <div class="row pdt5">
                    <div class="col-sm-4">
                        <a href="{{$detailURL}}"><img src="{{$row->Image or ''}}"/></a>
                    </div>
                    <div class="col-sm-8">
                        <a href="{{$detailURL}}" class="nav-link">
                            {{$row->Title or ''}}
                        </a>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>

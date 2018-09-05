
<div class="news">
    <div class="card">
        <div class="card-header bld">
            <i class="fa fa-newspaper-o bld mgr10"></i>{{Helpers::getRS("Tin_moi_nhat_U")}}
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
                    <div class="col-sm-8 cut-latest">
                        <a href="{{$detailURL}}" class="nav-link">
                            {{$row->Title or ''}}
                        </a>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>

<div class="well-right category hide">
    <span class="nav-link title-category">{{Helpers::getRS("Chuyen_muc")}}</span>
    <div class="list-category">
        <ul class="nav nav-pills flex-column">
            <?php

            \Debugbar::info($channelIDList);
            ?>

            @foreach($channelIDList as  $row)
                <li class="list-group" name="channelIDshowNews" id="channelIDshowNews">
                    <a class="nav-link" href="{{url('/w76f2142/channel').'/?task=list&channelID='.$row->CodeID}}">
                        {{$row->CodeName or ''}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="news mgb10">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list mgr10"></i>{{Helpers::getRS("Chuyen_muc")}}
        </div>

    </div>
    <ul class="list-group">
        @foreach($channelIDList as  $row)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{url('/w76f2142/channel').'/?task=list&channelID='.$row->CodeID}}">
                    <i class="fa fa-arrow-circle-right mgr10"></i>{{$row->CodeName or ''}}
                    <span class="badge badge-primary bg-yellow badge-pill pull-right">12</span>
                </a>
            </li>
        @endforeach

    </ul>
</div>




<div class="newslist">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-newspaper mgr10"></i>{{Helpers::getRS("Tin_moi_nhat_U")}}
        </div>
    </div>
    <ul class="list-group">

        @foreach($lastestNewsList as  $row)
            <?php
            $newsID = $row->NewsID;
            $detailURL = url('/w76f2142/lastest/?task=detail').'&newsID='.$newsID;
            ?>
            <li class="list-group">
                <div class="row pdb10">
                    <div class="col-sm-5 pdt10">
                        <a class="pdl10" href="{{$detailURL}}"><img class="latest-img" src="{{$row->Image}}"/></a>
                    </div>
                    <div class="col-sm-7 pdt10">
                        <a class="cut-latest" href="{{$detailURL}}">
                            {{$row->Title or ''}}
                        </a>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>

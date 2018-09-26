
<div class="news mgb10">
    <div class="card">
        <div class="card-header bld">
            <i class="fa fa-list bld mgr10"></i>{{Helpers::getRS("Chuyen_muc_U")}}
        </div>

    </div>
    <ul class="list-group">
        @foreach($channelIDList as  $row)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{url('/W76F2142/channel').'/?task=list&channelID='.$row->CodeID}}">
                    <i class="fa fa-arrow-circle-right mgr10"></i>{{$row->CodeName or ''}}
                    {{--<span class="badge badge-primary bg-yellow badge-pill pull-right">12</span>--}}
                </a>
            </li>
        @endforeach

    </ul>
</div>




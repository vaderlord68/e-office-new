@foreach($accountList as $accountRow)
    <?php
    $employeeID = $accountRow->EmployeeID;
    $detailURL = url('/W76F3001/edit') . '?employeeID=' . $employeeID;
    ?>
    <div class="col-sm-4 col-md-4 col-lg-4 col-sx-4" style="padding-bottom: 5px">
        <div class="card-account">
            <div class="">
                <div class="row mgb5">
                    <div class="col-10 col-sm-10 col-md-10">
                        <label style="font-weight: bold;font-size: 14px">
                            <a href="{{$detailURL}}">{{$accountRow->UserName or ''}}</a>
                        </label>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2">
                        <a class="fas fa-trash-alt text-danger">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="row mgb5">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="{{$detailURL}}"><img src="{{$accountRow->Thumnail or ''}}"
                                                              class="account-img"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pdl15">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a class="pd0" href="{{$detailURL}}">
                                {{$accountRow->UserID or ''}}
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a class="pd0" href="{{$detailURL}}">
                                {{$accountRow->OrguniNname or ''}}
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a class="pd0" href="{{$detailURL}}">
                                {{$accountRow->PositionName or ''}}
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a class="pd0" style="font-size: 10px" href="{{$detailURL}}">
                                {{$accountRow->Email or ''}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
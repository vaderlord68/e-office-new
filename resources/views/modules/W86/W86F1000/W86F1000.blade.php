<form id="frmSearchW86F1000" name="frmSearchW86F1000" method="post">
    {{ csrf_field() }}
    <div id="W86F1000">
        <div class="row pdb10">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <input type="text" class="form-control" id="txtDocNo" name="txtSearchValueW86F1000"
                       id="txtSearchValueW86F1000" autocomplete="off" placeholder="{{ Helpers::getRS('Tim_kiem_nhan_vien') }}">
            </div>
            <input type="hidden" name="orgunitID" value="{{ $orgunitID or ''}}"/>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-left">
                <button  class="btn btn-default smallbtn mgr5 fa fa-search text-yellow" id="searchW86F1000">
                </button>
            </div>
        </div>
        @foreach($employeeList as $item)
            <div class="well-employee pdl15 pdt10">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <div class="row mgb5">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a><img src="{{$item->Image }}" class="employee-img"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 pdl15">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <a id="employeeNameW86F1000" class="pd0 cut-title">
                                    {{$item->EmployeeName or ''}}
                                </a>
                                <a id="positionNameW86F1000" class="pd0 nav-link">
                                    {{$item->PositionName or ''}}
                                </a>
                                <a id="orgUnitNameW86F1000" class="pd0 nav-link">
                                    {{$item->OrgUnitName or ''}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pdl15">
                    <div class="col-sm-3">
                        <div class="row ">
                            <label>{{Helpers::getRS("Dien_thoai_cong_ty")}}</label>
                        </div>
                        <div class="row mgb5">
                            <label id="mobilePhoneW86F1000" class="text-primary">{{$item->WorkPhone or ''}}
                            </label>
                        </div>
                        <div class="row ">
                            <label>{{Helpers::getRS("Dien_thoai_di_dong")}}</label>
                        </div>
                        <div class="row mgb5">
                            <label id="mobilenoW86F1000" class="text-primary">{{$item->MobilePhone or ''}}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row ">
                            <label>{{Helpers::getRS("Email_van_phong")}}</label>
                        </div>
                        <div class="row mgb5">
                            <label id="mailW86F1000" class="text-primary">{{$item->Email or ''}}
                            </label>
                        </div>
                        <div class="row ">
                            <label>{{Helpers::getRS("Email_ca_nhan")}}</label>
                        </div>
                        <div class="row mgb5">
                            <label id="mail2W86F1000" class="text-primary">{{$item->Email2 or ''}}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row ">
                            <label>Facebook</label>
                        </div>
                        <div class="row ">
                            <label id="custom01W86F1000" class="text-primary">{{$item->Custom01 or ''}}
                            </label>
                        </div>
                        <div class="row ">
                            <label>Skype</label>
                        </div>
                        <div class="row ">
                            <label id="custom02W86F1000" class="text-primary">{{$item->Custom02 or ''}}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>
@endforeach

<script>

    $('#frmSearchW86F1000').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: '{{ url("/W86F1000/employeeList") }}',
            data: $('#frmSearchW86F1000').serialize(),
            success: function (data) {
                console.log(data);
                $('#employeeListW86F1000').html(data);
            }
        });
    });

</script>




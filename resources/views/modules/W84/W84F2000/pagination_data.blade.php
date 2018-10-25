<div class="row ">
    <div class="col-sm-4 ">
        <?php echo $projectList->links(); ?>
    </div>

</div>
<div class="row">
    <?php foreach ($projectList as $user): ?>

    <div class="col-sm-12 col-md-6 col-lg-6 col-sx-6">
        <div class="card card-accent-primary" style="min-height:260px">

            <div class="card-body">

                <div class="row mgb5">
                    <div class="col-12 col-sm-9 col-md-9">
                        <label style="font-weight: bold;font-size: 20px"> <?php echo $user->ProjectName; ?></label>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <button class="btn btn-sm btn-block btn-info active pull-right" style="width: auto"
                                type="button" aria-pressed="true">
                            <?php echo $user->StatusName; ?>
                        </button>
                    </div>
                </div>

                <div class="row mgb5">

                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="btn-group btn-group-sm pull-right" role="group" aria-label="Basic example">
                            <button type="button" style="width: auto" id="btnDetail"
                                    onclick="goForm('view','{{$user->ProjectID}}')" class="btn  btn-light">Chi tiết
                            </button>
                            <button type="button" style="width: auto" id="btnEdit"
                                    onclick="goForm('edit','{{$user->ProjectID}}')" class="btn  btn-light">Sửa
                            </button>
                            <button type="button" style="width: auto" onclick="funcDelete('{{$user->ProjectID}}')"
                                    class="btn  btn-light">Xóa
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-sm-6 col-md-3">

                        <label style="font-weight: bold">TỪ NGÀY</label>
                        <br>
                        <label class="label"><?php echo date("d/m/Y", strtotime(str_replace('/', '-', $user->StartDate))); ?></label>


                    </div>
                    <div class="col-6 col-sm-6 col-md-3">

                        <label style="font-weight: bold">TỚI NGÀY</label>
                        <br>
                        <label class="label"><?php echo date("d/m/Y", strtotime(str_replace('/', '-', $user->Deadline))); ?></label>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <label style="font-weight: bold">THỜI GIAN</label>
                        <br>
                        <label class="label">

                            {{$user->ManDay}}
                        </label>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <label class=" text-primary">Thành viên</label>

                        {{--</div>--}}
                        {{--<div class="row">--}}
                        {{--<div class=" col-sx-6 col-md-12 ">--}}
                        <?php
                        $memberList = $user->memberList;
                        ?>
                        <div class="avatars-stack ">
                            @foreach($memberList as  $member)
                                <div class="avatar avatar-xs">
                                    <img class="img-avatar" src="{{$member->Thumnail}}"
                                         alt="{{$member->EmployeeName}}">
                                </div>
                            @endforeach
                        </div>
                        {{--</div>--}}

                    </div>
                </div>
                <div class="row " style="margin-top: 10px">
                    <div class="col-md-12">
                        <label class="remark">
                            {{$user->Remark}}
                        </label>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sx-12 col-md-6">
                        <label>Người phụ trách:</label>
                        <label style="font-weight: bold" class="mgl5"> <?php echo $user->EmployeeName; ?></label>
                    </div>
                    <div class="col-sx-12 col-md-6">
                        <label>Người tạo:</label>
                        <label style="font-weight: bold" class="mgl5"><?php echo $user->CreateUserName; ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
    function fetch_data(page) {

        $.ajax({
            url: "/W84F2000/pagination?page=" + page,
            success: function (data) {

                $(".paging_data").html(data);
            }
        });
    }

    function goForm(task, projectID) {
        window.location.href = '{{url("W84F2001")}}' + "/" + task + "?projectID=" + projectID;
    }

    function funcDelete(projectID) {
        ask_delete(function () {
            $.ajax({
                url: '{{url('/W84F2000/check')}}' + '?projectID=' + projectID + '&_token={{csrf_token()}}',
                method: 'POST',
//                data: {'projectID':projectID},
                success: function (resp) {
                    if (resp != '') {
                        if (resp[0]["Status"] == '0') {
                            $.ajax({
                                url: '{{url('/W84F2000/delete')}}' + '?projectID=' + projectID + '&_token={{csrf_token()}}',
                                method: 'POST',
//                                data: {'projectID':projectID},
                                success: function (resp) {
                                    if (resp == '0') {
                                        delete_not_ok();
                                    } else {
                                        delete_ok();
//                                        var page = $(this).attr('href').split('page=')[1];
                                        fetch_data(1);
                                    }
                                }
                            });
                        } else {
                            delete_not_ok('', '', resp[0]["Message"]);
                        }


                    }
                }
            });
        });
    }

    $('.pagination a').on('click', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });
</script>






<section>
    <div class="task-list" id="taskListW84F1000">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="toolbar_TaskList">
                </div>
            </div>
        </div>
        <form id="frm_TasList" name="frm_TasList" method="post">
            <div class="row pdt5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" class="form-control" id="txtSearchValueW84TaskList" name="txtSearchValueW84TaskList" autocomplete="off"
                           placeholder="{{ Helpers::getRS('Tim_kiem')}}">
                </div>
            </div>
            @foreach($taskList as $taskRow)
                <?php
                $TaskID = $taskRow->TaskID;
                $detailURL = url('/W84F1000/edit') . '?TaskID=' . $TaskID;
                ?>
                <div class="well-employee pdl15 pdt5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="{{$detailURL}}" id="employeeNameW86F1000" class="pdl15 nav-link text-black" style="font-size: 16px;">
                                {{$taskRow->EmployeeName or ''}}
                            </a>
                            <a href="{{$detailURL}}" id="positionNameW86F1000" class="pdt5 nav-link text-black">
                                {{$taskRow->TaskName or ''}}
                            </a>
                            <a href="{{$detailURL}}" id="orgUnitNameW86F1000" class="pdt5 nav-link">
                                {{$taskRow->Deadline or ''}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
</section>

<script>
    $(document).ready(function () {
        $("#toolbar_TaskList").digiMenu({
                showText: true,
                buttonList: [
                    {
                        ID: "btnAdd_TaskList",
                        icon: "fa fa-plus",
                        title: "{{Helpers::getRS('Tao_cong_viec')}}",
                        cls: "btn btn-info",
                        enable: true,
                        hidden: function () {
                            return false;
                        },
                        type: "button",
                        render: function (ui) {
                        },
                        postRender: function (ui) {
                            console.log(ui);
                            ui.$btn.click(function () {
                            window.location.href = "{{url('/W84F1000/add')}}";
                            });
                        }
                    }
                ]
            }
        );
    });

    $('#frm_TasList').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: '{{ url("/W84F1000/TaskList") }}',
            data: $('#frm_TasList').serialize(),
            success: function (data) {
                console.log(data);
                $('#taskListW84F1000').html(data);
            }
        });
    });

</script>

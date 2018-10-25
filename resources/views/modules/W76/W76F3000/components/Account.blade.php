<section>
    <div class="account-list" id="accountW76F3000">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="toolbar_account">
                </div>
            </div>
        </div>
        <form id="frm_account" name="frm_account" method="post">
            <div class="row pdt5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{--<input type="text" class="form-control" id="txtSearchValueW84TaskList" name="txtSearchValueW84TaskList" autocomplete="off"--}}
                           {{--placeholder="{{ Helpers::getRS('Tim_kiem')}}">--}}
                </div>
            </div>

                <div class="well-employee pdl15 pdt5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="" id="employeeNameW86F1000" class="pdl15 nav-link text-black" style="font-size: 16px;">

                            </a>
                            <a href="" id="positionNameW86F1000" class="pdt5 nav-link text-black">

                            </a>
                            <a href="" id="orgUnitNameW86F1000" class="pdt5 nav-link">
                            </a>
                        </div>
                    </div>
                </div>

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

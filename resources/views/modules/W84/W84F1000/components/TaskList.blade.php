<section>
    <form>

    </form>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="toolbar_TaskList">
            </div>
        </div>
    </div>
    <form id="frm_TasList" name="frm_TasList" method="post">
        <div class="row pdt10">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input type="text" class="form-control" id="txtDocNo" name="txtDocNo" autocomplete="off"
                       placeholder="{{ Helpers::getRS('Tim_kiem')}}">
            </div>
        </div>
        <div class="well-employee pdl15 pdt10">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a id="employeeNameW86F1000" class="pdl15 cut-title">
                        Nguyễn Thị Kim Thoa
                    </a>
                    <a id="positionNameW86F1000" class="pdt5 nav-link">
                        Quy trình quản lý hợp đồng lao động
                    </a>
                    <a id="orgUnitNameW86F1000" class="pdt5 nav-link text-danger">
                        Hạn xử lý 12/12/2018
                    </a>
                </div>
            </div>
        </div>
    </form>
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
                            {{--console.log(ui);--}}
                            {{--ui.$btn.click(function () {--}}
                            {{--window.location.href = "{{url('/W76F2141/add')}}";--}}
                            {{--});--}}
                        }
                    }
                ]
            }
        );
    });
</script>

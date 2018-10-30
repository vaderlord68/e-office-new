@extends('modules.W76.W76F3002.components.layout')
@section('w76f3002')
    <section>
        <?php
        $imageW76 = asset('/media/no-photo.jpg');
        ?>
        <div class="task-list">
            <div class="row mgb5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="toolbar_W76F3002">
                    </div>
                </div>
            </div>
            <form id="frm_TasDetail" name="frm_TasDeatil" method="post">
                {{csrf_field()}}
                <div class="row mgb5">
                    <div class="col-sm-5 well-employee" style="margin-left: 15px; ">
                        <div class="row mgb5 pdt5">
                            <div class="col-sm-3 col-md-3 col-lg-3 col-lg-3 mgb5">
                                <label class="lbl-normal" for="">{{Helpers::getRS("Tai_khoan")}}</label>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mgb5">
                                <input type="text" name="taskNameW84F1000" id="taskNameW84F1000"
                                       class="form-control"
                                       maxlength="250"
                                       autocomplete="off" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 well-employee" style="margin-left: 15px;">
                        <div class="row mgb5 pdt5">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-lg-4 mgb5">
                                <label class="lbl-normal" for="">{{Helpers::getRS("Ten_nguoi_dung")}}</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 mgb5">
                                <input type="text" name="taskNameW84F1000" id="taskNameW84F1000"
                                       class="form-control"
                                       maxlength="250"
                                       autocomplete="off" value="" required>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" id="btnSubmitW84F1000" class="hide"></button>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $("#toolbar_W76F3002").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnBack_W76F3001",
                            icon: "fas fa-arrow-left",
                            title: "{{Helpers::getRS('Quay_lai')}}",
                            cls: "btn btn-danger",
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
                                    {{--window.location.href = "{{url('/W84F1000/edit')}}";--}}
                                });
                            }
                        }
                    ]
                }
            );

        });

    </script>

    <style>
        .new-account-img {
            display: block;
            width: 200px;
            max-height: 200;
            border-radius: 50%;

        }

        .card-account {
            border: 1px solid #20a8d8;
            padding: 10px;
            border-width: 2px;
        }

        /*.card-accent-primary {*/
        /*border: 1px solid #c8ced3;*/
        /*border-top-width: 2px;*/
        /*}*/
    </style>

@stop
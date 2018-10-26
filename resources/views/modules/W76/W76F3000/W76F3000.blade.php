@extends('modules.W76.W76F3000.components.layout')
@section('w76f3000')
    <section>
        <?php
        $imageW76 = asset('/media/no-photo.jpg');
        ?>
        <div class="task-list">
            <div class="row mgr5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="toolbar_account">
                    </div>
                </div>
            </div>
            <form id="frm_account" name="frm_account" method="post">
                <div class="row pdt5">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" class="form-control" id="txtSearchValueW84TaskList"
                               name="txtSearchValueW84TaskList" autocomplete="off"
                               placeholder="{{ Helpers::getRS('Tu_khoa_tim_kiem')}}">
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <button class="btn btn-info mrgbtt" id="searchW86F1000"><span
                                    class="fa fa-search text-yellow"></span>
                        </button>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    </div>
                </div>

                <div class="row pdt5">

                    <div class="col-sm-4 col-md-4 col-lg-4 col-sx-4" style="padding-bottom: 5px">
                        <div class="card-account">
                            <div class="">
                                <div class="row mgb5">
                                    <div class="col-10 col-sm-10 col-md-10">
                                        <label style="font-weight: bold;font-size: 14px">
                                            TRAN HU?NH ANH B?O
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
                                                <a><img src="{{$imageW76}}" class="account-img"/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pdl15">
                                        {{--<div class="row">--}}
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a id="employeeNameW86F1000" class="pd0 ">
                                                fdfdfdf
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a id="positionNameW86F1000" class="pd0">
                                                dfdfdf
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a id="orgUnitNameW86F1000" class="pd0 ">
                                                dfdfd
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a id="employeeNameW86F1000" class="pd0">
                                                fdfdfdf
                                            </a>
                                        </div>

                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $("#toolbar_account").digiMenu({
                    showText: true,
                    buttonList: [
                        {
                            ID: "btnEdit_Task",
                            icon: "fas fa-user-plus",
                            title: "{{Helpers::getRS('Tao_tai_khoan')}}",
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
@extends('modules.W76.W76F3000.components.layout')
@section('w76f3000')
    <section>
        <?php
        $imageW76 = asset('/media/no-photo.jpg');
        ?>
        <div class="task-list" style="opacity: 0">
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

                        <ul class="pagination pull-right">
                            <li class="page-item {{$currentPage == 1 ? 'hide' : ''}}">
                                <a class="page-link" href="{{url('/W76F3000?page='.($currentPage - 1))}}">Trước</a>
                            </li>

                            @for ($i = 0; $i < $total; $i++)

                                <li class="page-item {{($i + 1) > 4 ? 'hide': ''}} {{$currentPage == ($i +1) ? 'active' : ''}}">
                                    <a class="page-link " href="{{url('/W76F3000?page='.($i+1))}}">{{$i + 1}}</a>
                                </li>

                            @endfor



                            <li class="page-item {{$currentPage == $total ? 'hide' : ''}}">
                                <a class="page-link" href="{{url('/W76F3000?page='.($currentPage + 1))}}">Sau</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row pdt5">
                    @include('modules.W76.W76F3000.W76F3000_List')
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
                                    window.location.href = "{{url('/W76F3001/add')}}";
                                });
                            }
                        }
                    ]
                }
            );

        });

        setTimeout(function(){
            $(".task-list").css("opacity", 1);
        }, 1000);

    </script>

    <style>
        .card-account {
            border: 1px solid #20a8d8;
            padding: 10px;
            border-width: 3px;
        }
        /*.task-list{*/
            /*height: auto;*/
            /*-webkit-animation-name: digi-opacity;*/
            /*-webkit-animation-duration: 2s;*/
            /*animation-name: digi-opacity;*/
        /*}*/

        /*animation-duration: 1s;*/
        /*.card-accent-primary {*/
        /*border: 1px solid #c8ced3;*/
        /*border-top-width: 2px;*/
        /*}*/
    </style>

@stop
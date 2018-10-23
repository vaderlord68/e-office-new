@extends('modules.W84.W84F2000.components.layout')
@section('w84f2000')
    @parent
    <div id="W84F2000" class="card">
        <div class="card-header">
            <div class="row ">
                <div class="col-sm-12">
                    <button id="btnAdd" type="button" class="btn btn-primary "><i class="fas fa-plus mgr5"></i>Thêm mới</button>
                    <button id="btnFind" type="button" class="btn btn-primary "><i class="fas fa-search mgr5"></i>Tìm kiếm</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mgb5">
                <div class="col-sm-8">
                    <div class="row mgb5">
                        <div class="col-12 col-sm-2">
                            <label class="lbl-normal">Trạng thái</label>
                        </div>
                        <div class="col-12 col-sm-3">

                            <select class="form-control">

                            </select>
                        </div>
                        <div class="col-12 col-sm-7">
                            <select class="form-control"></select>
                        </div>
                    </div>
                    <div class="row mgb5">
                        <div class="col-12 col-sm-2">
                            <label class="lbl-normal">Quản lý</label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <input type="text" class="form-control">
                        </div>

                    </div>
                    <div class="row mgb5">
                        <div class="col-12 col-sm-2">
                            <label class="lbl-normal">Trưởng nhóm</label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">

                    <select class="form-control"></select>
                </div>


            </div>
            <div class=" paging_data">
                @include('modules.W84.W84F2000.pagination_data')
            </div>

        </div>
    </div>
    <style>
        .label {
            font-size: 11px;
        }

        .card-footer {
            font-size: 10px;
            /*height: 30px;*/
            padding: 5px 5px 0px 20px !important;
        }

        .remark {
            font-size: 11px;
            color: gray;
            line-height: 120%;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
        }

    </style>

    <script>
        $("#btnAdd").click(function () {
            window.location.href = '{{url("W84F2001/add")}}';
        });

    </script>


@stop
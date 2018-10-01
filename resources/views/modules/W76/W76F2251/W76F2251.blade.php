@extends('layouts.layout')

@section('toolbar')
    <a class="btn" href="{{url('/W76F2251/save')}}">
        <i class="fal fa-save text-primary mgr5 text-bold"></i>Lưu
    </a>

    <a class="btn" href="{{url('/W76F2251/savenext')}}">
        <i class="fal fa-arrow-circle-right mgr5 text-bold"></i>Nhập tiếp
    </a>

    <a class="btn" href="#">
        <i class="fal fa-reply text-orangered rotateY180 text-bold"></i>
         Chuyển xử lý
    </a>

    <a class="btn" href="{{url('/W76F2250')}}">
        <i class="fal fa-arrow-circle-left text-orangered text-bold"></i>
         Quay lại
    </a>

    <a class="btn" href="{{url('/W76F2250')}}">
        <i class="fas fa-window-close text-orangered text-bold"></i>
         Đóng
    </a>
@stop

@section('content')
    @parent
    <table id="example-advanced" class="treetable">
        <caption>
            <a href="#" onclick="jQuery('#example-advanced').treetable('expandAll'); return false;">Expand all</a>
            <a href="#" onclick="jQuery('#example-advanced').treetable('collapseAll'); return false;">Collapse all</a>
        </caption>
        <thead>
        <tr>
            <th><input type="text"></th>
            <th>Kind</th>
            <th>Size</th>
            <th>Size</th>
        </tr>
        </thead>
        <tbody>
            <tr data-tt-id="1">
                <td>Parent</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
            <tr data-tt-id="2" data-tt-parent-id="1">
                <td>Child</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="row hide">
        <div class="col-sm-12">
            <input type="text" id="txtSearch" name="txtSearch"/>
        </div>
    </div>
    <div class="row hide">
        <div class="col-sm-12">
            <div id="jstree" style="margin:5px auto;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header hide">
                    <strong>Cập nhật văn bản đến</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Số</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autofocus autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Đơn vị</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Nhóm văn bản</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Văn bản liên quan</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Cơ quan gửi</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Ngày nhận</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Độ khẩn cấp</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Độ bảo mật</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                            <label class="col-sm-2 col-form-label" for="input-small">Ngày nhận</label>
                            <div class="col-sm-2">
                                <input class="form-control " id="input-small" type="text" name="input-small"
                                       placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <button class="btn btn-square btn-block btn-secondary" type="button"><i
                                            class="far fa-paperclip mgr5"></i>Đính kèm
                                </button>
                            </div>
                            <div class="col-sm-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="input-small">Trích yếu</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9"
                                          placeholder="Content.."></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>

        $('#jstree').jstree({
            //"plugins" : [ "wholerow", "checkbox" ],
            'core': {
                'data': {!! $treeViewData !!},
                "multiple": false,
                "animation": 0,
                "themes": {
                    "variant": "large",
                    "icons": false
                }

            },
            node_customize: {
                default: function (el, node) {
                    console.log("test");
                    $(el).find('a').append("HELLO");
                }
            },
            plugins: ["themes", "html_data", "search", "adv_search", "node_customize"]

        });

        $("#txtSearch").keyup(function (event) {
            setTimeout(function (evt) {
                $("#jstree").jstree("search", $("#txtSearch").val());
            }, 1000);
        });

        $("#txtSearch").keypress(function (event) {
            if (event.keyCode == 13) {
                $("#jstree").jstree("search", $(this).val());
            }
        });

        $('#jstree').on('changed.redraw_node', function (node, deep, is_callback) {
            console.log(node);
        })


        $('#jstree').on('changed.jstree', function (e, data) {
            console.log(data);
            var i, j, r = [];
            for (i = 0, j = data.selected.length; i < j; i++) {
                var id = data.instance.get_node(data.selected[i]).id;
                console.log(id);
            }

        })

        $('#jstree').on('click.jstree', function (e, data) {
            var instance = $('#jstree').jstree(true);
            var selectedNode = instance.get_selected();

        })
    </script>
    <style>
        .jstree-default .jstree-search {
            font-style: italic;
            color: #ff4e07;
            font-weight: bold;
        }
    </style>
@stop
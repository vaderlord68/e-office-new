<div class="card document-sidebar">
    <div class="card-header hide">
        Quản lý thư mục tài liệu
    </div>
    <div class="card-body">
        <div id="jstree"></div>
    </div>
</div>


<script>
    $(document).ready(function(){

    });

    $('#jstree').jstree({
        'core' : {
            'data' : {!! $treeViewData !!},
            "multiple" : false,
            "animation" : 0
        },
        "contextmenu": {
            "items": function ($node) {
                var tree = $("#jstree").jstree(true);
                return {
                    "Create": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Thêm",
                        "icon": "fa fa-plus text-primary",
                        "action": function (obj) {
                            createFolder();
                        }
                    },
                    "Rename": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Sửa",
                        "icon": "fa fa-edit text-yellow",
                        "action": function (obj) {
                            editFolder();
                        }
                    },
                    "Remove": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Xoá",
                        "icon": "fa fa-trash text-red",
                        "action": function (obj) {
                            //tree.jstree('delete_node', $node);
                        }
                    }
                };
            }
        },
        "themes" : {
            "variant" : "large"
        },
        "plugins" : [
            //"checkbox",
            "contextmenu",
            "dnd",
            //"massload",
            //"search",
            "sort",
            "state",
            "types",
            //"unique",
            "wholerow",
            "changed",
            //"conditionalselect"
        ]
    });
    var instance = $('#jstree').jstree(true);
    //event change
    $('#jstree').on('changed.jstree', function (e, data) {
        //console.log(data);
        {{--var i, j, r = [];--}}
        {{--for(i = 0, j = data.selected.length; i < j; i++) {--}}
            {{--var id = data.instance.get_node(data.selected[i]).id;--}}
            {{--window.location.href = '{{url("/W76F2150/?currentFolderID=")}}' + id;--}}
        {{--}--}}
        {{--if (data.selected.length >0){--}}
            {{--window.location.href = '{{url("/W76F2150/?currentFolderID=")}}' + data.instance.get_node(data.selected[0]).id;--}}
        {{--}--}}
        {{--console.log('Selected: ' + r.join(', '));--}}
            {{--//window.location.href = '{{url("/W76F2150/?currentFolderID=")}}' + data.selected;--}}
    })
    $('#jstree').on('click.jstree', function (event, data) {
        if (event.target.id != ''){
            var instance = $('#jstree').jstree(true);
            var selectedNode =  instance.get_selected();
            console.log(selectedNode);
            window.location.href = '{{url("/W76F2150")}}' + "/?currentFolderID=" + selectedNode[0];
        }

    })

    function createFolder(){
        var instance = $('#jstree').jstree(true);
        var selectedNode =  instance.get_selected();
        hideAlert($("#divW76F2150"));
        if (selectedNode.length == 0){
            alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
        }else{
            //window.location.href = '{{url("/W76F2150/create-folder")}}' + "/?currentFolderID=" + selectedNode[0];
            showFormDialogPost('{{url("/W76F2150/create-folder")}}', 'popCreateFolder', {_token: '{{csrf_token()}}', currentFolderID: selectedNode[0]}, function(){

            }, null, function (res) {
                window.location.href = '{{url("/W76F2150")}}' + "/?currentFolderID=" + selectedNode[0];
            });
        }
    }

    function editFolder(){
        var instance = $('#jstree').jstree(true);
        var selectedNode =  instance.get_selected();
        hideAlert($("#divW76F2150"));
        if (selectedNode.length == 0){
            alertError("Bạn chưa chọn thư mục nào.", $("#divW76F2150"))
        }else{
            //window.location.href = '{{url("/W76F2150/edit-folder")}}' + "/?currentFolderID=" + selectedNode[0];
            showFormDialogPost('{{url("/W76F2150/edit-folder")}}', 'popCreateFolder', {_token: '{{csrf_token()}}', currentFolderID: selectedNode[0]}, function(){

            }, null, function (res) {
                window.location.href = '{{url("/W76F2150")}}' + "/?currentFolderID=" + selectedNode[0];
            });
        }
    }
</script>

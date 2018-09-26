<div class="card document-sidebar">
    <div class="card-header">
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

        "themes" : {
            "variant" : "large"
        }
    });
    var instance = $('#jstree').jstree(true);
    //event change
    $('#jstree').on('changed.jstree', function (e, data) {
        console.log(data);
        {{--var i, j, r = [];--}}
        {{--for(i = 0, j = data.selected.length; i < j; i++) {--}}
            {{--var id = data.instance.get_node(data.selected[i]).id;--}}
            {{--window.location.href = '{{url("/W76F2150/?currentFolderID=")}}' + id;--}}
        {{--}--}}
        {{--if (data.selected.length >0){--}}
            {{--window.location.href = '{{url("/W76F2150/?currentFolderID=")}}' + data.instance.get_node(data.selected[0]).id;--}}
        {{--}--}}
        {{--console.log('Selected: ' + r.join(', '));--}}
            //window.location.href = '{{url("/W76F2150/?currentFolderID=")}}' + data.selected;
    })
    $('#jstree').on('click.jstree', function (e, data) {
        var instance = $('#jstree').jstree(true);
        var selectedNode =  instance.get_selected();
        window.location.href = '{{url("/W76F2150")}}' + "/?currentFolderID=" + selectedNode[0];
    })
</script>

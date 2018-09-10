<div class="card document-sidebar">
    <div class="card-header">
        Quản lý thư mục tài liệu
    </div>
    <div class="card-body">
        <div id="treeView"></div>
    </div>
</div>

<script>
    console.log(JSON.parse('<?php echo $json; ?>'));
    $('#treeView').jstree({
        'core' : {
            'data' : <?php echo $json; ?>

        },
        "themes" : {
            "variant" : "large"
        }
    });

    //event change
    $('#treeView').on('changed.jstree', function (e, data) {
        var i, j, r = [];
        for(i = 0, j = data.selected.length; i < j; i++) {
            r.push(data.instance.get_node(data.selected[i]).text);
        }
        console.log('Selected: ' + r.join(', '));
    })
</script>
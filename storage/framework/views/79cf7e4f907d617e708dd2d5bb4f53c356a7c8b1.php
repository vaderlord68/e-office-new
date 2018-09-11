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
            'data' : <?php echo $treeViewData; ?>,
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
        
        
            
            
        
        
            
        
        
            //window.location.href = '<?php echo e(url("/W76F2150/?currentFolderID=")); ?>' + data.selected;
    })
    $('#jstree').on('click.jstree', function (e, data) {
        var instance = $('#jstree').jstree(true);
        var selectedNode =  instance.get_selected();
        window.location.href = '<?php echo e(url("/W76F2150")); ?>' + "/?currentFolderID=" + selectedNode[0];
    })
</script>

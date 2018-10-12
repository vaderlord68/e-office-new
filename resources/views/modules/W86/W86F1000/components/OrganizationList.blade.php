<div class=" mgb10">
    <div class="demo-container">
        <div id="treeview"></div>
    </div>
</div>

<script type="text/javascript">

    $(function () {
        $("#treeview").dxTreeList({
            dataSource: {!! $organizationList !!},
            keyExpr: "OrgunitID",
            parentIdExpr: "OrgunitParentID",
            autoExpandAll: true,
            showColumnHeaders: false,
            virtualModeEnabled: true,
            columnAutoWidth: true,
            showBorders: true,
            columnHidingEnabled: false,
            showRowLines: true,
            showBorders: true,
            onCellClick: function (e) {
//                $('#employeeNameW86F1000').html('');
                console.log(e.data);
                loadDATAINFOW86F1000(e.data.OrgunitID);
            },
            selection: {
                mode: "single",
                allowSelectAll: false,
                recursive: false,
            },
            columns: [
                {dataField: "OrgunitName"},
            ]
        });
        setTimeout(function () {
            var employee = $('#treeview').dxTreeList("option", "dataSource");
            loadDATAINFOW86F1000(employee[0].OrgunitID);
        }, 500)

    });

    function loadDATAINFOW86F1000(orgunitID) {
        $.ajax({
            method: "POST",
            url: '{{url('/W86F1000/employeeList')}}',
            data: {orgunitID: orgunitID, _token: '{{ csrf_token() }}'},
            success: function (data) {
                $('#employeeListW86F1000').html(data);
            }
        })
    }

</script>
<style>

    #treeview {
        height: auto;
        width: 100% !important;
    }

    .options {
        padding: 20px;
        position: absolute;
        bottom: 0;
        right: 0;
        width: 260px;
        top: 0;
        background-color: #f5f5f5;
    }

    .caption {
        font-size: 18px;
        font-weight: 500;
    }

    .option {
        margin-top: 10px;
    }

    .option > .dx-selectbox {
        display: inline-block;
        vertical-align: middle;
        max-width: 350px;
        width: 100%;
        margin-top: 5px;
    }

    .dx-treelist .dx-row-lines > td {
        border-bottom: 0px solid #e0e0e0;
    }

    .dx-treelist .dx-row > td {
        padding-top: 5px;
        padding-bottom: 5px;
        font-size: 14px;
        line-height: 20px;
    }

</style>



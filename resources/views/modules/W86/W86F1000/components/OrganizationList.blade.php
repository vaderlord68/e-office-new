<div class=" mgb10">
    <div class="demo-container">
        <div id="treeview"></div>
    </div>
</div>

<script type="text/javascript">

    <?php

    $temp = [];

    //            foreach (json_decode($organizationList) as $row){
    //                $row->OrgunitName = "<i class='fa fa-home'></i>".$row->OrgunitName;
    //                array_push($temp, $row);
    //            }
    \Debugbar::info($organizationList);

    ?>


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
                console.log("onCellClick");
                loadDATAINFOW86F1000(e.data.OrgunitID);
                //console.log(e);
            },
            selection: {
                mode: "single",
                allowSelectAll: false,
                recursive: false,
            },
            columns: [
                {
                    dataField: "OrgunitName",
                    cellTemplate: function (cellElement, cellInfo) {
                        //console.log(cellElement);
                        //console.log(cellInfo);
                        switch (Number(cellInfo.data.OrgunitLevelID)) {
                            case 0:
                                cellElement
                                    .append($("<i>", {"class": "far fa-building text-red  mgr5"}))
                                    .append($("<span>", {"class": "cursor-pointer", text: cellInfo.data.OrgunitName}))
                                break;
                            case 1:
                                cellElement
                                    .append($("<i>", {"class": "fa fa-home text-yellow  mgr5"}))
                                    .append($("<span>", {"class": "cursor-pointer", text: cellInfo.data.OrgunitName}))
                                break
                            case 2:

                                cellElement
                                    .append($("<i>", {"class": "fas fa-building text-primary  mgr5"}))
                                    .append($("<span>", {"class": "cursor-pointer", text: cellInfo.data.OrgunitName}))
                                break
                            default:
                                cellElement
                                    .append($("<span>", {"class": "cursor-pointer", text: cellInfo.data.OrgunitName}))
                                break
                        }
                    }
                },
            ],
            onContentReady: function (e) {
                //console.log("bum");
                //far fa-plus-square  <> dx-treelist-empty-space dx-treelist-collapsed
                //far fa-minus-square mgr <> dx-treelist-empty-space dx-treelist-expanded

                /*$(".dx-treelist-expanded").addClass('far fa-plus-square');
                $(".dx-treelist-expanded").removeClass('dx-treelist-empty-space dx-treelist-expanded');


                $(".dx-treelist-collapsed").addClass('far fa-plus-square');
                $(".dx-treelist-collapsed").removeClass('dx-treelist-empty-space dx-treelist-collapsed');*/


                $(".dx-treelist-expanded").parent().append('<i class="far fa-minus-square mgr11" onclick="trigger(this)"></i>');
                $(".dx-treelist-expanded").addClass("hide");

                $(".dx-treelist-collapsed").parent().append('<i class="far fa-plus-square mgr11" onclick="trigger(this)"></i>');
                $(".dx-treelist-collapsed").addClass("hide");
            }

        });
        setTimeout(function () {
            var employee = $('#treeview').dxTreeList("option", "dataSource");
            loadDATAINFOW86F1000(employee[0].OrgunitID);

        }, 500)

    });

    function trigger(el) {
        var els = $(el).parent().find(".dx-treelist-empty-space");
        var index = els.length -1;
        $(els[index]).click();
    }

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

    .cursor-pointer:hover{
        color: red;
    }

    .mgr11{
        margin-right: 11px;
    }
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



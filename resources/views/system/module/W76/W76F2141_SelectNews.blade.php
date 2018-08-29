<!-- The Modal -->
<!-- Copy template này tại resources/views/page/components/modal-lg.blade.php -->
<div class="modal fade" id="popW76F2141SelectNews">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{Helpers::getRS('Chon_ban_tin_lien_quan')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mgb5">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <select class="form-control" id="cboChannelIDSelectNews" name="cboChannelIDSelectNews">
                            <option value="">-- {{\Helpers::getRS('Chuyen_muc')}} --</option>
                            @foreach($channelIDList as  $channelIDItem)
                                <option value="{{$channelIDItem->CodeID}}">{{$channelIDItem->CodeName}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="grdW76F2140_SelectNews"></div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="btnSelectNewsClose" type="button" class="btn btn-danger" data-dismiss="modal">{{Helpers::getRS('Chon')}}</button>
            </div>
        </div>
    </div>
</div>
<script>
    var hello = "Hello word";
    $(document).ready(function(){
        $("#btnSelectNewsClose").click(function(){
            var data = $("#grdW76F2140_SelectNews").pqGrid('option','dataModel.data');
            var filterData = $.grep(data, function(row){
                return Number(row.IsSelected) == 1;
            });
            console.log(filterData);
            window.selectedNews = filterData;
        });
        $("#cboChannelIDSelectNews").change(function(){
            console.log('test');
            postMethod('{{url("/w76f2141/xy")}}', function(data){
                console.log('sdfds');
                $("#grdW76F2140_SelectNews").pqGrid('option','dataModel.data', JSON.parse(data) );
                $("#grdW76F2140_SelectNews").pqGrid('refreshDataAndView');
            }, {cboChannelIDSelectNews: $("#cboChannelIDSelectNews").val(), _token: '{{csrf_token()}}'});
        });
    });
    var obj = {
        width: '100%',
        height: 300,
        freezeCols: 1,
        numberCell: {show: false},
        selectionModel: {type: 'row', mode: 'single'},
        pageModel: {type: "local", rPP: 20},
        filterModel: {on: true, mode: "AND", header: true},
        scrollModel: {horizontal: true, autoFit: false, lastColumn: 'none'},
        showTitle: false,
        dataType: "JSON",
        wrap: false,
        hwrap: false,
        collapsible: false,
        postRenderInterval: -1,
        colModel: [
            {
                title: "<input type='checkbox' class='checkbox-grid-selection'/>",
                dataIndx: "IsSelected",
                align: "center",
                width: 40,
                type: 'checkbox',
                cls: 'ui-state-default',
                sortable: false,
                dataType: 'bool',
                cb: {header: true, select: true, all: true, check: "1", uncheck: "0"},
                render: function (ui) {
                    var cb = ui.column.cb,
                        cellData = ui.cellData,
                        checked = cb.check == cellData ? 'checked' : '';
                    return {
                        text: "<label><input type='checkbox' " + checked + " /></label>"
                    };
                },
                editor: false
            },
             {
                title: "",
                width: 110,
                align: "center",
                dataIndx: "NewsID",
                editor: false,
                hidden: true
            }
            , {
                title: "{{Helpers::getRS('Tieu_de')}}",
                minWidth: 140,
                align: "center",
                dataIndx: "Title",
                dataType: "string",
                editor: false,
                filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
            }
        ],
        dataModel: {
            data: {!! $newsCollection !!},
        },
        pageModel: {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]}
    };
    $("#grdW76F2140_SelectNews").pqGrid(obj);
    $("#grdW76F2140_SelectNews").pqGrid("option", $.paramquery.pqGrid.regional['{{Session::get("locate")}}']);
    $("#grdW76F2140_SelectNews").find(".pq-pager").pqPager("option", $.paramquery.pqPager.regional['{{Session::get("locate")}}']);
    $("#grdW76F2140_SelectNews").pqGrid("refreshDataAndView");
    setTimeout(function(){
        resizePqGrid();
    }, 300);
</script>
<div class="modal fade" id="modalSelection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <?php

        $width = Helpers::getDevice() == 'MOBILE' ? '100%' : '35%';

        ?>

    <div class="modal-dialog" style="width: {{$width}}">
        <div class="modal-content" >
            <div class="modal-header">
                <label id="tiltle" style="font-weight: 500;font-size: 25px">Chọn người dùng</label>
                {{--{{ $caption }}--}}
                <button id="btnCloseModal" type="button" class="close" data-dismiss="modal">x</button>
                {{--//   <h4 class="modal-title">...</h4>--}}
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="gridContainer1"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="btnChooseModal"
                        class="btn btn-custom " data-dismiss="modal"><i
                            class="fa-group-btn fas fa-box-check text-blue mgr5" ></i>{{ __('Chọn') }}</button>
                <button type="button" id="btnCloseModal" class="btn btn-custom btn-secondary " data-dismiss="modal"><i
                            class="fa-group-btn fas fa-times-circle text-red mgr5"></i>{{ __('Đóng') }}</button>
            </div>
        </div>
    </div>
</div>



<script>
    var dataGrid;
    $("#btnChooseModal").click(function () {
            var data12 = dataGrid.getSelectedRowsData();
            window.responseData = data12;
    });

    $("#btnCloseModal").click(function () {
        window.responseData = "";
    });
    var $source;
    var $oldValue;
    $(document).ready(function () {
            $source = {!! json_encode($empFollowList) !!} ;
            $oldValue = {!! json_encode($oldValue) !!} ;
        var countLoad = 0;
        $(function () {
            $("#gridContainer1").dxDataGrid({
                width: '100%',
                dataSource: $source,
                showBorders: true,
                keyExpr: "EmployeeID",
                rowAlternationEnabled: true,
                selection: {
                    mode: "multiple",
                },
                selectedRowKeys: $oldValue,
                filterRow: {
                    visible: true
                },
                searchPanel: {
                    visible: true,
                    width: 450,
                    placeholder: "Search...",
                    class:"pull-right"

                },

                paging: {
                    pageSize: 4
                },
                pager: {
                    showPageSizeSelector: false,
                    allowedPageSizes: [4, 10, 20],
//                    showInfo: true
                },
                columns: [
                    {
                        caption: "Thông tin nhân viên",
                        dataField: "Thumnail",
                        alignment: 'center',
                        width: 100,
                        allowEditing: false,
                        allowFiltering: false,
                        allowSorting: false,
                        cellTemplate: function (container, options) {
                            console.log(options.values[2]);
                            var name = options.data.EmployeeName;
                            var position = options.data.PositionName;

                            var template = "";
                            template += '<div class="row">';
                            template += '<div class="col-sm-2 text-left">';
                            template += '<img src="'+options.value+'" alt="avatar">';
                            template += '</div>';
                            template += '<div class="col-sm-10 text-left">';
                            template += '<div class="row height24">';
                            template += '<div class="col-sm-12">';
                            template += '<label class="lbl-normal-value"> '+name+' </label>';
                            template += '</div>';
                            template += '</div>';
                            template += '<div class="row height24">';
                            template += '<div class="col-sm-12">';
                            template += '<label class="lbl-normal sub-desc"> '+position+' </label>';
                            template += '</div>';
                            template += '</div>';
                            template += '</div>';
                            template += '</div>';


                            $(template).appendTo(container);
                        }
                    },
//                    {
//                        caption:"Mã nhân viên",
//                        dataField: "EmployeeID",
//                        allowEditing: false,
//
//                    },
                    {
                        caption: "Tên nhân viên",
                        dataField: "EmployeeName",
                        allowEditing: false,
                        visible: false,
                    }, {
                        caption: "Vai trò",
                        dataField: "PositionName",
                        allowEditing: false,
                        visible: false,
                    }
                ],
                onContentReady: function (e) {
                    if (countLoad < 3) {
                        var $grid = $("#gridContainer1").dxDataGrid("instance");
                        $grid.refresh();
                        countLoad = countLoad + 1;
                    }

                },
                onInitialized: function (e) {
                    dataGrid = e.component;

                },
            });

        });

    });


</script>
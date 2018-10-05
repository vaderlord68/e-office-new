@extends('layouts.layout')
@section('content')
    @parent
    <?php
    $divisionIDList = json_decode($divisionIDList);
    $divisionIDW76F2000 = $divisionIDList[0]->OrgunitName;
    ?>
    <section>


        <div class="row hide">
            <div class="col-md-12">
                <div class="demo-container">
                    <div id="treeview"></div>

                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <div id="divFullCalendar">
                    @include('modules.W77.W77F2000.W77F2000_Calender')
                </div>
            </div>
        </div>
        <div class="row  pdt10">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div class="form-check-label pdl0">
                    <label><span class="fas fa-square text-primary mgr5"></span>{{Helpers::getRS("Da_duyet")}}</label>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <label><span class="fas fa-square text-warning mgr5"></span>{{Helpers::getRS("Cho_duyet")}}</label>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <label class="form-check-label pdt10">{{Helpers::getRS("Don_vi")}}</label>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <select name="divisionIDW76F2000" id="divisionIDW76F2000"
                        class="form-control" required>
                    {{--<option value="">--</option>--}}
                    @foreach($divisionIDList as  $divisionIDItem)
                        <option value="{{$divisionIDItem->OrgunitID}}" {{ isset($divisionIDW76F2000)&& $divisionIDW76F2000 == $divisionIDItem->OrgunitID ? 'selected' : '' }}>{{$divisionIDItem->OrgunitName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        var products = [{
            id: "1",
            text: "Stores",
            expanded: true,
            items: [{
                id: "1_1",
                text: "Super Mart of the West",
                expanded: true,
                items: [{
                    id: "1_1_1",
                    text: "Video Players",
                    items: [{
                        id: "1_1_1_1",
                        text: "HD Video Player",
                        price: 220
                    }, {
                        id: "1_1_1_2",
                        text: "SuperHD Video Player",
                        price: 270
                    }]
                }, {
                    id: "1_1_2",
                    text: "Televisions",
                    items: [{
                        id: "1_1_2_1",
                        text: "SuperLCD 42",
                        price: 1200
                    }, {
                        id: "1_1_2_2",
                        text: "SuperLED 42",
                        price: 1450
                    }, {
                        id: "1_1_2_3",
                        text: "SuperLED 50",
                        price: 1600
                    }, {
                        id: "1_1_2_4",
                        text: "SuperLCD 55",
                        price: 1350
                    }, {
                        id: "1_1_2_5",
                        text: "SuperLCD 70",
                        price: 4000
                    }]
                }, {
                    id: "1_1_3",
                    text: "Monitors",
                    items: [{
                        id: "1_1_3_1",
                        text: "19\"",
                        items: [{
                            id: "1_1_3_1_1",
                            text: "DesktopLCD 19",
                            price: 160
                        }]
                    }, {
                        id: "1_1_3_2",
                        text: "21\"",
                        items: [{
                            id: "1_1_3_2_1",
                            text: "DesktopLCD 21",
                            price: 170
                        }, {
                            id: "1_1_3_2_2",
                            text: "DesktopLED 21",
                            price: 175
                        }]
                    }]
                }, {
                    id: "1_1_4",
                    text: "Projectors",
                    items: [{
                        id: "1_1_4_1",
                        text: "Projector Plus",
                        price: 550
                    }, {
                        id: "1_1_4_2",
                        text: "Projector PlusHD",
                        price: 750
                    }]
                }]

            }, {
                id: "1_2",
                text: "Braeburn",
                items: [{
                    id: "1_2_1",
                    text: "Video Players",
                    items: [{
                        id: "1_2_1_1",
                        text: "HD Video Player",
                        price: 240
                    }, {
                        id: "1_2_1_2",
                        text: "SuperHD Video Player",
                        price: 300
                    }]
                }, {
                    id: "1_2_2",
                    text: "Televisions",
                    items: [{
                        id: "1_2_2_1",
                        text: "SuperPlasma 50",
                        price: 1800
                    }, {
                        id: "1_2_2_2",
                        text: "SuperPlasma 65",
                        price: 3500
                    }]
                }, {
                    id: "1_2_3",
                    text: "Monitors",
                    items: [{
                        id: "1_2_3_1",
                        text: "19\"",
                        items: [{
                            id: "1_2_3_1_1",
                            text: "DesktopLCD 19",
                            price: 170
                        }]
                    }, {
                        id: "1_2_3_2",
                        text: "21\"",
                        items: [{
                            id: "1_2_3_2_1",
                            text: "DesktopLCD 21",
                            price: 180
                        }, {
                            id: "1_2_3_2_2",
                            text: "DesktopLED 21",
                            price: 190
                        }]
                    }]
                }]

            }, {
                id: "1_3",
                text: "E-Mart",
                items: [{
                    id: "1_3_1",
                    text: "Video Players",
                    items: [{
                        id: "1_3_1_1",
                        text: "HD Video Player",
                        price: 220
                    }, {
                        id: "1_3_1_2",
                        text: "SuperHD Video Player",
                        price: 275
                    }]
                }, {
                    id: "1_3_3",
                    text: "Monitors",
                    items: [{
                        id: "1_3_3_1",
                        text: "19\"",
                        items: [{
                            id: "1_3_3_1_1",
                            text: "DesktopLCD 19",
                            price: 165
                        }]
                    }, {
                        id: "1_3_3_2",
                        text: "21\"",
                        items: [{
                            id: "1_3_3_2_1",
                            text: "DesktopLCD 21",
                            price: 175
                        }]
                    }]
                }]
            }, {
                id: "1_4",
                text: "Walters",
                items: [{
                    id: "1_4_1",
                    text: "Video Players",
                    items: [{
                        id: "1_4_1_1",
                        text: "HD Video Player",
                        price: 210
                    }, {
                        id: "1_4_1_2",
                        text: "SuperHD Video Player",
                        price: 250
                    }]
                }, {
                    id: "1_4_2",
                    text: "Televisions",
                    items: [{
                        id: "1_4_2_1",
                        text: "SuperLCD 42",
                        price: 1100
                    }, {
                        id: "1_4_2_2",
                        text: "SuperLED 42",
                        price: 1400
                    }, {
                        id: "1_4_2_3",
                        text: "SuperLED 50",
                        price: 1500
                    }, {
                        id: "1_4_2_4",
                        text: "SuperLCD 55",
                        price: 1300
                    }, {
                        id: "1_4_2_5",
                        text: "SuperLCD 70",
                        price: 4000
                    }, {
                        id: "1_4_2_6",
                        text: "SuperPlasma 50",
                        price: 1700
                    }]
                }, {
                    id: "1_4_3",
                    text: "Monitors",
                    items: [{
                        id: "1_4_3_1",
                        text: "19\"",
                        items: [{
                            id: "1_4_3_1_1",
                            text: "DesktopLCD 19",
                            price: 160
                        }]
                    }, {
                        id: "1_4_3_2",
                        text: "21\"",
                        items: [{
                            id: "1_4_3_2_1",
                            text: "DesktopLCD 21",
                            price: 170
                        }, {
                            id: "1_4_3_2_2",
                            text: "DesktopLED 21",
                            price: 180
                        }]
                    }]
                }, {
                    id: "1_4_4",
                    text: "Projectors",
                    items: [{
                        id: "1_4_4_1",
                        text: "Projector Plus",
                        price: 550
                    }, {
                        id: "1_4_4_2",
                        text: "Projector PlusHD",
                        price: 750
                    }]
                }]

            }]
        }];

        $(function(){
            var treeView = $("#treeview").dxTreeView({
                items: products,
                width: 500,
                searchEnabled: false
            }).dxTreeView("instance");

            $("#searchMode").dxSelectBox({
                dataSource: ["contains", "startswith"],
                value: "contains",
                onValueChanged: function(data) {
                    treeView.option("searchMode", data.value);
                }
            });
        });



        $(document).ready(function () {
            $('#divisionIDW76F2000').on('change', function () {
                var division = $(this).val();
                window.location.href = '{{ url('/W77F2000/listCar') }}/' + division;
            });
        });

    </script>
@stop

<style>
    .fc-highlight {
        background: #c7a029 !important;
        opacity: .3;
    }
    #treeview {
        height: 400px;
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

</style>

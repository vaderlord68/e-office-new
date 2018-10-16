<div id='calendar'></div>

<script type="text/javascript">
    //    var viewmodeW76F4050 = "";
    var btnClickDel = false;
    var showAll = 0;
    $(document).ready(function () {
        var cars = {!! $carDList !!};
        console.log(cars);
        var events = [
            {
                url: '{{url('/W77F2000/loadCalender')}}',
                cache: false,
                method: 'post',
                data: function () { // a function that returns an object
                    return {
                        dynamic_value: Math.random(),
                    };
                }
            }
        ];
        var events = {!! $newsCollection !!};
        $('#calendar').fullCalendar({
            customButtons: {
                showAll: {
                    text: '{{ Helpers::getRS('Hien_thi_ca_ngay') }}',
                    click: function (event) {
                        var customButtons = $('#calendar').fullCalendar('option', 'customButtons');
                        if (showAll == 0) {
                            customButtons.showAll.text = '{{ Helpers::getRS('Gio_hanh_chinh_U') }}';
                            $('#calendar').fullCalendar('option', {
                                minTime: '00:00',
                                maxTime: '23:59',
                                customButtons: customButtons
                            });
                            showAll = 1;
                        } else {
                            customButtons.showAll.text = '{{ Helpers::getRS('Hien_thi_ca_ngay') }}';
                            $('#calendar').fullCalendar('option', {
                                minTime: '{{ $limitTime->BookingTimeFrom or '00:00:00' }}',
                                maxTime: '{{ $limitTime->BookingTimeTo or '23:59:00' }}',
                                customButtons: customButtons
                            });
                            showAll = 0;
                        }
                    }
                }
            },
            //disableDragging: true,
            selectOverlap: false,
            eventOverlap: false,
            //editable: false,
            //title: "HELLO BUM",
            defaultView: 'timeline',
            defaultDate: '{{date('Y-m-d')}}',
            minTime: '{{ $limitTime->BookingTimeFrom or '00:00:00' }}',
            maxTime: '{{ $limitTime->BookingTimeTo or '23:59:00' }}',
            editable: true,
            //contentHeight: 'auto',
            duration: {days: 1},
            slotLabelFormat: "HH:mm",
            buttonText: {
                today: 'Today',
                month: "{{ Helpers::getRS('Thang') }}",
                week: "{{ Helpers::getRS('tuan') }}",
                day: "{{ Helpers::getRS('Ngay') }}",
                list: 'List'
            },
            eventLimit: false,
            allDaySlot: false,
            dayOfMonthFormat: 'ddd DD/MM',
            theme: true,
            header: {
                left: 'prev,next showAll',
                center: 'title',
                right:   'timelineDay,agendaWeek,month'
            },
            height: 450,
            resourceLabelText: '{{ Helpers::getRS('Danh_sach_xe') }}',
            resources: cars,
            events: events,
            selectable: true,
            selectHelper: true,
            select: function (start, end, jsEvent, view, resource) {
                var event = {
                    start: start,
                    end: end
                };
                var momentStart = moment(event.start.format("HH:mm"));
                var momentEnd = moment(event.start.format("HH:mm"));

                var start = event.start.format("HH:mm");
                var end = event.end.format("HH:mm");
                var carBookingID = resource.CarBookingID;

                var date = event.start.format("DD/MM/YYYY");
                // console.log(momentStart);

                var data = {
                    start: start,
                    end: end,
                    carBookingID: carBookingID,
                    date: date,
                    _token: '{{ csrf_token() }}'
                }
                showFormDialogPost("{{url('/W77F2001/add')}}", 'myModal', data);
                $('#calendar').fullCalendar('renderEvent', event, true); // stick? = true
                $('#calendar').fullCalendar('unselect');
            },
            eventClick: function (calEvent, resource) {
                // var createUserID = calEvent.CreateUserID;
                if (calEvent.IsEdit == 1) {
                    if (!btnClickDel) {
                        var start = calEvent.start.format("HH:mm");
                        var end = calEvent.end.format("HH:mm");
                        var carBookingID = calEvent.CarBookingID;
                        var date = calEvent.start.format("DD/MM/YYYY");
                        var data = {
                            start: start,
                            end: end,
                            carBookingID: carBookingID,
                            date: date,
                            _token: '{{ csrf_token() }}'
                        }
                        showFormDialogPost("{{url('/W77F2001/edit')}}", 'myModal', data);
                        $('#calendar').fullCalendar('renderEvent', event, true); // stick? = true
                        $('#calendar').fullCalendar('unselect');
                    }
                }
            },
            eventDrag: function (event) {
                //event.preventDefault();
            },
            eventDrop: function (event, delta, revertFunc) {

                if (event.ApproveStatus == 1) {
                    revertFunc();
                    window.location.reload();
                }else{
                    console.log(event);
                    var timefrom = event.start.format("HH:mm");
                    var timeto = event.end.format("HH:mm");
                    var date = event.start.format("DD/MM/YYYY");
                    var carBookingID = event.CarBookingID;
                    var carNo = event.resourceId;

                    var data = {
                        start: timefrom,
                        end: timeto,
                        date: date,
                        //roomID: event.resourceId,
                        carBookingID: carBookingID,
                        carNo: carNo,
                        _token: '{{ csrf_token() }}'
                    }
                    hideAlert();
                    postMethod("{{url('/W77F2001/updatedrag')}}", function (res) {
                        var result = JSON.parse(res);
                        //console.log("luu");
                        switch (result.status) {
                            case 'ERROR':
                                alertError(result.message, $("#modalW77F2000"))
                                break;
                            case 'EXIST':
                                alertError(result.message, $("#modalW77F2000"))
                                break;
                            case 'SUCC':
                                alertSuccess("Dữ liệu đã được lưu thành công.")
                                window.location.reload();
                                break;
                        }
                    }, data)
                }




            },
            eventRender: function (event, element) {
                console.log(event);
                if (event.ApproveStatus == 1) {
                    element.css('background', '#9fddf2').css('border-color', '#9fddf2');
                }

                btnClickDel = false;
                element.popover({
                    title: event.title,
                    content: function () {
                        return showPopOverRender(event);
                    },
                    //content: event.HostPersonName,
                    trigger: 'hover',
                    placement: 'right',
                    container: 'body',
                    html: true,
                });
                if (event.IsEdit == 1) {
                    var d = new Date();
                    var id = "deleteW77F2000_" + d.getTime();
                    element.append('<span class="pull-right spanDelW76F2230"><a id="' + id + '" title="{{Helpers::getRS("Xoa")}}"><i class="fas fa-trash-alt text-danger cursor-pointer"></i></a></span>');
                    element.find("#" + id).on("click", function (evt) {
                        btnClickDel = true;
                        ask_delete(function () {
                            $.ajax({
                                method: "POST",
                                url: '{{url('/W77F2000/delete')}}',
                                data: {carBookingID: event.CarBookingID, _token: '{{ csrf_token() }}'},
                                success: function (res) {
                                    var data = JSON.parse(res);
                                    switch (data.status) {
                                        case "SUCC":
                                            var $calender = $("#calendar");
                                            delete_ok(function () {
                                                window.location.reload();
                                            });
                                            break;
                                        case "ERROR":
                                            alertError(data.message);
                                            break;
                                    }
                                }
                            })
                        });
//                    $('#calendar').fullCalendar('removeEvents', event._roomID);
                    });
                }
            },
            eventMouseover: function (data, event, events, view) {
            },
            eventMouseout: function (data, event, view) {
            },
            resourceRender: function (resourceObj, $td) {
            }
        });
    });

    function showPopOverRender(event) {
        var str = '';
        str += '<div id="popover">';
        str += '<div class="form-horizontal">';
        str += '<div class="row">';
        str += '<label class="lbl-normal col-sm-12">Nơi công tác: <strong>' + event.WorkPlace + '</strong></label>';
        str += '</div>';
        str += '<div class="row">';
        str += '<label class="lbl-normal col-sm-12">Số người đi: <strong>' + event.NumParticipants + '</strong></label>';
        str += '</div>';
        str += '</div>';
        str += '</div>';
        return str;
    }

</script>

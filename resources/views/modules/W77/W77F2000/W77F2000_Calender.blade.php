<div id='calendar'></div>

<script type="text/javascript">
    //    var viewmodeW76F4050 = "";
    var btnClickDel = false;
    var showAll = 0;
    $(document).ready(function () {
        var rooms = {!! $carDList !!};
        console.log(rooms);
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
            //disableDragging: true,
            selectOverlap: false,
            eventOverlap: false,
            //editable: false,
            //title: "HELLO BUM",
            defaultView: 'timeline',
            defaultDate: '{{date('Y-m-d')}}',
            editable: true,
            //contentHeight: 'auto',
            duration: {days: 1},
            slotLabelFormat: "HH:mm",
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day',
                list: 'List'
            },
            eventLimit: false,
            dayOfMonthFormat: 'ddd DD/MM',
            theme: true,
            header: {
                left: 'prev,next showAll',
                center: 'title',
                right: 'timelineDay'
            },
            height: 450,
            resourceLabelText: 'Danh sách book xe',
            resources: rooms,
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
                var roomID = resource.id;
                var date = event.start.format("DD/MM/YYYY");
                // console.log(momentStart);

                var data = {
                    start: start,
                    end: end,
                    roomID: roomID,
                    date: date,
                    _token: '{{ csrf_token() }}'
                }
                showFormDialogPost("{{url('/W77F2001/add')}}", 'myModal', data);
                $('#calendar').fullCalendar('renderEvent', event, true); // stick? = true
                $('#calendar').fullCalendar('unselect');
            },
            eventClick: function (calEvent, resource) {
                // var createUserID = calEvent.CreateUserID;
                //console.log(createUserID);
                //if (calEvent.IsEdit == 1 && calEvent.CreateUserID == createUserID) {
                if (!btnClickDel) {
                    var start = calEvent.start.format("HH:mm");
                    var end = calEvent.end.format("HH:mm");
                    var roomID = calEvent.id;
                    var date = calEvent.start.format("DD/MM/YYYY");
                    //console.log(roomID);
                    var data = {
                        start: start,
                        end: end,
                        roomID: roomID,
                        ID: calEvent.ID,
                        date: date,
                        _token: '{{ csrf_token() }}'
                    }
                    showFormDialogPost("{{url('/W77F2001/edit')}}", 'myModal', data);
                    $('#calendar').fullCalendar('renderEvent', event, true); // stick? = true
                    $('#calendar').fullCalendar('unselect');
                }
                // }

            },
            eventDrag: function (event) {
                //event.preventDefault();
            },
            eventDrop: function (event) {
                var timefrom = event.start.format("HH:mm");
                var timeto = event.end.format("HH:mm");
                var date = event.start.format("DD/MM/YYYY");

                var data = {
                    start: timefrom,
                    end: timeto,
                    date: date,
                    roomID: event.resourceId,
                    ID: event.ID,
                    _token: '{{ csrf_token() }}'
                }
                hideAlert();
                postMethod("{{url('/W76F2231/updatedrag')}}", function (res) {
                    var result = JSON.parse(res);
                    //console.log("luu");
                    switch (result.status) {
                        case 'ERROR':
                            alertError(result.message, $("#modalW76F2231"))
                            break;
                        case 'EXIST':
                            alertError(result.message, $("#modalW76F2231"))
                            break;
                        case 'SUCC':
                            alertSuccess("Dữ liệu đã được lưu thành công.")
                            window.location.reload();
                            break;
                    }
                }, data)
            },
            eventRender: function (event, element) {
                btnClickDel = false;
                var d = new Date();
                var id = "deleteW76F2230_" + d.getTime();
                var createUserID = event.CreateUserID;
            },
            eventMouseover: function (data, event, events, view) {
            },
            eventMouseout: function (data, event, view) {
            },
            resourceRender: function (resourceObj, $td) {
            }
        });
    });


</script>

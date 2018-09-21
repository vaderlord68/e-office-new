<div id='calendar'></div>


<script type="text/javascript">
    var viewmodeW76F4050 = "";
    $(document).ready(function () {
        var rooms =
                {!! $meetingRoomList !!}
        var events = [
                {
                    url: '{{url('w76f2230/loadCalendar')}}',
                    cache: false,
                    method: 'post',
                    data: function () { // a function that returns an object
                        return {
                            dynamic_value: Math.random(),
                            //ay: {{--{{json_encode($all)}}--}},
                            //mode: 1,
                            // faci: $('#slFacilityIDW76F4050').val(),
                            // view: viewmodeW76F4050
                        };
                    }
                }/*,s
                {
                    "resourceId": "b",
                    title: 'Event Title1',
                    start: '2018-09-17T13:13:55.008',
                    end: '2018-09-17T13:13:55.008'
                },
                {
                    "resourceId": "d",
                    title: 'Event Title3',
                    start: '2018-09-17T13:13:55.008',
                    end: '2018-09-17T13:13:55.008'
                }*/
            ];

        var events = {!! $newsCollection !!};
        $('#calendar').fullCalendar({
            //disableDragging: true,
            selectOverlap: false,
            eventOverlap: false,
            //editable: false,
            title: "HELLO BUM",
            defaultView: 'timeline',
            defaultDate: '2018-09-17',
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
            //minTime: '07:00',
            //maxTime: '10:30',
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'timelineDay'
            },
            height: 450,
            resourceLabelText: 'Danh sách phòng hợp',
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
                ;
                console.log(momentStart);

                var data = {
                    start: start,
                    end: end,
                    roomID: roomID,
                    date: date,
                    _token: '{{ csrf_token() }}'
                }
                showFormDialogPost("{{url('/w76f2231/add')}}", 'myModal', data);

                $('#calendar').fullCalendar('renderEvent', event, true); // stick? = true
                $('#calendar').fullCalendar('unselect');
            },
            eventRender: function (event, element, view) {
                //no code here
            },
            eventDrag: function (event) {
                //event.preventDefault();
            },
            eventDrop: function (event) {
                console.log("HELLO BUM");
                //Điều chỉnh booking drag & drop
                var timefrom = moment(event.start).format("HH:mm");
                var timeto = moment(event.end).format("HH:mm");
                var date = moment(event.end).format("YYYY-MM-DD");


                postMethod("{{url('/w76f2231/update')}}", function(res){

                }, event)
                console.log(event);
                console.log(timeto);
                console.log(date);

                //calEventObjW76F4050 = event;
                ///editBookingW76F4050(event.id, event.resourceId, timefrom, timeto, 2, date);
            },
            eventMouseover: function (event, domEvent) {
                //alert("eventMouseover")
            },
            eventMouseout: function (event, jsEvent, view) {
                //alert("eventMouseout")
            }

        });

    });
</script>
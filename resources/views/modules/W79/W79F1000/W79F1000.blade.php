@extends('layouts.layout')
@section('content')
    @parent
    <div class="card document-sidebar">
        <div class="card-header">
            <h4>{{ $title or '' }}</h4>
        </div>
        <div class="card-body" style="padding: 15px">
            <section>
                <div class="row mgb5">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="toolbarW77F1000">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <div id="calendarW79F1000" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script>
        $(document).ready(function () {

            $('#calendarW79F1000').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                weekNumbers: true,
                theme: true,
                fixedWeekCount: false,
                aspectRatio: 2,
                dayOfMonthFormat: 'ddd DD/MM',
                defaultDate: '{{date('Y-m-d')}}',
                navLinks: true, // can click day/week names to navigate views
                {{--@if (Auth::id() == $id)--}}
                editable: true,
                droppable: true,
                selectable: true,
                selectHelper: true,
                selectOverlap: false,
                select: function (start, end, event) {
                    var parent = $(event.target).parents(".fc-day-grid");
                    if (modeView != 'month' && parent.length < 1) {
                        var date = moment(start).format("YYYY-MM-DD");
                        setTimeout(function(){
                            $('#frmAddSchedule').find('#txtTitle').focus();
                        },1000);
                        $('#frmAddSchedule').find('#txtDate').val(date);
                        $('#frmAddSchedule').find('#hdDate').val(date);
                        $('#frmAddSchedule').find('#txtTitle').val('');
                        $('#frmAddSchedule').find('#hdMode').val(0);
                        $('#frmAddSchedule').find('#txtTimeFrom').val(moment(start).format("HH:mm"));
                        $('#frmAddSchedule').find('#txtTimeTo').val(moment(end).format("HH:mm"));
                        $('#frmAddSchedule').find('#chkStatus').prop('checked', false);
                        $('#modalAddSchedule').modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        });
                        $('#calendar').fullCalendar('unselect');
                    }
                },
                eventResize: function (event, delta, revertFunc) {
                    var id = event.id;
                    var s = moment(event.start).format("YYYY-MM-DD HH:mm:ss");
                    var e = moment(event.end).format("YYYY-MM-DD HH:mm:ss");
                    $.post("{{url('/addSchedule')}}",
                            {start: s, end: e, mode: 1, id: id, '_token': "{{csrf_token()}}"},
                            function (data, status) {

                            });

                },
                eventDrop: function (event, delta, revertFunc) {
                    var id = event.id;
                    var s = moment(event.start).format("YYYY-MM-DD HH:mm:ss");
                    var e = moment(event.end).format("YYYY-MM-DD HH:mm:ss");
                    $.post("{{url('/addSchedule')}}",
                            {start: s, end: e, mode: 1, id: id, '_token': "{{csrf_token()}}"},
                            function (data, status) {

                            });

                },
                eventMouseover: function (event, domEvent) {
                    bClickDel = false;
                    if (!$(this).hasClass("fc-day-grid-event")) {
                        $(this).off("click", "#delbut" + event.id);
                        $(this).find("#events-layer").remove();
                        var layer = '<div id="events-layer" class="fc-transparent" style="position:absolute;width:100%; height:100%; top:-1px; text-align:right; z-index:100"><a><span class="fa fa-trash text-red" id="delbut' + event.id + '" border="0" style="padding-right:5px; padding-top:2px;" /></a></div>';
                        $(this).append(layer);
                        var delbut = $("#delbut" + event.id);
                        delbut.hide();
                        delbut.fadeIn(300);
                        $(this).on('click', "#delbut" + event.id, function () {
                            bClickDel = true;
                            ask_delete(function () {
                                $.post("{{url('/addSchedule')}}",
                                        {mode: 2, id: event.id, '_token': "{{csrf_token()}}"},
                                        function (data, status) {
                                            if (status == 'success') {
                                                $('#calendar').fullCalendar('removeEvents', event.id);
                                            }
                                        });

                            });
                        });
                    }
                },
                eventMouseout: function (event, jsEvent, view) {
                    $(this).find("#delbut" + event.id).remove();
                },
                eventAfterAllRender: function (view) {
                    modeView = view.name;
                },
                eventClick: function (calEvent, jsEvent, view) {
                    if (bClickDel == false && !$(this).hasClass("fc-day-grid-event")) {
                        calEventObj = calEvent;
                        var date = moment(calEvent.start).format("YYYY-MM-DD");
                        $('#frmAddSchedule').find('#txtTitle').focus();
                        $('#frmAddSchedule').find('#txtDate').val(date);
                        $('#frmAddSchedule').find('#hdDate').val(date);
                        $('#frmAddSchedule').find('#txtTitle').val(calEvent.title);
                        $('#frmAddSchedule').find('#hdID').val(calEvent.id);
                        $('#frmAddSchedule').find('#hdMode').val(1);
                        $('#frmAddSchedule').find('#txtTimeFrom').val(moment(calEvent.start).format("HH:mm"));
                        $('#frmAddSchedule').find('#txtTimeTo').val(moment(calEvent.end).format("HH:mm"));
                        $('#frmAddSchedule').find('#chkStatus').prop('checked', calEvent.status == 1);
                        $('#modalAddSchedule').modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        });
                    }
                },
                {{--@endif--}}
                eventLimit: 4, // allow "more" link when too many events
                firstDay: 1,
                eventOverlap: false,
                defaultView: 'agendaWeek',
                minTime: '07:00:00',
                maxTime: '20:00:00',
                allDaySlot: false,
                textEscape: false,
                titleFormat: "(D/M/YYYY)",
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    dow: [1, 2, 3, 4, 5], // Monday - Thursday
                    start: '07:00', // a start time (10am in this example)
                    end: '20:00' // an end time (6pm in this example)
                },
                //eventSources: [fcSources.loads ],
                eventRender: function (event, element, view) {
                    var title = element.find('.fc-title, .fc-list-item-title');
                    title.html(title.text());
                    //Gán tooltip cho các event
                    if (event.status == '1')
                        element.addClass('private');
                    var start = moment(event.start).format("HH:mm");
                    var end = moment(event.end).format("HH:mm");
                    element.qtip({
                        content: {
                            title: start + " - " + end,
                            text: event.title
                        },
                        show: {solo: true},
                        style: 'qtip-light',
                        position: {
                            target: 'mouse', // Track the mouse as the positioning target
                            adjust: {x: 5, y: 5} // Offset it slightly from under the mouse
                        }
                    });
                },
                loading: function (isLoading, view) {
                    if (isLoading) {
                        //Fix lỗi duplicate event khi thêm mới và change mode view
                        $('#calendar').fullCalendar('removeEvents');
                    }
                },
                events: {
                    url: '{{url('/reloadSchedule')}}',
                    cache: false,
                    data: function () { // a function that returns an object
                        return {
                            dynamic_value: Math.random(),
                            id: '001'
                        };
                    }
                }
            });

        });
    </script>
@stop

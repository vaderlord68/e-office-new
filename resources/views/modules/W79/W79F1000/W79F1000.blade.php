@extends('layouts.layout')
@section('content')
    @parent
    <div class="card lich-lam-viec">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg9">
                    <h4>{{ $title or '' }}</h4>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <select name="employee" id="slEmployeeW79F1000"
                            class="form-control" required>
                        {{--<option value="">--</option>--}}
                        @foreach($employeesList as $emp)
                            <option value="{{$emp->EmployeeID}}" data-div="{{ $emp->PositionName }}"
                                    {{ $emp->EmployeeID == $id ? 'selected' : '' }}>{{$emp->EmployeeName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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

    @include('modules.W79.W79F1001.W79F1001')

    <script>
        var modeView = '';
        var currentObj, bClickDel, showAll = 0;
        $(document).ready(function () {

            $('#slEmployeeW79F1000').on('change', function() {
                var EmpID = $(this).val();
                window.location.replace('{{url('/W79F1000/list/')}}/' + EmpID);
            });

            $('#slEmployeeW79F1000').select2({
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    return $('<span>' + state.text + '</span><br><small>' + $(state.element).data('div') + '</small>');
                }
            });

            $("#modalAddScheduleW79F1000").on('submit', '#frmAddScheduleW79F1000', function (e) {
                e.preventDefault();
                var form = $('#frmAddScheduleW79F1000');
                var TimeFrom = form.find('#txtTimeFromW79F1001').val();
                var TimeTo = form.find('#txtTimeToW79F1001').val();
                if (TimeFrom > TimeTo) {
                    $("#txtTimeFromW79F1001").get(0).setCustomValidity('{{ Helpers::getRS('Thoi_gian_khong_hop_le') }}');
                    form.find('#btnSubmitW79F1001').click();
                } else {
                    $.ajax({
                        method: "POST",
                        url: "{{url('/W79F1000/addSchedule')}}",
                        data: form.serialize(),
                        success: function (data) {
                            if (data == 0) {
                                $('.label-time').addClass('txtError');
                                $('.label-time').attr('title', 'Time is invalid!');
                                return;
                            }
                            var obj = jQuery.parseJSON(data);
                            if ($('#frmAddScheduleW79F1000').find('#hdMode').val() == 0) {
                                var eventData = {
                                    id: obj.AppID,
                                    title: obj.AppComment,
                                    start: obj.TimeStart,
                                    end: obj.TimeEnd,
                                    TaskID: obj.TaskID,
                                    TaskName: obj.TaskName,
                                };
                                $('#calendarW79F1000').fullCalendar('renderEvent', eventData, true); // stick? = true
                            } else {
                                currentObj.title = obj.AppComment;
                                currentObj.start = obj.TimeStart;
                                currentObj.end = obj.TimeEnd;
                                currentObj.TaskID = obj.TaskID;
                                currentObj.TaskName = obj.TaskName;
                                $('#calendarW79F1000').fullCalendar('updateEvent', currentObj);
                            }
                            $('#modalAddScheduleW79F1000').modal('hide');
                        }
                    });
                }
            });
            $('#calendarW79F1000').fullCalendar({
                customButtons: {
                    showAll: {
                        text: '{{ Helpers::getRS('Hien_thi_ca_ngay') }}',
                        click: function(event) {
                            var customButtons =  $('#calendarW79F1000').fullCalendar('option', 'customButtons');
                            if (showAll == 0) {
                                customButtons.showAll.text = '{{ Helpers::getRS('Gio_hanh_chinh') }}';
                                $('#calendarW79F1000').fullCalendar('option', {
                                    minTime: '00:00',
                                    maxTime: '23:59',
                                    customButtons: customButtons
                                });
                                showAll = 1;
                            } else {
                                customButtons.showAll.text = '{{ Helpers::getRS('Hien_thi_ca_ngay') }}';
                                $('#calendarW79F1000').fullCalendar('option', {
                                    minTime: '{{ $limitTime->BookingTimeFrom or '00:00:00' }}',
                                    maxTime: '{{ $limitTime->BookingTimeTo or '23:59:00' }}',
                                    customButtons: customButtons
                                });
                                showAll = 0;
                            }
                        }
                    }
                },
                header: {
                    left: 'prev,next today showAll',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: "{{ Helpers::getRS('Hom_nay') }}",
                    month: "{{ Helpers::getRS('Thang') }}",
                    week: "{{ Helpers::getRS('tuan') }}",
                    day: "{{ Helpers::getRS('Ngay') }}",
                },
                weekNumbers: true,
                theme: true,
                fixedWeekCount: false,
                aspectRatio: 2,
                slotLabelFormat:"HH:mm",
                dayOfMonthFormat: 'ddd DD/MM',
                defaultDate: '{{date('Y-m-d')}}',
                navLinks: true, // can click day/week names to navigate views
                @if (Auth::id() == $id)
                editable: true,
                droppable: true,
                selectable: true,
                selectHelper: true,
                selectOverlap: false,
                select: function (start, end, event) {
                    var parent = $(event.target).parents(".fc-day-grid");
                    console.log(parent);
                    if (modeView != 'month' && parent.length < 1) {
                        var date = moment(start).format("DD/MM/YYYY");
                        setTimeout(function(){
                            $('#frmAddScheduleW79F1000').find('#txtTitleW79F1001').focus();
                        },1000);
                        $('#modalAddScheduleW79F1000').find('.modal-title').html('{{ Helpers::getRS('Them_moi') }}');
                        $('#frmAddScheduleW79F1000').find('#txtDateW79F1001').val(date);
                        $('#frmAddScheduleW79F1000').find('#txtDateW79F1001').datepicker( "setDate" , date );
                        $('#frmAddScheduleW79F1000').find('#slWorkW79F1001').prop('selectedIndex', 0);
                        $('#frmAddScheduleW79F1000').find('#txtDescriptionW79F1001').val('');
                        $('#frmAddScheduleW79F1000').find('#hdMode').val(0);
                        $('#frmAddScheduleW79F1000').find('#txtTimeFromW79F1001').val(moment(start).format("HH:mm"));
                        $('#frmAddScheduleW79F1000').find('#txtTimeToW79F1001').val(moment(end).format("HH:mm"));
                        $('#modalAddScheduleW79F1000').modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        });
                        $('#calendarW79F1000').fullCalendar('unselect');
                    }
                },
                eventResize: function (event, delta, revertFunc) {
                    var id = event.id;
                    var d = moment(event.start).format("DD/MM/YYYY");
                    var s = moment(event.start).format("HH:mm");
                    var e = moment(event.end).format("HH:mm");
                    $.post("{{url('/W79F1000/addSchedule')}}",
                            {date: d, start: s, end: e, mode: 1, id: id,
                                title: event.title, works: event.TaskID,
                                '_token': "{{csrf_token()}}"},
                            function (data, status) {

                            });

                },
                eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                    var id = event.id;
                    var d = moment(event.start).format("DD/MM/YYYY");
                    var s = moment(event.start).format("HH:mm");
                    var e = moment(event.end).format("HH:mm");
                    $.post("{{url('/W79F1000/addSchedule')}}",
                            {date: d, start: s, end: e, mode: 1, id: id,
                                title: event.title, works: event.TaskID,
                                '_token': "{{csrf_token()}}"},
                            function (data, status) {
//                                $(el).popover('enable');
                            });

                },
                eventDragStart: function( event, jsEvent, ui, view ) {
                    window.eventScrolling = true;
                },
                eventDragStop: function( event, jsEvent, ui, view ) {
                    window.eventScrolling = false;
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
                                $.post("{{url('/W79F1000/addSchedule')}}",
                                        {mode: 2, id: event.id, '_token': "{{csrf_token()}}"},
                                        function (data, status) {
                                            if (status == 'success') {
                                                $('#calendarW79F1000').fullCalendar('removeEvents', event.id);
                                            }
                                        });

                            });
                        });
                    }
                },
                eventMouseout: function (event, jsEvent, view) {
                    $(this).find("#delbut" + event.id).remove();
                    $('.popover').popover('hide');
                },
                eventAfterAllRender: function (view) {
                    modeView = view.name;
                    switch (view.name) {
                        case "agendaDay":
                            var header = view.el.find('.fc-day-header');
                            var day = header.find('span').text();
                            header.find('span').text(getDayOfWeek(day));
                            break;
                        case "agendaWeek":
                            var header = view.el.find('.fc-day-header');
                            $.each(header, function (i, item) {
                                var day = $(item).find('a').text();
                                var dayOfWeek = 'CN';
                                if (i + 2 < 8) {
                                    dayOfWeek = 'T' + (i + 2);
                                }
                                day = dayOfWeek+ ' ' + day.substring(3);
                                $(item).find('a').text(day);
                            });
                            break;
                        case "month":
                            var header = view.el.find('.fc-day-header');
                            $.each(header, function (i, item) {
                                var day = $(item).find('span').text();
                                var dayOfWeek = 'CN';
                                if (i + 2 < 8) {
                                    dayOfWeek = 'T' + (i + 2);
                                }
                                $(item).find('span').text(dayOfWeek);
                            });
                            break;
                    }
                },
                eventClick: function (calEvent, jsEvent, view) {
                    if (bClickDel == false && !$(this).hasClass("fc-day-grid-event")) {
                        currentObj = calEvent;
                        var date = moment(calEvent.start).format("DD/MM/YYYY");
                        console.log(calEvent.title);
                        $('#modalAddScheduleW79F1000').find('.modal-title').html('{{ Helpers::getRS('Chinh_sua') }}');
                        $('#frmAddScheduleW79F1000').find('#hdID').val(calEvent.id);
                        $('#frmAddScheduleW79F1000').find('#txtDateW79F1001').val(date);
                        $('#frmAddScheduleW79F1000').find('#txtDateW79F1001').datepicker( "setDate" , date );
                        $('#frmAddScheduleW79F1000').find('#slWorkW79F1001').val(calEvent.TaskID);
                        $('#frmAddScheduleW79F1000').find('#txtDescriptionW79F1001').val(calEvent.title);
                        $('#frmAddScheduleW79F1000').find('#hdMode').val(1);
                        $('#frmAddScheduleW79F1000').find('#txtTimeFromW79F1001').val(moment(calEvent.start).format("HH:mm"));
                        $('#frmAddScheduleW79F1000').find('#txtTimeToW79F1001').val(moment(calEvent.end).format("HH:mm"));
                        $('#modalAddScheduleW79F1000').modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        });
                    }
                },
                @endif
                eventLimit: 4, // allow "more" link when too many events
                firstDay: 1,
                eventOverlap: false,
                defaultView: 'agendaWeek',
                minTime: '{{ $limitTime->BookingTimeFrom or '00:00:00' }}',
                maxTime: '{{ $limitTime->BookingTimeTo or '23:59:00' }}',
                allDaySlot: false,
                textEscape: false,
                views: {
                    month: {
                        titleFormat: '[{{ Helpers::getRS('Thang') }}] M YYYY',
                    },
                    week: {
                        titleFormat: 'DD/MM/YYYY',
                    },
                    day: {
                        titleFormat: 'DD/MM/YYYY',
                    }
                },
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    dow: [1, 2, 3, 4, 5], // Monday - Thursday
                    start: '{{ $limitTime->BookingTimeFrom or '00:00:00' }}', // a start time (0am in this example)
                    end: '{{ $limitTime->BookingTimeTo or '23:59:00' }}' // an end time (12pm in this example)
                },
                eventRender: function (event, element, view) {
                    var start = moment(event.start).format("HH:mm");
                    var end = moment(event.end).format("HH:mm");
                    if (view.name == 'month') {
                        var html = getEventMonth(event, start, end);
                        element.find('.fc-content').html(html);
                    } else {
                        element.find('.fc-title').html('<span style="font-weight: bold">' + event.TaskName + '</span><br><span style="font-size: 11px; font-style: italic;">' + event.title + '</span>');
                    }
                    if(window.eventScrolling) return;
                    if (typeof event.title != 'undefined') {
                        element.popover({
                            title: start + " - " + end,
                            content: function () {
                                return '<span style="font-weight: bold;"><i style="font-size: 7px;padding-right: 5px;" class="fas fa-circle"></i>'+event.TaskName +'</span><br><span>'+ event.title +'</span>';
                            },
                            trigger: 'hover',
                            placement: 'right',
                            container: 'body',
                            html: true
                        });
                    }
                },
                loading: function (isLoading, view) {
                    if (isLoading) {
                        //Fix lỗi duplicate event khi thêm mới và change mode view
                        $('#calendarW79F1000').fullCalendar('removeEvents');
                    }
                },
                events: {
                    url: '{{url('/W79F1000/getSchedules')}}',
                    cache: false,
                    data: function () { // a function that returns an object
                        return {
                            dynamic_value: Math.random(),
                            id: '{{$id}}'
                        };
                    }
                }
            });

            function getDayOfWeek(strEng) {
                switch (strEng) {
                    case "Monday":
                        return "{{ Helpers::getRS('Thu_2') }}";
                        break;
                    case "Tuesday":
                        return "{{ Helpers::getRS('Thu_3') }}";
                        break;
                    case "Wednesday":
                        return "{{ Helpers::getRS('Thu_4') }}";
                        break;
                    case "Thursday":
                        return "{{ Helpers::getRS('Thu_5') }}";
                        break;
                    case "Friday":
                        return "{{ Helpers::getRS('Thu_6') }}";
                        break;
                    case "Saturday":
                        return "{{ Helpers::getRS('Thu_7') }}";
                        break;
                    case "Sunday":
                        return "{{ Helpers::getRS('Chu_nhat') }}";
                        break;
                }
            }

            function getEventMonth(event, start, end) {
                var str = '<div class="fc-time">' + start + ' - ' + end + '</div>';
                str +=    '<div class="fc-title"><i style="font-size: 7px;padding-right: 5px;" class="fas fa-circle"></i>' + event.title + '</div>';
                return str;
            }

        });
    </script>
@stop

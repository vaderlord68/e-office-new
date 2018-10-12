@extends('layouts.layout')
@section('content')
    @parent
    <?php
    $divisionIDList = json_decode($divisionIDList);
    $divisionIDW76F2000 = $divisionIDList[0]->OrgunitName;
    ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div id="divFullCalendar">
                    @include('modules.W77.W77F2000.W77F2000_Calender')
                </div>
            </div>
        </div>
        <div class="row pdt10">
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
</style>

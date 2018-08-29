@extends('page.master')
@section('body_content')
    @parent
    News module will displayhere
    <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control">
        <div class="input-group-addon">
            <span class="fa fa-calendar"></span>
        </div>
    </div>
    <input class="form-control" type="text" id="txtFileSizeW09F4011" name="txtFileSizeW09F4011" value="" placeholder="">
    <input class="form-control" type="text" id="txtFileSizeW09F40112" name="txtFileSizeW09F4011" value="" placeholder="">
    <select class="form-control" id="cboTest">
        <option>--</option>
        <option>A</option>
        <option>B</option>
    </select>
    <button id="btnBootbox" type="button" class="btn btn-link">Bootbox</button>

    <script>
        $('.input-group').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            language: '{{Helpers::getLocale()}}'
        });
        $('#txtFileSizeW09F4011').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            //prefix: '$', //No Space, this will truncate the first character
            rightAlign: true

        });

        $("#txtFileSizeW09F40112").inputmask({
            alias: "datetime",
            mask: "h:s",
            placeholder: "__:__"
        });

        $("#cboTest").select2();

        $("#btnBootbox").click(function(){
            //save_ok();
            ask_save(function(){
                alert("Yes")
            },null,null, function(){}, null);
        });
    </script>
@stop

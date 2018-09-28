
<div class="alert-message hide">
    <div id="divErrorMessage" class="row hide">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-danger alert-dismissible fade show mgb0" role="alert">
                <span class="badge badge-pill badge-danger">Error</span><span id="msgErrorMessage" class="mgl5"></span>
                <button type="button" class="close hide" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <div id="divSuccessMessage" class="row hide">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert  alert-success alert-dismissible fade show mgb0" role="alert">
                <span class="badge badge-pill badge-success">Success</span> <span id="msgSuccessMessage" class="mgl5"></span>
                <button type="button" class="close hide" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(".alert-message").find('.close').click(function(){
        $('.alert-message').addClass('hide');
    });


    function alertError($str, $parent){
        var $parent = typeof $parent !== 'undefined' ? $parent : null;
        if($parent == null){
            $(".alert-message").removeClass('hide');
            //hide success
            $("#divSuccessMessage").addClass('hide');
            //show error
            $("#divErrorMessage").removeClass("hide");
            //set the value of error message
            $("#divErrorMessage").find("#msgErrorMessage").html($str);
        }else{
            $parent.find(".alert-message").removeClass('hide');
            //hide success
            $parent.find("#divSuccessMessage").addClass('hide');
            //show error
            $parent.find("#divErrorMessage").removeClass("hide");
            //set the value of error message
            $parent.find("#divErrorMessage").find("#msgErrorMessage").html($str);
        }


    }

    function alertSuccess($str, $parent){
        var $parent = typeof $parent !== 'undefined' ? $parent : null;
        if($parent == null){
            //hide error
            $("#divErrorMessage").addClass('hide');
            //show success
            $("#divSuccessMessage").removeClass("hide");
            //set the value of error message
            $("#divSuccessMessage").find("#msgSuccessMessage").html($str);
            $(".alert-message").removeClass('hide');
        }else{
            //hide error
            $parent.find("#divErrorMessage").addClass('hide');
            //show success
            $parent.find("#divSuccessMessage").removeClass("hide");
            //set the value of error message
            $parent.find("#divSuccessMessage").find("#msgSuccessMessage").html($str);
            $parent.find(".alert-message").removeClass('hide');
        }



    }

    function hideAlert(){
        $("#divSuccessMessage").addClass('hide');
        $("#divErrorMessage").addClass('hide');
        $("#divSuccessMessage").val('');
        $("#divErrorMessage").val('');
    }
</script>

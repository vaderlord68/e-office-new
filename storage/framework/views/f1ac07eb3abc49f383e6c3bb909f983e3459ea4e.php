
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



</script>

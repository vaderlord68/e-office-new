<div id="divWarningMessage" class=" alert alert-warning alert-dismissible fade hide" role="alert">
    <strong>Error: </strong> <span id="spanErrorMessage"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="hide">×</span>
    </button>
</div>
<div  id="divSuccessMessage" class=" alert alert-success alert-dismissible fade hide" role="alert">
    <strong>Success: </strong> <span id="spanSuccessMessage"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="hide">×</span>
    </button>
</div>

<script>
    function showWarningMessage(str) {
        $("#divWarningMessage").removeClass("hide");
        $("#divWarningMessage").addClass("show");
        $("#divWarningMessage").find('#spanErrorMessage').html(str);
        $("#divSuccessMessage").addClass("hide");
    }
    function showSuccessMessage(str) {
        $("#divSuccessMessage").removeClass("hide");
        $("#divSuccessMessage").addClass("show");
        $("#divSuccessMessage").find('#spanSuccessMessage').html(str);
        $("#divWarningMessage").addClass("hide");
    }

    function clearMessage(str) {
        $("#divSuccessMessage").addClass("hide");
        $("#divWarningMessage").addClass("hide");
    }
</script>
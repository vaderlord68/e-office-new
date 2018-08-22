$(document).ready(function () {
    $(window).resize(function(){
        if ($(window).width() <= 576) {
            $( "body" ).removeClass( "open" );
        }
    });
    $( ".user-area" ).hover(
        function() {
            $( this ).find('.user-menu').css( "display", "block" );
        }, function() {
            $( this ).find('.user-menu').css( "display", "none" );
        }
    );
    $("button.btn-secondary").click(function(){
        $(this).parent().find(".dropdown-menu").fadeToggle(500);
    });
});
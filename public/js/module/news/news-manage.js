var $ = jQuery.noConflict();


$(document).ready(function () {

    /** Delete folder **/
    $(document).on("click", "#bi-deleteNews", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var url = '/news/delete';
        $.ajax({
            url: url,
            type: "get",
            dataType: "text",
            success: function (result) {
                $(location).attr('href', '/news')
            }
        });
    });

});
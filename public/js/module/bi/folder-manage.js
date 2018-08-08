var $ = jQuery.noConflict();
$(document).ready(function () {
    /** Create new folder button click **/
    $("#createNewFolder").click(function () {

    });
    /** Save new folder button click **/
    $("#saveNewFolder").click(function () {

    });
    /** Delete folder button click **/
    $("#deleteFolder").click(function () {

    });
    /** Rename folder button click **/
    $("#renameFolder").click(function () {

    });
    $('#folderTree').jstree({
        'core': {
            'multiple': false,
        }
    });
    $('#folderTree')
    // listen for event
        .on('changed.jstree', function (e, data) {
            var selectedFolderId = data.node.li_attr.folder_id;
            $.ajax({
                url: "/bi/folder/view",
                type: "post",
                dataType: "text",
                data: {
                    FolderId: selectedFolderId
                },
                success: function (result) {
                    ajaxContent.fadeToggle();
                    setTimeout(function () {
                        toggleLoading();
                        var resultData = $.parseJSON(result);
                        ajaxContent.fadeToggle();
                        ajaxContent.html(resultData.viewHtml);
                    }, 500)
                }
            });
        })
        .jstree();
});
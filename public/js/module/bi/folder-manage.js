var $ = jQuery.noConflict();
$(document).ready(function () {
    var ajaxContent = $(".folder-content");

    if (typeof previousUrl !== "undefined") {
        var secretUrl = previousUrl + "&secret=1";
        viewFolderAjax(secretUrl);
        changeHistoryState(previousUrl);
    }

    /** Create new folder button click **/
    $(document).on("click", "#bi-createFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var url = '/bi/folder/create/index' + '?FolderParentID=' + selectedFolderId;
        $.ajax({
            url: url,
            type: "get",
            dataType: "text",
            success: function (result) {
                var resultData = $.parseJSON(result);
                ajaxContent.html(resultData.viewHtml);
            }
        });
        changeHistoryState(url);
    });
    /** Rename folder **/
    $(document).on("click", "#bi-renameFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var url = '/bi/folder/rename/index?SelectedFolderId=' + selectedFolderId;
        $.ajax({
            url: url,
            type: "get",
            dataType: "text",
            success: function (result) {
                var resultData = $.parseJSON(result);
                ajaxContent.html(resultData.viewHtml);
            }
        });
        changeHistoryState(url);
    });
    /** Delete folder **/
    $(document).on("click", "#bi-deleteFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var url = '/bi/folder/delete/execute?SelectedFolderId=' + selectedFolderId;

        if (confirm('Do you want to delete this folder?')) {
            $.ajax({
                url: url,
                type: "get",
                dataType: "text",
                success: function (result) {
                    $(location).attr('href', '/bi')
                }
            });
        }


    });

    /** Init Folder Tree **/
    $('#folderTree').jstree({
        'core': {
            'multiple': false,
        }
    });


    /** Detect folder selected event on Folder Tree **/
    $('#folderTree')
    // listen for event
        .on('changed.jstree', function (e, data) {
            var selectedFolderId = data.node.li_attr.folder_id;
            localStorage.setItem("currentSelectedFolderId", selectedFolderId);
            var stateUrl = "/bi/folder/view?FolderId=" + selectedFolderId;
            var secretUrl = stateUrl + "&secret=1";
            viewFolderAjax(secretUrl);
            changeHistoryState(stateUrl);
        })
        .jstree();
    /** Detect state changed **/
    window.onpopstate = function (event) {
        // do stuff here
        var stateUrl = window.location.href.toString().split(window.location.host)[1];
        var secretUrl = stateUrl + "&secret=1";
        viewFolderAjax(secretUrl);
        changeHistoryState(stateUrl);
    }

    /** Function to call viewFolder action by Ajax **/
    function viewFolderAjax(url) {
        $.ajax({
            url: url,
            type: "get",
            dataType: "text",
            success: function (result) {
                var resultData = $.parseJSON(result);
                ajaxContent.html(resultData.viewHtml);
            }
        });
    }

    /** Change history state to specific Url **/
    function changeHistoryState(url) {
        window.history.pushState(null, null, url);
    }

    /** Set up context menu**/
    context.init({
        fadeSpeed: 100,
        filter: function ($obj) {
        },
        above: 'auto',
        preventDoubleContext: true,
        compress: false,
    });
    var subMenus = [
        {
            text: "Open",
            // href: "/",
            action: function (event) {
                alert('Open folder by context menu is coming soon')
            }
        },
        {
            text: "Create New Folder",
            // href: "/",
            action: function (event) {
                alert('Create new folder by context menu is coming soon')
            }
        },
        {
            text: "Create New Document",
            // href: "/",
            action: function (event) {
                alert('Create New Document by context menu is coming soon')
            }
        },
        {
            text: "Rename",
            // href: "/",
            action: function (event) {
                alert('Rename folder by context menu is coming soon')
            }
        },
        {
            text: "Delete",
            // href: "/",
            action: function (event) {
                alert('Delete folder by context menu is coming soon')
            }
        },
    ]
    var fileManagerContextMenus = [
        {
            text: "Refresh",
            href: "/bi",
        }
    ]
    // context.attach(".jstree-anchor",subMenus);
    // context.attach(".content .module-bi",fileManagerContextMenus);

});
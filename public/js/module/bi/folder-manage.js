var $ = jQuery.noConflict();


$(document).ready(function () {

    var ajaxContent = $(".folder-content");

    if (typeof previousUrl !== "undefined") {
        var secretUrl = previousUrl + "&secret=1";
        viewFolderAjax(secretUrl);
        //changeHistoryState(previousUrl);
    }

    /** Back button on toolbar **/
    $(document).on("click", "#bi-backFolder", function (e) {
        e.preventDefault();
        if (typeof parentFolderId !== "undefined") {
            var stateUrl = "/bi/folder/view?FolderId=" + parentFolderId;
            var secretUrl = stateUrl + "&secret=1";
            localStorage.setItem("currentSelectedFolderId", parentFolderId);
            var treeElement = $('li[folder_id="'+ parentFolderId + '"]');
            localStorage.setItem("previousUrl",window.location.href);
            $("#folderTree").jstree("open_all");
            $("#folderTree").jstree("deselect_all",true);
            $('#folderTree').jstree('select_node', treeElement.attr("id"));
            viewFolderAjax(secretUrl);
            //changeHistoryState(stateUrl);
        }

    });

    /** Double click to open folder on grid **/
    $(document).on("dblclick", ".bi-table-item", function (e) {
        var _this = $(this);
        var stateUrl = "/bi/folder/view?FolderId=" + _this.attr("folder_id");
        var secretUrl = stateUrl + "&secret=1";
        localStorage.setItem("currentSelectedFolderId", _this.attr("folder_id"));
        var treeElement = $('li[folder_id="'+ _this.attr("folder_id") + '"]');
        $("#folderTree").jstree("open_all");
        $("#folderTree").jstree("deselect_all",true);
        $('#folderTree').jstree('select_node', treeElement.attr("id"));
        localStorage.setItem("previousUrl",window.location.href);
        viewFolderAjax(secretUrl);
        //changeHistoryState(stateUrl);
    });

    /** Create new folder button click **/
    $(document).on("click", "#bi-createFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var stateUrl = '/bi/folder/create/index' + '?FolderParentID=' + selectedFolderId;
        var secretUrl = stateUrl + "&secret=1";
        $.ajax({
            url: secretUrl,
            type: "get",
            dataType: "text",
            success: function (result) {
                var resultData = $.parseJSON(result);
                ajaxContent.html(resultData.viewHtml);
            }
        });
        localStorage.setItem("previousUrl",window.location.href);
        //changeHistoryState(stateUrl);
    });
    /** Rename folder **/
    $(document).on("click", "#bi-renameFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var stateUrl = '/bi/folder/rename/index?SelectedFolderId=' + selectedFolderId;
        var secretUrl = stateUrl + "&secret=1";
        $.ajax({
            url: secretUrl,
            type: "get",
            dataType: "text",
            success: function (result) {
                var resultData = $.parseJSON(result);
                ajaxContent.html(resultData.viewHtml);
            }
        });
        localStorage.setItem("previousUrl",window.location.href);
        //changeHistoryState(stateUrl);
    });
    /** Delete folder **/
    $(document).on("click", "#bi-deleteFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var url = '/bi/folder/delete/execute?SelectedFolderId=' + selectedFolderId;

        $.ajax({
            url: url,
            type: "get",
            dataType: "text",
            success: function (result) {
                $(location).attr('href', '/bi')
            }
        });
        localStorage.setItem("previousUrl",window.location.href);

    });

    /** Init Folder Tree **/
    $('#folderTree').jstree({
        'core': {
            'multiple': false,
        }
    });
    /** Expand all on load **/
    $("#folderTree").jstree("open_all");

    /** Detect folder selected event on Folder Tree **/
    $('#folderTree')
    // listen for event
        .on('changed.jstree', function (e, data) {
            var selectedFolderId = data.node.li_attr.folder_id;
            localStorage.setItem("currentSelectedFolderId", selectedFolderId);
            var stateUrl = "/bi/folder/view?FolderId=" + selectedFolderId;
            var secretUrl = stateUrl + "&secret=1";
            localStorage.setItem("previousUrl",window.location.href);
            viewFolderAjax(secretUrl);
            //changeHistoryState(stateUrl);
        })
        .jstree();
    /** Detect state changed **/
    window.onpopstate = function (event) {
        // do stuff here
        var stateUrl = window.location.href.toString().split(window.location.host)[1];
        var secretUrl = stateUrl + "&secret=1";
        viewFolderAjax(secretUrl);
        //changeHistoryState(stateUrl);
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
        // preventDoubleContext: true,
        compress: false,
        relatedTarget: this
    });
    var subMenus = [
        {
            text: "Open",
            // href: "/",
            action: function (event) {
                console.log(event);
                // alert('Open folder by context menu is coming soon')
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
    // context.attach(".module-bi .bi-table-item",subMenus);
    // context.attach(".content .module-bi",fileManagerContextMenus);

});
/*! AdminLTE app.js
 * ================
 * Main JS application file for AdminLTE v2. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive AdminLTE plugins.
 *
 * @Author  Almsaeed Studio
 * @Support <http://www.almsaeedstudio.com>
 * @Email   <support@almsaeedstudio.com>
 * @version 2.1.2
 * @license MIT <http://opensource.org/licenses/MIT>
 */

'use strict';
//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
    throw new Error("AdminLTE requires jQuery");
}

function showFormDialogPost(url, id, data ,callbackAfterShowModal,param, callbackAfterCloseModal) {
    var cb = typeof callbackAfterShowModal !== 'undefined' ? callbackAfterShowModal : null;
    var pr = typeof param !== 'undefined' ? param : null;
    var eventClose = typeof callbackAfterCloseModal !== 'undefined' ? callbackAfterCloseModal : null;
    $(".l3loading").removeClass('hide');
    var divParent;
    var d = new Date();
    var suffix = d.getTime();
    var divParent = "divModalChild_" + suffix.toString();
    var parentNode = document.createElement("div");
    parentNode.id = divParent;
    $("#divModalContainer").append(parentNode);
    /*if (popupLevel == undefined || popupLevel == null || popupLevel == "") {
        divParent = $("#myModal");
    }
    if (Number(popupLevel) == 2) {
        divParent = $("#myModal02");
    }
    if (Number(popupLevel) == 3) {
        divParent = $("#myModal03");
    }
    if (Number(popupLevel) == 4) {
        divParent = $("#myModal04");
    }
    if (Number(popupLevel) == 5) {
        divParent = $("#myModal05");
    }
    if (Number(popupLevel) == 6) {
        divParent = $("#myModal06");
    }
    if (Number(popupLevel) == 7) {
        divParent = $("#myModal07");
    }
    if (Number(popupLevel) == 8) {
        divParent = $("#myModal08");
    }
    if (Number(popupLevel) == 9) {
        divParent = $("#myModal09");
    }*/
    $.ajax({
        method: 'POST',
        url: url,
        data: data,
        success: function (data) {
            $("#" + divParent).html(data);


            $('#' + id).on('hidden.bs.modal', function () {
                //console.log("hidden");
                $(".no-menu-alert").load(url_alert);
                if (eventClose != null){
                    eventClose.call(null, null);
                }

                var ob = $("#" + divParent).find("div.modal:visible");
                if (ob.length == 0) {
                    $("#" + divParent).find('.pq-grid').pqGrid("destroy");
                    $("#" + divParent).children().off();
                    //$("#" + divParent).html("");
                    console.log($("#" + divParent));
                    $("#" + divParent).remove();

                }
                if ($(document).find("div.modal").size() > 1)
                    $("div.modal-backdrop.fade.in").last().remove();

            });

            $('#' + id).on('show.bs.modal', function () {
                //alert("show");
                if (cb != null) cb.call(null, pr);

            });
            $('#' + id).modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
            $('#' + id).draggable({
                handle: ".modal-header"
            });
            $(".l3loading").addClass('hide');
        }
    });
}

function showFormDialogGet(url, id, data, popupLevel,callbackAfterShowModal,param, callbackAfterCloseModal) {

    var cb = typeof callbackAfterShowModal !== 'undefined' ? callbackAfterShowModal : null;
    var pr = typeof param !== 'undefined' ? param : null;
    var eventClose = typeof callbackAfterCloseModal !== 'undefined' ? callbackAfterCloseModal : null;
    $(".l3loading").removeClass('hide');
    var divParent;
    var d = new Date();
    var suffix = d.getTime();
    var divParent = "divModalChild_" + suffix.toString();
    var parentNode = document.createElement("div");
    parentNode.id = divParent;
    $("#divModalContainer").append(parentNode);
    /*if (popupLevel == undefined || popupLevel == null || popupLevel == "") {
        divParent = $("#myModal");
    }
    if (Number(popupLevel) == 2) {
        divParent = $("#myModal02");
    }
    if (Number(popupLevel) == 3) {
        divParent = $("#myModal03");
    }
    if (Number(popupLevel) == 4) {
        divParent = $("#myModal04");
    }
    if (Number(popupLevel) == 5) {
        divParent = $("#myModal05");
    }
    if (Number(popupLevel) == 6) {
        divParent = $("#myModal06");
    }
    if (Number(popupLevel) == 7) {
        divParent = $("#myModal07");
    }
    if (Number(popupLevel) == 8) {
        divParent = $("#myModal08");
    }
    if (Number(popupLevel) == 9) {
        divParent = $("#myModal09");
    }*/

    $.ajax({
        method: 'GET',
        url: url,
        data: data,
        success: function (data) {
            $("#" + divParent).html(data);


            $('#' + id).on('hidden.bs.modal', function () {

                //console.log("hidden");
                $(".no-menu-alert").load(url_alert);
                if (eventClose != null){
                    eventClose.call(null, null);
                }

                var ob = $("#" + divParent).find("div.modal:visible");
                if (ob.length == 0) {
                    $("#" + divParent).find('.pq-grid').pqGrid("destroy");
                    $("#" + divParent).children().off();
                    //$("#" + divParent).html("");
                    console.log($("#" + divParent));
                    $("#" + divParent).remove();

                }
                if ($(document).find("div.modal").size() > 1)
                    $("div.modal-backdrop.fade.in").last().remove();

            });

            $('#' + id).on('show.bs.modal', function () {
                //alert("show");
                if (cb != null) cb.call(null, pr);

            });
            $('#' + id).modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
            $('#' + id).draggable({
                handle: ".modal-header"
            });
            $(".l3loading").addClass('hide');
        }
    });
}

function postMethod(url, callback, param) {
    //console.log("postMethod");
    var cb = typeof callback !== 'undefined' ? callback : null;
    var pr = typeof param !== 'undefined' ? param : null;
    //$(".l3loading").removeClass('hide');
    $.ajax({
        method: "POST",
        url: url,
        data: param,
        success: function (data) {
            //$(".l3loading").addClass('hide');
            if (cb != null) cb.call(null, data);
        }
    });
}

function getMethod(url, callback, param) {
    var cb = typeof callback !== 'undefined' ? callback : null;
    var pr = typeof param !== 'undefined' ? param : null;
    $.ajax({
        method: "GET",
        url: url,
        data: param,
        success: function (data) {
            callbackClose(cb, pr);
        }
    });
}

function callbackClose(cb, pr) {
    $("#divConfirm").on('hidden.bs.modal', function () {
        if (cb != null) cb.call(null, pr);
    });
}

function doDraggable() {
    $('.draggable.modal').find('.modal-content').draggable({
        cursor: 'move',
        handle: '.modal-header'
    });
}

$(document).ready(function () {
    doDraggable();
});

$(document).ajaxComplete(function () {
    doDraggable();
});

// var curEl;
// $(document).on('focus', 'input', function (e) {
//     curEl = $(this).parents('form');
//     $(this).next().focus();
// });
//
// $(document).on("keypress", 'form', function (e) {
//     var code = e.keyCode || e.which;
//     if (code == 13 && e.target.type != "textarea") {
//         e.preventDefault();
//         $(curEl).next().find("input").focus();
//         return false;
//     }
// });

//history.pushState(null, null, ''); //khanh turn off this function
window.addEventListener('popstate', function (event) {
    //history.pushState(null, null, '');
});

//return ra chuỗi
function format2(n, currency, dec) {
    var decimal = "";
    for (var i = 0; i < dec; i++) {
        decimal = decimal + "\d";
    }
    n = parseFloat(Number(n).toFixed(dec));
    if (dec > 0)
        return currency + "" + n.toFixed(dec).replace(/(\d)(?=(decimal)+(?!\d))/g, "$1,");
    else
        return n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}

function formatNum(num, dec, bZero) {
    if (bZero == undefined)
        bZero = true;
    if (bZero == false && (num == "" || num == 0))
        return "";
    var result = format2(num, "", dec);
    return result;
}

function locdau(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
    str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
    // str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    return str;
}

function change2grid(table, gridID, newObj, config, summaryData, showPaging) {
    var tbl = $(table);
    var obj = $.paramquery.tableToArray(tbl);

    jQuery.each(config, function (i, val) {
        jQuery.each(val, function (idx, vl) {
            var idex = parseInt(i);
            obj.colModel[idex][idx] = vl;
        })
    });
    newObj.dataModel = {data: obj.data};
    newObj.colModel = obj.colModel;
    newObj.pageModel = {rPP: 20, type: "local"};

    if (summaryData != null) {
        var $summary = "";
        newObj.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            if (showPaging == undefined || showPaging == false)
                $(gridID).find(".pq-grid-footer").hide();
        };
        newObj.refresh = function (evt, ui) {
            var data = [summaryData]; //2 dimensional
            var obj = {data: data, $cont: $summary};
            $(this).pqGrid("createTable", obj);
            if (showPaging == undefined || showPaging == false)
                $(gridID).find(".pq-grid-footer").hide();
        };
    }
    ;
    $(gridID).pqGrid(newObj);
    tbl.css("display", "none");
}

//Khanh note
//Hàm này chỉ có tác dụng với lưới có type = row, bằng cell thì không được.
function getRowIndx($grid) {
    //console.log("getRowIndex");
    var arr = $grid.pqGrid("selection", {type: 'row', method: 'getSelection'});
    if (arr && arr.length > 0) {
        return arr[0].rowIndx;
    }
    else {
        return null;
    }
}

function getRowSelection($grid) {
    if ($grid.pqGrid("selection", {type: 'row', method: 'getSelection'}).length > 0) {
        return $grid.pqGrid("selection", {type: 'row', method: 'getSelection'})[0].rowData;
    } else {
        return null;
    }

}

function update4ParamGrid($grid, row, mod, callback, param) {
    var cb = typeof callback !== 'undefined' ? callback : null;
    var pr = typeof param !== 'undefined' ? param : null;
    var rowIndx;
    switch (mod) {
        case 'edit':
            rowIndx = getRowIndx($grid);
            $grid.pqGrid("updateRow", {rowIndx: rowIndx, newRow: row, checkEditable: false});
            $grid.pqGrid("refreshDataAndView");
            break;
        case 'add':
            $grid.pqGrid("addRow",
                {newRow: row, rowIndx: 0,checkEditable: false}
            );
            $grid.pqGrid("setSelection", {rowIndx: 0});
            break;
        case 'delete':
            rowIndx = getRowIndx($grid);
            $grid.pqGrid("deleteRow", {rowIndx: rowIndx});
            $grid.pqGrid("setSelection", {rowIndx: rowIndx});
            $grid.pqGrid("refreshDataAndView");
            break;
        default :
            break;
    }
    if (cb != null) cb.call(null, pr);

}

//Change m/d/y => d/m/y va nguoc lai
function changeFormat(value) {
    var d1 = value ? value.split('/') : null;
    return value ? d1[1] + '/' + d1[0] + '/' + d1[2] : "";
}

//Change m/d/y => d-m-y va nguoc lai
function changeFormat2(value) {
    var d1 = value ? value.split('/') : null;
    return value ? d1[1] + '-' + d1[0] + '-' + d1[2] : "";
}

//Kiem tra dateCheck co nam trong dateFrom và dateTo ko?
function dateCheck(dateFrom, dateTo, dateCheck) {
    var fDate, lDate, cDate;
    fDate = Date.parse(changeFormat(dateFrom));
    lDate = Date.parse(changeFormat(dateTo));
    cDate = Date.parse(changeFormat(dateCheck));
    if ((cDate <= lDate && cDate >= fDate)) {
        return true;
    }
    return false;
}

//Hàm add calender cho filterbar trên lưới
function pqDatePicker(ui) {
    var $this = $(this);
    $this
        .css({zIndex: 3, position: "relative"})
        .datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            onClose: function (evt, ui) {
                $(this).focus();
            }
        });
}

function correctNumber(v) {
    var v = l3Number(v);
    return Math.round(v * 1000000) / 1000000;
}

function destroyClickedElement(event) {
    document.body.removeChild(event.target);
}

//Hàm dùng resize pqGrid
function resizePqGrid() {
    $(".pq-grid").each(function () {
        $(this).pqGrid("refreshDataAndView");
    });
}

function findIndexJson(jsn, key, value) {
    for (var i = 0; i < jsn.length; i++) {
        if (jsn[i][key] == value)
            return i;
    }
    return -1;
}

//Author: Khanh
//Chữ hoa kí tự đầu
String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

//Author: Khanh
//Co dấu sang không dấu
function utf8_to_ascii(str) {
    //str= str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/Ỳ|Ý|Y|Ỷ|Ỹ/g, "Y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/Đ/g, "D");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "_");
    str = str.replace(/-+-/g, "_"); //thay thế 2- thành 1-
    str = str.replace(/^\-+|\-+$/g, "");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    return (str);
}

//Function: khởi tạo các mãng dữ liệu title, dataIndx, align trước khi xuất excel
//Input: Grid
//Output: Title, DataIndx, Align
function initExportExcell(inGrid, outTitle, outDataIndx, outAlign, outFormat) {
    updateValuesToGrid(inGrid);
    //console.log("Debug");
    var getColModel = inGrid.pqGrid("getColModel");
    for (var i = 0; i < getColModel.length; i++) {
        if (getColModel[i]['isExport'] == undefined || getColModel[i]['isExport'] == true) {
            outTitle.push(getColModel[i]['title']);
            outDataIndx.push(getColModel[i]['dataIndx']);
            if (getColModel[i]['align'] == undefined)
                outAlign.push("left");
            else
                outAlign.push(getColModel[i]['align']);
        }

        if (getColModel[i]['format'] == undefined && (getColModel[i]['isExport'] == undefined || getColModel[i]['isExport'] == true)) {
            outFormat.push("");
        } else if (getColModel[i]['isExport'] == undefined || getColModel[i]['isExport'] == true) {
            outFormat.push(getColModel[i]['format']);
        }
    }



}

function getFormat4ExcelTemplate(grid) {
    //console.log("sdfds");
    var data = grid.pqGrid("option", "dataModel.data");
    var getColModel = grid.pqGrid("getColModel");
    var arr = new Array();
    for (var j = 0; j < getColModel.length; j++) {
        if (getColModel[j].dataType == "float" && getColModel[j].numberFormat != "") {
            var person = {
                FieldName: getColModel[j].dataIndx,
                Type: "D",
                DataType: "N",
                DecimalPlaces: getColModel[j].numberFormat
            };
            arr.push(person);
        }

    }
    return arr;
}

//update values from Grid to dataModal before generating excel
function updateValuesToGrid(grid) {
    var data = grid.pqGrid("option", "dataModel.data"); // this is array
    for (var i = 0; i < data.length; i++) {
        var getColModel = grid.pqGrid("getColModel");
        for (var j = 0; j < getColModel.length; j++) {
            //console.log(typeof getColModel[j].numberFormat);
            if (typeof getColModel[j].numberFormat != 'undefined') {
                data[i][getColModel[j]['dataIndx']] = format2(data[i][getColModel[j].dataIndx], "", getColModel[j].numberFormat)
            }
        }
    }
}

function timeStringToFloat(time) {
    var hoursMinutes = time.split(/[.:]/);
    var hours = parseInt(hoursMinutes[0], 10);
    var minutes = hoursMinutes[1] ? parseInt(hoursMinutes[1], 10) : 0;
    return hours + minutes / 60;
}

//convert size in bytes to KB, MB, GB in Javascript
function formatBytes(bytes, decimals) {
    if (bytes == 0) return '0 Byte';
    var k = 1000;
    var dm = decimals + 1 || 3;
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    var i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

//Kiem tra bat buoc nhap tren chrome, boi vi DOMSubtreeModified chi chay trên firefox
function validationElements($form, callback) {
    var elements = $form.find("input:required, textarea:required");
    console.log(elements);
    var obj_lang = JSON.parse(lang_text);
    for (var i = 0; i < elements.length; i++) {
        if ($(elements[i]).prop('required') && $(elements[i]).val() == "") {
            //alert("sdfsdf");
            $(elements[i]).get(0).setCustomValidity(obj_lang.languages[6].msg);
        }
        else {
            $(elements[i]).get(0).setCustomValidity("");
        }

    }

    var elements = $form.find("select:required");
    console.log(elements);
    var obj_lang = JSON.parse(lang_text);
    for (var i = 0; i < elements.length; i++) {
        if ($(elements[i]).prop('required') && $(elements[i]).val() == "") {
            //alert("sdfsdf");
            $(elements[i]).get(0).setCustomValidity(obj_lang.languages[7].msg);
        }
        else {
            $(elements[i]).get(0).setCustomValidity("");
        }

    }

    var cb = typeof callback !== 'undefined' ? callback : null;
    var pr = null;
    if (cb != null) cb.call(null, pr);
}

function isNullOrEmpty(val) {
    return (val === null || val === "" || val === undefined) ? true : false;
}

function undefinedToOne(value, rowData) {
    return value == undefined || value === "" || value == null ? 1 : value.toString().replace(/,/g, '');
}

function undefinedToZero(value, rowData) {
    return value == undefined || value === "" || value == null ? 0 : value.toString().replace(/,/g, '');
}

//wait until
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

var setEmailValues = function (div, from, to, title, body, cc, bcc, isshow) {
    $(div).find("#mPopUpSendMail").find("#hdFrom").val(from);
    $(div).find("#mPopUpSendMail").find("#txtEmailReceivedAddress").val(to);
    $(div).find("#mPopUpSendMail").find("#txtEmailTitle").val(title);
    $(div).find("#mPopUpSendMail").find("#txtEmailCCAddress").val(cc);
    $(div).find("#mPopUpSendMail").find("#txtEmailBCCAddress").val(bcc);
    $(div).find("#mPopUpSendMail").find("#txtEmailContent").html(body);
    CKEDITOR.instances.txtEmailContent.setData(body);
    if (isshow != 0)
        $(div).find("#mPopUpSendMail").modal('show');
};

//sumfooter cho tất cả cột số trên dưới dộng
function sumArray(arr, field) {
    var rs = 0;
    for (var i = 0; i < arr.length; i++) {
        rs = Number(rs) + Number(arr[i][field]);
    }
    return rs;
}

//sumfooter cho tất cả cột số trên dưới dộng
function sumFooter(grid, jsonCols, reSum) {
    //console.log('sumFooter');
    var cols = jQuery.parseJSON(jsonCols);
    var fields = new Array();
    //var sumRow = false;
    for (var i = 0; i < cols.length; i++) {
        /*if (cols[i].DataType == "S" && sumRow == false){
         fields.push(cols[i].FieldName);
         sumRow = true;
         }*/
        if (cols[i].DataType == "N") {
            fields.push(cols[i].FieldName);
        }
    }

    //Nếu mình lấy data từ SQL trả tra thì lúc filter sẽ không tính lại sum được, nên mình mới lấy data từ dataModel.data
    //var obj = jQuery.parseJSON(jsonDataString);
    if (reSum) {
        var obj = $(grid).pqGrid("option", "dataModel.data");
    } else {
        var obj = jQuery.parseJSON(grid);
    }

    //tạo cấu trúc summary dạng json
    var strStruct = "[{";
    for (var i = 0; i < fields.length; i++) {
        if (i == fields.length - 1)
            strStruct += '"' + fields[i] + '":"0"';
        else {
            strStruct += '"' + fields[i] + '":"0",';
        }
    }
    strStruct += "}]";
    strStruct = jQuery.parseJSON(strStruct);

    for (var j = 0; j < obj.length; j++) {
        $.each(obj[j], function (key, value) {
            //console.log('My array has at position ' + key + ', this value: ' + value);
            if ($.inArray(key, fields) > -1) {
                strStruct[0][key] = parseFloat(strStruct[0][key]) + parseFloat(value);
            }
        });

    }
    return strStruct;
}

function l3Number(val) {
    if (!isNaN(val)){
        return parseFloat(val.toString().replace(/,/g, ''));
    }else{
        return 0;
    }

}

//Hàm này dùng để format canh trái phải cho dòng sum trên lưới.
//Ví dụ val = 100, align = 'right', prefix = "Sum:" => Output là Sum: (100)
//Dành cho tổng dòng
function footerTotalFormat(val, algin, prefix) {
    if (prefix === undefined || prefix == null)
        prefix = '';
    return "<div style='text-align: " + algin + ";width:100%'>" + prefix + ' ' + "(" + val + ")</div>"
}

//Dành cho số
function footerSumFormat(val, algin, prefix) {
    if (prefix === undefined || prefix == null)
        prefix = '';
    return "<div style='text-align: " + algin + ";width:100%'>" + prefix + ' ' + val + "</div>"
}

//get top/left
function getTopLeft(grid, subGrid) {
    var $grid = $("#" + grid);
    var $subGrid = $("#" + subGrid);
    var obj = $grid.pqGrid("getEditCell");
    var $td = obj.$td;

    var top = parseInt($td.offset().top - $grid.offset().top) + $td.outerHeight();
    var left = parseInt($td.offset().left);

    var bottom = $grid.pqGrid('option', 'height') - top;
    var right = $(window).width() - left;

    if (bottom < $subGrid.pqGrid('option', 'height')) {
        top = parseInt(top - $subGrid.pqGrid('option', 'height') - $td.outerHeight());
    }

    if (right < $subGrid.pqGrid('option', 'width')) {
        left = left - $subGrid.pqGrid('option', 'width') + $td.width() + 15;
    } else {
        left = left + 2;
    }

    this.marginTop = top;
    this.marginLeft = left;
}

Array.prototype.contains = function (needle) {
    for (var i in this) {
        if (this[i] == needle) return true;
    }
    return false;
}

//Hàm get class extension of filename
function iconFile(file) {
    var extension = file.substr((file.lastIndexOf('.') + 1));
    switch (extension) {
        case 'jpg':
        case 'png':
        case 'gif':
            return 'fa fa-file-image-o';
            break;
        case 'mp3':
        case 'webm':
        case 'm4a':
            return 'fa fa-file-audio-o';
            break;
        case 'zip':
        case 'rar':
            return 'fa fa-file-archive-o';
            break;
        case 'doc':
        case 'docx':
            return 'fa fa-file-word-o';
            break;
        case 'pdf':
            return 'fa fa-file-pdf-o';
            break;
        case 'xls':
        case 'xlsx':
            return 'fa fa-file-excel-o';
            break;
        case 'txt':
            return 'fa fa-file-text-o';
            break;
        case 'sql':
            return 'fa fa-database';
            break;
        /* case 'rpt':
             return '';
             break;*/
        default:
            return 'fa fa-file-o';
            break;
    }
}

//leftshowsendmail là hàm cũ, khanh viết 1 hàm chung mới
function setValueMailPopup($parentDiv, from, to, title, body, cc, bcc) {
    $("#divEmail").find("#mPopUpSendMail").find("#hdFrom").val(from);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailReceivedAddress").val(to);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailTitle").val(title);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailCCAddress").val(cc);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailBCCAddress").val(bcc);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailContent").html(body);
    CKEDITOR.instances.txtEmailContent.setData(body);
    //if (isshow!=0)
    //    $parentDiv.find("#mPopUpSendMail").modal('show');
};

function showEmailPopup(layout, data) {
    $("#divEmail").html("");
    $("#divEmail").html(layout);
    $("#divEmail").find("#mPopUpSendMail").find("#hdFrom").val(data["EmailSenderAddress"]);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailReceivedAddress").val(data["EmailReceivedAddress"]);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailTitle").val(data.Subject);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailCCAddress").val(data["EmailCCAddress"]);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailBCCAddress").val(data["EmailBCCAddress"]);
    $("#divEmail").find("#mPopUpSendMail").find("#txtEmailContent").html(data["EmailContent"]);
    CKEDITOR.instances.txtEmailContent.setData(data["EmailContent"]);
    $("#divEmail").find("#mPopUpSendMail").modal('show');
}

function setCallbackMailClose(callback){
    $('#mPopUpSendMail').on('hidden.bs.modal', function () {
        callback.call(null, null);
    });
}

//convert ngay mm/dd/yyyy -> dd/mm/yyyy
function convertStringToDate(d) {
    if (d == "" || d == undefined)
        return null;
    var arr = d.split("/");
    return new Date(Number(arr[2]), Number(arr[1]) - 1, Number(arr[0]));
}

//date object string
function convertDateToString(d) {
    if (d == null)
        return "";
    return d.getDate() + "/" + twoDigit(Number(d.getMonth()) + 1) + "/" + d.getFullYear();
}

function twoDigit(number) {
    var twodigit = number >= 10 ? number : "0" + number.toString();
    return twodigit;
}

function daydiff(first, second) {
    return Math.round((second - first) / (1000 * 60 * 60 * 24));
}

function reformatData(data, $grid){
    var colM = $grid.pqGrid( "option", "colModel" );
    //console.log(colM);
    for (var i=0; i<data.length; i++){
        for (var j=0; j<colM.length; j++){
            if (colM[j].format != ""){
                var decimal = getDecimal(colM[j].format);
                if (decimal >=0){
                    data[i][colM[j].dataIndx] = formatNumber(data[i][colM[j].dataIndx],decimal);
                }
            }
        }
    }
    return data;
}

function getDecimal(format){
    if (format != undefined){
        var arr = format.split(".");
        var count = 0;
        //console.log(arr);
        if (arr.length >= 2){
            for (var i=0;i<arr[1].length;i++){
                count = count + 1;
            }
            console.log(count);
            return count;
        }else{
            return 0;
        }

    }else{
        return -1;
    }

}

//check require
function validationForm($id, callback, msgTextbox, msgSelectBox){
    var langObj = JSON.parse(lang_text);
    var messageText = typeof msgTextbox !== 'undefined' && msgTextbox != '' ? msgTextbox : langObj.languages[6].msg;
    var messageCheckBox = typeof msgSelectBox !== 'undefined' && msgSelectBox != '' ? msgSelectBox : langObj.languages[7].msg;
    var cb = typeof callback !== 'undefined' ? callback : null;
    var elements = $id.find("input:required, textarea:required");
    for (var i = 0; i < elements.length; i++) {
        //console.log(elements[i]);
        if ($(elements[i]).prop("required")){
            elements[i].oninvalid = function (e) {
                /*if (!e.target.validity.valid) {
                    e.target.setCustomValidity(messageText);
                }else{
                    e.target.setCustomValidity("");
                }*/
                if ($(e.target).val() == "") {
                    e.target.setCustomValidity(messageText);
                }else{
                    e.target.setCustomValidity("");
                }
            };
            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
            elements[i].onfocus = function (e) {
                //e.target.setCustomValidity("");
            };
        }

    }

    var elements_demo = $id.find("select:required");
    for (var j = 0; j < elements_demo.length; j++) {
        if ($(elements_demo[j]).prop("required")){
            elements_demo[j].oninvalid = function (e) {
                if ($(e.target).val() == "" || $(e.target).val() == null) {
                    e.target.setCustomValidity(messageCheckBox);
                }else{
                    e.target.setCustomValidity("");
                }
            };
            elements_demo[j].onchange = function (e) {
                e.target.setCustomValidity("");
            };
        }
    }
    var params = [messageText, messageCheckBox];
    if (cb!=null)cb.call(null,params);
}

Date.prototype.getWeekNumber = function(){
    var onejan = new Date(this.getFullYear(),0,1);
    var millisecsInDay = 86400000;
    return Math.ceil((((this - onejan) /millisecsInDay) + onejan.getDay()+1)/7);
};

function clone(oldObj){
    return JSON.parse(JSON.stringify(oldObj));
}

function createGridHeader(str){
    return "<span title='"+str+"'>"+str+"</span>";
}

function checkID($el) {
    console.log("sdfsfd");
    var str = $el.val();
    var regex = /[^\w]/gi;
    var obj_lang = JSON.parse(lang_text);

    if (regex.test(str) == true) {
        $el.get(0).setCustomValidity(obj_lang.languages[8].msg);
        return false;
    }else{
        $el.get(0).setCustomValidity("");
    }
    return true;

}

//Hàm kiểm tra các file hợp lệ khi đính kèm
//==False: la khong hop le, ==true: la hop le
function checkFileType(filename, extListJson) {
    var extension = filename.substr(filename.lastIndexOf('.')).toLowerCase();
    //var allowedExtensions = ['exe', 'bat', 'php', 'js', 'css', 'html'];
    var allowedExtensions = JSON.parse(extListJson);
    //        console.log(allowedExtensions.indexOf(extension));
    if (extension.length > 0) {
        if (allowedExtensions.indexOf(extension) === -1) {
            return false;
        }
    }
    return true;
}














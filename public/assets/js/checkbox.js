/*@nkit 2020*/

"use strict";

$(".permissionTable").on('click', '.selectall', function () {
    if ($(this).is(':checked')) {
        $(this).closest('tr').find('[type=checkbox]').prop('checked', true);
    } else {
        $(this).closest('tr').find('[type=checkbox]').prop('checked', false);
    }
});

$(function () {

    $('.selectall').each(function (i) {

        var allchecked = new Array();

        $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
            if ($(this).is(":checked")) {
                allchecked.push(1);
            } else {
                allchecked.push(0);
            }
        });

        if ($.inArray(0, allchecked) != -1) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }

    });

});

$('.permissionTable').on('click', '.permissioncheckbox', function () {

    var allchecked = new Array;

    $(this).closest('tr').find('.permissioncheckbox').each(function (index) {
        if ($(this).is(":checked")) {
            allchecked.push(1);
        } else {
            allchecked.push(0);
        }
    });

    if ($.inArray(0, allchecked) != -1) {
        $(this).closest('tr').find('.selectall').prop('checked', false);
    } else {
        $(this).closest('tr').find('.selectall').prop('checked', true);
    }

});

jQuery(function ($) {
    $("input:checkbox").on('click', function () {
        if ($(this).prop('checked')) {
            $(this).next().addClass("checked");
        } else {
            $(this).next().removeClass("checked");
        }
    });
})
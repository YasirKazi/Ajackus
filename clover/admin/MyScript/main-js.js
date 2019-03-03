$(document).ready(function () {
//    Functions To Initiate//
    $('.select2').select2();
    $('.mainpart').select2();
    $('.detailpart').select2();
    $('.fetchpart').select2();
    $('#example1').dataTable();
    $('.tooltip-bottom').tooltip();
    $(".focusfield").focus();
    $('.textarea').wysihtml5();
    $('.summernote').summernote();
    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
});
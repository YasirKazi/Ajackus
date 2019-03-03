$(document).ready(function () {
    $("body").off('click').on("click", '.remove', remove);

    $('#addnew').click(function () {
        AddRows();
    });
    
    // function autoAddRows() {
    //     var ctr = $('#items').val();
    //     var tr = $(this).closest("tr");
    //     var srno = tr.find(".srno").val();
    //     if (srno == ctr) {
    //         AddRows();
            
    //     }
    // }

    function remove() {
        $(this).closest("tr").remove();
    }

    function AddRows() {
        var ctr = $('#items').val();
        var hide_check = "";
        if ($("#del_all").prop("checked")) {
            hide_check = 0;
        } else {
            hide_check = 1;
        }
        var detail = ".fetchpart_" + ctr;
        $.post('off_add.php', {ctr: ctr, hide: hide_check}, function (data) {
            $(data).appendTo('.tbody');
            ctr++;
            $('#items').val(ctr);
            $(detail).select2();
        });
    }
});
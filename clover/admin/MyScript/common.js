$(document).ready(function () {
    $(".image").change(function () {
        readURL1(this);
    });

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.view1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
});
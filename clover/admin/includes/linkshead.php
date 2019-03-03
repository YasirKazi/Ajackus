<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php Echo $project_title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" content="Mitesh Gohil">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Switchery -->
    <link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- JQUERY CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- SELECT2 -->
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <!-- DataTables-->
    <link rel="stylesheet" href="assets/plugins/dataTables/css/dataTables.css">
    <!-- Textarea-->
    <!-- <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote.css">
    <script src="assets/plugins/summernote/summernote.js" type='text/javascript'></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- MY FILES -->
    <script src="MyScript/main-js.js" type="text/javascript"></script>
    <link href="MyStyle/main-css.css" rel="stylesheet" />
    <script>
        $(document).ready(function () {
<?php
if ($addflag != 1) {
    ?>
                $('body').find('.form').attr('disabled', 'disabled');
    <?php
}
?>
            $("#edit").click(function () {
                $('body').find('.form').removeAttr('disabled', 'disabled');
                $(".focusfield").focus();
                $('body').find('.buttonform').removeAttr('style');
                $('#hprevious, #hnext, #hsearch, #hprint, #hadd, #hedit, #hdelete, #hexit').hide();
                $('#ssubmit, #scancel').show();
                $(".remove").show();
            });
        });
    </script>
<?php
ob_start();
require("includes/check_auth_user.php");
require("includes/dbconnect.php");
include('includes/function.php');

$formname       = 'Category';
$maindb         = 'category';
$file           = 'category.php';
$trandbexist    = 0;
$keyfld         = "code";
$focusfield     = "name";

$admin = $_SESSION["admin_" . $dbname];
$zdb   = $_SESSION["zdbyear_" . $dbname];

mysqli_select_db($dbConnect, $zdb);
include("includes/vouchno_generate.php");

if (isset($_POST["submit"])) {
    $a = 1;
    $name  = mysqli_real_escape_string($dbConnect, $_POST["name"]);
    
    $mvouch = $qvouch;

    if ($a == 1) {
        
        ############################## MAIN  ######################################################
        if ($name != "") {
            mysqli_query($dbConnect, "INSERT INTO `$maindb`(code, `name`)
                                      VALUES($qvouch, '$name')") or die(mysqli_error());
            insmess();
            $mvouch = $qvouch; //1
            header("refresh: 1; $file?$keyfld=$mvouch&mode=edit");
            
        } else {
            $mvouch = $qvouch; //1
            mysqli_query($dbConnect, "UPDATE `$maindb` SET  `name`='$name' WHERE code = '$mvouch' ") or die(mysqli_error());
            updmess();
            header("refresh: 1; $file?$keyfld=$mvouch&mode=edit");
        }
    }
}

if ($addflag != 1) {

    $getvouch = '';
    if ($addflag == 0) {
        $getvouch = $_GET[$keyfld];
    } else {
        $getvouch = $qvouch;
    }
    $result = mysqli_query($dbConnect, "SELECT * FROM `$maindb` WHERE $keyfld='$getvouch'") or die(mysqli_error());
    $get = mysqli_fetch_array($result);
}

$senable = "";
$cenable = "";


if (isset($_GET["delete"])) {
    mysqli_query($dbConnect, "DELETE FROM $maindb WHERE $keyfld=' $_GET[$keyfld]'") or die(mysql_error());
    header("refresh: 1; $file?mode=last");    
}

include("includes/linkshead.php");
?>
<script src="MyScript/common.js" type="text/javascript"></script>
</head>
<body>
    <form action='' method='POST' enctype="multipart/form-data">
        <!-- Default box -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php Echo $formname; ?></h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 text-right pad">
                                <label class="label-control marg">Name</label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-8 col-xs-8 pad">
                                <input type="text" class="form-control form focusfield" name="name" value="<?php Echo ($addflag != 1) ? $get["name"] : ""; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <?php
                            if($addflag == 2){

                        ?>
                            <button id='add' type="button" class="btn btn-pad btn-square " style="background-color:#C0CA33; " onclick="window.location.href = '<?= $file . "?mode=true" ?>'" class="btn btn-labeled btn-success ">
                                <i class="fa fa-plus" style="color:#ffffff"></i>    
                            </button>
                            <a id='delete' class="btn btn-pad btn-square delete-entry" href="?delete&<?= $keyfld . "=" . $qvouch . "" ?>"  onClick="return confirm('Confrim Delete?');" style="background-color:#D9534F;">
                                <i class="fa fa-trash" style="color:#ffffff"></i>
                            </a>                            
                        <?php 
                            }
                            if($addflag != 2){

                        ?>    
                            <button id='submit' type='submit' name='submit' value='<?php echo ($addflag == 0) ? "Update" : "Save"; ?>' class="btn btn-pad btn-square " style="background-color:#008D4C; ">
                                <i class="fa fa-check" style="color:#ffffff"></i>
                            </button>
                            <button id='cancel' type="button" class="btn btn-pad btn-square " style="background-color:#39CCCC; "  onClick="window.location.href = '<?= $file . "?mode=last" ?>'">
                                <i class="fa fa-times" style="color:#ffffff"></i>
                            </button>                            
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include("includes/linksfoot.php"); ?>
</body>
</html>

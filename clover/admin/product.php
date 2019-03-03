<?php
ob_start();
require("includes/check_auth_user.php");
require("includes/dbconnect.php");
include('includes/function.php');

$formname       = 'Product';
$maindb         = 'product';
$file           = 'product.php';
$trandbexist    = 0;
$keyfld         = "code";
$focusfield     = "name";

$admin = $_SESSION["admin_" . $dbname];
$zdb   = $_SESSION["zdbyear_" . $dbname];

mysqli_select_db($dbConnect, $zdb);
include("includes/vouchno_generate.php");

if (isset($_POST["submit"])) {
    $a = 1;
    $categoryCode  = mysqli_real_escape_string($dbConnect, $_POST["categoryCode"]);
    $name  = mysqli_real_escape_string($dbConnect, $_POST["name"]);
    $description  = mysqli_real_escape_string($dbConnect, $_POST["description"]);
    $price  = mysqli_real_escape_string($dbConnect, $_POST["price"]);
    $mvouch = $qvouch;

    if ($a == 1) {
                
        $path = "MyImages/category/";

        #####################IMAGE#####################
        $filename1    = $mvouch . ".jpg";
        $img_file1    = $path . ($filename1);
        $image_ftype  = pathinfo($img_file1, PATHINFO_EXTENSION);

        $uploadOk = 1;

        if ($uploadOk == 1) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $img_file1);
        } else {
            browse("Sorry, there was an error uploading your file.");
            header("refresh: 1; $file?mode=last");
        }

        ############################## MAIN  ######################################################
        $getimage   = mysqli_query($dbConnect, "SELECT * FROM `$maindb` WHERE `code`='$mvouch'")or die(mysqli_error($dbConnect));
        $image      = mysqli_fetch_array($getimage);
        ############################## MAIN  ######################################################
        if ($addflag == 1) {
            mysqli_query($dbConnect, "INSERT INTO `$maindb`(code, `category`, `name`, `description`, `price`, `image_url`)
                                      VALUES($qvouch, '$categoryCode', '$name', '$description', '$price', '$img_file1')") or die(mysqli_error($dbConnect));
            insmess();
            $mvouch = $qvouch; //1
            header("refresh: 1; $file?$keyfld=$mvouch&mode=edit");
            
        } else {
            $mvouch = $qvouch; //1
            mysqli_query($dbConnect, "UPDATE `$maindb` SET  `category`='$categoryCode', `name`='$name', `description`='$description', `price`='$price', `image_url`='$img_file1' WHERE code = '$mvouch' ") or die(mysqli_error($dbConnect));
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

    $getCategory  = mysqli_query($dbConnect, "SELECT `code`, `name` FROM `category` WHERE `code`='$get[category]'") or die(mysqli_error($dbConnect));
    $category    = mysqli_fetch_array($getCategory);    
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
                                <label class="label-control marg">Category</label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-8 col-xs-8 pad">
                                <select class="form-control form focusfield" name="categoryCode" >
                                    <option value="<?php Echo ($addflag != 1) ? $category["code"] : ""; ?>"><?php Echo ($addflag != 1) ? $category["name"] : ""; ?></option>
                                    <?php
                                        $getmemp = mysqli_query($dbConnect, "SELECT `code`, `name`  FROM `category`")or die(mysqli_error($dbConnect));
                                        $num = mysqli_num_rows($getmemp);
                                        echo $num;
                                        while ($memp = mysqli_fetch_array($getmemp)) {
                                            Echo "<option value='$memp[code]'>$memp[name]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 text-right pad">
                                <label class="label-control marg">Name</label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-8 col-xs-8 pad">
                                <input type="text" class="form-control form focusfield" name="name" value="<?php Echo ($addflag != 1) ? $get["name"] : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 text-right pad">
                                <label class="label-control marg">Description</label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-8 col-xs-8 pad">
                                <textarea class="form-control form focusfield" name="description" value="" required rows="10">
                                    <?php Echo ($addflag != 1) ? $get["description"] : ""; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 text-right pad">
                                <label class="label-control marg">Price</label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-8 col-xs-8 pad">
                                <input type="text" class="form-control form focusfield" name="price" value="<?php Echo ($addflag != 1) ? $get["price"] : ""; ?>" required>
                            </div>
                        </div>     
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 text-right pad">
                                <label class="label-control marg">Image</label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8 pad">
                                <input type="file" class="btn btn-primary form image" name="image" id="image" style='width: 100%;'/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <img class="view1" src="<?php Echo $addflag != 1 ? $get['image_url'] ."?i=". rand(): "" ?>" style="padding: 10px; border: #E7B315 solid 1px;width: 400px;" alt="Image 1" />
                            </div>
                        </div>                                           
                    </div>
                    <div class="panel-footer text-center">
                        <?php
                            if($_GET['mode'] == 'last'){

                        ?>
                            <button id='add' type="button" class="btn btn-pad btn-square " style="background-color:#C0CA33; " onclick="window.location.href = '<?= $file . "?mode=true" ?>'" class="btn btn-labeled btn-success ">
                                <i class="fa fa-plus" style="color:#ffffff"></i>    
                            </button>
                            <a id='delete' class="btn btn-pad btn-square delete-entry" href="?delete&<?= $keyfld . "=" . $qvouch . "" ?>"  onClick="return confirm('Confrim Delete?');" style="background-color:#D9534F;">
                                <i class="fa fa-trash" style="color:#ffffff"></i>
                            </a>                            
                            <button id='edit' type="button" style="background-color:#F0AD4E; " class="btn btn-pad btn-square">
                                <i class="fa fa-pencil" style="color:#ffffff"></i>
                            </button>
                            <?php 
                            
                                }  if($_GET['mode'] == 'edit') {                            
                            ?>    
                            <button id='edit' type="button" style="background-color:#F0AD4E; " class="btn btn-pad btn-square">
                                <i class="fa fa-pencil" style="color:#ffffff"></i>
                            </button>
                            <?php 

                                } if($_GET['mode'] != 'last') {                            
                            ?>    

                            <button id='submit' type='submit' name='submit' value='<?php echo ($addflag == 0) ? "Update" : "Save"; ?>' class="btn btn-pad btn-square " style="background-color:#008D4C; " <?php echo ($addflag == 0) ? 'disabled': '' ?>>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#edit').click(function(){
                enableSubmit();
            })
            function enableSubmit(){
                $("#submit").removeAttr('disabled');
            }
        });
    </script>
    <?php include("includes/linksfoot.php"); ?>
</body>
</html>

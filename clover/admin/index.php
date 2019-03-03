<?php
session_start();
$dbtype = "root";
require("includes/dbconnect.php");
require("includes/config.php");

$zdir = $dbname;
$zcomp = 1;
$zdbroot = $zdir;
$focusfield = "user";

if (isset($_POST["submit"])) {
    $udbf = $zdbroot . "passmain";

    $login = mysqli_query($dbConnect, "SELECT * FROM `passmain` WHERE `user` = '" . mysqli_real_escape_string($dbConnect, $_POST['user']) . "'
                         AND `password` = '" . mysqli_real_escape_string($dbConnect, $_POST['pass']) . "'") or die(mysqli_error());

    $_SESSION["zdbroot"]    = $zdbroot;
    $_SESSION["zdir"]       = $zdir;

    $_SESSION["zcompany"] = 'Clover';

    if (mysqli_num_rows($login) == 1) {
        $_SESSION['username_' . $dbname] = $_POST["user"];
        $_SESSION['logged-in'] = true;
        $getuser_dtl = mysqli_fetch_object($login);
        $admin = $getuser_dtl->admin;
        $_SESSION["admin_" . $dbname] = $admin;
        $_SESSION["zdbyear_$dbname"] = $dbyear;

        header("Location: menu.php");
    } else {
        print '<script type="text/javascript">';
        print 'alert("Invalid Login Credentials")';
        print '</script>';
    }
}
include("includes/linkshead.php");
?>
</head>
<body class="animated fadeIn" style="background: url(assets/img/ship2.jpg) no-repeat;">
    <section id="login-container">
        <div class="row text-center"></div>
        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">     
                            <?php Echo $project_title; ?>
                        </h3>      
                    </div>
                    <div class="panel-body">
                        <p> Login to access your account.</p>
                        <form class="form-horizontal" action='' method="POST">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="email" placeholder="Username" name='user' autofocus>
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name='pass'>
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type='submit' name='submit' class="btn btn-primary btn-block" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/linksfoot.php") ?>
</body>
</html>
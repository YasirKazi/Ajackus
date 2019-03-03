<?php
require("includes/check_auth_user.php");
require("includes/dbconnect.php");
include('includes/function.php');

$admin = $_SESSION["admin_" . $dbname];
$src = "";
$action = isset($_GET["action"]) ? $_GET["action"] : "";
switch ($action) {

####################### MENU ##########################


    case "category";
        $src = "category.php?mode=last";
        break;

    case "product";
        $src = "product.php?mode=last";
        break;

    default :
        $head = "Home";
        $src = "default.php?mode=last";
}
include("includes/linkshead.php");
?>
</head>
<body class="off-canvas">
    <div id="container" class="sidebar-mini">
        <header id="header">
            <!--logo start-->
            <div class="brand" style="background-color: #fff;">
                <a href="menu.php" class="logo" style="padding: 0;border-right: 1px solid #ccc;">
                    <img src="assets/img/logo.png" />
                </a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="user-nav">
                <ul>
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php echo $_SESSION["username_" . $dbname]; ?> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li><a href="?action=user"><i class="fa fa-user"></i> Users</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!--sidebar left start-->
        <nav class="sidebar sidebar-left">
            <h5 class="sidebar-header">Navigation</h5>
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-dropdown">
                    <a href="#" title="Home"><i class="fa fa-home"></i>Home</a>
                    <ul class="nav-sub">
                        <li><a href="?action=category">Category</a></li>
                        <li><a href="?action=product">Product</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!--sidebar left end-->
        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <div class="col-md-12 pad">
                    <iframe src="<?php echo $src; ?>" name="frame1" style="width: 100%; height:5000px;"  frameBorder="0" scrolling="no"></iframe>
                </div>
            </section>
        </section>
    </div>
    <!--main content end-->
    <?php include("includes/linksfoot.php") ?>
</body>
</html>

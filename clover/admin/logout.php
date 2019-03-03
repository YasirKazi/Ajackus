<?php
require("includes/check_auth_user.php");
session_unset($_SESSION["zdbyear_".$zdir]);
session_unset($_SESSION["admin_".$zdir]);
header("Location: index.php");
?>
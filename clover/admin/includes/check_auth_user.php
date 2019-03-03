<?php
require("config.php");
ob_start();
session_start();
if (!isset($_SESSION["username_".$dbname])) {
    header("Location: index.php");
}
?>
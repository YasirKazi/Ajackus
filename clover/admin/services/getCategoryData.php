<?php
require("../includes/dbconnect.php");
include ('../includes/function.php');
$success = false;
$rows = array();

 
$getCategory = mysqli_query($dbConnect, "SELECT * FROM `category` WHERE `name`!='' ORDER BY `name`")or die(mysqli_error($dbConnect));
while ($row = mysqli_fetch_assoc($getCategory)) {
    $rows['data'][] = [ 
        'code'      => $row['code'],
        'name'     => $row['name']
    ];
}
 
header("Content-type: application\json");
echo json_encode($rows);
?>
<?php
require("../includes/dbconnect.php");
include ('../includes/function.php');

$success = false;
$rows = array();
$maindb = 'site_user_db';
$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$password = $data['password'];
 
if($email && $password){
    $getProduct = mysqli_query($dbConnect, "SELECT `id` FROM `$maindb` WHERE `email`='$email' AND `password`='$password' ORDER BY `name`")or die(mysqli_error($dbConnect));
    while ($row = mysqli_fetch_assoc($getProduct)) {
        $rows['data'][] = [ 
            'user_id'      => $row['id']
        ];
    }
     
    header("Content-type: application\json");
    echo json_encode($rows);
}
?>
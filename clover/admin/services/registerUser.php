<?php
require("../includes/dbconnect.php");
include ('../includes/function.php');
$success = false;
$rows = array();

$maindb = 'site_user_db';
$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];
 
if(($name && $email) && $password){
    $qry = mysqli_query($dbConnect, "INSERT INTO `$maindb`(`name`, `email`, `password`)
    VALUES('$name', '$email', '$password')") or die(mysqli_error($dbConnect));

    if($qry) {
        $rows['data'][] = [ 
            'success' => true
        ];
    }
     
    header("Content-type: application\json");
    echo json_encode($rows);
}
?>
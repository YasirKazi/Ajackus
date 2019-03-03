<?php
require("../includes/dbconnect.php");
include ('../includes/function.php');
$success = false;
$rows = array();

$category = $_GET['category'];
 
if($category){
    $getProduct = mysqli_query($dbConnect, "SELECT * FROM `product` WHERE `category`='$category' ORDER BY `name`")or die(mysqli_error($dbConnect));
    while ($row = mysqli_fetch_assoc($getProduct)) {
        $rows['data'][] = [ 
            'code'      => $row['code'],
            'category'      => $row['category'],
            'name'     => $row['name'],
            'description'     => $row['description'],
            'price'     => $row['price'],
            'image_url'     => 'http://localhost/admin/'.$row['image_url']
        ];
    }
     
    header("Content-type: application\json");
    echo json_encode($rows);
}
?>
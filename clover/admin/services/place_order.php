<?php
require("../includes/dbconnect.php");
include ('../includes/function.php');
$success = false;
$rows = array();

$maindb = 'purchase_order';
$dtldb = 'purchase_order_details';
$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$mobile = $data['mobile'];
$landMark = $data['landMark'];
$town = $data['town'];
$adressType = $data['adressType'];
$userId = $data['userId'];
$orderDetail = $data['orderDetail'];
$orderId = rand(1,9999999999); 

if($userId){
    $qry = mysqli_query($dbConnect, "INSERT INTO `$maindb`(`orderId`, `name`, `mobile`, `landMark`, `town`, `addressType`, `userId`)
                                            VALUES('$orderId', '$name', '$mobile', '$landMark', '$town', '$adressType', '$userId')") or die(mysqli_error($dbConnect));
    for ($i = 0; $i < count($orderDetail); $i++) {
        $category      = $orderDetail[$i]["category"];
        $productcode   = $orderDetail[$i]["code"];
        $description   = mysqli_real_escape_string($dbConnect, $orderDetail[$i]["description"]);
        $image_url     = $orderDetail[$i]["image_url"];
        $productname   = $orderDetail[$i]["name"];
        $price         = $orderDetail[$i]["price"];

        if (!empty($i)) {
            
            mysqli_query($dbConnect, "INSERT INTO `$dtldb`(`orderId`,`userId`, `category`, `productcode`, `name`, `description`, `price`, `image_url`)
                                VALUES('$orderId','$userId','$category', '$productcode', '$productname', '$description', '$price', '$image_url')") or die(mysqli_error($dbConnect));
        }
    }

    if($qry) {
        $rows['data'][] = [ 
            'success' => true
        ];
    }
     
    header("Content-type: application\json");
    echo json_encode($rows);
}
?>
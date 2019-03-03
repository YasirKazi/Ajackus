<?php
ob_start();
require("includes/check_auth_user.php");
require("includes/dbconnect.php");
include('includes/function.php');
include("includes/linkshead.php");

$maindb = 'purchase_order_details';
$joindb = 'category';
$orderId = $_GET['orderId'];
$getorder = mysqli_query($dbConnect, "SELECT $maindb.id, $maindb.orderId, $maindb.userId, $maindb.category, 
                        $maindb.productCode, $maindb.name, $maindb.price, $joindb.name As categoryName FROM `$maindb` LEFT JOIN `$joindb`
                         ON $maindb.category = $joindb.code ORDER BY $maindb.id")or die(mysqli_error($dbConnect));
?>
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<style>
    .Hit{
        color: #ffffff;
        font-size: 80px;
        width: 500px;
        height: 200px;
        border: 2px solid #ffffff;
        padding-top: 50px;
        border-radius: 20px;
        margin: 0 auto; 
    }
    th{
        color: #4a4444 !important;
        font-size: 15px;
        padding: 5px !important;
    }
</style>
</head>
<body>
    <!-- Default box -->
    <div class="container" style="width: 100%">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3>Orders List</h3>
                <div class="pad text-center" style="overflow: scroll">
                    <table id="clientList" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                Order Id
                            </th>
                            <th>
                                Product Name
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Price
                            </th>
                        </thead>
                        <tbody>
                            <?php
                               while($row = mysqli_fetch_object($getorder)){
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $row->id;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->orderId;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->name;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->categoryName;
                                        echo "</td>";                                  
                                        echo "<td align='left'>";
                                            echo $row->price;
                                        echo "</td>";                                  
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/linksfoot.php"); ?>
<script type="text/javascript">
        $(document).ready(function() {
            $('#clientList').DataTable();
        } );
    </script>
</body>
</html>

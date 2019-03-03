<?php
ob_start();
require("includes/check_auth_user.php");
require("includes/dbconnect.php");
include('includes/function.php');
include("includes/linkshead.php");

$maindb = 'purchase_order';
$getorder = mysqli_query($dbConnect, "SELECT * FROM `$maindb` ORDER BY `sr`")or die(mysqli_error($dbConnect));
// $counter    = mysql_fetch_array($getcounter);
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
                                Name
                            </th>
                            <th>
                                Phone Number
                            </th>
                            <th>
                                Landmark
                            </th>
                            <th>
                                Town
                            </th>
                            <th>
                                AddressType
                            </th>
                            <th>
                                Detail
                            </th>
                        </thead>
                        <tbody>
                            <?php
                               while($row = mysqli_fetch_object($getorder)){
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $row->sr;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->orderId;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->name;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->mobile;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->landmark;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->town;
                                        echo "</td>";
                                        echo "<td align='left'>";
                                            echo $row->addressType;
                                        echo "</td>";                                     
                                        echo "<td align='left'>";
                                            echo "<a href='orderDetail.php?orderId=$row->orderId'>View Detail</a>";
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

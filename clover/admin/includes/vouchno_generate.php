<?php
 $searchdisabled    ='';
 $adddisabled       ='';
 $editdisabled      ='';
 $savedisabled      ='';
 $deletedisabled    ='';
 $exitdisabled      ='';
 $printdisabled     ='';
 $canceldisabled    ='';
 $pdisabled         ='';
 $ndisabled         ='';

if (isset($_GET["mode"])) {
    $mode = $_GET["mode"];

    if ($mode == "true") {
        $addflag = 1;
        $gen1 = mysqli_query($dbConnect,"SELECT MAX($keyfld) AS maxcode FROM `$maindb` LIMIT 0,1 ") or die(mysql_error());

        if (mysqli_num_rows($gen1) > 0) {
            $vvouch = mysqli_fetch_assoc($gen1);
            $qvouch = $vvouch["maxcode"] + 1;
        } else {
            $qvouch = '1';
        }

        $flag = "Add";

        /*Disabling buttons*/        

        $searchdisabled ='none';
        $adddisabled ='none';
        $editdisabled ='none';
        $deletedisabled ='none';
        $exitdisabled ='none';
        $printdisabled ='none';
        $pdisabled ='none';
        $ndisabled ='none';
        /*End Disabling buttons*/        
    }elseif($mode == "last"){
        $addflag = 2;
        $mgetlastrec = mysqli_query($dbConnect,"SELECT * FROM `$maindb` WHERE $keyfld !=''  ORDER BY $keyfld DESC LIMIT 0,1") or die(mysqli_error($dbConnect));
        $mgetvouchno = mysqli_fetch_array($mgetlastrec);
        
        if($trandbexist == 1){
            $tgetlastrec = mysqli_query($dbConnect,"SELECT * FROM `$trandb` ORDER BY $keyfld DESC LIMIT 0,1") or die(mysql_error());
            $lgetvouchno = mysqli_fetch_array($tgetlastrec);
            $getvouch   = $lgetvouchno["$keyfld"];
        }
        $qvouch     = $mgetvouchno["$keyfld"];
        
        /*Disabling buttons*/
        $savedisabled = 'none';
        $canceldisabled = 'none';
        /*End Disabling buttons*/
    }elseif($mode === "edit"){
        $addflag = 0;
        $qvouch = $_GET[$keyfld];
        $flag = "Edit";
        $savedisabled = 'none';
        $canceldisabled = 'none';
//        $pdisabled ='none';
//        $ndisabled ='none';
        /*End Disabling buttons*/
    }
}
if(isset($_GET["delete"])){
    $qvouch = $_GET[$keyfld];
    $addflag = null;
}
?>




<?php
if ($addflag !=1) {
    $compare1 = mysqli_query($dbConnect,"SELECT MIN($keyfld) AS mincode FROM `$maindb` WHERE $keyfld !=''  LIMIT 0,1 ") or die(mysqli_error());
    $fincode1 = mysqli_fetch_object($compare1);

    if ($qvouch > $fincode1->mincode) {
        $chkqry = mysqli_query($dbConnect,"SELECT $keyfld FROM `$maindb` WHERE $keyfld < $qvouch  ORDER BY $keyfld DESC LIMIT 0,1 ") or die(mysql_error());
        $chkcode = mysqli_fetch_object($chkqry);
        $prevvouch = $chkcode->$keyfld;
        
        $pdisabled = '';
    } else {
        $prevvouch = $qvouch;
        $pdisabled1 = 'disabled';
    }
    
    
    $compare2 = mysqli_query($dbConnect,"SELECT MAX($keyfld) AS maxcode FROM `$maindb` WHERE $keyfld !=''  LIMIT 0,1 ") or die(mysql_error());
    $fincode2 = mysqli_fetch_object($compare2);

    if ($qvouch < $fincode2->maxcode) {
        $chkqryn = mysqli_query($dbConnect,"SELECT $keyfld FROM `$maindb` WHERE $keyfld > $qvouch  ORDER BY $keyfld LIMIT 0,1 ") or die(mysql_error());
        $chkcoden = mysqli_fetch_object($chkqryn);
        $nextvouch = $chkcoden->$keyfld;
 
        $ndisabled = '';
    } else {
        $nextvouch = $qvouch;
        $ndisabled1 = 'disabled';
    }
}

?>
<?php

function insmess() {

    print '<script type="text/javascript">';
    print 'alert("RECORD ADDED SUCESSFULLY")';
    PRINT '</script>';
}

function updmess() {

    print '<script type="text/javascript">';
    print 'alert("RECORD UPDATED SUCESSFULLY")';
    PRINT '</script>';
}

function delete($mydb, $table, $vouch, $chk, $file) {
    mysqli_query($dbConnect, "DELETE FROM $table WHERE $vouch='$chk'") or die(mysql_error());
    header("refresh: 1; $file");
}

function delnew($mydb, $table, $cond, $file) {
    mysql_select_db($mydb);
    mysql_query("DELETE FROM $table WHERE $cond") or die(mysql_error());
    header("refresh: 1; $file");
}

function delmulti($mydb, $table, $cond, $file) {
    mysql_select_db($mydb);
    mysql_query("DELETE FROM $table WHERE $cond") or die(mysql_error());
    header("refresh: 1; $file");
}

function table($res) {
    $i = 0;
    $colNames = array();
    $data = array();
    while ($row = mysql_fetch_assoc($res)) {
        if ($i == 0) {
            foreach ($row as $colname => $val)
                $colNames[] = $colname;
        }
        $data[] = $row;
        $i++;
    }
    $colNames = array_keys(reset($data));
    $num = mysql_num_rows($res);




    echo "<h1>Number Of Records: $num</h1>";
    echo '<table border="1" cellspacing="0" cellpadding="10">';
    echo "<tr>";

    foreach ($colNames as $colName) {
        echo "<th>$colName</th>";
    }

    foreach ($data as $row) {
        echo "<tr>";
        foreach ($colNames as $colName) {
            echo "<td>" . $row[$colName] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

function val($value) {
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    if (!is_numeric($value)) {
        $value = "'" . mysql_real_escape_string($value) . "'";
    }
    return $value;
}

function convert_number_to_words($number) {

    $hyphen = '-';
    $conjunction = ' And ';
    $separator = ', ';
    $negative = 'negative ';
    $decimal = ' point ';
    $dictionary = array(
        0 => 'Zero',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Fourty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety',
        100 => 'Hundred',
        1000 => 'Thousand',
        1000000 => 'Million',
        1000000000 => 'Billion',
        1000000000000 => 'Trillion',
        1000000000000000 => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
// overflow
        trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int) ($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function getzdates($zyear, $zpara) {
    global $zstdate;
    global $zendate;
    require("includes/dbconnect.php");
    $getdates = mysql_query("SELECT *, DATE_FORMAT(`startdate`, '%Y-%m-%d') as stdate, 
            DATE_FORMAT(`lastdate`, '%Y-%m-%d') as endate FROM cepheisy_fab_root.compyear 
            WHERE finyear= '$zyear' ") or die(mysql_error());
    
    $zdt = mysql_fetch_object($getdates);
    $zstdate = $zdt->stdate;
    $zendate = $zdt->endate;
    if ($zpara == "S") {
        return $zstdate;
    } else {
        return $zendate;
    }
}

function left($str, $length) {
    return substr($str, 0, $length);
}

function right($str, $length) {
    return substr($str, -$length);
}

function ageCalculator($dob) {
    if (!empty($dob)) {
        $birthdate = new DateTime($dob);
        $today = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    } else {
        return 0;
    }
}

?>

<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");

isset($_POST["tablec1_id"]) ? $tablec1_id = $_POST["tablec1_id"] : $tablec1_id = '';
isset($_POST["tablec4_id"]) ? $tablec4_id = $_POST["tablec4_id"] : $tablec4_id = '';
isset($_POST["d1"]) ? $d1 = $_POST["d1"] : $d1 = '';
isset($_POST["d2"]) ? $d2 = $_POST["d2"] : $d2 = '';
isset($_POST["d4"]) ? $d4 = $_POST["d4"] : $d4 = '';
isset($_POST["d5"]) ? $d5 = $_POST["d5"] : $d5 = '';
isset($_POST["d6"]) ? $d6 = $_POST["d6"] : $d6 = '';
isset($_POST["d7"]) ? $d7 = $_POST["d7"] : $d7 = '';
isset($_POST["d9"]) ? $d9 = $_POST["d9"] : $d9 = '';
isset($_POST["d10"]) ? $d10 = $_POST["d10"] : $d10 = '';

isset($_POST["d11"]) ? $d11 = $_POST["d11"] : $d11 = '';
isset($_POST["d12"]) ? $d12 = $_POST["d12"] : $d12 = '';
isset($_POST["d14"]) ? $d14 = $_POST["d14"] : $d14 = '';
isset($_POST["d15"]) ? $d15 = $_POST["d15"] : $d15 = '';
isset($_POST["d16"]) ? $d16 = $_POST["d16"] : $d16 = '';
isset($_POST["d17"]) ? $d17 = $_POST["d17"] : $d17 = '';
isset($_POST["d18"]) ? $d18 = $_POST["d18"] : $d18 = '';

isset($_POST["d21"]) ? $d21 = $_POST["d21"] : $d21 = '';
isset($_POST["d24"]) ? $d24 = $_POST["d24"] : $d24 = '';
isset($_POST["d27"]) ? $d27 = $_POST["d27"] : $d27 = '';
isset($_POST["d28"]) ? $d28 = $_POST["d28"] : $d28 = '';
isset($_POST["d29"]) ? $d29 = $_POST["d29"] : $d29 = '';
isset($_POST["d30"]) ? $d30 = $_POST["d30"] : $d30 = '';

isset($_POST["d31"]) ? $d31 = $_POST["d31"] : $d31 = '';
isset($_POST["d32"]) ? $d32 = $_POST["d32"] : $d32 = '';
isset($_POST["d33"]) ? $d33 = $_POST["d33"] : $d33 = '';
isset($_POST["d34"]) ? $d34 = $_POST["d34"] : $d34 = '';
isset($_POST["d35"]) ? $d35 = $_POST["d35"] : $d35 = '';

isset($_POST['d3']) ? $d3 = $_POST['d3'] : $d3 = '';
$d_3 = $_POST['d3'];
$date=date_create($d_3);
$d3_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d8']) ? $d8 = $_POST['d8'] : $d8 = '';
$d_8 = $_POST['d8'];
$date=date_create($d_8);
$d8_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d13']) ? $d13 = $_POST['d13'] : $d13 = '';
$d_13 = $_POST['d13'];
$date=date_create($d_13);
$d13_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d19']) ? $d19 = $_POST['d19'] : $d19 = '';
$d_19 = $_POST['d19'];
$date=date_create($d_19);
$d19_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d20']) ? $d20 = $_POST['d20'] : $d20 = '';
$d_20 = $_POST['d20'];
$date=date_create($d_20);
$d20_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d22']) ? $d22 = $_POST['d22'] : $d22 = '';
$d_22 = $_POST['d22'];
$date=date_create($d_22);
$d22_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d23']) ? $d23 = $_POST['d23'] : $d23 = '';
$d_23 = $_POST['d23'];
$date=date_create($d_23);
$d23_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d25']) ? $d25 = $_POST['d25'] : $d25 = '';
$d_25 = $_POST['d25'];
$date=date_create($d_25);
$d25_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d26']) ? $d26 = $_POST['d26'] : $d26 = '';
$d_26 = $_POST['d26'];
$date=date_create($d_26);
$d26_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d36']) ? $d36 = $_POST['d36'] : $d36 = '';
$d_36 = $_POST['d36'];
$date=date_create($d_36);
$d36_1 = date_format($date,"Y-m-d H:i:s");

$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';
$b = "select * from `tablec4` WHERE tablec1_id = '".$_POST["tablec1_id"]."' Order By tablec1_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){

$tablec4=$row_b["tablec4_id"];
if($row_b["tablec4_id"]==""){
    $strSQL = "insert into `tablec4` (`tablec4_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `tablec1_id`, `timestamp`) VALUES (NULL, '$d1', '$d2', '$d3_1', '$d4', '$d5', '$d6', '$d7', '$d8_1', '$d9', '$d10', '$d11', '$d12', '$d13_1', '$d14', '$d15', '$d16', '$d17', '$d18', '$d19_1', '$d20_1', '$d21', '$d22_1', '$d23_1', '$d24', '$d25_1', '$d26_1', '$d27', '$d28', '$d29', '$d30', '$d31', '$d32', '$d33', '$d34', '$d35', '$d36_1', '$tablec1_id', '$timestamp')";
    $objQuery = mysqli_query($objCon,$strSQL);
}else{    
    $strSQL = "update `tablec4` SET `tablec4_id` = '$tablec4_id', `d1` = '$d1', `d2` = '$d2', `d3` = '$d3_1', `d4` = '$d4', `d5` = '$d5', `d6` = '$d6', `d7` = '$d7', `d8` = '$d8_1', `d9` = '$d9', `d10` = '$d10', `d11` = '$d11', `d12` = '$d12', `d13` = '$d13_1', `d14` = '$d14', `d15` = '$d15', `d16` = '$d16', `d17` = '$d17', `d18` = '$d18', `d19` = '$d19_1', `d20` = '$d20_1', `d21` = '$d21', `d22` = '$d22_1', `d23` = '$d23_1', `d24` = '$d24', `d25` = '$d25_1', `d26` = '$d26_1', `d27` = '$d27', `d28` = '$d28', `d29` = '$d29', `d30` = '$d30', `d31` = '$d31', `d32` = '$d32', `d33` = '$d33', `d34` = '$d34', `d35` = '$d35', `d36` = '$d36_1', `tablec1_id` = '$tablec1_id' ,`timestamp` = '$timestamp' WHERE `tablec4`.`tablec4_id` = '$tablec4'";
    $objQuery = mysqli_query($objCon,$strSQL);
}
}
$a = "select * from `tablec1` WHERE tablec1_id = '$tablec1_id' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    $row["tablec1_id"];
    if($row["check"]=="1"){
        echo '<meta http-equiv="refresh" content="0; url=edit_formc2.php?tablec1_id='.$row["tablec1_id"].'">';
    }else{
        echo '<meta http-equiv="refresh" content="0; url=showallc.php">';
    }
}   
?>
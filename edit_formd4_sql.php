<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");

isset($_POST["tabled4_id"]) ? $tabled4_id = $_POST["tabled4_id"] : $tabled4_id = '';
isset($_POST["tabled1_id"]) ? $tabled1_id = $_POST["tabled1_id"] : $tabled1_id = '';

isset($_POST["d1"]) ? $d1 = $_POST["d1"] : $d1 = '';
isset($_POST["d2"]) ? $d2 = $_POST["d2"] : $d2 = '';
isset($_POST["d3"]) ? $d3 = $_POST["d3"] : $d3 = '';
isset($_POST["d4"]) ? $d4 = $_POST["d4"] : $d4 = '';
isset($_POST["d5"]) ? $d5 = $_POST["d5"] : $d5 = '';
isset($_POST["d6"]) ? $d6 = $_POST["d6"] : $d6 = '';
isset($_POST["d7"]) ? $d7 = $_POST["d7"] : $d7 = '';
isset($_POST["d8"]) ? $d8 = $_POST["d8"] : $d8 = '';
isset($_POST["d9"]) ? $d9 = $_POST["d9"] : $d9 = '';
isset($_POST["d10"]) ? $d10 = $_POST["d10"] : $d10 = '';

isset($_POST["d11"]) ? $d11 = $_POST["d11"] : $d11 = '';
isset($_POST["d12"]) ? $d12 = $_POST["d12"] : $d12 = '';
isset($_POST["d13"]) ? $d13 = $_POST["d13"] : $d13 = '';
isset($_POST["d14"]) ? $d14 = $_POST["d14"] : $d14 = '';
isset($_POST["d15"]) ? $d15 = $_POST["d15"] : $d15 = '';
isset($_POST["d16"]) ? $d16 = $_POST["d16"] : $d16 = '';
isset($_POST["d17"]) ? $d17 = $_POST["d17"] : $d17 = '';
isset($_POST["d18"]) ? $d18 = $_POST["d18"] : $d18 = '';
isset($_POST["d19"]) ? $d19 = $_POST["d19"] : $d19 = '';
isset($_POST["d20"]) ? $d20 = $_POST["d20"] : $d20 = '';

isset($_POST["d21"]) ? $d21 = $_POST["d21"] : $d21 = '';
isset($_POST["d22"]) ? $d22 = $_POST["d22"] : $d22 = '';
isset($_POST["d24"]) ? $d24 = $_POST["d24"] : $d24 = '';
isset($_POST["d25"]) ? $d25 = $_POST["d25"] : $d25 = '';
isset($_POST["d26"]) ? $d26 = $_POST["d26"] : $d26 = '';
isset($_POST["d27"]) ? $d27 = $_POST["d27"] : $d27 = '';
isset($_POST["d28"]) ? $d28 = $_POST["d28"] : $d28 = '';
isset($_POST["d29"]) ? $d29 = $_POST["d29"] : $d29 = '';
isset($_POST["d30"]) ? $d30 = $_POST["d30"] : $d30 = '';

isset($_POST["d31"]) ? $d31 = $_POST["d31"] : $d31 = '';
isset($_POST["d32"]) ? $d32 = $_POST["d32"] : $d32 = '';
isset($_POST["d33"]) ? $d33 = $_POST["d33"] : $d33 = '';
isset($_POST["d34"]) ? $d34 = $_POST["d34"] : $d34 = '';
isset($_POST["d35"]) ? $d35 = $_POST["d35"] : $d35 = '';
isset($_POST["d36"]) ? $d36 = $_POST["d36"] : $d36 = '';
isset($_POST["d37"]) ? $d37 = $_POST["d37"] : $d37 = '';
isset($_POST["d38"]) ? $d38 = $_POST["d38"] : $d38 = '';
isset($_POST["d39"]) ? $d39 = $_POST["d39"] : $d39 = '';
isset($_POST["d40"]) ? $d40 = $_POST["d40"] : $d40 = '';

isset($_POST["d41"]) ? $d41 = $_POST["d41"] : $d41 = '';
isset($_POST["d42"]) ? $d42 = $_POST["d42"] : $d42 = '';
isset($_POST["d43"]) ? $d43 = $_POST["d43"] : $d43 = '';
isset($_POST["d44"]) ? $d44 = $_POST["d44"] : $d44 = '';
isset($_POST["d45"]) ? $d45 = $_POST["d45"] : $d45 = '';
isset($_POST["d46"]) ? $d46 = $_POST["d46"] : $d46 = '';
isset($_POST["d47"]) ? $d47 = $_POST["d47"] : $d47 = '';
isset($_POST["d50"]) ? $d50 = $_POST["d50"] : $d50 = '';

isset($_POST["d51"]) ? $d51 = $_POST["d51"] : $d51 = '';
isset($_POST["d52"]) ? $d52 = $_POST["d52"] : $d52 = '';
isset($_POST["d53"]) ? $d53 = $_POST["d53"] : $d53 = '';
isset($_POST["d54"]) ? $d54 = $_POST["d54"] : $d54 = '';
isset($_POST["d55"]) ? $d55 = $_POST["d55"] : $d55 = '';
isset($_POST["d56"]) ? $d56 = $_POST["d56"] : $d56 = '';
isset($_POST["d57"]) ? $d57 = $_POST["d57"] : $d57 = '';
isset($_POST["d58"]) ? $d58 = $_POST["d58"] : $d58 = '';
isset($_POST["d59"]) ? $d59 = $_POST["d59"] : $d59 = '';
isset($_POST["d60"]) ? $d60 = $_POST["d60"] : $d60 = '';

isset($_POST["d61"]) ? $d61 = $_POST["d61"] : $d61 = '';
isset($_POST["d62"]) ? $d62 = $_POST["d62"] : $d62 = '';
isset($_POST["d63"]) ? $d63 = $_POST["d63"] : $d63 = '';
isset($_POST['d23']) ? $d23 = $_POST['d23'] : $d23 = '';
$d_23 = $_POST['d23'];
$date=date_create($d_23);
$d23_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d48']) ? $d48 = $_POST['d48'] : $d48 = '';
$d_48 = $_POST['d48'];
$date=date_create($d_48);
$d48_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['d49']) ? $d49 = $_POST['d49'] : $d49 = '';
$d_49 = $_POST['d49'];
$date=date_create($d_49);
$d49_1 = date_format($date,"Y-m-d H:i:s");
$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';

if($tabled4_id==""){
    $strSQL = "insert into `tabled4` ( `tabled4_id`,`d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `d37`, `d38`, `d39`, `d40`, `d41`, `d42`, `d43`, `d44`, `d45`, `d46`, `d47`, `d48`, `d49`, `d50`, `d51`, `d52`, `d53`, `d54`, `d55`, `d56`, `d57`, `d58`, `d59`, `d60`, `d61`, `d62`, `d63`, `tabled1_id`, `timestamp`) VALUES (NULL, '$d1', '$d2_1', '$d3', '$d4', '$d5', '$d6', '$d7', '$d8', '$d9', '$d10', '$d11', '$d12', '$d13', '$d14', '$d15', '$d16', '$d17', '$d18', '$d19', '$d20', '$d21', '$d22', '$d23_1', '$d24', '$d25', '$d26', '$d27', '$d28', '$d29', '$d30', '$d31', '$d32', '$d33', '$d34', '$d35', '$d36', '$d37', '$d38', '$d39', '$d40', '$d41', '$d42', '$d43', '$d44', '$d45', '$d46', '$d47', '$d48_1', '$d49_1', '$d50', '$d51', '$d52', '$d53', '$d54', '$d55', '$d56', '$d57', '$d58', '$d59', '$d60', '$d61', '$d62', '$d63', '$tabled1_id', '$timestamp')";
    $objQuery = mysqli_query($objCon,$strSQL);
}else{
    $strSQL = "update `tabled4` SET `d1` = '$d1', `d2` = '$d2', `d3` = '$d3', `d4` = '$d4', `d5` = '$d5', `d6` = '$d6', `d7` = '$d7', `d8` = '$d8', `d9` = '$d9', `d10` = '$d10', `d11` = '$d11', `d12` = '$d12', `d13` = '$d13', `d14` = '$d14', `d15` = '$d15', `d16` = '$d16', `d17` = '$d17', `d18` = '$d18', `d19` = '$d19', `d20` = '$d20', `d21` = '$d21', `d22` = '$d22', `d23` = '$d23_1', `d24` = '$d24', `d25` = '$d25', `d26` = '$d26', `d27` = '$d27', `d28` = '$d28', `d29` = '$d29', `d30` = '$d30', `d31` = '$d31', `d32` = '$d32', `d33` = '$d33', `d34` = '$d34', `d35` = '$d35', `d36` = '$d36', `d37` = '$d37', `d38` = '$d38', `d39` = '$d39', `d40` = '$d40', `d41` = '$d41', `d42` = '$d42', `d43` = '$d43', `d44` = '$d44', `d45` = '$d45', `d46` = '$d46', `d47` = '$d47', `d48` = '$d48_1', `d49` = '$d49_1', `d50` = '$d50', `d51` = '$d51', `d52` = '$d52', `d53` = '$d53', `d54` = '$d54', `d55` = '$d55', `d56` = '$d56', `d57` = '$d57', `d58` = '$d58', `d59` = '$d59', `d60` = '$d60', `d61` = '$d61', `d62` = '$d62', `d63` = '$d63' WHERE `tabled4`.`tabled4_id` = '$tabled4_id'";
    $objQuery = mysqli_query($objCon,$strSQL);
}
    echo '<meta http-equiv="refresh" content="0; url=showalld.php">';
?>

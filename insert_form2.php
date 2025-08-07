<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");
$table1_id= $_POST["table1_id"];

isset($_POST["b1"]) ? $b1 = $_POST["b1"] : $b1 = '';
isset($_POST["pname"]) ? $pname = $_POST["pname"] : $pname = '';
isset($_POST["fname"]) ? $fname = $_POST["fname"] : $fname = '';
isset($_POST["lname"]) ? $lname = $_POST["lname"] : $lname = '';
isset($_POST["b2"]) ? $b2 = $_POST["b2"] : $b2 = '';
isset($_POST["b3"]) ? $b3 = $_POST["b3"] : $b3 = '';
isset($_POST["b4"]) ? $b4 = $_POST["b4"] : $b4 = '';
isset($_POST["b5"]) ? $b5 = $_POST["b5"] : $b5 = '';
isset($_POST["b6"]) ? $b6 = $_POST["b6"] : $b6 = '';
isset($_POST["b7"]) ? $b7 = $_POST["b7"] : $b7 = '';
isset($_POST["b8"]) ? $b8 = $_POST["b8"] : $b8 = '';

isset($_POST["b11"]) ? $b11 = $_POST["b11"] : $b11 = '';
isset($_POST["b12"]) ? $b12 = $_POST["b12"] : $b12 = '';
isset($_POST["b13"]) ? $b13 = $_POST["b13"] : $b13 = '';
isset($_POST["b14"]) ? $b14 = $_POST["b14"] : $b14 = '';
isset($_POST["b15"]) ? $b15 = $_POST["b15"] : $b18 = '';
isset($_POST["b16"]) ? $b16 = $_POST["b16"] : $b16 = '';
isset($_POST["b17"]) ? $b17 = $_POST["b17"] : $b17 = '';
isset($_POST["b18"]) ? $b18 = $_POST["b18"] : $b18 = '';
isset($_POST["b19"]) ? $b19 = $_POST["b19"] : $b19 = '';
isset($_POST["b20"]) ? $b20 = $_POST["b20"] : $b20 = '';

isset($_POST["b21"]) ? $b21 = $_POST["b21"] : $b21 = '';
isset($_POST["b22"]) ? $b22 = $_POST["b22"] : $b22 = '';
isset($_POST["b23"]) ? $b23 = $_POST["b23"] : $b23 = '';
isset($_POST["b24"]) ? $b24 = $_POST["b24"] : $b24 = '';
isset($_POST["b25"]) ? $b25 = $_POST["b25"] : $b25 = '';
isset($_POST["b26"]) ? $b26 = $_POST["b26"] : $b26 = '';
isset($_POST["b27"]) ? $b27 = $_POST["b27"] : $b27 = '';
isset($_POST["b28"]) ? $b28 = $_POST["b28"] : $b28 = '';
isset($_POST["b29"]) ? $b29 = $_POST["b29"] : $b29 = '';
isset($_POST["b30"]) ? $b30 = $_POST["b30"] : $b30 = '';

isset($_POST["b31"]) ? $b31 = $_POST["b31"] : $b31 = '';
isset($_POST["b32"]) ? $b32 = $_POST["b32"] : $b32 = '';
isset($_POST["b33"]) ? $b33 = $_POST["b33"] : $b33 = '';
isset($_POST["b34"]) ? $b34 = $_POST["b34"] : $b34 = '';
isset($_POST["b35"]) ? $b35 = $_POST["b35"] : $b35 = '';
isset($_POST["b36"]) ? $b36 = $_POST["b36"] : $b36 = '';
isset($_POST["b37"]) ? $b37 = $_POST["b37"] : $b37 = '';
isset($_POST["b38"]) ? $b38 = $_POST["b38"] : $b38 = '';
isset($_POST["b39"]) ? $b39 = $_POST["b39"] : $b39 = '';
isset($_POST["b40"]) ? $b40 = $_POST["b40"] : $b40 = '';

isset($_POST["b41"]) ? $b41 = $_POST["b41"] : $b41 = '';
isset($_POST["b42"]) ? $b42 = $_POST["b42"] : $b42 = '';
isset($_POST["b43"]) ? $b43 = $_POST["b43"] : $b43 = '';
isset($_POST["b44"]) ? $b44 = $_POST["b44"] : $b44 = '';
isset($_POST["b45"]) ? $b45 = $_POST["b45"] : $b45 = '';
isset($_POST["b46"]) ? $b46 = $_POST["b46"] : $b46 = '';
isset($_POST["b47"]) ? $b47 = $_POST["b47"] : $b47 = '';
isset($_POST["b48"]) ? $b48 = $_POST["b48"] : $b48 = '';
isset($_POST["b49"]) ? $b49 = $_POST["b49"] : $b49 = '';
isset($_POST["b50"]) ? $b50 = $_POST["b50"] : $b50 = '';

isset($_POST["b51"]) ? $b51 = $_POST["b51"] : $b51 = '';
isset($_POST["b52"]) ? $b52 = $_POST["b52"] : $b52 = '';
isset($_POST["b53"]) ? $b53 = $_POST["b53"] : $b53 = '';
isset($_POST["b54"]) ? $b54 = $_POST["b54"] : $b54 = '';
isset($_POST["b55"]) ? $b55 = $_POST["b55"] : $b55 = '';
isset($_POST["b56"]) ? $b56 = $_POST["b56"] : $b56 = '';
isset($_POST["b57"]) ? $b57 = $_POST["b57"] : $b57 = '';
isset($_POST["b58"]) ? $b58 = $_POST["b58"] : $b58 = '';
isset($_POST["b59"]) ? $b59 = $_POST["b59"] : $b59 = '';
isset($_POST["b60"]) ? $b60 = $_POST["b60"] : $b60 = '';
isset($_POST["table1_id"]) ? $table1_id = $_POST["table1_id"] : $table1_id = '';



isset($_POST['b9']) ? $b9 = $_POST['b9'] : $b9 = '';
$b_9 = $_POST['b9'];
$date=date_create($b_9);
$b9_1 = date_format($date,"Y-m-d H:i:s");

isset($_POST['b10']) ? $b10 = $_POST['b10'] : $b10 = '';
$b_10 = $_POST['b10'];
$date=date_create($b_10);
$b10_1 = date_format($date,"Y-m-d H:i:s");



$timestamp = date('Y-m-d H:i:s');


$strSQL = "insert into `table2` (`table2_id`, `b1`, `pname`, `fname`, `lname`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `b14`, `b15`, `b16`, `b17`, `b18`, `b19`, `b20`, `b21`, `b22`, `b23`, `b24`, `b25`, `b26`, `b27`, `b28`, `b29`, `b30`, `b31`, `b32`, `b33`, `b34`, `b35`, `b36`, `b37`, `b38`, `b39`, `b40`, `b41`, `b42`, `b43`, `b44`, `b45`, `b46`, `b47`, `b48`, `b49`, `b50`, `b51`, `b52`, `b53`, `b54`, `b55`, `b56`, `b57`, `b58`, `b59`, `b60`, `table1_id`, `timestamp`) VALUES (NULL, '$b1', '$pname', '$fname', '$lname', '$b3', '$b4', '$b5', '$b6', '$b7', '$b8', '$b9_1', '$b10_1', '$b11', '$b12', '$b13', '$b14', '$b15', '$b16', '$b17', '$b18', '$b19', '$b20', '$b21', '$b22', '$b23', '$b24', '$b25', '$b26', '$b27', '$b28', '$b29', '$b30', '$b31', '$b32', '$b33', '$b34', '$b35', '$b36', '$b37', '$b38', '$b39', '$b40', '$b41', '$b42', '$b43', '$b44', '$b45', '$b46', '$b47', '$b48', '$b49', '$b50', '$b51', '$b52', '$b53', '$b54', '$b55', '$b56', '$b57', '$b58', '$b59', '$b60', '$table1_id', '$timestamp')";
$objQuery = mysqli_query($objCon,$strSQL);
//echo '<meta http-equiv="refresh" content="0; url=showall.php">';
?>
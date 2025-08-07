<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");



isset($_POST["f2"]) ? $f2 = $_POST["f2"] : $f2 = '';
isset($_POST['f1']) ? $f1 = $_POST['f1'] : $f1 = '';
$f1 = $_POST['f1'];
$date=date_create($f1);
$f1_1 = date_format($date,"Y-m-d H:i:s");


$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';

$strSQL = "insert into `tablef` (`tablef_id`, `f1`, `f2`, `timestamp`) VALUES (NULL, '$f1_1', '$f2', '$timestamp' ) ";
$objQuery = mysqli_query($objCon,$strSQL);

//echo "Register Completed!<br>";	

echo '<meta http-equiv="refresh" content="0; url=showallf.php">';

?>
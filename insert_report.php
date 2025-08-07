<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");



$input_from = $_POST["input_from"];
$input_to = $_POST["input_to"];



echo "<br>"."input_from= ".$input_from = $_POST["input_from"];

echo "<br>"."input_to= ".$input_to = $_POST["input_to"];

?>
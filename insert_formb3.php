<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");


isset($_POST["tableb1_id"]) ? $tableb1_id = $_POST["tableb1_id"] : $tableb1_id = '';
isset($_POST["c1"]) ? $c1 = $_POST["c1"] : $c1 = '';
isset($_POST["c2"]) ? $c2 = $_POST["c2"] : $c2 = '';
isset($_POST["c3"]) ? $c3 = $_POST["c3"] : $c3 = '';
isset($_POST["c4"]) ? $c4 = $_POST["c4"] : $c4 = '';
isset($_POST["c5"]) ? $c5 = $_POST["c5"] : $c5 = '';
isset($_POST["c6"]) ? $c6 = $_POST["c6"] : $c6 = '';
isset($_POST["c7"]) ? $c7 = $_POST["c7"] : $c7 = '';
isset($_POST["c8"]) ? $c8 = $_POST["c8"] : $c8 = '';
isset($_POST["c9"]) ? $c9 = $_POST["c9"] : $c9 = '';
isset($_POST["c10"]) ? $c10 = $_POST["c10"] : $c10 = '';

$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';

$strSQL = "insert into `tableb3` (`tableb3_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `tableb1_id`, `timestamp`) VALUES (NULL, '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7', '$c8', '$c9', '$c10', '$tableb1_id', '$timestamp')";
$objQuery = mysqli_query($objCon,$strSQL);
// echo $table1_id;
// echo "<br>";
//echo "Register Completed!<br>";	


  echo '<meta http-equiv="refresh" content="0; url=formb4.php?tableb1_id='.$_POST["tableb1_id"].'">';
    

?>
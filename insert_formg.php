<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");


$g2 = $_POST["g2"];
$g3 = $_POST["g3"];
$g4 = $_POST["g4"];
$g5 = $_POST["g5"];
$g6 = $_POST["g6"];
$g7 = $_POST["g7"];
$g8 = $_POST["g8"];
$surg = $_POST["surg"];
$g9 = $_POST["g9"];
$g10 = $_POST["g10"];

$g11 = $_POST["g11"];
$g12 = $_POST["g12"];
$g13 = $_POST["g13"];
$g14 = $_POST["g14"];
$g15 = $_POST["g15"];
$ortho = $_POST["ortho"];
$g16 = $_POST["g16"];
$g17 = $_POST["g17"];
$g18 = $_POST["g18"];
$g19 = $_POST["g19"];
$g20 = $_POST["g20"];

$g21 = $_POST["g21"];
$g22 = $_POST["g22"];
$g23 = $_POST["g23"];
$g24 = $_POST["g24"];
$otor = $_POST["otor"];
$g25 = $_POST["g25"];
$g26 = $_POST["g26"];
$g27 = $_POST["g27"];
$g28 = $_POST["g28"];
$g29 = $_POST["g29"];
$g30 = $_POST["g30"];

$g31 = $_POST["g31"];
$g32 = $_POST["g32"];
$g33 = $_POST["g33"];
$oph = $_POST["oph"];
$g34 = $_POST["g34"];
$g35 = $_POST["g35"];
$g36 = $_POST["g36"];
$g37 = $_POST["g37"];
$g38 = $_POST["g38"];
$g39 = $_POST["g39"];
$g40 = $_POST["g40"];

$g41 = $_POST["g41"];
$g42 = $_POST["g42"];
$ped = $_POST["ped"];
$g43 = $_POST["g43"];
$g44 = $_POST["g44"];
$g45 = $_POST["g45"];
$g46 = $_POST["g46"];
$g47 = $_POST["g47"];
$g48 = $_POST["g48"];
$g49 = $_POST["g49"];
$g50 = $_POST["g50"];

$g51 = $_POST["g51"];
$dent = $_POST["dent"];
$g52 = $_POST["g52"];
$g53 = $_POST["g53"];
$g54 = $_POST["g54"];
$g55 = $_POST["g55"];
$g56 = $_POST["g56"];
$g57 = $_POST["g57"];
$g58 = $_POST["g58"];
$g59 = $_POST["g59"];
$g60 = $_POST["g60"];

$obs = $_POST["obs"];
$g61 = $_POST["g61"];
$g62 = $_POST["g62"];
$g63 = $_POST["g63"];
$g64 = $_POST["g64"];
$g65 = $_POST["g65"];
$g66 = $_POST["g66"];
$g67 = $_POST["g67"];
$g68 = $_POST["g68"];
$g69 = $_POST["g69"];
$med = $_POST["med"];
$g70 = $_POST["g70"];

$g71 = $_POST["g71"];
$g72 = $_POST["g72"];
$g73 = $_POST["g73"];
$g74 = $_POST["g74"];
$g75 = $_POST["g75"];
$g76 = $_POST["g76"];
$g77 = $_POST["g77"];
$g78 = $_POST["g78"];
$other = $_POST["other"];
$g79 = $_POST["g79"];
$g80 = $_POST["g80"];

$g81 = $_POST["g81"];
$g82 = $_POST["g82"];
$g83 = $_POST["g83"];
$g84 = $_POST["g84"];
$g85 = $_POST["g85"];
$g86 = $_POST["g86"];
$g87 = $_POST["g87"];
$g88 = $_POST["g88"];

isset($_POST['g1']) ? $g_1 = $_POST['g1'] : $g_1 = '';
$date=date_create($g_1);
$g1_1 = date_format($date,"Y-m-d H:i:s");
$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';
$strSQL = "insert into `tableg` (`tableg_id`, `g1`, `g2`, `g3`, `g4`, `g5`, `g6`, `surg`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g13`, `g14`, `g15`, `ortho`, `g16`, `g17`, `g18`, `g19`, `g20`, `g21`, `g22`, `g23`, `g24`, `otor`, `g25`, `g26`, `g27`, `g28`, `g29`, `g30`, `g31`, `g32`, `g33`, `oph`, `g34`, `g35`, `g36`, `g37`, `g38`, `g39`, `g40`, `g41`, `g42`, `ped`, `g43`, `g44`, `g45`, `g46`, `g47`, `g48`, `g49`, `g50`, `g51`, `dent`, `g52`, `g53`, `g54`, `g55`, `g56`, `g57`, `g58`, `g59`, `g60`, `obs`, `g61`, `g62`, `g63`, `g64`, `g65`, `g66`, `g67`, `g68`, `g69`, `med`, `g70`, `g71`, `g72`, `g73`, `g74`, `g75`, `g76`, `g77`, `g78`, `other`, `g79`, `g80`, `g81`, `g82`, `g83`, `g84`, `g85`, `g86`, `g87`, `g88`, `timestamp`) VALUES (NULL, '$g1_1', '$g2', '$g3', '$g4', '$g5', '$g6', '$surg', '$g7', '$g8', '$g9', '$g10', '$g11', '$g12', '$g13', '$g14', '$g15', '$ortho', '$g16', '$g17', '$g18', '$g19', '$g20', '$g21', '$g22', '$g23', '$g24', '$otor', '$g25', '$g26', '$g27', '$g28', '$g29', '$g30', '$g31', '$g32', '$g33', '$oph', '$g34', '$g35', '$g36', '$g37', '$g38', '$g39', '$g40', '$g41', '$g42', '$ped', '$g43', '$g44', '$g45', '$g46', '$g47', '$g48', '$g49', '$g50', '$g51', '$dent', '$g52', '$g53', '$g54', '$g55', '$g56', '$g57', '$g58', '$g59', '$g60', '$obs', '$g61', '$g62', '$g63', '$g64', '$g65', '$g66', '$g67', '$g68', '$g69', '$med', '$g70', '$g71', '$g72', '$g73', '$g74', '$g75', '$g76', '$g77', '$g78', '$other', '$g79', '$g80', '$g81', '$g82', '$g83', '$g84', '$g85', '$g86', '$g87', '$g88', '$timestamp');";
$objQuery = mysqli_query($objCon,$strSQL);

//echo "Register Completed!<br>";	

echo '<meta http-equiv="refresh" content="0; url=showallg.php">';



?>
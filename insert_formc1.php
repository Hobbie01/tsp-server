<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");

isset($_POST["a1"]) ? $a1 = $_POST["a1"] : $a1 = '';
isset($_POST["pname"]) ? $pname = $_POST["pname"] : $pname = '';
isset($_POST["fname"]) ? $fname = $_POST["fname"] : $fname = '';
isset($_POST["lname"]) ? $lname = $_POST["lname"] : $lname = '';
isset($_POST["age"]) ? $age = $_POST["age"] : $age = '';
isset($_POST["HN"]) ? $HN = $_POST["HN"] : $HN = '';
isset($_POST["an"]) ? $AN = $_POST["an"] : $AN = '';
isset($_POST["dx"]) ? $DX = $_POST["dx"] : $DX = '';
$DX = str_replace("'", "", $_POST["dx"]);
isset($_POST["ud"]) ? $UD = $_POST["ud"] : $UD = '';
isset($_POST['date_in']) ? $date_in = $_POST['date_in'] : $date_in = '';
$datein = $_POST['date_in'];
$date=date_create($datein);
$date_in = date_format($date,"Y-m-d H:i:s");
isset($_POST["date_out"]) ? $date_out = $_POST["date_out"] : $date_out = '';
    $dateout = $_POST["date_out"];
    $date=date_create($dateout);
    $date_out = date_format($date,"Y-m-d H:i:s");
isset($_POST["date_move"]) ? $date_move = $_POST["date_move"] : $date_move = '';
    $datemove = $_POST["date_move"];
    $date=date_create($datemove);
    $date_move = date_format($date,"Y-m-d H:i:s");
isset($_POST["from_ward"]) ? $from_ward = $_POST["from_ward"] : $from_ward = '';
isset($_POST["date_infect"]) ? $date_infect = $_POST["date_infect"] : $date_infect = '';
    $dateinfect = $_POST["date_infect"];
    $date=date_create($dateinfect);
    $date_infect = date_format($date,"Y-m-d H:i:s");
isset($_POST['ward_infect']) ? $ward_infect = $_POST['ward_infect'] : $ward_infect = '';
isset($_POST['dep_infect']) ? $dep_infect = $_POST['dep_infect'] : $dep_infect = '';
isset($_POST["Yes"]) ? $Yes = $_POST["Yes"] : $Yes = '';
isset($_POST["No"]) ? $No = $_POST["No"] : $No = '';
isset($_POST['st']) ? $st = $_POST['st'] : $st = '';
isset($_POST['off']) ? $off = $_POST['off'] : $off = '';
isset($_POST['other_in']) ? $other_in = $_POST['other_in'] : $other_in = '';
isset($_POST['check']) ? $check = $_POST['check'] : $check = '';
$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';

$strSQL = "insert into `tablec1` (`tablec1_id`, `a1`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `Yes`, `No`, `st`, `off`, `other_in`, `check`, `timestamp`) VALUES (NULL, '$a1', '$pname', '$fname', '$lname', '$age', '$HN', '$AN', '$DX', '$UD', '$date_in', '$date_out', '$date_move', '$from_ward', '$date_infect', '$ward_infect', '$dep_infect', '$Yes', '$No', '$st', '$off', '$other_in', '$check', '$timestamp')";
$objQuery = mysqli_query($objCon,$strSQL);



$a = " select * from `tablec1` WHERE 1 ORDER BY tablec1_id DESC limit 1 ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    $row["tablec1_id"];
    if($row["check"]=="1"){
       echo '<meta http-equiv="refresh" content="0; url=formc3.php?tablec1_id='.$row["tablec1_id"].'">';
    }else{
       echo '<meta http-equiv="refresh" content="0; url=formc3.php?tablec1_id='.$row["tablec1_id"].'">';
    }
}



?>
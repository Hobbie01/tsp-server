<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");



isset($_POST["table1_id"]) ? $table1_id = $_POST["table1_id"] : $table1_id = '';
isset($_POST["tableb1_id"]) ? $tableb1_id = $_POST["tableb1_id"] : $tableb1_id = '';
isset($_POST["tablec1_id"]) ? $tablec1_id = $_POST["tablec1_id"] : $tablec1_id = '';
isset($_POST["tabled1_id"]) ? $tabled1_id = $_POST["tabled1_id"] : $tabled1_id = '';
isset($_POST["tablee1_id"]) ? $tablee1_id = $_POST["tablee1_id"] : $tablee1_id = '';
isset($_POST["a1"]) ? $a1 = $_POST["a1"] : $a1 = '';
isset($_POST["pname"]) ? $pname = $_POST["pname"] : $pname = '';
isset($_POST["fname"]) ? $fname = $_POST["fname"] : $fname = '';
isset($_POST["lname"]) ? $lname = $_POST["lname"] : $lname = '';
isset($_POST["age"]) ? $age = $_POST["age"] : $age = '';
isset($_POST["hn"]) ? $HN = $_POST["hn"] : $HN = '';
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
isset($_POST['status1']) ? $status1 = $_POST['status1'] : $status1 = '';
isset($_POST['status2']) ? $status2 = $_POST['status2'] : $status2 = '';
isset($_POST['st']) ? $st = $_POST['st'] : $st = '';
isset($_POST['off']) ? $off = $_POST['off'] : $off = '';
isset($_POST['other_in']) ? $other_in = $_POST['other_in'] : $other_in = '';
isset($_POST['cauti']) ? $cauti = $_POST['cauti'] : $cauti = '';
isset($_POST['non_cauti']) ? $non_cauti = $_POST['non_cauti'] : $non_cauti = '';
$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';

$strSQL = "insert into `table1` (`table1_id`, `a1`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `status1`, `status2`, `st`, `off`, `other_in`, `cauti`, `non_cauti`, `timestamp`) VALUES (NULL, '$a1', '$pname', '$fname', '$lname', '$age', '$HN', '$AN', '$DX', '$UD', '$date_in', '$date_out', '$date_move', '$from_ward', '$date_infect', '$ward_infect', '$dep_infect', '$status1', '$status2', '$st', '$off', '$other_in', '$cauti', '$non_cauti', '$timestamp' ) ";
$objQuery = mysqli_query($objCon,$strSQL);

$a = "select * from `table1` Order By table1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){
    echo '<meta http-equiv="refresh" content="0; url=form3.php?table1_id='.$row["table1_id"].'">';
}



?>
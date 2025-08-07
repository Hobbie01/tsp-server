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

isset($_POST["a1"]) ? $a1 = $_POST["a1"] : $a1 = '';
isset($_POST["pname"]) ? $pname = $_POST["pname"] : $pname = '';
isset($_POST["fname"]) ? $fname = $_POST["fname"] : $fname = '';
isset($_POST["lname"]) ? $lname = $_POST["lname"] : $lname = '';
isset($_POST["age"]) ? $age = $_POST["age"] : $age = '';
isset($_POST["HN"]) ? $HN = $_POST["HN"] : $HN = '';
isset($_POST["AN"]) ? $AN = $_POST["AN"] : $AN = '';
isset($_POST["DX"]) ? $DX = $_POST["DX"] : $DX = '';
$DX = str_replace("'", "", $_POST["DX"]);
isset($_POST["UD"]) ? $UD = $_POST["UD"] : $UD = '';
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
isset($_POST['check']) ? $check = $_POST['check'] : $check = '';
$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';

$strSQL = "update `tableb1` SET `a1` = '$a1', `pname` = '$pname', `fname` = '$fname', `lname` = '$lname', `age` = '$age', `HN` = '$HN', `AN` = '$AN', `DX` = '$DX', `UD` = '$UD', `date_in` = '$date_in', `date_out` = '$date_out', `date_move` = '$date_move', `from_ward` = '$from_ward', `date_infect` = '$date_infect', `ward_infect` = '$ward_infect', `dep_infect` = '$dep_infect', `Yes` = '$Yes', `No` = '$No', `st` = '$st', `off` = '$off', `check` = '$check', `timestamp` = '$timestamp' WHERE `tableb1_id` = '$tableb1_id'";
$objQuery = mysqli_query($objCon,$strSQL);
$a1 = "select * from `tableb3` WHERE tableb1_id = '$tableb1_id'";
$a1Query = mysqli_query($objCon,$a1);
while($row1 = mysqli_fetch_array($a1Query)){
    if($row1["tableb3_id"]!=""){
        echo '<meta http-equiv="refresh" content="0; url=edit_formb3.php?tableb1_id='.$row1["tableb1_id"].'">';
    }else{ 
        echo '<meta http-equiv="refresh" content="0; url=formb3.php?tableb1_id='.$row1["tableb1_id"].'">';
    }

}
?>

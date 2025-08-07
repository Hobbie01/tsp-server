<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");

isset($_POST["table3_id"]) ? $table3_id = $_POST["table3_id"] : $table3_id = '';
isset($_POST["table1_id"]) ? $table1_id = $_POST["table1_id"] : $table1_id = '';
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

isset($_POST["c11"]) ? $c11 = $_POST["c11"] : $c11 = '';
isset($_POST["c12"]) ? $c12 = $_POST["c12"] : $c12 = '';
isset($_POST["c13"]) ? $c13 = $_POST["c13"] : $c13 = '';
isset($_POST["c14"]) ? $c14 = $_POST["c14"] : $c14 = '';
isset($_POST["c15"]) ? $c15 = $_POST["c15"] : $c15 = '';
isset($_POST["c16"]) ? $c16 = $_POST["c16"] : $c16 = '';
isset($_POST["c17"]) ? $c17 = $_POST["c17"] : $c17 = '';
isset($_POST["c18"]) ? $c18 = $_POST["c18"] : $c18 = '';
isset($_POST["c19"]) ? $c19 = $_POST["c19"] : $c19 = '';
isset($_POST["c20"]) ? $c20 = $_POST["c20"] : $c20 = '';

isset($_POST["c21"]) ? $c21 = $_POST["c21"] : $c21 = '';
isset($_POST["c22"]) ? $c22 = $_POST["c22"] : $c22 = '';
isset($_POST["c23"]) ? $c23 = $_POST["c23"] : $c23 = '';
$timestamp = date('Y-m-d H:i:s');
isset($timestamp) ? $timestamp = date('Y-m-d H:i:s') : $timestamp = '';
//echo "<br>";
$b = "select * from `table3` WHERE table1_id = '".$table1_id."' Order By table1_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
//echo "<br>";
while($row_b = mysqli_fetch_array($bQuery)){
    if($row_b["table3_id"]==""){
        $strSQL = "insert into `table3` (`table3_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`, `c16`, `c17`, `c18`, `c19`, `c20`, `c21`, `c22`, `c23`, `table1_id`, `timestamp`) VALUES (NULL, '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7', '$c8', '$c9', '$c10', '$c11', '$c12', '$c13', '$c14', '$c15', '$c16', '$c17', '$c18', '$c19', '$c20', '$c21', '$c22', '$c23', '$table1_id', '$timestamp')";
        $objQuery = mysqli_query($objCon,$strSQL);
        //echo "<br>";
        $a = "select * from `table1` WHERE table1_id = ".$table1_id." Order By table1_id DESC Limit 1 ";
        $aQuery = mysqli_query($objCon,$a);
        //echo "<br>";
        while ($row = mysqli_fetch_array($aQuery)){
        $row["cauti"];
            if($row["cauti"]="1"){
            echo '<meta http-equiv="refresh" content="0; url=edit_form4.php?table1_id='.$row["table1_id"].'">';
            }else{
            echo '<meta http-equiv="refresh" content="0; url=edit_form4.php?table1_id='.$row["table1_id"].'">';
            }
        }
    }else{
        $strSQL = "update `table3` SET `c1` = '$c1', `c2` = '$c2', `c3` = '$c3', `c4` = '$c4', `c5` = '$c5', `c6` = '$c6', `c7` = '$c7', `c8` = '$c8', `c9` = '$c9', `c10` = '$c10', `c11` = '$c11', `c12` = '$c12', `c13` = '$c13', `c14` = '$c14', `c15` = '$c15', `c16` = '$c16', `c17` = '$c17', `c18` = '$c18', `c19` = '$c19', `c20` = '$c20', `c21` = '$c21', `c22` = '$c22', `c23` = '$c23', `timestamp` = '$timestamp' WHERE `table3`.`table3_id` = '$table3_id'";
        $objQuery = mysqli_query($objCon,$strSQL);
        //echo "<br>";
        $a = "select * from `table1` WHERE table1_id = ".$table1_id." Order By table1_id DESC Limit 1 ";
        $aQuery = mysqli_query($objCon,$a);
        //echo "<br>";
        while ($row = mysqli_fetch_array($aQuery)){
        $row["cauti"];
            if($row["cauti"]="1"){
            echo '<meta http-equiv="refresh" content="0; url=edit_form4.php?table1_id='.$row["table1_id"].'">';
            }else{
            echo '<meta http-equiv="refresh" content="0; url=edit_form4.php?table1_id='.$row["table1_id"].'">';
            }
        }
    }
}
?>
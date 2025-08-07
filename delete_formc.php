<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"]) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");
?>
<?php
// เตรียมคำสั่ง SQL สำหรับลบข้อมูล
$tablec1_id = $_GET["tablec1_id"];

//ลบข้อมูลออกจาก database ตาม UserID  ที่ส่งมา

	$a = "select * from `tablec1` WHERE tablec1_id  =  '".$tablec1_id."' ";
	$aQuery = mysqli_query($objCon,$a);
	while($aResult = mysqli_fetch_array($aQuery)){

		$c = "delete from`tablec2` WHERE `tablec1_id` = '".$aResult["tablec1_id"]."' ";
		$cQuery = mysqli_query($objCon,$c);

        $d = "delete from`tablec3` WHERE `tablec1_id` = '".$aResult["tablec1_id"]."' ";
		$dQuery = mysqli_query($objCon,$d);

        $e = "delete from`tablec4` WHERE `tablec1_id` = '".$aResult["tablec1_id"]."' ";
		$eQuery = mysqli_query($objCon,$e);

		$b = "delete from`tablec1` WHERE `tablec1_id` = '".$aResult["tablec1_id"]."' ";
		$bQuery = mysqli_query($objCon,$b);

		echo '<meta http-equiv="refresh" content="0; url=showallc.php">';
	}
?>
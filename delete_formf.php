<?php 
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");
?>
<?php
// เตรียมคำสั่ง SQL สำหรับลบข้อมูล
$tablef_id = $_GET["tablef_id"];

//ลบข้อมูลออกจาก database ตาม UserID  ที่ส่งมา

	$a = "select * from `tablef` WHERE tablef_id  =  '".$tablef_id."' ";
	$aQuery = mysqli_query($objCon,$a);
	while($aResult = mysqli_fetch_array($aQuery)){

		$c = "delete from `tablef` WHERE `tablef_id` = '".$aResult["tablef_id"]."' ";
		$cQuery = mysqli_query($objCon,$c);

		echo '<meta http-equiv="refresh" content="0; url=showallf.php">';
	}
?>
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
$tabled1_id = $_GET["tabled1_id"];

//ลบข้อมูลออกจาก database ตาม UserID  ที่ส่งมา

	$a = "select * from `tabled1` WHERE tabled1_id  =  '".$tabled1_id."' ";
	$aQuery = mysqli_query($objCon,$a);
	while($aResult = mysqli_fetch_array($aQuery)){

		$c = "delete from`tabled2` WHERE `tabled1_id` = '".$aResult["tabled1_id"]."' ";
		$cQuery = mysqli_query($objCon,$c);

        $d = "delete from`tabled3` WHERE `tabled1_id` = '".$aResult["tabled1_id"]."' ";
		$dQuery = mysqli_query($objCon,$d);

        $e = "delete from`tabled4` WHERE `tabled1_id` = '".$aResult["tabled1_id"]."' ";
		$eQuery = mysqli_query($objCon,$e);

		$b = "delete from`tabled1` WHERE `tabled1_id` = '".$aResult["tabled1_id"]."' ";
		$bQuery = mysqli_query($objCon,$b);

		echo '<meta http-equiv="refresh" content="0; url=showalld.php">';
	}
?>
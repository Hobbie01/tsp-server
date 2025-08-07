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
$tablee1_id = $_GET["tablee1_id"];

//ลบข้อมูลออกจาก database ตาม UserID  ที่ส่งมา

	$a = "select * from `tablee1` WHERE tablee1_id  =  '".$tablee1_id."' ";
	$aQuery = mysqli_query($objCon,$a);
	while($aResult = mysqli_fetch_array($aQuery)){

		$c = "delete from`tablee2` WHERE `tablee1_id` = '".$aResult["tablee1_id"]."' ";
		$cQuery = mysqli_query($objCon,$c);

		$b = "delete from`tablee1` WHERE `tablee1_id` = '".$aResult["tablee1_id"]."' ";
		$bQuery = mysqli_query($objCon,$b);

		echo '<meta http-equiv="refresh" content="0; url=showalle.php">';
	}
?>
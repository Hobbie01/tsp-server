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
$table1_id = $_GET["table1_id"];

//ลบข้อมูลออกจาก database ตาม UserID  ที่ส่งมา

	$a = "select * from `table1` WHERE table1_id  =  '".$table1_id."' ";
	$aQuery = mysqli_query($objCon,$a);
	while($aResult = mysqli_fetch_array($aQuery)){

		$c = "delete from`table2` WHERE `table1_id` = '".$aResult["table1_id"]."' ";
		$cQuery = mysqli_query($objCon,$c);

        $d = "delete from`table3` WHERE `table1_id` = '".$aResult["table1_id"]."' ";
		$dQuery = mysqli_query($objCon,$d);

        $e = "delete from`table4` WHERE `table1_id` = '".$aResult["table1_id"]."' ";
		$eQuery = mysqli_query($objCon,$e);

		$b = "delete from`table1` WHERE `table1_id` = '".$aResult["table1_id"]."' ";
		$bQuery = mysqli_query($objCon,$b);

		echo '<meta http-equiv="refresh" content="0; url=showall.php">';
	}
?>
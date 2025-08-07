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
$tableb1_id = $_GET["tableb1_id"];

//ลบข้อมูลออกจาก database ตาม UserID  ที่ส่งมา

	$a = "select * from `tableb1` WHERE tableb1_id  =  '".$tableb1_id."' ";
	$aQuery = mysqli_query($objCon,$a);
	while($aResult = mysqli_fetch_array($aQuery)){

		$b = "delete from`tableb1` WHERE `tableb1_id` = '".$aResult["tableb1_id"]."' ";
		$bQuery = mysqli_query($objCon,$b);

        $d = "delete from`tableb3` WHERE `tableb1_id` = '".$aResult["tableb1_id"]."' ";
		$dQuery = mysqli_query($objCon,$d);

        $e = "delete from`tableb4` WHERE `tableb1_id` = '".$aResult["tableb1_id"]."' ";
		$eQuery = mysqli_query($objCon,$e);

		$c = "delete from`tableb2` WHERE `tableb1_id` = '".$aResult["tableb1_id"]."' ";
		$cQuery = mysqli_query($objCon,$c);

		echo '<meta http-equiv="refresh" content="0; url=showallb.php">';
	}
?>
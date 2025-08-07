<?php 
session_start(); 


 //เคลียร์ค่า session
session_destroy();
header('Location: ../index.php'); //Logout เรียบร้อยและกระโดดไปหน้าตามที่ต้องการ
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
        <!-- sweetalert2 -->
		<script src="sweetalert/sweetalert2.all.min.js"></script>  
		<link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
</head>

<body>
<?php
$stringUSER_ID = isset($_SESSION["USER_ID"]) ? $_SESSION["USER_ID"] : '';
	if($stringUSER_ID != "")
	{ 
        include'logs.php'; // save logs
	echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "ออกจากระบบ",
                    confirmButtonText: "ออกจากระบบ",
					allowOutsideClick: false
                }).then(() => {
                    window.location.href = "../index.php";
                    
                });
              </script>';
	} else {


        echo '<meta http-equiv="refresh" content="0; url=../index.php">';
    }

			  
session_destroy();
?>
</body>
</html>
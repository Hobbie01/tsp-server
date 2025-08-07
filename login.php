<?php
session_start();
error_reporting(~E_NOTICE);
include'sqlsrv_connect.php'; 
	$stringUSER_ID = isset($_SESSION["USER_ID"]) ? $_SESSION["USER_ID"] : '';
	if($stringUSER_ID != "")
	{ 
	header('Location: ../index.php');
	}
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">

    <title></title>
</head>

<body>

    <?php 
 $username = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
	if($username != "")
	{ 
		// Statement error undefined index php
	}	

	// if ($_SERVER["REQUEST_METHOD"] == "POST") {

         
         //กำหนด cost 10 เพื่อให้การเข้ารหัสรวดเร็วยิ่งขึ้น *ตัวเลขยิ่งเยอะ ยิ่งทำงานช้า ซึ่งขึ้นอยู่กับความเร็วของคอมที่เราใช้ครับ เพราะฉะนั้น 10 ก็พอครับ หรือจะลองเพิ่มตัวเลขแล้วรันดูครับ ว่าจะดีเลเยอะไหม!!
         $options = [
                  'cost' => 4,
              ];
	$username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    $options = [
        'cost' => 4,
    ];

    $sql="SELECT username, password FROM user WHERE username='$username'";
    $result = mysqli_query($objCon, $sql);
		//ถ้า username ถูกต้อง จะเอามาเช็ค password ต่อว่า verify แล้วถ๔กต้องไหม
		if(mysqli_num_rows($result)==1){
			$row = mysqli_fetch_array($result);
			//รหัสผ่านมาจากตาราง
			$store_password = $row['password'];
			//Verify  Password ตรวจสอบ password ระหว่าง $password และ $store_password
			$validPassword = password_verify($password, $store_password);
				  
					if($validPassword){
                        //สร้าง query เพื่อเอาไปใช้งานต่อ
		$queryMember="SELECT * FROM user WHERE username='$username'";
		$rsMember = mysqli_query($objCon, $queryMember);
		$rowM = mysqli_fetch_array($rsMember);
		if ($rowM) { // 
		
			$_SESSION["USER_ID"] =  $rowM["id"];
			$_SESSION["username"] =  $rowM["username"];
			$_SESSION["type_ward"]= $rowM["type_ward"];
			$_SESSION["type_user"]= $rowM["type_user"];
	
            //print_r($_SESSION);

           // header("location:../index.php");

        //password ถูกต้อง
        //echo '<br> <font color="blue"> password match!! </font> <br> ';

        //สร้างเงื่อนไขตรวจสอบระดับหรือสิทธิการใช้งาน
        if($_SESSION["type_user"]=='1' || $_SESSION["type_user"]=='2' || $_SESSION["type_user"]=='3' || $_SESSION["type_user"]=='4'){
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "เข้าสู่ระบบสำเร็จ",
                    text: "ยินดีต้อนรับ : คุณ'.$rowM['username'] . ' ",
                    confirmButtonText: "เข้าสู่ระบบ",
					allowOutsideClick: false
                }).then(() => {
                    window.location.href = "../index.php";
                });
              </script>';
            //กระโดดไปหน้าแอดมิน
            //Header("Location: admin.php"); //ทำต่อเองนะครับ

        }else{
            exit();
        }
    }else{
        //password ผิด
        //เคลียร์ session 
        session_destroy();
        echo '<script>
        Swal.fire({
            icon: "warning",
            title: "permission to access this report",
            text: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
            confirmButtonText: "OK",
            allowOutsideClick: false
            });
              </script>';
    }
} //if(mysqli_num_rows($result)==1){
    else{
            //username & password ไม่ถูกต้อง
            session_destroy();
            echo '<script>
            Swal.fire({
                icon: "warning",
                title: "permission to access this report",
                text: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
                confirmButtonText: "OK",
                allowOutsideClick: false
                });
                  </script>';

    }



}//isset


?>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>


                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4"></p>
                            </div>
                            <form action="login.php" id="loginForm" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="txtUsername" name="txtUsername">

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="txtPassword" name="txtPassword">

                                </div>



                                <input type="submit" value="เข้าสู่ระบบ" class="btn btn-block btn-primary">
                                <br>

                                <p class="m-0">หมายเหตุ : ใช้ Username / Password เดียวกับระบบ Health Object (HO)</p>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">

                                    <?php 
    $USER_ID = isset($_SESSION["USER_ID"]) ? $_SESSION["USER_ID"] : '';
	if($USER_ID != "")
	{
		//header('Location: index.php');
        
        echo $_SESSION["USER_ID"];
        echo "<br>";
        echo $_SESSION["username"];
        echo "<hr>";
		 ?>
                                    <a href="logout.php" class="nav-item nav-link">LOGOUT</a>

                                    <?php
			} else {
					?>
                                    <a href="login.php" class="nav-item nav-link active">LOGIN</a>

                                    <?php 
					}
                    ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>
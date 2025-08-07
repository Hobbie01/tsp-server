<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");
include("header.php");
include("sidebar.php");
include("navbar.php");

?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">


                <!--<div class="card-header pb-0">
                    <h6></h6>
                </div>-->
                <div class="card-body pb-2">



                    <div class="row">

                        <div class="col-4">
                            <div>

                            </div>

                        </div>
                        <div class="col-4">
                            <div>
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-start">
                                        <h4 class="font-weight-bolder text-center">Log in</h4>

                                    </div>
                                    <div class="card-body">
<?php 
$USER_ID = isset($_SESSION["USER_ID"]) ? $_SESSION["USER_ID"] : '';
if($USER_ID != "")
{ 
?>
<span><img src="assets/img/theme/tim.png" style="width: 30px;"> คุณ  <?php echo $_SESSION["username"]; ?>  <a href="logout.php">logout</a></span>
<?php
} else {
?>
<span><a href="login/login.php">Login</a></span>
<?php }?>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-4">
                            <div>

                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
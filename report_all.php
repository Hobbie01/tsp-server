<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("header.php");
include("sidebar.php");
include("navbar.php");
include("connect.php");
include("sqlsrv_connect.php");


?>


<!-- Style -->


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>รายงานทั้งหมด</h3>
                        </div>
                        <div class="col-2">


                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-12">
                            <p><a href="report.php">รายงานผู้ป่วยใส่อุปกรณ์พิเศษ</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p><a href="report2.php">รายงานการติดเชื้อในโรงพยาบาลประจำปี</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p><a href="report4.php">รายงาน(จำแนกตามภาควิชา)</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p></p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">


                </div>
            </div>
        </div>
    </div>





</div>
</div>

<?php
include("footer.php");
?>
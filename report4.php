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


$a = "select * from`table1` WHERE 1  ";
$aQuery = mysqli_query($objCon,$a);

?>


<link rel="stylesheet" href="calendar-15/css/rome.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="calendar-15/css/bootstrap.min.css">

<!-- Style -->


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>รายงานจำแนกตามภาควิชา</h3>
                        </div>
                        <div class="col-2">


                        </div>
                    </div>


                    <form id="form1" name="form1" method="post" action="report5.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_from">From</label>
                                    <input type="text" class="form-control" name="input_from" id="input_from" placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_from">To</label>
                                    <input type="text" class="form-control" name="input_to" id="input_to" placeholder="Start Date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group text-center">
                                <button type="submit" class="btn bg-gradient-success px-3 py-2"><i class="fa fa-save">
                                        ค้นหา</i></button>
                            </div>
                        </div>
                    </form>



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
<script src="calendar-15/js/jquery-3.3.1.min.js"></script>
<script src="calendar-15/js/popper.min.js"></script>
<script src="calendar-15/js/bootstrap.min.js"></script>
<script src="calendar-15/js/rome.js"></script>

<script src="calendar-15/js/main.js"></script>
<?php
include("footer.php");
?>
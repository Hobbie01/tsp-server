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
<link rel="stylesheet" href="calendar-09/css/bootstrap-datetimepicker.min.css">
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เพิ่มยอดที่ยกมาใหม่ </h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formf.php" method="post">
                        <div class="row">
                            <div class="col-6">

                                <div class="datepickers">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">วันที่รับใหม่</label>
                                        <div class="input-group date" id="id_1">
                                            <input type="text" name="f1" id="f1" value="" class="form-control"
                                                placeholder="MM/DD/YYYY" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">ยอดที่ยกมา </label>
                                    <input class="form-control" type="text" name="f2" id="f2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                            class="fa fa-save"> บันทึก</i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="calendar-09/js/jquery.min.js"></script>
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<?php
include("footer.php");
?>
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


$a = "select * from `table1` WHERE 1";
$aQuery = mysqli_query($objCon,$a);

?>



<!-- Style -->


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>รายงานการติดเชื้อในโรงพยาบาลประจำปี</h3>
                        </div>
                        <div class="col-2">


                        </div>
                    </div>


                    <form id="form1" name="form1" method="post" action="report3.php">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="yearSelect" class="form-label">ปี</label>
                                <select id="yearSelect" name="yearSelect" class="form-select" required>
                                    <option value="">-- เลือกปี --</option>
                                    <script>
                                    const currentYear = new Date().getFullYear();
                                    for (let year = currentYear; year >= currentYear - 100; year--) {
                                        document.write(`<option value="${year}">${year}</option>`);
                                    }
                                    </script>
                                </select>
                            </div>
                            <div class="col-md-6"><br>
                                <button type="submit" class="btn bg-gradient-success px-3 py-2"><i class="fa fa-save">
                                        ค้นหา</i></button>
                            </div>
                        </div>

                    </form>

                    <br>
                    <br>

                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">


                </div>
            </div>
        </div>
    </div>

</div>


<?php
include("footer.php");
?>
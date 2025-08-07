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


<script>
function confirmDelete(tablec1_id) { // ฟังก์ชันจะถูกเรียกถ้าผู้ใช้คลิกที่ link ลบ
    var ans = confirm("ต้องการลบข้อมูลฟอร์มนี้ " + tablec1_id); // แสดงกล่องถามผู้ใช้
    if (ans == true) // ถ้าผู้ใช้กด OK จะเข้าเงื่อนไขนี้
        document.location = "delete_formc.php?tablec1_id=" + tablec1_id;
    //ส่งรหัสไปให้ไฟล์ delete.php
}
</script>


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>การวินิจฉัยภาวะปอดอักเสบทั้งหมด</h3>
                        </div>
                        <div class="col-2">
                            <div class="float-right">
                                <!-- <a href="formc1.php" class="btn btn-primary btn-lg active"
                                    role="button" aria-pressed="true">เพิ่ม</a> -->
                                    <a href="search_hnc.php" class="btn btn-success" role="button"
                                    aria-pressed="true">ค้นหา</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        HN</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                        AN</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                        ชื่อ-สกุล</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        เครื่องมือ</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $a = "select * from `tablec1` ORDER BY tablec1_id DESC ";
                                $aQuery = mysqli_query($objCon,$a);
                                while ($row = mysqli_fetch_array($aQuery)){?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="./assets/img/team-1.jpg" class="avatar avatar-sm me-3"
                                                    alt="user3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">


                                                <a href="#">
                                                    <h6 class="mb-0 text-sm"><?= $row["HN"] ?></h6>
                                                </a>


                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0"><?= $row["AN"] ?></p>

                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0"><?= $row["pname"]."".$row["fname"]." ".$row["lname"]?></p>

                                    </td>

                                    <td class="align-middle">
                                        <a href="edit_formc1.php?tablec1_id=<?= $row["tablec1_id"] ?>"
                                            class="btn btn-outline-success #fbfbfbpx-3 py-2"><i
                                                class="fa fa-pencil">แก้ไข</i>
                                        </a>

                                        <a href="#" onclick='confirmDelete(<?= $row["tablec1_id"]?>)'
                                            class="btn btn-outline-danger px-3 py-2"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>
<?php
include("footer.php");
?>
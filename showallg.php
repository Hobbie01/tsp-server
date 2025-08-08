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
$a = "select * from `tableg` ORDER BY tableg_id DESC ";
$aQuery = mysqli_query($objCon,$a);

?>


<script>
function confirmDelete(tableg_id) { // ฟังก์ชันจะถูกเรียกถ้าผู้ใช้คลิกที่ link ลบ
    var ans = confirm("ต้องการลบข้อมูลฟอร์มนี้ " + tableg_id); // แสดงกล่องถามผู้ใช้
    if (ans == true) // ถ้าผู้ใช้กด OK จะเข้าเงื่อนไขนี้
        document.location = "delete_formf.php?tablef_id=" + tableg_id;
    //ส่งรหัสไปให้ไฟล์ delete.php
}
</script>


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-9">
                            <h3>รายงานผู้ป่วยใส่อุปกรณ์พิเศษ (IN4)
                            ทั้งหมด</h3>
                        </div>
                        <div class="col-3">
                            <div class="float-right">
                                <a href="formg.php" class="btn btn-primary btn-lg active"
                                    role="button" aria-pressed="true">เพิ่มข้อมูล</a>
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
                                        ลำดับ</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                        วันที่</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                        ยอดยกมา</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        เครื่องมือ</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                while ($row = mysqli_fetch_array($aQuery)){?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="./assets/img/team-1.jpg" class="avatar avatar-sm me-3"
                                                    alt="user3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $i; ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0"><?= $row["g1"]; ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0"><?= $row["g2"]; ?></p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <a href="edit_formg.php?tableg_id=<?= $row["tableg_id"] ?>"
                                            class="btn btn-outline-success px-3 py-2 me-2"><i
                                                class="fa fa-pencil"></i> แก้ไข
                                        </a>
                                        <a href="#" onclick='confirmDelete(<?= $row["tableg_id"]?>)'
                                            class="btn btn-outline-danger px-3 py-2"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
                                </tr>
                                <?php 
                                $i++;
                                 }//endwhile
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>
<?php
include("footer.php");
?>
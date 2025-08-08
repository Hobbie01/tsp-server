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


<style>
.table-responsive {
    overflow-x: auto;
}

@media (max-width: 768px) {
    .btn {
        margin-bottom: 2px !important;
        width: 100%;
    }
}
</style>

<script>
function confirmDelete(table1_id) { // ฟังก์ชันจะถูกเรียกถ้าผู้ใช้คลิกที่ link ลบ
    var ans = confirm("ต้องการลบข้อมูลฟอร์มนี้ " + table1_id); // แสดงกล่องถามผู้ใช้
    if (ans == true) // ถ้าผู้ใช้กด OK จะเข้าเงื่อนไขนี้
        document.location = "delete_form1.php?table1_id=" + table1_id;
    //ส่งรหัสไปให้ไฟล์ delete.php
}

// เพิ่มฟังก์ชันสำหรับการนำทางไปยังฟอร์มต่างๆ
function goToForm(formNumber, table1_id, hn, an) {
    var url = 'form' + formNumber + '.php?table1_id=' + table1_id + '&hn=' + hn + '&an=' + an;
    window.location.href = url;
}
</script>


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>การติดเชื้อในระบบทางเดินปัสสาวะทั้งหมด</h3>
                        </div>
                        <div class="col-2">
                            <div class="float-right">
                                <a href="form1.php" class="btn btn-primary btn-lg active me-2"
                                    role="button" aria-pressed="true">เพิ่มข้อมูล</a>
                                    <a href="search_hn.php" class="btn btn-success" role="button"
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
                                
                                $a = "select * from table1 order by table1_id desc";
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

                                    <td class="align-middle text-end">
                                        <button onclick="goToForm(2, '<?= $row["table1_id"] ?>', '<?= $row["HN"] ?>', '<?= $row["AN"] ?>')"
                                            class="btn btn-outline-success px-3 py-2 me-2" title="แบบฟอร์มทบทวนปัจจัยการติดเชื้อในระบบทางเดินปัสสาวะที่สัมพันธ์ในการใส่สายสวนปัสสาว(CAUTI)">
                                            <i class="fa fa-clipboard-check"></i> ทบทวนปัจจัย
                                        </button>
                                        <button onclick="goToForm(3, '<?= $row["table1_id"] ?>', '<?= $row["HN"] ?>', '<?= $row["AN"] ?>')"
                                            class="btn btn-outline-success px-3 py-2 me-2" title="เพิ่มการวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ(ต่อ)">
                                            <i class="fa fa-plus-circle"></i> เพิ่มการวินิจฉัย
                                        </button>
                                        <button onclick="goToForm(4, '<?= $row["table1_id"] ?>', '<?= $row["HN"] ?>', '<?= $row["AN"] ?>')"
                                            class="btn btn-outline-success px-3 py-2 me-2" title="การวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ(ต่อ)">
                                            <i class="fa fa-microscope"></i> ผลการตรวจ
                                        </button>
                                        <a href="edit_form1.php?table1_id=<?= $row["table1_id"] ?>"
                                            class="btn btn-outline-success px-3 py-2 me-2"><i
                                                class="fa fa-pencil"></i> แก้ไข
                                        </a>
                                        <a href="#" onclick='confirmDelete(<?= $row["table1_id"]?>)'
                                            class="btn btn-outline-danger px-3 py-2 me-2"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
                                </tr>
                                <?php } //endwhile ?>
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
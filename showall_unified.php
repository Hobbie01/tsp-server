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

// กำหนดประเภทการแสดงผลตาม parameter
$type = isset($_GET['type']) ? $_GET['type'] : 'a';

// Configuration array สำหรับแต่ละประเภท
$config = [
    'a' => [
        'title' => 'การติดเชื้อในระบบทางเดินปัสสาวะทั้งหมด',
        'table' => 'table1',
        'id_field' => 'table1_id',
        'add_form' => 'form1.php',
        'edit_form' => 'edit_form1.php',
        'delete_form' => 'delete_form1.php',
        'search_form' => 'search_hn.php',
        'columns' => ['HN', 'AN', 'name']
    ],
    'b' => [
        'title' => 'การวินิจฉัยการติดเชื้อในกระแสโลหิตทั้งหมด',
        'table' => 'tableb1',
        'id_field' => 'tableb1_id',
        'add_form' => 'formb1.php',
        'edit_form' => 'edit_formb1.php',
        'delete_form' => 'delete_formb.php',
        'search_form' => 'search_hnb.php',
        'columns' => ['HN', 'AN', 'name']
    ],
    'c' => [
        'title' => 'การวินิจฉัยภาวะปอดอักเสบทั้งหมด',
        'table' => 'tablec1',
        'id_field' => 'tablec1_id',
        'add_form' => 'formc1.php',
        'edit_form' => 'edit_formc1.php',
        'delete_form' => 'delete_formc.php',
        'search_form' => 'search_hnc.php',
        'columns' => ['HN', 'AN', 'name']
    ],
    'd' => [
        'title' => 'เกณฑ์การวินิจฉัยการติดเชื้อที่ตำแหน่งผ่าตัดทั้งหมด',
        'table' => 'tabled1',
        'id_field' => 'tabled1_id',
        'add_form' => 'formd1.php',
        'edit_form' => 'edit_formd1.php',
        'delete_form' => 'delete_formd.php',
        'search_form' => 'search_hnd.php',
        'columns' => ['HN', 'AN', 'name']
    ],
    'e' => [
        'title' => 'รายงานการติดเชื้อตำแหน่งอื่นๆ ทั้งหมด',
        'table' => 'tablee1',
        'id_field' => 'tablee1_id',
        'add_form' => 'forme1.php',
        'edit_form' => 'edit_forme1.php',
        'delete_form' => 'delete_forme.php',
        'search_form' => 'search_hne.php',
        'columns' => ['HN', 'AN', 'name']
    ],
    'f' => [
        'title' => 'ยอดยกมาทั้งหมด',
        'table' => 'tablef',
        'id_field' => 'tablef_id',
        'add_form' => 'formf.php',
        'edit_form' => null,
        'delete_form' => 'delete_formf.php',
        'search_form' => null,
        'columns' => ['sequence', 'date', 'amount']
    ]
];

// ตรวจสอบว่า type ที่ส่งมาถูกต้องหรือไม่
if (!isset($config[$type])) {
    $type = 'a'; // default
}

$current_config = $config[$type];
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
function confirmDelete(id, type) {
    var ans = confirm("ต้องการลบข้อมูลฟอร์มนี้ " + id);
    if (ans == true) {
        var deleteFormMap = {
            'a': 'delete_form1.php?table1_id=' + id,
            'b': 'delete_formb.php?tableb1_id=' + id,
            'c': 'delete_formc.php?tablec1_id=' + id,
            'd': 'delete_formd.php?tabled1_id=' + id,
            'e': 'delete_forme.php?tablee1_id=' + id,
            'f': 'delete_formf.php?tablef_id=' + id
        };
        document.location = deleteFormMap[type];
    }
}

function reviewData(id, type, hn, an) {
    // กำหนดหน้าทบทวนสำหรับแต่ละประเภท
    var reviewFormMap = {
        'a': 'form2.php?table1_id=' + id + '&hn=' + hn + '&an=' + an, // ทบทวนปัจจัยการติดเชื้อปัสสาวะ
        'b': 'formb2.php?tableb1_id=' + id + '&hn=' + hn + '&an=' + an, // ทบทวนการติดเชื้อกระแสโลหิต
        'c': 'formc2.php?tablec1_id=' + id + '&hn=' + hn + '&an=' + an, // ทบทวนปอดอักเสบ
        'd': 'formd2.php?tabled1_id=' + id + '&hn=' + hn + '&an=' + an, // ทบทวนการติดเชื้อผ่าตัด
        'e': 'forme2.php?tablee1_id=' + id + '&hn=' + hn + '&an=' + an // ทบทวนการติดเชื้อตำแหน่งอื่นๆ
    };
    
    if (reviewFormMap[type]) {
        window.location.href = reviewFormMap[type];
    } else {
        alert('ไม่มีฟอร์มทบทวนสำหรับประเภทนี้');
    }
}
</script>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3><?= $current_config['title'] ?></h3>
                        </div>
                        <div class="col-2">
                            <div class="float-right">
                                <a href="<?= $current_config['add_form'] ?>" class="btn btn-primary btn-lg active me-2"
                                    role="button" aria-pressed="true">เพิ่มข้อมูล</a>
                                <?php if ($current_config['search_form']): ?>
                                    <a href="<?= $current_config['search_form'] ?>" class="btn btn-success" role="button"
                                        aria-pressed="true">ค้นหา</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <?php if ($type == 'f'): ?>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ลำดับ</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">วันที่</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">ยอดยกมา</th>
                                    <?php else: ?>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">HN</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">AN</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">ชื่อ-สกุล</th>
                                    <?php endif; ?>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">เครื่องมือ</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM {$current_config['table']} ORDER BY {$current_config['id_field']} DESC";
                                $result = mysqli_query($objCon, $sql);
                                
                                if ($type == 'f') {
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="./assets/img/team-1.jpg" class="avatar avatar-sm me-3" alt="user3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $i ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0"><?= $row["f1"] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0"><?= $row["f2"] ?></p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <a href="#" onclick='confirmDelete(<?= $row[$current_config['id_field']] ?>, "<?= $type ?>")'
                                            class="btn btn-outline-danger px-3 py-2"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
                                </tr>
                                <?php 
                                        $i++;
                                    }
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="./assets/img/team-1.jpg" class="avatar avatar-sm me-3" alt="user3">
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
                                        <p class="text-m font-weight-bold mb-0"><?= $row["pname"]."".$row["fname"]." ".$row["lname"] ?></p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <button onclick="reviewData('<?= $row[$current_config['id_field']] ?>', '<?= $type ?>', '<?= $row["HN"] ?>', '<?= $row["AN"] ?>')" 
                                            class="btn btn-outline-primary px-3 py-2 me-2" title="ทบทวนข้อมูล">
                                            <i class="fa fa-clipboard-check"></i> ทบทวน
                                        </button>
                                        
                                        <?php if ($current_config['edit_form']): ?>
                                            <a href="<?= $current_config['edit_form'] ?>?<?= $current_config['id_field'] ?>=<?= $row[$current_config['id_field']] ?>"
                                                class="btn btn-outline-success px-3 py-2 me-2">
                                                <i class="fa fa-pencil"></i> แก้ไข
                                            </a>
                                        <?php endif; ?>
                                        
                                        <a href="#" onclick='confirmDelete(<?= $row[$current_config['id_field']] ?>, "<?= $type ?>")'
                                            class="btn btn-outline-danger px-3 py-2 me-2">
                                            <i class="fa fa-trash"></i> ลบ
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

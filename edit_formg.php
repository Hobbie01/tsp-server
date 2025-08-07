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

$a = "select * from `tableg` WHERE tableg_id = '".$_GET['tableg_id']."' Order By tableg_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

?>
<link rel="stylesheet" href="calendar-09/css/bootstrap-datetimepicker.min.css">
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เพิ่มรายงานผู้ป่วยใส่อุปกรณ์พิเศษ (IN4) </h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="edit_formg_sql.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="datepickers">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="formcontrol-label">1. วันที่</p>
                                        </div>
                                        <div class="col-10">
                                            <div class="input-group date" id="id_1">
                                                <?php
                                                $g_1 = $row['g1'];
                                                $date=date_create($g_1);
                                                $g1_1 = date_format($date,"Y-m-d H:i:s");
                                                ?>
                                                <input type="text" name="g1" id="g1" value="<?= $g1_1; ?>"
                                                    class="form-control" placeholder="MM/DD/YYYY" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <p>2. จำนวนผู้ป่วยรายใหม่</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g2" id="g2" value="<?= $row['g2'] ?>">
                            </div>
                            <div class="col-4">
                                <p>ราย</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>3. จำนวนผู้ป่วย</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g3" id="g3" value="<?= $row['g3'] ?>">
                            </div>
                            <div class="col-4">
                                <p>ราย</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-2">
                                <p>Urinary Cath</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g4" id="g4" value="<?= $row['g4'] ?>">
                            </div>
                            <div class="col-4">
                                <p>ครั้ง</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-2">
                                <p>Central Line</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g5" id="g5" value="<?= $row['g5'] ?>">
                            </div>
                            <div class="col-4">
                                <p>ครั้ง</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-2">
                                <p>Ventilator</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g6" id="g6" value="<?= $row['g6'] ?>">
                            </div>
                            <div class="col-4">
                                <p>ครั้ง</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>4. ภาควิชา</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Surgery</h6><input type="hidden" name="surg" id="surg"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g7" id="g7"
                                                    value="<?= $row['g7'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g8" id="g8"
                                                    value="<?= $row['g8'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g9" id="g9"
                                                    value="<?= $row['g9'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g10" id="g10"
                                                    value="<?= $row['g10'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g11" id="g11"
                                                        value="<?= $row['g11'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g12" id="g12"
                                                        value="<?= $row['g12'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g13" id="g13"
                                                        value="<?= $row['g13'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g14" id="g14"
                                                        value="<?= $row['g14'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g15" id="g15"
                                                        value="<?= $row['g15'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Orthopedic</h6><input type="hidden" name="ortho" id="ortho"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g16" id="g16"
                                                    value="<?= $row['g16'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g17" id="g17"
                                                    value="<?= $row['g17'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g18" id="g18"
                                                    value="<?= $row['g18'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g19" id="g19"
                                                    value="<?= $row['g19'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g20" id="g20"
                                                        value="<?= $row['g20'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g21" id="g21"
                                                        value="<?= $row['g21'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g22" id="g22"
                                                        value="<?= $row['g22'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g23" id="g23"
                                                        value="<?= $row['g23'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g24" id="g24"
                                                        value="<?= $row['g24'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Otorhinolaryngology</h6><input type="hidden" name="otor"
                                            id="otor" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g25" id="g25"
                                                    value="<?= $row['g25'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g26" id="g26"
                                                    value="<?= $row['g26'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g27" id="g27"
                                                    value="<?= $row['g27'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g28" id="g28"
                                                    value="<?= $row['g28'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p>Procedure of Surgical Wound</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        - CSEC
                                                    </div>
                                                    <div class="col-4">
                                                        <input class="form-control" type="text" name="g29" id="g29"
                                                            value="<?= $row['g29'] ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        ครั้ง
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        - EPI
                                                    </div>
                                                    <div class="col-4">
                                                        <input class="form-control" type="text" name="g30" id="g30"
                                                            value="<?= $row['g30'] ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        ครั้ง
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        - KT
                                                    </div>
                                                    <div class="col-4">
                                                        <input class="form-control" type="text" name="g31" id="g31"
                                                            value="<?= $row['g31'] ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        ครั้ง
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        - APPE
                                                    </div>
                                                    <div class="col-4">

                                                        <input class="form-control" type="text" name="g32" id="g32"
                                                            value="<?= $row['g32'] ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        ครั้ง
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        - VPS
                                                    </div>
                                                    <div class="col-4">

                                                        <input class="form-control" type="text" name="g33" id="g33"
                                                            value="<?= $row['g33'] ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        ครั้ง
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Ophthalmology</h6><input type="hidden" name="oph" id="oph"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g34" id="g34"
                                                    value="<?= $row['g34'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g35" id="g35"
                                                    value="<?= $row['g35'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g36" id="g36"
                                                    value="<?= $row['g36'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g37" id="g37"
                                                    value="<?= $row['g37'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g38" id="g38"
                                                        value="<?= $row['g38'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g39" id="g39"
                                                        value="<?= $row['g39'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g40" id="g40"
                                                        value="<?= $row['g40'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g41" id="g41"
                                                        value="<?= $row['g41'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g42" id="g42"
                                                        value="<?= $row['g42'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Pediatric</h6><input type="hidden" name="ped" id="ped"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g43" id="g43"
                                                    value="<?= $row['g43'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g44" id="g44"
                                                    value="<?= $row['g44'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g45" id="g45"
                                                    value="<?= $row['g45'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g46" id="g46"
                                                    value="<?= $row['g46'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g47" id="g47"
                                                        value="<?= $row['g47'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g48" id="g48"
                                                        value="<?= $row['g48'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g49" id="g49"
                                                        value="<?= $row['g49'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g50" id="g50"
                                                        value="<?= $row['g50'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g51" id="g51"
                                                        value="<?= $row['g51'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Surgery(Dentrisy)</h6><input type="hidden" name="dent"
                                            id="dent" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g52" id="g52"
                                                    value="<?= $row['g52'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g53" id="g53"
                                                    value="<?= $row['g53'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g54" id="g54"
                                                    value="<?= $row['g54'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g55" id="g55"
                                                    value="<?= $row['g55'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g56" id="g56"
                                                        value="<?= $row['g56'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g57" id="g57"
                                                        value="<?= $row['g57'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g58" id="g58"
                                                        value="<?= $row['g58'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g59" id="g59"
                                                        value="<?= $row['g59'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g60" id="g60"
                                                        value="<?= $row['g60'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Obs&Gyn</h6><input type="hidden" name="obs" id="obs"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g61" id="g61"
                                                    value="<?= $row['g61'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g62" id="g62"
                                                    value="<?= $row['g62'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g63" id="g63"
                                                    value="<?= $row['g63'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g64" id="g64"
                                                    value="<?= $row['g64'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g65" id="g65"
                                                        value="<?= $row['g65'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g66" id="g66"
                                                        value="<?= $row['g66'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g67" id="g67"
                                                        value="<?= $row['g67'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g68" id="g68"
                                                        value="<?= $row['g68'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g69" id="g69"
                                                        value="<?= $row['g69'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Medical</h6><input type="hidden" name="med" id="med"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g70" id="g70"
                                                    value="<?= $row['g70'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g71" id="g71"
                                                    value="<?= $row['g71'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g72" id="g72"
                                                    value="<?= $row['g72'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g73" id="g73"
                                                    value="<?= $row['g73'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g74" id="g74"
                                                        value="<?= $row['g74'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g75" id="g75"
                                                        value="<?= $row['g75'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g76" id="g76"
                                                        value="<?= $row['g76'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g77" id="g77"
                                                        value="<?= $row['g77'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g78" id="g78"
                                                        value="<?= $row['g78'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Other</h6><input type="hidden" name="other" id="other" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g79" id="g79"
                                                    value="<?= $row['g79'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g80" id="g80"
                                                    value="<?= $row['g80'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g81" id="g81"
                                                    value="<?= $row['g81'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g82" id="g82"
                                                    value="<?= $row['g82'] ?>">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g83" id="g83"
                                                        value="<?= $row['g83'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g84" id="g84"
                                                        value="<?= $row['g84'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g85" id="g85"
                                                        value="<?= $row['g85'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g86" id="g86"
                                                        value="<?= $row['g86'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g87" id="g87"
                                                        value="<?= $row['g87'] ?>">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">


                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-check-label" for="g88">
                                        <h6>ผู้รายงาน</h6>
                                    </label>
                                </div>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="g88" id="g88"
                                        value="<?= $row['g88'] ?>" placeholder="ผู้รายงาน">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="tableg_id" value="<?= $row['tableg_id'] ?>">
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                            class="fa fa-save">
                                            บันทึก</i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
<?php } ?>

<script src="calendar-09/js/jquery.min.js"></script>
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<?php
include("footer.php");
?>
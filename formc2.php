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

$a = "SELECT * FROM `tablec1` WHERE tablec1_id = '".$_GET['tablec1_id']."' Order By tablec1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

?>
<link rel="stylesheet" href="calendar-09/css/bootstrap-datetimepicker.min.css">
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="typeahead.js"></script>
<style>
.typeahead {
    border: 1px solid #DDD;
    border-radius: 4px;
    padding: 8px 12px;
    max-width: 300px;
    min-width: 290px;
    background: #FFF;
    color: #000;
}

.tt-menu {
    width: 300px;
}

ul.typeahead {
    margin: 0px;
    padding: 10px 0px;
}

ul.typeahead.dropdown-menu li a {
    padding: 10px !important;
    border-bottom: #CCC 1px solid;
    color: #000;
}

ul.typeahead.dropdown-menu li:last-child a {
    border-bottom: 0px !important;
}

.bgcolor {
    max-width: 550px;
    min-width: 290px;
    max-height: 340px;
    background: ;
    padding: 100px 10px 130px;
    border-radius: 4px;
    text-align: center;
    margin: 10px;
}

.demo-label {
    font-size: 1em;
    color: #CCC;
    font-weight: 500;
    color: #000;
}

.dropdown-menu>.active>a,
.dropdown-menu>.active>a:focus,
.dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #EEE;
    color: #000;
    outline: 0;
}
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>แบบฟอร์มทบทวนปัจจัยการติดเชื้อตำแหน่งปอดอักเสบที่สัมพันธ์กับการใส่เครื่องช่วยหายใจ (VAP)</h6>

                </div>
                <div class="card-body pb-2">

                    <form role="form" action="insert_formc2.php" method="post">

                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">ส่วนที่ 1 ข้อมูลและปัจจัยที่เกี่ยวข้อง</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <div>
                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">ข้อมูลผู้ป่วย</h6>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">หอผู้ป่วย</label>
                                                        <input class="typeahead" type="text" name="b1" id="b1"
                                                            value="<?= $row['a1'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">คำนำหน้าชื่อ</label>
                                                        <input class="form-control" type="text" name="pname" id="pname"
                                                            value="<?= $row['pname'] ?>" placeholder="คำนำหน้าชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">ชื่อ</label>
                                                        <input class="form-control" type="text" name="fname"
                                                            value="<?= $row['fname'] ?>" id="fname" placeholder="ชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">นามสกุล</label>
                                                        <input class="form-control" type="text" name="lname" id="lname"
                                                            value="<?= $row['lname'] ?>" placeholder="นามสกุล">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">HN</label>
                                                        <input class="form-control" type="text" name="b2" id="b2"
                                                            value="<?= $row['HN'] ?>" placeholder="HN">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">อายุ(ปี)</label>
                                                        <input class="form-control" type="text" name="b3" id="b3"
                                                            value="<?= $row['age'] ?>" placeholder="อายุ(ปี)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">การวินัจฉัยโรค</label>
                                                            <input class="form-control" type="text" name="b4" id="b4"
                                                                placeholder="การวินัจฉัยโรค">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">U/D</label>
                                                            <input class="form-control" type="text" name="b5" id="b5"
                                                                placeholder="U/D">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">แพทย์เจ้าของไข้</label>
                                                            <input class="form-control" type="text" name="b6" id="b6"
                                                                placeholder="แพทย์เจ้าของไข้">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">ภาควิชา</label>
                                                            <input class="form-control" type="text" name="b7" id="b7"
                                                                placeholder="ภาควิชา">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">วันที่รับใหม่</label>
                                                            <div class="input-group date" id="id_0">
                                                                <input type="text" name="b8" id="b8" value=""
                                                                    class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">วันที่ใส่
                                                                Ventilator</label>

                                                            <div class="input-group date" id="id_1">
                                                                <input type="text" name="b9" id="b9" value=""
                                                                    class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-3 text-sm">สถานที่ใส่ท่อช่วยหายใจ</h6>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b10" name="b10">
                                                            <label class="form-check-label" for="b10">
                                                                รพ.ศรีนครินทร์
                                                            </label>
                                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                                            <input class="form-control" type="text" name="b11" id="b11"
                                                                placeholder="รายละเอียด">
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b12" name="b12">
                                                            <label class="form-check-label" for="b13">
                                                                ส่งต่อจากรพ.</label>
                                                            <input class="form-control" type="text" name="b13" id="b13"
                                                                placeholder="รายละเอียด">

                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">วันที่ติดเชื้อ</label>
                                                            <div class="input-group date" id="id_2">
                                                                <input type="text" name="b56" id="b56" value=""
                                                                    class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="ms-auto text-end">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6>ปัจจัยที่เกี่ยวข้อง</h6>
                                            <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านผู้ป่วย</h6>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b14" name="b14">
                                                        <label class="form-check-label" for="b14">
                                                            อายุเกิน > 60 ปี หรือ < 1 ปี </label>
                                                    </div>

                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b15" name="b15">
                                                        <label class="form-check-label" for="b15">
                                                            สูบบุหรี่
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b16" name="b16">
                                                        <label class="form-check-label" for="b16">
                                                            ความรู้สึกตัวลดลง
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b17" name="b17">
                                                        <label class="form-check-label" for="b17">
                                                            มีประวัติการสำลัก
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b18" name="b18">
                                                        <label class="form-check-label" for="b18">
                                                            มีโรคมะเร็ง</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b19" name="b19">
                                                        <label class="form-check-label" for="b19">
                                                            CMT/RT/ยากดภูมิ
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b20" name="b20">
                                                        <label class="form-check-label" for="b20">
                                                            ได้รับการผ่าตัดทรวงอก/ช่องท้อง
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b21" name="b21">
                                                        <label class="form-check-label" for="b21">
                                                            มีการติดเชื้อในระบบอื่น
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b22" name="b22">
                                                        <label class="form-check-label" for="b22">
                                                            ได้รับ ATB
                                                        </label>
                                                        <label for="name" class="formcontrol-label">ระบุ</label>
                                                        <input class="form-control" type="text" id="b23" name="b23"
                                                            placeholder="รายละเอียด">
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b24" name="b24">
                                                        <label class="form-check-label" for="b24">
                                                            อืนๆ
                                                        </label>
                                                        <label for="name" class="formcontrol-label">ระบุ</label>
                                                        <input class="form-control" type="text" id="b25" name="b25"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านเชื้อก่อโรค</h6>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">เชื้อก่อโรค 1.

                                                        </label>
                                                        <input class="form-control" type="text" name="b26" id="b26"
                                                            placeholder="เชื้อก่อโรค">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="name" class="formcontrol-label">เชื้อก่อโรค 2.</label>
                                                    <input class="form-control" type="text" id="b27" name="b27"
                                                        placeholder="เชื่อก่อโรค">
                                                </div>
                                                <div class="col-4">
                                                    <label for="name" class="formcontrol-label">เชื้อก่อโรค 3.</label>
                                                    <input class="form-control" type="text" id="b28" name="b28"
                                                        placeholder="เชื้อก่อโรค">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b29" name="b29">
                                                        <label class="form-check-label" for="b29">
                                                            พบเชื้อเดียวกับตำแหน่งอื่นในร่างกาย</label>
                                                        <label for="name" class="formcontrol-label">ระบุ</label>
                                                        <input class="form-control" type="text" name="b30" id="b30"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b31" name="b31">
                                                        <label class="form-check-label" for="b31">
                                                            พบเชื้อเดียวกับผู้ป่วยอื่นในหอผู้ป่วย ณ
                                                            ช่วงเวลาเดียวกัน/ใกล้เคียงกัน</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านสิ่งแวดล้อม</h6>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b32" name="b32">
                                                        <label class="form-check-label"
                                                            for="b32">ใช้เครื่องช่วยหายใจเกิน 4 วัน</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b33" name="b33">
                                                        <label class="form-check-label" for="b33">Self extubation /
                                                            Re-intubation</label>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b34" name="b34">
                                                        <label class="form-check-label" for="b34">ได้รับยา
                                                            Antacids</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b57" name="b57">
                                                        <label class="form-check-label" for="b57">อื่นๆ</label>
                                                        <input class="form-control" type="text" name="b58" id="b58" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-4"></div>
                                                <div class="col-4"></div>
                                            </div>
                                            <div class="row">
                                                <h6>ผลการประเมินการปฏิบัติ</h6>
                                                <div class="col-6">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b35" name="b35">
                                                        <label class="form-check-label"
                                                            for="b35">การทำความสะอาดมือก่อน-หลัง<br>ดูและผู้ป่วยที่ใส่เครื่องฯ
                                                        </label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b36" id="b36"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b37" name="b37">
                                                        <label class="form-check-label" for="b37">จัดท่าศีรษะสูง 30-45
                                                            &deg;</label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b38" id="b38"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b39" name="b39">
                                                        <label class="form-check-label" for="b39">วัด Cuff pressure
                                                            เวรละ 1 ครั้ง</label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b40" id="b40"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b41" name="b41">
                                                        <label class="form-check-label" for="b41">เปลี่ยน Vent. Circuits
                                                            ตามข้อบ่งชี้</label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b42" id="b42"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 pb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b43" name="b43">
                                                        <label class="form-check-label"
                                                            for="b43">ทำความสะอาดช่องปากอย่างน้อยเวรละ 1 ครั้ง
                                                            ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b44" id="b44"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6 pb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b45" name="b45">
                                                        <label class="form-check-label"
                                                            for="b45">ประเมินและหย่าเครื่องช่วยหายใจ เมื่อมีข้อบ่งชี้
                                                            ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b46" id="b46"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6 pb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b47" name="b47">
                                                        <label class="form-check-label" for="b47">อื่นๆ</label>
                                                        <input class="form-control" type="text" name="b48" id="b48"
                                                            placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6 pb-3">

                                                </div>
                                                <div class="col-6">
                                                </div>

                                            </div>




                                        </div>
                                    </div>



                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="form-group">
                                                        <label for="b54">สรุปวิเคราะห์สาเหตุของการติดเชื้อ</label>
                                                        <textarea class="form-control" id="b49" name="b49"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="card">
                                        <div class="card-header pb-0 px-3">
                                            <h6 class="mb-0">ส่วนที่ 2
                                                การแก้ไขสาเหตุและมาตรการปฏิบัติเพื่่อการป้องกันการเกิด VAP
                                                ในหอผู้ป่วย</h6>
                                        </div>
                                        <div class="card-body pt-4 p-3">
                                            <div>
                                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                    <div>
                                                        <h6 class="mb-3 text-sm">รายละเอียด</h6>
                                                        <div class="row">
                                                            <div class="col-12 pb-3">
                                                                <textarea class="form-control" id="b50" name="b50"
                                                                    rows="3" placeholder="รายละเอียด"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="b51">ลงชื่อ ผู้รายงาน
                                                                    (พยาบาลควบคุมการติดเชื้อประจำหอผู้ป่วย)</label>
                                                                <input class="form-control" type="text" name="b51"
                                                                    id="b51">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header pb-0 px-3">
                                            <h6 class="mb-0">ส่วนที่ 3 ข้อเสนอแนะ</h6>
                                        </div>
                                        <div class="card-body pt-4 p-3">
                                            <div>
                                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                    <div>
                                                        <h6 class="mb-3 text-sm">รายละเอียดข้อเสนอแนะ</h6>
                                                        <div class="row">
                                                            <div class="col-6 pb-3">
                                                                <textarea class="form-control" id="b52" name="b52"
                                                                    rows="3"
                                                                    placeholder="รายละเอียดข้อเสนอแนะ"></textarea>
                                                            </div>
                                                            <div class="col-6 pb-3">
                                                                <textarea class="form-control" id="b53" name="b53"
                                                                    rows="3"
                                                                    placeholder="รายละเอียดข้อเสนอแนะ"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">

                                                                <label for="b59">ลงชื่อ (หัวหน้าหอผู้ป่วย) </label>
                                                                <input class="form-control" type="text" name="b54"
                                                                    id="b54" placeholder="ลงชื่อ (หัวหน้าหอผู้ป่วย)">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="b60">ลงชื่อ (ICN ผู้รับผิดชอบ) </label>
                                                                <input class="form-control" type="text" name="b55"
                                                                    id="b55" placeholder="ลงชื่อ (ICN ผู้รับผิดชอบ)">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group text-center pt-3">
                                                                    <input type="hidden" name="tablec1_id"
                                                                        id="tablec1_id"
                                                                        value="<?php echo $_GET["tablec1_id"];?>">
                                                                    <button type="submit"
                                                                        class="btn bg-gradient-success px-3 py-2"><i
                                                                            class="fa fa-save">
                                                                            บันทึก</i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<script>
$(document).ready(function() {
    $('#b1').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "server.php",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            });
        }
    });
});
</script>
<!-- <script src="js/jquery.min.js"></script> -->
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/main.js"></script>
<!-- <script src="calendar-09/js/jquery.min.js"></script> -->
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>

<?php
include("footer.php");
?>
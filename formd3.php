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

<!-- <link rel="stylesheet" href="calendar-09/css/style.css"> -->
<link rel="stylesheet" href="calendar-09/css/bootstrap-datetimepicker.min.css">

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>แบบฟอร์มการทำ Root Cause Analysis ผู้ป่วยแผลติดเชื้อหลังผ่าตัด</h5>
                    <h6>คณะกรรมการควบคุมและป้องกันการติดเชื้อ แผนกการพยาบาลห้องผ่าตัด</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formd3.php" method="post">

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm">การผ่าตัดครั้งที่ 1</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ห้องผ่าตัด</label>
                                            <input class="form-control" type="text" name="d1" id="d1"
                                                placeholder="ห้องผ่าตัด">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="datepickers">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">วันที่ทำผ่าตัด</label>
                                                <div class="input-group date" id="id_0">
                                                    <input type="text" name="d2" id="d2" value="" class="form-control"
                                                        placeholder="MM/DD/YYYY hh:mm:ss" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Diagnosis</label>
                                            <input class="form-control" type="text" name="d3" id="d3"
                                                placeholder="Diagnosis">
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Operation</label>
                                            <input class="form-control" type="text" name="d4" id="d4"
                                                placeholder="Operation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d5" name="d5">
                                            <label class="form-check-label" for="d5">Elective case</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d6" name="d6">
                                            <label class="form-check-label" for="d6">Emergency case</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ASA Score</label>
                                            <input class="form-control" type="text" name="d7" id="d7"
                                                placeholder="ASA Score">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            ลักษณะแผลผ่าตัด
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d8" name="d8">
                                            <label class="form-check-label" for="d8">Clean</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d9" name="d9">
                                            <label class="form-check-label" for="d9">Clean-contaminated</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d10"
                                                name="d10">
                                            <label class="form-check-label" for="d10">Contaminated</label>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d11"
                                                name="d11">
                                            <label class="form-check-label" for="d11">Dirty</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระยะเวลาในการผ่าตัด</label>
                                            <input class="form-control" type="text" name="d12" id="d12"
                                                placeholder="ระยะเวลาในการผ่าตัด">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Surgeon</label>
                                            <input class="form-control" type="text" name="d13" id="d13"
                                                placeholder="Surgeon">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Assistant</label>
                                            <input class="form-control" type="text" name="d14" id="d14"
                                                placeholder="Assistant">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Scrub</label>
                                            <input class="form-control" type="text" name="d15" id="d15"
                                                placeholder="Scrub">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Circulation Nurse</label>
                                            <input class="form-control" type="text" name="d16" id="d16"
                                                placeholder="Circulation Nurse">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm">การเตรียมก่อนผ่าตัด</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="name" class="formcontrol-label"> 1.
                                            ผู้ป่วยเข้ารับการผ่าตัดลำดับที่</label>
                                    </div>
                                    <div class="col-2">

                                        <input class="form-control" type="text" name="d17" id="d17" placeholder="ลำดับ">

                                    </div>
                                    <div class="col-1">/</div>
                                    <div class="col-2">
                                        <input class="form-control" type="text" name="d18" id="d18" placeholder="">
                                    </div>
                                    <div class="col-5"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="name" class="formcontrol-label"> 2.
                                            การได้รับยาปฏิชีวนะก่อนผ่าตัด</label>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d19"
                                                name="d19">
                                            <label class="form-check-label" for="d19">ไม่ได้</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d20"
                                                name="d20">
                                            <label class="form-check-label" for="d20">ได้</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                            <input class="form-control" type="text" name="d21" id="d21"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระยะเวลา</label>
                                            <input class="form-control" type="text" name="d22" id="d22"
                                                placeholder="ระยะเวลา/นาทีก่อนลงมีด">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-3">
                                        <label for="name" class="formcontrol-label"> 3.
                                            การได้รับยากดภูมิคุ้มกันก่อนผ่าตัด</label>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d23"
                                                name="d23">
                                            <label class="form-check-label" for="d23">ไม่ได้</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d24"
                                                name="d24">
                                            <label class="form-check-label" for="d24">ได้</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                            <input class="form-control" type="text" name="d25" id="d25"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระยะเวลา</label>
                                            <input class="form-control" type="text" name="d26" id="d26"
                                                placeholder="ระยะเวลา/วัน">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label"> 4. Underlying disease </label>
                                            <input class="form-control" type="text" name="d27" id="d27"
                                                placeholder="Underlying disease">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-3">
                                        <label for="name" class="formcontrol-label"> 5.
                                            การติดเชื้อ/มีแผลในตำแหน่งอื่น</label>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d28"
                                                name="d28">
                                            <label class="form-check-label" for="d28">ไม่มี</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d29"
                                                name="d29">
                                            <label class="form-check-label" for="d29">มี</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระบุตำแหน่ง/เชื้อ</label>
                                            <input class="form-control" type="text" name="d30" id="d30"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ยาที่ได้รับ</label>
                                            <input class="form-control" type="text" name="d31" id="d31"
                                                placeholder="ยาที่ได้รับ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="name" class="formcontrol-label"> 6. การเตรียมผู้ป่วยตาม SSI Bundle
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - กำจัดชนก่อนผ่าตัดด้วย
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d32"
                                                name="d32">
                                            <label class="form-check-label" for="d32">Clipper </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ตำแหน่ง</label>
                                            <input class="form-control" type="text" name="d33" id="d33"
                                                placeholder="ตำแหน่ง">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ก่อนเริ่มผ่าตัด</label>
                                            <input class="form-control" type="text" name="d34" id="d34"
                                                placeholder="ก่อนเริ่มผ่าตัด/นาที">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">

                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d35"
                                                name="d35">
                                            <label class="form-check-label" for="d35">ไม่จำเป็น </label>
                                        </div>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                    <div class="col-3">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - สถานที่โกนขน
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d36"
                                                name="d36">
                                            <label class="form-check-label" for="d36">ห้องผ่าตัด </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d37"
                                                name="d37">
                                            <label class="form-check-label" for="d37">หอผู้ป่วย </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d38"
                                                name="d38">
                                            <label class="form-check-label" for="d38">อื่นๆ</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d39" id="d39"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - รอยจากการกำจัดขน
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d40"
                                                name="d40">
                                            <label class="form-check-label" for="d40">ไม่มี</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d41"
                                                name="d41">
                                            <label class="form-check-label" for="d41">มี</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d42" id="d42"
                                                placeholder="การแก้ไข">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - Antibiotic
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d43"
                                                name="d43">
                                            <label class="form-check-label" for="d43">ได้รับ</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d44" id="d44"
                                                placeholder="mg.">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ก่อนลงมีด</label>
                                            <input class="form-control" type="text" name="d45" id="d45"
                                                placeholder="ก่อนลงมีด/นาที">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - Temperature
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d46"
                                                name="d46">
                                            <label class="form-check-label" for="d46">ได้รับ</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d47" id="d47" placeholder="c">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - Sugar
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d48"
                                                name="d48">
                                            <label class="form-check-label" for="d48">ได้รับ</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d49" id="d49"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <label for="name" class="formcontrol-label"> 7. การเตรียมผิวหนังบริเวณผ่าตัด
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-1">
                                        </div>
                                        <div class="col-3">
                                            - อาบน้ำ สระผมก่อนวันผ่าตัด
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d50"
                                                    name="d50">
                                                <label class="form-check-label" for="d50">ทำ</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d51"
                                                    name="d51">
                                                <label class="form-check-label" for="d51">ไม่ทำ</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-1">
                                        </div>
                                        <div class="col-3">
                                            - ฟอกเข่า ตะโพก ตลอดขาทั้งสองข้าง
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d52"
                                                    name="d52">
                                                <label class="form-check-label" for="d52">ทำ</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d53"
                                                    name="d53">
                                                <label class="form-check-label" for="d53">ไม่ทำ</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1">
                                        </div>
                                        <div class="col-3">
                                            - ดูแลความสะอาดของเล็บ
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d54"
                                                    name="d54">
                                                <label class="form-check-label" for="d54">ทำ</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d55"
                                                    name="d55">
                                                <label class="form-check-label" for="d55">ไม่ทำ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="name" class="formcontrol-label"> 8. การใส่สายสวนปัสสาวะ </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - ชนิด/ขนาด/เวลา/สถานที่
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ก่อนลงมีด</label>
                                            <input class="form-control" type="text" name="d56" id="d56"
                                                placeholder="ก่อนลงมีด/นาที">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - น้ำยาที่ใช้
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d57"
                                                name="d57">
                                            <label class="form-check-label" for="d57"> 0.5% Hibitain solu on </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d58"
                                                name="d58">
                                            <label class="form-check-label" for="d58">อื่นๆ</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d59" id="d59"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - ใส่สายสวนปัสสาวะโดย
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d60" id="d60" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - มีโอกาสเกิดการติดเชื้อจากการใส่
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d61"
                                                name="d61">
                                            <label class="form-check-label" for="d61">ไม่มี </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d62"
                                                name="d62">
                                            <label class="form-check-label" for="d62">มี</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">จาก</label>
                                            <input class="form-control" type="text" name="d63" id="d63"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        แก้ไขโดย
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d64" id="d64" placeholder="">
                                        </div>

                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-12">
                                        <label for="name" class="formcontrol-label"> 9.
                                            การทำความสะอาดผิวหนัง</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - Scrub
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d65"
                                                name="d65">
                                            <label class="form-check-label" for="d65">Betadine scrub </label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d66"
                                                name="d66">
                                            <label class="form-check-label" for="d66">Hibiscrub</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d67"
                                                name="d67">
                                            <label class="form-check-label" for="d67"> </label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="d68" id="d68"
                                                placeholder="รายละเอียด">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-3">
                                        - Paint
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d69"
                                                name="d69">
                                            <label class="form-check-label" for="d69">Betadine solution</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d70"
                                                name="d70">
                                            <label class="form-check-label" for="d70">Hibiscrub solution</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d71"
                                                name="d71">
                                            <label class="form-check-label" for="71">70% Alcohol</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <p>*หมายเหตุ แนบแบบฟอร์ม NI 3 และแบบฟอร์มการเตรียมเครื่องมือบริษัทด้วยทุกครั้ง</p>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="hidden" name="tabled1_id" id="tabled1_id"
                                            value="<?php echo $_GET["tabled1_id"];?>">
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
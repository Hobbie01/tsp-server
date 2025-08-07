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
$a = "select * from `tabled1` WHERE tabled1_id = '".$_GET['tabled1_id']."'  Order By tabled1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

$b = "select * from `tabled4` WHERE tabled1_id = '".$_GET['tabled1_id']."' Order By tabled4_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
?>


<!-- <link rel="stylesheet" href="calendar-09/css/style.css"> -->
<link rel="stylesheet" href="calendar-09/css/bootstrap-datetimepicker.min.css">

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>แบบฟอร์มการทำ Root Cause Analysis ผู้ป่วยแผลติดเชื้อหลังผ่าตัด (ต่อ)</h5>
                    <h6>คณะกรรมการควบคุมและป้องกันการติดเชื้อ แผนกการพยาบาลห้องผ่าตัด</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="edit_formd4_sql.php" method="post">



                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">


                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="mb-3 text-sm">สภาพแวดล้อมในห้องผ่าตัด</h6>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            1. อุณหภูมิขณะผ่าตัด
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="d1" id="d1" value="<?= $row_b['d1'] ?>"
                                                    placeholder="&#8451;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            2. การเปิดพัดลม
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d2"
                                                    name="d2" <?php if($row_b['d2'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d2">ไม่ใช้</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d3"
                                                    name="d3" <?php if($row_b['d3'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d3">ใช้</label>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="formcontrol-label">ระยะเวลาในการเปิดพัดลม</label>
                                                <input class="form-control" type="text" name="d4" id="d4" value="<?= $row_b['d4'] ?>"
                                                    placeholder="นาที">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            3. การเปิดประตูห้องผ่าตัด
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d5"
                                                    name="d5" <?php if($row_b['d5'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d5">ไม่เปิด</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d6"
                                                    name="d6" <?php if($row_b['d6'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d6">เปิด</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            4. มีฝุ่นละออง/แมลงในห้องผ้าตัด
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d7"
                                                    name="d7" <?php if($row_b['d7'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d7">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d8"
                                                    name="d8" <?php if($row_b['d8'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d8">มี</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">บริเวณ</label>
                                                <input class="form-control" type="text" name="d9" id="d9" value="<?= $row_b['d9'] ?>"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">การแก้ไข</label>
                                                <input class="form-control" type="text" name="d10" id="d10" value="<?= $row_b['d10'] ?>"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            5. การละเมิดมาตรการปลอดเชื้อ
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d11"
                                                    name="d11" <?php if($row_b['d11'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d11">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d12"
                                                    name="d12" <?php if($row_b['d12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d12">มี</label>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ระบุ</label>
                                                <input class="form-control" type="text" name="d13" id="d13" value="<?= $row_b['d13'] ?>"
                                                    placeholder="รายละเอียด">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            6. มีถุงมือรั่วทั้ง 2 ชั้นขณะผ่าตัด
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d14"
                                                    name="d14" <?php if($row_b['d14'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d14">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d15"
                                                    name="d15" <?php if($row_b['d15'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d15">มี</label>
                                            </div>
                                        </div>
                                        <div class="col-5">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-2">

                                        </div>
                                        <div class="col-2">
                                            เปลี่ยนถุงมือ
                                        </div>
                                        <div class="col-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d16"
                                                    name="d16" <?php if($row_b['d16'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d16">ทันที</label>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-2">

                                        </div>
                                        <div class="col-2">

                                        </div>

                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d17"
                                                    name="d17" <?php if($row_b['d17'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d17">ภายใน</label>

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <input class="form-control" type="text" name="d18" id="d18" value="<?= $row_b['d18'] ?>"
                                                placeholder="นาที">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-2">

                                        </div>
                                        <div class="col-2">

                                        </div>

                                        <div class="col-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d19"
                                                    name="d19" <?php if($row_b['d19'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d19">ไม่เปลี่ยน</label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                    </div>
                                </div>
                            </div>


                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="mb-3 text-sm">การเตรียมเครื่องมือผ่าตัด</h6>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            1. เครื่องมือและอุปกรณ์
                                        </div>
                                        <div class="col-9">
                                            <div>
                                                <textarea name="d20" id="d20" style="width: 98%"><?= $row_b['d20'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            2. วัสดุที่ใช้
                                        </div>
                                        <div class="col-9">
                                            <div>
                                                <textarea name="d21" id="d21" style="width: 98%"><?= $row_b['d21'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            3. เครื่องมือบริษัท
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">

                                                <input class="form-control" type="text" name="d22" id="d22" value="<?= $row_b['d22'] ?>"
                                                    placeholder="ชุด">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                        </div>
                                        <div class="col-4">
                                            <div class="datepickers">
                                                <div class="form-group">
                                                    <label for="name"
                                                        class="formcontrol-label">วันที่เตรียมเครื่องมือ</label>
                                                    <div class="input-group date" id="id_0">
                                                        <input type="text" name="d23" id="d23"  value="<?= $row_b['d23'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ผู้เตรียมเครื่องมือ</label>
                                                <input class="form-control" type="text" name="d24" id="d24" value="<?= $row_b['d24'] ?>"
                                                    placeholder="ผู้เตรียมเครื่องมือ">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-2">
                                            มีการล้างเครื่องมือก่อนบรรจุ
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d25"
                                                    name="d25" <?php if($row_b['d25'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d25">มี</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d26"
                                                    name="d26" <?php if($row_b['d26'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d26">ไม่ได้ล้าง</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">เนื่องจาก</label>
                                                <input class="form-control" type="text" name="d27" id="d27" value="<?= $row_b['d27'] ?>"
                                                    placeholder="รายละเอียด">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ผล spore test</label>
                                                <input class="form-control" type="text" name="d28" id="d28" value="<?= $row_b['d28'] ?>"
                                                    placeholder="รายละเอียด">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">สภาพการบรรจุ</label>
                                                <input class="form-control" type="text" name="d29" id="d29" value="<?= $row_b['d29'] ?>"
                                                    placeholder="รายละเอียด">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        4. มีการนึ่งด่วนเครื่องมือโดย Flash sterilization
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d30"
                                                name="d30" <?php if($row_b['d30'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d30">ไม่มี</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d31"
                                                name="d31" <?php if($row_b['d31'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d31">มี</label>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">ระบุเครื่องมือที่นึ่ง</div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <textarea name="d32" id="d32" style="width: 98%"><?= $row_b['d32'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm">บุคคลากร</h6>

                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            1. จำนวนบุคลากรในขณะผ่าตัด
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ทีมพยาบาลห้องผ่าตัด</label>
                                                <input class="form-control" type="text" name="d33" id="d33" value="<?= $row_b['d33'] ?>"
                                                    placeholder="คน">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label"> วิสัญญี</label>
                                                <input class="form-control" type="text" name="d34" id="d34" value="<?= $row_b['d34'] ?>"
                                                    placeholder="คน">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">

                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ศัลยแพทย์</label>
                                                <input class="form-control" type="text" name="d35" id="d35" value="<?= $row_b['d35'] ?>"
                                                    placeholder="คน">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">นศพ</label>
                                                <input class="form-control" type="text" name="d36" id="d36" value="<?= $row_b['d36'] ?>"
                                                    placeholder="คน">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">

                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ตัวแทนบริษัท</label>
                                                <input class="form-control" type="text" name="d37" id="d37" value="<?= $row_b['d37'] ?>"
                                                    placeholder="คน">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">อื่นๆ ระบุ</label>
                                                <input class="form-control" type="text" name="d38" id="d38" value="<?= $row_b['d38'] ?>"
                                                    placeholder="คน">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            2. แต่งกายไม่เรียบร้อยตามแนวปฏิบัติในห้องผ่าตัด
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d39"
                                                    name="d39" <?php if($row_b['d39'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d39">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d40"
                                                    name="d40" <?php if($row_b['d40'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d40">มี</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            3. เสื้อกาวน์ผ่าตัดขาด/มีคราบเปื้อนน้ำล้างมือ/เลือดที่เสื้อกาวน์
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d41"
                                                    name="d41" <?php if($row_b['d41'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d41">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d42"
                                                    name="d42" <?php if($row_b['d42'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d42">มี</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">การแก้ไข</label>
                                                <input class="form-control" type="text" name="d43" id="d43" value="<?= $row_b['d43'] ?>"
                                                    placeholder="รายละเอียด">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            4. ทีมผ่าตัดมีแผลที่มือ/ป่วย
                                        </div>
                                        <div class="col-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d44"
                                                    name="d44" <?php if($row_b['d44'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d44">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="d45"
                                                    name="d45" <?php if($row_b['d45'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="d45">มี</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">ระบุ</label>
                                                <input class="form-control" type="text" name="d46" id="d46" value="<?= $row_b['d46'] ?>"
                                                    placeholder="รายละเอียด">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm">การผ่าตัดครั้งที่ 2</h6>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ห้องผ่าตัด</label>
                                            <input class="form-control" type="text" name="d47" id="d47" value="<?= $row_b['d47'] ?>"
                                                placeholder="ห้องผ่าตัด">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="datepickers">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">วันที่ทำผ่าตัด</label>
                                                <div class="input-group date" id="id_1">
                                                    <input type="text" name="d48" id="d48" value="<?= $row_b['d48'] ?>" class="form-control"
                                                        placeholder="MM/DD/YYYY hh:mm:ss" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="datepickers">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">วันที่ติดเชื้อ</label>
                                                <div class="input-group date" id="id_2">
                                                    <input type="text" name="d49" id="d49"  value="<?= $row_b['d49'] ?>" class="form-control"
                                                        placeholder="MM/DD/YYYY hh:mm:ss" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Diagnosis</label>
                                            <input class="form-control" type="text" name="d50" id="d50" value="<?= $row_b['d50'] ?>"
                                                placeholder="Diagnosis">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Operation</label>
                                            <input class="form-control" type="text" name="d51" id="d51" value="<?= $row_b['d51'] ?>"
                                                placeholder="Operation">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d52"
                                                name="d52" <?php if($row_b['d52'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d52">Elective case</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d53"
                                                name="d53" <?php if($row_b['d53'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d53">Emergency case</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ASA Score</label>
                                            <input class="form-control" type="text" name="d54" id="d54" value="<?= $row_b['d54'] ?>"
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
                                            <input class="form-check-input" type="checkbox" value="1" id="d55"
                                                name="d55" <?php if($row_b['d55'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d55">Clean</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d56"
                                                name="d56" <?php if($row_b['d56'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d56">Clean-contaminated</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d57"
                                                name="d57" <?php if($row_b['d57'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d57">Contaminated</label>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="d58"
                                                name="d58" <?php if($row_b['d58'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="d58">Dirty</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">ระยะเวลาในการผ่าตัด</label>
                                            <input class="form-control" type="text" name="d59" id="d59" value="<?= $row_b['d59'] ?>"
                                                placeholder="ระยะเวลาในการผ่าตัด">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Surgeon</label>
                                            <input class="form-control" type="text" name="d60" id="d60" value="<?= $row_b['d60'] ?>"
                                                placeholder="Surgeon">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Assistant</label>
                                            <input class="form-control" type="text" name="d61" id="d61" value="<?= $row_b['d61'] ?>"
                                                placeholder="Assistant">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Scrub</label>
                                            <input class="form-control" type="text" name="d62" id="d62" value="<?= $row_b['d62'] ?>"
                                                placeholder="Scrub">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">Circulating Nurse</label>
                                            <input class="form-control" type="text" name="d63" id="d63" value="<?= $row_b['d63'] ?>"
                                                placeholder="Circulating Nurse">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <br>
                        <br>
                        <p>*หมายเหตุ แนบแบบฟอร์ม NI 3 และแบบฟอร์มการเตรียมเครื่องมือบริษัทด้วยทุกครั้ง</p>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group text-center pt-3">
                                    <input type="hidden" name="tabled4_id" value="<?= $row_b['tabled4_id'] ?>">
                                    <input type="hidden" name="tabled1_id" id="tabled1_id"
                                        value="<?php echo $_GET["tabled1_id"];?>">
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
<?php }
} ?>
<script src="calendar-09/js/jquery.min.js"></script>
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<?php
include("footer.php");
?>
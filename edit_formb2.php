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

//echo $_GET['tableb1_id'];
$a = "select * from `tableb1` WHERE tableb1_id = '".$_GET['tableb1_id']."'  Order By tableb1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){


$b = "select * from `tableb2` WHERE tableb1_id = '".$_GET['tableb1_id']."' ORDER BY tableb2_id DESC";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    
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
	color:#000;
    outline: 0;
}
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>แบบฟอร์มทบทวนปัจจัยการติดเชื้อในกระแสโลหิตที่สัมพันธ์กับการใส่สายสวนหลอดเลือดกลาง (CLABSI)</h6>

                </div>
                <div class="card-body pb-2">

                    <form role="form" action="edit_formb2_sql.php" method="post">


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
                                                        <label for="name" class="formcontrol-label">หอผู้ป่วย</label><br>
                                                        <input class="typeahead" type="text" name="b1" id="b1" value="<?= $row_b['b1'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">คำนำหน้าชื่อ</label>
                                                        <input class="form-control" type="text" name="pname" id="pname" value="<?= $row_b['pname'] ?>"
                                                            placeholder="คำนำหน้าชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">ชื่อ</label>
                                                        <input class="form-control" type="text" name="fname" id="fname" value="<?= $row_b['fname'] ?>"
                                                            placeholder="ชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">นามสกุล</label>
                                                        <input class="form-control" type="text" name="lname" id="lname" value="<?= $row_b['lname'] ?>"
                                                            placeholder="นามสกุล">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">HN</label>
                                                        <input class="form-control" type="text" name="b3" id="b3" value="<?= $row_b['b3'] ?>"
                                                            placeholder="HN">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">อายุ(ปี)</label>
                                                        <input class="form-control" type="text" name="b4" id="b4" value="<?= $row_b['b4'] ?>"
                                                            placeholder="อายุ(ปี)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">การวินัจฉัยโรค</label>
                                                            <input class="form-control" type="text" name="b5" id="b5" value="<?= $row_b['b5'] ?>"
                                                                placeholder="การวินัจฉัยโรค">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">U/D</label>
                                                            <input class="form-control" type="text" name="b6" id="b6" value="<?= $row_b['b6'] ?>"
                                                                placeholder="U/D">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">แพทย์เจ้าของไข้</label>
                                                            <input class="form-control" type="text" name="b7" id="b7" value="<?= $row_b['b7'] ?>"
                                                                placeholder="แพทย์เจ้าของไข้">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">ภาควิชา</label>
                                                            <input class="form-control" type="text" name="b8" id="b8" value="<?= $row_b['b8'] ?>"
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
                                                                <input type="text" name="b9" id="b9" value="<?= $row_b['b9'] ?>"
                                                                    class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">วันที่ใส่
                                                                ใส่ C-line</label>

                                                            <div class="input-group date" id="id_1">
                                                                <input type="text" name="b10" id="b10" value="<?= $row_b['b10'] ?>"
                                                                    class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">

                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-2">
                                                        <h6>ตำแหน่งที่ใส่</h6>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b11" name="b11" <?php if($row_b['b11'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b11">SCV</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b12" name="b12" <?php if($row_b['b12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b12">JV</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b13" name="b13" <?php if($row_b['b13'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b13">FV</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b14" name="b14" <?php if($row_b['b14'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b14">อื่นๆ</label>
                                                        </div>
                                                        <input class="form-control" type="text" name="b15" id="b15" value="<?= $row_b['b15'] ?>"
                                                            placeholder="ระบุ">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-2">
                                                        <h6>ชนิด</h6>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b16" name="b16"<?php if($row_b['b16'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b16">SLC</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b17" name="b17"<?php if($row_b['b17'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b17">DLC</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b18" name="b18"<?php if($row_b['b18'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="c18">TLC</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b66" name="b66"<?php if($row_b['b66'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b66">PICC</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">

                                                        <br>
                                                        <h6 class="mb-3 text-sm">สถานที่ใส่สาย C-line</h6>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b19" name="b19"<?php if($row_b['b19'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b19">
                                                                รพ.ศรีนครินทร์
                                                            </label>
                                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                                            <input class="form-control" type="text" name="b20" id="b20" value="<?= $row_b['b20'] ?>"
                                                                placeholder="รายละเอียด">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b21" name="b21"  <?php if($row_b['b21'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b21">
                                                                    ส่งต่อจาก ร.พ. อื่น ระบุ
                                                                </label>
                                                                <label for="name"
                                                                    class="formcontrol-label">ระบุ</label>
                                                                <input class="form-control" type="text" name="b22" value="<?= $row_b['b22'] ?>"
                                                                    id="b22" placeholder="ระบุ">
                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="form-group">
                                                                    <label for="name"
                                                                        class="formcontrol-label">วันที่ติดเชื้อ</label>

                                                                    <div class="input-group date" id="id_2">
                                                                        <input type="text" id="b23" name="b23" value="<?= $row_b['b23'] ?>"
                                                                            class="form-control"
                                                                            placeholder="MM/DD/YYYY hh:mm:ss" />
                                                                    </div>
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
                                                                id="b24" name="b24" <?php if($row_b['b24'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b24">
                                                                อายุ > 60 ปี, < 1 ปี </label>
                                                        </div>

                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b25" name="b25" <?php if($row_b['b25'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b25">
                                                                ผิวหนังสูญเสียหน้าที่/มีแผล Burn
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b26" name="b26" <?php if($row_b['b26'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b26">
                                                                BMI > 40, < 18 </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b27" name="b27" <?php if($row_b['b27'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b27">
                                                                Hb < 12 g/dl </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b28" name="b28" <?php if($row_b['b28'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b28">
                                                                WBC < 1000 cells/ml </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b29" name="b29" <?php if($row_b['b29'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b29">
                                                                S/P: Gastric surgery
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b30" name="b30" <?php if($row_b['b30'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b30">
                                                                CMT/RT/ยากดภูมิ
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b31" name="b31" <?php if($row_b['b31'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b31">
                                                                มีการติดเชื้อในระบบอื่นๆ
                                                            </label>
                                                            <input class="form-control" type="text" name="b32" id="b32" value="<?= $row_b['b32'] ?>"
                                                                placeholder="ระบุ">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b33" name="b33" <?php if($row_b['b33'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b33">
                                                                ได้รับ ATB
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b34" name="b34" <?php if($row_b['b34'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b34">
                                                                นอน รพ. นาน > 14 วัน
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b35" name="b35" <?php if($row_b['b35'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b35">
                                                                อื่นๆ
                                                            </label>
                                                            <input class="form-control" type="text" id="b36" name="b36" value="<?= $row_b['b36'] ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div>
                                                <h6 class="mb-3 text-sm">- ปัจจัยด้านเชื้อก่อโรค</h6>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">เชื้อก่อโรค 1.

                                                            </label>
                                                            <input class="form-control" type="text" name="b37" id="b37" value="<?= $row_b['b37'] ?>"
                                                                placeholder="เชื้อก่อโรค">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="name" class="formcontrol-label">เชื้อก่อโรค
                                                            2.</label>
                                                        <input class="form-control" type="text" id="b38" name="b38" value="<?= $row_b['b38'] ?>"
                                                            placeholder="เชื่อก่อโรค">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="name" class="formcontrol-label">เชื้อก่อโรค
                                                            3.</label>
                                                        <input class="form-control" type="text" id="b39" name="b39" value="<?= $row_b['b39'] ?>"
                                                            placeholder="เชื้อก่อโรค">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b40" name="b40" <?php if($row_b['b40'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b40">
                                                                พบเชื้อเดียวกับผู้ป่วยอื่นในหอผู้ป่วย ณ
                                                                ช่วงเวลาเดียวกัน/ใกล้เคียงกัน</label>
                                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                                            <input class="form-control" type="text" name="b41" id="b41" value="<?= $row_b['b41'] ?>"
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
                                                <h6 class="mb-3 text-sm">- ปัจจัยด้านสิ่งแวดล้อม</h6>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b42" name="b42" <?php if($row_b['b42'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label"
                                                                for="42">ใส่สายสวน central line ไม่ถูกต้องตามเทคนิคปราศจากเชื้อ</label>
                                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                                            <input class="form-control" type="text" name="b43" id="b43" value="<?= $row_b['b43'] ?>"
                                                                placeholder="รายละเอียด">
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b44" name="b44" <?php if($row_b['b44'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b44">ไม่ใช้ Maximal
                                                                sterile barrier precaution ในการใส่ C-line</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b45" name="b45" <?php if($row_b['b45'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b45">ใส่สายสวน central line มากกว่า 7 วัน</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b46" name="b46" <?php if($row_b['b46'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="46">มีการให้
                                                                TPN/สารละลายเข้มข้นสูง</label>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b47" name="b47" <?php if($row_b['b47'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b47">ให้เลือด > 3
                                                                    units (ในทารก)</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b48" name="b48" <?php if($row_b['b48'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b48">แผล exit site ซึม/เปียก/เปื้อน</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b49" name="b49" <?php if($row_b['b49'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b49">central line เลื่อน</label>
                                                            </div>
                                                        </div>


                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b50" name="b50" <?php if($row_b['b50'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b50">อื่นๆ</label>
                                                                <input class="form-control" type="text" name="b51"
                                                                    id="b51" value="<?= $row_b['b51'] ?>" placeholder="รายละเอียด">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <h6 class="mb-3 text-sm"><br>
                                                            <br>
                                                            <br>ผลการประเมินการปฏิบัติ
                                                        </h6>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b52" name="b52" <?php if($row_b['b52'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="b52">การทำความสะอาดมือก่อน-หลังดูแลผู้ป่วยที่ใส่
                                                                    C-line
                                                                    ร้อยละ</label>
                                                                <input class="form-control" type="text" name="b53"
                                                                    id="b53"  value="<?= $row_b['b53'] ?>"placeholder="รายละเอียด">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b54" name="b54" <?php if($row_b['b54'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="b54">เช็ดขัดถูข้อต่อ ใช้เวลาอย่างน้อย 15 วินาที รอให้น้ำยาทำลายเชื้อแห้ง ก่อนสวมหรือปลดข้อต่อ</label>
                                                                <input class="form-control" type="text" name="b55"
                                                                    id="b55"  value="<?= $row_b['b55'] ?>" placeholder="ร้อยละ">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b56" name="b56" <?php if($row_b['b56'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b56">เปลี่ยนชุดให้สารละลายทางหลอดเลือด ที่ให้ต่อเนื่องทุก 96 ชม. ร้อยละ</label>
                                                                <input class="form-control" type="text" name="b57"
                                                                    id="b57"  value="<?= $row_b['b57'] ?>" placeholder="ร้อยละ">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="b58" name="b58" <?php if($row_b['b58'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="b58">อื่นๆ</label>
                                                                <input class="form-control" type="text" name="b59"
                                                                    id="b59" value="<?= $row_b['b59'] ?>" placeholder="รายละเอียด">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>



                                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">

                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <label for="b59">
                                                                <h6>สรุปวิเคราะห์สาเหตุของการติดเชื้อ</h6>
                                                            </label>
                                                            <textarea class="form-control" id="b59" name="b59"
                                                                rows="3"><?= $row_b['b59'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>






                                        </div>
                                    </div>
                                </div>
                            </div>







                        </div>


                        <br>
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">ส่วนที่ 2
                                    การแก้ไขสาเหตุและมาตรการปฏิบัติเพื่อการป้องกันการเกิด CLABSI ในหอผู้ป่วย</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <div>
                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">รายละเอียด</h6>
                                            <div class="row">
                                                <div class="col-12 pb-3">
                                                    <textarea class="form-control" id="b60" name="b60" rows="3"
                                                        placeholder="รายละเอียด"><?= $row_b['b60'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="b61">ลงชื่อ ผู้รายงาน
                                                        (พยาบาลควบคุมการติดเชื้อประจำหอผู้ป่วย)</label>
                                                    <input class="form-control" type="text" name="b61" id="b61" value="<?= $row_b['b61'] ?>"
                                                    >
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <br>
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
                                                        <textarea class="form-control" id="b62" name="b62" rows="3"
                                                            placeholder="รายละเอียดข้อเสนอแนะ"><?= $row_b['b62'] ?></textarea>
                                                    </div>
                                                    <div class="col-6 pb-3">
                                                        <textarea class="form-control" id="b63" name="b63" rows="3"
                                                            placeholder="รายละเอียดข้อเสนอแนะ"><?= $row_b['b63'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">

                                                        <label for="b59">ลงชื่อ (หัวหน้าหอผู้ป่วย)
                                                        </label>
                                                        <input class="form-control" type="text" name="b64" id="b64" value="<?= $row_b['b64'] ?>"

                                                            placeholder="ลงชื่อ (หัวหน้าหอผู้ป่วย)">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="b60">ลงชื่อ (ICN ผู้รับผิดชอบ)
                                                        </label>
                                                        <input class="form-control" type="text" name="b65" id="b65" value="<?= $row_b['b65'] ?>"

                                                            placeholder="ลงชื่อ (ICN ผู้รับผิดชอบ)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group text-center pt-3">
                                                            <input type="hidden" name="tableb2_id"
                                                                value="<?= $row_b['tableb2_id'] ?>">
                                                            <input type="hidden" name="tableb1_id" id="tableb1_id"
                                                                value="<?php echo $_GET["tableb1_id"];?>">
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
<?php }
} ?>
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
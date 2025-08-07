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
$_GET['tablec1_id'];
//echo "<br>";

$a = "select * from `tablec1` WHERE tablec1_id = '".$_GET['tablec1_id']."'  Order By tablec1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

$b = "select * from `tablec2` WHERE tablec1_id = '".$_GET['tablec1_id']."' Order By tablec2_id DESC Limit 1";
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
<form role="form" action="edit_formc2_sql.php" method="post">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>แบบฟอร์มทบทวนปัจจัยการติดเชื้อตำแหน่งปอดอักเสบที่สัมพันธ์กับการใส่เครื่องช่วยหายใจ (VAP)</h6>

                </div>
                <div class="card-body pb-2">

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
                                                    <input class="typeahead" type="text" name="b1" id="b1"
                                                        value="<?= $row_b['b1'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">คำนำหน้าชื่อ</label>
                                                    <input class="form-control" type="text" name="pname" id="pname"
                                                        value="<?= $row_b['pname'] ?>" placeholder="คำนำหน้าชื่อ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">ชื่อ</label>
                                                    <input class="form-control" type="text" name="fname"
                                                        value="<?= $row_b['fname'] ?>" id="fname" placeholder="ชื่อ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">นามสกุล</label>
                                                    <input class="form-control" type="text" name="lname" id="lname"
                                                        value="<?= $row_b['lname'] ?>" placeholder="นามสกุล">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">HN</label>
                                                    <input class="form-control" type="text" name="b2" id="b2"
                                                        value="<?= $row_b['b2'] ?>" placeholder="HN">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">อายุ(ปี)</label>
                                                    <input class="form-control" type="text" name="b3" id="b3"
                                                        value="<?= $row_b['b3'] ?>" placeholder="อายุ(ปี)">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name"
                                                            class="formcontrol-label">การวินัจฉัยโรค</label>
                                                        <input class="form-control" type="text" name="b4" id="b4"
                                                            value="<?= $row_b['b4'] ?>" placeholder="การวินัจฉัยโรค">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">U/D</label>
                                                        <input class="form-control" type="text" name="b5" id="b5"
                                                            value="<?= $row_b['b5'] ?>" placeholder="U/D">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="name"
                                                            class="formcontrol-label">แพทย์เจ้าของไข้</label>
                                                        <input class="form-control" type="text" name="b6" id="b6"
                                                            value="<?= $row_b['b6'] ?>" placeholder="แพทย์เจ้าของไข้">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">ภาควิชา</label>
                                                        <input class="form-control" type="text" name="b7" id="b7"
                                                            value="<?= $row_b['b7'] ?>" placeholder="ภาควิชา">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name"
                                                            class="formcontrol-label">วันที่รับใหม่</label>
                                                        <div class="input-group date" id="id_0">
                                                            <input type="text" name="b8" id="b8"
                                                                value="<?= $row_b['b8'] ?>" class="form-control"
                                                                placeholder="MM/DD/YYYY hh:mm:ss" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">วันที่ใส่
                                                            Ventilator</label>

                                                        <div class="input-group date" id="id_1">
                                                            <input type="text" name="b9" id="b9"
                                                                value="<?= $row_b['b9'] ?>" class="form-control"
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
                                                            id="b10" name="b10" <?php if($row_b['b10'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        
                                                            รพ.ศรีนครินทร์
                                                        
                                                        <label for="name" class="formcontrol-label">ระบุ</label>
                                                        <input class="form-control" type="text" name="b11" id="b11"
                                                            value="<?= $row_b['b11'] ?>" placeholder="รายละเอียด">
                                                    </div>

                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                            id="b12" name="b12" <?php if($row_b['b12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        
                                                        ส่งต่อจากรพ.
                                                        
                                                        <label for="name" class="formcontrol-label">ระบุ</label>
                                                        <input class="form-control" type="text" name="b13" id="b13"
                                                            value="<?= $row_b['b13'] ?>" placeholder="รายละเอียด">
                                                    
                                                            
                                                        
                                                            
                                                        
                                                            
                                                       
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name"
                                                            class="formcontrol-label">วันที่ติดเชื้อ</label>
                                                        <div class="input-group date" id="id_2">
                                                            <input type="text" name="b56" id="b56"
                                                                value="<?= $row_b['b56'] ?>" class="form-control"
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


                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <h6>ปัจจัยที่เกี่ยวข้อง</h6>
                                        <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านผู้ป่วย</h6>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b14" name="b14" <?php if($row_b['b14'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b14">
                                                        อายุเกิน > 60 ปี หรือ < 1 ปี
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b15" name="b15" <?php if($row_b['b15'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b15">
                                                        สูบบุหรี่
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b16" name="b16" <?php if($row_b['b16'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b16">
                                                        ความรู้สึกตัวลดลง
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b17" name="b17" <?php if($row_b['b17'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b17">
                                                        มีประวัติการสำลัก
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b18" <?php if($row_b['b18'] == "1"){ echo " checked";  }else{ echo "" ; }?>
                                                        name="b18">
                                                    <label class="form-check-label" for="b18">
                                                        มีโรคมะเร็ง</label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b19" <?php if($row_b['b19'] == "1"){ echo " checked";  }else{ echo "" ; }?>
                                                        name="b19">
                                                    <label class="form-check-label" for="b19">
                                                        CMT/RT/ยากดภูมิ
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b20" <?php if($row_b['b20'] == "1"){ echo " checked";  }else{ echo "" ; }?>
                                                        name="b20">
                                                    <label class="form-check-label" for="b20">
                                                        ได้รับการผ่าตัดทรวงอก/ช่องท้อง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b21"
                                                        name="b21" <?php if($row_b['b21'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b21">
                                                        มีการติดเชื้อในระบบอื่น 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b22"
                                                        name="b22" <?php if($row_b['b22'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b22">
                                                        ได้รับ ATB
                                                    </label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" id="b23" name="b23" value="<?= $row_b['b23'] ?>" placeholder="รายละเอียด">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b24"
                                                        name="b24" <?php if($row_b['b24'] == "1"){ echo " checked";  }else{ echo "" ; }?>>
                                                    <label class="form-check-label" for="b24">
                                                        อืนๆ
                                                    </label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" id="b25" name="b25" value="<?= $row_b['b25'] ?>" placeholder="รายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-6">

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านเชื้อก่อโรค</h6>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">เชื้อก่อโรค 1.

                                                        </label>
                                                        <input class="form-control" type="text" name="b26" id="b26"
                                                            value="<?= $row_b['b26'] ?>" placeholder="เชื้อก่อโรค">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="name" class="formcontrol-label">เชื้อก่อโรค 2.</label>
                                                    <input class="form-control" type="text" id="b27" name="b27"
                                                        value="<?= $row_b['b27'] ?>" placeholder="เชื่อก่อโรค">
                                                </div>
                                                <div class="col-4">
                                                    <label for="name" class="formcontrol-label">เชื้อก่อโรค 3.</label>
                                                    <input class="form-control" type="text" id="b28" name="b28"
                                                        value="<?= $row_b['b28'] ?>" placeholder="เชื้อก่อโรค">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b29" name="b29" <?php if($row_b['b29'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="31">
                                                            พบเชื้อเดียวกับตำแหน่งอื่นในร่างกาย</label>
                                                        <label for="name" class="formcontrol-label">ระบุ</label>
                                                        <input class="form-control" type="text" name="b30" id="b30"
                                                            value="<?= $row_b['b30'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b31" name="b31" <?php if($row_b['b31'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="31">
                                                            พบเชื้อเดียวกับผู้ป่วยอื่นในหอผู้ป่วย ณ
                                                            ช่วงเวลาเดียวกัน/ใกล้เคียงกัน</label>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>




                                <div>
                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านสิ่งแวดล้อม</h6>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b32" name="b32" <?php if($row_b['b32'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label"
                                                            for="b32">ใช้เครื่องช่วยหายใจเกิน 4 วัน</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b33" name="b33" <?php if($row_b['b33'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="b33">Self extubation /
                                                            Re-intubation</label>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b34" name="b34" <?php if($row_b['b34'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="b35">ได้รับยา
                                                            Antacids</label>
                                                    </div>
                                                </div>
                                            </div>
<div class="row">
                                                    <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b57" name="b57" <?php if($row_b['b57'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="b57">อื่นๆ</label>
                                                        <input class="form-control" type="text" name="b58" id="b58"
                                                            value="<?= $row_b['b58'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-4"></div>
                                                <div class="col-4"></div>
</div>


                                        </div>
                                    </div>
                                </div>



                                <div>
                                    <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div>
                                            <h6 class="mb-3 text-sm">- ผลการประเมินการปฏิบัติ</h6>
                                            <div class="row">
                                                <div class="col-6">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b35" name="b35" <?php if($row_b['b35'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label"
                                                            for="35">การทำความสะอาดมือก่อน-หลัง<br>ดูและผู้ป่วยที่ใส่เครื่องฯ
                                                        </label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b36" id="b36"
                                                            value="<?= $row_b['b36'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b37" name="b37" <?php if($row_b['b37'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="b37">จัดท่าศีรษะสูง 30-45
                                                            &deg;</label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b38" id="b38"
                                                            value="<?= $row_b['b38'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b39" name="b39" <?php if($row_b['b39'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="b39">วัด Cuff pressure
                                                            เวรละ 1 ครั้ง</label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b40" id="b40"
                                                            value="<?= $row_b['b40'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b41" name="b41" <?php if($row_b['b41'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label" for="b41">เปลี่ยน Vent. Circuits
                                                            ตามข้อบ่งชี้</label>
                                                        <label for="name" class="formcontrol-label">ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b42" id="b42"
                                                            value="<?= $row_b['b42'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>


                                            <div class="row">
                                                <div class="col-6 pb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="b43" name="b43" <?php if($row_b['b43'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label"
                                                            for="b43">ทำความสะอาดช่องปากอย่างน้อยเวรละ 1 ครั้ง
                                                            ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b44" id="b44"
                                                            value="<?= $row_b['b44'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                            id="b45" name="b45" <?php if($row_b['b45'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                        <label class="form-check-label"
                                                            for="b45">ประเมินและหย่าเครื่องช่วยหายใจ เมื่อมีข้อบ่งชี้
                                                            ร้อยละ</label>
                                                        <input class="form-control" type="text" name="b46" id="b46"
                                                            value="<?= $row_b['b46'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-6 pb-3">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b47"
                                                        name="b47" <?php if($row_b['b47'] == "1"){ 
	echo " checked"; 
}else{
	echo "" ; 
}?>>
                                                    <label class="form-check-label" for="b47">อื่นๆ</label>
                                                    <input class="form-control" type="text" name="b48" id="b48"
                                                        value="<?= $row_b['b48'] ?>" placeholder="รายละเอียด">

                                                </div>
                                                <div class="col-6">

                                                </div>

                                            </div>







                                        </div>
                                    </div>
                                </div>

                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label for="b49">สรุปวิเคราะห์สาเหตุของการติดเชื้อ</label>
                                                    <textarea class="form-control" id="b49" name="b49"
                                                        rows="3"><?= $row_b['b49'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <h6 class="mb-3 text-sm">รายละเอียด</h6>
                                        <div class="row">
                                            <div class="col-12 pb-3">
                                                <textarea class="form-control" id="b50" name="b50" rows="3"
                                                    placeholder="รายละเอียด"><?= $row_b['b50'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="b51">ลงชื่อ ผู้รายงาน
                                                    (พยาบาลควบคุมการติดเชื้อประจำหอผู้ป่วย)</label>
                                                <input class="form-control" type="text" name="b51" id="b51"
                                                    value="<?= $row_b['b51'] ?>">
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">ส่วนที่ 3 ข้อเสนอแนะ</h6>

                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div>
                                                <h6 class="mb-3 text-sm">รายละเอียดข้อเสนอแนะ</h6>

                                                <div class="row">
                                                    <div class="col-6 pb-3">
                                                        <textarea class="form-control" id="b52" name="b52" rows="3"
                                                            placeholder="รายละเอียดข้อเสนอแนะ"><?= $row_b['b52'] ?></textarea>
                                                    </div>
                                                    <div class="col-6 pb-3">
                                                        <textarea class="form-control" id="b53" name="b53" rows="3"
                                                            placeholder="รายละเอียดข้อเสนอแนะ"><?= $row_b['b53'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">

                                                        <label for="b59">ลงชื่อ (หัวหน้าหอผู้ป่วย) </label>
                                                        <input class="form-control" type="text" name="b54" id="b54"
                                                            value="<?= $row_b['b54'] ?>"
                                                            placeholder="ลงชื่อ (หัวหน้าหอผู้ป่วย)">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="b60">ลงชื่อ (ICN ผู้รับผิดชอบ) </label>
                                                        <input class="form-control" type="text" name="b55" id="b55"
                                                            value="<?= $row_b['b55'] ?>"
                                                            placeholder="ลงชื่อ (ICN ผู้รับผิดชอบ)">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group text-center pt-3">
                                                            


                                                            <input type="hidden" name="tablec2_id" id="tablec2_id"
                                                                value="<?php echo $row_b['tablec2_id']?>">
                                                            <input type="hidden" name="tablec1_id"
                                                                value="<?= $row['tablec1_id'] ?>">
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
                    </div>


                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
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
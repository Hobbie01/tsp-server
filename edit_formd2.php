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
                    <h6>แบบฟอร์มทบทวนปัจจัยการติดเชื้อตำแหน่งผ่าตัด (ระยะก่อนและหลังผ่าตัด)</h6>
                    <h6>(Surgical site infeetion)</h6>
                </div>
                <div class="card-body pb-2">
                    <?php
$a = "select * from `tabled1` WHERE tabled1_id = '".$_GET['tabled1_id']."'  Order By tabled1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

$b = "select * from `tabled2` WHERE tabled1_id = '".$_GET['tabled1_id']."' Order By tabled2_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    ?>
                    <form role="form" action="edit_formd2_sql.php" method="post">

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
                                                        <input class="form-control" type="text" name="fname" id="fname"
                                                            value="<?= $row_b['fname'] ?>" placeholder="ชื่อ">
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
                                                                value="<?= $row_b['b4'] ?>"
                                                                placeholder="การวินัจฉัยโรค">
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
                                                            <label for="name" class="formcontrol-label">Surgeon</label>
                                                            <input class="form-control" type="text" name="b6" id="b6"
                                                                value="<?= $row_b['b6'] ?>"
                                                                placeholder="แพทย์เจ้าของไข้">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">วันที่รับใหม่</label>
                                                            <div class="input-group date" id="id_0">
                                                                <input type="text" name="b7" id="b7"
                                                                    value="<?= $row_b['b7'] ?>" class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">หัตถการผ่าตัด</label>
                                                            <input class="form-control" type="text" name="b8" id="b8"
                                                                value="<?= $row_b['b8'] ?>" placeholder="ภาควิชา">
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">วันที่ผ่าตัด
                                                                F/C</label>

                                                            <div class="input-group date" id="id_1">
                                                                <input type="text" name="b9" id="b9"
                                                                    value="<?= $row_b['b9'] ?>" class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="mb-3 text-sm">Wound class</h6>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b10" name="b10" <?php if($row_b['b10'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b10">
                                                                C
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b11" name="b11" <?php if($row_b['b11'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b11">
                                                                CC
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b12" name="b12" <?php if($row_b['b12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b12">
                                                                CO
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b13" name="b13" <?php if($row_b['b13'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b13">
                                                                D
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-4">

                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b14" name="b14" <?php if($row_b['b14'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b14">
                                                                Multiple procedure
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b15" name="b15" <?php if($row_b['b15'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b15">
                                                                GA
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b16" name="b16" <?php if($row_b['b16'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="b16">
                                                                Emergency case
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">

                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <label for="name"
                                                                        class="formcontrol-label">ระยะเวลาผ่าตัด</label>
                                                                </div>
                                                                <div class="col-4">
                                                                    <input class="form-control" type="text" name="b17"
                                                                        id="b17" value="<?= $row_b['b17'] ?>"
                                                                        placeholder="ชม.">
                                                                </div>
                                                                <div class="col-4">
                                                                    <input class="form-control" type="text" name="b18"
                                                                        id="b18" value="<?= $row_b['b18'] ?>"
                                                                        placeholder="นาที">
                                                                </div>
                                                            </div>
                                                            <div class="col-2"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-check mb-3">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="b19" name="b19" <?php if($row_b['b19'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                    <label class="form-check-label" for="b19">
                                                                        Pre-op ATB
                                                                    </label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="form-check mb-3">
                                                                        <input class="form-control" type="text"
                                                                            name="b20" id="b20"
                                                                            value="<?= $row_b['b20'] ?>"
                                                                            placeholder="ลายละเอียด">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-2">
                                                        <label class="form-check-label" for="b21">
                                                            ให้ยาก่อนการผ่าตัด
                                                        </label>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-check mb-3">
                                                            <input class="form-control" type="text" name="b21" id="b21"
                                                                value="<?= $row_b['b21'] ?>" placeholder="นาที">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-check mb-3">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="b22" name="b22" <?php if($row_b['b22'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                    <label class="form-check-label" for="b22">
                                                                        Post-op ATB
                                                                    </label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="form-check mb-3">
                                                                        <input class="form-control" type="text"
                                                                            name="b23" id="b23"
                                                                            value="<?= $row_b['b23'] ?>"
                                                                            placeholder="ลายละเอียด">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-1">
                                                        <label class="form-check-label" for="b24">
                                                            Dose
                                                        </label>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="b24" id="b24"
                                                                value="<?= $row_b['b24'] ?>" placeholder="จำนวน">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <label class="form-check-label" for="b25">
                                                            day
                                                        </label>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form">
                                                            <input class="form-control" type="text" name="b25" id="b25"
                                                                value="<?= $row_b['b25'] ?>" placeholder="จำนวนวัน">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">

                                                    </div>
                                                </div>

                                                <div class="row">


                                                    <div class="col-12">
                                                        <div class="datepickers">
                                                            <div class="form-group">
                                                                <br>
                                                                <label for="name"
                                                                    class="formcontrol-label">วันที่ติดเชื้อ</label>
                                                                <div class="input-group date" id="id_2">
                                                                    <input type="text" name="b26" id="b26"
                                                                        value="<?= $row_b['b26'] ?>"
                                                                        class="form-control"
                                                                        placeholder="MM/DD/YYYY hh:mm:ss" />
                                                                </div>
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
                                        <br>
                                        <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านผู้ป่วย</h6>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b27"
                                                        name="b27" <?php if($row_b['b27'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b27">
                                                        อายุเกิน > 60 หรือ < 1 ปี </label>
                                                </div>

                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b28"
                                                        name="b28" <?php if($row_b['b28'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b28">
                                                        สูบบุหรี่ในช่วงระยะเวลา 30 วันก่อนผ่าตัด
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b29"
                                                        name="b29" <?php if($row_b['b29'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b29">
                                                        DM
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b30"
                                                        name="b30" <?php if($row_b['b30'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b30">
                                                        โรคมะเร็ง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b31"
                                                        name="b31" <?php if($row_b['b31'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b31">
                                                        Anemia (hb < 12 g/dl)</label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b32"
                                                        name="b32" <?php if($row_b['b32'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b32">
                                                        ASA Score
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b33"
                                                        name="b33" <?php if($row_b['b33'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b33">
                                                        3
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b34"
                                                        name="b34" <?php if($row_b['b34'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b34">
                                                        CMT/RT/ยากดภูมิ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b35"
                                                        name="b35" <?php if($row_b['b35'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b35">
                                                        Pre-operative stay > 2 ;yo
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b36"
                                                        name="b36" <?php if($row_b['b36'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b36">
                                                        มีประวัติการติดเชื้อที่ผิวหนังและเนื้อเยื่ออ่อน
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b37"
                                                        name="b37" <?php if($row_b['b37'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b37">
                                                        มีการติดเชื้อในระบบอื่นๆ
                                                    </label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" id="b38" name="b38"
                                                        value="<?= $row_b['b38'] ?>" placeholder="ลายละเอียด">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b40"
                                                        name="b40" <?php if($row_b['b40'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b40">
                                                        อื่นๆ
                                                    </label>
                                                    <input class="form-control" type="text" id="b41" name="b41"
                                                        value="<?= $row_b['b41'] ?>" placeholder="ลายละเอียด">

                                                </div>
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
                                                    <input class="form-control" type="text" name="b42" id="b42"
                                                        value="<?= $row_b['b42'] ?>" placeholder="เชื้อก่อโรค">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="name" class="formcontrol-label">เชื้อก่อโรค
                                                    2.</label>
                                                <input class="form-control" type="text" id="b43" name="b43"
                                                    value="<?= $row_b['b43'] ?>" placeholder="เชื่อก่อโรค">
                                            </div>
                                            <div class="col-4">
                                                <label for="name" class="formcontrol-label">เชื้อก่อโรค
                                                    3.</label>
                                                <input class="form-control" type="text" id="b44" name="b44"
                                                    value="<?= $row_b['b44'] ?>" placeholder="เชื้อก่อโรค">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b45"
                                                        name="b45" <?php if($row_b['b45'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b45">
                                                        พบเชื้อเดียวกับตำแหน่งอื่นในร่างกาย</label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" name="b46" id="b46"
                                                        value="<?= $row_b['b46'] ?>" placeholder="ลายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b47"
                                                        name="b47" <?php if($row_b['b47'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b47">
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
                                                    <input class="form-check-input" type="checkbox" value="1" id="b48"
                                                        name="b48" <?php if($row_b['b48'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b48">โกนขนก่อนผ่าตัด</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b49"
                                                        name="b49" <?php if($row_b['b49'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b49">ใช้มีดโกนขน</label>

                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b50"
                                                        name="b50" <?php if($row_b['b50'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label"
                                                        for="b50">ไม่อาบน้ำในคืน/เช้าวันผ่าตัดระยะหลังผ่าตัด</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b51"
                                                        name="b51" <?php if($row_b['b51'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label"
                                                        for="b51">การทำแผลไม่ถูกต้องทำเทคนิคปราศจากเชื้อ </label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" name="d52" id="d52"
                                                        value="<?= $row_b['b52'] ?>" placeholder="รายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b53"
                                                        name="b53" <?php if($row_b['b53'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label"
                                                        for="b53">แผลซึม/เปียกชื้นเป็นระยะเวลานาน</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b54"
                                                        name="b54" <?php if($row_b['b54'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label"
                                                        for="b54">ระดับน้ำตาลในเลือดหลังผ่าตัด 1-2 วัน > 150, < 110
                                                            mg%</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b55"
                                                        name="b55" <?php if($row_b['b55'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="b55">อื่นๆ</label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" name="d56" id="d56"
                                                        value="<?= $row_b['b56'] ?>" placeholder="รายละเอียด">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <h6 class="mb-3 text-sm">ผลการประเมินการปฏิบัติ</h6>
                                            <div class="col-6 pb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b57"
                                                        name="b57" <?php if($row_b['b57'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label"
                                                        for="b57">การทำความสะอาดมือก่อน-หลังทำแผล
                                                        ร้อยละ</label>
                                                    <input class="form-control" type="text" name="b58" id="b58"
                                                        value="<?= $row_b['b58'] ?>" placeholder="ลายละเอียด">
                                                </div>
                                            </div>

                                            <div class="col-6 pb-3">

                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label for="b60">สรุปวิเคราะห์สาเหตุของการติดเชื้อ</label>
                                                    <textarea class="form-control" id="b59" name="b59"
                                                        rows="3"><?= $row_b['b59'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="card">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">ส่วนที่ 2
                                            การแก้ไขสาเหตุและมาตรการปฏิบัติเพื่่อการป้องกันการเกิด SSI
                                            ในหอผู้ป่วย</h6>
                                    </div>
                                    <div class="card-body pt-4 p-3">
                                        <div>
                                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div>
                                                    <h6 class="mb-3 text-sm">รายละเอียด</h6>
                                                    <div class="row">
                                                        <div class="col-12 pb-3">
                                                            <textarea class="form-control" id="b60" name="b60" rows="3"
                                                                placeholder="ลายละเอียด"><?= $row_b['b60'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="b56">ลงชื่อ ผู้รายงาน
                                                                (พยาบาลควบคุมการติดเชื้อประจำหอผู้ป่วย)</label>
                                                            <input class="form-control" type="text" name="b61" id="b61"
                                                                value="<?= $row_b['b61'] ?>">
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

                                                            <label for="b64">ลงชื่อ (หัวหน้าหอผู้ป่วย) </label>
                                                            <input class="form-control" type="text" name="b64" id="b64"
                                                                value="<?= $row_b['b64'] ?>"
                                                                placeholder="ลงชื่อ (หัวหน้าหอผู้ป่วย)">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="b65">ลงชื่อ (ICN ผู้รับผิดชอบ) </label>
                                                            <input class="form-control" type="text" name="b65" id="b65"
                                                                value="<?= $row_b['b65'] ?>"
                                                                placeholder="ลงชื่อ (ICN ผู้รับผิดชอบ)">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group text-center pt-3">
                                                                <input type="hidden" name="tabled2_id"
                                                                    value="<?= $row_b['tabled2_id'] ?>">
                                                                <input type="hidden" name="tabled1_id" id="tabled1_id"
                                                                    value="<?php echo $_GET["tabled1_id"];?>">
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
                    </form>
                    <?php }
} ?>
                </div>
            </div>
        </div>
    </div>
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
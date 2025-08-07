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

?>

<!-- <link rel="stylesheet" href="calendar-09/css/style.css"> -->
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
                    <h6> แก้ไขเกณฑ์การวินิจฉัยการติดเชื้อที่ตำแหน่งผ่าตัด</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="edit_formd1_sql.php" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">หอผู้ป่วย</label><br>
                                    <input class="typeahead" type="text" name="d1" id="d1" placeholder="หอผู้ป่วย"
                                        value="<?= $row['d1'] ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">คำนำหน้าชื่อ</label>
                                    <input class="form-control" type="text" name="pname" id="pname"
                                        placeholder="คำนำหน้าชื่อ" value="<?= $row['pname'] ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">ชื่อ</label>
                                    <input class="form-control" type="text" name="fname" id="fname" placeholder="ชื่อ"
                                        value="<?= $row['fname'] ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">นามสกุล</label>
                                    <input class="form-control" type="text" name="lname" id="lname"
                                        placeholder="นามสกุล" value="<?= $row['lname'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">อายุ (ปี)</label>

                                        <input class="form-control" type="text" name="age" id="age" placeholder="อายุ"
                                            value="<?= $row['age'] ?>">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">HN</label>
                                        <input class="form-control" type="text" name="hn" id="hn" placeholder="HN"
                                            value="<?= $row['HN'] ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">AN</label>
                                        <input class="form-control" type="text" name="an" id="an" placeholder="AN"
                                            value="<?= $row['AN'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">DX</label>
                                        <input class="form-control" type="text" name="dx" id="dx" placeholder="DX"
                                            value="<?= $row['DX'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">U/D</label>
                                        <input class="form-control" type="text" name="ud" id="ud" placeholder="U/D"
                                            value="<?= $row['UD'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่รับใหม่</label>
                                            <div class="input-group date" id="id_0">
                                                <input type="text" name="date_in" id="date_in"
                                                    value="<?= $row['date_in'] ?>" class="form-control"
                                                    placeholder="MM/DD/YYYY hh:mm:ss" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่จำหน่วย</label>
                                            <div class="input-group date" id="id_1">
                                                <input type="text" name="date_out" id="date_out"
                                                    value="<?= $row['date_out'] ?>" class="form-control"
                                                    placeholder="MM/DD/YYYY hh:mm:ss" required />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่รับย้าย</label>
                                            <div class="input-group date" id="id_2">
                                                <input type="text" name="date_move" id="date_move"
                                                    value="<?= $row['date_move'] ?>" class="form-control"
                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                </div>
                                <div class="col-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-status_yes">
                                    <input class="form-status_yes-input" type="radio" value="1" id="Yes"
                                        name="status_yes" <?php if($row['status_yes'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                    <label class="form-status_yes-label" for="status_yes">
                                        Yes
                                    </label>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-6 form-inline">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d43"
                                                        name="d43" <?php if($row['d43'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label for="name" class="formcontrol-label" for="d43">
                                                        จากหอผู้ป่วย</label><br>
                                                    <input class="typeahead" type="้text" name="from_ward" id="from_ward"
                                                        value="<?= $row['from_ward'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-6 form-inline">
                                                <label for="name" class="formcontrol-label">วันที่ติดเชื้อ</label>
                                                <div class="input-group date" id="id_3">
                                                    <input type="text" name="date_infect" id="date_infect"
                                                        value="<?= $row['date_infect'] ?>" class="form-control"
                                                        placeholder="MM/DD/YYYY hh:mm:ss" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-status_yes">

                                        <input class="form-status_yes-input" type="radio" value="2" id="No"
                                            name="status_yes" <?php if($row['status_yes'] == "2"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                        <label class="form-status_yes-label" for="status_yes">No</label>
                                        <div class="box">
                                            <div class="row">
                                                <div class="col-6 form-inline">
                                                   <div class="form-check">
                                                        <input class="form-check-input" type="hidden" value="1"
                                                            id="d44" name="d44" <?php if($row['d44'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label for="name" class="formcontrol-label" for="d44">
                                                            หอผู้ป่วยที่ติดเชื้อ</label>

                                                            <br>
                                                            <input class="typeahead" type="text" name="ward_infect" id="ward_infect" value="<?= $row['ward_infect']?>">
                                                    </div>
                                                </div>

                                                <div class="col-6 form-inline">
                                                    <label for="name"
                                                        class="formcontrol-label">ภาควิชาที่ติดเชื้อ</label>
                                                    <input class="form-control" type="text" name="dep_infect"
                                                        id="dep_infect" placeholder="ภาควิชาที่ติดเชื้อ"
                                                        value="<?= $row['dep_infect'] ?>">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="card" style="border:1px solid #ccc;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                    <h6>ข้อมูลการผ่าตัด</h6>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-3">

                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">Operative
                                                            Prodedure</label>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">1.</label>
                                                        <input class="form-control" type="text" name="d2" id="d2"
                                                            value="<?= $row['d2'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">2.</label>
                                                        <input class="form-control" type="text" name="d3" id="d3"
                                                            value="<?= $row['d3'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">3.</label>
                                                        <input class="form-control" type="text" name="d4" id="d4"
                                                            value="<?= $row['d4'] ?>" placeholder="รายละเอียด">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-2">
                                                    <h6>Multiple procedure</h6>
                                                </div>

                                                <div class="form-a col-2">
                                                    <div class="form-status_a5">

                                                        <input class="form-status_d5-input" type="radio" value="1"
                                                            id="d5" name="d5" <?php if($row['d5'] == "Yes"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-status_yes-label" for="status_d5">
                                                            Yes
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-a col-2">
                                                    <div class="form-status_a5">

                                                        <input class="form-status_d5-input" type="radio" value="2"
                                                            id="d5" name="d5" <?php if($row['d5'] == "2"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-status_d5-label" for="status_d5">No</label>
                                                    </div>
                                                </div>
                                                <div class="form-a col-3">
                                                    <div class="datepickers">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">Date</label>
                                                            <div class="input-group date" id="id_4">
                                                                <input type="text" name="d7" id="d7"
                                                                    value="<?= $row['d7'] ?>" class="form-control"
                                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-a col-3">
                                                    <label for="name" class="formcontrol-label">Surgeon</label>
                                                    <input class="form-control" type="text" name="d8" id="d8"
                                                        value="<?= $row['d8'] ?>" placeholder="Surgeon">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <h6>Wound class</h6>

                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d9" name="d9" <?php if($row['d9'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d9">Clean</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d10" name="d10" <?php if($row['d10'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label"
                                                            for="d10">Clean-contaminated</label>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d11" name="d11" <?php if($row['d11'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d11">Contaminated</label>
                                                    </div>

                                                </div>
                                                <div class="col-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d12" name="d12" <?php if($row['d12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d12">Dirty</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-2">

                                                </div>

                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">ASA score</label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="13" name="d13" <?php if($row['d13'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d13">1</label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d14" name="d14" <?php if($row['d14'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d14">2</label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d15" name="d15" <?php if($row['d15'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d15">3</label>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d16" name="d16" <?php if($row['d16'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d16">4</label>
                                                    </div>

                                                </div>
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d17" name="d17" <?php if($row['d17'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d17">5</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <br>
                                    <div class="row">
                                        <div class="card" style="border:1px solid #ccc;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d45" name="d45" <?php if($row['d45'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="d45">
                                                            <center>
                                                                <h6>เกณฑ์การวินิจฉัยการติดเชื้อ SSI</h6>
                                                            </center>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>การติดเชื้อที่รอยแผลผ่าตัดชั้นตื้น</h6>
                                                        <h6>(Superficial incisional SSI)</h6>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d18" name="d18" <?php if($row['d18'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d18">มีการติดเชื้อที่ตำแหน่งผ่าตัดภายหลังการผ่าตัดในโรงพยาบาล
                                                                    ซึงเกิดขึ้นภายใน 30 วัน (วันที่ผ่าตัด นับเป็นวันที่
                                                                    1 )</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d19" name="d19" <?php if($row['d19'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d19">พบการติดเชื้อที่ผิวหนังและเนื้อเยื่อใต้ผิวหนังบริเวณแผลผ่าตัดเท่านั้น</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d20" name="d20" <?php if($row['d20'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d20">ผู้ป่วยมีอาการอย่างน้อย 1 ข้อ
                                                                    ต่อไปนี้</label>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d21" name="d21" <?php if($row['d21'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d21">มีหนองออกมาจากแผลผ่าตัด</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d22" name="d22" <?php if($row['d22'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d22">พบเชื้อก่อโรคจากการเพาะเชื้อจากของเหลวหรือเนื้อเยื่อจากบริเวณผ่าตัด
                                                                            ที่ส่งตรวจเพื่อการวินิจฉัยและรักษา</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d23" name="d23" <?php if($row['d23'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d23">ศัลยแพทย์เปิดแผลเนื่องจากผู้ป่วย
                                                                            มีอาการอย่างน้อย 1 อย่างต่อไปนี้ ;
                                                                            ปวดหรือกดเจ็บ ; แผลบวม ;
                                                                            บริเวณแผลแดงหรือร้อน และ ผลการเพาะเชื้อ
                                                                            พบเชื้อหรือไม่ได้ส่งเพาะเชื้อ</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d24" name="d24" <?php if($row['d24'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d24">ศัลยแพทย์หรือแพทย์ที่ดูแลผู้ป่วยวินิจฉัยว่ามีการติดเชื้อที่ตำแหน่งแผลผ่าตัด</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d25" name="d25" <?php if($row['d25'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d25">ชนิดของ
                                                                    Superficial incisional SSI</label>

                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d26" name="d26" <?php if($row['d26'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d26">Superficial incisional Primary
                                                                            (SIP) ติดเชื้อชั้น Superficial
                                                                            ที่แผลผ่าตัดหลัก ในผู้ป่วยที่มีแผลผ่าตัด 1
                                                                            แห่งหรือมากกว่า</label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1" id="d27"
                                                                                name="d27" <?php if($row['d27'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                            <label class="form-check-label"
                                                                                for="d27">Superficial incisional
                                                                                Secondary (SIS) ติดเชื้อชิ้น Superficial
                                                                                ที่แผลผ่าตัดรอง ในผู้ป่วยที่มีแผลผ่าตัด
                                                                                1 แห่งหรือมากกว่า</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>การติดเชื้อที่รอยแผลผ่าตัดชั้นลึก</h6>
                                                        <h6>(Deep incisional SSI)</h6>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d28" name="d28" <?php if($row['d28'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d38">มีการติดเชื้อที่ตาแหน่งแผลผ่าตัดภายหลังการผ่าตัดในโรงพยาบาล ซึ่งเกิดขึ้นภายใน 30 วัน ในกรณีที่ไม่ใส่อุปกรณ์ หรือเกิดขึ้นภายใน 90 วันในกรณีที่ใส่อุปกรณ์ (วันที่ผ่าตัด นับเป็นวันที่ 1)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d29" name="d29" <?php if($row['d29'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d29">พบการติดเชื้อแผลผ่าตัดตัดชั้นพังผืดและกล้ามเนื้อ</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d30" name="d30" <?php if($row['d30'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d30">ผู้ป่วยมีอาการอย่างน้อย 1 ข้อ
                                                                    ต่อไปนี้</label>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d31" name="d31" <?php if($row['d31'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d31">มีหนองออกมาจากแผลผ่าตัด</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d32" name="d32" <?php if($row['d32'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d32">แผลผ่าตัดแยกหรือศัลยแพทย์แหวกแผล
                                                                            เนื่องจากผู้ป่วยมีอาการ/อาการแสดง อย่างน้อย
                                                                            1 อย่างต่อไปนี้ ; มีไข้ (BT&gt;38 &#8451;) ;
                                                                            ปวดหรือกดเจ็บบริเวณแผล และ ผลการเพาะเชื้อ
                                                                            พบเชื้อหรือไม่ได้ส่งเพาะเชื้อ</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d33" name="d33" <?php if($row['d33'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label" for="d33">พบมี
                                                                            (Abscess)
                                                                            หรือหลักฐานอื่นแสดงการติดเชื้อแผลผ่าตัดชั้นลึก
                                                                            จากการตรวจเนื้อเยื่อ
                                                                            ชิ้นเนื้อหรือการตรวจทางรังสีวิทยา</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d34" name="d34" <?php if($row['d34'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d34">ชนิดของ
                                                                    Deep incisional (DIP)</label>

                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d35" name="d35" <?php if($row['d35'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label" for="d35">Deep
                                                                            incisional Primary (DIP) ติดเชื้อชั้นผังผืด
                                                                            และกล้ามเนื้อ
                                                                            ที่แผลผ่าตัดหลักในผู้ป่วยที่มีแผลผ่าตัด 1
                                                                            แห่งหรือมากกว่า</label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value="1" id="d36"
                                                                                name="d36" <?php if($row['d36'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                            <label class="form-check-label"
                                                                                for="d36">Deep incisional Secondary
                                                                                (DIS) ติดเชื้อชั้นผังผืด และกล้ามเนื้อ
                                                                                ที่แผลผ่าตัดรอง ในผู้ป่วยที่มีแผลผ่าตัด
                                                                                1 แห่งหรือมากกว่า</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>การติดเชื้อที่อวัยวะหรือช่องโพรงภายในร่างกาย</h6>
                                                        <h6>(Organ/space incisional SSI)</h6>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d37" name="d37" <?php if($row['d37'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d37">มีการติดเชื้อที่ตำแหน่งผ่าตัดภายหลังการผ่าตัดในโรงพยาบาล
                                                                    ซึงเกิดขึ้นภายใน 30 วัน ในกรณีที่ไม่ใส่อุปกรณ์
                                                                    หรือเกิดขึ้นภายใน 90
                                                                    วันในกรณีที่ใส่อุปกรณ์(วันที่ผ่าตัด นับเป็นวันที่
                                                                    1 )</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d38" name="d38" <?php if($row['d38'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d38">การติดเชื้อที่อวัยวะหรือช่องโพรงภายในร่างกาย
                                                                    (ลึกกว่า ชั้นผิวหนัง กล้ามเนื้อ และพังผืด)
                                                                    ซึงได้รับการเปิดหรือหัตถการขณะผ่าตัด</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d39" name="d39" <?php if($row['d39'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label"
                                                                    for="d39">ผู้ป่วยมีอาการอย่างน้อย 1 ข้อ
                                                                    ต่อไปนี้</label>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d40" name="d40" <?php if($row['d40'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d40">มีหนองออกมาจากท่อที่ใส่ไว้ภายในอวัยวะ</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d41" name="d41" <?php if($row['d41'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label"
                                                                            for="d41">พบเชื้อก่อโรคจากการเพาะเชื้อจากของเหลวหรือเนื้อเยื่อจากบริเวณผ่าตัด
                                                                            ที่ส่งตรวจเพื่อการวินิจัยและรักษา</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d42" name="d42" <?php if($row['d42'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                        <label class="form-check-label" for="d42">พบมี
                                                                            (Abscess)
                                                                            หรือหลักฐานอื่นแสดงการติดเชื้อทีอวัยวะหรือช่องโพรงภายในร่างกายจากการตรวจเนื้อเยื่อชิ้นเนื้อหรือการตรวจทางรังสีวิทยา</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <p>และ
                                                                    พบลักษณะอาการแสดงการติดเชื้อตามตำแหน่งอวัยวะ/ช่องโพรงภายในการร่างกาย
                                                                </p>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <br>
                                    <div class="form-group text-center">
                                        <input type="hidden" name="tabled1_id" id="tabled1_id"
                                            value="<?= $row['tabled1_id'] ?>">
                                        <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                                class="fa fa-save">
                                                บันทึก</i></button>
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
    $('#d1').typeahead({
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
    $('#from_ward').typeahead({
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
    $('#ward_infect').typeahead({
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
<!-- <script src="calendar-09/js/jquery.min.js"></script> -->
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<?php
include("footer.php");
?>
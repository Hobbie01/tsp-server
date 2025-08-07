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

$_GET['tablee1_id'];
$a = "select * from `tablee1` WHERE tablee1_id = '".$_GET['tablee1_id']."'  Order By tablee1_id DESC Limit 1";
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
                    <h6>เพิ่มรายงานการติดเชื้อตำแหน่งอื่นๆ</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="edit_forme1_sql.php" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">หอผู้ป่วย</label>
                                    <input class="typeahead" type="text" name="d0" id="d0" value="<?= $row['d0'] ?>">
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
                                    <input class="form-control" type="text" name="fname" id="fname"
                                        value="<?= $row['fname'] ?>" placeholder="ชื่อ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">นามสกุล</label>
                                    <input class="form-control" type="text" name="lname" id="lname"
                                        value="<?= $row['lname'] ?>" placeholder="นามสกุล">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">อายุ (ปี)</label>

                                        <input class="form-control" type="text" name="age" id="age"
                                            value="<?= $row['age'] ?>" placeholder="อายุ">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">HN</label>
                                        <input class="form-control" type="text" name="hn" id="hn"
                                            value="<?= $row['HN'] ?>" placeholder="HN">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">AN</label>
                                        <input class="form-control" type="text" name="an" id="an"
                                            value="<?= $row['AN'] ?>" placeholder="AN">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">DX</label>
                                        <input class="form-control" type="text" name="dx" id="dx"
                                            value="<?= $row['DX'] ?>" placeholder="DX">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">U/D</label>
                                        <input class="form-control" type="text" name="ud" id="ud"
                                            value="<?= $row['UD'] ?>" placeholder="U/D">
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
                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
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
                                                    placeholder="MM/DD/YYYY hh:mm:ss" />
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
                                <div class="box">
                                    <div class="row">
                                        <div class="col-6 form-inline">
                                            <label for="name" class="formcontrol-label">จากหอผู้ป่วย</label><br>
                                            <input class="typeahead" type="text" name="from_ward" id="from_ward"
                                                value="<?= $row['from_ward'] ?>">

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

                                <div class="row">

                                    <div class="col-6 form-inline">
                                        <label for="name" class="formcontrol-label">
                                            หอผู้ป่วยที่ติดเชื้อ</label>
                                        <?php //echo $row['ward_infect'];?>
                                        <br>
                                        <input class="typeahead" type="text" name="ward_infect" id="ward_infect" value="<?= $row['ward_infect']?>">

                                    </div>
                                    <div class="col-6 form-inline">
                                        <label for="name" class="formcontrol-label">ภาควิชาที่ติดเชื้อ</label>
                                        <input class="form-control" type="text" name="dep_infect" id="dep_infect"
                                            value="<?= $row['dep_infect'] ?>" placeholder="ภาควิชาที่ติดเชื้อ">

                                    </div>
                                </div>





                                <br /><br />
                                <br /><br />
                                <div class="row">
                                    <div class="card" style="border:1px solid #ccc;">
                                        <div class="row">
                                            <div class="col-12">
                                                <br /> <br />
                                            </div>
                                        </div>

                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6>สาเหตุส่งเสริมการติดเชื้อ</h6>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d1" name="d1" <?php if($row['d1'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d1">1 Acute
                                                                    bleed</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d2" name="d2" <?php if($row['d2'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d2">2
                                                                    Arrest</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d3" name="d3" <?php if($row['d3'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d3">3
                                                                    CVA</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d4" name="d4" <?php if($row['d4'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d4">4
                                                                    Extre age</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d5" name="d5" <?php if($row['d5'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d5">5
                                                                    Malnutrition</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d6" name="d6" <?php if($row['d6'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d6">6
                                                                    Pro-Labor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d7" name="d7" <?php if($row['d7'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d7">7
                                                                    Steriod</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d8" name="d8" <?php if($row['d8'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d8">8
                                                                    ATB</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d9" name="d9" <?php if($row['d9'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d9">9 WBC < 1,500
                                                                        </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d10" name="d10" <?php if($row['d10'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d10">10
                                                                    Amnioniltis</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d11" name="d11" <?php if($row['d11'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d11">3
                                                                    Cancer</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d12" name="d12" <?php if($row['d12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d12">12
                                                                    DM</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d13" name="d13" <?php if($row['d13'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d13">13 HIV</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d14" name="d14" <?php if($row['d14'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d14">14
                                                                    Trauma</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" id="d15" name="d15" <?php if($row['d15'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                                <label class="form-check-label" for="d15">Other</label>
                                                                <input class="form-control" type="text" name="d16"
                                                                    id="d16" value="<?= $row['d16'] ?>"
                                                                    placeholder="รายละเอียด">
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
                                                    <h6>
                                                        <center>Major and Specific Type of Infection</center>
                                                    </h6>
                                                </div>
                                                <div class="row">
                                                    <h6>BJ-Bone and Joint Infection</h6>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d17" name="d17" <?php if($row['d17'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label"
                                                                for="d17">Bone-Osteomyelitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d18" name="d18" <?php if($row['d18'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d18">JNT-Joint or bursa
                                                                infection</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d19" name="d19" <?php if($row['d19'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d19">DISC-Disc space
                                                                infection</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d20" name="d20" <?php if($row['d20'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d20">PJI-Ptodthetic
                                                                joint infection</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>


                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">

                                                <div class="row">
                                                    <h6>CVS - Cardiovascular System Infection</h6>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d21" name="d21" <?php if($row['d21'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d21">CARD - Myocarditis
                                                                or pericarditis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d22" name="d22" <?php if($row['d22'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d22">ENDO -
                                                                Endocardtis</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d23" name="d23" <?php if($row['d23'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d23">MED -
                                                                Mediastinitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d24" name="d24" <?php if($row['d24'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d24">VASC - Arterial or
                                                                venous infection</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>


                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="row">
                                                    <h6>CNS - Central Nervous System</h6>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d25" name="d25" <?php if($row['d25'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d25">IC - Intracranial
                                                                infection</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d26" name="d26" <?php if($row['d26'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d26">MEN - Meningitis
                                                                or ventriculitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d27" name="d27" <?php if($row['d27'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d27">SA - Spinal
                                                                abscess without meningitis</label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <br>



                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="row">
                                                    <h6>LRI - Lower Respiratory Syetem Infection, Other Than Pneumonia
                                                    </h6>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d28" name="d28" <?php if($row['d28'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d28">LUNG - Other
                                                                infection of ther lower respitatory tract</label>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <br>


                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="row">
                                                    <h6>GI - Gastrointestinal System Infection</h6>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d29" name="d29" <?php if($row['d29'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d29">CDI - Clostridium
                                                                difficile infection</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d30" name="d30" <?php if($row['d30'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d30">GE -
                                                                Gastroenteritis</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d31" name="d31" <?php if($row['d31'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d31">GIT -
                                                                Gastrointestinal (GI) tract infection</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d32" name="d32" <?php if($row['d32'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d32">IAB -
                                                                Intraabdominal infection, not specified
                                                                elsewhere</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d33" name="d33" <?php if($row['d33'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d33">NEC - Necrotizing
                                                                enterocolitis</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="row">
                                                    <h6>REPR - Reprosuctive Tract Infection</h6>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d34" name="d34" <?php if($row['d34'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d34">EMET -
                                                                Endometritis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d35" name="d35" <?php if($row['d35'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d35">EPIP - Episiotomy
                                                                infection</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d36" name="d36" <?php if($row['d36'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d36">OREP - Other
                                                                infection : reproductive tract</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d37" name="d37" <?php if($row['d37'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d37">VCUF - Vaginal
                                                                cuff infection</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>

                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="row">
                                                    <h6>EENT - Eye, Ear, Nose, Throat, or Mouth infection</h6>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d38" name="d38" <?php if($row['d38'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d38">CONJ -
                                                                Conjunctivitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d39" name="d39" <?php if($row['d39'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d39">EAR - Ear, mastoid
                                                                infection</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d40" name="d40" <?php if($row['d40'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d40">EYE - Eye
                                                                infection, other conjunctivitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d41" name="d41" <?php if($row['d41'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d41">SINU -
                                                                Sinusitis</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d42" name="d42" <?php if($row['d42'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d42">ORAL - Oral cavity
                                                                infection (mouth, tongue, or gums)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d43" name="d43" <?php if($row['d43'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d43">UR - Upper
                                                                respiratory tract infection, pharyngitis, laryngitis,
                                                                epiglottitis</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row">
                                                <div class="row">
                                                    <h6>SST- Skin and Soft Tissue Infection</h6>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d44" name="d44" <?php if($row['d44'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d44">BRST - Breast
                                                                abscess or mastitis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d45" name="d45" <?php if($row['d45'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d45">UMB -
                                                                Omphalitis</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d46" name="d46" <?php if($row['d46'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d46">CIRC - Newborn
                                                                cicumcision infection</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d47" name="d47" <?php if($row['d47'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d47">DECU - Decubitus
                                                                ulcer infection (also known as pressure injury
                                                                infection)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d48" name="d48" <?php if($row['d48'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d48">BURN - Burn
                                                                Infection</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d49" name="d49" <?php if($row['d49'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d49">SKIN - Skin
                                                                infection</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d50" name="d50" <?php if($row['d50'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                            <label class="form-check-label" for="d50">ST - Soft tissue
                                                                infection</label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <br>



                                    </div>



                                </div>


                                <div class="form-group text-center">
                                    <div class="col-12">
                                        <div class="form-group text-center pt-3">

                                            <input type="hidden" name="tablee1_id" id="tablee1_id"
                                                value="<?php echo $_GET["tablee1_id"];?>">
                                            <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                                    class="fa fa-save">
                                                    บันทึก</i></button>
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
    $('#d0').typeahead({
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
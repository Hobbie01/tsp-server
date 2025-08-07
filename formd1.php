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
$PTUID=$_GET["PTUID"];
//echo "<br>";
$PTVUID=$_GET["PTVUID"];
//echo "<br>";
$PASID=$_GET["PASID"];
//echo "<br>";



$a = "SELECT
dbo.vPatient.UID AS PTUID,
dbo.PatientVisit.UID AS PTVUID,
dbo.vPatient.PASID,
(SELECT top 1 Identifier from PatientVisitID where PatientVisitID.PatientVisitUID = PatientVisit.UID ORDER BY UID DESC ) AS Visit_number,
dbo.fGetRfValDescription(dbo.vPatient.TITLEUID) AS title,
dbo.vPatient.Forename,
dbo.vPatient.Surname,
dbo.fGetRfValDescription(dbo.vPatient.SEXXXUID) AS Sex,
datediff(year ,dbo.vPatient.BirthDttm,dbo.PatientVisit.StartDTTM) AS AgeOfVisit,
CONVERT(VARCHAR(16), dbo.PatientVisit.StartDTTM, 120) AS VisitDate,
dbo.fGetRfValDescription(PatientVisit.ENTYPUID) AS PatientType,
dbo.fGetPatientWardName(dbo.PatientVisit.UID) AS WardName,
dbo.fGetPatientBedName(dbo.PatientVisit.UID) AS BedName

from
PatientVisit
JOIN vPatient On vPatient.UID = PatientVisit.PatientUID
where 
PASID  = '$PASID'
AND PatientVisit.UID = '$PTVUID'
--dbo.PatientVisit.UID = '12733954'
ORDER by PatientVisit.UID DESC";
$aQuery = sqlsrv_query($conn,$a);
while($row = sqlsrv_fetch_array($aQuery, SQLSRV_FETCH_ASSOC)){
 
?>
<script src="jquery-2.1.4.min.js"></script>
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
<link href="jquery-ui/jquery-ui.css" rel="stylesheet"> 
    <style type="text/css">
    /* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
    #ui-datepicker-div {display: none;}
    .ui-datepicker{
        width:220px;
        font-family:tahoma;
        font-size:12px;
        text-align:center;
    }
/*  css กำหนดปุ่ม ถ้ามีแสดง*/
    .ui-datepicker-trigger{
        border: 1px solid #cccccc;
        background: #ececec !important; 
        padding:3px;
    } 
    button.ui-datepicker-trigger{
        border:none;
        background: transparent!important;
    }
    </style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เพิ่มเกณฑ์การวินิจฉัยการติดเชื้อที่ตำแหน่งผ่าตัด</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formd1.php" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">หอผู้ป่วย</label>
                                    <br><input class="typeahead" type="text" name="d1" id="d1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">คำนำหน้าชื่อ</label>
                                    <input class="form-control" type="text" name="pname" id="pname"
                                        value="<?= $row['title']; ?>" placeholder="คำนำหน้าชื่อ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">ชื่อ</label>
                                    <input class="form-control" type="text" name="fname" id="fname"
                                        value="<?= $row['Forename']; ?>" placeholder="ชื่อ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">นามสกุล</label>
                                    <input class="form-control" type="text" name="lname" id="lname"
                                        value="<?= $row['Surname']; ?>" placeholder="นามสกุล">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">อายุ (ปี)</label>

                                        <input class="form-control" type="text" name="age" id="age"
                                            value="<?= $row['AgeOfVisit']; ?>" placeholder="อายุ">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">HN</label>
                                        <input class="form-control" type="text" name="hn" id="hn"
                                            value="<?= $row['PASID']; ?>" placeholder="HN">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">AN</label>
                                        <input class="form-control" type="text" name="an" id="an" placeholder="AN">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">DX</label>
                                        <?php
    $b = "SELECT
    dbo.PatientProblem.PatientUID,
    dbo.PatientProblem.PatientVisitUID,
    dbo.fGetPatientIDByUID(PatientProblem.PatientUID) AS HN,
    dbo.fGetPatientVisitIdentifier(PatientProblem.PatientVisitUID) AS visitID,
    dbo.PatientProblem.ProblemUID,
    dbo.PatientProblem.ProblemCode,
    dbo.PatientProblem.ProblemName,
    dbo.fGetRfValDescription(dbo.PatientProblem.DIAGTYPUID) AS DiagnosisType,
    dbo.fGetRfValDescription(dbo.PatientProblem.PBMTYUID) AS PBMTYname,
    dbo.PatientProblem.RecordedDttm,
    dbo.PatientProblem.RecordedBy,
    dbo.PatientProblem.HistoryFlag,
    dbo.PatientProblem.OnsetDttm,
    dbo.PatientProblem.ClosureDttm,
    ISNULL(ProblemName, 'N/A') AS PbName
    FROM
    dbo.PatientProblem
    WHERE dbo.PatientProblem.PatientVisitUID = '$PTVUID' 
    AND dbo.fGetRfValDescription(dbo.PatientProblem.DIAGTYPUID) = 'PRINCIPAL DX (การวินิจฉัยโรคหลัก)'
    ";
        $bQuery = sqlsrv_query($conn,$b);
        // while($row_b = sqlsrv_fetch_array($bQuery, SQLSRV_FETCH_ASSOC)){
        //     echo $row_b['PbName'];
            

            
             ?>
                                        <?php 
                                    
                                    if (sqlsrv_has_rows($bQuery)) {
                                        // มีข้อมูล
                                        while ($row_b = sqlsrv_fetch_array($bQuery, SQLSRV_FETCH_ASSOC)) {


                                            // $date_c = $row_b['ClosureDttm'];
                                            // $sqlDate_c = $date->format('Y-m-d H:i:s');
                                        ?>

                                        <input class="form-control" type="text" name="dx" id="dx"
                                            value="<?= $row_b['PbName']; ?>" placeholder="DX">
                                        <?php
                                            
                                        }
                                    } else {
                                    ?>
                                        <input class="form-control" type="text" name="dx" id="dx" value=""
                                            placeholder="DX">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">U/D</label>
                                        <input class="form-control" type="text" name="ud" id="ud" placeholder="U/D">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่รับใหม่</label>
                                            <div class="input-group date" id="id_0">
                                                <input type="text" name="date_in" id="date_in" value=""
                                                    class="form-control" placeholder="DD/MM/YYYY" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่จำหน่วย</label>
                                            <div class="input-group date" id="id_1">
                                                <input type="text" name="date_out" id="date_out" value=""
                                                    class="form-control" placeholder="DD/MM/YYYY" />
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
                                                <input type="text" name="date_move" id="date_move" value=""
                                                    class="form-control" placeholder="DD/MM/YYYY" />
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
                                        name="status_yes">
                                    <label class="form-status_yes-label" for="status_yes">
                                        Yes
                                    </label>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-6 form-inline">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d43"
                                                        name="d43">
                                                    <label for="name" class="formcontrol-label" for="d43">
                                                        จากหอผู้ป่วย</label><br>
                                                    <input class="typeahead" type="text" name="from_ward"
                                                        id="from_ward">

                                                </div>
                                            </div>
                                            <div class="col-6 form-inline">
                                                <label for="name" class="formcontrol-label">วันที่ติดเชื้อ</label>
                                                <div class="input-group date" id="id_3">
                                                    <input type="text" name="date_infect" id="date_infect" value=""
                                                        class="form-control" placeholder="DD/MM/YYYY" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-status_yes">

                                        <input class="form-status_yes-input" type="radio" value="2" id="No"
                                            name="status_yes">
                                        <label class="form-status_yes-label" for="status_yes">No</label>
                                        <div class="box">
                                            <div class="row">

                                                <div class="col-6 form-inline">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="d44" name="d44">
                                                        <label for="name" class="formcontrol-label" for="d44">
                                                            หอผู้ป่วยที่ติดเชื้อ</label>
                                                        <br>
                                                        <input class="typeahead" type="text" name="ward_infect"
                                                            id="ward_infect">
                                                    </div>
                                                </div>
                                                <div class="col-6 form-inline">
                                                    <label for="name"
                                                        class="formcontrol-label">ภาควิชาที่ติดเชื้อ</label>
                                                    <input class="typeahead" type="text" name="dep_infect"
                                                        id="dep_infect">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
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
                                                        placeholder="รายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">2.</label>
                                                    <input class="form-control" type="text" name="d3" id="d3"
                                                        placeholder="รายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">3.</label>
                                                    <input class="form-control" type="text" name="d4" id="d4"
                                                        placeholder="รายละเอียด">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-2">
                                                <h6>Multiple procedure</h6>
                                            </div>

                                            <div class="form-a col-2">
                                                <div class="form-status_a5">

                                                    <input class="form-status_d5-input" type="radio" value="1" id="d5"
                                                        name="d5">
                                                    <label class="form-status_yes-label" for="status_d5">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-a col-2">
                                                <div class="form-status_a5">

                                                    <input class="form-status_d5-input" type="radio" value="2" id="d5"
                                                        name="d5">
                                                    <label class="form-status_d5-label" for="status_d5">No</label>
                                                </div>
                                            </div>
                                            <div class="form-a col-3">
                                                <div class="datepickers">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">Date</label>
                                                        <div class="input-group date" id="id_4">
                                                            <input type="text" name="d7" id="d7" value=""
                                                                class="form-control"
                                                                placeholder="DD/MM/YYYY" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-a col-3">
                                                <label for="name" class="formcontrol-label">Surgeon</label>
                                                <input class="form-control" type="text" name="d8" id="d8"
                                                    placeholder="Surgeon">
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
                                                    <input class="form-check-input" type="checkbox" value="1" id="d9"
                                                        name="d9">
                                                    <label class="form-check-label" for="d9">Clean</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d10"
                                                        name="d10">
                                                    <label class="form-check-label" for="d10">Clean-contaminated</label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d11"
                                                        name="d11">
                                                    <label class="form-check-label" for="d11">Contaminated</label>
                                                </div>

                                            </div>
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d12"
                                                        name="d12">
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
                                                    <input class="form-check-input" type="checkbox" value="1" id="13"
                                                        name="d13">
                                                    <label class="form-check-label" for="d13">1</label>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d14"
                                                        name="d14">
                                                    <label class="form-check-label" for="d14">2</label>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d15"
                                                        name="d15">
                                                    <label class="form-check-label" for="d15">3</label>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d16"
                                                        name="d16">
                                                    <label class="form-check-label" for="d16">4</label>
                                                </div>

                                            </div>
                                            <div class="col-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d17"
                                                        name="d17">
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



                                <br /><br />
                                <div class="row" style="margin-top: 10px !important;">
                                    <div class="card" style="border:1px solid #ccc;">
                                        <div class="row">
                                            <div class="col-12">
                                                <br>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d45"
                                                        name="d45">
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
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d18" name="d18">
                                                            <label class="form-check-label"
                                                                for="d18">มีการติดเชื้อที่ตำแหน่งผ่าตัดภายหลังการผ่าตัดในโรงพยาบาล
                                                                ซึงเกิดขึ้นภายใน 30 วัน (วันที่ผ่าตัด นับเป็นวันที่
                                                                1 )</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d19" name="d19">
                                                            <label class="form-check-label"
                                                                for="d19">พบการติดเชื้อที่ผิวหนังและเนื้อเยื่อใต้ผิวหนังบริเวณแผลผ่าตัดเท่านั้น</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d20" name="d20">
                                                            <label class="form-check-label"
                                                                for="d20">ผู้ป่วยมีอาการอย่างน้อย 1 ข้อ
                                                                ต่อไปนี้</label>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d21" name="d21">
                                                                    <label class="form-check-label"
                                                                        for="d21">มีหนองออกมาจากแผลผ่าตัด</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d22" name="d22">
                                                                    <label class="form-check-label"
                                                                        for="d22">พบเชื้อก่อโรคจากการเพาะเชื้อจากของเหลวหรือเนื้อเยื่อจากบริเวณผ่าตัด
                                                                        ที่ส่งตรวจเพื่อการวินิจัยและรักษา</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d23" name="d23">
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
                                                                        value="1" id="d24" name="d24">
                                                                    <label class="form-check-label"
                                                                        for="d24">ศัลยแพทย์หรือแพทย์ที่ดูแลผู้ป่วยวินิจฉัยว่ามีการติดเชื้อที่ตำแหน่งแผลผ่าตัด</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d25" name="d25">
                                                            <label class="form-check-label" for="d25">ชนิดของ
                                                                Superficial incisional SSI</label>

                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d26" name="d26">
                                                                    <label class="form-check-label"
                                                                        for="d26">Superficial incisional Primary (SIP)
                                                                        ติดเชื้อชั้น Superficial ที่แผลผ่าตัดหลัก
                                                                        ในผู้ป่วยที่มีแผลผ่าตัด 1
                                                                        แห่งหรือมากกว่า</label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d27" name="d27">
                                                                        <label class="form-check-label"
                                                                            for="d27">Superficial incisional Secondary
                                                                            (SIS) ติดเชื้อชิ้น Superficial
                                                                            ที่แผลผ่าตัดรอง ในผู้ป่วยที่มีแผลผ่าตัด 1
                                                                            แห่งหรือมากกว่า</label>
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
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d28" name="d28">
                                                            <label class="form-check-label"
                                                                for="d38">มีการติดเชื้อที่ตำแหน่งผ่าตัดภายหลังการผ่าตัดในโรงพยาบาล
                                                                ซึงเกิดขึ้นภายใน 30 วัน ในกรณีที่ไม่ใส่อุปกรณ์
                                                                หรือเกิดที่ใส่อุปกรณ์ (วันที่ผ่าตัด นับเป็นวันที่
                                                                1 )</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d29" name="d29">
                                                            <label class="form-check-label"
                                                                for="d29">พบการติดเชื้อแผลผ่าตัดตัดชั้นพังผืดและกล้ามเนื้อ</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d30" name="d30">
                                                            <label class="form-check-label"
                                                                for="d30">ผู้ป่วยมีอาการอย่างน้อย 1 ข้อ
                                                                ต่อไปนี้</label>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d31" name="d31">
                                                                    <label class="form-check-label"
                                                                        for="d31">มีหนองออกมาจากแผลผ่าตัด</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d32" name="d32">
                                                                    <label class="form-check-label"
                                                                        for="d32">แผลผ่าตัดแยกหรือศัลยแพทย์แหวกแผล
                                                                        เนื่องจากผู้ป่วยมีอาการ/อาการแสดง อย่างน้อย 1
                                                                        อย่างต่อไปนี้ ; มีไข้ (BT&gt;38 &#8451;) ;
                                                                        ปวดหรือกดเจ็บบริเวณแผล และ ผลการเพาะเชื้อ
                                                                        พบเชื้อหรือไม่ได้ส่งเพาะเชื้อ</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d33" name="d33">
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
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d34" name="d34">
                                                            <label class="form-check-label" for="d34">ชนิดของ
                                                                Deep incisional (DIP)</label>

                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d35" name="d35">
                                                                    <label class="form-check-label" for="d35">Deep
                                                                        incisional Primary (DIP) ติดเชื้อชั้นผังผืดื
                                                                        และกล้ามเนื้อ
                                                                        ที่แผลผ่าตัดหลักในผู้ป่วยที่มีแผลผ่าตัด 1
                                                                        แห่งหรือมากกว่า</label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="1" id="d36" name="d36">
                                                                        <label class="form-check-label" for="d36">Deep
                                                                            incisional Secondary (DIS)
                                                                            ติดเชื้อชั้นผังผืด และกล้ามเนื้อ
                                                                            ที่แผลผ่าตัดรอง ในผู้ป่วยที่มีแผลผ่าตัด 1
                                                                            แห่งหรือมากกว่า</label>
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
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d37" name="d37">
                                                            <label class="form-check-label"
                                                                for="d37">มีการติดเชื้อที่ตำแหน่งผ่าตัดภายหลังการผ่าตัดในโรงพยาบาล
                                                                ซึงเกิดขึ้นภายใน 30 วัน ในกรณีที่ไม่ใส่อุปกรณ์
                                                                หรือเกิดขึ้นภายใน 90 วันในกรณีที่ใส่อุปกรณ์(วันที่ผ่าตัด
                                                                นับเป็นวันที่
                                                                1 )</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d38" name="d38">
                                                            <label class="form-check-label"
                                                                for="d38">การติดเชื้อที่อวัยวะหรือช่องโพรงภายในร่างกาย
                                                                (ลึกกว่า ชั้นผิวหนัง กล้ามเนื้อ และพังผืด)
                                                                ซึงได้รับการเปิดหรือหัตถการขณะผ่าตัด</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="d39" name="d39">
                                                            <label class="form-check-label"
                                                                for="d39">ผู้ป่วยมีอาการอย่างน้อย 1 ข้อ
                                                                ต่อไปนี้</label>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d40" name="d40">
                                                                    <label class="form-check-label"
                                                                        for="d40">มีหนองออกมาจากท่อที่ใส่ไว้ภายในอวัยวะ</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d41" name="d41">
                                                                    <label class="form-check-label"
                                                                        for="d41">พบเชื้อก่อโรคจากการเพาะเชื้อจากของเหลวหรือเนื้อเยื่อจากบริเวณผ่าตัด
                                                                        ที่ส่งตรวจเพื่อการวินิจัยและรักษา</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" id="d42" name="d42">
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
                                    <br /><br />
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                            class="fa fa-save">
                                            บันทึก</i></button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>


            <?php } ?>


        </div>
    </div>
</div>
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
        $('#dep_infect').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "s2.php",
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
<script src="jquery-ui/jquery-ui.min.js"></script>
<script src="jquery-ui/jqueryui_datepicker_thai_min.js?1"></script>

<script type="text/javascript">

$(function(){
   
    $("#date_in").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,   
        showOn: 'button',
        //buttonText: "",
        buttonImage: "jquery-ui/images/calendar.png", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        langTh:true,
        yearTh: true,    
    });

    $("#date_out").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,   
        showOn: 'button',
        //buttonText: "",
        buttonImage: "jquery-ui/images/calendar.png", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        langTh:true,
        yearTh: true, 
    }); 

    $("#date_move").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,   
        showOn: 'button',
        //buttonText: "",
        buttonImage: "jquery-ui/images/calendar.png", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        langTh:true,
        yearTh: true, 
    });  

    $("#date_infect").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,   
        showOn: 'button',
        //buttonText: "",
        buttonImage: "jquery-ui/images/calendar.png", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        langTh:true,
        yearTh: true, 
    });  
});
</script>
<script src="js/popper.js"></script>

<?php
include("footer.php");
?>
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
    color: #000;
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
    color: #000;
    outline: 0;
}
</style>
<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
<style type="text/css">
/* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
#ui-datepicker-div {
    display: none;
}

.ui-datepicker {
    width: 220px;
    font-family: tahoma;
    font-size: 12px;
    text-align: center;
}

/*  css กำหนดปุ่ม ถ้ามีแสดง*/
.ui-datepicker-trigger {
    border: 1px solid #cccccc;
    background: #ececec !important;
    padding: 3px;
}

button.ui-datepicker-trigger {
    border: none;
    background: transparent !important;
}
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เพิ่มการวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formb1.php" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">หอผู้ป่วย</label><br>
                                    <input class="typeahead" type="text" name="a1" id="a1">
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
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">จากหอผู้ป่วย</label><br>
                                        <input class="typeahead" type="text" name="from_ward" id="from_ward">
                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่ติดเชื้อ</label>
                                            <div class="input-group date" id="id_3">
                                                <input type="text" name="date_infect" id="date_infect" value=""
                                                    class="form-control" placeholder="DD/MM/YYYY" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">หอผู้ป่วยที่ติดเชื้อ</label><br>
                                        <input class="typeahead" type="text" name="ward_infect" id="ward_infect">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">ภาควิชาที่ติดเชื้อ</label>
                                        <input class="typeahead" type="text" name="dep_infect" id="dep_infect">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6>ช้อมูลการใส่สายปัสสาวะ</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="status1"
                                            name="status1">
                                        <label class="form-check-label" for="status1">Yes</label>
                                    </div>

                                    <div class="box">
                                        <div class="row">
                                            <div class="col-4 form-inline">
                                                <label for="name" class="formcontrol-label">St&nbsp;&nbsp;&nbsp;</label>
                                                <input class="form-control" type="text" name="st" id="st"
                                                    placeholder="St">
                                            </div>
                                            <div class="col-4 form-inline">
                                                <label for="name"
                                                    class="formcontrol-label">Off&nbsp;&nbsp;&nbsp;</label>
                                                <input class="form-control" type="text" name="off" id="off"
                                                    placeholder="Off">
                                            </div>
                                            <div class="col-4 form-inline">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-status_yes">
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="status2"
                                            name="status2">
                                        <label class="form-check-label" for="status2">No</label>
                                    </div>

                                    <div class="box">
                                        <div class="row">
                                            <div class="col-12-inline">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Other
                                                        instrument&nbsp;&nbsp;&nbsp;</label>
                                                    <input class="form-control" type="text" name="other_in"
                                                        id="other_in" placeholder="Other instrument">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                            </div>


                            <div class="card-body p-3">
                                <div class="row">

                                    <div class="col-md-6 mb-md-0 mb-4">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row m-0">

                                            <div class="form-a">
                                                <h6 class="mb-2">เกณฑ์ต้องพิจารณาในการวินิจฉัย CAUTI</h6>
                                                <div class="form-check">

                                                    <input class="form-check-input" type="radio" value="1" id="cauti"
                                                        name="cauti">
                                                    <label class="form-check-label" for="cauti">
                                                        ผู้ป่วยใส่สายสวนปัสสาวะ > 2 วันปฏิทิน
                                                            หรือหลังถอดสายสวนปัสสาวะ<br>
                                                            ไม่เกิน 2 วันปฏิทิน
                                                            (วันที่ใส่หรือสายสวนปัสสาวะให้นับเป็นวันที่
                                                            1)
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <div class="form-check">
                                                <h6 class="mb-0">เกณฑ์ต้องพิจารณาในการวินิจฉัย Non-CAUTI</h6>
                                                <input class="form-check-input" type="radio" value="2" id="non_cauti"
                                                    name="non_cauti">
                                                <label class="form-check-label" for="non_cauti">
                                                    ผู้ป่วยไม่ได้ใส่สายสวนปัสสาวะ
                                                        หรือใส่สายสวนปัสสาวะไม่เกิน 2
                                                        วันปฏิทิน<br>
                                                        หรือหลังถอดสายสวนปัสสาวะ > 2 วันปฏิทิน <br>
                                                        (วันที่ใส่หรือสายสวนปัสสาวะให้นับเป็นวันที่ 1)
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn bg-gradient-success px-3 py-2"><i class="fa fa-save">
                                    บันทึก</i></button>
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
    $('#a1').typeahead({
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
$(function() {

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
        langTh: true,
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
        langTh: true,
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
        langTh: true,
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
        langTh: true,
        yearTh: true,
    });
});
</script>
<script src="js/popper.js"></script>

<?php
include("footer.php");
?>
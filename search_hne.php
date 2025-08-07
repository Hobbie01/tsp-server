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

<html>

<head>
    <meta charset="utf-8">
</head>
<style>
table, tr, td {
    border:1px solid #000;
    color: #000;
    border-collapse: collapse;
    text-align: center;
    font-family: "Sarabun", serif;
    font-weight: 400;
    font-style: normal;
}
</style>
<body>


    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-10">
                                <h3>ค้นหา</h3>
                            </div>
                            <div class="col-2">


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <form id="form1" name="form1" class="form-inline" method="post" action="search_hne.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">HN</label>
                                                <input class="form-control" type="text" name="hn" id="hn"
                                                    placeholder="HN">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                                    class="fa fa-save">
                                                    ค้นหา</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <?php 
if (isset($_POST['hn'])) {
    $i=0;
$hn = $_POST['hn'];//ตัวแปร
// echo $hn;
// echo "<br>";


$a = "SELECT TOP 20
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
PASID  = '$hn'
--dbo.PatientVisit.UID = '12733954'
ORDER by PatientVisit.UID DESC";
$aQuery = sqlsrv_query($conn,$a);


//สร้างตัวแปร $row มารับค่าจากการ fetch array
?>
                        <div class="row">
                            <div class="col-12">
                                <table style="width:500px;">
                                    <tr>
                                        <td align="center">ลำดับ</td>
                                        <td align="center">VisitDate</td>
                                        <td align="center">HN</td>
                                        <td align="center"></td>
                                    </tr>
                                    <?php while ($row = sqlsrv_fetch_array($aQuery, SQLSRV_FETCH_ASSOC)){  ?>
                                    <tr>
                                        <td><?php echo $i=$i+1; ?></td>
                                        <td><?php echo $row['VisitDate']; ?></td>
                                        <td><?php echo $row['PASID']; ?></td>
                                        <td align="center"><a href="forme1.php?PTUID=<?php echo $row['PTUID']; ?>&PTVUID=<?php echo $row['PTVUID']; ?>&PASID=<?php echo $row['PASID']; ?>">เลือก</a></td>
                                    </tr>
                                    <?php } ?>
                                </table>

                            </div>
                        </div>
                        <?php 
                   $i++;
                   } ?>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <?php
include("footer.php");
?>
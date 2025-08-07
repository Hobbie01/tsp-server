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
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>การวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ(ต่อ)</h6>
                </div>
                <div class="card-body pb-2">
<?php
$a = "select * from `table1` WHERE table1_id = '".$_GET['table1_id']."'  Order By table1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

$b = "select * from `table4` WHERE table1_id = '".$_GET['table1_id']."' Order By table1_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
?>
                    <form role="form" action="edit_form4_sql.php" method="post">

                        <div class="card">
                            <div class="card-body pt-4 p-3">
                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <h6 class="mb-3 text-sm">Culture</h6>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d1"
                                                        name="d1" <?php if($row_b['d1'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d1">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d2">Supecimen</label>
                                                    <input class="form-control" type="text" name="d2" id="d2" value="<?= $row_b['d2'] ?>"
                                                        placeholder="Supecimen">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_0">
                                                        <input type="text" name="d3" id="d3" value="<?= $row_b['d3'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d4">orgenism 1.</label>
                                                    <input class="form-control" type="text" name="d4" id="d4" value="<?= $row_b['d4'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d5">2.</label>
                                                    <input class="form-control" type="text" name="d5" id="d5" value="<?= $row_b['d5'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d6" 
                                                        name="d6" <?php if($row_b['d6'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d6">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d7">Supecimen</label>
                                                    <input class="form-control" type="text" name="d7" id="d7" value="<?= $row_b['d7'] ?>"
                                                        placeholder="Supecimen">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_1">
                                                        <input type="text" name="d8" id="d8" value="<?= $row_b['d8'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d9">orgenism 1.</label>
                                                    <input class="form-control" type="text" name="d9" id="d9" value="<?= $row_b['d9'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d10">2.</label>
                                                    <input class="form-control" type="text" name="d10" id="d10" value="<?= $row_b['d10'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d11"
                                                        name="d11" <?php if($row_b['d11'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d11">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d12">Supecimen</label>
                                                    <input class="form-control" type="text" name="d12" id="d12" value="<?= $row_b['d12'] ?>"
                                                        placeholder="Supecimen">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_2">
                                                        <input type="text" name="d13" id="d13" value="<?= $row_b['d13'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d14">orgenism 1.</label>
                                                    <input class="form-control" type="text" name="d14" id="d14" value="<?= $row_b['d14'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d15">2.</label>
                                                    <input class="form-control" type="text" name="d15" id="d15" value="<?= $row_b['d15'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d16"
                                                        name="d16" <?php if($row_b['d16'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d16">No</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <h6 class="mb-3 text-sm">ATB for infection</h6>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d17"
                                                        name="d17" <?php if($row_b['d17'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d17">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d18">Drug 1.</label>
                                                    <input class="form-control" type="text" name="d18" id="d18" value="<?= $row_b['d18'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Start</label>
                                                    <div class="input-group date" id="id_3">
                                                        <input type="text" name="d19" id="d19" value="<?= $row_b['d19'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_4">
                                                        <input type="text" name="d20" id="d20" value="<?= $row_b['d20'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">

                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d21">2.</label>
                                                    <input class="form-control" type="text" name="d21" id="d21" value="<?= $row_b['d21'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Start</label>
                                                    <div class="input-group date" id="id_5">
                                                        <input type="text" name="d22" id="d22" value="<?= $row_b['d22'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_6">
                                                        <input type="text" name="d23" id="d23" value="<?= $row_b['d23'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">

                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d24">3.</label>
                                                    <input class="form-control" type="text" name="d24" id="d42" value="<?= $row_b['d24'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Start</label>
                                                    <div class="input-group date" id="id_7">
                                                        <input type="text" name="d25" id="d25" value="<?= $row_b['d25'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_8">
                                                        <input type="text" name="d26" id="d26" value="<?= $row_b['d26'] ?>"
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d27"
                                                        name="d27" <?php if($row_b['d27'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d27">No</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <h6 class="mb-3 text-sm">True infection</h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d28"
                                                        name="d28" <?php if($row_b['d28'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d28">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d29">BT</label>
                                                    <input class="form-control" type="text" name="d29" id="d29" value="<?= $row_b['d29'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d28">RR</label>
                                                    <input class="form-control" type="text" name="d30" id="d30" value="<?= $row_b['d30'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d31">PR</label>
                                                    <input class="form-control" type="text" name="d31" id="d31" value="<?= $row_b['d31'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d32">WBC</label>
                                                    <input class="form-control" type="text" name="d32" id="d32" value="<?= $row_b['d32'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d33"
                                                        name="d33" <?php if($row_b['d33'] == "1"){ 
                                                        echo " checked"; 
                                                        }else{
                                                        echo "" ; 
                                                        }?>>
                                                    <label class="form-check-label" for="d33">No</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-check-label" for="d34">แพทย์ที่ให้คำปรึกษา</label>
                                                <input class="form-control" type="text" name="d34" id="d34" value="<?= $row_b['d34'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-check-label" for="d35">ผู้รายงาน</label>
                                                <input class="form-control" type="text" name="d35" id="d35" value="<?= $row_b['d35'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">วันที่รายงาน</label>
                                                <div class="input-group date" id="id_9">
                                                    <input type="text" name="d36" id="d36" value="<?= $row_b['d36'] ?>" class="form-control"
                                                        placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                        <input type="hidden" name="table4_id" value="<?= $row_b['table4_id'] ?>">
                                            <input type="hidden" name="table1_id" id="table_1"
                                                value="<?php echo $_GET["table1_id"];?>">
                                            <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                                    class="fa fa-save"> บันทึก</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <?php 
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/main.js"></script>
<script src="calendar-09/js/jquery.min.js"></script>
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<script src="calendar-09/js/main2.js"></script>
<?php
include("footer.php");
?>
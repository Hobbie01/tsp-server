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
                    <h6>เกณฑ์การวินิจฉัยการติดเชื้อที่ตำแหน่งผ่าตัด(ต่อ)</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formd5.php" method="post">

                        <div class="card">
                            <div class="card-body pt-4 p-3">
                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <h6 class="mb-3 text-sm">Culture</h6>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d1"
                                                        name="d1">
                                                    <label class="form-check-label" for="d1">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d2">Supecimen</label>
                                                    <input class="form-control" type="text" name="d2" id="d2"
                                                        placeholder="Supecimen">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_0">
                                                        <input type="text" name="d3" id="d3" value=""
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
                                                    <input class="form-control" type="text" name="d4" id="d4">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d5">2.</label>
                                                    <input class="form-control" type="text" name="d5" id="d5">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d6"
                                                        name="d6">
                                                    <label class="form-check-label" for="d6">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d7">Supecimen</label>
                                                    <input class="form-control" type="text" name="d7" id="d7"
                                                        placeholder="Supecimen">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_1">
                                                        <input type="text" name="d8" id="d8" value=""
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
                                                    <input class="form-control" type="text" name="d9" id="d9">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d10">2.</label>
                                                    <input class="form-control" type="text" name="d10" id="d10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d11"
                                                        name="d11">
                                                    <label class="form-check-label" for="d11">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d12">Supecimen</label>
                                                    <input class="form-control" type="text" name="d12" id="d12"
                                                        placeholder="Supecimen">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_2">
                                                        <input type="text" name="d13" id="d13" value=""
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
                                                    <input class="form-control" type="text" name="d14" id="d14">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d15">2.</label>
                                                    <input class="form-control" type="text" name="d15" id="d15">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d16"
                                                        name="d16">
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
                                                        name="d17">
                                                    <label class="form-check-label" for="d17">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d18">Drug 1.</label>
                                                    <input class="form-control" type="text" name="d18" id="d18">
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
                                                        <input type="text" name="d19" id="d19" value=""
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_4">
                                                        <input type="text" name="d20" id="d20" value=""
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
                                                    <input class="form-control" type="text" name="d21" id="d21">
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
                                                        <input type="text" name="d22" id="d22" value=""
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_6">
                                                        <input type="text" name="d23" id="d23" value=""
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
                                                    <input class="form-control" type="text" name="d24" id="d24">
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
                                                        <input type="text" name="d25" id="d25" value=""
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_8">
                                                        <input type="text" name="d26" id="d26" value=""
                                                            class="form-control" placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d27"
                                                        name="d27">
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
                                                        name="d28">
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
                                                    <input class="form-control" type="text" name="d29" id="d29">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d28">RR</label>
                                                    <input class="form-control" type="text" name="d30" id="d30">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d31">RP</label>
                                                    <input class="form-control" type="text" name="d31" id="d31">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d32">WBC</label>
                                                    <input class="form-control" type="text" name="d32" id="d32">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d33"
                                                        name="d33">
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
                                                <input class="form-control" type="text" name="d34" id="d34">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-check-label" for="d35">ผู้รายงาน</label>
                                                <input class="form-control" type="text" name="d35" id="d35">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name" class="formcontrol-label">วันที่รายงาน</label>
                                                <div class="input-group date" id="id_9">
                                                    <input type="text" name="d36" id="d36" value="" class="form-control"
                                                        placeholder="MM/DD/YYYY hh:mm:ss"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <input type="hidden" name="tabled1_id" id="tabled1_id"
                                                value="<?php echo $_GET["tabled1_id"];?>">
                                            <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                                    class="fa fa-save"> บันทึก</i></button>
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
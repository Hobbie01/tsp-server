<?php
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}

// รับพารามิเตอร์จาก URL
$table1_id = isset($_GET['table1_id']) ? $_GET['table1_id'] : '';
$hn = isset($_GET['hn']) ? $_GET['hn'] : '';
$an = isset($_GET['an']) ? $_GET['an'] : '';

include("header.php");
include("sidebar.php");
include("navbar.php");
include("connect.php");
include("sqlsrv_connect.php");

// Query ข้อมูล specimen จากฐานข้อมูล
$sql_specimen = "SELECT * FROM speccimen ORDER BY spec_name ASC";
$result_specimen = mysqli_query($objCon, $sql_specimen);
$specimens = array();
while($row = mysqli_fetch_assoc($result_specimen)) {
    $specimens[] = $row;
}

// Query ข้อมูล organism จากฐานข้อมูล
$sql_organism = "SELECT * FROM organism ORDER BY organism_name ASC";
$result_organism = mysqli_query($objCon, $sql_organism);
$organisms = array();
while($row = mysqli_fetch_assoc($result_organism)) {
    $organisms[] = $row;
}

// Query ข้อมูล drug จากฐานข้อมูล
$sql_drug = "SELECT * FROM drug_atb ORDER BY drug_name ASC";
$result_drug = mysqli_query($objCon, $sql_drug);
$drugs = array();
while($row = mysqli_fetch_assoc($result_drug)) {
    $drugs[] = $row;
}
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/ui-lightness/jquery-ui.css">
<style type="text/css">
/* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
.ui-datepicker {
    width: 250px;
    font-family: tahoma;
    font-size: 13px;
}

/*  css กำหนดปุ่ม ถ้ามีแสดง*/
.ui-datepicker-trigger {
    border: 1px solid #cccccc;
    background: #ececec !important;
    padding: 5px 8px;
    margin-left: 5px;
    border-radius: 4px;
    cursor: pointer;
}

button.ui-datepicker-trigger {
    border: 1px solid #ddd;
    background: #f8f9fa !important;
}
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>การวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ(ต่อ)</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_form4.php" method="post">

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
                                                    <select class="form-control" name="d2" id="d2">
                                                        <option value="">-- เลือก Specimen --</option>
                                                        <?php foreach($specimens as $specimen): ?>
                                                            <option value="<?php echo $specimen['spec_name']; ?>"><?php echo $specimen['spec_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_0">
                                                        <input type="text" name="d3" id="d3" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d4">organism 1.</label>
                                                    <select class="form-control" name="d4" id="d4">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d5">2.</label>
                                                    <select class="form-control" name="d5" id="d5">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-10">
                                                <button type="button" id="addCulture2" class="btn btn-primary btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม Culture
                                                </button>
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
                                                    <select class="form-control" name="d7" id="d7">
                                                        <option value="">-- เลือก Specimen --</option>
                                                        <?php foreach($specimens as $specimen): ?>
                                                            <option value="<?php echo $specimen['spec_name']; ?>"><?php echo $specimen['spec_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_1">
                                                        <input type="text" name="d8" id="d8" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d9">organism 1.</label>
                                                    <select class="form-control" name="d9" id="d9">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d10">2.</label>
                                                    <select class="form-control" name="d10" id="d10">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-10">
                                                <button type="button" id="addCulture3" class="btn btn-primary btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม Culture
                                                </button>
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
                                                    <select class="form-control" name="d12" id="d12">
                                                        <option value="">-- เลือก Specimen --</option>
                                                        <?php foreach($specimens as $specimen): ?>
                                                            <option value="<?php echo $specimen['spec_name']; ?>"><?php echo $specimen['spec_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_2">
                                                        <input type="text" name="d13" id="d13" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d14">organism 1.</label>
                                                    <select class="form-control" name="d14" id="d14">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d15">2.</label>
                                                    <select class="form-control" name="d15" id="d15">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-10">
                                                <button type="button" id="addCulture4" class="btn btn-primary btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม Culture
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Culture Section 4 -->
                                        <div class="row" style="display: none;" id="culture4_section1">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d41"
                                                        name="d41">
                                                    <label class="form-check-label" for="d41">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d42">Supecimen</label>
                                                    <select class="form-control" name="d42" id="d42">
                                                        <option value="">-- เลือก Specimen --</option>
                                                        <?php foreach($specimens as $specimen): ?>
                                                            <option value="<?php echo $specimen['spec_name']; ?>"><?php echo $specimen['spec_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_10">
                                                        <input type="text" name="d43" id="d43" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display: none;" id="culture4_section2">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d44">organism 1.</label>
                                                    <select class="form-control" name="d44" id="d44">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d45">2.</label>
                                                    <select class="form-control" name="d45" id="d45">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-10">
                                                <button type="button" id="addCulture5" class="btn btn-primary btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม Culture
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Culture Section 5 -->
                                        <div class="row" style="display: none;" id="culture5_section1">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="d46"
                                                        name="d46">
                                                    <label class="form-check-label" for="d46">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d47">Supecimen</label>
                                                    <select class="form-control" name="d47" id="d47">
                                                        <option value="">-- เลือก Specimen --</option>
                                                        <?php foreach($specimens as $specimen): ?>
                                                            <option value="<?php echo $specimen['spec_name']; ?>"><?php echo $specimen['spec_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">date</label>
                                                    <div class="input-group date" id="id_11">
                                                        <input type="text" name="d48" id="d48" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="display: none;" id="culture5_section2">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d49">organism 1.</label>
                                                    <select class="form-control" name="d49" id="d49">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d50">2.</label>
                                                    <select class="form-control" name="d50" id="d50">
                                                        <option value="">-- เลือก Organism --</option>
                                                        <?php foreach($organisms as $organism): ?>
                                                            <option value="<?php echo $organism['organism_name']; ?>"><?php echo $organism['organism_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                                                    <select class="form-control" name="d18" id="d18">
                                                        <option value="">-- เลือก Drug --</option>
                                                        <?php foreach($drugs as $drug): ?>
                                                            <option value="<?php echo $drug['drug_name']; ?>"><?php echo $drug['drug_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_4">
                                                        <input type="text" name="d20" id="d20" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-10">
                                                <button type="button" id="addATB2" class="btn btn-success btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม Drug
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">

                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d21">2.</label>
                                                    <select class="form-control" name="d21" id="d21">
                                                        <option value="">-- เลือก Drug --</option>
                                                        <?php foreach($drugs as $drug): ?>
                                                            <option value="<?php echo $drug['drug_name']; ?>"><?php echo $drug['drug_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_6">
                                                        <input type="text" name="d23" id="d23" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-10">
                                                <button type="button" id="addATB3" class="btn btn-success btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม Drug
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">

                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="d24">3.</label>
                                                    <select class="form-control" name="d24" id="d24">
                                                        <option value="">-- เลือก Drug --</option>
                                                        <?php foreach($drugs as $drug): ?>
                                                            <option value="<?php echo $drug['drug_name']; ?>"><?php echo $drug['drug_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Off</label>
                                                    <div class="input-group date" id="id_8">
                                                        <input type="text" name="d26" id="d26" value=""
                                                            class="form-control" placeholder="DD/MM/YYYY"/>
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
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" id="addATBSection" class="btn btn-warning btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม ATB for infection
                                                </button>
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
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" id="addTrueInfectionSection" class="btn btn-info btn-sm" style="display: none;">
                                                    <i class="fa fa-plus"></i> เพิ่ม True infection
                                                </button>
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
                                                        placeholder="DD/MM/YYYY"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <input type="hidden" name="table1_id" id="table1_id"
                                                value="<?php echo isset($_GET["table1_id"]) ? $_GET["table1_id"] : ''; ?>">
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
<!-- jQuery และ jQuery UI จาก local files -->
<script src="./jquery-2.1.4.min.js"></script>
<script src="./jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap (ใช้ CDN ที่มั่นคง) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ซ่อนฟิลด์ทั้งหมดในตอนเริ่มต้น
    hideAllFields();
    
    // Culture section (d1)
    document.getElementById('d1').addEventListener('change', function() {
        toggleCultureFields(this.checked);
        if (this.checked) {
            // แสดงเฉพาะปุ่มเพิ่ม Culture 2
            document.getElementById('addCulture2').style.display = 'inline-block';
        } else {
            // ซ่อน Culture section 2, 3, 4, 5 เมื่อยกเลิก Culture section 1
            toggleCultureSection2(false);
            toggleCultureSection3(false);
            toggleCultureSection4(false);
            toggleCultureSection5(false);
            document.getElementById('addCulture2').style.display = 'none';
            document.getElementById('addCulture3').style.display = 'none';
            document.getElementById('addCulture4').style.display = 'none';
            document.getElementById('addCulture5').style.display = 'none';
        }
    });
    
    // ปุ่มเพิ่ม Culture 2
    document.getElementById('addCulture2').addEventListener('click', function() {
        toggleCultureSection2(true);
        this.style.display = 'none';
        document.getElementById('addCulture3').style.display = 'inline-block';
    });
    
    // ปุ่มเพิ่ม Culture 3
    document.getElementById('addCulture3').addEventListener('click', function() {
        toggleCultureSection3(true);
        this.style.display = 'none';
        document.getElementById('addCulture4').style.display = 'inline-block';
    });
    
    // ปุ่มเพิ่ม Culture 4
    document.getElementById('addCulture4').addEventListener('click', function() {
        toggleCultureSection4(true);
        this.style.display = 'none';
        document.getElementById('addCulture5').style.display = 'inline-block';
    });
    
    // ปุ่มเพิ่ม Culture 5
    document.getElementById('addCulture5').addEventListener('click', function() {
        toggleCultureSection5(true);
        this.style.display = 'none';
    });
    
    // ATB for infection section (d17)
    document.getElementById('d17').addEventListener('change', function() {
        toggleATBFields(this.checked);
        if (this.checked) {
            // แสดงปุ่มเพิ่ม ATB 2 เมื่อมีการเลือก Drug 1
            document.getElementById('d18').addEventListener('change', checkATB1);
            // แสดงปุ่มเพิ่ม ATB section
            document.getElementById('addATBSection').style.display = 'inline-block';
        } else {
            // ซ่อน drug 2, 3 และ sections อื่นๆ
            toggleATBDrug2(false);
            toggleATBDrug3(false);
            document.getElementById('addATB2').style.display = 'none';
            document.getElementById('addATB3').style.display = 'none';
            document.getElementById('addATBSection').style.display = 'none';
        }
    });
    
    // ปุ่มเพิ่ม ATB 2
    document.getElementById('addATB2').addEventListener('click', function() {
        toggleATBDrug2(true);
        this.style.display = 'none';
        document.getElementById('addATB3').style.display = 'inline-block';
    });
    
    // ปุ่มเพิ่ม ATB 3
    document.getElementById('addATB3').addEventListener('click', function() {
        toggleATBDrug3(true);
        this.style.display = 'none';
    });
    
    // ปุ่มเพิ่ม ATB Section ใหม่
    document.getElementById('addATBSection').addEventListener('click', function() {
        addNewATBSection();
    });
    
    // True infection section (d28)
    document.getElementById('d28').addEventListener('change', function() {
        toggleTrueInfectionFields(this.checked);
        if (this.checked) {
            // แสดงปุ่มเพิ่ม True infection section
            document.getElementById('addTrueInfectionSection').style.display = 'inline-block';
        } else {
            document.getElementById('addTrueInfectionSection').style.display = 'none';
        }
    });
    
    // ปุ่มเพิ่ม True Infection Section ใหม่
    document.getElementById('addTrueInfectionSection').addEventListener('click', function() {
        addNewTrueInfectionSection();
    });
});

function hideAllFields() {
    // ซ่อนฟิลด์ Culture section 1
    toggleCultureFields(false);
    
    // ซ่อน Culture section 2 ทั้งหมด (รวมปุ่ม Yes)
    toggleCultureSection2(false);
    
    // ซ่อน Culture section 3 ทั้งหมด (รวมปุ่ม Yes)
    toggleCultureSection3(false);
    
    // ซ่อน Culture section 4 และ 5
    toggleCultureSection4(false);
    toggleCultureSection5(false);
    
    // ซ่อนฟิลด์ ATB for infection
    toggleATBFields(false);
    toggleATBDrug2(false);
    toggleATBDrug3(false);
    
    // ซ่อนฟิลด์ True infection
    toggleTrueInfectionFields(false);
    
    // ซ่อนปุ่มเพิ่มทั้งหมด
    document.getElementById('addCulture2').style.display = 'none';
    document.getElementById('addCulture3').style.display = 'none';
    document.getElementById('addCulture4').style.display = 'none';
    document.getElementById('addCulture5').style.display = 'none';
    document.getElementById('addATB2').style.display = 'none';
    document.getElementById('addATB3').style.display = 'none';
    document.getElementById('addATBSection').style.display = 'none';
    document.getElementById('addTrueInfectionSection').style.display = 'none';
}

function checkATB1() {
    if (this.value.trim() !== '') {
        // แสดงปุ่มเพิ่ม Drug 2 แต่ไม่แสดง Drug 2 ทันที
        document.getElementById('addATB2').style.display = 'inline-block';
    } else {
        // ซ่อน Drug 2, 3 และปุ่มเพิ่มทั้งหมด
        toggleATBDrug2(false);
        toggleATBDrug3(false);
        document.getElementById('addATB2').style.display = 'none';
        document.getElementById('addATB3').style.display = 'none';
    }
}

function toggleCultureFields(show) {
    const fields = ['d2', 'd3', 'd4', 'd5'];
    
    // ซ่อน/แสดงเฉพาะฟิลด์ข้อมูล (col-5) ไม่ใช่ปุ่ม Yes (col-2)
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            // ซ่อน/แสดง parent div ของฟิลด์ (col-5)
            const fieldContainer = field.closest('.col-5');
            if (fieldContainer) {
                fieldContainer.style.display = show ? 'block' : 'none';
            }
            
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    // ซ่อนแถวที่มีเฉพาะ organism (แถวที่ 2)
    const organismRow = document.getElementById('d4').closest('.row');
    if (organismRow) {
        organismRow.style.display = show ? 'flex' : 'none';
    }
}

function toggleCultureFields2(show) {
    const fields = ['d7', 'd8', 'd9', 'd10'];
    
    // ซ่อน/แสดงเฉพาะฟิลด์ข้อมูล (col-5) ไม่ใช่ปุ่ม Yes (col-2)
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            // ซ่อน/แสดง parent div ของฟิลด์ (col-5)
            const fieldContainer = field.closest('.col-5');
            if (fieldContainer) {
                fieldContainer.style.display = show ? 'block' : 'none';
            }
            
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    // ซ่อนแถวที่มีเฉพาะ organism (แถวที่ 2)
    const organismRow = document.getElementById('d9').closest('.row');
    if (organismRow) {
        organismRow.style.display = show ? 'flex' : 'none';
    }
}

function toggleCultureFields3(show) {
    const fields = ['d12', 'd13', 'd14', 'd15'];
    
    // ซ่อน/แสดงเฉพาะฟิลด์ข้อมูล (col-5) ไม่ใช่ปุ่ม Yes (col-2)
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            // ซ่อน/แสดง parent div ของฟิลด์ (col-5)
            const fieldContainer = field.closest('.col-5');
            if (fieldContainer) {
                fieldContainer.style.display = show ? 'block' : 'none';
            }
            
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    // ซ่อนแถวที่มีเฉพาะ organism (แถวที่ 2)
    const organismRow = document.getElementById('d14').closest('.row');
    if (organismRow) {
        organismRow.style.display = show ? 'flex' : 'none';
    }
}

function toggleATBFields(show) {
    // แสดงเฉพาะ Drug 1 และ Start/Off ของ Drug 1
    const drug1Fields = ['d18', 'd19', 'd20'];
    
    drug1Fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            // สำหรับ d18 (Drug 1) ซ่อน/แสดง parent col-5
            if (fieldId === 'd18') {
                const fieldContainer = field.closest('.col-5');
                if (fieldContainer) {
                    fieldContainer.style.display = show ? 'block' : 'none';
                }
            }
            
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    // แสดง/ซ่อนแถว Start/Off ของ Drug 1
    const drug1StartOffRow = document.getElementById('d19').closest('.row');
    if (drug1StartOffRow) {
        drug1StartOffRow.style.display = show ? 'flex' : 'none';
    }
    
    // เสมอซ่อน Drug 2 และ 3 ในตอนเริ่มต้น
    toggleATBDrug2(false);
    toggleATBDrug3(false);
}

function toggleATBDrug2(show) {
    const drug2Fields = ['d21', 'd22', 'd23'];
    
    drug2Fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    const drug2Rows = [
        document.getElementById('d21').closest('.row'),  // แถว Drug 2
        document.getElementById('d22').closest('.row')   // แถว Start/Off ของ Drug 2
    ];
    
    drug2Rows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
    
    if (!show) {
        toggleATBDrug3(false);
    }
}

function toggleATBDrug3(show) {
    const drug3Fields = ['d24', 'd25', 'd26'];
    
    drug3Fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    const drug3Rows = [
        document.getElementById('d24').closest('.row'),  // แถว Drug 3
        document.getElementById('d25').closest('.row')   // แถว Start/Off ของ Drug 3
    ];
    
    drug3Rows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
}

function toggleCultureSection2(show) {
    // ซ่อน/แสดง Culture section 2 ทั้งหมด (รวมปุ่ม Yes)
    const section2Rows = [
        document.getElementById('d6').closest('.row'),   // แถวที่มีปุ่ม Yes และ Specimen, Date
        document.getElementById('d9').closest('.row')    // แถวที่มี Organism 1, 2
    ];
    
    const fields = ['d6', 'd7', 'd8', 'd9', 'd10'];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    section2Rows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
}

function toggleCultureSection3(show) {
    // ซ่อน/แสดง Culture section 3 ทั้งหมด (รวมปุ่ม Yes)
    const section3Rows = [
        document.getElementById('d11').closest('.row'),  // แถวที่มีปุ่ม Yes และ Specimen, Date
        document.getElementById('d14').closest('.row')   // แถวที่มี Organism 1, 2
    ];
    
    const fields = ['d11', 'd12', 'd13', 'd14', 'd15'];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    section3Rows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
}

function toggleCultureSection4(show) {
    // ซ่อน/แสดง Culture section 4 ทั้งหมด
    const section4Rows = [
        document.getElementById('culture4_section1'),
        document.getElementById('culture4_section2')
    ];
    
    const fields = ['d41', 'd42', 'd43', 'd44', 'd45'];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    section4Rows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
}

function toggleCultureSection5(show) {
    // ซ่อน/แสดง Culture section 5 ทั้งหมด
    const section5Rows = [
        document.getElementById('culture5_section1'),
        document.getElementById('culture5_section2')
    ];
    
    const fields = ['d46', 'd47', 'd48', 'd49', 'd50'];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    section5Rows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
}

function toggleTrueInfectionFields(show) {
    const fields = ['d29', 'd30', 'd31', 'd32'];
    
    // ซ่อนเฉพาะแถวที่มีฟิลด์ข้อมูล (ไม่ใช่แถวที่มีปุ่ม Yes)
    const dataRows = [
        document.getElementById('d29').closest('.row'),  // แถว BT, RR, RP
        document.getElementById('d32').closest('.row')   // แถว WBC
    ];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = !show;
            if (!show) field.value = '';
        }
    });
    
    dataRows.forEach(row => {
        if (row) {
            row.style.display = show ? 'flex' : 'none';
        }
    });
}

// ตัวแปรสำหรับเก็บจำนวน sections
let cultureCount = 3;
let atbSectionCount = 1;
let trueInfectionCount = 1;
let atbDrugCount = 3;



// ฟังก์ชันสร้าง ATB section ใหม่
function addNewATBSection() {
    atbSectionCount++;
    const newSection = createATBSection(atbSectionCount);
    
    // หาตำแหน่งที่จะใส่ section ใหม่
    const atbContainer = document.getElementById('addATBSection').closest('.border-0');
    if (atbContainer) {
        atbContainer.insertAdjacentHTML('afterend', newSection);
        
        // เพิ่ม datepicker ให้กับช่องวันที่ใหม่
        setTimeout(function() {
            $("#atb" + atbSectionCount + "_start").datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                changeYear: true,
                showOn: 'both',
                buttonText: '📅',
                monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 
                            'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
                dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesShort: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                firstDay: 0
            });
            
            $("#atb" + atbSectionCount + "_off").datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                changeYear: true,
                showOn: 'both',
                buttonText: '📅',
                monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 
                            'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
                dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesShort: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                firstDay: 0
            });
        }, 100);
    }
    
    console.log('Added new ATB section:', atbSectionCount);
}

// ฟังก์ชันสร้าง True Infection section ใหม่
function addNewTrueInfectionSection() {
    trueInfectionCount++;
    const newSection = createTrueInfectionSection(trueInfectionCount);
    
    // หาตำแหน่งที่จะใส่ section ใหม่
    const trueInfectionContainer = document.getElementById('addTrueInfectionSection').closest('.border-0');
    if (trueInfectionContainer) {
        trueInfectionContainer.insertAdjacentHTML('afterend', newSection);
    }
    
    console.log('Added new True Infection section:', trueInfectionCount);
}

// ข้อมูล specimens และ organisms สำหรับ JavaScript
const specimensData = <?php echo json_encode($specimens); ?>;
const organismsData = <?php echo json_encode($organisms); ?>;
const drugsData = <?php echo json_encode($drugs); ?>;

// Template สำหรับ Culture section
function createCultureSection(number) {
    let specimenOptions = '<option value="">-- เลือก Specimen --</option>';
    specimensData.forEach(function(specimen) {
        specimenOptions += '<option value="' + specimen.spec_name + '">' + specimen.spec_name + '</option>';
    });
    
    let organismOptions = '<option value="">-- เลือก Organism --</option>';
    organismsData.forEach(function(organism) {
        organismOptions += '<option value="' + organism.organism_name + '">' + organism.organism_name + '</option>';
    });
    
    return '<div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg" data-culture-section="' + number + '">' +
        '<div>' +
            '<h6 class="mb-3 text-sm">Culture ' + number + '</h6>' +
            '<div class="row">' +
                '<div class="col-2">' +
                    '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" value="1" id="culture' + number + '_yes" name="culture' + number + '_yes">' +
                        '<label class="form-check-label" for="culture' + number + '_yes">Yes</label>' +
                    '</div>' +
                '</div>' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">Specimen</label>' +
                        '<select class="form-control" name="culture' + number + '_specimen" id="culture' + number + '_specimen">' +
                            specimenOptions +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="formcontrol-label">Date</label>' +
                        '<input type="text" name="culture' + number + '_date" id="culture' + number + '_date" class="form-control" placeholder="DD/MM/YYYY"/>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col-2"></div>' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">Organism 1</label>' +
                        '<select class="form-control" name="culture' + number + '_organism1" id="culture' + number + '_organism1">' +
                            organismOptions +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">Organism 2</label>' +
                        '<select class="form-control" name="culture' + number + '_organism2" id="culture' + number + '_organism2">' +
                            organismOptions +
                        '</select>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>';
}

// Template สำหรับ ATB section
function createATBSection(number) {
    let drugOptions = '<option value="">-- เลือก Drug --</option>';
    drugsData.forEach(function(drug) {
        drugOptions += '<option value="' + drug.drug_name + '">' + drug.drug_name + '</option>';
    });
    
    return '<div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg" data-atb-section="' + number + '">' +
        '<div>' +
            '<h6 class="mb-3 text-sm">ATB for infection ' + number + '</h6>' +
            '<div class="row">' +
                '<div class="col-2">' +
                    '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" value="1" id="atb' + number + '_yes" name="atb' + number + '_yes">' +
                        '<label class="form-check-label" for="atb' + number + '_yes">Yes</label>' +
                    '</div>' +
                '</div>' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">Drug 1</label>' +
                        '<select class="form-control" name="atb' + number + '_drug1" id="atb' + number + '_drug1">' +
                            drugOptions +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<div class="col-5"></div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="formcontrol-label">Start</label>' +
                        '<input type="text" name="atb' + number + '_start" id="atb' + number + '_start" class="form-control" placeholder="DD/MM/YYYY"/>' +
                    '</div>' +
                '</div>' +
                '<div class="col-5">' +
                    '<div class="form-group">' +
                        '<label class="formcontrol-label">Off</label>' +
                        '<input type="text" name="atb' + number + '_off" id="atb' + number + '_off" class="form-control" placeholder="DD/MM/YYYY"/>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>';
}

// Template สำหรับ True Infection section
function createTrueInfectionSection(number) {
    return '<div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg" data-true-infection-section="' + number + '">' +
        '<div>' +
            '<h6 class="mb-3 text-sm">True infection ' + number + '</h6>' +
            '<div class="row">' +
                '<div class="col-6">' +
                    '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" value="1" id="true' + number + '_yes" name="true' + number + '_yes">' +
                        '<label class="form-check-label" for="true' + number + '_yes">Yes</label>' +
                    '</div>' +
                '</div>' +
                '<div class="col-6"></div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col-4">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">BT</label>' +
                        '<input class="form-control" type="text" name="true' + number + '_bt" id="true' + number + '_bt">' +
                    '</div>' +
                '</div>' +
                '<div class="col-4">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">RR</label>' +
                        '<input class="form-control" type="text" name="true' + number + '_rr" id="true' + number + '_rr">' +
                    '</div>' +
                '</div>' +
                '<div class="col-4">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">RP</label>' +
                        '<input class="form-control" type="text" name="true' + number + '_rp" id="true' + number + '_rp">' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col-6">' +
                    '<div class="form-group">' +
                        '<label class="form-check-label">WBC</label>' +
                        '<input class="form-control" type="text" name="true' + number + '_wbc" id="true' + number + '_wbc">' +
                    '</div>' +
                '</div>' +
                '<div class="col-6"></div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col-6">' +
                    '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" value="1" id="true' + number + '_no" name="true' + number + '_no">' +
                        '<label class="form-check-label" for="true' + number + '_no">No</label>' +
                    '</div>' +
                '</div>' +
                '<div class="col-6"></div>' +
            '</div>' +
        '</div>' +
    '</div>';
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    // ตรวจสอบว่า jQuery และ jQuery UI โหลดสำเร็จ
    if (typeof $ === 'undefined') {
        console.error('jQuery is not loaded');
        return;
    }
    
    if (typeof $.ui === 'undefined') {
        console.error('jQuery UI is not loaded');
        return;
    }
    
    console.log('jQuery version:', $.fn.jquery);
    console.log('jQuery UI version:', $.ui.version);
    console.log('Starting datepicker initialization...');
    
    // รอให้หน้าโหลดเสร็จก่อน
    setTimeout(function() {
        console.log('Delayed initialization starting...');
        
        // กำหนด config ธรรมดา
        var dateConfig = {
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonText: '📅',
            yearRange: '1900:2100',
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 
                        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                             'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesShort: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
            dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
            firstDay: 0
        };
        
        // ใช้ datepicker ธรรมดากับทุกช่องวันที่
        var dateFields = ['d3', 'd8', 'd13', 'd19', 'd20', 'd22', 'd23', 'd25', 'd26', 'd43', 'd48'];
        
        console.log('Total date fields to process:', dateFields.length);
        
        dateFields.forEach(function(fieldId) {
            var element = $("#" + fieldId);
            console.log('Processing field:', fieldId, 'Found:', element.length > 0);
            
            if (element.length > 0) {
                try {
                    element.datepicker(dateConfig);
                    console.log('✓ Datepicker successfully applied to:', fieldId);
                } catch (error) {
                    console.error('✗ Error applying datepicker to', fieldId, ':', error);
                }
            } else {
                console.log('✗ Element not found:', fieldId);
            }
        });
        
        console.log('All datepicker initialization attempts completed.');
    }, 1000);
});
</script>

<?php
include("footer.php");
?>
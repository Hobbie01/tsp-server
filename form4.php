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
                                                    <input class="form-control" type="text" name="d24" id="d42">
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
                                            <input type="hidden" name="table1_id" id="table1_id"
                                                value="<?php echo $_GET["table1_id"];?>">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ซ่อนฟิลด์ทั้งหมดในตอนเริ่มต้น
    hideAllFields();
    
    // Culture section (d1)
    document.getElementById('d1').addEventListener('change', function() {
        toggleCultureFields(this.checked);
        if (this.checked) {
            // แสดง Culture section 2 เมื่อติ๊ก Culture section 1
            toggleCultureSection2(true);
        } else {
            // ซ่อน Culture section 2 และ 3 เมื่อยกเลิก Culture section 1
            toggleCultureSection2(false);
            toggleCultureSection3(false);
        }
    });
    
    // Culture section 2 (d6)
    document.getElementById('d6').addEventListener('change', function() {
        toggleCultureFields2(this.checked);
        if (this.checked) {
            // แสดง Culture section 3 เมื่อติ๊ก Culture section 2
            toggleCultureSection3(true);
        } else {
            // ซ่อน Culture section 3 เมื่อยกเลิก Culture section 2
            toggleCultureSection3(false);
        }
    });
    
    // Culture section 3 (d11)
    document.getElementById('d11').addEventListener('change', function() {
        toggleCultureFields3(this.checked);
    });
    
    // ATB for infection section (d17)
    document.getElementById('d17').addEventListener('change', function() {
        toggleATBFields(this.checked);
    });
    
    // เมื่อกรอก Drug 1 แล้วให้แสดง Drug 2
    document.getElementById('d18').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            toggleATBDrug2(true);
        } else {
            toggleATBDrug2(false);
        }
    });
    
    // เมื่อกรอก Drug 2 แล้วให้แสดง Drug 3
    document.getElementById('d21').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            toggleATBDrug3(true);
        } else {
            toggleATBDrug3(false);
        }
    });
    
    // True infection section (d28)
    document.getElementById('d28').addEventListener('change', function() {
        toggleTrueInfectionFields(this.checked);
    });
});

function hideAllFields() {
    // ซ่อนฟิลด์ Culture section 1
    toggleCultureFields(false);
    
    // ซ่อน Culture section 2 ทั้งหมด (รวมปุ่ม Yes)
    toggleCultureSection2(false);
    
    // ซ่อน Culture section 3 ทั้งหมด (รวมปุ่ม Yes)
    toggleCultureSection3(false);
    
    // ซ่อนฟิลด์ ATB for infection
    toggleATBFields(false);
    toggleATBDrug2(false);
    toggleATBDrug3(false);
    
    // ซ่อนฟิลด์ True infection
    toggleTrueInfectionFields(false);
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
    
    // ซ่อน Drug 2 และ 3 เมื่อปิดใช้งาน ATB
    if (!show) {
        toggleATBDrug2(false);
        toggleATBDrug3(false);
    }
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
        document.getElementById('d42').closest('.row'),  // แถว Drug 3 (d42 = d24)
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
</script>

<?php
include("footer.php");
?>
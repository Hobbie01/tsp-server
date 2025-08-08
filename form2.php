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

// รับพารามิเตอร์จาก URL
$table1_id = isset($_GET['table1_id']) ? $_GET['table1_id'] : '';
$hn = isset($_GET['hn']) ? $_GET['hn'] : '';
$an = isset($_GET['an']) ? $_GET['an'] : '';

$a = "select * from `table1` WHERE table1_id = '".$table1_id."'  Order By table1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){
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
                    <h6>แบบฟอร์มทบทวนปัจจัยการติดเชื้อในระบบทางเดินปัสสาวะที่สัมพันธ์ในการใส่สายสวนปัสสาว(CAUTI)</h6>

                </div>
                <div class="card-body pb-2">

                    <form role="form" action="insert_form2.php" method="post">

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
                                                        <input class="typeahead" type="text" name="b1" id="b1" value="<?= isset($row["a1"]) ? $row["a1"] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">คำนำหน้าชื่อ</label>
                                                        <input class="form-control" type="text" name="pname" id="pname"
                                                        value="<?= isset($row["pname"]) ? $row["pname"] : '' ?>" placeholder="คำนำหน้าชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">ชื่อ</label>
                                                        <input class="form-control" type="text" name="fname"
                                                            id="fname" value="<?= isset($row["fname"]) ? $row["fname"] : '' ?>" placeholder="ชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">นามสกุล</label>
                                                        <input class="form-control" type="text" name="lname" id="lname"
                                                        value="<?= isset($row["lname"]) ? $row["lname"] : '' ?>" placeholder="นามสกุล">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">HN</label>
                                                        <input class="form-control" type="text" name="b3" id="b3"
                                                        value="<?= isset($row["HN"]) ? $row["HN"] : '' ?>"placeholder="HN">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">อายุ(ปี)</label>
                                                        <input class="form-control" type="text" name="b4" id="b4"
                                                        value="<?= isset($row["age"]) ? $row["age"] : '' ?>"placeholder="อายุ(ปี)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">การวินัจฉัยโรค</label>
                                                            <input class="form-control" type="text" name="b5" id="b5"
                                                                placeholder="การวินัจฉัยโรค">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">U/D</label>
                                                            <input class="form-control" type="text" name="b6" id="b6"
                                                                placeholder="U/D">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">แพทย์เจ้าของไข้</label>
                                                            <input class="form-control" type="text" name="b7" id="b7"
                                                                placeholder="แพทย์เจ้าของไข้">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">ภาควิชา</label>
                                                            <input class="form-control" type="text" name="b8" id="b8"
                                                                placeholder="ภาควิชา">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">วันที่รับใหม่</label>
                                                                 <?php
$datetime_a = isset($row['b9']) ? $row['b9'] : '';
$formatted_a = '';
if (!empty($datetime_a)) {
    // แยกวันที่และเวลา
    $datetime_parts = explode(" ", $datetime_a);
    $date_a = isset($datetime_parts[0]) ? $datetime_parts[0] : '';
    $time_a = isset($datetime_parts[1]) ? $datetime_parts[1] : '';
    
    if (!empty($date_a)) {
        // แยกส่วนของปี เดือน วัน
        $date_parts = explode("-", $date_a);
        $year_a = isset($date_parts[0]) ? $date_parts[0] : '';
        $month_a = isset($date_parts[1]) ? $date_parts[1] : '';
        $day_a = isset($date_parts[2]) ? $date_parts[2] : '';
        
        // แปลง ค.ศ. → พ.ศ.
        $year_th_a = !empty($year_a) ? intval($year_a) + 543 : '';
        
        // ตัดเฉพาะ ชั่วโมง:นาที
        $time_short_a = !empty($time_a) ? substr($time_a, 0, 5) : '';
        
        // รวมผลลัพธ์
        $formatted_a = "$day_a-$month_a-$year_th_a";
    }
}
?>
<input class="typeahead" type="text" name="b9" id="b9"  value="<?php echo $formatted_a; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name" class="formcontrol-label">วันที่ใส่
                                                                F/C</label>
                                                                 <?php
$datetime_b = isset($row['b10']) ? $row['b10'] : '';
$formatted_b = '';
if (!empty($datetime_b)) {
    // แยกวันที่และเวลา
    $datetime_parts = explode(" ", $datetime_b);
    $date_b = isset($datetime_parts[0]) ? $datetime_parts[0] : '';
    $time_b = isset($datetime_parts[1]) ? $datetime_parts[1] : '';
    
    if (!empty($date_b)) {
        // แยกส่วนของปี เดือน วัน
        $date_parts = explode("-", $date_b);
        $year_b = isset($date_parts[0]) ? $date_parts[0] : '';
        $month_b = isset($date_parts[1]) ? $date_parts[1] : '';
        $day_b = isset($date_parts[2]) ? $date_parts[2] : '';
        
        // แปลง ค.ศ. → พ.ศ.
        $year_th_b = !empty($year_b) ? intval($year_b) + 543 : '';
        
        // ตัดเฉพาะ ชั่วโมง:นาที
        $time_short_b = !empty($time_b) ? substr($time_b, 0, 5) : '';
        
        // รวมผลลัพธ์
        $formatted_b = "$day_b-$month_b-$year_th_b";
    }
}
?>
<input class="typeahead" type="text" name="b10" id="b10"  value="<?php echo $formatted_b; ?>"/>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">ตำแหน่งผู้ใส่</label>
                                                            <input class="form-control" type="text" name="b11" id="b11"
                                                                placeholder="ตำแหน่งผู้ใส่">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="mb-3 text-sm">สถานที่ใส่สายสวนปัสสาวะ</h6>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                id="b12" name="b12">
                                                            <label class="form-check-label" for="b12">
                                                                รพ.ศรีนครินทร์
                                                            </label>
                                                            <label for="name" class="formcontrol-label">ระบุ</label>
                                                            <input class="form-control" type="text" name="b13" id="b13"
                                                                placeholder="ลายละเอียด">
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                id="b14" name="b14">
                                                            <label class="form-check-label" for="b14">
                                                                ส่งต่อจากรพ.
                                                                <input class="form-control" type="text" name="b15"
                                                                    id="b15" placeholder="ลายละเอียด">
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="name" class="formcontrol-label">ข้อบ่งชื้ในการใส่
                                                            F/C</label>
                                                        <input class="form-control" type="text" name="b16" id="b16"
                                                            placeholder="ข้อบ่งชื้ในการใส่ F/C">
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="name"
                                                                class="formcontrol-label">วันที่ติดเชื้อ</label>

                                                            <div class="input-group date" id="id_2">
                                                                 <?php
$datetime_c = isset($row['b17']) ? $row['b17'] : '';
$formatted_c = '';
if (!empty($datetime_c)) {
    // แยกวันที่และเวลา
    $datetime_parts = explode(" ", $datetime_c);
    $date_c = isset($datetime_parts[0]) ? $datetime_parts[0] : '';
    $time_c = isset($datetime_parts[1]) ? $datetime_parts[1] : '';
    
    if (!empty($date_c)) {
        // แยกส่วนของปี เดือน วัน
        $date_parts = explode("-", $date_c);
        $year_c = isset($date_parts[0]) ? $date_parts[0] : '';
        $month_c = isset($date_parts[1]) ? $date_parts[1] : '';
        $day_c = isset($date_parts[2]) ? $date_parts[2] : '';
        
        // แปลง ค.ศ. → พ.ศ.
        $year_th_c = !empty($year_c) ? intval($year_c) + 543 : '';
        
        // ตัดเฉพาะ ชั่วโมง:นาที
        $time_short_c = !empty($time_c) ? substr($time_c, 0, 5) : '';
        
        // รวมผลลัพธ์
        $formatted_c = "$day_c-$month_c-$year_th_c";
    }
}
?>
<input class="typeahead" type="text" name="date_infect" id="date_infect"  value="<?php echo $formatted_c; ?>"/>
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
                                        <h6 class="mb-3 text-sm">- ปัจจัยที่ด้านผู้ป่วย</h6>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b18"
                                                        name="b18">
                                                    <label class="form-check-label" for="b18">
                                                        อายุเกิน > 60 ปี
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b19"
                                                        name="b19">
                                                    <label class="form-check-label" for="b19">
                                                        เพศหญิง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b20"
                                                        name="b20">
                                                    <label class="form-check-label" for="b20">
                                                        มีโรคทางเดินปัสสาวะ(นิ่ว, bladder obstruction, paraplegia)
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b21"
                                                        name="b21">
                                                    <label class="form-check-label" for="21">
                                                        DM
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b22"
                                                        name="b22">
                                                    <label class="form-check-label" for="b22">
                                                        Alb < 3.5 </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b23"
                                                        name="b23">
                                                    <label class="form-check-label" for="b23">
                                                        CMT/RT/ยากดภูมิ
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b24"
                                                        name="b24">
                                                    <label class="form-check-label" for="b24">
                                                        previous UTI/พบเชื้อ Colonization ในปัสสาวะ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b25"
                                                        name="b25">
                                                    <label class="form-check-label" for="b25">
                                                        มีสาย Ureteral stent
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b26"
                                                        name="b26">
                                                    <label class="form-check-label" for="b26">
                                                        ได้รับ ATB
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b27"
                                                        name="b27">
                                                    <label class="form-check-label" for="b27">
                                                        มีการติดเชื้อในระบบอืนๆ
                                                    </label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" id="b28" name="b28"
                                                        placeholder="ลายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b29"
                                                        name="b29">
                                                    <label class="form-check-label" for="b29">
                                                        อื่นๆ
                                                    </label>
                                                    <input class="form-control" type="text" id="b30" name="b30">
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
                                                    <input class="form-control" type="text" name="b31"
                                                        placeholder="เชื้อก่อโรค">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="name" class="formcontrol-label">เชื้อก่อโรค 2.</label>
                                                <input class="form-control" type="text" id="b32" name="b32"
                                                    placeholder="เชื่อก่อโรค">
                                            </div>
                                            <div class="col-4">
                                                <label for="name" class="formcontrol-label">เชื้อก่อโรค 3.</label>
                                                <input class="form-control" type="text" id="b33" name="b33"
                                                    placeholder="เชื้อก่อโรค">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b34"
                                                        name="b34">
                                                    <label class="form-check-label" for="34">
                                                        พบเชื้อเดียวกับตำแหน่งอื่นในร่างกาย</label>
                                                    <label for="name" class="formcontrol-label">ระบุ</label>
                                                    <input class="form-control" type="text" name="b35" id="b35"
                                                        placeholder="ลายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b36"
                                                        name="b36">
                                                    <label class="form-check-label" for="36">
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
                                                    <input class="form-check-input" type="checkbox" value="1" id="b37"
                                                        name="b37">
                                                    <label class="form-check-label"
                                                        for="37">ใส่สายสวนไม่ถูกต้องตามเทคนิคปราศจากเชื้อ</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b38"
                                                        name="b38">
                                                    <label class="form-check-label" for="b38">ใช้สายสวนปัสสาวะเกิน 6
                                                        วัน</label>

                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b39"
                                                        name="b39">
                                                    <label class="form-check-label"
                                                        for="b39">ไม่ถอดสายสวนหลังหมดข้อบ่งชี้</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b40"
                                                        name="b40">
                                                    <label class="form-check-label" for="40">เปิดวัดปริมาณปัสสาวะบ่อย
                                                        (ถี่กว่าทุก 4 ชท./ครั้ง)</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b41"
                                                        name="b41">
                                                    <label class="form-check-label" for="b41">มีการรบกวนระบบปิด Drainage
                                                        system/สายหรือข้อต่อหลุด/ปลดสาย</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b42"
                                                        name="b42">
                                                    <label class="form-check-label"
                                                        for="b42">มีการปนเปื้อนหลังการขับถ่าย</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b43"
                                                        name="b43">
                                                    <label class="form-check-label"
                                                        for="b43">อุปกรณ์เทปัสสาวะมีการปนเปื้อน/ใช้ร่วมกัน/เทคนิคการเทไม่ถูกต้อง</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 pb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b44"
                                                        name="b44">
                                                    <label class="form-check-label" for="b44">อื่นๆ</label>
                                                    <input class="form-control" type="text" name="b45" id="b45"
                                                        placeholder="ลายละเอียด">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <h6 class="mb-3 text-sm">ผลการประเมินการปฏิบัติ</h6>
                                            <div class="col-6 pb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b46"
                                                        name="b46">
                                                    <label class="form-check-label"
                                                        for="b46">การทำความสะอาดมือก่อน-หลังดูแลผู้ป่วยที่ใส่ F/C
                                                        ร้อยละ</label>
                                                    <input class="form-control" type="text" name="b47" id="b47"
                                                        placeholder="ลายละเอียด">
                                                </div>
                                            </div>

                                            <div class="col-6 pb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b48"
                                                        name="b48">
                                                    <label class="form-check-label" for="b48">ยึดตึงสายสวน
                                                        ร้อยละ</label>
                                                    <input class="form-control" type="text" name="b49" id="b49"
                                                        placeholder="ร้อยละ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b50"
                                                        name="b50">
                                                    <label class="form-check-label" for="b50">สาย F/C ไม่หักพับงอ
                                                        ร้อยละ</label>
                                                    <input class="form-control" type="text" name="b51" id="b51"
                                                        placeholder="ร้อยละ">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" id="b52"
                                                        name="b52">
                                                    <label class="form-check-label" for="b52">อื่นๆ</label>
                                                    <input class="form-control" type="text" name="b53" id="b53"
                                                        placeholder="ลายละเอียด">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div>
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label for="b54">สรุปวิเคราะห์สาเหตุของการติดเชื้อ</label>
                                                    <textarea class="form-control" id="b54" name="b54"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="card">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">ส่วนที่ 2
                                            การแก้ไขสาเหตุและมาตรการปฏิบัติเพื่่อการป้องกันการเกิด CAUTI
                                            ในหอผู้ป่วย</h6>
                                    </div>
                                    <div class="card-body pt-4 p-3">
                                        <div>
                                            <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div>
                                                    <h6 class="mb-3 text-sm">รายละเอียด</h6>
                                                    <div class="row">
                                                        <div class="col-12 pb-3">
                                                            <textarea class="form-control" id="b55" name="b55" rows="3"
                                                                placeholder="ลายละเอียด"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="b56">ลงชื่อ ผู้รายงาน
                                                                (พยาบาลควบคุมการติดเชื้อประจำหอผู้ป่วย)</label>
                                                            <input class="form-control" type="text" name="b56" id="b56">
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
                                                            <textarea class="form-control" id="b57" name="b57" rows="3"
                                                                placeholder="รายละเอียดข้อเสนอแนะ"></textarea>
                                                        </div>
                                                        <div class="col-6 pb-3">
                                                            <textarea class="form-control" id="b58" name="b58" rows="3"
                                                                placeholder="รายละเอียดข้อเสนอแนะ"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">

                                                            <label for="b59">ลงชื่อ (หัวหน้าหอผู้ป่วย) </label>
                                                            <input class="form-control" type="text" name="b59" id="b59"
                                                                placeholder="ลงชื่อ (หัวหน้าหอผู้ป่วย)">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="b60">ลงชื่อ (ICN ผู้รับผิดชอบ) </label>
                                                            <input class="form-control" type="text" name="b60" id="b60"
                                                                placeholder="ลงชื่อ (ICN ผู้รับผิดชอบ)">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group text-center pt-3">
                                                                <input type="hidden" name="table1_id" id="table1_id"
                                                                    value="<?php echo $_GET["table1_id"];?>">
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
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

<script src="js/popper.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="js/moment-with-locales.min.js"></script>

<script src="jquery-ui/external/jquery/jquery.js"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="jquery-ui/jquery.min.js"></script>
<script src="jquery-ui/jquery-ui.min.js"></script>
<script src="jquery-ui/jqueryui_datepicker_thai_min.js?1"></script>

<script type="text/javascript">
$(function(){
     
    $("#b9").datepicker_thai({
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

    $("#b10").datepicker_thai({
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

    $("#b17").datepicker_thai({
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

<?php
include("footer.php");
?>
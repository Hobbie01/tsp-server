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

$a = "select * from`table1` WHERE table1_id = '".$_GET['table1_id']."'  Order By table1_id DESC Limit 1";
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
                    <h6> เพิ่มการวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="edit_form1_sql.php" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">หอผู้ป่วย</label><br>
                                    <input class="typeahead" type="text" name="a1" id="a1" value="<?= $row['a1'] ?>">
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
                                            <?php
$datetime = $row['date_in'];
// แยกวันที่และเวลา
list($date, $time) = explode(" ", $datetime);
// แยกส่วนของปี เดือน วัน
list($year, $month, $day) = explode("-", $date);
// แปลง ค.ศ. → พ.ศ.
$year_th = $year + 543;
// ตัดเฉพาะ ชั่วโมง:นาที
$time_short = substr($time, 0, 5);
// รวมผลลัพธ์
$formatted = "$day-$month-$year_th";// echo $formatted;  // แสดงผล: 09/07/2568 14:30
?>
                                            <label for="name" class="formcontrol-label">วันที่รับใหม่</label>
                                            <input class="typeahead" type="text" name="date_in" id="date_in"
                                                    value="<?php echo $formatted; ?>"/>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่จำหน่วย</label>
<?php
$datetime_a = $row['date_out'];
// แยกวันที่และเวลา
list($date_a, $time_a) = explode(" ", $datetime_a);
// แยกส่วนของปี เดือน วัน
list($year_a, $month_a, $day_a) = explode("-", $date_a);
// แปลง ค.ศ. → พ.ศ.
$year_th_a = $year_a + 543;
// ตัดเฉพาะ ชั่วโมง:นาที
$time_short_a = substr($time_a, 0, 5);
// รวมผลลัพธ์
$formatted_a = "$day_a-$month_a-$year_th_a";// echo $formatted;  // แสดงผล: 09/07/2568 14:30
?>
                                            <input class="typeahead" type="text" name="date_out" id="date_out"
                                                    value="<?php echo $formatted_a ?>"/>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่รับย้าย</label>
                                             <?php
$datetime_b = $row['date_move'];
// แยกวันที่และเวลา
list($date_b, $time_b) = explode(" ", $datetime_b);
// แยกส่วนของปี เดือน วัน
list($year_b, $month_b, $day_b) = explode("-", $date_b);
// แปลง ค.ศ. → พ.ศ.
$year_th_b = $year + 543;
// ตัดเฉพาะ ชั่วโมง:นาที
$time_short_b = substr($time_b, 0, 5);
// รวมผลลัพธ์
$formatted_b = "$day_b-$month_b-$year_th_b";// echo $formatted_b;  // แสดงผล: 09/07/2568 14:30
?>
<input class="typeahead" type="text" name="date_move" id="date_move"  value="<?php echo $formatted_b; ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">จากหอผู้ป่วย</label><br>
                                        <input class="typeahead" type="text" name="from_ward" id="from_ward"
                                            value="<?= $row['from_ward'] ?>">
                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่ติดเชื้อ</label>
                                             <?php
$datetime_c = $row['date_infect'];
// แยกวันที่และเวลา
list($date_c, $time_c) = explode(" ", $datetime_c);
// แยกส่วนของปี เดือน วัน
list($year_c, $month_c, $day_c) = explode("-", $date_c);
// แปลง ค.ศ. → พ.ศ.
$year_th_c = $year + 543;
// ตัดเฉพาะ ชั่วโมง:นาที
$time_short_c = substr($time_c, 0, 5);
// รวมผลลัพธ์
$formatted_c = "$day_c-$month_c-$year_th_c";// echo $formatted_c;  // แสดงผล: 09/07/2568 14:30
?>
<input class="typeahead" type="text" name="date_infect" id="date_infect"  value="<?php echo $formatted_c; ?>"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">หอผู้ป่วยที่ติดเชื้อ</label><br>
                                        <input class="typeahead" type="text" name="ward_infect" id="ward_infect"
                                            value="<?= $row['ward_infect'] ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="formcontrol-label">ภาควิชาที่ติดเชื้อ</label>
                                        <input class="form-control" type="text" name="dep_infect" id="dep_infect"
                                            value="<?= $row['dep_infect'] ?>" placeholder="ภาควิชาที่ติดเชื้อ">
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
                                    <div class="box">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="status1"
                                                name="status1" <?php if($row['status1'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="status1">Yes</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-4 form-inline">
                                                <label for="name" class="formcontrol-label">St&nbsp;&nbsp;&nbsp;</label>
                                                <input class="form-control" type="text" name="st" id="st"
                                                    value="<?= $row['st'] ?>" placeholder="St">
                                            </div>
                                            <div class="col-4 form-inline">
                                                <label for="name"
                                                    class="formcontrol-label">Off&nbsp;&nbsp;&nbsp;</label>
                                                <input class="form-control" type="text" name="off" id="off"
                                                    value="<?= $row['off'] ?>" placeholder="Off">
                                            </div>
                                            <div class="col-4 form-inline">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">

                                        <div class="box">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="status2"
                                                    name="status2" <?php if($row['status2'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="status2">No</label>
                                            </div>



                                            <div class="row">
                                                <div class="col-12-inline">
                                                    <div class="form-group">
                                                        <label for="name" class="formcontrol-label">Other
                                                            instrument&nbsp;&nbsp;&nbsp;</label>
                                                        <input class="form-control" type="text" name="other_in"
                                                            id="other_in" value="<?= $row['other_in'] ?>"
                                                            placeholder="Other instrument">
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

                                                        <input class="form-check-input" type="radio" value="1"
                                                            id="cauti" name="cauti" <?php if($row['cauti'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-check-label" for="a2">
                                                            ผู้ป่วยใส่สายสวนปัสสาวะ > 2 วันปฏิทิน
                                                            หรือหลังถอดสายสวนปัสสาวะ<br>
                                                            ไม่เกิน 2 วันปฏิทิน
                                                            (วันที่ใส่หรือคาสายสวนปัสสาวะให้นับเป็นวันที่
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
                                                    <h6 class="mb-0">เกณฑ์ต้องพิจารณาในการวินิจฉัย Non -CAUTI</h6>
                                                    <input class="form-check-input" type="radio" value="1" id="non_cauti"
                                                        name="non_cauti" <?php if($row['non_cauti'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="a3">
                                                        ผู้ป่วยไม่ได้ใส่สายสวนปัสสาวะ หรือใส่สายสวนปัสสาวะไม่เกิน 2
                                                        วันปฏิทิน<br>
                                                        หรือหลังถอดสายสวนปัสสาวะ > 2 วันปฏิทิน <br>
                                                        (วันที่ใส่หรือคาสายสวนปัสสาวะให้นับเป็นวันที่ 1)
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group text-center">
                                <input type="hidden" name="table1_id" id="table1_id" value="<?= $row['table1_id'] ?>">
                                <button type="submit" class="btn bg-gradient-success px-3 py-2"><i class="fa fa-save">
                                        บันทึก</i></button>
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
});
</script>

<script src="jquery-ui/external/jquery/jquery.js"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="jquery-ui/jquery.min.js"></script>
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

<?php
include("footer.php");
?>
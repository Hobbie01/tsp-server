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

$a = "select * from `tablec1` WHERE tablec1_id = '".$_GET['tablec1_id']."' Order By tablec1_id DESC Limit 1";
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
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เพิ่มการวินิจฉัยภาวะปอดอักเสบ</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="edit_formc1_sql.php" method="post">
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
                                    <input class="form-control" type="text" name="pname" id="pname" value="<?= $row['pname'] ?>"
                                        placeholder="คำนำหน้าชื่อ">
                                        
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">ชื่อ</label>
                                    <input class="form-control" type="text" name="fname" id="fname" value="<?= $row['fname'] ?>"
                                        placeholder="ชื่อ">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">นามสกุล</label>
                                    <input class="form-control" type="text" name="lname" id="lname" value="<?= $row['lname'] ?>"
                                        placeholder="นามสกุล">
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
                                    <input class="form-control" type="text" name="HN" id="HN" value="<?= $row['HN'] ?>"
                                        placeholder="HN">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">AN</label>
                                    <input class="form-control" type="text" name="AN" id="AN" value="<?= $row['AN'] ?>"
                                        placeholder="AN">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">DX</label>
                                    <input class="form-control" type="text" name="DX" id="DX" value="<?= $row['DX'] ?>"
                                        placeholder="DX">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">U/D</label>
                                    <input class="form-control" type="text" name="UD" id="UD" value="<?= $row['UD'] ?>"
                                        placeholder="U/D">
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
                                        <div class="input-group date" id="id_3">
                                            <input type="text" name="date_infect" id="date_infect"
                                                value="<?= $row['date_infect'] ?>" class="form-control"
                                                placeholder="MM/DD/YYYY hh:mm:ss" />
                                        </div>
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
                                <h6>ข้อมูลการใส่เครื่องช่วยหายใจ</h6>
                                <div class="form-status_a5">
                                                  
                                                  <input class="form-status_d5-input" type="radio" value="1"
                                                      id="Yes" name="Yes"  <?php if($row['Yes'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                  <label class="form-status_yes-label" for="status_d5">
                                                      Yes
                                                  </label>
                                              </div>
                                    <div class="box">
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
                                <div class="form-status_yes">
                                    <div class="form-status_a5">
                                                        
                                                        <input class="form-status_d5-input" type="radio" value="2"
                                                            id="No" name="No"  <?php if($row['No'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                        <label class="form-status_d5-label" for="status_d5">No</label>
                                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-12-inline">
                                                <div class="form-group">
                                                    <label for="name" class="formcontrol-label">Other
                                                        instrument&nbsp;&nbsp;&nbsp;</label>
                                                    <input class="form-control" type="text" name="other_in"
                                                        value="<?= $row['other_in'] ?>" id="other_in"
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
                                                <h6 class="mb-2">เกณฑ์พิจารณาในการวินิจฉัยภาวะปอดอักเสบ VAP </h6>
                                                <div class="form-check">

                                                <input class="form-check-input" type="radio" value="1" id="check"
                                                        name="check" <?php if($row['check'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                    <label class="form-check-label" for="a2">
                                                        ผู้ป่วยใส่เครื่องช่วยหายใจ > 2 วันปฏิทิน
                                                        หรือหลังถอดเครื่่องช่วย<br>
                                                        หายใจไม่เกิน 2 วันปฏิทิน<br>
                                                        (*วันที่ใส่หรือถอดเครื่องช่วยหายใจให้นับเป็นวันที่ 1)
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <div class="form-check">
                                                <h6 class="mb-0">เกณฑ์พิจารณาในการวินิจฉัยภาวะปอดอักเสบ HAP</h6>
                                                <input class="form-check-input" type="radio" value="2" id="check"
                                                    name="check" <?php if($row['check'] == "2"){ 
                                            echo " checked"; 
                                            }else{
                                             echo "" ; 
                                            }?>>
                                                <label class="form-check-label" for="a3">
                                                    ผู้ป่วยไม่ได้ใส่เครื่องช่วยหายใจ หรือใส่เครื่องช่วยหายใจไม่เกิน 2
                                                    วันปฏิทิน<br>
                                                    หรือหลังถอดเครื่องช่วยหายใจ > 2 วันปฏิทิน <br>
                                                    (*วันที่ใส่หรือถอดเครื่องช่วยหายใจชให้นับเป็นวันที่ 1)
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group text-center">
                            <input type="hidden" name="tablec1_id" value="<?= $row['tablec1_id'] ?>">
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
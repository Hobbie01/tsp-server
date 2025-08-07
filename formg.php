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
                    <h6> เพิ่มรายงานผู้ป่วยใส่อุปกรณ์พิเศษ (IN4) </h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formg.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="datepickers">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="formcontrol-label">1. วันที่</p>
                                        </div>
                                        <div class="col-10">
                                            <div class="input-group date" id="id_1">
                                                <input type="text" name="g1" id="g1" value="" class="form-control"
                                                    placeholder="MM/DD/YYYY" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <p>2. จำนวนผู้ป่วยรายใหม่</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g2" id="g2">
                            </div>
                            <div class="col-4">
                                <p>ราย</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>3. จำนวนผู้ป่วย</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g3" id="g3">
                            </div>
                            <div class="col-4">
                                <p>ราย</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-2">
                                <p>Urinary Cath</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g4" id="g4">
                            </div>
                            <div class="col-4">
                                <p>ครั้ง</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-2">
                                <p>Central Line</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g5" id="g5">
                            </div>
                            <div class="col-4">
                                <p>ครั้ง</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-2">
                                <p>Ventilator</p>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="g6" id="g6">
                            </div>
                            <div class="col-4">
                                <p>ครั้ง</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>4. ภาควิชา</p>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Surgery</h6><input type="hidden" name="surg" id="surg"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g7" id="g7">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g8" id="g8">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g9" id="g9">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g10" id="g10">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g11" id="g11">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g12" id="g12">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g13" id="g13">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g14" id="g14">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g15" id="g15">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Orthopedic</h6><input type="hidden" name="ortho" id="ortho"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g16" id="g16">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g17" id="g17">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g18" id="g18">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g19" id="g19">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g20" id="g20">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g21" id="g21">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g22" id="g22">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g23" id="g23">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g24" id="g24">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Otorhinolaryngology</h6><input type="hidden" name="otor"
                                            id="otor" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g25" id="g25">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g26" id="g26">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g27" id="g27">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g28" id="g28">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g29" id="g29">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g30" id="g30">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g31" id="g31">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g32" id="g32">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g33" id="g33">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Ophthalmology</h6><input type="hidden" name="oph" id="oph" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g34" id="g34">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g35" id="g35">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g36" id="g36">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g37" id="g37">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g38" id="g38">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g39" id="g39">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g40" id="g40">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g41" id="g41">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g42" id="g42">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Pediatric</h6><input type="hidden" name="ped" id="ped"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g43" id="g43">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g44" id="g44">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g45" id="g45">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g46" id="g46">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g47" id="g47">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g48" id="g48">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g49" id="g49">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g50" id="g50">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g51" id="g51">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Surgery(Dentrisy)</h6><input type="hidden" name="dent"
                                            id="dent" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g52" id="g52">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g53" id="g53">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g54" id="g54">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g55" id="g55">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g56" id="g56">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g57" id="g57">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g58" id="g58">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g59" id="g59">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g60" id="g60">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Obs&Gyn</h6><input type="hidden" name="obs" id="obs"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g61" id="g61">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g62" id="g62">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g63" id="g63">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g64" id="g64">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g65" id="g65">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g66" id="g66">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g67" id="g67">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g68" id="g68">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g69" id="g69">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Department of Medical</h6><input type="hidden" name="med" id="med"
                                            value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g70" id="g70">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g71" id="g71">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g72" id="g72">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g73" id="g73">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g74" id="g74">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g75" id="g75">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g76" id="g76">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g77" id="g77">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g78" id="g78">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Other</h6><input type="hidden" name="other" id="other" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Surgical Wound</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                - C
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g79" id="g79">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CC
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g80" id="g80">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - CO
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="g81" id="g81">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                - D
                                            </div>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="g82" id="g82">
                                            </div>
                                            <div class="col-4">
                                                ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>Procedure of Surgical Wound</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - CSEC
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g83" id="g83">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - EPI
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g84" id="g84">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - KT
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g85" id="g85">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - APPE
                                                </div>
                                                <div class="col-4">

                                                    <input class="form-control" type="text" name="g86" id="g86">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    - VPS
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="g87" id="g87">
                                                </div>
                                                <div class="col-4">
                                                    ครั้ง
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">


                            </div>

                        </div>

                        <div class="row mt-3">
                        <div class="row">
                            <div class="col-2">
                                <label class="form-check-label" for="g88">
                                    <h6>ผู้รายงาน</h6>
                                </label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="g88" id="g88" placeholder="ผู้รายงาน">
                            </div>
                        </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                            class="fa fa-save">
                                            บันทึก</i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
</div>

<script src="calendar-09/js/jquery.min.js"></script>
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<?php
include("footer.php");
?>
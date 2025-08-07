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

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เกณฑ์พิจารณาในการวินิจฉัย CLABSI (ต่อ)</h6>
                    <h6>Laboratory-Confirmed Bloodstram infection (LCBI)</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insert_formb3.php" method="post">

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>LCBI 1 :</b> in any age patient</h6>
                                        <p>มีอาการและอาการแสดงทั่วไปครบถ้วนทั้ง 2 ข้อ ต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c1" name="c1">
                                            <label class="form-check-label" for="c1">พบเชื่อที่เป็น Pathogen ในกระแสเลือด &ge; 1 specimen</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c2" name="c2">
                                            <label class="form-check-label" for="c2">เชื้อที่พบไม่สัมพันธ์กับการติดเชื้อในตำแหน่งอื่น</label>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <b>และ</b><br>
                                            <input class="form-check-input" type="checkbox" value="1" id="c3" name="c3">
                                            <label class="form-check-label" for="c3">เชื้อที่พบไม่สัมพันธ์กับการติดเชื้อ ในตำแหน่งอื่น</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>LCBI 2 :</b> in any age patient</h6>
                                        <p>มีอาการและอาการแสดงทั่วไปครบถ้วนทั้ง 3 ข้อ ต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c4" name="c4">
                                            <label class="form-check-label" for="c4">มีอาการข้อใดข้อหนึ่งดังต่อไปนี้ : ไข้ ( BT > 38 &#8451;) /หนาวสั่น / ความดันโลหิตต่่ำ</label>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c5" name="c5">
                                            <label class="form-check-label" for="c5">พบเชื้อที่เป็นเชื้อประจำถิ่น หรือเชื้อ Common Commensal ขึ้นในเลือด &ge; 2 specimen</label>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c6" name="c6">
                                            <label class="form-check-label" for="c6">ไม่สัมพันธ์กับการติดเชื้อที่ตำแหน่งอื่นๆ ในร่างกาย</label>
                                        </div>
                                    </div>
                               </div>

                            </div>
                        </div>

                        
                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>LCBI 3 :</b> in patient &#8804; 1 year</h6>
                                        <p>ผู้ป่วยอายุ &#8804; 1 ปี มีผลตรวจเพาะเชื้อในเลือด อาการและอาการแสดง ครบ 3 ข้อ ต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c8" name="c8">
                                            <label class="form-check-label" for="c8">มีอาการข้อใดข้อหนึ่งดังต่อไปนี้ : ไข้ ( BT > 38 &#8451;) /Hypothermia ( BT < 36 &#8451;) / Apnea / Bradycardia</label>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c9" name="c9">
                                            <label class="form-check-label" for="c9">มีผลตรวจเพาะเชื้อในเลือด 2 อย่าง ต่อไปนี้ : พบเชื้อที่เป็น Common Commensal &#8807; 2 specimens</label>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c10" name="c10">
                                            <label class="form-check-label" for="c10">ไม่สัมพันธ์กับการติดเชื้อที่ตำแหน่งอื่นๆ ในร่างกาย</label>
                                        </div>
                                    </div>
                               </div>
                                
                            </div>
                        </div>


                       
                        

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                <input type="hidden" name="tableb1_id" id="tableb1_id" value="<?php echo $_GET["tableb1_id"];?>">
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                            class="fa fa-save"> บันทึก</i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
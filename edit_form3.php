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
                    <h6> เพิ่มการวินิจฉัยการติดเชื้อในระบบทางเดินปัสสาวะ(ต่อ)</h6>
                </div>
                <div class="card-body pb-2">
                    <?php
$a = " select * from `table1` WHERE table1_id = '".$_GET['table1_id']."'  Order By table1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){


$b = " select * from `table3` WHERE table1_id = '".$_GET['table1_id']."' Order By table1_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
                    ?>
                    <form role="form" action="edit_form3_sql.php" method="post">

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>SUTI 1a : CAUTI</b> in any age patient</h6>
                                        <p>มีอาการและอาการแสดงอย่างน้อย 1 ข้อต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c1" name="c1" <?php if($row_b['c1'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c1">มีไข้ (>38 &#8451;)</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c2" name="c2" <?php if($row_b['c2'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c2">กดเจ็บบริเวณหัวเหน่า</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c3" name="c3" <?php if($row_b['c3'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c3">เจ็บหรือกดบริเวณบั้นเอว
                                                (CVA)*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c4" name="c4"<?php if($row_b['c4'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c4">กลั้นปัสสาวะไม่ได้**</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c5" name="c5"<?php if($row_b['c5'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c5">ปัสสาวะบ่อย**</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c6" name="c6" <?php if($row_b['c6'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c6">ปัสสาวะขัด**</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-danger">หมายเหตุ</p>
                                            <p>* ต้องไม่เกิดจากสาเหตุอื่น</p>
                                            <p>**
                                                ไม่ใช้อาการเหล่านี้ในการเหล่านี้ในการวินิจฉัยผู้ป่วยที่ยังมีสายสวนปัสสาวะ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>SUTI 1a : Non CAUTI</b> in any age patient</h6>
                                        <p>มีอาการและอาการแสดงอย่างน้อย 1 ข้อต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c7" name="c7" <?php if($row_b['c7'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c7">มีไข้ (>38 &#8451;)</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c8" name="c8" <?php if($row_b['c8'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c8">กดเจ็บบริเวณหัวเหน่า</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c9" name="c9" <?php if($row_b['c9'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c9">เจ็บหรือกดบริเวณบั้นเอว
                                                (CVA)*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c10"
                                                name="c10" <?php if($row_b['c10'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c10">กลั้นปัสสาวะไม่ได้**</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c11"
                                                name="c11" <?php if($row_b['c11'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c11">ปัสสาวะบ่อย**</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c12"
                                                name="c12" <?php if($row_b['c12'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c12">ปัสสาวะขัด**</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-danger">หมายเหตุ</p>
                                            <p>* ต้องไม่เกิดจากสาเหตุอื่น</p>
                                            <p>**
                                                ไม่ใช้อาการเหล่านี้ในการเหล่านี้ในการวินิจฉัยผู้ป่วยที่ยังมีสายสวนปัสสาวะ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>SUTI 2 : CAUTI or Non CAUTI</b> in patient &le; 1
                                            year</h6>
                                        <p>มีอาการและอาการแสดงอย่างน้อย 1 ข้อต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c13"
                                                name="c13" <?php if($row_b['c13'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c13">มีไข้ (>38 &#8451;)</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c14"
                                                name="c14" <?php if($row_b['c14'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c14">hypothermia (>36 &#8451;)</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c15"
                                                name="c15" <?php if($row_b['c15'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c15">หยุดหายใจ*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c16"
                                                name="c16" <?php if($row_b['c16'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c16">หัวใจเต้นช้า*</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c17"
                                                name="c17" <?php if($row_b['c17'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c17">ซึม*</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c18"
                                                name="c18" <?php if($row_b['c18'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c18">อาเจียน*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c19"
                                                name="c19" <?php if($row_b['c19'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c19">กดเจ็บบริเวณหัวเหน่า*</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c20"
                                                name="c20" <?php if($row_b['c20'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label"
                                                for="c20"><b>และมีผลตรวจเพาะเชื้อในปัสสาวะพบเชื้อไม่เกิน 2 ชนิด
                                                    และมีเชื้ออย่างน้อย 1 ชนิดทีมีปริมาน &#8805; 10<sup>5
                                                        โคโลนี/มล.</sup></b></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h6 class="mb-3 text-sm">Asymptomatic Bactermic Urinary Tract Infection (ABuTI)
                                            in any age patient</h6>
                                    </div>
                                    <div class="col-12">
                                        <p>มีอาการและอาการแสดงทั่วไปครบถ้วนทั้ง 3 ข้อ ต่อไปนี้</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c21"
                                                name="c21" <?php if($row_b['c21'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c21">ผู้ป่วยคาหรือไม่คาสายสวนปัสสาวะ
                                                ไม่มีอาการเข้าเกณฑ์การวินิจฉัย SUTI</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c22"
                                                name="c22" <?php if($row_b['c22'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label"
                                                for="c22">มีผลตรวจเพาะเชื้อในปัสสาวะเชื้อไม่เกิน 2 ชนิด
                                                และมีเชื้ออย่างน้อย 1 ชนิดที่มีปริมาณ &#8805; 10<sup>5
                                                    โคโลนี/มล.</sup></label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c23"
                                                name="c23" <?php if($row_b['c23'] == "1"){ 
                                            echo " checked"; 
                                            }else{
                                            echo "" ; 
                                            }?>>
                                            <label class="form-check-label" for="c23">ตรวจพบเชื้อในเลือด
                                                โดยต้องมีเชื้อที่ตรวจพบในเลือดอย่างน้อย 1
                                                ชนิดที่ตรงกับเชื้อที่พบในปัสสาวะซึ่งมีปริมาน &#8805; 10<sup>5
                                                    โคโลนี/มล.</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <p>โดยเกณฑ์วินิจฉัย ABUTI ทั้งหมดต้องพบอยู่ในช่วงระยะเวลา 7 วัน</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="table3_id" value="<?= $row_b['table3_id'] ?>">
                                    <input type="hidden" name="table1_id" id="table1_id"
                                        value="<?php echo $_GET["table1_id"];?>">
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
}
}
 ?>
<?php
include("footer.php");
?>
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
                    <h6>การวินิจฉัยการติดเชื้อปอดอักเสบ</h6>
                </div>
                <div class="card-body pb-2">
<?php
$a = "select * from `tablec1` WHERE tablec1_id = '".$_GET['tablec1_id']."'  Order By tablec1_id DESC Limit 1";
$aQuery = mysqli_query($objCon,$a);
while($row = mysqli_fetch_array($aQuery)){

$b = "select * from `tablec3` WHERE tablec1_id = '".$_GET['tablec1_id']."' Order By tablec1_id DESC Limit 1";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    ?>                    
                    <form role="form" action="edit_formc3_sql.php" method="post">

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>เกณฑ์ภาพรังสีทรวงอก</b></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>ผลการอ่านภาพรังสีทรวงอกตั้งแต่ 2 ภาพขึ้นไป พบความผิดปกติอย่างน้อย 1 ข้อต่อไปนี้</p>
                                    <p>new or progressive</p>

                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c1" name="c1" <?php if($row_b['c1'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c1">infiltration</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c2" name="c2" <?php if($row_b['c2'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c2">cavitation</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c3" name="c3" <?php if($row_b['c3'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c3">consolidation</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c4" name="c4" <?php if($row_b['c4'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c4">pneumatoceles (ในเด็กอายุ &#8804; 1 ปี)</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c5" name="c5">
                                            <label class="form-check-label" for="c5">ปัสสาวะบ่อย**</label>
                                        </div> -->
                                    </div>
                                    <div class="col-4">
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c6" name="c6">
                                            <label class="form-check-label" for="c6">ปัสสาวะขัด**</label>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-danger">หมายเหตุ</p>
                                            <p>ในผู้ป่วยที่ไม่มีโรคหัวใจหรือโรคปอดอยู่เดิม (เช่น respiratory distress syndrome, bonchopulmonary dysplasia,<br>
                                            pulmonary edema, หรือ chronic obstructive pulmonnary disease) ภาพถ่ายรังสีภาพเดียวเพียงพอที่จะประกอบเกณฑ์ข้อนี้</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-3 text-sm"><b>เกณฑ์อาการ, แสดงทางคลินิกและการตรวจทางห้องปฏิบัติการ</b></h6>
                                        <p>สำหรับผุ้ป่วยทั่วไป อาการและอาการแสดงทั่วไปอย่างน้อย 1 ข้อ ต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c5" name="c5" <?php if($row_b['c5'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c5">มีไข้ (>38 &#8451; หรือ 100.4 &#8457;)</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c6"
                                                name="c6" <?php if($row_b['c6'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c6">ภาวะ leucopenia (WBC &#8804; 4,000 / mm<sup>3</sup>) หรือ leukocytosis (WBC &#8805; 12,000 / mm<sup>3</sup>)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c7"
                                                name="c7" <?php if($row_b['c7'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c7">ระดับความรู้สึกตัวผิดปกติในผู้ป่วยที่มีอายุ &#8805; 70 ปี โดยไม่พบสาเหตุอื่น</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>และ อาการและอาการแสดงทางเดินหายใจอย่างน้อย 2 ข้อ ต่อไปนี้</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c8"
                                                name="c8" <?php if($row_b['c8'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c8">เริ่มมีเสมหะเป็นหนองหรือลักษณะเสมหะเปลี่ยนไป หรือเสมหะมีมากขึ้น หรือต้องดูดเสมหะบ่อยขึ้น</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c9"
                                                name="c9" <?php if($row_b['c9'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c9">เริ่มไอ หรือไอรุนแรงขึ้น หรือหายใจลำบาก หรือหายใจเร็ว</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c10"
                                                name="c10" <?php if($row_b['c10'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c10">ตรวจพบเชื้อ rales หรือ bronchial breath sound</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c11"
                                                name="c11" <?php if($row_b['c11'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c11">การแลกเปลี่ยนอากาศเลวลง (worsening gas exchange) ได้แก่ O<sub>2</sub> desaturation เช่น อัตราส่วน PaO<sub>2</sub>/FiO<sub>2</sub> <br>
                                            หรือ การเพิ่ม O<sub>2</sub> requirement หรือ ventilation demand</label>
                                        </div>
                                    </div>
                                </div>                                                                                                                                                      


                            </div>
                        </div>

                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        
                                        <p>สำหรับผู้ป่วยอายุ &#8804; 1 ปี</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c12"
                                                name="c12" <?php if($row_b['c12'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c12">การแลกเปลี่ยนอากาศเลวลง (worsening gas exchange) ได้แก่ O<sub>2</sub> desaturation เช่น pulse oximetry < 94% <br>
                                        หรือ การเพิ่ม O<sub>2</sub> requirement หรือ ventilation demand</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        
                                        <p>และ อย่างน้อย 3 ข้อ ต่อไปนี้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c13"
                                                name="c13" <?php if($row_b['c13'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c13">อุณหภูมิไม่คงที่</label>
                                        </div>
                                    </div>
                                </div>    

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c14"
                                                name="c14" <?php if($row_b['c14'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c14">ภาวะ leucopenia (WBC &#8804; 4,000 / mm<sup>3</sup>) หรือ leukocytosis (WBC &ge; 15,000 / mm<sup>3</sup>) และ left shift ( &ge; 10% band forms)</label>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c15"
                                                name="c15" <?php if($row_b['c15'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c15">เริ่มมีเสมหะเป็นหนองหรือลักษณะเสมหะเปลี่ยนไป หรือเสมหะมีมากขึ้นหรือต้องดูดเสมหะบ่อยขึ้น</label>
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c16"
                                                name="c16" <?php if($row_b['c16'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c16">มีภาวะหยุดหายใจ หายใจเร็ว จมูกบานร่วมกับอกบุ๋ม</label>
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c17"
                                                name="c17" <?php if($row_b['c17'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c17">Wheezing, rales, หรือ rhonchi</label>
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c18"
                                                name="c18" <?php if($row_b['c18'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c18">ไอ</label>
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
                                            <label class="form-check-label" for="c19">หัวใจเต้นช้ำ (&lt;100 ครั้ง/นาที) หรือหัวใจเต้นเร็ว(	&gt; 170 ครั้ง/นาที)</label>
                                        </div>
                                    </div>
                                </div>                                  
                                

                            </div>
                        </div>


                        <div class="border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>สำหรับผู้ป่วยเด็ก  &gt;  1 ถึง 12 ปี อาการและอาการแสดงอย่างน้อย 3 ข้อ ต่อไปนี้</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c20"
                                                name="c20" <?php if($row_b['c20'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c20">มีไข้ (อุณหภูมิ > 38 &#8451; หรือ 100.4 &#8457;) หรือ อุณหภูมิต่ำ (<36.0&#8451; หรือ < 96. 8 &#8457;)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c21"
                                                name="c21" <?php if($row_b['c21'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c21">ภาวะ leucopenia (WBC &#8804; 4,000 / mm<sup>3</sup>) หรือ leukocytosis (WBC &#8805; 15,000 / mm<sup>3</sup>) </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c22"
                                                name="c22" <?php if($row_b['c23'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c22">เริ่มมีเสมหะเป็นหนองหรือลักษณะเสมหะเปลี่ยนไป หรือเสมหะมีมากขึ้นหรือต้องดูดเสมหะบ่อยขึ้น</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c23"
                                                name="c23" <?php if($row_b['c23'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c23">เริ่มไอหรือไอรุนแรงขึ้น หรือหายใจลำบาก หยุดหายใจ หรือหายใจเร็ว</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c24"
                                                name="c24" <?php if($row_b['c24'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c24">พบ rales หรือ bronchial breath sound</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="c25"
                                                name="c25" <?php if($row_b['c25'] == "1"){ 
echo " checked"; 
}else{
echo "" ; 
}?>>
                                            <label class="form-check-label" for="c25">การแลกเปลี่ยนอากาศเลวลง (worsening gas exchange) ได้แก่ O<sub>2</sub> desaturation เช่น pulse oximetry < 94% <br>
                                            หรือ การเพิ่ม O<sub>2</sub> requirement หรือ ventilation demand</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        



                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                <input type="hidden" name="tablec3_id" id="tablec3_id" value="<?php echo $row_b['tablec3_id'];?>">
                                <input type="hidden" name="tablec1_id" id="tablec1_id" value="<?php echo $row_b['tablec1_id'];?>">
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i
                                            class="fa fa-save"> บันทึก</i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } 
}
?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
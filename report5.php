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

$input_from = $_POST["input_from"];
$input_to = $_POST["input_to"];

$datefrom = $input_from;
$date=date_create($datefrom);
$d_from = date_format($date,"d");
$m_from = date_format($date,"m");
$y_from = date_format($date,"Y");



?>





<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>รายงานตั้งแต่วันที่ <?= $input_from; ?> ถึงวันที่ <?= $input_to; ?> </h3>
                            <h5>(จำแนกตามภาควิชา)</h5>

                        </div>
                        <div class="col-2">
                            <div class="float-right"><a href="export_excel3.php?input_from=<?= $input_from?>&input_to=<?= $input_to?>" class="btn btn-primary btn-lg active" role="button"
                                    aria-pressed="true">Export</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                        รายการ</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Surg</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Ortho</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        ENT</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Oph</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Obs&Gyn</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Ped</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Dentrisy</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Med</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Other</th>
                                    <th class="text-secondary opacity-7">จำนวน</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php


$arr_b = array();
$b = "select * from tableg where surg = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    $arr_b [ ] = $row_b["g7"]; 
    //echo $row_b["g7"];
}
$bb = array_sum($arr_b);

$arr_c = array();
$c = "select * from tableg where ortho = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$cQuery = mysqli_query($objCon,$c);
while($row_c = mysqli_fetch_array($cQuery)){
    $arr_c [ ] = $row_c["g16"]; 
    //echo $row_b["g7"];
}
$cc = array_sum($arr_c);

$arr_d = array();
$d = "select * from tableg where otor = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$dQuery = mysqli_query($objCon,$d);
while($row_d = mysqli_fetch_array($dQuery)){
    $arr_d [ ] = $row_d["g25"]; 
    //echo $row_b["g7"];
}
$dd = array_sum($arr_d);


$arr_e = array();
$e = "select * from tableg where oph = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$eQuery = mysqli_query($objCon,$e);
while($row_e = mysqli_fetch_array($eQuery)){
    $arr_e [ ] = $row_e["g34"]; 
    //echo $row_b["g7"];
}
$ee = array_sum($arr_e);

$arr_f = array();
$f = "select * from tableg where obs = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$fQuery = mysqli_query($objCon,$f);
while($row_f = mysqli_fetch_array($fQuery)){
    $arr_f [ ] = $row_f["g61"]; 
    //echo $row_b["g61"];
}
$ff = array_sum($arr_f);

$arr_g = array();
$g = "select * from tableg where ped = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$gQuery = mysqli_query($objCon,$g);
while($row_g = mysqli_fetch_array($gQuery)){
    $arr_g [ ] = $row_g["g43"]; 
    //echo $row_b["g7"];
}
$gg = array_sum($arr_g);

$arr_h = array();
$h = "select * from tableg where dent = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$hQuery = mysqli_query($objCon,$h);
while($row_h = mysqli_fetch_array($hQuery)){
    $arr_h [ ] = $row_h["g52"]; 
    //echo $row_b["g7"];
}
$hh = array_sum($arr_h);

$arr_i = array();
$i = "select * from tableg where med = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$iQuery = mysqli_query($objCon,$i);
while($row_i = mysqli_fetch_array($iQuery)){
    $arr_i [ ] = $row_i["g70"]; 
    //echo $row_b["g7"];
}
$ii = array_sum($arr_i);

$arr_j = array();
$j = "select * from tableg where other = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$jQuery = mysqli_query($objCon,$j);
while($row_j = mysqli_fetch_array($jQuery)){
    $arr_j [ ] = $row_j["g79"]; 
    //echo $row_b["g7"];
}
$jj = array_sum($arr_j);

$sumall = $bb+$cc+$dd+$ee+$ff+$gg+$hh+$ii+$jj; 



$arr_bb = array();
$b = "select * from tableg where surg = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    $arr_bb [ ] = $row_b["g8"]; 
    //echo $row_b["g7"];
}
$b_bb = array_sum($arr_bb);

$arr_bc = array();
$c = "select * from tableg where ortho = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$cQuery = mysqli_query($objCon,$c);
while($row_c = mysqli_fetch_array($cQuery)){
    $arr_bc [ ] = $row_c["g17"]; 
    //echo $row_b["g7"];
}
$b_cc = array_sum($arr_bc);

$arr_bd = array();
$d = "select * from tableg where otor = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$dQuery = mysqli_query($objCon,$d);
while($row_d = mysqli_fetch_array($dQuery)){
    $arr_bd [ ] = $row_d["g26"]; 
    //echo $row_b["g7"];
}
$b_dd = array_sum($arr_bd);


$arr_be = array();
$e = "select * from tableg where oph = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$eQuery = mysqli_query($objCon,$e);
while($row_e = mysqli_fetch_array($eQuery)){
    $arr_be [ ] = $row_e["g35"]; 
    //echo $row_b["g7"];
}
$b_ee = array_sum($arr_be);

$arr_bf = array();
$f = "select * from tableg where obs = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$fQuery = mysqli_query($objCon,$f);
while($row_f = mysqli_fetch_array($fQuery)){
    $arr_bf [ ] = $row_f["g62"]; 
    //echo $row_b["g61"];
}
$b_ff = array_sum($arr_bf);

$arr_bg = array();
$g = "select * from tableg where ped = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$gQuery = mysqli_query($objCon,$g);
while($row_g = mysqli_fetch_array($gQuery)){
    $arr_bg [ ] = $row_g["g44"]; 
    //echo $row_b["g7"];
}
$b_gg = array_sum($arr_bg);

$arr_bh = array();
$h = "select * from tableg where dent = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$hQuery = mysqli_query($objCon,$h);
while($row_h = mysqli_fetch_array($hQuery)){
    $arr_bh [ ] = $row_h["g53"]; 
    //echo $row_b["g7"];
}
$b_hh = array_sum($arr_bh);

$arr_bi = array();
$i = "select * from tableg where med = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$iQuery = mysqli_query($objCon,$i);
while($row_i = mysqli_fetch_array($iQuery)){
    $arr_bi [ ] = $row_i["g71"]; 
    //echo $row_b["g7"];
}
$b_ii = array_sum($arr_bi);

$arr_bj = array();
$j = "select * from tableg where other = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$jQuery = mysqli_query($objCon,$j);
while($row_j = mysqli_fetch_array($jQuery)){
    $arr_bj [ ] = $row_j["g80"]; 
    //echo $row_b["g7"];
}
$b_jj = array_sum($arr_bj);

$sumallb = $b_bb+$b_cc+$b_dd+$b_ee+$b_ff+$b_gg+$b_hh+$b_ii+$b_jj; 


////////////////////  อัตราการติดเชื้อของแผลผ่าตัดสะอาด (ต่อ 100แผลผ่าตัด)///////////////////////////



$arr_cb = array();
$b = "select * from tableg where surg = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    $arr_cb [ ] = $row_b["g9"]; 
    //echo $row_b["g7"];
}
$c_bb = array_sum($arr_cb);

$arr_cc = array();
$c = "select * from tableg where ortho = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$cQuery = mysqli_query($objCon,$c);
while($row_c = mysqli_fetch_array($cQuery)){
    $arr_cc [ ] = $row_c["g18"]; 
    //echo $row_b["g7"];
}
$c_cc = array_sum($arr_cc);

$arr_cd = array();
$d = "select * from tableg where otor = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$dQuery = mysqli_query($objCon,$d);
while($row_d = mysqli_fetch_array($dQuery)){
    $arr_cd [ ] = $row_d["g27"]; 
    //echo $row_b["g7"];
}
$c_dd = array_sum($arr_cd);


$arr_ce = array();
$e = "select * from tableg where oph = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$eQuery = mysqli_query($objCon,$e);
while($row_e = mysqli_fetch_array($eQuery)){
    $arr_ce [ ] = $row_e["g36"]; 
    //echo $row_b["g7"];
}
$c_ee = array_sum($arr_ce);

$arr_cf = array();
$f = "select * from tableg where obs = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$fQuery = mysqli_query($objCon,$f);
while($row_f = mysqli_fetch_array($fQuery)){
    $arr_cf [ ] = $row_f["g63"]; 
    //echo $row_b["g61"];
}
$c_ff = array_sum($arr_cf);

$arr_cg = array();
$g = "select * from tableg where ped = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$gQuery = mysqli_query($objCon,$g);
while($row_g = mysqli_fetch_array($gQuery)){
    $arr_cg [ ] = $row_g["g45"]; 
    //echo $row_b["g7"];
}
$c_gg = array_sum($arr_cg);

$arr_ch = array();
$h = "select * from tableg where dent = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$hQuery = mysqli_query($objCon,$h);
while($row_h = mysqli_fetch_array($hQuery)){
    $arr_ch [ ] = $row_h["g54"]; 
    //echo $row_b["g7"];
}
$c_hh = array_sum($arr_ch);

$arr_ci = array();
$i = "select * from tableg where med = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$iQuery = mysqli_query($objCon,$i);
while($row_i = mysqli_fetch_array($iQuery)){
    $arr_ci [ ] = $row_i["g72"]; 
    //echo $row_b["g7"];
}
$c_ii = array_sum($arr_ci);

$arr_cj = array();
$j = "select * from tableg where other = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$jQuery = mysqli_query($objCon,$j);
while($row_j = mysqli_fetch_array($jQuery)){
    $arr_cj [ ] = $row_j["g81"]; 
    //echo $row_b["g7"];
}
$c_jj = array_sum($arr_cj);

$sumallc = $c_bb+$c_cc+$c_dd+$c_ee+$c_ff+$c_gg+$c_hh+$c_ii+$c_jj; 



////////////////////  อัตราการติดเชื้อของแผลผ่าตัดสะอาด (ต่อ 100แผลผ่าตัด)///////////////////////////



$arr_db = array();
$b = "select * from tableg where surg = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$bQuery = mysqli_query($objCon,$b);
while($row_b = mysqli_fetch_array($bQuery)){
    $arr_db [ ] = $row_b["g10"]; 
    //echo $row_b["g7"];
}
$d_bb = array_sum($arr_db);

$arr_dc = array();
$c = "select * from tableg where ortho = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$cQuery = mysqli_query($objCon,$c);
while($row_c = mysqli_fetch_array($cQuery)){
    $arr_dc [ ] = $row_c["g19"]; 
    //echo $row_b["g7"];
}
$d_cc = array_sum($arr_dc);

$arr_dd = array();
$d = "select * from tableg where otor = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$dQuery = mysqli_query($objCon,$d);
while($row_d = mysqli_fetch_array($dQuery)){
    $arr_dd [ ] = $row_d["g28"]; 
    //echo $row_b["g7"];
}
$d_dd = array_sum($arr_dd);


$arr_de = array();
$e = "select * from tableg where oph = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$eQuery = mysqli_query($objCon,$e);
while($row_e = mysqli_fetch_array($eQuery)){
    $arr_de [ ] = $row_e["g37"]; 
    //echo $row_b["g7"];
}
$d_ee = array_sum($arr_de);

$arr_df = array();
$f = "select * from tableg where obs = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$fQuery = mysqli_query($objCon,$f);
while($row_f = mysqli_fetch_array($fQuery)){
    $arr_df [ ] = $row_f["g64"]; 
    //echo $row_b["g61"];
}
$d_ff = array_sum($arr_df);

$arr_dg = array();
$g = "select * from tableg where ped = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$gQuery = mysqli_query($objCon,$g);
while($row_g = mysqli_fetch_array($gQuery)){
    $arr_dg [ ] = $row_g["g46"]; 
    //echo $row_b["g7"];
}
$d_gg = array_sum($arr_dg);

$arr_dh = array();
$h = "select * from tableg where dent = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$hQuery = mysqli_query($objCon,$h);
while($row_h = mysqli_fetch_array($hQuery)){
    $arr_dh [ ] = $row_h["g55"]; 
    //echo $row_b["g7"];
}
$d_hh = array_sum($arr_dh);

$arr_di = array();
$i = "select * from tableg where med = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$iQuery = mysqli_query($objCon,$i);
while($row_i = mysqli_fetch_array($iQuery)){
    $arr_di [ ] = $row_i["g73"]; 
    //echo $row_b["g7"];
}
$d_ii = array_sum($arr_di);

$arr_dj = array();
$j = "select * from tableg where other = '1' AND timestamp between '$input_from 00:00:00' and '$input_to 23:59:59' ";
$jQuery = mysqli_query($objCon,$j);
while($row_j = mysqli_fetch_array($jQuery)){
    $arr_dj [ ] = $row_j["g82"]; 
    //echo $row_b["g7"];
}
$d_jj = array_sum($arr_dj);

$sumalld = $d_bb+$d_cc+$d_dd+$d_ee+$d_ff+$d_gg+$d_hh+$d_ii+$d_jj; 
?>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">รวม</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ab = $bb+$b_bb+$c_bb+$d_bb;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ac = $cc+$b_cc+$c_cc+$d_cc;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ad = $dd+$b_dd+$c_dd+$d_dd;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ae = $ee+$b_ee+$c_ee+$d_ee;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_af = $ff+$b_ff+$c_ff+$d_ff;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ag = $gg+$b_gg+$c_gg+$d_gg;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ah = $hh+$b_hh+$c_hh+$d_hh;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_ai = $ii+$b_ii+$c_ii+$d_ii;?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $sum_aj = $jj+$b_jj+$c_jj+$d_jj;?>
                                        </p>
                                    </td>

                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?=$s_all = $sum_ab+$sum_ac+$sum_ad+$sum_ae+$sum_af+$sum_ag+$sum_ah+$sum_ai+$sum_aj?>
                                        </p>
                                    </td>
                                </tr>



                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">* อัตราการติดเชื้อของแผล<br>ผ่าตัด (ต่อ 100
                                                    แผลผ่าตัด)</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $bb ?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $cc ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $dd ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $ee ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $ff ?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $gg ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $hh ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $ii ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?= $jj ?> </p>
                                    </td>

                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $sumall?></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">* อัตราการติดเชื้อของแผล<br>ผ่าตัดสะอาด (ต่อ
                                                    100<br> แผลผ่าตัด)</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_bb ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_cc ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_dd ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_ee ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_ff ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_gg ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_hh ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_ii ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $b_jj ?></p>
                                    </td>

                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $sumallb?></p>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">* อัตราการติดเชื้อของแผล<br>ผ่าตัดสะอาดปนเปื้อน
                                                    (ต่อ
                                                    100 <br> แผลผ่าตัด)</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_bb ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_cc ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_dd ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_ee ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_ff ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_gg ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_hh ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_ii ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $c_jj ?></p>
                                    </td>

                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $sumallc?></p>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">* อัตราการติดเชื้อของแผล<br>ผ่าตัดปนเปื้อน (ต่อ
                                                    100 แผล<br>ผ่าตัด) </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_bb ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_cc ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_dd ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_ee ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_ff ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_gg ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_hh ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_ii ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $d_jj ?></p>
                                    </td>

                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center"><?= $sumalld?></p>
                                    </td>
                                </tr>



                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">* อัตราการติดเชื้อของแผล<br>ผ่าตัดคลอดทางหน้าท้อง</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>

                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center"></p>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>
<?php
include("footer.php");
?>
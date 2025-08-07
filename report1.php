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


///// รับค่าแค่เดือนและปี



$month = $_POST["monthSelect"];
$year = $_POST["yearSelect"];



// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}

?>


<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-10">
                            <h3>รายงานผู้ป่วยใส่อุปกรณ์พิเศษ</h3>

                            <h5><?php echo $month."-".$year; ?></h5>
                           
                        </div>
                        <div class="col-2">
                            <div class="float-right"><a href="export_excel1.php?month=<?= $month?>&year=<?= $year?>" class="btn btn-primary btn-lg active" role="button"
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
                                    <th rowspan="2"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                        วันที่</th>
                                    <th rowspan="2"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        ผู้ป่วย<br>รายใหม่(ราย)</th>
                                    <th rowspan="2"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        จำนวนผู้ป่วย</th>
                                    <th rowspan="2"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Urinary<br />cath</th>
                                    <th rowspan="2"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Central<br />line</th>
                                    <th rowspan="2"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Ventilator</th>
                                    <th colspan="4"
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        Surgical Wound

                                    </th>

                                    <th colspan="5" class="text-secondary opacity-7 text-center">Procedure of Surgical
                                        Wound</th>
                                </tr>
                                <tr>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        C</td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        CC</td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        CO</td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        D</td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        CSEC
                                    </td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        EPI
                                    </td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        KT
                                    </td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        APPE
                                    </td>
                                    <td
                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 text-center">
                                        VPS
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
<?php
$arr = array();
$arr_aa = array();
$arr_b = array();
$arr_c = array();
$arr_d = array();
$arr_e = array();
$arr_f = array();
$arr_g = array();
$arr_h = array();
$arr_i = array();
$arr_j = array();
$arr_k = array();
$arr_l = array();
$arr_m = array();
for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month-$day");
    if ($date && $date->format('n') == $month) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm text-center">
                                                    <?php echo $day."-".$month."-".$year; ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php

$a = "select count(`g2`) AS A from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    
    //echo $row["A"];
    //echo "<br>";
    if($row["A"]> '0'){
        //echo "1";
        $b = "select * from tableg where `g2` AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
        $bQuery = mysqli_query($objCon,$b);
        while($row_b = mysqli_fetch_array($bQuery)){
            $arr [ ] = $row_b["g2"]; 
            echo $row_b["g2"];
        }
    }else{
        $arr [ ] = "0";
        echo "0";
    }
    
}
?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php

$a = "select count(`g3`) AS AA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    //echo $row["A"];
    //echo "<br>";
    if($row["AA"]> '0'){
        //echo "1";
    $b = "select * from tableg where g3 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $bQuery = mysqli_query($objCon,$b);
    while($row_b = mysqli_fetch_array($bQuery)){
        echo $row_b["g3"];
        $arr_aa [ ] = $row_b["g3"]; 
    }
    }else{
        echo "0";
        $arr_aa [ ] = "0";
    }
    
}
?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`g4`) AS B from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    //echo $row["A"];
    //echo "<br>";
    if($row["B"]> '0'){
        //echo "1";
    $b = "select * from tableg where g4 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $bQuery = mysqli_query($objCon,$b);
    while($row_b = mysqli_fetch_array($bQuery)){
        echo $row_b["g4"];
        $arr_b [ ] = $row_b["g4"]; 
    }
    }else{
        echo "0";
        $arr_b [ ] = "0";
    } 
}
?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`g5`) AS C from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    //echo $row["A"];
    //echo "<br>";
    if($row["C"]> '0'){
        //echo "1";
    $b = "select * from tableg where g5 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $bQuery = mysqli_query($objCon,$b);
    while($row_b = mysqli_fetch_array($bQuery)){
        echo $row_b["g5"];
        $arr_c [ ] = $row_b["g5"];
    }
    }else{
        echo "0";
        $arr_c [ ] = "0";
    } 
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`g6`) AS D from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    //echo $row["A"];
    //echo "<br>";
    if($row["D"]> '0'){
        //echo "1";
    $b = "select * from tableg where g6 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $bQuery = mysqli_query($objCon,$b);
    while($row_b = mysqli_fetch_array($bQuery)){
        echo $row_b["g6"];
        $arr_d [ ] = $row_b["g6"];
    }
    }else{
        echo "0";
        $arr_d [ ] = "0";
    } 
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS E from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["E"]> '0'){
        if($row["E"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g7 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g7 = $row_b["g7"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g16 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g16 = $row_c["g16"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g25 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g25 = $row_d["g25"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g34 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g34 = $row_e["g34"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g43 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g43 = $row_f["g43"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g52 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g52 = $row_g["g52"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g61 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g61 = $row_h["g61"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g70 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g70 = $row_i["g70"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g79 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g79 = $row_j["g79"];
                    //echo "<br>";
                }
                $sum_a = $g7+$g16+$g25+$g34+$g43+$g52+$g61+$g70+$g79;
                echo $sum_a;
                $arr_e [ ] = $sum_a; 
            }else{
                echo $row["E"];
                $arr_e [ ] = $row_b["E"]; 
            }
    }else{
        echo $row["E"] = "0";
        $arr_e [ ] = "0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS F from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["F"]> '0'){
        if($row["F"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g8 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g8 = $row_b["g8"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g17 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g17 = $row_c["g17"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g26 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g26 = $row_d["g26"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g35 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g35 = $row_e["g35"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g44 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g44 = $row_f["g44"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g53 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g53 = $row_g["g53"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g62 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g62 = $row_h["g62"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g71 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g71 = $row_i["g71"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g80 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g80 = $row_j["g80"];
                    //echo "<br>";
                }
                $sum_b = $g8+$g17+$g26+$g35+$g44+$g53+$g62+$g71+$g80;
                $arr_f [ ] = $sum_b;
                echo $sum_b;
            }else{
                $arr_f [ ] = $row["F"];
                echo $row["F"];
            }
    }else{
        $arr_f [ ] ="0";
        echo $row["F"]="0";
    }
}
?>

                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS G from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["G"]> '0'){
        if($row["G"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g9 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g9 = $row_b["g9"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g18 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g18 = $row_c["g18"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g27 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g27 = $row_d["g27"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g36 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g36 = $row_e["g36"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g45 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g45 = $row_f["g45"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g54 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g54 = $row_g["g54"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g63 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g63 = $row_h["g63"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g72 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g72 = $row_i["g72"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g81 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g81 = $row_j["g81"];
                    //echo "<br>";
                }
                $sum_c = $g9+$g18+$g27+$g36+$g45+$g54+$g63+$g72+$g81;
                echo $arr_g [ ] = $sum_c;
            }else{
                echo $arr_g [ ]=$row["G"];
            }
    }else{
        $arr_g [ ] = "0";
        echo $row["G"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS H from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["H"]> '0'){
        if($row["H"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g10 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g10 = $row_b["g10"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g19 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g19 = $row_c["g19"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g28 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g28 = $row_d["g28"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g37 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g37 = $row_e["g37"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g46 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g46 = $row_f["g46"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g55 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g55 = $row_g["g55"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g64 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g64 = $row_h["g64"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g73 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g73 = $row_i["g73"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g82 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g82 = $row_j["g82"];
                    //echo "<br>";
                }
                $sum_d = $g10+$g19+$g28+$g37+$g46+$g55+$g64+$g73+$g82;
                echo $arr_h [ ] = $sum_d;
            }else{
                echo $arr_h [ ] = $row["H"];
            }
    }else{
        $arr_h [ ] = "0";
        echo $row["H"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS I from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["I"]> '0'){
        if($row["I"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g11 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g11 = $row_b["g11"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g20 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g20 = $row_c["g20"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g29 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g29 = $row_d["g29"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g38 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g38 = $row_e["g38"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g47 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g47 = $row_f["g47"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g56 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g56 = $row_g["g56"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g65 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g65 = $row_h["g65"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g74 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g74 = $row_i["g74"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g83 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g83 = $row_j["g83"];
                    //echo "<br>";
                }
                $sum_e = $g11+$g20+$g29+$g38+$g47+$g56+$g65+$g74+$g83;
                echo $arr_i [ ] = $sum_e;
            }else{
                
                echo $arr_i [ ] =$row["I"];
            }
    }else{
        $arr_i [ ] = "0";
        echo $row["I"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS J from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["J"]> '0'){
        if($row["J"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g12 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g12 = $row_b["g12"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g21 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g21 = $row_c["g21"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g30 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g30 = $row_d["g30"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g39 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g39 = $row_e["g39"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g48 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g48 = $row_f["g48"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g57 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g57 = $row_g["g57"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g66 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g66 = $row_h["g66"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g75 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g75 = $row_i["g75"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g84 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g84 = $row_j["g84"];
                    //echo "<br>";
                }
                $sum_f = $g12+$g21+$g30+$g39+$g48+$g57+$g66+$g75+$g84;
                echo $arr_j [ ] = $sum_f;
            }else{
                echo $arr_j [ ] = $row["J"];
            }
    }else{
        $arr_j [ ] = "0";
        echo $row["J"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS K from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["K"]> '0'){
        if($row["K"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g13 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g13 = $row_b["g13"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g22 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g22 = $row_c["g22"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g31 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g31 = $row_d["g31"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g40 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g40 = $row_e["g40"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g49 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g49 = $row_f["g49"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g58 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g58 = $row_g["g58"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g67 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g67 = $row_h["g67"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g76 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g76 = $row_i["g76"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g85 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g85 = $row_j["g85"];
                    //echo "<br>";
                }
                $sum_g = $g13+$g22+$g31+$g40+$g49+$g58+$g67+$g76+$g85;
                echo $arr_k [ ] = $sum_g;
            }else{
                echo $arr_k [ ] = $row["K"];
            }
    }else{
        $arr_k [ ] = "0";
        echo $row["K"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS L from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["L"]> '0'){
        if($row["L"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g14 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g14 = $row_b["g14"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g23 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g23 = $row_c["g23"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g32 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g32 = $row_d["g32"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g41 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g41 = $row_e["g41"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g50 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g50 = $row_f["g50"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g59 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g59 = $row_g["g59"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g68 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g68 = $row_h["g68"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g77 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g77 = $row_i["g77"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g86 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g86 = $row_j["g86"];
                    //echo "<br>";
                }
                $sum_h = $g14+$g23+$g32+$g41+$g50+$g59+$g68+$g77+$g86;
                echo $arr_l [ ] = $sum_h;
            }else{
                echo $arr_l [ ] = $row["L"];
            }
    }else{
        $arr_l [ ] = "0";
        echo $row["L"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php
$a = "select count(`tableg_id`) AS M from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
    // echo $row["E"];
    // echo "<br>";
    if($row["M"]> '0'){
        if($row["M"]> '0'){
            //echo $row["E"];
            //echo "<br>";
                $b = "select * from tableg where g15 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $bQuery = mysqli_query($objCon,$b);
                while($row_b = mysqli_fetch_array($bQuery)){
                    $g15 = $row_b["g15"];
                    //echo "<br>";
                }
                $c = "select * from tableg where g24 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $cQuery = mysqli_query($objCon,$c);
                while($row_c = mysqli_fetch_array($cQuery)){
                    $g24 = $row_c["g24"];
                    //echo "<br>";
                }
                $d = "select * from tableg where g33 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $dQuery = mysqli_query($objCon,$d);
                while($row_d = mysqli_fetch_array($dQuery)){
                    $g33 = $row_d["g33"];
                    //echo "<br>";
                }
                $e = "select * from tableg where g42 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $eQuery = mysqli_query($objCon,$e);
                while($row_e = mysqli_fetch_array($eQuery)){
                    $g42 = $row_e["g42"];
                    //echo "<br>";
                }
                $f = "select * from tableg where g51 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $fQuery = mysqli_query($objCon,$f);
                while($row_f = mysqli_fetch_array($fQuery)){
                    $g51 = $row_f["g51"];
                    //echo "<br>";
                }        
                $g = "select * from tableg where g60 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $gQuery = mysqli_query($objCon,$g);
                while($row_g = mysqli_fetch_array($gQuery)){
                    $g60 = $row_g["g60"];
                    //echo "<br>";
                } 
                $h = "select * from tableg where g69 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $hQuery = mysqli_query($objCon,$h);
                while($row_h = mysqli_fetch_array($hQuery)){
                    $g69 = $row_h["g69"];
                    //echo "<br>";
                } 
                $i = "select * from tableg where g78 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $iQuery = mysqli_query($objCon,$i);
                while($row_i = mysqli_fetch_array($iQuery)){
                    $g78 = $row_i["g78"];
                    //echo "<br>";
                }
                $j = "select * from tableg where g87 AND timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
                $jQuery = mysqli_query($objCon,$j);
                while($row_j = mysqli_fetch_array($jQuery)){
                    $g87 = $row_j["g87"];
                    //echo "<br>";
                }
                $sum_g = $g15+$g24+$g33+$g42+$g51+$g60+$g69+$g78+$g87;
                echo $arr_m [ ] = $sum_g;
            }else{
                echo $arr_m [ ] = $row["M"];
            }
    }else{
        $arr_m [ ] = "0";
        echo $row["M"]="0";
    }
}
?>
                                        </p>
                                    </td>
                                </tr>
                                <?php 
    }
}
?>

                                <tr>
                                    <td rowspan="2">
                                        <p class="text-m font-weight-bold mb-0 text-center">รวม</p>
                                    </td>
                                    <td rowspan="2">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr);?>
                                        </p>
                                    </td>
                                    <td rowspan="2">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_aa); ?></p>
                                    </td>
                                    <td rowspan="2">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_b); ?></p>
                                    </td>
                                    <td rowspan="2">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_c); ?></p>
                                    </td>
                                    <td rowspan="2">
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_d); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_e); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_f); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_g); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_h); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_i); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_j); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_k); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_l); ?></p>
                                    </td>
                                    <td>
                                        <p class="text-m font-weight-bold mb-0 text-center">
                                            <?php echo array_sum($arr_m); ?></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <p class="text-m font-weight-bold mb-0 text-center">
<?php
$sum_ae = array_sum($arr_e);
$sum_af = array_sum($arr_f);
$sum_ag = array_sum($arr_g);
$sum_ah = array_sum($arr_h);
echo $sumall = $sum_ae+$sum_af+$sum_ag+$sum_ah;

?>

                                        </p>
                                    </td>
                                    <td colspan="5">
                                        <p class="text-m font-weight-bold mb-0 text-center">
<?php
$sum_ai = array_sum($arr_i);
$sum_aj = array_sum($arr_j);
$sum_ak = array_sum($arr_k);
$sum_al = array_sum($arr_l);
$sum_am = array_sum($arr_m);
echo $sumall_a = $sum_ai+$sum_aj+$sum_ak+$sum_al+$sum_am;

?>
                                        </p>
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
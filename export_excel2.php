<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report2.xls"');
session_start();
error_reporting(~E_NOTICE);
if (!isset($_SESSION["USER_ID"])) {
    header("Location: login/login.php"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้กลับไปที่หน้า login
    exit;
}
include("connect.php");
include("sqlsrv_connect.php");
$year = $year;


?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>รายงานการติดเชื้อในโรงพยาบาล ประจำปี <?= $year?></title>
    <style>
    table,
    tr,
    td {
        border: 1px solid #000;
        color: #000;
        border-collapse: collapse;
        text-align: center;
        font-family: "Sarabun", serif;
        font-weight: 400;
        font-style: normal;
    }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    </style>

<body>
    <center>
        <h1>รายงานการติดเชื้อในโรงพยาบาล ประจำปี <?= $year?></h1>
    </center>
    <table style=" width:100%;">

        <tr>
            <td>ข้อมูล</td>
            <?php


/////////////////////// F///////////////////
$year = $year;
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];


foreach ($months as $key => $month) {
?>


            <td>
                <?=  $month ;?>
            </td>
            <?php } ?>

            <td>รวม</td>
        </tr>


        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการติดเชื้อ


            </td>
            <?php
$ssum_array = array();

/////////////////////// F///////////////////
                                $year = "2025";
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];




foreach ($months as $key => $month) {

if($key<"10"){
    $k = "0".$key;
    //echo $k;
}else{
    $k = $key;
    //echo $k;
}
$month_a = $key; // January
$year = $year;

// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}



?>
            <td>

                <?php
        //echo $month."<br>";    

$a_array = array();

for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month_a-$day");
    if ($date && $date->format('n') == $month_a) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
    }
        
        //echo  "<br>Day-". $day . "<br>";
    //////////////////////// start F /////////////////////////////

    //////////////////////// Count G /////////////////////////////
    $a = "select count(`tableg_id`) AS ZA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){
        if($row["ZA"]> '0'){

            $a = "select count(`tableg_id`) AS ZAA from tableg where timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
            $aQuery = mysqli_query($objCon,$a);
            while ($row = mysqli_fetch_array($aQuery)){
                if($row["ZAA"]>0){
                    
                    $b = "select * from tableg where 1 AND timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
                    $bQuery = mysqli_query($objCon,$b);
                    while($row_b = mysqli_fetch_array($bQuery)){
                        if($row_b["g2"]!=""){
                            $g2 = $row_b["g2"]; 
                        }else{
                            $g2 = "0"; 
                        }
                        if($row_b["g3"]!=""){
                            $g3 = $row_b["g3"]; 
                        }else{
                            $g3 = "0"; 
                        }
                        if($row_b["g4"]!=""){
                            $g4 = $row_b["g4"]; 
                        }else{
                            $g4 = "0"; 
                        }
                        if($row_b["g5"]!=""){
                            $g5 = $row_b["g5"]; 
                        }else{
                            $g5 = "0"; 
                        }
                        if($row_b["g6"]!=""){
                            $g6 = $row_b["g6"]; 
                        }else{
                            $g6 = "0"; 
                        }
                        
                        $a_array [ ] = $g2+$g3+$g4+$g5+$g6;
                        
                    }//while
                }else{
                    $a_array [ ] = "0";
                    
                }

            }


        }else{
            $a_array [ ] = "0";

        }
    }//while
   
    
}// for


?>
                <?php echo $ssum_array [ ] = array_sum($a_array);?>

            </td>
            <?php } ?>

            <td>
                <?php echo array_sum($ssum_array);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันนอน


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$arrays_a = [
// ["name" => "John", "age" => 20],
// ["name" => "Jane", "age" => 22]
];


// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php

    // วันแรกของเดือน
    $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
    // วันสุดท้ายของเดือน
    $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                            
    $a = "select count(`g3`) AS AA from tableg where timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){

        if($row["AA"]> '0'){
            $b = "select * from tableg where g3 AND timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
            $bQuery = mysqli_query($objCon,$b);
            while($row_b = mysqli_fetch_array($bQuery)){

// ข้อมูลใหม่ที่ต้องการเพิ่ม
$newarray_a = ["name" => $k, "age" => $row_b["g3"]];

// ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
array_push($arrays_a, $newarray_a);

            }
        }else{
            //$marr_a [ ] = "0";
            $newarray_a = ["name" => $k, "age" => 0];

            // ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
            array_push($arrays_a, $newarray_a);

        }

    }
    ?>
                <?php
$totalGrade = 0;

foreach ($arrays_a as $array_a) {
if($array_a["name"]==$k){
    $totalGrade += $array_a["age"];
}else{

}
}
echo $marr_a [ ] = $totalGrade;

?>



            </td>
            <?php } ?>



            <td>
                <?php echo $sum_marr_a = array_sum($marr_a);?>

            </td>
        </tr>


        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการติดเชื้อ(ต่อ1,000วันนอน)


            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$sum_one = array ();

foreach ($months as $key => $month) {
?>
            <td>

                <?php

$one_a = $ssum_array[$key-1]; // ตัวอย่างค่า $a
$one_b = $marr_a[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($one_b != 0) {
$sum_two = ($one_a/$one_b)*1000;
echo sprintf("%.2f", $sum_two);
$sum_one [ ] = sprintf("%.2f", $sum_two);
} else {
$sum_one [ ] = 0;
echo "0";
}
?>


            </td>
            <?php }
                                 ?>


            <td>


                <?php echo array_sum($sum_one);?>


            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนผู้ป่วยในวันแรกของเดือน


            </td>
            <?php
$year = $year;
$marr_c = array();
// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$arrays_c = [
// ["name" => "John", "age" => 20],
// ["name" => "Jane", "age" => 22]
];


// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php

    // วันแรกของเดือน
    $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
    // วันสุดท้ายของเดือน
    $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                            
    $a = "select count(`f2`) AS C from tablef where timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){

        if($row["C"]> '0'){
            $b = "select * from tablef where f2 AND timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
            $bQuery = mysqli_query($objCon,$b);
            while($row_b = mysqli_fetch_array($bQuery)){

// ข้อมูลใหม่ที่ต้องการเพิ่ม
$newarray_c = ["name" => $k, "age" => $row_b["f2"]];

// ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
array_push($arrays_c, $newarray_c);

            }
        }else{
            //$marr_c [ ] = "0";
            $newarray_c = ["name" => $k, "age" => 0];

            // ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
            array_push($arrays_c, $newarray_c);

        }

    }
    ?>
                <?php
$totalGrade = 0;

foreach ($arrays_c as $array_c) {
if($array_c["name"]==$k){
    $totalGrade += $array_c["age"];
}else{

}
}
echo $marr_c [ ] = $totalGrade;

?>



            </td>
            <?php } ?>


            <td>
                <?php echo $sum_marr_c = array_sum($marr_c);?>

            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนผู้ป่วยมาใหม่ในรอบเดือน


            </td>
            <?php
$year = $year;
$marr_b = array();
// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$arrays_b = [
// ["name" => "John", "age" => 20],
// ["name" => "Jane", "age" => 22]
];


// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php

    // วันแรกของเดือน
    $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
    // วันสุดท้ายของเดือน
    $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                            
    $a = "select count(`g2`) AS B from tableg where timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){

        if($row["B"]> '0'){
            $b = "select * from tableg where g2 AND timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
            $bQuery = mysqli_query($objCon,$b);
            while($row_b = mysqli_fetch_array($bQuery)){

// ข้อมูลใหม่ที่ต้องการเพิ่ม
$newarray_b = ["name" => $k, "age" => $row_b["g2"]];

// ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
array_push($arrays_b, $newarray_b);

            }
        }else{
            //$marr_a [ ] = "0";
            $newarray_b = ["name" => $k, "age" => 0];

            // ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
            array_push($arrays_b, $newarray_b);

        }

    }
    ?>
                <?php
$totalGrade = 0;

foreach ($arrays_b as $array_b) {
if($array_b["name"]==$k){
    $totalGrade += $array_b["age"];
}else{

}
}
echo $marr_b [ ] = $totalGrade;

?>



            </td>
            <?php } ?>



            <td>
                <?php echo $sum_marr_b = array_sum($marr_b);?>

            </td>
        </tr>

        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * ระยะเวลาเฉลี่ยของการอยู่รักษาใน รพ. (วัน)



            </td>
            <?php
$sum_mresult=array();
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>


                <?php

                                    $k = $key;
                                    $ma = $marr_a[$k-1]; // ตัวอย่างค่า $a
                                    $mb = $marr_c[$k-1];  // ตัวอย่างค่า $b
                                    $mc = $marr_b[$k-1];

                                    // ตรวจสอบว่าตัวหารไม่เป็นศูนย์
                                    if ($mb != 0 && $mc != 0) {
                                        $mresult = $ma / ($mb+$mc);
                                        $mresult;
                                        echo sprintf("%.2f", $mresult);
                                        $sum_mresult[] = sprintf("%.2f", $mresult);
                                    } else {
                                        echo "0";
                                    }
?>


            </td>
            <?php } ?>


            <td>

                <?php 
                                    // echo "<pre>";
                                    // print_r($sum_mresult);
                                    // echo "</pre>";
                                    echo array_sum($sum_mresult);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                UTI ที่สัมพันธ์กับการใส่สายสวนปัสสาวะ


            </td>
            <?php
$year = $year;
$marr_cauti = array();
// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`table1`.`status1`) AS A from table1 where status1 = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $marr_cauti[] = $row["A"];
}?>



            </td>
            <?php } ?>


            <td>

                <?php echo array_sum($marr_cauti);?>


            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันที่ใส่สายสวนปัสสาวะ


            </td>
            <?php
$year = $year;
$marr_cc = array();
// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$arrays_cc = [
// ["name" => "John", "age" => 20],
// ["name" => "Jane", "age" => 22]
];


// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php

    // วันแรกของเดือน
    $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
    // วันสุดท้ายของเดือน
    $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                            
    $a = "select count(`g4`) AS CC from tableg where timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){

        if($row["CC"]> '0'){
            $b = "select * from tableg where g4 AND timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
            $bQuery = mysqli_query($objCon,$b);
            while($row_b = mysqli_fetch_array($bQuery)){

// ข้อมูลใหม่ที่ต้องการเพิ่ม
$newarray_cc = ["name" => $k, "age" => $row_b["g4"]];

// ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
array_push($arrays_cc, $newarray_cc);

            }
        }else{
            //$marr_cc [ ] = "0";
            $newarray_cc = ["name" => $k, "age" => 0];

            // ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
            array_push($arrays_cc, $newarray_cc);

        }

    }
    ?>
                <?php
$totalGrade = 0;

foreach ($arrays_cc as $array_c) {
if($array_c["name"]==$k){
    $totalGrade += $array_c["age"];
}else{

}
}
echo $marr_cc [ ] = $totalGrade;

?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($marr_cc);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการเกิด UTI ที่สัมพันธ์สายสวนปัสสาวะ



            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$nine = array();
foreach ($months as $key => $month) {

?>
            <td>

                <?php
// echo $key;
// echo "<br>";
// echo $marr_cauti[$key-1];
// echo "<br>";
// echo $marr_cc[$key-1];

$mre = $marr_cauti[$key-1]; // ตัวอย่างค่า $a
$mbr = $marr_cc[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($mbr != 0) {
$nine_result = ($mre  / $mbr) * 1000;
echo sprintf("%.2f", $nine_result);
$nine [ ] = sprintf("%.2f", $nine_result);
} else {
echo "0";
}

?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($nine);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; ">
            <td style="text-align: left;">


                * อัตราการใส่สายสวนปัสสาวะ (ร้อยละ)


            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$ten = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
// echo $key;
// echo "<br>";
// echo $marr_cauti[$key-1];
// echo "<br>";
// echo $marr_cc[$key-1];

$mre = $marr_cc[$key-1]; // ตัวอย่างค่า $a
$mbr = $marr_a[$key-1];  // ตัวอย่างค่า $b
// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($mbr != 0) {
$ten_result = ($mre / $mbr) * 100;
echo sprintf("%.2f", $ten_result);
$ten [ ] = sprintf("%.2f", $ten_result);
} else {
echo "0";
}

?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($ten);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนครั้ง UTI ไม่สัมพันธ์สายสวนปัสสาวะ


            </td>
            <?php
$year = $year;
$marr_utinon = array ();
// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`table1`.`status2`) AS B from table1 where status2 = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $marr_utinon [ ] = $row["B"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($marr_utinon);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันที่ไม่ใส่สายสวนปัสสาวะ


            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$ac_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
$mr_a = $marr_a[$key-1];
$mr_cc = $marr_cc[$key-1];
echo $x_ans = $mr_a - $mr_cc;
$ac_result [ ] = sprintf("%.2f", $x_ans);
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($ac_result);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการ UTI ไม่สัมพันธ์สายสวนปัสสาวะ



            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$x_array = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
if (isset($ten[$key-1])) {
    $xa = $ten[$key-1];
    $xb = $ac_result[$key-1];
    if($xb != 0){
        echo $xresult = ( $xa / $xb ) * 1000;
        $x_array [] = $xresult;    
    }else{
        echo $xresult = 0;
        $x_array [] = 0;
    }
} else {
    echo $x_array [] = 0;
}

?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($x_array);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของ BSI ที่สัมพันธ์ Central line



            </td>
            <?php

$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$xe_array = array();      
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                        }else{
                                            $k = $key;
                                        }
                                        ?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tableb1`.`check`) AS E from tableb1 where `check` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $xe_array[] = $row["E"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xe_array);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันที่ใส่ Central line


            </td>
            <?php
                                $year = $year;
                                $marr_ee = array();
                                // วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน

                                $arrays_ee = [
                                // ["name" => "John", "age" => 20],
                                // ["name" => "Jane", "age" => 22]
                                ];


                                // แสดงชื่อเดือนทั้ง 12 เดือน
                                $months = [
                                1 => "ม.ค.",
                                2 => "ก.พ.",
                                3 => "มี.ค.",
                                4 => "เม.ย.",
                                5 => "พ.ค.",
                                6 => "มิ.ย.",
                                7 => "ก.ค.",
                                8 => "ส.ค.",
                                9 => "ก.ย.",
                                10 => "ต.ค.",
                                11 => "พ.ย.",
                                12 => "ธ.ค."
                                ];

                                foreach ($months as $key => $month) {
                                ?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php

    // วันแรกของเดือน
    $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
    // วันสุดท้ายของเดือน
    $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                            
    $a = "select count(`g5`) AS E from tableg where timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){

        if($row["E"]> '0'){
            $b = "select * from tableg where g5 AND timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
            $bQuery = mysqli_query($objCon,$b);
            while($row_b = mysqli_fetch_array($bQuery)){

// ข้อมูลใหม่ที่ต้องการเพิ่ม
$newarray_ee = ["name" => $k, "age" => $row_b["g5"]];

// ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
array_push($arrays_ee, $newarray_ee);

            }
        }else{
            //$marr_cc [ ] = "0";
            $newarray_cc = ["name" => $k, "age" => 0];

            // ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
            array_push($arrays_cc, $newarray_cc);

        }

    }
    ?>
                <?php
$totalGrade = 0;

foreach ($arrays_ee as $array_e) {
if($array_e["name"]==$k){
    $totalGrade += $array_e["age"];
}else{

}
}
echo $marr_ee [ ] = $totalGrade;

?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($marr_ee);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการเกิด BSI ที่สัมพันธ์ Central line



            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$xee_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php

$xee_a = $xe_array[$key-1]; // ตัวอย่างค่า $a
$xee_cc = $marr_ee[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($xee_cc != 0) {
$xxe_result = ($xee_a /$xee_cc)*1000;
echo sprintf("%.2f", $xxe_result);
$xee_result [ ] = sprintf("%.2f", $xxe_result);
} else {
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xee_result);?>
            </td>
        </tr>

        <tr style="border-bottom: 1px #DDD solid; ">
            <td style="text-align: left;">


                * อัตราการใส่ Central line (ร้อยละ)


            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$xeee_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
//echo $key."<br>";
$xee_d = $marr_ee[$key-1]; // ตัวอย่างค่า $a
$xee_a = $marr_a[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($xee_a != 0) {
$xxe_result = ( $xee_d / $xee_a ) *100;
echo sprintf("%.2f", $xxe_result);
$xee_result [] = sprintf("%.2f", $xxe_result);;

} else {
echo "0";
$xee_result [] = 0;
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xee_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของ BSI ที่ไม่สัมพันธ์ central
                line


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_dd = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tableb1`.`check`) AS D from tableb1 where `check` = '2' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_dd [] = $row["D"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_dd);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันที่ไม่ใส่ central line


            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$xa_result = array ();
foreach ($months as $key => $month) {
?>
            <td>


                <?php  
                                        
                                        $xa_a = $marr_a[$key-1]; // ตัวอย่างค่า $a
                                        $xa_d = $marr_ee[$key-1];  // ตัวอย่างค่า $b
                                        
                                        // ตรวจสอบว่าตัวหารไม่เป็นศูนย์
                                        if ($xa_d != 0) {
                                            $aa_result = ($xa_a /$xa_d)*1000;
                                            echo sprintf("%.2f", $aa_result);
                                            $xa_result [ ] = sprintf("%.2f", $aa_result);
                                        } else {
                                            $xa_result [ ] = 0;
                                            echo "0";
                                        }
                                        ?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xa_result);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการเกิด BSI ไม่สัมพันธ์ central line



            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$xan_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php


$xan_a = $array_dd[$key-1]; // ตัวอย่างค่า $a
$xan_d = $xa_result[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($xan_d != 0) {
$aan_result = ($xan_a/$xan_d)*100;
echo sprintf("%.2f", $aan_result);
$xan_result [ ] = sprintf("%.2f", $aan_result);
} else {
$xan_result [ ] = 0;
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xan_result);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการเกิด VAP


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_ae = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tablec1`.`check`) AS E from tablec1 where `check` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_ae [] = $row["E"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_ae);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันที่ใช้เครื่องช่วยหายใจ


            </td>
            <?php
$year = $year;
$ma_xe = array();
// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$arrays_xee = [
// ["name" => "John", "age" => 20],
// ["name" => "Jane", "age" => 22]
];


// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];

foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php

    // วันแรกของเดือน
    $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
    // วันสุดท้ายของเดือน
    $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                            
    $a = "select count(`g6`) AS E from tableg where timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){

        if($row["E"]> '0'){
            $b = "select * from tableg where `g6` AND timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59' ";
            $bQuery = mysqli_query($objCon,$b);
            while($row_b = mysqli_fetch_array($bQuery)){

// ข้อมูลใหม่ที่ต้องการเพิ่ม
$newarray_xee = ["name" => $k, "age" => $row_b["g6"]];

// ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
array_push($arrays_xee, $newarray_xee);

            }
        }else{
            //$marr_cc [ ] = "0";
            $newarray_cc = ["name" => $k, "age" => 0];

            // ใช้ array_push เพื่อเพิ่มข้อมูลใหม่
            array_push($arrays_cc, $newarray_cc);

        }

    }
    ?>
                <?php
$totalGrade = 0;

foreach ($arrays_xee as $array_xe) {
if($array_xe["name"]==$k){
    $totalGrade += $array_xe["age"];
}else{

}
}
echo $marr_xee [ ] = $totalGrade;

?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($marr_xee);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการเกิด pneumonia


            </td>
            <?php
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$xea_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php 
                                        

$xe_e = $array_ae[$key-1]; // ตัวอย่างค่า $a
$xe_f = $marr_xee[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($xe_f != 0) {
$xeaa_result = ($xe_e/$xe_f)*1000;
echo sprintf("%.2f", $xeaa_result);
$xea_result [ ] = sprintf("%.2f", $xeaa_result);
} else {
$xea_result [ ] =  0;
echo "0";
}
                                        ?>


            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xea_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                * อัตราการใช้เครื่องช่วยหายใจ (ร้อยละ)


            </td>
            <?php
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$xax_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php



$xax_a = $marr_xee[$key-1]; // ตัวอย่างค่า $a
$xax_d = $marr_a[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($xax_d != 0) {
$aax_result = ($xax_a/$xax_d)*100;
echo sprintf("%.2f", $aax_result);
$xax_result [ ] = sprintf("%.2f", $aax_result);
} else {
$xax_result [ ] = 0;
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($xax_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้ง pneumonia ไม่สัมพันธ์ใช้เครื่อง



            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_hap = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>

                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tablec1`.`check`) AS HAP from tablec1 where `check` = '2' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_hap [] = $row["HAP"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_hap);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนวันที่ไม่ใช้เครื่องช่วยหายใจ


            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$ae_result = array ();
foreach ($months as $key => $month) {
?>
            <td>


                <?php 
                                       ///A-E///
                                        $ae_a = $array_ae[$key-1]; // ตัวอย่างค่า $a
                                        $ae_e = $marr_xee[$key-1];  // ตัวอย่างค่า $b
                                        
                                        // ตรวจสอบว่าตัวหารไม่เป็นศูนย์
                                        if ($ae_e != 0) {
                                            $aex_result = $ae_a-$ae_e;
                                            echo $ae_result [ ] = sprintf("%.2f", $aex_result);
                                        } else {
                                            $ae_result [ ] =  0;
                                            echo "0";
                                        }
                                        ?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($ae_result);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการ pneumonia ที่ไม่สัมพันธ์
                ใช้เครื่อง



            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
$twofive_six = array ();       
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_twofive_six = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php

$xe_five = $array_hap[$key-1]; // ตัวอย่างค่า $a
$xe_six = $ae_result[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($xe_six != 0 ) {
 $xeaa_result = ($xe_five/$xe_six)*1000;
 echo sprintf("%.2f", $xeaa_result);
 $twofive_six [ ] = sprintf("%.2f", $xeaa_result);
} else {
$twofive_six [ ] = 0;
 echo "0";
}

?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($twofive_six);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการติดเชื้อที่ตำแหน่งอื่นๆ


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_g = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tablee1`.`tablee1_id`) AS G from tablee1 where 1 AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_g [ ] = $row["G"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_g);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนตำแหน่งอื่นๆ


            </td>
            <?php
                                ////////////// 29 ///////////////
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_e = array();
foreach ($months as $key => $month) {
?>
            <td>


                <?php echo $array_e [ ] = $marr_a[$key-1];?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_e);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                *
                อัตตราการติดเชื้อที่ตำแหน่งอื่นๆ (ต่อ1,000วัน)



            </td>
            <?php
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$sum_eight_nine_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php 
                                       
                                        $xen_e = $array_g[$key-1]; // ตัวอย่างค่า $a
                                        $xen_n = $marr_a[$key-1];  // ตัวอย่างค่า $b
                                        
                                        // ตรวจสอบว่าตัวหารไม่เป็นศูนย์
                                        if ($xen_n != 0) {
                                            $sum_en = ($xen_e/$xen_n)*1000;
                                            echo sprintf("%.2f", $sum_en);
                                            $sum_eight_nine_result [ ] = sprintf("%.2f", $sum_en);
                                        } else {
                                            $sum_eight_nine_result [ ] = 0;
                                            echo "0";
                                        }
                                        
                                        ?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($sum_eight_nine_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้งแรกของการติดเชื้อแผลผ่าตัด


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_ssi = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tabled1`.`d45`) AS H from tabled1 where `d45` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_ssi [] = $row["H"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_ssi);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนแผลผ่าตัด


            </td>
            <?php
$sum_f = array();
/////////////////////// F///////////////////
                                $year = "2025";
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];




foreach ($months as $key => $month) {

if($key<"10"){
    $k = "0".$key;
    //echo $k;
}else{
    $k = $key;
    //echo $k;
}
$month_a = $key; // January
$year = $year;

// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}



?>
            <td>

                <?php
        //echo $month."<br>";    
        $arr_wa_sum = array();
        $arr_wb_sum = array();
        $arr_wc_sum = array();
        $arr_wd_sum = array();


for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month_a-$day");
    if ($date && $date->format('n') == $month_a) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
    }
        
        //echo  "<br>Day-". $day . "<br>";
    //////////////////////// start F /////////////////////////////

    //////////////////////// Count G /////////////////////////////
    $a = "select count(`tableg_id`) AS WA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){
        if($row["WA"]> '0'){

            $a = "select count(`tableg_id`) AS WAA from tableg where timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
            $aQuery = mysqli_query($objCon,$a);
            while ($row = mysqli_fetch_array($aQuery)){
                if($row["WAA"]>0){
                    
                    $b = "select * from tableg where 1 AND timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
                    $bQuery = mysqli_query($objCon,$b);
                    while($row_b = mysqli_fetch_array($bQuery)){
                        if($row_b["g7"]!=""){
                            $g7 = $row_b["g7"];
                        }else{
                            $g7 = "0";
                        }
                        if($row_b["g16"]!=""){
                            $g16 = $row_b["g16"];
                        }else{
                            $g16 = "0";
                        }
                        if($row_b["g25"]!=""){
                            $g25 = $row_b["g25"];
                        }else{
                            $g25 = "0";
                        }
                        if($row_b["g34"]!=""){
                            $g34 = $row_b["g34"];
                        }else{
                            $g34 = "0";
                        }
                        if($row_b["g43"]!=""){
                            $g43 = $row_b["g43"];
                        }else{
                            $g43 = "0";
                        }
                        if($row_b["g52"]!=""){
                            $g52 = $row_b["g52"];
                        }else{
                            $g52 = "0";
                        }
                        if($row_b["g61"]!=""){
                            $g61 = $row_b["g61"];
                        }else{
                            $g52 = "0";
                        }
                        if($row_b["g70"]!=""){
                            $g70 = $row_b["g70"];
                        }else{
                            $g70 = "0";
                        }
                        if($row_b["g79"]!=""){
                            $g79 = $row_b["g79"];
                        }else{
                            $g79 = "0";
                        }
                        if($row_b["g8"]!=""){
                            $g8 = $row_b["g8"];
                        }else{
                            $g8 = "0";
                        }
                        if($row_b["g17"]!=""){
                            $g17 = $row_b["g17"];
                        }else{
                            $g17 = "0";
                        }
                        if($row_b["g26"]!=""){
                            $g26 = $row_b["g26"];
                        }else{
                            $g26 = "0";
                        }
                        if($row_b["g35"]!=""){
                            $g35 = $row_b["g35"];
                        }else{
                            $g35 = "0";
                        }
                        if($row_b["g44"]!=""){
                            $g44 = $row_b["g44"];
                        }else{
                            $g44 = "0";
                        }
                        if($row_b["g53"]!=""){
                            $g53 = $row_b["g53"];
                        }else{
                            $g53 = "0";
                        }
                        if($row_b["g62"]!=""){
                            $g62 = $row_b["g62"];
                        }else{
                            $g62 = "0";
                        }
                        if($row_b["g71"]!=""){
                            $g71 = $row_b["g71"];
                        }else{
                            $g71 = "0";
                        }
                        if($row_b["g80"]!=""){
                            $g80 = $row_b["g80"];
                        }else{
                            $g80 = "0";
                        }
                        if($row_b["g9"]!=""){
                            $g9 = $row_b["g9"];
                        }else{
                            $g9 = "0";
                        }
                        if($row_b["g18"]!=""){
                            $g18 = $row_b["g18"];
                        }else{
                            $g18 = "0";
                        }
                        if($row_b["g27"]!=""){
                            $g27 = $row_b["g27"];
                        }else{
                            $g27 = "0";
                        }
                        if($row_b["g36"]!=""){
                            $g36 = $row_b["g36"];
                        }else{
                            $g36 = "0";
                        }
                        if($row_b["g45"]!=""){
                            $g45 = $row_b["g45"];
                        }else{
                            $g45 = "0";
                        }
                        if($row_b["g54"]!=""){
                            $g54 = $row_b["g54"];
                        }else{
                            $g54 = "0";
                        }
                        if($row_b["g63"]!=""){
                            $g63 = $row_b["g63"];
                        }else{
                            $g63 = "0";
                        }
                        if($row_b["g72"]!=""){
                            $g72 = $row_b["g72"];
                        }else{
                            $g72 = "0";
                        }
                        if($row_b["g81"]!=""){
                            $g81 = $row_b["g81"];
                        }else{
                            $g81 = "0";
                        }
                        if($row_b["g10"]!=""){
                            $g10 = $row_b["g10"];
                        }else{
                            $g10 = "0";
                        }
                        if($row_b["g19"]!=""){
                            $g19 = $row_b["g19"];
                        }else{
                            $g19 = "0";
                        }
                        if($row_b["g28"]!=""){
                            $g28 = $row_b["g28"];
                        }else{
                            $g28 = "0";
                        }
                        if($row_b["g37"]!=""){
                            $g37 = $row_b["g37"];
                        }else{
                            $g37 = "0";
                        }
                        if($row_b["g46"]!=""){
                            $g46 = $row_b["g46"];
                        }else{
                            $g46 = "0";
                        }
                        if($row_b["g55"]!=""){
                            $g55 = $row_b["g55"];
                        }else{
                            $g55 = "0";
                        }
                        if($row_b["g64"]!=""){
                            $g64 = $row_b["g64"];
                        }else{
                            $g64 = "0";
                        }
                        if($row_b["g73"]!=""){
                            $g73 = $row_b["g73"];
                        }else{
                            $g73 = "0";
                        }
                        if($row_b["g82"]!=""){
                            $g82 = $row_b["g82"];
                        }else{
                            $g82 = "0";
                        }
                        
                        //echo $arr_wa_sum [ ] = $g8+$g17+$g26+$g35+$g44+$g53+$g62+$g71+$g80;
                        $arr_wa_sum [ ] = $g7+$g16+$g25+$g34+$g43+$g52+$g61+$g70+$g79;
                        //echo "<br>";
                        $arr_wb_sum [ ] = $g8+$g17+$g26+$g35+$g44+$g53+$g62+$g71+$g80;
                        //echo "<br>";
                        $arr_wc_sum [ ] = $g9+$g18+$g27+$g36+$g45+$g54+$g63+$g72+$g81;
                        //echo "<br>";
                        $arr_wd_sum [ ] = $g10+$g19+$g28+$g37+$g46+$g55+$g64+$g73+$g82;
                        //echo "<br>";
                    }//while
                }else{
                    $arr_wa_sum [ ] = "0";
                    $arr_wb_sum [ ] = "0";
                    $arr_wc_sum [ ] = "0";
                    $arr_wd_sum [ ] = "0";
                }

            }


        }else{
            $arr_wa_sum [ ] = 0;
            $arr_wb_sum [ ] = 0;
            $arr_wc_sum [ ] = 0;
            $arr_wc_sum [ ] = 0;

        }

         //////////////////////// Count H /////////////////////////////




    }//while
   
    
}// for


?>

                <?php echo $sum_f [ ] = array_sum($arr_wa_sum)+array_sum($arr_wb_sum)+array_sum($arr_wc_sum)+array_sum($arr_wd_sum);?>


            </td>


            <?php }//foreach ?>


            <td>
                <?php echo array_sum($sum_f);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการติดเชื้อของแผลผ่าตัด


            </td>
            <?php
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$yax_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php



$ya_a = $array_ssi[$key-1]; // ตัวอย่างค่า $a
$ya_d = $sum_f[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($ya_d != 0) {
$ya_result = ($ya_a/$ya_d)*100;
echo sprintf("%.2f", $aax_result);
$yax_result [ ] = sprintf("%.2f", $ya_result);
} else {
$yax_result [ ] = 0;
echo "0";
}

?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($yax_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการติดเชื่อแผลผ่าตัดสะอาด



            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$na_arr = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tabled1`.`d9`) AS I from tabled1 where `d9` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $na_arr [ ] = $row["I"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($na_arr);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนแผลผ่าตัดสะอาด


            </td>

            <?php
$sum_ff = array();
/////////////////////// G ///////////////////
$year = "2025";
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];




foreach ($months as $key => $month) {

if($key<"10"){
    $k = "0".$key;
    //echo $k;
}else{
    $k = $key;
    //echo $k;
}
$month_a = $key; // January
$year = $year;

// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}



?>
            <td>

                <?php
        //echo $month."<br>";    
        $arr_wa_sum = array();



for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month_a-$day");
    if ($date && $date->format('n') == $month_a) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
    }
        
        //echo  "<br>Day-". $day . "<br>";
    //////////////////////// start F /////////////////////////////

    //////////////////////// Count G /////////////////////////////
    $a = "select count(`tableg_id`) AS WA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){
        if($row["WA"]> '0'){

            $a = "select count(`tableg_id`) AS WAA from tableg where timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
            $aQuery = mysqli_query($objCon,$a);
            while ($row = mysqli_fetch_array($aQuery)){
                if($row["WAA"]>0){
                    
                    $b = "select * from tableg where 1 AND timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
                    $bQuery = mysqli_query($objCon,$b);
                    while($row_b = mysqli_fetch_array($bQuery)){
                        if($row_b["g7"]!=""){
                            $g7 = $row_b["g7"];
                        }else{
                            $g7 = "0";
                        }
                        if($row_b["g16"]!=""){
                            $g16 = $row_b["g16"];
                        }else{
                            $g16 = "0";
                        }
                        if($row_b["g25"]!=""){
                            $g25 = $row_b["g25"];
                        }else{
                            $g25 = "0";
                        }
                        if($row_b["g34"]!=""){
                            $g34 = $row_b["g34"];
                        }else{
                            $g34 = "0";
                        }
                        if($row_b["g43"]!=""){
                            $g43 = $row_b["g43"];
                        }else{
                            $g43 = "0";
                        }
                        if($row_b["g52"]!=""){
                            $g52 = $row_b["g52"];
                        }else{
                            $g52 = "0";
                        }
                        if($row_b["g61"]!=""){
                            $g61 = $row_b["g61"];
                        }else{
                            $g52 = "0";
                        }
                        if($row_b["g70"]!=""){
                            $g70 = $row_b["g70"];
                        }else{
                            $g70 = "0";
                        }
                        if($row_b["g79"]!=""){
                            $g79 = $row_b["g79"];
                        }else{
                            $g79 = "0";
                        }

                        
                        //echo $arr_wa_sum [ ] = $g8+$g17+$g26+$g35+$g44+$g53+$g62+$g71+$g80;
                        $arr_wa_sum [ ] = $g7+$g16+$g25+$g34+$g43+$g52+$g61+$g70+$g79;

                    }//while
                }else{

                }

            }


        }else{
            $arr_wa_sum [ ] = 0;


        }

         //////////////////////// Count H /////////////////////////////




    }//while
   
    
}// for


?>

                <?php echo $sum_ff [ ] = array_sum($arr_wa_sum);?>


            </td>


            <?php }//foreach ?>

            <td>
                <?php echo array_sum($sum_ff);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการติดเชื้อของแผลผ่าตัดสะอาด


            </td>
            <?php
$year = $year;

$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$ybx_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php


$yb_a = $na_arr[$key-1]; // ตัวอย่างค่า $a
$yb_d = $sum_ff[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($yb_d != 0) {
$yb_result = ($yb_a/$yb_d)*100;
echo sprintf("%.2f", $yb_result);
$ybx_result [ ] = sprintf("%.2f", $yb_result);
} else {
$ybx_result [ ] = 0;
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($ybx_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการติดเชื้อสะอาดปนเปื้อน


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_ya = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tabled1`.`d10`) AS J from tabled1 where `d10` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_ya [ ] = $row["J"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_ya);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนแผลผ่าตัดสะอาดปนเปื้อน


            </td>
            <?php
$sum_fh = array();
/////////////////////// F///////////////////
                                $year = "2025";
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];




foreach ($months as $key => $month) {

if($key<"10"){
    $k = "0".$key;
    //echo $k;
}else{
    $k = $key;
    //echo $k;
}
$month_a = $key; // January
$year = $year;

// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}



?>
            <td>

                <?php
        //echo $month."<br>";    
        $arr_wa_sum = array();
        $arr_wb_sum = array();
        $arr_wc_sum = array();
        $arr_wd_sum = array();


for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month_a-$day");
    if ($date && $date->format('n') == $month_a) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
    }
        
        //echo  "<br>Day-". $day . "<br>";
    //////////////////////// start F /////////////////////////////

    //////////////////////// Count G /////////////////////////////
    $a = "select count(`tableg_id`) AS WA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){
        if($row["WA"]> '0'){

            $a = "select count(`tableg_id`) AS WAA from tableg where timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
            $aQuery = mysqli_query($objCon,$a);
            while ($row = mysqli_fetch_array($aQuery)){
                if($row["WAA"]>0){
                    
                    $b = "select * from tableg where 1 AND timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
                    $bQuery = mysqli_query($objCon,$b);
                    while($row_b = mysqli_fetch_array($bQuery)){

                        if($row_b["g8"]!=""){
                            $g8 = $row_b["g8"];
                        }else{
                            $g8 = "0";
                        }
                        if($row_b["g17"]!=""){
                            $g17 = $row_b["g17"];
                        }else{
                            $g17 = "0";
                        }
                        if($row_b["g26"]!=""){
                            $g26 = $row_b["g26"];
                        }else{
                            $g26 = "0";
                        }
                        if($row_b["g35"]!=""){
                            $g35 = $row_b["g35"];
                        }else{
                            $g35 = "0";
                        }
                        if($row_b["g44"]!=""){
                            $g44 = $row_b["g44"];
                        }else{
                            $g44 = "0";
                        }
                        if($row_b["g53"]!=""){
                            $g53 = $row_b["g53"];
                        }else{
                            $g53 = "0";
                        }
                        if($row_b["g62"]!=""){
                            $g62 = $row_b["g62"];
                        }else{
                            $g62 = "0";
                        }
                        if($row_b["g71"]!=""){
                            $g71 = $row_b["g71"];
                        }else{
                            $g71 = "0";
                        }
                        if($row_b["g80"]!=""){
                            $g80 = $row_b["g80"];
                        }else{
                            $g80 = "0";
                        }

                        

                        $arr_wb_sum [ ] = $g8+$g17+$g26+$g35+$g44+$g53+$g62+$g71+$g80;

                    }//while
                }else{

                    $arr_wb_sum [ ] = "0";

                }

            }


        }else{

            $arr_wb_sum [ ] = 0;



        }

         //////////////////////// Count H /////////////////////////////




    }//while
   
    
}// for


?>

                <?php echo $sum_fh [ ] = array_sum($arr_wb_sum);?>


            </td>


            <?php }//foreach ?>


            <td>
                <?php echo array_sum($sum_fh);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการติดเชื่อของแผลสะอาดปนเปื้อน


            </td>
            <?php
$year = $year;

$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$ycx_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php


$yb_a = $array_ya[$key-1]; // ตัวอย่างค่า $a
$yb_d = $sum_fh[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($yb_d != 0) {
$yb_result = ($yb_a/$yb_d)*100;
echo sprintf("%.2f", $yb_result);
$ycx_result [ ] = sprintf("%.2f", $yb_result);
} else {
$ycx_result [ ] = 0;
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($ycx_result);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการติดเชื้อปนเปื้อน


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_v = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tabled1`.`d11`) AS K from tabled1 where `d11` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_v [ ] = $row["K"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_v);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนแผลผ่าตัดปนเปื้อน


            </td>
            <?php
$sum_fi = array();
/////////////////////// F///////////////////
                                $year = "2025";
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];


foreach ($months as $key => $month) {

if($key<"10"){
    $k = "0".$key;
    //echo $k;
}else{
    $k = $key;
    //echo $k;
}
$month_a = $key; // January
$year = $year;

// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}



?>
            <td>

                <?php
        //echo $month."<br>";    

        $arr_wc_sum = array();



for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month_a-$day");
    if ($date && $date->format('n') == $month_a) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
    }
        
        //echo  "<br>Day-". $day . "<br>";
    //////////////////////// start F /////////////////////////////

    //////////////////////// Count G /////////////////////////////
    $a = "select count(`tableg_id`) AS WA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){
        if($row["WA"]> '0'){

            $a = "select count(`tableg_id`) AS WAA from tableg where timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
            $aQuery = mysqli_query($objCon,$a);
            while ($row = mysqli_fetch_array($aQuery)){
                if($row["WAA"]>0){
                    
                    $b = "select * from tableg where 1 AND timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
                    $bQuery = mysqli_query($objCon,$b);
                    while($row_b = mysqli_fetch_array($bQuery)){
                        
                        if($row_b["g9"]!=""){
                            $g9 = $row_b["g9"];
                        }else{
                            $g9 = "0";
                        }
                        if($row_b["g18"]!=""){
                            $g18 = $row_b["g18"];
                        }else{
                            $g18 = "0";
                        }
                        if($row_b["g27"]!=""){
                            $g27 = $row_b["g27"];
                        }else{
                            $g27 = "0";
                        }
                        if($row_b["g36"]!=""){
                            $g36 = $row_b["g36"];
                        }else{
                            $g36 = "0";
                        }
                        if($row_b["g45"]!=""){
                            $g45 = $row_b["g45"];
                        }else{
                            $g45 = "0";
                        }
                        if($row_b["g54"]!=""){
                            $g54 = $row_b["g54"];
                        }else{
                            $g54 = "0";
                        }
                        if($row_b["g63"]!=""){
                            $g63 = $row_b["g63"];
                        }else{
                            $g63 = "0";
                        }
                        if($row_b["g72"]!=""){
                            $g72 = $row_b["g72"];
                        }else{
                            $g72 = "0";
                        }
                        if($row_b["g81"]!=""){
                            $g81 = $row_b["g81"];
                        }else{
                            $g81 = "0";
                        }
                        
                        
                        
                        $arr_wc_sum [ ] = $g9+$g18+$g27+$g36+$g45+$g54+$g63+$g72+$g81;
                        //echo "<br>";
                       
                    }//while
                }else{

                    $arr_wc_sum [ ] = "0";

                }

            }


        }else{

            $arr_wc_sum [ ] = 0;
        }

         //////////////////////// Count H /////////////////////////////




    }//while
   
    
}// for


?>

                <?php echo $sum_fi [ ] = array_sum($arr_wc_sum);?>


            </td>


            <?php }//foreach ?>


            <td>
                <?php echo array_sum($sum_fi);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการติดเชื้อของแผลปนเปื้อน


            </td>
            <?php
$year = $year;

$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$ydx_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php


$yd_a = $array_v[$key-1]; // ตัวอย่างค่า $a
$yd_d = $sum_fi[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($yd_d != 0) {
$yd_result = ($yd_a/$yd_d)*100;
echo sprintf("%.2f", $yd_result);
$ydx_result [ ] = sprintf("%.2f", $yd_result);
} else {
$ydx_result [ ] = 0;
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($ydx_result);?>
            </td>
        </tr>




        <tr>
            <td style="text-align: left;">


                จำนวนครั้งของการติดเชื้อสกปรก


            </td>
            <?php
$year = $year;

// วนลูปแสดงผลวันแรกและวันสุดท้ายของทุกเดือน
 
    
// แสดงชื่อเดือนทั้ง 12 เดือน
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$array_z = array();
foreach ($months as $key => $month) {
?>
            <td>

                <?php
                                        if($key<"10"){
                                            $k = "0".$key;
                                            //echo $k;
                                        }else{
                                            $k = $key;
                                            //echo $k;
                                        }
                                        ?>
                <?php //echo $month;?>
                <?php
                                           // วันแรกของเดือน
                                            $firstDay = date("Y-m-d", strtotime("$year-$k-01"));
                                            
                                            // วันสุดท้ายของเดือน
                                            $lastDay = date("Y-m-t", strtotime("$year-$k-01"));
                                            
                                            //echo "$firstDay - $lastDay";
                                          
                                        ?>
                <?php
$a = "select count(`tabled1`.`d12`) AS L from tabled1 where `d12` = '1' AND (timestamp between '$firstDay 00:00:00' and '$lastDay 23:59:59') ";
$aQuery = mysqli_query($objCon,$a);
while ($row = mysqli_fetch_array($aQuery)){
echo $array_z [ ] = $row["L"];
}?>



            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($array_z);?>
            </td>
        </tr>

        <tr>
            <td style="text-align: left;">


                จำนวนแผลผ่าตัดสกปรก


            </td>
            <?php
$sum_fj = array();
/////////////////////// F///////////////////
                                $year = "2025";
$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];




foreach ($months as $key => $month) {

if($key<"10"){
    $k = "0".$key;
    //echo $k;
}else{
    $k = $key;
    //echo $k;
}
$month_a = $key; // January
$year = $year;

// Initialize an array to simulate total counts for each day
$totalCounts = [];
for ($day = 1; $day <= 31; $day++) {
    $totalCounts[$day] = rand(0, 100); // Replace this with your logic or database query
}



?>
            <td>

                <?php
        //echo $month."<br>";    
        $arr_wa_sum = array();
        $arr_wb_sum = array();
        $arr_wc_sum = array();
        $arr_wd_sum = array();


for ($day = 1; $day <= 31; $day++) {
    // Ensure the day exists in the given month
    $date = DateTime::createFromFormat('Y-m-d', "$year-$month_a-$day");
    if ($date && $date->format('n') == $month_a) {
        if($day<10){
            $dayy = "0".$day;
        }else{
            $dayy = $day;
        }
    }
        
        //echo  "<br>Day-". $day . "<br>";
    //////////////////////// start F /////////////////////////////

    //////////////////////// Count G /////////////////////////////
    $a = "select count(`tableg_id`) AS WA from tableg where timestamp between '$year-$month-$dayy 00:00:00' and '$year-$month-$dayy 23:59:59' ";
    $aQuery = mysqli_query($objCon,$a);
    while ($row = mysqli_fetch_array($aQuery)){
        if($row["WA"]> '0'){

            $a = "select count(`tableg_id`) AS WAA from tableg where timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
            $aQuery = mysqli_query($objCon,$a);
            while ($row = mysqli_fetch_array($aQuery)){
                if($row["WAA"]>0){
                    
                    $b = "select * from tableg where 1 AND timestamp between '$year-$k-$dayy 00:00:00' and '$year-$k-$dayy 23:59:59' ";
                    $bQuery = mysqli_query($objCon,$b);
                    while($row_b = mysqli_fetch_array($bQuery)){
                       
                        if($row_b["g10"]!=""){
                            $g10 = $row_b["g10"];
                        }else{
                            $g10 = "0";
                        }
                        if($row_b["g19"]!=""){
                            $g19 = $row_b["g19"];
                        }else{
                            $g19 = "0";
                        }
                        if($row_b["g28"]!=""){
                            $g28 = $row_b["g28"];
                        }else{
                            $g28 = "0";
                        }
                        if($row_b["g37"]!=""){
                            $g37 = $row_b["g37"];
                        }else{
                            $g37 = "0";
                        }
                        if($row_b["g46"]!=""){
                            $g46 = $row_b["g46"];
                        }else{
                            $g46 = "0";
                        }
                        if($row_b["g55"]!=""){
                            $g55 = $row_b["g55"];
                        }else{
                            $g55 = "0";
                        }
                        if($row_b["g64"]!=""){
                            $g64 = $row_b["g64"];
                        }else{
                            $g64 = "0";
                        }
                        if($row_b["g73"]!=""){
                            $g73 = $row_b["g73"];
                        }else{
                            $g73 = "0";
                        }
                        if($row_b["g82"]!=""){
                            $g82 = $row_b["g82"];
                        }else{
                            $g82 = "0";
                        }
                        

                        $arr_wd_sum [ ] = $g10+$g19+$g28+$g37+$g46+$g55+$g64+$g73+$g82;
                        //echo "<br>";
                    }//while
                }else{

                    $arr_wd_sum [ ] = "0";
                }

            }


        }else{

            $arr_wc_sum [ ] = 0;

        }

         //////////////////////// Count H /////////////////////////////




    }//while
   
    
}// for


?>

                <?php echo $sum_fj [ ] = array_sum($arr_wd_sum);?>


            </td>


            <?php }//foreach ?>

            <td>
                <?php echo array_sum($sum_fj);?>
            </td>
        </tr>
        <tr style="border-bottom: 1px #DDD solid; background: #EEE;">
            <td style="text-align: left;">


                * อัตราการติดเชื้อของแผลสกปรก


            </td>
            <?php
$year = $year;

$months = [
1 => "ม.ค.",
2 => "ก.พ.",
3 => "มี.ค.",
4 => "เม.ย.",
5 => "พ.ค.",
6 => "มิ.ย.",
7 => "ก.ค.",
8 => "ส.ค.",
9 => "ก.ย.",
10 => "ต.ค.",
11 => "พ.ย.",
12 => "ธ.ค."
];
$yex_result = array ();
foreach ($months as $key => $month) {
?>
            <td>

                <?php


$ye_a = $array_z[$key-1]; // ตัวอย่างค่า $a
$ye_d = $sum_fj[$key-1];  // ตัวอย่างค่า $b

// ตรวจสอบว่าตัวหารไม่เป็นศูนย์
if ($ye_d != 0) {
$ye_result = ($ye_a/$ye_d)*100;
echo sprintf("%.2f", $ye_result);
$yex_result [ ] = sprintf("%.2f", $ye_result);
} else {
$yex_result [ ] = 0;
echo "0";
}
?>

            </td>
            <?php } ?>


            <td>
                <?php echo array_sum($yex_result);?>
            </td>
        </tr>





    </table>

</body>

</html>
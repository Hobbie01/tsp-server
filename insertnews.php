<?php
require("connect.php");

$title = $_POST["news_title"];
$type = $_POST["news_type"];
$details = $_POST["tiny"];


//echo "".$news_title." ".$news_type." ".$news_details;



$stmt = $pdo->prepare("INSERT INTO new_data VALUES ('', ?, ?, ?)");
$stmt->bindParam(1, $type);
$stmt->bindParam(2, $title);
$stmt->bindParam(3, $details);
$stmt->execute(); // เริ่มเพิ่มข้อมูล
header("location: shownews.php");

?>
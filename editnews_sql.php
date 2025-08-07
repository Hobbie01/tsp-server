<?php
require("connect.php");


$title = $_POST["news_name"];
$type = $_POST["news_type"];
$details = $_POST["tiny"];
$id = $_POST["id"];

echo "".$title." ".$type." ".$details." ".$id;



$stmt = $pdo->prepare("update news set news_name=?, news_type=?, news_detail=? where news_id=?");
$stmt->bindParam(2, $type);
$stmt->bindParam(1, $title);
$stmt->bindParam(3, $details);
$stmt->bindParam(4, $id);
$stmt->execute(); // เริ่มเพิ่มข้อมูล
header("location: newsdetails.php?news_id=$id");

?>
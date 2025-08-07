<?php
// ไฟล์สำหรับสร้างบัญชีผู้ใช้ใหม่
include('mysql_connect.php');

// ข้อมูลบัญชีใหม่
$new_username = 'user1';
$new_password = '123456';
$type_ward = 102; // ใช้ค่าเดียวกับ admin1
$status = '1'; // 1 = active
$type_user = '4'; // 4 = admin

// เข้ารหัส password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// SQL สำหรับเพิ่มบัญชี
$sql = "INSERT INTO user (username, password, type_ward, status, type_user) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conip->prepare($sql);
$stmt->bind_param("sssss", $new_username, $hashed_password, $type_ward, $status, $type_user);

if ($stmt->execute()) {
    echo "✅ สร้างบัญชีสำเร็จ!<br>";
    echo "Username: $new_username<br>";
    echo "Password: $new_password<br>";
    echo "Type: Admin (type_user = 4)<br>";
    echo "<br>สามารถใช้ข้อมูลนี้เข้าสู่ระบบได้เลย!";
} else {
    echo "❌ เกิดข้อผิดพลาด: " . $stmt->error;
}

$stmt->close();
$conip->close();
?>

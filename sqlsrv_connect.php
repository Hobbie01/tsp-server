<?php
// แก้ไขให้ใช้ MySQL แทน SQL Server
// เนื่องจากเราใช้ Docker MySQL

// ใช้การเชื่อมต่อ MySQL ที่มีอยู่แล้ว
// ไฟล์นี้จะไม่ใช้ฟังก์ชัน sqlsrv_connect() อีกต่อไป

// หากต้องการใช้ SQL Server ในอนาคต ให้ติดตั้ง sqlsrv extension ก่อน
// สำหรับตอนนี้ให้ใช้ MySQL ที่มีอยู่แล้ว

// สร้างตัวแปร $conn เป็น null เพื่อไม่ให้เกิด error
$conn = null;

// ข้อความแจ้งเตือน
// echo "SQL Server connection disabled. Using MySQL instead.";
?>
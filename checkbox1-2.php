<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['options']) && count($_POST['options']) >= 3) {
        echo "คุณเลือก: " . implode(", ", $_POST['options']);
    } else {
        echo "กรุณาเลือกอย่างน้อย 3 รายการ";
    }
} else {
    echo "ไม่พบข้อมูลที่ส่งมา";
}
?>

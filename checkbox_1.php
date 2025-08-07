<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบช่องกรอกข้อมูล</title>
    <script>
        function toggleInputs(changedInput) {
            let input1 = document.getElementById("input1");
            let input2 = document.getElementById("input2");
            let checkbox = document.getElementById("checkbox");

            if (changedInput === 'input1' && input1.value.trim() !== '') {
                input2.disabled = true;
                checkbox.checked = false;
            } else if (changedInput === 'input2' && input2.value.trim() !== '') {
                input1.disabled = true;
                checkbox.checked = true;
            } else {
                input1.disabled = false;
                input2.disabled = false;
                checkbox.checked = false;
            }
        }
    </script>
</head>
<body>

    <form method="post">
        <label>กรอกข้อมูลช่องที่ 1:</label>
        <input type="text" id="input1" name="input1" oninput="toggleInputs('input1')"><br><br>

        <label>กรอกข้อมูลช่องที่ 2:</label>
        <input type="text" id="input2" name="input2" oninput="toggleInputs('input2')"><br><br>

        <input type="checkbox" id="checkbox" disabled> ช่องที่ 2 ถูกปิดใช้งานเมื่อช่องที่ 1 ถูกกรอก<br><br>

        <input type="submit" name="submit" value="ส่งข้อมูล">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input1 = isset($_POST['input1']) ? $_POST['input1'] : '';
        $input2 = isset($_POST['input2']) ? $_POST['input2'] : '';

        if (!empty($input1) && !empty($input2)) {
            echo "<p style='color:red;'>กรุณากรอกเพียงช่องเดียวเท่านั้น!</p>";
        } elseif (!empty($input1)) {
            echo "<p>คุณกรอกข้อมูลช่องที่ 1: $input1</p>";
        } elseif (!empty($input2)) {
            echo "<p>คุณกรอกข้อมูลช่องที่ 2: $input2</p>";
        } else {
            echo "<p style='color:red;'>กรุณากรอกข้อมูลในช่องใดช่องหนึ่ง!</p>";
        }
    }
    ?>

</body>
</html>

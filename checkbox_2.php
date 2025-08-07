<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบการกรอกข้อมูลแบบกลุ่ม</title>
    <script>
        function toggleGroup(group) {
            let groups = ['group1', 'group2'];
            groups.forEach(g => {
                let inputs = document.querySelectorAll('.' + g);
                let checkbox = document.getElementById(g + '_checkbox');

                if (g === group) {
                    let hasValue = Array.from(inputs).some(input => input.value.trim() !== '');
                    checkbox.checked = hasValue;
                    if (hasValue) {
                        disableGroup(groups.filter(grp => grp !== group));
                    } else {
                        enableAllGroups();
                    }
                }
            });
        }

        function disableGroup(groups) {
            groups.forEach(g => {
                document.querySelectorAll('.' + g).forEach(input => {
                    input.disabled = true;
                    input.value = ''; // ล้างค่าเมื่อปิดการใช้งาน
                });
                document.getElementById(g + '_checkbox').checked = false;
            });
        }

        function enableAllGroups() {
            document.querySelectorAll('input[type="text"]').forEach(input => input.disabled = false);
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
        }
    </script>
</head>
<body>

    <form method="post">
        <h3>กลุ่มที่ 1</h3>
        <input type="text" class="group1" name="group1_input1" placeholder="ช่องที่ 1 (กลุ่ม 1)" oninput="toggleGroup('group1')"><br>
        <input type="text" class="group1" name="group1_input2" placeholder="ช่องที่ 2 (กลุ่ม 1)" oninput="toggleGroup('group1')"><br>
        <input type="checkbox" id="group1_checkbox" disabled> เลือกกลุ่มที่ 1<br><br>

        <h3>กลุ่มที่ 2</h3>
        <input type="text" class="group2" name="group2_input1" placeholder="ช่องที่ 1 (กลุ่ม 2)" oninput="toggleGroup('group2')"><br>
        <input type="text" class="group2" name="group2_input2" placeholder="ช่องที่ 2 (กลุ่ม 2)" oninput="toggleGroup('group2')"><br>
        <input type="checkbox" id="group2_checkbox" disabled> เลือกกลุ่มที่ 2<br><br>

        <input type="submit" name="submit" value="ส่งข้อมูล">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $group1_input1 = isset($_POST['group1_input1']) ? $_POST['group1_input1'] : '';
        $group1_input2 = isset($_POST['group1_input2']) ? $_POST['group1_input2'] : '';
        $group2_input1 = isset($_POST['group2_input1']) ? $_POST['group2_input1'] : '';
        $group2_input2 = isset($_POST['group2_input2']) ? $_POST['group2_input2'] : '';

        $group1_filled = !empty($group1_input1) || !empty($group1_input2);
        $group2_filled = !empty($group2_input1) || !empty($group2_input2);

        if ($group1_filled && $group2_filled) {
            echo "<p style='color:red;'>กรุณากรอกข้อมูลเพียงกลุ่มเดียว!</p>";
        } elseif ($group1_filled) {
            echo "<p>คุณกรอกข้อมูลจาก <strong>กลุ่มที่ 1</strong>:</p>";
            echo "<p>ช่องที่ 1: $group1_input1</p>";
            echo "<p>ช่องที่ 2: $group1_input2</p>";
        } elseif ($group2_filled) {
            echo "<p>คุณกรอกข้อมูลจาก <strong>กลุ่มที่ 2</strong>:</p>";
            echo "<p>ช่องที่ 1: $group2_input1</p>";
            echo "<p>ช่องที่ 2: $group2_input2</p>";
        } else {
            echo "<p style='color:red;'>กรุณากรอกข้อมูลในกลุ่มใดกลุ่มหนึ่ง!</p>";
        }
    }
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบการกรอกข้อมูลแบบกลุ่ม</title>
    <script>
        function toggleGroup(group) {
            let groups = ['group1', 'group2', 'group3'];
            let selectedInputs = document.querySelectorAll('.' + group);
            let selectedCheckbox = document.getElementById(group + '_checkbox');
            let filledCount = Array.from(selectedInputs).filter(input => input.value.trim() !== '').length;

            if (filledCount >= 3) {
                selectedCheckbox.checked = true;
                disableOtherGroups(group, groups);
            } else {
                selectedCheckbox.checked = false;
                enableAllGroups(groups);
            }

            checkSubmitButton();
        }

        function disableOtherGroups(activeGroup, groups) {
            groups.forEach(g => {
                if (g !== activeGroup) {
                    document.querySelectorAll('.' + g).forEach(input => {
                        input.disabled = true;
                        input.value = ''; // ล้างค่าหากกลุ่มถูกปิดใช้งาน
                    });
                    document.getElementById(g + '_checkbox').checked = false;
                }
            });
        }

        function enableAllGroups(groups) {
            groups.forEach(g => {
                document.querySelectorAll('.' + g).forEach(input => input.disabled = false);
                document.getElementById(g + '_checkbox').checked = false;
            });
        }

        function checkSubmitButton() {
            let groups = ['group1', 'group2', 'group3'];
            let isValid = groups.some(group => {
                let filledCount = Array.from(document.querySelectorAll('.' + group)).filter(input => input.value.trim() !== '').length;
                return filledCount >= 3;
            });
            document.getElementById('submitBtn').disabled = !isValid;
        }
    </script>
</head>
<body>

    <form method="post">
        <h3>กลุ่มที่ 1</h3>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <input type="text" class="group1" name="group1_input<?php echo $i; ?>" placeholder="ช่องที่ <?php echo $i; ?> (กลุ่ม 1)" oninput="toggleGroup('group1')"><br>
        <?php endfor; ?>
        <input type="checkbox" id="group1_checkbox" disabled> เลือกกลุ่มที่ 1<br><br>

        <h3>กลุ่มที่ 2</h3>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <input type="text" class="group2" name="group2_input<?php echo $i; ?>" placeholder="ช่องที่ <?php echo $i; ?> (กลุ่ม 2)" oninput="toggleGroup('group2')"><br>
        <?php endfor; ?>
        <input type="checkbox" id="group2_checkbox" disabled> เลือกกลุ่มที่ 2<br><br>

        <h3>กลุ่มที่ 3</h3>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <input type="text" class="group3" name="group3_input<?php echo $i; ?>" placeholder="ช่องที่ <?php echo $i; ?> (กลุ่ม 3)" oninput="toggleGroup('group3')"><br>
        <?php endfor; ?>
        <input type="checkbox" id="group3_checkbox" disabled> เลือกกลุ่มที่ 3<br><br>

        <input type="submit" id="submitBtn" name="submit" value="ส่งข้อมูล" disabled>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function countFilledInputs($group, $total) {
            $count = 0;
            for ($i = 1; $i <= $total; $i++) {
                if (!empty($_POST[$group . '_input' . $i])) {
                    $count++;
                }
            }
            return $count;
        }

        $group1_filled = countFilledInputs('group1', 10);
        $group2_filled = countFilledInputs('group2', 10);
        $group3_filled = countFilledInputs('group3', 10);

        $selectedGroups = array_filter([$group1_filled, $group2_filled, $group3_filled], fn($count) => $count >= 3);

        if (count($selectedGroups) > 1) {
            echo "<p style='color:red;'>กรุณากรอกข้อมูลเพียงกลุ่มเดียว!</p>";
        } elseif (count($selectedGroups) === 0) {
            echo "<p style='color:red;'>กรุณากรอกข้อมูลในกลุ่มใดกลุ่มหนึ่งอย่างน้อย 3 ช่อง!</p>";
        } else {
            $selectedGroup = array_search(reset($selectedGroups), [$group1_filled, $group2_filled, $group3_filled]) + 1;
            echo "<p>คุณกรอกข้อมูลจาก <strong>กลุ่มที่ $selectedGroup</strong>:</p>";
            echo "<p>จำนวนช่องที่กรอก: " . reset($selectedGroups) . " ช่อง</p>";
        }
    }
    ?>

</body>
</html>

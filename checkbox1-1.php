<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Validation</title>
    <script>
        function validateCheckboxes() {
            let checkboxes = document.querySelectorAll('input[name="options[]"]:checked');
            let submitButton = document.getElementById('submitBtn');

            if (checkboxes.length >= 3) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            validateCheckboxes();
            let checkboxes = document.querySelectorAll('input[name="options[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", validateCheckboxes);
            });
        });
    </script>
</head>
<body>

    <form action="checkbox1-2.php" method="post">
        <h3>เลือกอย่างน้อย 3 รายการ</h3>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<label><input type='checkbox' name='options[]' value='option$i'> ตัวเลือก $i</label><br>";
        }
        ?>
        <br>
        <button type="submit" id="submitBtn" disabled>บันทึก</button>
    </form>

</body>
</html>

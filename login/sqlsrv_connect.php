
<?php

// Docker environment configuration
$servername = getenv('DB_HOST') ?: 'db';
$username = getenv('DB_USER') ?: 'tspapp';
$pass = getenv('DB_PASSWORD') ?: 'db@pptsp';
$dbname = getenv('DB_NAME') ?: 'tsp';

// สร้างการเชื่อมต่อ
$objCon = new mysqli($servername, $username, $pass, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($objCon->connect_error) {
    die("Connection failed: " . $objCon->connect_error);
}
//echo "Connected successfully";

// $objCon->close();

?>

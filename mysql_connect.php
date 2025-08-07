<?php 
// Docker environment configuration
$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'tspapp';
$password = getenv('DB_PASSWORD') ?: 'db@pptsp';
$database = getenv('DB_NAME') ?: 'tsp';

$conip = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} //else echo "OK";

// Legacy configuration (commented out)
// $serverName = "localhost";
// $userName = "root";
// $userPassword = "12345678";
// $dbName = "dbtsp";
// $conip  = mysqli_connect($serverName,$userName,$userPassword,$dbName);
?>
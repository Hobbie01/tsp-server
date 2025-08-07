<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	//$conn =new mysqli('db', 'tspdb', 't@5sp6' , 'db_tsp');
$servername = "db"; // เช่น 'localhost'
$username = "tspdb";
$password = "t@5sp6";
$dbname = "db_tsp";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// // ตรวจสอบการเชื่อมต่อ
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


	$sql = $conn->prepare("SELECT * FROM type_department WHERE name_department LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$countryResult[] = $row["name_department"];
		//$countryResult[] = $row["id_department"]."(".$row["name_department"].")";
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>


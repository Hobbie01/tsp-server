<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'tspapp', 'db@pptsp' , 'tsp');

	$sql = $conn->prepare("SELECT * FROM ward WHERE ward_name LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$countryResult[] = $row["nursing"]."(".$row["ward_name"].")";
		//$countryResult[] = $row["nursing"]."(".$row["ward_name"].")";
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>


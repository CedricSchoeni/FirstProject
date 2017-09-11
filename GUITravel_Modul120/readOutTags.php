<?php
	/**
	*	Opens Connection and checks if posted data is equal to database
	*/
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "shop_database";
	

	// 	Create Connection
	$conn = new mysqli($servername,$username,$password,$dbname);
	// 	Check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connection_error);
	}

	$sql = "SELECT * FROM tag";
	$result = $conn->query($sql) or die($conn->error);

	$tag_id = array();
	$tag_name = array();

	$i = 0;
	while($row = $result->fetch_assoc()){
		$tag_id[$i] = $row['id'];
		$tag_name[$i] = $row['TagName'];
		$i++;
	}

	$conn->close();
?>
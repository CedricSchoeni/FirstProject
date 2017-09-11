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

	$sql = "SELECT * FROM item_tag";
	$result = $conn->query($sql) or die($conn->error);

	$tagItem_id = array();
	$tagItem_itemFK = array();
	$tagItem_tagFK = array();

	$i = 0;
	while($row = $result->fetch_assoc()){
		$tagItem_id[$i] = $row['id'];
		$tagItem_itemFK[$i] = $row['itemFK'];
		$tagItem_tagFK[$i] = $row['tagFK'];
		$i++;
	}

	$conn->close();
?>
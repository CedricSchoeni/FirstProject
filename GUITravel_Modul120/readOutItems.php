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

	$sql = "SELECT * FROM item";
	$result = $conn->query($sql) or die($conn->error);

	$item_id = array();
	$item_name = array();
	$item_description = array();
	$item_imagePath = array();
	$item_price = array();
	$item_stockCount = array();

	$i = 0;
	while($row = $result->fetch_assoc()){
		$item_id[$i] = $row['id'];
		$item_name[$i] = $row['ItemName'];
		$item_description[$i] = $row['ItemDescription'];
		$item_imagePath[$i] = $row['ItemImagePath'];
		$item_price[$i] = $row['ItemPrice'];
		$item_stockCount[$i] = $row['ItemsInStock'];
		$i++;
	}

	$conn->close();
?>
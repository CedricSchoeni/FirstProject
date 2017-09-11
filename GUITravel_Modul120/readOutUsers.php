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

	$sql = "SELECT * FROM User";
	$result = $conn->query($sql) or die($conn->error);

	$user_id = array();
	$user_username = array();
	$user_password = array();
	$user_birthdate = array();

	$i = 0;
	while($row = $result->fetch_assoc()){
		$user_id[$i] = $row['id'];
		$user_username[$i] = $row['Username'];
		$user_password[$i] = $row['Password'];
		$user_birthdate[$i] = $row['BirthDate'];
		$i++;
	}

	$conn->close();
?>
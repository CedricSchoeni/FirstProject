<?php
	session_start();
?>
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

	$newItemName = $_POST['ItemName'];
	$newItemDescription = $_POST['ItemDescription'];
	$newItemImagePath = $_POST['ItemImagePath'];
	$newItemPrice = $_POST['ItemPrice'];
	$newItemsInStock = $_POST['ItemsInStock'];

	$sql = "INSERT INTO item (ItemName, ItemDescription, ItemImagePath, ItemPrice, ItemsInStock)
			 VALUES ('$newItemName', '$newItemDescription', '$newItemImagePath', '$newItemPrice', '$newItemsInStock')";
			 
	if ($conn->query($sql) === TRUE){
		echo'Item added successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
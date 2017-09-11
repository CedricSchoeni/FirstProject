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

	$itemID = $_POST['itemID'];
	$newItemName = $_POST['ItemName'];
	$newItemDescription = $_POST['ItemDescription'];
	$newItemImagePath = $_POST['ItemImagePath'];
	$newItemPrice = $_POST['ItemPrice'];
	$newItemsInStock = $_POST['ItemsInStock'];

	$sql = "UPDATE `item` SET `ItemName`='$newItemName',`ItemDescription`='$newItemDescription',`ItemImagePath`='$newItemImagePath' ,`ItemPrice`='$newItemPrice' ,`ItemsInStock`='$newItemsInStock' WHERE `id`=$itemID";
	
	$result = $conn->query($sql) or die($conn->error);			 
	if ($conn->query($sql) === TRUE){
		echo'Item updated successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
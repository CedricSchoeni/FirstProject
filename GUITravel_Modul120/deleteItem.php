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
	$sql = "DELETE FROM item WHERE id='$itemID'";

	$result = $conn->query($sql) or die($conn->error);			 
	if ($conn->query($sql) === TRUE){
		echo'Item deleted successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
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

	$tagID = $_POST['tagID'];
	$sql = "DELETE FROM tag WHERE id='$tagID'";

	$result = $conn->query($sql) or die($conn->error);			 
	if ($conn->query($sql) === TRUE){
		echo'Tag deleted successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
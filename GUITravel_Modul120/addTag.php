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

	$newTagName = $_POST['TagName'];

	// Check if tag already exists
	$sql = "SELECT * FROM tag where TagName='$newTagName'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows > 0){	
		echo'Tag already exists!';
		return;
	}

	$sql = "INSERT INTO `tag` (`TagName`) VALUES ('$newTagName')";
			 
	if ($conn->query($sql) === TRUE){
		echo'Item added successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
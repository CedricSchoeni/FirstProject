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

	$userID = $_POST['userID'];
	$newUsername = $_POST['Username'];
	$newPassword = $_POST['Password'];
	$newBDate = date('Y-m-d', strtotime($_POST['Date']));


	// Check if username already exists
	$sql = "SELECT * FROM user where Username='$newUsername'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows > 0){	
		echo'Username already exists!';
		return;
	}


	$sql = "UPDATE `user` SET `Username`='$newUsername',`Password`='$newPassword',`BirthDate`='$newBDate' WHERE `id`=$userID";
	
	$result = $conn->query($sql) or die($conn->error);			 
	if ($conn->query($sql) === TRUE){
		echo'User updated successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
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

	$newUsername = $_POST['Username'];
	$newPassword = $_POST['Password'];
	$newBDate = $_POST['Date'];

	// Check if username already exists
	$sql = "SELECT * FROM User where Username='$newUsername'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows > 0){	
		echo'Username already exists!';
		return;
	}

	$sql = "INSERT INTO user (Username, Password, BirthDate)
			 VALUES ('$newUsername', '$newPassword', '$newBDate')";
			 
	if ($conn->query($sql) === TRUE){
		echo'User created successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
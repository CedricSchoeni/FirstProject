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
	
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];

	$sql = "SELECT * FROM User where Username='$Username' and Password='$Password'";
	$result = $conn->query($sql) or die($conn->error);

	if ($result->num_rows > 0){
		echo'Logged in successfully';
		$_SESSION['Username'] = $Username;
	} else {
		echo'Username or Password false';
	}

	$conn->close();
?>
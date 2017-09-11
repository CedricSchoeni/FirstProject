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

	$tagItemID = $_POST['tagItemID'];
	$newItemFK = $_POST['ItemFK'];
	$newTagFK = $_POST['TagFK'];


	// Check if item exists
	$sql = "SELECT * FROM item where id='$newItemFK'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows == 0){	
		echo'Item does not exist!';
		return;
	}

	// Check if tag exists
	$sql = "SELECT * FROM tag where id='$newTagFK'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows == 0){	
		echo'Tag does not exist!';
		return;
	}

	// Check if item already has this tag
	$sql = "SELECT * FROM item_tag where itemFK='$newItemFK' AND tagFK='$newTagFK'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows > 0){	
		echo'Item already has this tag!';
		return;
	}

	$sql = "UPDATE `item_tag` SET `itemFK`='$newItemFK',`tagFK`='$newTagFK' WHERE `id`=$tagItemID";
	
	$result = $conn->query($sql) or die($conn->error);			 
	if ($conn->query($sql) === TRUE){
		echo'itemTags updated successfully';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
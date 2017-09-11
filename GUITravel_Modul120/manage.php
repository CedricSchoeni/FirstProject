<?php 
    session_start();

	//if(isset($_SESSION['Username'])) echo$_SESSION['Username'];
	include"readOutUsers.php";
	include"readOutItems.php";
	include"readOutTags.php";
	include"readOutTag_Items.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>hi</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

 	<script type="text/javascript">
 		function register(){
 			var username = $("#registerForm").children().eq(1).val();
 			var password = $("#registerForm").children().eq(2).val();
 			var repeatPassword = $("#registerForm").children().eq(3).val();
 			var date = $("#registerForm").children().eq(4).val();

 			var errorMessage = "";

 			if (password != repeatPassword){
 				errorMessage = "Passwords must match";
 			}
			
 			if (errorMessage != ""){
 				$("#registerForm p").text(errorMessage);
 				$("#registerForm p").removeClass("disabled");
 				return;
 			}

 			$.ajax({
				type: 'post',
				url: 'register.php',
				data: $('#registerForm input').serialize(),
				success: function(response) {
					if(response != ""){
						if (response == "Username already exists!"){
							$("#registerForm p").text("Username already exists!");
							$("#registerForm p").removeClass("disabled");
						} else {
							alert(response);
						location.reload();
						}
					}
				}
			});
 		}	

 		function login(){
 			$.ajax({
				type: 'post',
				url: 'login.php',
				data: $('#loginForm input').serialize(),
				success: function(response) {
					if(response != ""){
						if (response == "Username or Password false"){
							$("#loginForm p").text("Username or Password false");
							$("#loginForm p").removeClass("disabled");
						} else {
							alert(response);
						location.reload();
						}
					}
				}
			});
 		}	

		function deleteUser(userID, row){
			$(row).parents("tr").remove();
 			$.ajax({
				type: 'post',
				url: 'deleteUser.php',
				data: {"userID":userID},
				success: function(response) {
					if(response != ""){
						alert(response);
					}
				}
			});
 		}

 		function updateUser(userID, row){
 			var username = $(row).parents("tr").children().eq(1).children().first().val();
 			var password = $(row).parents("tr").children().eq(2).children().first().val();
 			var date = $(row).parents("tr").children().eq(3).children().first().val();
 			$.ajax({
				type: 'post',
				url: 'updateUser.php',
				data: {"userID":userID,
					   "Username":username,
					   "Password":password,
					   "Date":date},
				success: function(response) {
					if(response != ""){
						if (response == "Username already exists!"){
							$("#errorMessageTable2").text("Username already exists!");
							$("#errorMessageTable2").removeClass("disabled");
						} else {
							alert(response);
						location.reload();
						}
					}
				}
			});
 		}

 		function addItem(){
 			$.ajax({
				type: 'post',
				url: 'addItem.php',
				data: $('#itemForm input').serialize(),
				success: function(response) {
					if(response != ""){
						alert(response);
						location.reload();
					}
				}
			});
 		}	

 		function updateItem(itemID, row){
			var ItemName = $(row).parents("tr").children().eq(1).children().first().val();
 			var ItemDescription = $(row).parents("tr").children().eq(2).children().first().val();
 			var ItemImagePath = $(row).parents("tr").children().eq(3).children().first().val();
 			var ItemPrice = $(row).parents("tr").children().eq(4).children().first().val();
 			var ItemsInStock = $(row).parents("tr").children().eq(5).children().first().val();
 			$.ajax({
				type: 'post',
				url: 'updateItem.php',
				data: {"itemID":itemID,
					   "ItemName":ItemName,
					   "ItemDescription":ItemDescription,
					   "ItemImagePath":ItemImagePath,
					   "ItemPrice":ItemPrice,
					   "ItemsInStock":ItemsInStock},
				success: function(response) {
					if(response != ""){
						alert(response);
						location.reload();
					}
				}
			});
 		}

 		function deleteItem(itemID, row){
			$(row).parents("tr").remove();
 			$.ajax({
				type: 'post',
				url: 'deleteItem.php',
				data: {"itemID":itemID},
				success: function(response) {
					if(response != ""){
						alert(response);
					}
				}
			});
 		}

 		function addTag(){
 			$.ajax({
				type: 'post',
				url: 'addTag.php',
				data: $('#tagForm input').serialize(),
				success: function(response) {
					if(response != ""){
						if (response == "Tag already exists!"){
							$("#tagForm p").text("Tag already exists!");
							$("#tagForm p").removeClass("disabled");
						} else {
							alert(response);
							location.reload();
						}
					}
				}
			});
 		}

 		function deleteTag(tagID, row){
 			$(row).parents("tr").remove();
 			$.ajax({
				type: 'post',
				url: 'deleteTag.php',
				data: {"tagID":tagID},
				success: function(response) {
					if(response != ""){
						alert(response);
					}
				}
			});
 		}

 		function updateTag(tagID, row){
			var TagName = $(row).parents("tr").children().eq(1).children().first().val();
 			$.ajax({
				type: 'post',
				url: 'updateTag.php',
				data: {"TagName":TagName,
					   "tagID":tagID},
				success: function(response) {
					if(response != ""){
						alert(response);
						location.reload();
					}
				}
			});
 		}

 		function addTagToItem(){
 			$.ajax({
				type: 'post',
				url: 'addTagToItem.php',
				data: $('#tagToItemForm input').serialize(),
				success: function(response) {
					if(response != ""){
						if (response == "Item already has this tag!"){
							$("#tagToItemForm p").text("Item already has this tag!");
							$("#tagToItemForm p").removeClass("disabled");
						} else if (response == "Item does not exist!"){
							$("#tagToItemForm p").text("Item does not exist!");
							$("#tagToItemForm p").removeClass("disabled");
						} else if (response == "Tag does not exist!"){
							$("#tagToItemForm p").text("Tag does not exist!");
							$("#tagToItemForm p").removeClass("disabled");
						} else {
							alert(response);
							location.reload();
						}
					}
				}
			});
 		}

 		function updateTagItem(tagItemID, row){
			var ItemFK = $(row).parents("tr").children().eq(1).children().first().val();
			var TagFK = $(row).parents("tr").children().eq(2).children().first().val();
 			$.ajax({
				type: 'post',
				url: 'udpateTagItem.php',
				data: {"ItemFK":ItemFK,
					   "TagFK":TagFK,
					   "tagItemID":tagItemID},
				success: function(response) {
					if(response != ""){
						if (response == "Item already has this tag!"){
							$("#errorMessageTable").text("Item already has this tag!");
							$("#errorMessageTable").removeClass("disabled");
						} else if (response == "Item does not exist!"){
							$("#errorMessageTable").text("Item does not exist!");
							$("#errorMessageTable").removeClass("disabled");
						} else if (response == "Tag does not exist!"){
							$("#errorMessageTable").text("Tag does not exist!");
							$("#errorMessageTable").removeClass("disabled");
						} else {
							alert(response);
							location.reload();
						}
					}
				}
			});
 		}

 		function deleteTagItem(tagItemID,row){
 			$(row).parents("tr").remove();
 			$.ajax({
				type: 'post',
				url: 'deleteTagItem.php',
				data: {"tagItemID":tagItemID},
				success: function(response) {
					if(response != ""){
						alert(response);
					}
				}
			});
 		}
 	</script>
 </head>
 <body>

<div class="headerContainer">
	<a href="realrealindex.php">
		<div class="iconContainer left hoverPadding">
			<img src="Images/homeIcon.png">
		</div>
	</a>

	<div class="headerTableLayout">
		<a href="#">
			<div class="headerTableCell colorTransition">
				<p>Shop</p>
			</div>
		</a>

		<a href="manage.php">
			<div class="headerTableCell colorTransition">
				<p>Manage Database</p>
			</div>
		</a>
	</div>

	<a href="#">
		<div class="iconContainer right hoverPadding">
			<img src="Images/shoppingCartIcon.png">
		</div>
	</a>
</div>


<div class="mainContainer">
	<div class="sectionContainer">
		<h2 class="center underline">Manage Table: Users</h2>
		<h3 class="sectionHeader underline center">Login</h3>
		<div class="loginContanier">
			<form method="POST" id="loginForm"  onSubmit="login();return false;">
				<p style="color:red" class="disabled"></p>
				<input type="text" name="Username" placeholder="Username" required>
				<input type="password" name="Password" placeholder="Password" required>
				<input type="submit" value="Login">
			</form>
		</div>

		<h3 class="sectionHeader underline center">Register new User</h3>
		<div class="registerContanier">	
			<form method="POST" id="registerForm" onSubmit="register();return false;">
				<p style="color:red" class="disabled"></p>
				<input type="text" name="Username" placeholder="Username" required>
				<input type="password" name="Password" placeholder="Password" required>
				<input type="password" name="PasswordRepeat" placeholder="Repeat Password" required>
				<input type="date" name="Date" required>
				<input type="submit" value="Register">
			</form>
		</div>

		<h3 class="sectionHeader underline center">Manage existing Users</h3>
		<p id="errorMessageTable2" style="color:red" class="disabled"></p>
		<table>
		<tr><th>id</th><th>username</th><th>password</th><th>birth date</th><th>update</th><th>delete</th></tr>
		<?php
			for ($i=0; $i < count($user_id); $i++) { 
				echo'<tr>';
				echo'<td>'.$user_id[$i].'</td>';
				echo'<td><textarea>'.$user_username[$i].'</textarea></td>';
				echo'<td><textarea>'.$user_password[$i].'</textarea></td>';
				echo'<td><textarea>'.$user_birthdate[$i].'</textarea></td>';
				echo'<td><button style="background-color:green;color:white;" onClick="updateUser(\''.$user_id[$i].'\',this)">update</button></td>';
				echo'<td><button style="background-color:red;" onClick="deleteUser(\''.$user_id[$i].'\',this)">delete</button></td>';
				echo'</tr>';
			}
		?>
		</table>
	</div>


	<div class="sectionContainer">
		<h2 class="center underline">Manage Table: Items</h2>
		<h3 class="sectionHeader underline center">Add new Item</h3>
		<div class="addItemContanier">
			<form method="POST" id="itemForm" onSubmit="addItem();return false;">
				<p style="color:red" class="disabled"></p>
				<input type="text" name="ItemName" placeholder="Item Name" required>
				<input type="text" name="ItemDescription" placeholder="Item Description" required>
				<input type="text" name="ItemImagePath" placeholder="Item Image Path" required>
				<input type="text" name="ItemPrice" placeholder="Item Price" required>
				<input type="text" name="ItemsInStock" placeholder="Items in Stock" required>
				<input type="submit" value="Add">
			</form>
		</div>

		<h3 class="sectionHeader underline center">Manage existing Items</h3>
		<table>
		<tr><th>id</th><th>name</th><th>description</th><th>image path</th><th>price</th><th>stock count</th><th>update</th><th>delete</th></tr>
		<?php
			for ($i=0; $i < count($item_id); $i++) { 
				echo'<tr>';
				echo'<td>'.$item_id[$i].'</td>';
				echo'<td><textarea>'.$item_name[$i].'</textarea></td>';
				echo'<td><textarea>'.$item_description[$i].'</textarea></td>';
				echo'<td><textarea>'.$item_imagePath[$i].'</textarea></td>';
				echo'<td><textarea>'.$item_price[$i].'</textarea></td>';
				echo'<td><textarea>'.$item_stockCount[$i].'</textarea></td>';
				echo'<td><button style="background-color:green;color:white;" onClick="updateItem(\''.$item_id[$i].'\',this)">update</button></td>';
				echo'<td><button style="background-color:red;" onClick="deleteItem(\''.$item_id[$i].'\',this)">delete</button></td>';
				echo'</tr>';
			}
		?>
		</table>
	</div>


	<div class="sectionContainer">
		<h2 class="center underline">Manage Table: Tags</h2>
		<h3 class="sectionHeader underline center">Add new Tag</h3>
		<div class="addTagContanier">
			<form method="POST" id="tagForm" onSubmit="addTag();return false;">
				<p style="color:red" class="disabled"></p>
				<input type="text" name="TagName" placeholder="Tag Name" required>
				<input type="submit" value="Add">
			</form>
		</div>

		<h3 class="sectionHeader underline center">Manage existing Tags</h3>
		<table>
		<tr><th>id</th><th>name</th><th>update</th><th>delete</th></tr>
		<?php
			for ($i=0; $i < count($tag_id); $i++) { 
				echo'<tr>';
				echo'<td>'.$tag_id[$i].'</td>';
				echo'<td><textarea>'.$tag_name[$i].'</textarea></td>';
				echo'<td><button style="background-color:green;color:white;" onClick="updateTag(\''.$tag_id[$i].'\',this)">update</button></td>';
				echo'<td><button style="background-color:red;" onClick="deleteTag(\''.$tag_id[$i].'\',this)">delete</button></td>';
				echo'</tr>';
			}
		?>
		</table>
	</div>

	<div class="sectionContainer">
		<h2 class="center underline">Manage Table: Item_Tag</h2>
		<h3 class="sectionHeader underline center">Add new Tag to an existing Item</h3>
		<div class="addTagToItemContanier">
			<form method="POST" id="tagToItemForm" onSubmit="addTagToItem();return false;">
				<p style="color:red" class="disabled"></p>
				<input type="text" name="ItemFK" placeholder="Item ID" required>
				<input type="text" name="TagFK" placeholder="Tag ID" required>
				<input type="submit" value="Add">
			</form>
		</div>

		<h3 class="sectionHeader underline center">Manage existing Tags for Items</h3>
		<table>
		<p id="errorMessageTable" style="color:red" class="disabled"></p>
		<tr><th>id</th><th>item fk</th><th>tag fk</th><th>update</th><th>delete</th></tr>
		<?php
			for ($i=0; $i < count($tagItem_id); $i++) { 
				echo'<tr>';
				echo'<td>'.$tagItem_id[$i].'</td>';
				echo'<td><textarea>'.$tagItem_itemFK[$i].'</textarea></td>';
				echo'<td><textarea>'.$tagItem_tagFK[$i].'</textarea></td>';
				echo'<td><button style="background-color:green;color:white;" onClick="updateTagItem(\''.$tagItem_id[$i].'\',this)">update</button></td>';
				echo'<td><button style="background-color:red;" onClick="deleteTagItem(\''.$tagItem_id[$i].'\',this)">delete</button></td>';
				echo'</tr>';
			}
		?>
		</table>
	</div>
</div>
 </body>
 </html>
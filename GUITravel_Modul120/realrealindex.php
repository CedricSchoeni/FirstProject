<?php 
	session_start();
	include"readOutTags.php";
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Webshop</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
</head>
<body>


<div class="headerContainer">
	<a href="realrealindex.php">
		<div class="iconContainer left hoverPadding">
			<img src="Images/homeIcon.png">
		</div>
	</a>

	<div class="headerTableLayout">
		<a href="shop.php">
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
	<?php
	for ($i=0; $i < count($tag_id); $i++) { 
		echo'<a href="shop.php?tag='.$tag_id[$i].'">';
	echo'<div class="container3 colorTransition">';
		echo'<h3>'.$tag_name[$i].'</h3>';
	echo'</div>';
	echo'</a>';
	}
	
	?>
</div>

<div class="footer_container">

</div>



</body>
</html>
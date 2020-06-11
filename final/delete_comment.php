<?php

	include 'connect.php';


$get_id =$_GET['id'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM comments WHERE comment_id = '$get_id'");
  	
	header("Location: home.php");

?>

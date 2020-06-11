  
  
  
  <?php
  
      include'connect.php';
include ('session.php');

			
        $myfriend=$_GET['accept'];
        
		$me= $_SESSION["id"];
        
		$mfriends=mysqli_query($conn,"INSERT INTO friends(my_id,myfriends) VALUES('$me','$myfriend') ");//or die(mysql_error());
     
	    $query = mysqli_query($conn,"delete from friends_request WHERE receiver = '" . $_SESSION["id"] . "' AND sender = '" . $_GET['accept'] . "' OR receiver = '" . $_GET['accept'] . "' AND sender = '" . $_SESSION["id"] . "' ");
     
	  {
		
		echo "<script type=\"text/javascript\">
							alert(\"friend added\");
							window.location='add_friend.php';
						</script>";
			
		
      }
	
	
  ?>
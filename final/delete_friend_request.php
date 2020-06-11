  
  
  <?php

              include'connect.php';
include ('session.php');
              ?>
  
  
  
  <?php
       

       $myfriend=$_GET['accept'];
       $me= $_SESSION["id"];
       $query = mysqli_query($conn,"delete from friends_request WHERE receiver = '" . $_SESSION["id"] . "' AND sender = '" . $_GET['accept'] . "' OR receiver = '" . $_GET['accept'] . "' AND sender = '" . $_SESSION["id"] . "' ");
    
     
	 {
		echo "<script type=\"text/javascript\">
							alert(\"friend request deleted\");
							window.location='add_friend.php';
						</script>";
			
		
	}
	
	
  ?>
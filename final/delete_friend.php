  <?php
  include'connect.php';
include ('session.php');
    $myfriend=$_GET['delete'];
    $me= $_SESSION["id"];
     $query = mysqli_query($conn,"delete from friends WHERE my_id = '" . $_SESSION["id"] . "' AND myfriends = '" . $_GET['delete'] . "' OR my_id = '" . $_GET['delete'] . "' AND myfriends = '" . $_SESSION["id"] . "' ");
     {
		echo "<script type=\"text/javascript\">
							alert(\"friend has been deleted\");
							window.location='add_friend.php';
						</script>";
			
		
		}
	
	
  ?>
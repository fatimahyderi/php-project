<?php
       include'connect.php';
include ('session.php');


          $receiver=$_GET['send'];
           $sender= $_SESSION["id"];


            $query = mysqli_query($conn,"SELECT * FROM friends_request WHERE receiver = '" . $_SESSION["id"] . "' AND sender = '" . $_GET['send'] . "' OR receiver = '" . $_GET['send'] . "' AND sender = '" . $_SESSION["id"] . "' ");

            if(mysqli_num_rows($query) > 0){
   
             $row = mysqli_fetch_array($query); 

             echo"
             <script type=\"text/javascript\">
							alert(\"Friend request already sent\");
							window.location='add_friend.php';
						</script>

            ";

             }
	
           else{
   
             $query = mysqli_query($conn,"SELECT * FROM friends WHERE `my_id`='" . $_SESSION["id"] . "' AND `myfriends`='" . $_GET['send'] . "' OR`my_id`='" . $_GET['send'] . "' AND `myfriends`='" . $_SESSION["id"] . "'");
             
			 if(mysqli_num_rows($query) > 0){
    
	         $row = mysqli_fetch_array($query);

	       echo"
               <script type=\"text/javascript\">
							alert(\"Is already your friend\");
							window.location='add_friend.php';
						</script>

              ";

            }

             else
     
	         {


              mysqli_query($conn,"INSERT INTO friends_request(receiver,sender) VALUES('$receiver','$sender') ") or
              die(mysqli_error());
            
			 {
		    
			           echo "<script type=\"text/javascript\">
							alert(\"friend request sent\");
							window.location='add_friend.php';
						</script>";
			
		
               }
	          
		   }}	
 
             ?>


   
    
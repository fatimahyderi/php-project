<?php
include'connect.php';
include ('session.php');


?>
<!DOCTYPE html>
<html>

	<head>
		<title>Welcome  To Biobook - Sign up, Log in, Post </title>
		<link rel="stylesheet" type="text/css" href="css/profile.css">
	</head>

<body>



	<div id="header">
		<div class="head-view">
			<ul>
				<li><a href="home.php" title="Biobook"><b>biobook</b></a></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li><a href="timeline.php" title="<?php echo $username ?>"><label><?php echo $username ?></label></a></li>
				<li><a href="home.php" title="Home"><label>Home</label></a></li>
				<li><a href="profile.php" title="Profile"><label>Profile</label></a></li>
				<li><a href="photos.php" title="Settings"><label>Photos</label></a></li>
				<li><a href="add_friend.php" title="Settings"><label class="active">Add Friends</label></a></li>
				<li><a href="logout.php" title="Log out"><button class="btn-sign-in" value="Log out">Log out</button></a></li>
			</ul>
		</div>
	</div>	
<?php
//include 'get_users_data.php';
$member_id=$_SESSION["id"];		

                             $result = mysqli_query($conn,"SELECT * FROM user WHERE `user_id`='$member_id' LIMIT 1");

                             /*echo "<table border='0px' id='profile_name' style='position:absolute; top:129px; left:-200px; font-size:26px;'>
                             ";*/
							 

                             while($row = mysqli_fetch_array($result))
								 $profile_picture = $row['profile_picture'];
                        {
                             echo "<tr>";
           
                            echo"<p>Your are called,</p>"; 
                             echo "<td>" . $row['firstname'] .' '. $row['lastname'] . "</td >";
							 ?>
							 <img src="<?php echo"$profile_picture";?>">
							 <?php
                             
                             echo "</tr>";
                        }
                             echo "</table>";
                   
                        
?>

<div id="">
						          <?php
						 /* select the names of the login from the database */
                            
                             $member_id=$_SESSION["id"];		

                             $result = mysqli_query($conn,"SELECT * FROM `user` WHERE `user_id`!='$member_id'");

                             echo "<table>";

                             while($row = mysqli_fetch_array($result))
                        {
						        $memberid = $row["user_id"];
								$member_pic = $row["profile_picture"];
                             /* below check if the friend is already your friend */
							
							$member_id=$_SESSION["id"];							
						    $post = mysqli_query($conn,"SELECT * FROM friends WHERE my_id = '$member_id' AND myfriends='$memberid' OR myfriends = '$member_id' AND my_id='$memberid' ");//or die(mysql_error());
								
							$num_rows  =mysqli_num_rows($post);
							
							if ($num_rows != 0 ){

							while($row = mysqli_fetch_array($post)){
				
						    $myfriend = $memberid;
							$member_id=$_SESSION["id"];
								
							if($myfriend == $member_id){
									
							$myfriend1 = $row['myfriends'];
							$friends = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$myfriend1'");//or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
							//echo"";		  
							//echo" <div id='button_style'>Friends $memberid</div> ";
                            //echo'<hr class="line_1"> ';
									    
							}else{
										
							$friends = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$myfriend'");//or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
							
							/* If the person is your friend the div having this id button_style will be seen. */
							
							//echo" <div id='button_style'>Friends$memberid</div> ";
                             //echo'<hr class="line_1"> ';
									
							}
									
								}
								
								} else
							
							{

						   echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
                            
							echo'<div>'.$row['firstname']." ".$row['lastname'].'</div> ';
							?>
							 <img src="<?php echo"$member_pic";?>">
							 <?php
							 echo'<a href="process.php?send='.$row['user_id'].'" class="retweet_link"><div id="button_style1">Add Friend</div></a><br>';	
							 
							 
							
							echo'<br>';
							
							} 
                             
                        }
                             echo "</table>";
                   
                        
						?>
</div>
						
						
						
					 
					<div id="friend_div">
					 
					 <p style=" color:green;  font-size:16px;">Your friends</p>
					 
					
						 <?php
						    
							 $member_id=$_SESSION["id"];							
								  $post = mysqli_query($conn,"SELECT * FROM friends WHERE my_id = '$member_id' OR myfriends = '$member_id' ");//or die(mysql_error());
								
							     $num_rows  =mysqli_num_rows($post);
							
							     if ($num_rows != 0 ){

							  	while($row = mysqli_fetch_array($post)){
				
								$myfriend = $row['my_id'];
								$member_id=$_SESSION["id"];
								
								
								
									if($myfriend == $member_id){
									
										$myfriend1 = $row['myfriends'];
										$friends = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$myfriend1'");//or die(mysql_error());
										$friendsa = mysqli_fetch_array($friends);
									  
									    echo"<div class='myfriend_div'>";
									
									echo '
									<p  class="friend_info">&nbsp;'.$friendsa['firstname'].' '.$friendsa['lastname'].' </p>
									
									<div class="myfriend"><a href="delete_friend.php?delete=' .$friendsa['user_id'].' ">Unfriend </a></div> ';
									
									   echo'</div>';
									    
									
									}else{
										
										$friends = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$myfriend'");//or die(mysql_error());
										$friendsa = mysqli_fetch_array($friends);
										
										 echo"<div class='myfriend_div1' >";
										
										echo '
									        <p  class="friend_info">&nbsp;'.$friendsa['firstname'].' '.$friendsa['lastname'].' </p></a>
											
									          <div class="myfriend"><a href="delete_friend.php?delete=' .$friendsa['user_id'].' ">Unfriend</a></div> ';
									    
										  echo'</div>';
									
									}
									
								}
								
								
								
								}else{
								
								  echo"<div id='myfriend_div'>";
								  
									echo 'You don\'t have friends </li>';
										}
										
									echo'</div>';	
					 
					     ?>
					
					<?php
				  
				                //Section for showing friendship requests
				  
				                 $member_id=$_SESSION["id"];
                                 $query = mysqli_query($conn,"SELECT * FROM friends_request WHERE receiver = '$member_id'");
                                 if(mysqli_num_rows($query) > 0) 
								 
								 {
								 
								 
                                 while($row = mysqli_fetch_array($query)) 
								 
								 { 
								 
								 
                                 $_query = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '" . $row["sender"] . "'");
                                 while($_row = mysqli_fetch_array($_query)) 
								 
								 {
                                  
								 
								  
			                     echo '
			                         
									 <div class="myfriend_div1">
									 
								  
			                    
			                     <div style="position:relative; margin:2px 0px 0px 13px;"><span style="font-size:20px; color:red;">'.$_row['firstname']." ".$_row['lastname'].' </span>want to be friends with you</div>
			                      <br>
								 <div class="myfriend"><a href="addfriend.php?accept=' .$row['sender'].' ">Accept</a></div><br>
			                     <div class="myfriend"><a href="delete_friend_request.php?accept=' .$row['sender'].'">Reject</a></div>
                                 
								 <hr>
								  </div>';
								 }
	                             
	                           }
							  
							   
                           }else{  
						   
						   
						        echo"<div class='myfriend_div1'>
						   
						   		You do not have any friend pending  </li>
									
                                  </div>";
									
								}

                            
					 ?>
					 
					 
					
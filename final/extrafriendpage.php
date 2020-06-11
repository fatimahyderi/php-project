<a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
						<?php
				
				//$mydb->setQuery("SELECT * FROM photos WHERE `id`=($_SESSION['id'] )and `pri`='yes'");
				//$cur = $mydb->loadResultList();
				$member_id=$_SESSION["id"];
				
				$result = mysqli_query($conn,"SELECT * FROM user WHERE user_id='$member_id' LIMIT 1");
				while($row = mysqli_fetch_array($result))
                        {
                             echo "<tr>";
           
                            echo"<p style='position:absolute; top:90px; left:-250px; font-size:16px; color:white;'>Your are called,</p>"; 
                             echo "<td>" . $row['firstname'] .' '. $row['lastname'] . "</td >";
                             
                             echo "</tr>";
                        }
                             echo "</table>";
				echo $_SESSION['id'];
				$query = 'SELECT * FROM photos WHERE user_id <>"'. $_SESSION["id"].'"';
				$sql = mysqli_query($conn,$query);
				//if ($mydb->affected_rows()== 0){
					//$sql = mysqli_affected_rows($sql);
					//var_dump ($sql);
					$row = mysqli_fetch_array($sql);
					var_dump($row);
					while($row = mysqli_fetch_assoc($sql)){
						echo '<h2>'.$row ['location'] . '</h2>';
						
					}
					if($row > 0){
						
					echo '<img src="./upload/p.jpg" class="img-thumbnail"/>';	
				
				} 
				foreach($row as $object){
				   
						echo '<img src="./upload/'. $object->filename.'" class="img-thumbnail"  />';
					
					}
				?> 
				<div id="">
						          <?php
						 /* select the names of the login from the database */
                            
                             $member_id=$_SESSION["id"];
							echo $member_id;

                             $result = mysqli_query($conn,"SELECT * FROM user WHERE `user_id`!='$member_id'");

                             echo "<table border='0px' id='profile_name' style='position:absolute; top:129px; left:70px; font-size:16px;'>
                             ";
							var_dump( $result) ;
                             while($row = mysqli_fetch_array($result))
                        {
							var_dump( $row);
						        $memberid = $row["user_id"];
                             /* below check if the friend is already your friend */
							
							$member_id=$_SESSION["id"];							
						    //$post = mysqli_query($conn,"SELECT * FROM friends WHERE my_id = '$member_id' AND myfriends='$memberid' OR myfriends = '$member_id' AND myid='$memberid' ");//or die(mysql_error());
							var_dump($post);	
							$num_rows  =mysqli_num_rows($post);
							
							if ($num_rows != 0 ){

							while($row = mysqli_fetch_array($post)){
				
						    $myfriend = $memberid;
							$member_id=$_SESSION["id"];
								
							if($myfriend == $member_id){
									
							$myfriend1 = $row['myfriends'];
							$friends = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$myfriend1'");//or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
							echo"";		  
							echo" <div id='button_style'>Friends $memberid</div> ";
                            echo'<hr class="line_1"> ';
									    
							}else{
										
							$friends = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$myfriend'");//or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
							
							/* If the person is your friend the div having this id button_style will be seen. */
							
							echo" <div id='button_style'>Friends$memberid</div> ";
                             echo'<hr class="line_1"> ';
									
							}
									
							}	}
								
								 else
							
							{

						   echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
                            
							echo'<div align="left">'.$row['firstname']." ".$row['lastname'].'</div> ';	
							 echo'<a href="process.php?send='.$row['user_id'].'" class="retweet_link"><div id="button_style1">Add Friend</div></a><br>';	
							 
							 
							echo'<hr class="line_1" width="150px" style="position:absolute;left:10px;"> ';
							echo'<br>';
							
							} 
                             
                        }
                             echo "</table>";
                   
                        
						?>
						   
						   </div>
						   
						   
						   <div id="friend_div">
					 
					 <p style="position:absolute; color:green; margin: -19px 0px 0px -53px; font-size:16px;">Your friends</p>
					 
					
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
									<p  class="friend_info">&nbsp;'.$friendsa['firstname'].' '.$friendsa['lastname'].' </p></a>
									
									<div class="myfriend"><a href="delete_friend.php?delete=' .$friendsa['user_id'].' ">Unfriend</a> </div> ';
									
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
					
					
					 
					 </div>
					 <div id="friend_div">
					 
					 <p style="position:absolute; color:green; margin: -19px 0px 0px -53px; font-size:16px;">Your friends</p>
					 
					
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
									<p  class="friend_info">&nbsp;'.$friendsa['firstname'].' '.$friendsa['lastname'].' </p></a>
									
									<div class="myfriend"><a href="delete_friend.php?delete=' .$friendsa['user_id'].' ">Unfriend</a> </div> ';
									
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
					
					
					 
					 </div>
					 
					</a>
					
					
</body>
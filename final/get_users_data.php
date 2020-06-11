<?php

include'connect.php';
//include ('session.php');
	$user = "select * from user where user_id != '$id'";
			
	$run_user = mysqli_query($conn,$user);
			
	while ($row_user=mysqli_fetch_array($run_user)){
			
	$user_id = $row_user['user_id'];
	$username = $row_user['username'];
	$profile_picture = $row_user['profile_picture'];
	//$login = $row_user['log_in'];
	echo"
	<li>
		<div class='chat-left-img'>
			<img src='$profile_picture'>
		</div>
		<div class='chat-left-detail'>
			<p><a href='message.php?username=$username'>$username</a></p>";
			//if($login == 'Online'){
			//echo "<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
			//}else{
			//echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
			//}

			"
		</div>
	</li>

	";
	}
?>			
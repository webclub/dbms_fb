<?php

if(isset($_POST['username'])&&isset($_POST['password']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$password_hash=md5($password);

//echo $password;
//echo $password_hash;

if(!empty($username)&&!empty($password)){
	
		$query= "SELECT `uid` FROM `user` WHERE `name`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($password_hash)."'";
		if($query_run=mysql_query($query)){
		
			$query_num_rows = mysql_num_rows($query_run);
		
			if($query_num_rows == 0){
					echo'Invalid username/password combination.';
			}
			else if($query_num_rows == 1){
					$user_id = mysql_result($query_run, 0, 'uid');
			 
					$_SESSION['user_id']= $user_id;
					header('Location: index.php');		
			}
		}
		
	}
	else{
	
	echo 'You must supply username and password.';
	
	}
}
?>


<form action="<?php echo $current_file; ?>" method="POST">

	Username:<input type="text"; name="username"><br>
	Password:<input type="password"; name="password"><br>
	<input type="submit" value="Log In">

</form>

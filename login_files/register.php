<?php

require 'core.inc.php';
require 'connect.php';

	if(!loggedin()){

		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname'])){
		
			$username = $_POST['username'];
			
			$password = $_POST['password'];
			$password_again = $_POST['password_again'];
			
			$password_hash = md5($password);
			
			$firstname = $_POST['firstname'];
			$surname = $_POST['surname'];
			
			
			if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($surname)){if(strlen($username)>=40||strlen($firstname)>=40||strlen($surname)>=40){
			
					echo 'Please adhere to the word limit';
			
					}else{
			
			
					if($password!=$password_again){
					
						echo 'Passwords do not match.';
						
					}else{
					
						$query = "SELECT `username` FROM `users` WHERE `username` = '$username' ";
						$query_run = mysql_query($query);
						
						if(mysql_num_rows($query_run)==1){
						
							echo 'The username '.$username.' already exists.';
												
						}else{
						
						 $query = "INSERT INTO `users` values ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
						
							if($query_run = mysql_query($query)){
							
								header('Location: register_success.php');
							
							}else{
							
								echo 'sorry couldn\'t register.';
								}
						
						
						}
					}
					}
				
				} else{
				
					echo 'All fields are required!';
			}
		
		}

?>
	
		<form action="register.php" method="POST" >
		Username:<br><input type="text" name="username" maxlength = "40" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>"><br><br>
		Password:<br><input type="password" name="password" ><br><br>
		Password again:<br><input type="password" name="password_again"><br><br>
		First name:<br><input type="text" name="firstname" maxlength = "40" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '';?>"><br><br>
		Surname:<br><input type="text" name="surname" maxlength = "40" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '';?>"><br><br>
		<input type="submit" value="register">
		</form>
<?php	
	
	} else if (loggedin()){
	echo 'You\'re logged in.';

	}
?>
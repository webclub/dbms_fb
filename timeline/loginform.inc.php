<?php

if(isset($_POST['username'])&&isset($_POST['password']))
{
$username=$_POST['username'];
$password=$_POST['password'];

//echo $password;
//echo $password_hash;

if(!empty($username)&&!empty($password)){
	
		$query= "SELECT `uid` FROM `user` WHERE `username`='".mysql_real_escape_string($username).
				"' AND `password`='".mysql_real_escape_string($password)."'";
		if($query_run=mysql_query($query)){
		
			$query_num_rows = mysql_num_rows($query_run);
		
			if($query_num_rows == 0){
					echo'Invalid username/password combination.';
			}
			else if($query_num_rows == 1){
					$user_id = mysql_result($query_run, 0, 'uid');
			 		$username= mysql_query("SELECT username FROM user where uid='$user_id'") ;
					$_SESSION['user_id']= $user_id;
					$_SESSION['username'] = $username ; 
					header('Location: index.php');		
			}
		}
		
	}
	else{
	
	echo 'You must supply username and password.';
	
	}
}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Welcome to facebook</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<form  method="post" action="<?php echo $current_file; ?>">
			<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				
			</div>
		</form><!-- form -->
		<div class="button">
			
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
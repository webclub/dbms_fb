<?php

if(isset($_POST['username'])&&isset($_POST['password']))
{
$username=$_POST['username'];
$password=$_POST['password'];

//echo $password;
//echo $password_hash;

if(!empty($username)&&!empty($password)){
	
		$query= "SELECT `uid` FROM `user` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($password)."'";
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



<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="<?php echo $current_file; ?>">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Facebook Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="username" required></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password" required></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

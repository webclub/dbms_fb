<?php

require'connect.php';
require'core.inc.php';
//$_SESSION['user_id'] = "abc" ;
if (loggedin()) {
	
	$username = getuserfield('username');
	$surname = getuserfield('surname');
	echo 'You\'re logged in '.$username.' '.$surname.'. <br> <a href="logout.php">Log out.</a>';
	
	}
	
	else{

	include 'loginform.inc.php';
	}


?>
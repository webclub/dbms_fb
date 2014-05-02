<?php

require'connect.php';
require'core.inc.php';
//$_SESSION['user_id'] = "abc" ;
if (loggedin()) {
	
	
	echo 'You\'re logged in ';
	
	}
	
	else{

	include 'loginform.inc.php';
	}


?>
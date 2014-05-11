<?php

require'connect.php';
require'core.inc.php';
//$_SESSION['user_id'] = "abc" ;
if (loggedin()) {
	
	
	include 'index2.php' ; 
	
	}
	
	else{

	include 'loginform.inc.php';
	}


?>
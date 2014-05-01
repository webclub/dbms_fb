<?php
  $host = "localhost";
  $db_uname = "root";
  $db_pass = "dhruv";
  $database = "facebook";
  $dbtable = "likes";
  
  $conn = mysql_connect($host,$db_uname,$db_pass) or die(mysql_error());
		  mysql_select_db($database,$conn) or die(mysql_error());
?>
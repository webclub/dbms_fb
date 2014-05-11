<?php

$conn_error='Could not connect';

$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='shubham';
$mysql_db='facebook';

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass)||!@mysql_select_db($mysql_db))
{
	die($conn_error);

}
else{

}
?>
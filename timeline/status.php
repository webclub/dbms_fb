<?php
	
	require 'demo/connect.php';
	require 'core.inc.php';
	$status = $_POST['message'];
	$uid = getuserid();
	$ins="INSERT INTO post VALUES(NULL,'$uid','$status',NULL)";
	mysql_query($ins);
?>
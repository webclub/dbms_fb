<?php

require "connect.php";
require "todo.class.php";


$id = (int)$_GET['id'];
$uid=$_GET['uid'];
$postid=$_GET['postid'];

try{

	switch($_GET['action'])
	{
		case 'delete':
			ToDo::delete($id);
			break;
			
		case 'edit':
			ToDo::edit($id,$_GET['text']);
			break;
			
		case 'new':
			ToDo::createNew($uid,$_GET['text'],$postid);
			break;
	}

}
catch(Exception $e){
//	echo $e->getMessage();
	//die("0");
	echo "1";
}


?>
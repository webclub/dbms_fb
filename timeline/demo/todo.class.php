<?php

/* Defining the ToDo class */
require 'connect.php';
class ToDo{
	
	/* An array that stores the todo item data: */
	
	private $data;
	
	/* The constructor */
	public function __construct($par){
		if(is_array($par))
			$this->data = $par;
	}
	
	/*
		This is an in-build "magic" method that is automatically called 
		by PHP when we output the ToDo objects with echo. 
	*/
		
	public function __toString(){
		
		// The string we return is outputted by the echo statement
		$uid=mysql_fetch_array(mysql_query("SELECT name FROM user WHERE uid=".$this->data['uid']));
		return '
			<li id="todo-'.$this->data['commid'].'" class="todo">
			
				<div class="text">'.$uid[0].':<b>'.$this->data['content'].'</b></div>
				
				<div class="actions">
					<a href="#" class="edit">Edit</a>
					<a href="#" class="delete">Delete</a>
				</div>
				
			</li>';
	}
	
	
	/*
		The following are static methods. These are available
		directly, without the need of creating an object.
	*/
	
	
	
	/*
		The edit method takes the ToDo item id and the new text
		of the ToDo. Updates the database.
	*/
		
	public static function edit($id, $text){
		
		$text = self::esc($text);
		if(!$text) throw new Exception("Wrong update text!");
		
		mysql_query("UPDATE comments
						SET content='$text'
						WHERE commid='$id'");
		
		if(mysql_affected_rows($GLOBALS['link'])!=1)
			throw new Exception("Couldn't update item!");
	}
	
	/*
		The delete method. Takes the id of the ToDo item
		and deletes it from the database.
	*/
	
	public static function delete($id){
		
		mysql_query("DELETE FROM comments WHERE commid='$id'") or die("bhot ho gaya".$id);
		
		if(mysql_affected_rows($GLOBALS['link'])!=1)
			throw new Exception("Couldn't delete item!");
	}
	
	/*
		The rearrange method is called when the ordering of
		the todos is changed. Takes an array parameter, which
		contains the ids of the todos in the new order.
	*/
	
	public static function createNew($uid,$text,$postid){
		
		$text = self::esc($text);
		if(!$text) throw new Exception("Wrong input data!");
		$ins="INSERT INTO comments VALUES(NULL,'$uid','$postid','$text',NULL)";
		mysql_query($ins);

		if(mysql_affected_rows($GLOBALS['link'])!=1)
			throw new Exception("Error inserting TODO!");
		
		// Creating a new ToDo and outputting it directly:
		
		echo (new ToDo(array(
			'commid'	=> mysql_insert_id($GLOBALS['link']),
			'content'	=> $text
		)));
		
		exit;
	}
	
	/*
		A helper method to sanitize a string:
	*/
	
	public static function esc($str){
		
		if(ini_get('magic_quotes_gpc'))
			$str = stripslashes($str);
		
		return mysql_real_escape_string(strip_tags($str));
	}
	
} // closing the class definition

?>
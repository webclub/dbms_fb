<?php

require_once 'connect.php';
$query="SELECT `food`, `calories` FROM `food` WHERE `healthy_unhealthy`='u' AND `calories`='1000' ORDER by `id`";

if($query_run= mysql_query($query))
{
	if(mysql_num_rows($query_run)==NULL){
	
	echo 'no result found';
	}
	else{	
		
	while($result=mysql_fetch_assoc($query_run))
	{
		$food=$result['food'];
		$calories=$result['calories'];
		
		echo $food.' '. $calories .'<br>';
	
	}
		}
}

?>
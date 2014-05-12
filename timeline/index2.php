<?php

require "demo/connect.php";
require "demo/todo.class.php";

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Home</title>
		<meta name="description" content="Blueprint: Vertical Timeline" />
		<meta name="keywords" content="timeline, vertical, layout, style, component, web development, template, responsive" />
		<meta name="author" content="WebClub-DTU" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/humanity/jquery-ui.css" type="text/css" media="all" />

<!-- Our own stylesheet -->
<link rel="stylesheet" type="text/css" href="demo/styles.css" />
<style>
	.contain{
		margin: 0;;
		padding:2px;
		font-family: verdana;
		font-size: 12px;
	}
	#button-container-like{
		background: -moz-linear-gradient(bottom, #dadada, #fff);
		background: -webkit-gradient(linear, center bottom, center top, from(#dadada), to(#fff)); 		
		border: 1px solid #CCCCCC;
		border-radius: 3px 0px 0px 3px;
		color: #000000;
		cursor: pointer;
		height:2.4em;
		width : 70px;
		font-family: verdana;
		font-size: 12px;
		line-height: 2em;
		float:left;
	}
	#button-container-unlike{
		background: -moz-linear-gradient(bottom, #dadada, #fff);
		background: -webkit-gradient(linear, center bottom, center top, from(#dadada), to(#fff)); 		
		border: 1px solid #CCCCCC;
		border-left: none;
		border-radius: 0px 3px 3px 0px;
		color: #000000;
		cursor: pointer;
		height: 2.4em;
		width : 35px;
		font-family: verdana;
		font-size: 12px;
		line-height: 2em;
		float:left;
	}
	.thumbs-up{
		background : url("ytubeIP/images/icons.png") no-repeat scroll 2px -255px transparent;
		position: relative;
		height: 20px;
		display:block;
		width: 20px;
		clear: right;
		float: left;
                content: ".";
	}
	.thumbs-down{
		background : url("ytubeIP/images/icons.png") no-repeat scroll -63px -50px transparent;
		position: relative;
		height: 20px;
		display:block;
		width: 20px;
		clear: right;
		float: left;
		margin-right: 4px;
	}
	.tup-hover{
		background : url("ytubeIP/images/icons.png") no-repeat scroll -37px -138px transparent;
	}
	.tdown-hover{
		background : url("ytubeIP/images/icons.png") no-repeat scroll -36px -255px transparent;
	}
	[class*='stats_']{
		border-radius: 5px;
		border : 1px solid #838383;
		display: block;
		clear:left;
		margin-top: 0px;
		display: none;
		height: auto;
		padding: 5px;
		width: 500px;
	}
	.stat-details .close{
		background : url("ytubeIP/images/icons.png") no-repeat scroll 0px -132px transparent;
		float: right;
		height: 17px;
		width: 17px;
		margin:0px;
		padding:0px;
	}
	.stat-details table{
		font-size: 12px;
	}
	#small{
		font-size: 10px;
		color : #949494;
	}
	.bar{
		height:10px;
		display:inline-block;
	}
	.green{
		background: #64F141;
		border: 1px solid #148507;
	}
	.red{
		background: #FF4F4F;
		border: 1px solid #D50202;
	}
	.stat-option{
		display:block;
		line-height:20px;
		margin-top:5px;
		padding-top:3px;
	}
	.close{
		cursor: pointer;
	}
  </style>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span style="font-size:1.6em"><?php echo getuserfield('firstname').' '.getuserfield('lastname') ;?></span>
				<h1>News Feed</h1>
				<nav>
					<span href='#'>You are now logged in.</span>
					<a href="logout.php" class="icon-arrow-left" data-info="Logout">Logout</a>
					<a href="" class="icon-drop" data-info="View Profile">View profile</a>
				</nav>
			</header>	
			<div class="main">
				<ul class="cbp_tmtimeline">
				<?php
					$uid=$_SESSION["user_id"];
					$query="SELECT * FROM post WHERE uid IN (SELECT uid1 FROM edgelist WHERE uid2=".$uid." UNION SELECT uid2 FROM edgelist WHERE uid1=".$uid.") ORDER BY time DESC";
					$posts=mysql_query($query);
					while($post=mysql_fetch_array($posts))			{						
						echo '<li>
											<time class="cbp_tmtime" datetime="'.explode(',',$post['time'],0).'"><span>'.explode(' ',$post['time'])[0].'</span> <span>'.explode(' ',$post['time'])[1].'</span></time>
											<div class="cbp_tmicon cbp_tmicon-phone"></div>
											<div class="cbp_tmlabel" id="'.$post['postid'].'">
												'.$post['content'].'
											</div>
											<div class="contain">
							<button id="button-container-like" class="option" value="1" pid='.$post['postid'].'><span class="thumbs-up"></span>Like</button>
							<button id="button-container-unlike" class="option" value="0" pid='.$post['postid'].'><span class="thumbs-down"></span></button>
							<div class="stats_'.$post['postid'].'"></div>
							<input type="hidden" id="item_'.$post['postid'].'" value="'.$post['postid'].'">
						</div> 
											<div id="main">

						<ul class="todoList" >';
							
					
							
							// Looping and outputting the $todos array. The __toString() method
							// is used internally to convert the objects to strings:
						$query="SELECT * FROM comments WHERE postid=".$post['postid']." ORDER BY time ASC";
						$comments=mysql_query($query);
						$todos = array();

// Filling the $todos array with new ToDo objects:

						while($row = mysql_fetch_assoc($comments)){
							$todos[] = new ToDo($row);
						}

							foreach($todos as $item){
								echo $item;
							}
							
						echo '
					    </ul>

					<a  class="green-button addButton" id="'.$post['postid'].'" href="#">Comment</a>

					</div>

										</li>';
					}

				?>
					
					
				</ul>
			</div>
		</div>
		<div id="dialog-confirm" title="Delete TODO Item?">Are you sure you want to delete this TODO item?</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="demo/jquery.cookie.js"></script>
<script type="text/javascript" src="demo/script.js"></script>
<script language="javascript">
<!--
	$("button").hover(
		function(){
			if($(this).val() == "1")   
				$(this).find(".thumbs-up").addClass("tup-hover");
			else
				$(this).find(".thumbs-down").addClass("tdown-hover");
		},
		function(){
			if($(this).val() == "1") {
				$(this).find(".thumbs-up").removeClass("tup-hover");
				$(this).find(".thumbs-up").addClass("thumbs-up");
			}else{
				$(this).find(".thumbs-down").removeClass("tdown-hover");
				$(this).find(".thumbs-down").addClass("thumbs-down");
			}	
		}
	);

	$(".close").live("click",function(){
		$(this).parent().parent().slideUp("fast");
	});

	$(".option").click(function(){
		 var option = $(this).val();
		 var pid = $(this).attr('pid');
		 var item	= $("#item_"+pid).val();
		 var userid = <?php echo $_SESSION['user_id'] ?>;	 
		 console.log(userid);
		 $(".stats_"+pid).slideDown("fast").html("Loading....");
		 $.ajax({
		   type: "POST",
		   url: "ytubeIP/ajax_server.php",
		   data: "option="+option+"&item="+item+"&userid="+userid,
		   success: function(response){	
		   		var json = jQuery.parseJSON(response);
                if(json.ip_exists == "0"){
				var total = parseInt(json.likes) + parseInt(json.dislikes);
				
				option = (option == "1") ? "Liked" : "Disliked" ;
				var likes	 = (parseInt(json.likes) * 100 ) / total;
				var dislikes = (parseInt(json.dislikes) * 100 ) / total;

				$(".stats_"+pid).html('<div class="stat-details"><span class="close"></span>You '+option+' this item. Thanks for the feedback !<br><br><b>Rating for this item</b> <span id="small"> ('+total+' total)</span><table border="0" width="100%"><tr><td width="25px"><span class="thumbs-up"></span></td><td width="50px;">'+json.likes+'</td><td><div class="bar green" style="width:'+likes+'%;"></div></td></tr><tr><td><span class="thumbs-down"></span></td><td>'+json.dislikes+'</td><td><div class="bar red" style="width:'+dislikes+'%;"></div></td></tr></table>');
                            }else{
                            	console.log('hey');
                                $(".stats_"+pid).html('<div class="stat-details"><span class="close"></span>You have allready rated this Post!</div>');
                            }        
                    }
		 });  
	});
//-->
</script>

	</body>
</html>

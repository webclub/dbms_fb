<!--
   Script name  : Youtube like rating script with php, ajax and jquery
   File Name 	: index.php
   Developed By : Amit Patil (India)
   Contact	: www.amitpatil.me/contact
   Date Created : 31 Dec 2011
   Last Updated : 31 Dec 2011   
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> Youtube Thumbs Up Script </title>
  <meta name="author" content="">
  <meta name="keywords" content="youtube rating script, vote up script, vote up, vote down, jquery rating script, rating script, star rating,php,jquery. jquey scripts, php scripts, css, html,xhtml, video rating script, item rating script">
  <meta name="description" content="">
  <script src="js/jquery-1.7.min.js"></script>
  <style>
	.container{
		margin: 10% 30%;;
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
		background : url("images/icons.png") no-repeat scroll 2px -255px transparent;
		position: relative;
		height: 20px;
		display:block;
		width: 20px;
		clear: right;
		float: left;
                content: ".";
	}
	.thumbs-down{
		background : url("images/icons.png") no-repeat scroll -63px -50px transparent;
		position: relative;
		height: 20px;
		display:block;
		width: 20px;
		clear: right;
		float: left;
		margin-right: 4px;
	}
	.tup-hover{
		background : url("images/icons.png") no-repeat scroll -37px -138px transparent;
	}
	.tdown-hover{
		background : url("images/icons.png") no-repeat scroll -36px -255px transparent;
	}
	.stats{
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
		background : url("images/icons.png") no-repeat scroll 0px -132px transparent;
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
		<button id="button-container-like" class="option" value="1"><span class="thumbs-up"></span>Like</button>
		<button id="button-container-unlike" class="option" value="0"><span class="thumbs-down"></span></button>
		<div class="stats"></div>
		<input type="hidden" id="item" value="34">
	</div>  
 </body>
</html>
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
		$(".stats").slideUp("fast");
	});

	$(".option").click(function(){
		 var option = $(this).val();
		 var item	= $("#item").val();
		 
		 $(".stats").slideDown("fast").html("Loading....");
		 $.ajax({
		   type: "POST",
		   url: "ajax_server.php",
		   data: "option="+option+"&item="+item,
		   success: function(responce){	
			    var json = jQuery.parseJSON(responce);
                            //alert(json.ip_exists);
                            if(json.ip_exists == "0"){
				var total = parseInt(json.likes) + parseInt(json.dislikes);
				
				option = (option == "1") ? "Liked" : "Disliked" ;
				var likes	 = (parseInt(json.likes) * 100 ) / total;
				var dislikes = (parseInt(json.dislikes) * 100 ) / total;

				$(".stats").html('<div class="stat-details"><span class="close"></span>You '+option+' this item. Thanks for the feedback !<br><br><b>Rating for this item</b> <span id="small"> ('+total+' total)</span><table border="0" width="100%"><tr><td width="25px"><span class="thumbs-up"></span></td><td width="50px;">'+json.likes+'</td><td><div class="bar green" style="width:'+likes+'%;"></div></td></tr><tr><td><span class="thumbs-down"></span></td><td>'+json.dislikes+'</td><td><div class="bar red" style="width:'+dislikes+'%;"></div></td></tr></table>');
                            }else{
                                $(".stats").html('<div class="stat-details"><span class="close"></span>You have allready rated this item !</div>');
                            }        
                    }
		 });  
	});
//-->
</script>
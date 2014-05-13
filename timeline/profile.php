<?php 
	require 'demo/connect.php';
	require 'core.inc.php';
	if (!loggedin()) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="Lucas - Onepage Personal Resume/Portfolio Template" />
<meta name="keywords" content="Lucas - Onepage Personal Resume/Portfolio Template"/>
<meta name="author" content="Metrothenes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title>Lucas - Onepage Personal Resume/Portfolio Template</title>
<!--Fav and touch icons-->
<link rel="shortcut icon" href="img/ico/favicon.ico">
<link rel="apple-touch-icon" href="img/ico/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/ico/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/ico/apple-touch-icon-114x114.png">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--style sheet-->
<link rel="stylesheet" media="screen" href="css1/bootstrap.css"/>
<link rel="stylesheet" media="screen" href="css1/styles.css"/>
<link rel="stylesheet" href="css1/bebasneue.css" />
<!--google web font-->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic">
<link href="font-awesome/css1/font-awesome.css" rel="stylesheet"/>
<link rel="stylesheet" href="css1/prettyPhoto.css"/>

<!--JavaScript-->
<script src="js1/jquery-1.8.1.min.js"></script>
<script src="js1/bootstrap.js"></script>
<script src="js1/jquery.nav.js"></script>
<script src="js1/jquery.scrollTo.js"></script>
<script src="js1/scripts.js"></script>
<script src="js1/modernizr.js"></script>
<script src="js1/jquery.prettyPhoto.js"></script>
<script src="js1/jquery.nicescroll.min.js"></script>
<script src="js1/jquery.isotope.min.js"></script>
<script src="js1/jquery.preloader.js"></script>
<script src="js1/jquery.form.js"></script>
<script src="js1/jquery.ufvalidator-1.0.5.js"></script>
<script src="js1/jquery.gmap.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>





</head>
<body>
<!-- Main Container -->
<div class="container">
	<div class="row">
		<!-- Sidebar -->
		<div class="span3 sidebar">
			<!-- nav -->
			<nav id="nav">
				<!-- logo -->
				<div class="logo">
					<h2><?php echo getuserfield('firstname').' '.getuserfield('lastname') ;?><span><?php echo getuserfield('about');?></span></h2>
				</div>
				<!-- /logo end -->
				<!-- mainnav -->
				<div class="nav-collapse">
						<ul class="nav">
							<li><a href="#intro"><i class="icon-fire"><span>Intro</span></i></a></li>
							<li><a href="#personal"><i class="icon-book"><span>Basic Info</span></i></a></li>
							<li><a href="#contact"><i class="icon-envelope-alt"><span>update status</span></i></a></li>
						</ul>
				</div>
				<!-- /mainnav end -->				
			</nav>
			<!-- /nav -->
			<!-- social link -->
			

			
			<!-- /social link end -->			
		</div>
		<!-- Sidebar -->
		<!-- Content Section -->
		<div class="span9 content offset3">
			<!-- Intro -->
			<section id="intro" class="section intro">
				<div class="row">
					<div class="span8">
						
						<h2><?php echo getuserfield('firstname').' '.getuserfield('lastname') ;?></h2>
						<hr>
						<h3> *coughs* I am an Aam Programmer with minimum possible skills Ji, *coughs*  , Meri aukat hi kya hai !
						</h3>
						<hr>
					</div>
				</div>
			</section>
			<!-- /Intro end -->

			<!-- personal Info -->
			<section id="personal" class="section mtcon">
				<!-- heading -->
				<div class="row">
					<h2 class="mtcon-title">Basic Info</h2>
					
				</div>	
				<!-- /heading -->

				<div class="row">
					<div class="span9">
						<!-- Experience Timeline -->
						<div class="timeline">
							<!-- Item Head -->
								<div class="timeline-item">
									<div class="timeline-head">
										<span class="icon-lightbulb"><i></i></span>
									</div>
									<div class="timeline-arrow"><i></i></div>
									<div class="timeline-head-content">
											<h3>Work Experience</h3>
									</div>
								</div>
								<div class="timeline-item">
									<div class="timeline-head">
										<span class="icon-lightbulb"><i></i></span>
									</div>
									<div class="timeline-arrow"><i></i></div>
									<div class="timeline-head-content">
											<h3>Work Experience</h3>
									</div>
								</div>
								<div class="timeline-item">
									<div class="timeline-head">
										<span class="icon-lightbulb"><i></i></span>
									</div>
									<div class="timeline-arrow"><i></i></div>
									<div class="timeline-head-content">
											<h3>Work Experience</h3>
									</div>
								</div>
								<div class="timeline-item">
									<div class="timeline-head">
										<span class="icon-lightbulb"><i></i></span>
									</div>
									<div class="timeline-arrow"><i></i></div>
									<div class="timeline-head-content">
											<h3>Work Experience</h3>
									</div>
								</div>
								<div class="timeline-item">
									<div class="timeline-head">
										<span class="icon-lightbulb"><i></i></span>
									</div>
									<div class="timeline-arrow"><i></i></div>
									<div class="timeline-head-content">
											<h3>Work Experience</h3>
									</div>
								</div>
								<div class="timeline-item">
									<div class="timeline-head">
										<span class="icon-lightbulb"><i></i></span>
									</div>
									<div class="timeline-arrow"><i></i></div>
									<div class="timeline-head-content">
											<h3>Work Experience</h3>
									</div>
								</div>
							<!-- /Item Head end -->
							<!-- first item of timeline -->
							
						</div>
						<!-- /Education Timeline end -->				
						<!-- download my cv -->					
						
						<!-- download my cv end -->	
					</div><!--span9-->
				</div>
			</section>
			
			<section id="contact" class="section mtcon">
				<!-- heading -->
				<div class="row">
					<h2 class="mtcon-title">Update Status </h2>
				</div>	
				<!-- /heading -->
				<center>
				<div class="row contact">
					
					<div class="span4">
						<form class="form" id="form" method="post" action="status.php">
							
							<textarea name="message" placeholder="Whats on your mind ?" rows="8" style="width:763px"class="span4"></textarea>
							<button type="submit"  class="btn btn-success"  id="submit">POST</button>
						</form>	
								<span class="sending">
								    sending...
								</span>
								<div class="mess center">
								</div>																			
					</div>
				</div><!-- .contact end -->
			</center>
			</section>
			<!-- /Contact end -->
		</div>
		<!-- Content Section -->
	</div>
</div>
<!-- Main Container end -->
<a class="scroll-top" href="#" title="Scroll to top">Top</a>

</body>
</html>
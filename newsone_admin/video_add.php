<?php
session_start();
include "includes/config/dbconfig.php";
$user=$_SESSION['username'];

date_default_timezone_set('Asia/Colombo');
$ctoday=date('Y-m-d');
$ctime=date('h:i:s');

if(!$user){
 header("location:index.php");
}
?>

<?php
if(isset($_POST['addvideo']))
{
 
 /////////
  	$video_url=$_POST['video_url'];
	$vtitle=$_POST['vtitle'];
	$active=1;
	$today=date("Y-m-d");
	
	$insertvdo=mysql_query("insert into tbl_vedio values('','$vtitle','$video_url','$active','$today')");
	if($insertvdo){
	  echo "<script type='text/javascript'>alert('Video added')</script>";
	}else{
	  echo "<script type='text/javascript'>alert('Video adding error')</script>";
	}
		
}


?>

<?php include "logout.php";?>
<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>NewsOne</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<h3>News One Admin</h3>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>My Account</div>
						<ul>
							<li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> Profile</a></li>
							
							<li><a href=""><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>

					
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<?php include "includes/sidebarmenu.php";?>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Howdy, <?php echo $user;?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Video Add</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		
		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-8 col-md-8">
				<form action="" method="post" enctype="multipart/form-data">
                     
                     Video Title
                     <input type="text" name="vtitle"><br>                                         
                      Video Embeded URL (width 297, height 200)

                     <textarea name="video_url" rows="4" cols="10"></textarea> <br>
                     
                     <input type="submit" name="addvideo" value="Create">
                    
                  </form>
			</div>

			
		</div>


		<div class="row">
			
			<!-- Recent Activity -->
						<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2018 Rajeeda holdings. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/counterup.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</body>
</html>
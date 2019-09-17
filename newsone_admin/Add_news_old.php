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
if(isset($_POST['addnews']))
{
    $target_dir="../news_imges/local_news_img/";
	
	$target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
	$target_file2=$target_dir.basename($_FILES["newshovimg"]["name"]);
	
	$imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
	$imageFileType2=pathinfo($target_file2,PATHINFO_EXTENSION);
	 
    $imgname1=$_FILES["newscovimg"]["name"];
	$type1=$_FILES["newscovimg"]["type"];
	$size1=$_FILES["newscovimg"]["size"];
	
	$imgname2=$_FILES["newshovimg"]["name"];
	$type2=$_FILES["newshovimg"]["type"];
	$size2=$_FILES["newshovimg"]["size"];
	
	/////////
  	$catid=$_POST['catid'];
	$title=$_POST['title'];
	$des=$_POST['des'];
	
	//echo $catid.' '.$title.' '.$des.' '.$imgname1.' '.$imgname2.' '.$ctoday.' '.$ctime;
	
	///add news..
$add_news=mysql_query("insert into tbl_news(news_id,news_catgory,news_title,news_contation1,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active,added_by,added_at,edit_by,edit_at) values('','$catid','$title','$des','','$imgname1','$imgname2','$imgname1','$ctoday','$ctime',1,1,'','','')");
	if($add_news)
	{
	 move_uploaded_file($_FILES["newscovimg"]["tmp_name"], $target_file1);
	 move_uploaded_file($_FILES["newshovimg"]["tmp_name"], $target_file2);
	 echo "<script type='text/javascript'>alert('news added')</script>";
	}
	/////////
	
	
		
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
							
							<li><a href="?id=logout"><i class="sl sl-icon-power"></i> Logout</a></li>
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
							<li>News Add</li>
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
                     News Category
                     <select id="catid" name="catid">
                       <option value="0">-- Select Type --</option>
                     <?php
                      $getcat=mysql_query("select * from tbl_news_category");
					  while($rowcategory=mysql_fetch_array($getcat))
					  {
					 ?>
                        <option value="<?php echo $rowcategory['news_cat_id'];?>"><?php echo $rowcategory['news_cat_title'];?></option>
                       <?php
                      }
					 ?>  
                     </select>
                     <br>
                     News Title
                     <input type="text" name="title"><br>
                     Descryption
                     <textarea name="des" rows="7" cols="10"></textarea> <br>
                     News Cover Image
                     <input type="file" name="newscovimg"><br>
                     
                     News Hover Image
                     <input type="file" name="newshovimg"><br>
                     
                     <input type="submit" name="addnews" value="Create">
                    
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
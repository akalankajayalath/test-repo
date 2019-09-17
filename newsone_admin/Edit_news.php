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
$nid=$_GET['id'];
$get_current_news=mysql_query("select * from tbl_news where news_id='".$nid."'");
$newsval=mysql_fetch_array($get_current_news);
?>

<?php include "logout.php";?>

<?php
 if(isset($_POST['update_news'])){
     $nid=$_POST['newsid'];
     $etitle=$_POST['etitle'];
     $edes=$_POST['edes'];
     $evideo_url=$_POST['evideo_url'];

     $update_news=mysql_query("UPDATE tbl_news SET news_title='$etitle',news_contation1='$edes',video_url='$evideo_url' WHERE news_id='$nid'");
     if($update_news){
         echo "<script type='text/javascript'>alert('news Updated')</script>";
        // header("location:edit.php");
     }
     else{
         echo "<script type='text/javascript'>alert('news update Error')</script>";
        // header("location:edit.php");
     }
 }

if(isset($_POST['update_news_img'])){
  $nid=$_POST['newsid'];
  $catid=$_POST['newscat'];

    $fileNewName = time();

    $imgname1='';
    $imgname2='';
    $thumbimgname='';

    $target_dir="";
    $target_dir_thumb="";
    $imgname1=$_FILES["newscovimg"]["name"];
    $imgname2=$_FILES["newshovimg"]["name"];

    if($catid==1){
        $target_dir="../news_imges/local_news_img/";
        $target_dir_thumb="../news_imges/local_news_img/local_news_img_thumb/";
        $imgname11="news_imges/local_news_img/".$imgname1;
        $imgname22="news_imges/local_news_img/".$imgname2;

        $target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
        $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
        $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
        $thumbimgname11="news_imges/local_news_img/local_news_img_thumb/".$thumbimgname;

    }
    else if($catid==2){
        $target_dir="../news_imges/foreign_news_img/";
        $target_dir_thumb="../news_imges/foreign_news_img/foreign_news_img_thumb/";
        $imgname11="news_imges/foreign_news_img/".$imgname1;
        $imgname22="news_imges/foreign_news_img/".$imgname2;

        $target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
        $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
        $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
        $thumbimgname11="news_imges/foreign_news_img/foreign_news_img_thumb/".$thumbimgname;

    }
    else if($catid==3){
        $target_dir="../news_imges/sport_news_img/";
        $target_dir_thumb="../news_imges/sport_news_img/sport_news_img_thumb/";
        $imgname11="news_imges/sport_news_img/".$imgname1;
        $imgname22="news_imges/sport_news_img/".$imgname2;

        $target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
        $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
        $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
        $thumbimgname11="news_imges/sport_news_img/sport_news_img_thumb/".$thumbimgname;

    }
    else if($catid==4){
        $target_dir="../news_imges/gossip_img/";
        $target_dir_thumb="../news_imges/gossip_img/gossip_img_thumb";
        $imgname11="news_imges/gossip_img/".$imgname1;
        $imgname22="news_imges/gossip_img/".$imgname2;

        $target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
        $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
        $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
        $thumbimgname11="news_imges/gossip_img/gossip_img_thumb".$thumbimgname;

    }
    else if($catid==5){
        $target_dir="../news_imges/entertainment_img/";
        $target_dir_thumb="../news_imges/entertainment_img/entertainment_img_thumb/";
        $imgname11="news_imges/entertainment_img/".$imgname1;
        $imgname22="news_imges/entertainment_img/".$imgname2;

        $target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
        $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
        $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
        $thumbimgname11="news_imges/entertainment_img/entertainment_img_thumb/".$thumbimgname;

    }


    $target_file1=$target_dir.basename($_FILES["newscovimg"]["name"]);
    $target_file2=$target_dir.basename($_FILES["newshovimg"]["name"]);

    $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
    $imageFileType2=pathinfo($target_file2,PATHINFO_EXTENSION);


    $type1=$_FILES["newscovimg"]["type"];
    $size1=$_FILES["newscovimg"]["size"];
    $file=$_FILES["newscovimg"]["tmp_name"];
    $sourceProperties = getimagesize($file);


    $type2=$_FILES["newshovimg"]["type"];
    $size2=$_FILES["newshovimg"]["size"];

    $imageType = $sourceProperties[2];
    //////////////////////////////
    switch ($imageType) {


        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file);
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagepng($targetLayer,$target_dir_thumb. $fileNewName. "_thump.". $imageFileType1);
            $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
            break;


        case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file);
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagegif($targetLayer,$target_dir_thumb. $fileNewName. "_thump.". $imageFileType1);
            $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
            break;


        case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file);
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagejpeg($targetLayer,$target_dir_thumb. $fileNewName. "_thump.". $imageFileType1);
            $thumbimgname=$fileNewName. "_thump.". $imageFileType1;
            break;


        default:
            echo "Invalid Image type.";
            exit;
            break;
    }


    //////////////////////////////
    //echo $catid.' '.$title.' '.$des.' '.$imgname1.' '.$imgname2.' '.$ctoday.' '.$ctime;

    ///add news..

    $update_news_img=mysql_query("UPDATE tbl_news SET news_cover_img='$imgname11',news_hover_img='$imgname22',news_title_img='$imgname11',news_thumb_image='$thumbimgname11' WHERE news_id='$nid'");
    if($update_news_img)
    {
        move_uploaded_file($_FILES["newscovimg"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["newshovimg"]["tmp_name"], $target_file2);
        move_uploaded_file($file, $target_dir_thumb. $fileNewName. ".". $imageFileType1);

        echo "<script type='text/javascript'>alert('news Image Updated')</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Error updating images')</script>";
    }
    /////////



}

function imageResize($imageResourceId,$width,$height) {

    $targetWidth =100;
    $targetHeight =100;

    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;

}
?>
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
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
        <link rel="stylesheet" href="css/site.css">
        <link rel="stylesheet" href="css/richtext.min.css">
        
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery.richtext.js"></script>
<script src="js/jquery.richtext.min.js"></script>

<script>
        $(document).ready(function() {
            $('.content').richText();
        });
        </script>
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
							<li>News Edit</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		
		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-8 col-md-8">
				<form action="" method="post">

                    News ID
                    <input type="text" name="newsid" readonly value="<?php echo $newsval['news_id'];?>"><br>
                    News Title
                    <input type="text" name="etitle" value="<?php echo $newsval['news_title'];?>"><br>
                    Descryption
                    <textarea name="edes" class="content" rows="7" cols="10"><?php echo $newsval['news_contation1'];?></textarea> <br>
                    Video Embeded URL (width 360, height 315)
                    <textarea name="evideo_url" rows="4" cols="10"><?php echo $newsval['video_url'];?></textarea> <br>

                    <input type="submit" name="update_news" value="Edit">

                </form>

                <hr>
                <form action="" method="post" enctype="multipart/form-data">

                    News ID
                    <input type="text" name="newsid" readonly value="<?php echo $newsval['news_id'];?>"><br>
                    <input type="hidden" name="newscat" value="<?php echo $newsval['news_catgory'];?>"><br>
                    Current Cover Image (<?php echo $newsval['news_cover_img'];?>)
                    <img src="../<?php echo $newsval['news_cover_img'];?>"><br>
                    News Cover Image
                    <input type="file" name="newscovimg"><br>
                    Current Hover Image (<?php echo $newsval['news_hover_img'];?>)
                    <img src="../<?php echo $newsval['news_hover_img'];?>"><br>
                    News Hover Image
                    <input type="file" name="newshovimg"><br>
                    <input type="submit" name="update_news_img" value="Edit">

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
<?php 
error_reporting(0);
    header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
?>

<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<?php
include_once 'models/News_model.php';
include_once 'config/Config.php';
$page_name="Local_news.php";

$id=preg_replace('/\s+/', '', $_GET['id']);
$page = isset($_GET['page'])?intval($_GET['page']-1):0;
$news=new News_model;
$one_news=$news->Get_news();
$second_news=$news->Get_local_news($id);
$nb_elem_per_page =10;
$number_of_pages = intval(count($second_news)/$nb_elem_per_page)+1;
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News</title>
	
	<!-- ~~~=| Fonts files |==-->
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700,900,700italic,400italic,300italic,100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,400italic,500,700,700italic,900' rel='stylesheet' type='text/css'>
	
	
	<!-- ~~~=| Font awesome |==-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	
	<!-- ~~~=| Bootstrap css |==-->
    <link rel="stylesheet" href="css/bootstrap.css">
	
	<!-- ~~~=| Theme files |==-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
	<link rel="shortcut icon" type="image/ico" href="images/1.ico"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
	<!-- ~~~=| Header START |=~~~ -->
	<header class="header_area">
		
		<!-- ~~~=| Logo Area END |=~~~ -->
		<?php include('Menu.html');?>
		
	</header>
	<!-- ~~~=| Header END |=~~~ -->
	
	<section class="main_news_wrapper cc_single_post_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-6 col-xs-12">
					<div class="follow_us_side">
							<div class="all_news_right">
								<center><div class="pagination">
  <a href="#">&laquo;</a>
  <?php 
for($i=1;$i<=$number_of_pages;$i++) {
	if($i==($page+1)){?>
	<a class="active" href='<?=$url.$page_name;?>?id=<?=$id?>&page=<?=$i?>'><?=$i?></a>
	<?php }else{
	?>
    <a href='<?=$url.$page_name;?>?id=<?=$id?>&page=<?=$i?>'><?=$i?></a>
<?php } }
?>
  <a href="#">&raquo;</a>
</div></center>
              <?php 
                foreach (array_slice($second_news, $page*$nb_elem_per_page, $nb_elem_per_page) as $valuees) {

                  ?>
                <div class="fs_news_right">
                <div class="single_fs_news_img"><img src="<?=$valuees['news_cover_img'];?>" alt="" /></div>
              <div class="single_fs_news_right_text">
                <h4><?php echo '<a href="Post1.php?news_id='.$valuees['news_id'].'">';?><?=$valuees['news_title'];?></a></h4>
                <p> <a href="">
                  <?php
                    if($id==1){
				     echo "දේශීයපුවත්";
				   }
				   else if($id==2){
				     echo "විදේශීයපුවත්";
				   }
				    else if($id==3){
				     echo "ක්‍රීඩා පුවත්‍";
				   }
				    else if($id==4){
				     echo "Gossip";
				   }
				    else if($id==5){
				     echo "Video";
				   }
				    else if($id==6){
				     echo "විශේශාංග";
				   }
				  ?>
                 | </a> <i class="fa fa-clock-o"></i><?=$valuees['news_date'];?></p>
                </div>
            </div>
              
            <?php 
          }?>
            </div>
						</div>
						<center><div class="pagination">
  <a href="#">&laquo;</a>
 <?php 
for($i=1;$i<=$number_of_pages;$i++) {
	if($i==($page+1)){?>
	<a class="active" href='<?=$url.$page_name;?>?id=<?=$id?>&page=<?=$i?>'><?=$i?></a>
	<?php }else{
	?>
    <a href='<?=$url.$page_name;?>?id=<?=$id?>&page=<?=$i?>'><?=$i?></a>
<?php } }
?>
  <a href="#">&raquo;</a>
</div></center>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="home_sidebar">
						
						<div class="follow_us_side">
							<h2>Follow Us</h2>
							<div class="all_single_follow">
							<div class="single_follow_us">
								<a href="https://web.facebook.com/ONE-youtube-1st-1981796675367769/">
								<i class="fa fa-facebook"></i><br>
								5638<br>
								Fans
								</a>
							</div>
							<div class="single_follow_us twit">
								<a href="">
								<i class="fa fa-twitter"></i><br>
								5638<br>
								Fans
								</a>
							</div>
							<div class="single_follow_us goopl">
								<a href="">
								<i class="fa fa-google-plus"></i><br>
								5638<br>
								Fans
								</a>
							</div>
							<div class="single_follow_us last_one">
								<a href="">
								<i class="fa fa-dribbble"></i><br>
								5638<br>
								Fans
								</a>
							</div>
							</div>
						</div>
						
						<div class="follow_us_side">
							
						</div>
					</div>
					<img src="news_imges/local_news_img/1.png">
				</div>
			</div>
		</div>
	</section>
	
	
	<!-- ~~~=| Footer START |=~~~ -->
	<footer class="footer_area">
		<?php include('Footer.php');?>
	</footer>
	<!-- ~~~=| Footer END |=~~~ -->
	
	<!-- ~~~=| Latest jQuery |=~~~ -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
	
	<!-- ~~~=| Bootstrap jQuery |=~~~ -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- ~~~=| Opacity & Other IE fix for older browser |=~~~ -->
	<!--[if lte IE 8]>
		<script type="text/javascript" src="js/ie-opacity-polyfill.js"></script>
	<![endif]-->
	
	<!-- ~~~=| Theme jQuery |=~~~ -->
    <script src="js/main.js"></script>
  </body>
</html>

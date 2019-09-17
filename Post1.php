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
$news_id=$_GET['news_id'];
if(isset($_GET['id'])){

$id=preg_replace('/\s+/', '', $_GET['id']);
}
else{
$id=1;
}
include_once 'models/News_model.php';
include_once 'config/Config.php';
$page_name="Post1.php";
$news=new News_model;
$news_value=$news->get_news_byId($news_id);
$one_news=$news->Get_news();
$second_news=$news->Get_local_news($id);
$title=$news_value['news_title'];
$summary=$news_value['news_contation1'];
//$image=$news_value["news_title_img"];
$image=$news_value["news_thumb_image"];
$imagethumb=$url.$news_value["news_thumb_image"];
$url2=$url."Post1.php?news_id=".$news_id;
//echo $imagethumb;

?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="<?=$url2;?>" /> 
    <meta property="og:type" content="article" /> 
    <meta property="og:title" content="<?=$title;?>" /> 
    <meta property="og:description" content="click to see" /> 
    <meta property="og:image" content="<?=$imagethumb;?>" />
    
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
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
	<!-- ~~~=| Header START |=~~~ -->
	<header class="header_area">
		
		<!-- ~~~=| Logo Area END |=~~~ -->
		<?php include('Menu.html');?>
		
	</header>
	<!-- ~~~=| Header END |=~~~ -->
	
	<section class="main_news_wrapper cc_single_post_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12">
					<!-- ~~~=| Fashion area START |=~~~ -->
					<div class="cc_single_post">
						<div class="bsp_img">
							<div id="carousel-example-genericbs" class="carousel slide" data-ride="carousel">
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
								<div class="item active">
								  <?php echo '<img src="'.$news_value["news_title_img"].'" alt="blog single post" />';?>
								</div>
								
								
							  </div>
							</div>
						</div>
						<div class="sp_details">
							<a href="">News</a>
							<h1><?=$news_value['news_title'];?></h1>
							<div class="post_meta">
								<ul>
									<li><a href=""><i class="fa fa-user"></i></a></li>
									<li><a href=""><i class="fa fa-eye"></i>50</a></li>
									<li><a href=""><i class="fa fa-comment-o"></i>0</a></li>
								</ul>
							</div>
							<div class="post_text">
								<p><?=nl2br($news_value['news_contation1']);?></p>
							</div>
							<div class="social_tags">
								<div class="social_tags_left">
                                    <?php 
									 $vdo=$news_value['video_url'];
									 if($vdo){
									 ?>
									  <div><?=$news_value['video_url'];?></div>
                                      <?php
									 }else{
									  
									 }
									 ?>
								
                                    
                                    <br>
									<p>Tags :</p>
									<ul>
										<li><a href="">Photography</a></li>
										<li><a href="">Content</a></li>
										<li><a href="">News</a></li>
									</ul>
								</div>
								<div class="social_tags_right">
										<!--<div class="fb-share-button" data-href="http://newsone.asia/Post1.php?news_id=<?=$news_id;?>" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewsone.asia%2FPost1.php%3Fnews_id%3D3&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
								-->
								<div class="fb-share-button" data-href="http://newsone.asia/Post1.php?news_id=<?=$news_id;?>" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewsone.asia%2FPost1.php%3Fnews_id%3D%253C%253F%253D%2524news_id%253B%253F%253E&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
								
									
							</div>
							</div>
							<div class="sp-next-prev">
								<div class="sp-prev">
									<?php $news_id_1=$news_value['news_id']-1;
									echo '<a href="Post1.php?news_id='.$news_id_1.'">';?><i class="fa fa-angle-double-left"></i>Previous post</a>
								</div>
								<div class="sp-next">
									<?php $news_id_1=$news_value['news_id']+1;
									echo '<a href="Post1.php?news_id='.$news_id_1.'">';?>Next post<i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
							
							<div class="comment-form">
								<h2>leave your comments</h2>
								<div class="comments_form">
									<form>
										<div class="inp_name">
											<input id="c_name" type="text" placeholder="Your Name" required/>
											<input type="text" placeholder="Your Name" required/>
										</div>
										<textarea cols="30" rows="10" placeholder="Message"></textarea>
										<input type="submit" value="Send Message"/>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- ~~~=| Fashion area END |=~~~ -->
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
							<h2>Latest Post</h2>
							<div class="all_news_right">
              <?php 
            $i=5;
                foreach ($one_news as $key => $valuees) {

                  $i=$i-1;
                  ?>
                <div class="fs_news_right">
                  <div class="single_fs_news_img"><img src="<?=$valuees['news_hover_img'];?>" alt="" /></div>
              <div class="single_fs_news_right_text">
                <h4><?php echo '<a href="Post1.php?news_id='.$valuees['news_id'].'">';?><?=$valuees['news_title'];?></a></h4>
                <p> <a href="">දේශීයපුවත් | </a> <i class="fa fa-clock-o"></i><?=$valuees['news_date'];?></p>
                </div>
            </div>
            <?php 
              if($i==0){
                break;
              }
          }?>
            </div>
						</div>
						<div class="follow_us_side">
							
						</div>
					</div>
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

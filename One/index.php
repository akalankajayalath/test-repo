<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<title>One</title>

<!-- ~~~=| Fonts files |==-->


<!-- ~~~=| Font awesome |==-->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<!-- ~~~=| Bootstrap css |==-->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- ~~~=| Theme files |==-->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/responsive.css">

<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!-- Done by Shakhawat H. from codingcouples.com // -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
include_once 'models/News_model.php';

$news=new News_model;
$one_news=$news->Get_news();
$second_news=$news->Get_local_news();
?>
<!-- ~~~=| Header START |=~~~ -->
<header class="header_area">
  
  <!-- ~~~=| Logo Area END |=~~~ --> 


  <?php include('Menu.html');?>
  
</header>
<!-- ~~~=| Header END |=~~~ --> 

<!-- ~~~=| Banner START |=~~~ -->
<section class="hp_banner_area section_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="hp_banner_box">
          <div class="hp_banner_left">
            <?php 
            $i=3;
                foreach ($one_news as $key => $value) {

                  $i=$i-1;
                  ?>
                
            <div class="bl_single_news"> <img src="news_imges/local_news_img/<?=$value['news_hover_img'];?>" alt="" />
              <div class="bl_single_text"><?php echo '<a href="Post1.php?news_id='.$value['news_id'].'">';?>
                <h4><?=$value['news_title'];?></h4>
                </a> <span><i class="fa fa-clock-o"></i><?=$value['news_date'];?></span> </div>
            </div>
            <?php 
              if($i==0){
                break;
              }
          }?>
          </div>
          <div class="hp_banner_right">
            <div class="br_single_news"> <img src="images/brt-banner1.jpg" alt="" />
              <div class="br_single_text"> <span class="green_hp_span">Environment</span> <a href="#">
                <h4></h4>
                </a> </div>
              <div class="br_cam"> <a href="" class="fa fa-camera"></a> </div>
            </div>
            <div class="br_single_news"> <img src="images/brt-banner2.jpg" alt="" />
              <div class="br_single_text"> <span class="blue_hp_span">Travel</span> <a href="#">
                <h4></h4>
                </a> </div>
              <div class="br_cam"> <a href="" class="fa fa-camera"></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ~~~=| Banner END |=~~~ --> 

<!-- ~~~=| Main Wrapper END |=~~~ -->
<section class="main_news_wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-9 col-xs-12"> 
        <!-- ~~~=| Fashion area START |=~~~ -->
        <div class="fashion_area">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              
              <div class="header_fasion gadgets_heading">
                <div class="left_fashion main_nav_box">
                  <ul>
                    <li class="nav_gadgets"><a href="">පුවත්</a></li>
                  </ul>
                </div>
                <div class="fasion_right"> <a href=""><img src="images/hor_dot.png" alt="" /></a> </div>
              </div>
              <div class="gadgets_area_box">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="fs_news_left fs_gadgets_news_left">
                      <?php 
                      $i=0;
                      foreach ($second_news as $key => $value) {
                        if($value['news_id']%2==0){
                          if($i==0){?>
                          <div class="fs_news_left_img_g"> <img src="news_imges/local_news_img/<?=$value['news_cover_img'];?>" alt="" />
                        <div class="br_cam br_vid_big"> <a class="fa fa-caret-right" href="#"></a> </div>
                      </div>
                      <div class="single_fs_news_left_text">
                        <h4><a href="post1.html"><?php echo '<a href="Post1.php?news_id='.$value['news_id'].'">';?><?=$value['news_title'];?></a></h4>
                        <p> <a href="">දේශීයපුවත් | </a> <i class="fa fa-clock-o"></i><?=$value['news_date'];?></p>
                      </div>
                          <?php } else if($i<4){
                        ?>
                       <div class="all_news_right">
                        <div class="fs_news_right">
                          <div class="single_fs_news_img"> <img src="news_imges/local_news_img/<?=$value['news_hover_img'];?>" alt="" /> </div>
                          <div class="single_fs_news_right_text">
                            <h4><a href="blog-single-slider-post.html"><?php echo '<a href="Post1.php?news_id='.$value['news_id'].'">';?><?=$value['news_title'];?></a></h4>
                             <p> <a href="">දේශීයපුවත් | </a> <i class="fa fa-clock-o"></i><?=$value['news_date'];?></p>
                          </div>
                        </div>
                      </div>
                      <?php }$i=$i+1;}}?>
                      
                      
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="fs_news_left fs_gadgets_news_left">
                      <?php 
                      $i=0;
                      foreach ($second_news as $key => $value) {
                        if($value['news_id']%2==1){
                          if($i==0){?>
                          <div class="fs_news_left_img_g"> <img src="news_imges/local_news_img/<?=$value['news_cover_img'];?>" alt="" />
                        <div class="br_cam br_vid_big"> <a class="fa fa-caret-right" href="#"></a> </div>
                      </div>
                      <div class="single_fs_news_left_text">
                        <h4><a href="post1.html"><?php echo '<a href="Post1.php?news_id='.$value['news_id'].'">';?><?=$value['news_title'];?></a></h4>
                        <p> <a href="">දේශීයපුවත් | </a> <i class="fa fa-clock-o"></i><?=$value['news_date'];?></p>
                      </div>
                          <?php } else if($i<4){
                        ?>
                       <div class="all_news_right">
                        <div class="fs_news_right">
                          <div class="single_fs_news_img"> <img src="news_imges/local_news_img/<?=$value['news_hover_img'];?>" alt="" /> </div>
                          <div class="single_fs_news_right_text">
                            <h4><a href="blog-single-slider-post.html"><?php echo '<a href="Post1.php?news_id='.$value['news_id'].'">';?><?=$value['news_title'];?></a></h4>
                             <p> <a href="">දේශීයපුවත් | </a> <i class="fa fa-clock-o"></i><?=$value['news_date'];?></p>
                          </div>
                        </div>
                      </div>
                      <?php }$i=$i+1;}}?>
                      
                      
                    </div>
                  </div>

                </div>
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
              <div class="single_follow_us"> <a href="https://web.facebook.com/ONE-youtube-1st-1981796675367769/"> <i class="fa fa-facebook"></i><br>
                665<br>
                Fans </a> </div>
              <div class="single_follow_us twit"> <a href=""> <i class="fa fa-twitter"></i><br>
                5638<br>
                Fans </a> </div>
              <div class="single_follow_us goopl"> <a href=""> <i class="fa fa-google-plus"></i><br>
                5638<br>
                Fans </a> </div>
              <div class="single_follow_us last_one"> <a href=""> <i class="fa fa-dribbble"></i><br>
                5638<br>
                Fans </a> </div>
            </div>
          </div>
          <div class="follow_us_side">
            <h2>Latest Post</h2>
            <div class="all_news_right">
              <?php 
            $i=5;
                foreach ($one_news as $key => $value) {

                  $i=$i-1;
                  ?>
                <div class="fs_news_right">
                  <div class="single_fs_news_img"><img src="news_imges/local_news_img/<?=$value['news_hover_img'];?>" alt="" /></div>
              <div class="single_fs_news_right_text">
                <h4><?php echo '<a href="Post1.php?news_id='.$value['news_id'].'">';?><?=$value['news_title'];?></a></h4>
                <p> <a href="">දේශීයපුවත් | </a> <i class="fa fa-clock-o"></i><?=$value['news_date'];?></p>
                </div>
            </div>
            <?php 
              if($i==0){
                break;
              }
          }?>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ~~~=| Main Wrapper END |=~~~ --> 

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

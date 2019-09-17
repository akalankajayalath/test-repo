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
<title>News</title>

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
<link rel="shortcut icon" type="image/ico" href="images/1.ico"/>

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
if(isset($_GET['id'])){
$id=$_GET['id'];
}
else{
$id=1;
}
$news=new News_model;
$one_news=$news->Get_news();
$second_news=$news->Get_local_news($id);
$videos=$news->Get_vedio();
?>
<!-- ~~~=| Header START |=~~~ -->
<header class="header_area">
  
  <!-- ~~~=| Logo Area END |=~~~ --> 


  <?php include('Menu.html');?>
  
</header>
<!-- ~~~=| Header END |=~~~ --> 

<!-- ~~~=| Banner START |=~~~ -->

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
                    <li class="nav_gadgets"><a href="">Videos</a></li>
                  </ul>
                </div>
                <div class="fasion_right"> <a href=""><img src="images/hor_dot.png" alt="" /></a> </div>
              </div>
              <div class="gadgets_area_box">
                <div class="row">
                    
                    <!--video loop-->
                   <?php
                     foreach ($videos as $key => $vdo) {
                         
                        ?>
                    
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            
                    <div class="fs_news_left fs_gadgets_news_left">
                       video<br>
                       <?php echo $vdo['vedio_link'];?>                     
                    
                    </div>
                  </div>
                        <?php
                     }
                        ?> 
                  
                  
                
                  <!--video loop-->
                    
                    

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
              <div class="single_follow_us twit"> <a href="https://www.youtube.com/channel/UCGtOK24ZoPNATotzyts4k2A/videos" target="_blank"> <i class="fa fa-youtube"></i><br>
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
                  <div class="single_fs_news_img"><img src="<?=$value['news_hover_img'];?>" alt="" /></div>
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

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
 if(isset($_GET['deleteid'])){
     $deleteid=$_GET['deleteid'];
     $delete_news=mysql_query("DELETE FROM tbl_news WHERE news_id='$deleteid'");
     if($delete_news){

         echo "<script type='text/javascript'>alert('news Deleted')</script>";
        // header("location:edit.php");
     }
     else{
         echo "<script type='text/javascript'>alert('Deleting Error')</script>";
        // header("location:edit.php");
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
                                <li>News Add</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>


            <!-- Content -->
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box margin-top-0">
                        <h4>All News</h4>
                        <ul>
                             <?php
                              $get_all_news=mysql_query("select * from tbl_news where news_active=1 order by news_id DESC ");
                             while($news=mysql_fetch_array($get_all_news)){

                             ?>
                            <li>

                                <div class="buttons-to-left">
                                    <div class="inner">
                                        <h5><a href="#"><?php echo $news['news_id'];?> - <?php echo $news['news_title'];?></a></h5>
                                    </div>
                                </div>
                                <div class="buttons-to-right">
                                    <a href="Edit_news.php?id=<?php echo $news['news_id'];?>" target="_blank" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                    <a href="?deleteid=<?php echo $news['news_id'];?>"" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                                </div>
                            </li>

                            <?php
                             }
                            ?>

                        </ul>
                    </div>
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
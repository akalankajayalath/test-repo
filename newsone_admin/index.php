<?php
session_start();
include "includes/config/dbconfig.php";

?>
<?php

include "includes/config/dbconfig.php";
if(isset($_POST['loginchk'])){
  $username=$_POST['username'];
  $password=md5(sha1($_POST['password']));
  
  $checkaccess=mysql_query("select * from tbl_user where user_name='$username' and user_pw='$password' and user_active=1");
  if(mysql_num_rows($checkaccess)>0){
    $_SESSION['username']=$username;
	header("location:dashboard.php");
  }
  else{
  ?>
    <div class="row">
			<div class="col-md-12">
				<div class="notification Error closeable margin-bottom-30">
					<p><strong>Login Failed</strong></p>
					<a class="close" href="#"></a>
				</div>
			</div>
		</div>
  <?php      
  }
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

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->

<!-- Header Container / End -->

<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>USER LOGIN</h2>
					<!-- Breadcrumbs -->
				</div>
                
			</div>
            <br>
            <div class="row">
             <div class="col-md-6">
                  <form action="" method="post">
                     <input type="text" name="username" placeholder="Username"><br>
                     <input type="password" name="password" placeholder="Password"><br>
                     <input type="submit" name="loginchk" value="Login">
                  </form>
                </div>
            </div>
		</div>


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


<?php
if(isset($_GET['id']) && $_GET['id']=='logout')
{
	 $_SESSION['username']=="";
	 session_destroy();
	 header("location:index.php");
}
?>
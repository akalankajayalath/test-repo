 <?php

$host="us-cdbr-iron-east-02.cleardb.net";
$username="b3be37bc346701";
$password="4bdbd3d9";
$db="heroku_fa4a0e04a39f301";
$conn= new mysqli($host,$username,$password,$db)or die($conn->connect_error);
$GLOBALS['con']=$conn;

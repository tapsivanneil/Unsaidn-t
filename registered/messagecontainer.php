<?php
require('connect.php');
require '../loginsystem/config.php';


session_start();
$username = htmlspecialchars($_SESSION["username"]);

if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($link, $_SESSION["username"]);
	$messages = mysqli_real_escape_string($connection, $_POST['msg']);
 
	$isql = "INSERT INTO $username (username, messages) VALUES ('$username', '$messages')";
	$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
	
    if($ires){
		
	}else{
		$fmsg = "Failed to Submit Your Comment";
	}
 
	}
?>
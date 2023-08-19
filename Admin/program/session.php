<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");

?>
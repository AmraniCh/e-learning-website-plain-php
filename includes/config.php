<?php 
	$dbhost="localhost";
	$dbuser="root";
	$dbpassword="";
	$dbname="demosite";
	$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
	mysqli_set_charset($con, "utf8")
	//mysqli_query($con, 'SET NAMES utf8');
	//mysqli_select_db($con, $dbname)or die("Connection Failed");
?>
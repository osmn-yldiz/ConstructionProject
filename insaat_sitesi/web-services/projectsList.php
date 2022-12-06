<?php 
	include 'includes/config.php';
	include 'includes/functions.php';

	header("content-type:application/json");
	
	$ProjectsCategoriesID = $_GET['ProjectsCategoriesID'];

	$line = projectsList($ProjectsCategoriesID);
	
	print json_encode($line);
?>
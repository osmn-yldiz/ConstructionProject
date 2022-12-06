<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = PagesDelete($ID);
	if($result){
		header('location: pages.php');
		exit;
	}
}

?>
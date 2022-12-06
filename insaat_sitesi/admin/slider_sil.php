<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = SliderDelete($ID);
	if($result){
		header('location: slider.php');
		exit;
	}
}

?>
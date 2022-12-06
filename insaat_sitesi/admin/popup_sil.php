<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = PopupDelete($ID);
	if($result){
		header('location: popup.php');
		exit;
	}
}

?>
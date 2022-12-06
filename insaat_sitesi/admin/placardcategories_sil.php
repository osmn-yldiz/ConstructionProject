<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = placardcategoriesDelete($ID);
	if($result){
		header('location: placardcategories.php');
		exit;
	}
}

?>
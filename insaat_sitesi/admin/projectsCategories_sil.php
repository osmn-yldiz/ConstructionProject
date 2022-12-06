<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = projectsCategoriesDelete($ID);
	if($result){
		header('location: projectsCategories.php');
		exit;
	}
}

?>
<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$PlaCardCategoryID = $_GET['PlaCardCategoryID'];
	$result = placardDelete($ID);
	if($result){
		header('location: placard.php?PlaCardCategoryID='.$PlaCardCategoryID);
		exit;
	}
}

?>
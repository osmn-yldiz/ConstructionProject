<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_GET['ID'])){
	$ID  = $_GET['ID'];
	$result = ProjectsDelete($ID);
	if($result){
		header('location: projects.php');
		exit;
	}
}

?>
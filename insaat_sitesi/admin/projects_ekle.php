<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = ProjectsAdd();

	print_r($result);
}

?>
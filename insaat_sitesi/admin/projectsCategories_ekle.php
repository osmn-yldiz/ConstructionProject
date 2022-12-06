<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = projectsCategoriesAdd();

	print_r($result);
}

?>
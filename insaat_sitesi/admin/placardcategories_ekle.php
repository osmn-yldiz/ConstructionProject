<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = placardcategoriesAdd();

	print_r($result);
}

?>
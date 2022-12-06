<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = BrandsAdd();

	print_r($result);
}

?>
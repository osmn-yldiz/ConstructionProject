<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = PropertyAdd();

	print_r($result);
}

?>
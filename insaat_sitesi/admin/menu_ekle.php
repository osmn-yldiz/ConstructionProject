<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['ekle'])){
	$result = mainMenuAdd();

	print_r($result);
}

?>
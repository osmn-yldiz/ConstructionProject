<?php  

include 'config.php';
include 'functions.php';

loginControl();

if(isset($_POST['guncelle'])){
	$result = mainMenuEdit($_GET['ID']);

	print_r($result);
}

?>
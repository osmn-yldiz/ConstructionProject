<?php  

include 'config.php';
include 'functions.php';

loginControl();
if(isset($_POST['guncelle'])){
	$result = settingsEdit();

	print_r($result);
}else{
	print "girmedi";
}

?>
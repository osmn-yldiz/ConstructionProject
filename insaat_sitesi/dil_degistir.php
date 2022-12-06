<?php  

session_start();

$Lang = $_GET['lang'];

if($Lang == 'tr' || $Lang == 'en' || $Lang == 'ge'){
	$_SESSION['LANG'] = $Lang;
}

/*
if ($Lang == "tr") {
	$_SESSION['LANG'] = "tr";
}
else if ($Lang == "en") {
	$_SESSION['LANG'] = "en";
}
else {
	$_SESSION['LANG'] = "ge";
}*/

header("location: index.php");









?>
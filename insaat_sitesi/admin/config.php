<?php

error_reporting(0);
session_start();
ob_start();
try {
	$db = new PDO("mysql:host=localhost; dbname=insaat_sitesi; charest=utf8", 'osman', 'Oy621207.');
	$db->query("SET NAMES 'UTF8'");
	//echo 'Veritabanı Bağlantısı Başarılı';
} catch (Exception $e) {
	echo $e->getMessage(); 
}

?>
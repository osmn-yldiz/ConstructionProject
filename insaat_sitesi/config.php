<?php
error_reporting(0);
ob_start();
session_start();
$host = "localhost";
$dbname = "insaat_sitesi";
$user = "osman";
$pass = "Oy621207.";

try {
	$db = new PDO("mysql:host=".$host."; dbname=".$dbname."; charest=utf8", $user, $pass);
	$db->query("SET NAMES 'UTF8'");
	//echo 'Veritabanı Bağlantısı Başarılı';
} catch (Exception $e) {
	echo $e->getMessage(); 
}

$URL = "http://localhost:8080/osman/insaat_sitesi/";
$SITE_DATE = date("Y-m-d H:i:s");

//print base64_encode("jkjkjkjkjkmgmfmhmtmsmsmgllakdtkdkasdadf");

//$SITE_DATE = "2020-08-02 19:00:01";
?>
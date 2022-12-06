<?php  

include '../config.php';
include '../functions.php';

$Email = $_POST['Email'];

if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
	print "Doğru mail adresi giriniz.";
	exit;
}


$result = emailListAdd($Email);
if ($result) {
	print "Başarılı bir şekilde kaydedildi.";
}
else {
	print "Kayıt işleminde hata oluştu.";
}

?>
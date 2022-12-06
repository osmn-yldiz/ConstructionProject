<?php  

include 'config.php';
include 'functions.php';

$data[0]["Name"] = "Proje 1"; 
$data[0]["Images"] = "23.jpg"; 

$data[1]["Name"] = "Proje 2"; 
$data[1]["Images"] = "23.jpg"; 

$data[2]["Name"] = "Proje 3"; 
$data[2]["Images"] = "23.jpg";

$data[3]["Name"] = "Proje 4"; 
$data[3]["Images"] = "23.jpg";

$data[4]["Name"] = "Proje 5"; 
$data[4]["Images"] = "23.jpg";

$data[5]["Name"] = "Proje 6"; 
$data[5]["Images"] = "23.jpg";

$data[6]["Name"] = "Proje 7"; 
$data[6]["Images"] = "23.jpg";

$data[7]["Name"] = "Proje 8"; 
$data[7]["Images"] = "23.jpg";

$data[8]["Name"] = "Proje 9"; 
$data[8]["Images"] = "23.jpg";

$data[9]["Name"] = "Proje 10"; 
$data[9]["Images"] = "23.jpg";


/*for($i=0; $i <= 100; $i++) {
	$random = rand(0,9);

	$sorgu = $db->prepare("INSERT INTO projects(ProjectsCategoriesID, Name, Images)  VALUES(2,?,?)");
	if($sorgu->execute(array($data[$random]['Name'],$data[$random]['Images']))){
		print ($i+1)." Eklendi<br>";
	}
}*/

for($i=0; $i <= 1000; $i++) {
	$Name = "Yıldız İnşaat". ($i+1);
	$Images = "30.jpg";
	$sorgu = $db->prepare("INSERT INTO projects(ProjectsCategoriesID, Name, Images)  VALUES(1,?,?)");
	if($sorgu->execute(array($Name,$Images))){
		print ($i+1)." Eklendi<br>";
	}
}
?>
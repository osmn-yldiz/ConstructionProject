<?php 

include 'config.php';
include 'class/simple_html_dom.php';
$url = "https://ankarainsaat.net/";
// Create DOM from URL or file
$html = file_get_html($url."projeler");

// Find all images
$i=1;
foreach($html->find('.project-box') as $element)
{
  $proje_baslik = $element->find('h2', 0);
  $proje_resim = $element->find("img", 0)->src;
  $new_resim = $i.".jpg";
  copy($url.$proje_resim, "uploads/projects/".$new_resim);
  $db->query("INSERT INTO projects(Name, Images) VALUES('".strip_tags(trim($proje_baslik))."', '".$new_resim."');");
  print $i." eklendi.<br>";
  $i++;
    //$proje_adi = strip_tags(trim($element));
}


?>
<?php
	function projectsList($ProjectsCategoriesID) {

	global $db;


	$result = $db->prepare("SELECT * FROM projects WHERE ProjectsCategoriesID=?");
	$result->execute(array($ProjectsCategoriesID));
	$line = $result->fetchAll(PDO::FETCH_OBJ);
	return $line;

}

function projectsCategoriesList() {
	global $db;

	$result = $db->prepare("SELECT ID, Name, Images, SeoName FROM projectscategories");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_OBJ);
	return $line;

}
?>
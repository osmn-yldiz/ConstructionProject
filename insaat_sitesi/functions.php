<?php  

require 'class/phpmailer/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'db.php';
$database = new database($host,$dbname,$user,$pass);
$database->connect();

function jsonPost($url, $data){
	$data_string = json_encode($data);

	$ch = curl_init($url);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',                                                                                
		'Content-Length: ' . strlen($data_string))
);                                                                                                                   

	return $result = curl_exec($ch);
}

function mainMenuList($SupID) {

	global $db;

	$SupID = intval($SupID);
	$result = $db->prepare("SELECT *, Name_".$_SESSION['LANG']."  AS Name FROM main_menu WHERE SupID=? ORDER BY OrderNumber ASC");
	$result->execute(array($SupID));
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function SliderList() {
	global $db;

	$result = $db->prepare("SELECT * FROM slider ORDER BY ID DESC");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function PropertyList() {
	global $db;

	$result = $db->prepare("SELECT * FROM property ORDER BY ID DESC");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);

	return $line;
}


function popupModal(){
	global $db, $SITE_DATE;

	$result = $db->prepare("SELECT * FROM popup WHERE Status=1 AND '".$SITE_DATE."' BETWEEN StartDate AND EndDate");
	$result->execute();
	if($result->rowCount() > 0){
		$line = $result->fetch(PDO::FETCH_ASSOC);

		return $line;
	}else{
		return "yok";
	}

}

function Counter() {

	global $db;
	$Count = 1;
	$IP = $_SERVER['REMOTE_ADDR'];
	$date = date("Y-m-d");
//$IP = "192.168.4.95"; 

/*$sorgu = $db->prepare("SELECT * FROM visited_count WHERE IP=?");
$sorgu->execute(array($IP));

if($sorgu->rowCount() > 0){*/

	$sorgu = $db->prepare("UPDATE visited_count SET Count = Count + 1 WHERE IP=? AND Date = ?");
	$sorgu->execute(array($IP, $date));
//print $sorgu->rowCount() ;
	if($sorgu->rowCount() == 0){
		$result = $db->prepare("INSERT INTO visited_count(Count, IP, CreateDate, Date) VALUES(?,?,NOW(), ?)");
		$result->execute(array($Count, $IP, $date));
	}

/*}
else
{

	$result = $db->prepare("INSERT INTO visited_count(Count, IP, CreateDate) VALUES(?,?,NOW())");
	$result->execute(array($Count, $IP));

}*/
}

/*for($i=0;$i<1000000;$i++){
$Count = 1;
$IP = "192.168.4.58";
$result = $db->prepare("INSERT INTO visited_count(Count, IP, CreateDate) VALUES(?,?,NOW())");
$result->execute(array($Count, $IP));
}*/
Counter();


function pagesFindID($ID) {

	global $db, $URL;

	$sorgu = $db->prepare("SELECT * FROM pages WHERE ID=?");
	$sorgu->execute(array(intval($ID)));

	if ($sorgu->rowCount() > 0) {

		$row = $sorgu->fetch(PDO::FETCH_ASSOC);
		return $row;

	}
	else
	{
		header("location: ".$URL);
	}

}

function pagesFindSeoName($SeoName) {

	global $db, $URL;

	$sorgu = $db->prepare("SELECT * FROM pages WHERE SeoName=?");
	$sorgu->execute(array($SeoName));

	if ($sorgu->rowCount() > 0) {

		$row = $sorgu->fetch(PDO::FETCH_ASSOC);
		return $row;

	}
	else
	{
		header("location: ".$URL);
	}

}

function pagesFindSupID($ID) {

	global $db;

	$sorgu = $db->prepare("SELECT * FROM pages WHERE ID=?");
	$sorgu->execute(array(intval($ID)));

	if ($sorgu->rowCount() > 0) {

		$row = $sorgu->fetch(PDO::FETCH_ASSOC);
		return $row;

	}
/*else
{
	header("location: index.php");
}*/

}

function pagesHomeShow() {

	global $db;

	$result = $db->query("SELECT * FROM pages WHERE HomeShow=1 AND Status=1");
	$row = $result->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

function pagesList() {

	global $db;

	$result = $db->prepare("SELECT * FROM pages WHERE Status=1 AND SupID > 0");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function PlaCardList($CategoryID) {

	global $db; 

	$CategoryID = intval($CategoryID);

	$result = $db->prepare("SELECT * FROM placard WHERE PlaCardCategoryID = ?");
	$result->execute(array($CategoryID));
	$row = $result->fetchAll(PDO::FETCH_ASSOC);
	return $row;

}

/*function PlaCardExpCuff() {

	global $db;

	$result = $db->prepare("SELECT * FROM placard WHERE ExpCuff=1");
	$result->execute();
	$row = $result->fetch(PDO::FETCH_ASSOC);
	return $row;

}*/

function PlaCardCategoriesList($PlaCardRouterID) {

	global $db; 

	$result = $db->prepare("SELECT * FROM PlaCardCategories WHERE PlaCardRouterID=?");
	$result->execute([$PlaCardRouterID]);
	$row = $result->fetchAll(PDO::FETCH_ASSOC);
	return $row;

}

function projectsList($a, $start) {

	global $db, $database;
	$database->query("SELECT projectscategories.ID as katID, projectscategories.Name as katName, projects.Name, projects.SeoName, projects.ID, projects.Images, projects.Boss, projects.JobName, projects.ContractStartDate, projects.ContractEndDate FROM projectscategories INNER JOIN projects ON projectscategories.ID=projects.ProjectsCategoriesID
		WHERE ProjectsCategoriesID=:a LIMIT $start, 6");
	$database->bind(":a", $a);
	return $database->getObjRows();

	/*$result = $db->prepare("SELECT * FROM projects WHERE ProjectsCategoriesID=?");
	$result->execute(array($a));
	$line = $result->fetchAll(PDO::FETCH_OBJ);
	return $line;*/



}

function projectsListTotalCount($a) {

	global $db, $database;
	$database->query("SELECT * FROM projects WHERE ProjectsCategoriesID=:a");
	$database->bind(":a", $a);
	$database->execute();
	return $database->rowCount();

	/*$result = $db->prepare("SELECT * FROM projects WHERE ProjectsCategoriesID=?");
	$result->execute(array($a));
	$line = $result->fetchAll(PDO::FETCH_OBJ);
	return $line;*/

}
function projectsAllList() {

	global $db;

	$result = $db->prepare("SELECT * FROM projects");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function projectsFindCategoriesID($ID) {

	global $db;

	$result = $db->prepare("SELECT * FROM projectscategories WHERE ID =?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);
	return $line;

}

function projectsFindSeoNameWithID($SeoName) {

	global $db;

	$result = $db->prepare("SELECT ID FROM projectscategories WHERE SeoName =?");
	$result->execute(array($SeoName));
	$line = $result->fetch(PDO::FETCH_ASSOC);
	return $line['ID'];

}

function projectsCategoriesListArray() {

	global $db;

	$result = $db->prepare("SELECT * FROM projectscategories");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach ($line as $value) {
		$Array[$value['ID']] = $value['Name'];
	}
	return $Array;

}
function projectsCategoriesList() {

	global $db;

	$result = $db->prepare("SELECT * FROM projectscategories");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function trDate($date){
	if($date == ""){
		return "Tarih Bilgisi Girilmemiştir.";
	}
	if($date == date("Y-m-d")) {
		return "Bugün";
	}
	return date('d.m.Y', strtotime($date));
}

function projectsDetails($ID) {

	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM projects WHERE ID=?");
	$result->execute([$ID]);
	$line = $result->fetch(PDO::FETCH_ASSOC);
	return $line;
}

function projectsDetailsSeoName($SeoName) {

	global $db;

	$result = $db->prepare("SELECT * FROM projects WHERE SeoName=?");
	$result->execute([$SeoName]);
	$line = $result->fetch(PDO::FETCH_ASSOC);
	return $line;
}

function projectsImages ($projectsID) {

	global $db, $database;

	$projectsID = intval($projectsID);

	$database->query("SELECT * FROM projectsImages WHERE projectsID=:projectsID");
	$database->bind(":projectsID", $projectsID);
	return $database->getRows();

	/*$result = $db->prepare("SELECT * FROM projectsImages WHERE projectsID=?");
	$result->execute([$projectsID]);
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;*/
}

function projectsRandom() {

	global $db;

	$result = $db->prepare("SELECT projectscategories.ID as katID, projectscategories.SeoName as katSeoName, projectscategories.Name as katName, projects.Name, projects.SeoName, projects.ID, projects.Images, projects.Boss, projects.JobName, projects.ContractStartDate, projects.ContractEndDate FROM projectscategories INNER JOIN projects ON projectscategories.ID=projects.ProjectsCategoriesID ORDER BY RAND() LIMIT 4");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function contactsList() {

	global $database;

	$database->query("SELECT * FROM contact");
	return $database->getRows();

}

function contactsFirstList() {

	global $database;

	$database->query("SELECT * FROM contact ORDER BY ID ASC limit 0,1");
	return $database->getSingleRow();

}

function PlacardRouterLinkFind($RouterLink) {

	global $database;

	$database->query("SELECT * FROM placardrouter WHERE RouterLink=:RouterLink");
	$database->bind(":RouterLink", $RouterLink);
	return $database->getSingleRow();
}

function generateRandomString($length = 10) {
	$characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;	
}

function mailSend($gidecek_mail, $subject, $message) {
	$mail = new PHPMailer();

	try {
		    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'smtp.osmannyldz7878@gmail.com';                     //SMTP username
		    $mail->Password   = 'Oy621207.';                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587; 
		    $mail->CharSet = 'utf-8';
		    //Recipients
		    $mail->setFrom('smtp.osmannyldz7878@gmail.com', 'Osman Yıldız');
		    $mail->addAddress($gidecek_mail);               //Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('ramazansen.tr@gmail.com');
		    //$mail->addBCC('ramazansen.tr@gmail.com');

		    //Attachments
		    /*
		    if ($durum == 2) {
		    	$mail->addAttachment('C:/xampp/htdocs/osman/arizabildirim_twig/img/1_1598452306_resim.png', 'doga.png');
		    }
		    else if($durum == 5) {
		    	$mail->addAttachment('C:/xampp/htdocs/osman/arizabildirim_twig/ek_mail_dosyalar/pdf/asalsayilar.pdf', 'asalsayilar.pdf');
		    }*/
		    
		    
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    $mail->AltBody = $message;

		    if($mail->send()){
		    	return true;
		    }
		   // print_r($mail->ErrorInfo);

		} 
		catch (Exception $e) 
		{
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	function ContactAdd($name, $email, $subject, $message) {

		global $db;

		$sorgu = $db->prepare("INSERT INTO inbox(Name, Mail, Subject, Message, CreateDate) VALUES(?,?,?,?, NOW())");
		if($sorgu->execute([$name, $email, $subject, $message])){
			return 1;
		}else{
			return  0;
		}


	}

	function lastedProjects() 
	{

		global $db;

		$sorgu = $db->prepare("SELECT * FROM `projects` ORDER BY ID DESC limit 0,6");
		$sorgu->execute();
		$line = $sorgu->fetchAll(PDO::FETCH_ASSOC);
		return $line;

	}

	function GetMetodu($url) { 
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$url); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
 // curl_setopt($ch,CURLOPT_HEADER, false); 

		$output=curl_exec($ch); 
		curl_close($ch); 
		return $output; 
	} 

	/*function projectsSearchList($Search) {

		global $db;

		$sorgu = $db->prepare("SELECT * FROM `projects` WHERE Name LIKE ?");
		$sorgu->execute(array('%'.$Search.'%'));
		$line = $sorgu->fetchAll(PDO::FETCH_OBJ);
		return $line;
	}*/

	function projectsSearchList($start, $Search) {

		global $db, $database;

		$database->query("SELECT SQL_CALC_FOUND_ROWS * FROM projects WHERE Name LIKE :search LIMIT $start, 3");
		$database->bind(":search", '%'.$Search.'%');
		$line = $database->getRowsWithFoundRows();
		$count = $database->totalrows;

		return array($line, $count);




	}

/*function projectsSearchList($start, $Search) {

	global $db, $database;
	$database->query("SELECT * FROM projects WHERE Name LIKE :search LIMIT $start, 3");
	$database->bind(":search", '%'.$Search.'%');
	$line = $database->getObjRows();

	$database->query("SELECT * FROM projects WHERE Name LIKE :search");
	$database->bind(":search", '%'.$Search.'%');
	$database->execute();
	$count = $database->rowCount();

	return array($line, $count);
	/*$result = $db->prepare("SELECT * FROM projects WHERE ProjectsCategoriesID=?");
	$result->execute(array($a));
	$line = $result->fetchAll(PDO::FETCH_OBJ);
	return $line;



}*/

function emailListAdd($Email) {

	global $db;

	$IP = $_SERVER['REMOTE_ADDR'];
	$UserAgent = $_SERVER['HTTP_USER_AGENT'];

	$sorgu = $db->prepare("INSERT INTO email_list(Email, IP, UserAgent, CreateDate) VALUES(?,?,?,NOW())");
	if($sorgu->execute([$Email, $IP, $UserAgent])) {
		return true;
	}
	else{
		return false;
	}


}

function settingList() {

	global $db;

	$result = $db->prepare("SELECT * FROM settings");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach ($line as $key=>$value) {
		$array[$value['Key']] = $value['Value']; 
	}
	return $array;

}

$lineSettings = settingList();

function brandsList () {

	global $db;

	$result = $db->prepare("SELECT * FROM brands");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function FooterShow() {

	global $database;

	$database->query("SELECT * FROM pages Where FooterShow=1");
	return $database->getSingleRow();

}

function FastLinks() {

	global $db;

	$result = $db->prepare("SELECT *, Name_".$_SESSION['LANG']."  AS Name FROM `main_menu` WHERE SupID=0");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

?>
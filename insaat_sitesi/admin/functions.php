<?php  

function loginControl(){
   if(intval($_SESSION['userID']) < 1){
      header("location: login.php");
      exit;
   }
}
function cleanData($str, $int=0) {
	if($int==1){
		return intval($str);
	}
	else{
		return strip_tags(trim($str));
	}
}
function mainMenuFind($ID) {
	global $db;


	if(!is_numeric($ID)){
		exit("Numeric değer değil");
	}

	$ID = cleanData($ID, 1);

	$result = $db->prepare("SELECT * FROM main_menu WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}
function mainMenuList($SupID) {
	global $db;

	$SupID = intval($SupID);
	$result = $db->prepare("SELECT *  FROM main_menu WHERE SupID=? ORDER BY OrderNumber ASC");
	$result->execute(array($SupID));
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function mainMenuDelete($ID) {
	global $db;


	if(!is_numeric($ID)){
		exit("Numeric değer değil");
	}

	$ID = intval($ID);
	
	$result = $db->prepare("DELETE FROM main_menu WHERE ID=?");
	if($result->execute(array($ID))) {
		return true;
	}else{
		return false;
	}
}

function mainMenuAdd() {
	global $db;



	$errEmpty = array();
	$errOther = array();

	if (isset($_POST['ekle'])) {
		$SupID = $_GET['SupID'];
		$Name_tr = cleanData($_POST['Name_tr']);
		$Name_en = cleanData($_POST['Name_en']);
		$Name_ge = cleanData($_POST['Name_ge']);
		$Link = cleanData($_POST['Link']);
		$OrderNumber = cleanData($_POST['OrderNumber']);
		$Status = cleanData($_POST['Status'], 1);

		if (empty($Name_tr)) {
			$errEmpty[] = "Menu Adı  alanını doldurunuz.";
		}
		if (empty($Name_en)) {
			$errEmpty[] = "Menu Adı  alanını doldurunuz.";
		}
		if (empty($Name_ge)) {
			$errEmpty[] = "Menu Adı  alanını doldurunuz.";
		}
		if (empty($Link)) {
			$errEmpty[] = "Link alanları doldurunuz.";
		}
		if (empty($OrderNumber)) {
			$errEmpty[] = "Menu numarasını doldurunuz.";
		}

		$isSuccess = (count($errEmpty) == 0 && count($errOther) == 0 ? true:false);
		if($isSuccess)
		{
			$resultCount = $db->prepare("SELECT ID FROM main_menu WHERE Name_tr = ?, Name_en = ?, Name_ge = ?");
			$resultCount->execute(array($Name_tr, $Name_en, $Name_ge));
			if($resultCount->rowCount() > 0)
			{
				$errOther[] = "Menu adı kullanılıyor";
			}
			else{
				$sorgu = $db->prepare("INSERT INTO main_menu(SupID, Name_tr, Name_en, Name_ge, Link, OrderNumber, Status) VALUES(?,?,?,?,?,?,?) ");

				$ekle = $sorgu->execute([$SupID, $Name_tr, $Name_en, $Name_ge, $Link, $OrderNumber, $Status]);
				if ($ekle) {
					header('location: menu.php');
				} else {
					$hata = $sorgu->errorInfo();
					echo 'mysql Hatası'.$hata[2];
				}
				
			}
		}
		
		return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
	}
}

function mainMenuEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		$Name_tr = cleanData($_POST['Name_tr']);
		$Name_en = cleanData($_POST['Name_en']);
		$Name_ge = cleanData($_POST['Name_ge']);
		$Link = cleanData($_POST['Link']);
		$OrderNumber = cleanData($_POST['OrderNumber']);
		$Status = cleanData($_POST['Status'], 1);

		$sorgu = $db->prepare("UPDATE main_menu SET Name_tr=?, Name_en=?, Name_ge=?, Link=?, OrderNumber=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name_tr, $Name_en, $Name_ge, $Link, $OrderNumber, $Status, $ID]);

		if ($ekle) {
			header('location: menu.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}



function arizalarList() {
	global $db;

	$result = $db->prepare("SELECT users.ID AS users_id, users.username, users.surname, users.status, users.phone, arizalar.ID as arizalar_id, arizalar.kod, arizalar.arizatip_id, arizalar.durum, arizalar.create_date FROM `users` INNER JOIN arizalar ON users.ID=arizalar.user_id");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);

	return $line;
}


// $arizatip[1] = "Mikrofon Arıza";
// $arizatip[2] = "Haporlar Arıza";
function getArizatip() {
	global $db;

	$result = $db->query("SELECT * FROM arizatip");
	$line = $result->fetchAll(PDO::FETCH_ASSOC);

	foreach ($line as $row) {
		$arrayStatus[$row['ID']] = $row['name'];
	}
	return $arrayStatus;
}

function getArizadurum() {
	global $db;

	$result = $db->query("SELECT * FROM arizadurum");
	$line = $result->fetchAll(PDO::FETCH_ASSOC);

	foreach ($line as $row) {
		$arrayStatus[$row['ID']] = $row['name'];
	}
	return $arrayStatus;
}

function SliderFind($ID) {
	global $db;


	if(!is_numeric($ID)){
		exit("Numeric değer değil");
	}

	$ID = cleanData($ID, 1);

	$result = $db->prepare("SELECT * FROM slider WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function SliderAdd() {
	global $db;
	include 'plugins/class.upload.php';
	$errEmpty = array();
	$errOther = array();

	if (isset($_POST['ekle'])) {
		$FirstName = cleanData($_POST['FirstName']);
		$SecondName = cleanData($_POST['SecondName']);
		$Content = cleanData($_POST['Content']);
		$LinkName = cleanData($_POST['LinkName']);
		$Link = cleanData($_POST['Link']);

		if (empty($FirstName)) {
			$errEmpty[] = "FirstName alanını boş bırakmayınız.";
		}
		if (empty($_FILES['Images']['name'])) {
			$errEmpty[] = "Resim alanını boş bırakmayınız.";
		}

		$handle = new Upload($_FILES['Images']);
		if ($handle->uploaded) {
			$handle->image_resize   = true;
			//$handle->image_resize          = true;
			//$handle->image_ratio_y         = true;
			$handle->image_x               = 1920;
			$handle->image_y               = 835;
			$handle->auto_create_dir    = true;
			$handle->file_auto_rename   = true;
			$handle->file_safe_name   = true;
			//$handle->file_max_size    = $sql['img_upload_limit'];
			$handle->allowed      = array('image/jpeg','image/jpg','image/png');
			$handle->file_new_name_body = time()."-".generateRandomString(3);
			$targetPath = "../uploads/slider";
			$handle->process($targetPath);
			if ($handle->processed) {
				$Images = $handle->file_dst_name;
				//$Images = $handle->file_new_name_body;
				$return = $targetPath. $handle->file_dst_name;
			}
			
		} else {
			$errOther[] = "Resim Yüklenemedi";
		}
		/*$uzanti = end(explode(".",$_FILES["Images"]["name"]));
		if ($uzanti == "png" || $uzanti == "jpeg" || $uzanti == "jpg" || $uzanti == "JPG") {
	        $finfo = new finfo();
	        $fileinfo = $finfo->file($_FILES["Images"]["tmp_name"], FILEINFO_MIME);
	        if($fileinfo == 'image/png; charset=binary' || $fileinfo == 'image/jpeg; charset=binary' || $fileinfo == 'image/jpg; charset=binary')
	        {
	            $resimAdi = time()."-".generateRandomString(3).".".$uzanti;
	            $resimYolu = "../images/slider/bg/".$resimAdi;
	            if (move_uploaded_file($_FILES["Images"]["tmp_name"], $resimYolu)) 
	            {
	            	$Images = $resimAdi;
	            }else{
	            	$errOther[] = "Resim Yüklenemedi";
	            }
	        }
   	 	}
   	 	else{
   	 		$errOther[] = "Dosya uzantısı: png, jpg, jpeg olmalıdır.";
   	 	}*/

   	 	if(count($errEmpty) == 0 && count($errOther) == 0)
   	 	{
   	 		$sorgu = $db->prepare("INSERT INTO slider(Images, FirstName, SecondName, Content, LinkName, Link) VALUES(?,?,?,?,?,?)");

   	 		$ekle = $sorgu->execute([$Images, $FirstName, $SecondName, $Content, $LinkName, $Link]);
   	 		if ($ekle) {
   	 			header('location: slider.php');
   	 		} else {
   	 			$hata = $sorgu->errorInfo();
   	 			echo 'mysql Hatası'.$hata[2];
   	 		}				
   	 	}

   	 	return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
   	 }
   	}

   	function SliderList() {
   		global $db;

   		$result = $db->prepare("SELECT * FROM slider");
   		$result->execute();
   		$line = $result->fetchAll(PDO::FETCH_ASSOC);
   		return $line;
   	}

   	function SliderDelete($ID) {
   		global $db;


   		if(!is_numeric($ID)){
   			exit("Numeric değer değil");
   		}

   		$ID = intval($ID);

   		$result = $db->prepare("DELETE FROM slider WHERE ID=?");
   		if($result->execute(array($ID))) {
   			unlink("../uploads/slider/".$_GET['Images']);
   			return true;
   		}else{
   			return false;
   		}
   	}
   	function SliderResimEdit($ID){
   		global $db;
   		include 'plugins/class.upload.php';
   		if (!empty($_FILES['Images']['name'])) {
   			$handle = new Upload($_FILES['Images']);
   			if ($handle->uploaded) {
   				$handle->image_resize   = true;
					//$handle->image_resize          = true;
					//$handle->image_ratio_y         = true;
   				$handle->image_x               = 1920;
   				$handle->image_y               = 835;
   				$handle->auto_create_dir    = true;
   				$handle->file_auto_rename   = true;
   				$handle->file_safe_name   = true;
					//$handle->file_max_size    = $sql['img_upload_limit'];
   				$handle->allowed      = array('image/jpeg','image/jpg','image/png');
   				$handle->file_new_name_body = time()."-".generateRandomString(3);
   				$targetPath = "../uploads/slider";
   				$handle->process($targetPath);
   				if ($handle->processed) {
   					$Images = $handle->file_dst_name;
   					$sorgu = $db->prepare("UPDATE slider SET Images=? WHERE ID = ?");
   					$ekle = $sorgu->execute([$Images, $ID]);
					//$Images = $handle->file_new_name_body;
   					$return = $targetPath. $handle->file_dst_name;
   				}

   			} else {
   				$errOther[] = "Resim Yüklenemedi";
   			}
   		}
   	}
   	function SliderEdit($ID) {
   		global $db;

   		if (isset($_POST['guncelle'])) {
   			SliderResimEdit($ID);

   			$FirstName = cleanData($_POST['FirstName']);
   			$SecondName = cleanData($_POST['SecondName']);
   			$Content = cleanData($_POST['Content']);
   			$LinkName = cleanData($_POST['LinkName']);
   			$Link = cleanData($_POST['Link']);

   			$sorgu = $db->prepare("UPDATE slider SET FirstName=?, SecondName=?, Content=?, LinkName=?, Link=? WHERE ID = ?");

   			$ekle = $sorgu->execute([$FirstName, $SecondName, $Content, $LinkName, $Link, $ID]);
   			if ($ekle) {
   				header('location: slider.php');
   			} else {
   				$hata = $sorgu->errorInfo();
   				echo 'mysql Hatası'.$hata[2];
   			}
   		}
   	}

   	function PropertyFind($ID) {
   		global $db;


   		if(!is_numeric($ID)){
   			exit("Numeric değer değil");
   		}

   		$ID = cleanData($ID, 1);

   		$result = $db->prepare("SELECT * FROM property WHERE ID = ?");
   		$result->execute(array($ID));
   		$line = $result->fetch(PDO::FETCH_ASSOC);

   		return $line;
   	}

   	function PropertyList() {
   		global $db;

   		$result = $db->prepare("SELECT * FROM property");
   		$result->execute();
   		$line = $result->fetchAll(PDO::FETCH_ASSOC);
   		return $line;
   	}

   	function PropertyAdd() {
   		global $db;
   		include 'plugins/class.upload.php';
   		$errEmpty = array();
   		$errOther = array();

   		if (isset($_POST['ekle'])) {
   			$Name = cleanData($_POST['Name']);
   			$Content = cleanData($_POST['Content']);

   			if (empty($Name)) {
   				$errEmpty[] = "Name alanını boş bırakmayınız.";
   			}
   			if (empty($_FILES['Images']['name'])) {
   				$errEmpty[] = "Resim alanını boş bırakmayınız.";
   			}

   			$handle = new Upload($_FILES['Images']);
   			if ($handle->uploaded) {
   				$handle->image_resize   = true;
			//$handle->image_resize          = true;
			//$handle->image_ratio_y         = true;
   				$handle->image_x               = 47;
   				$handle->image_y               = 47;
   				$handle->auto_create_dir    = true;
   				$handle->file_auto_rename   = true;
   				$handle->file_safe_name   = true;
			//$handle->file_max_size    = $sql['img_upload_limit'];
   				$handle->allowed      = array('image/jpeg','image/jpg','image/png');
   				$handle->file_new_name_body = time()."-".generateRandomString(3);
   				$targetPath = "../uploads/property";
   				$handle->process($targetPath);
   				if ($handle->processed) {
   					$Images = $handle->file_dst_name;
				//$Images = $handle->file_new_name_body;
   					$return = $targetPath. $handle->file_dst_name;
   				}

   			} else {
   				$errOther[] = "Resim Yüklenemedi";
   			}
		/*$uzanti = end(explode(".",$_FILES["Images"]["name"]));
		if ($uzanti == "png" || $uzanti == "jpeg" || $uzanti == "jpg" || $uzanti == "JPG") {
	        $finfo = new finfo();
	        $fileinfo = $finfo->file($_FILES["Images"]["tmp_name"], FILEINFO_MIME);
	        if($fileinfo == 'image/png; charset=binary' || $fileinfo == 'image/jpeg; charset=binary' || $fileinfo == 'image/jpg; charset=binary')
	        {
	            $resimAdi = time()."-".generateRandomString(3).".".$uzanti;
	            $resimYolu = "../images/slider/bg/".$resimAdi;
	            if (move_uploaded_file($_FILES["Images"]["tmp_name"], $resimYolu)) 
	            {
	            	$Images = $resimAdi;
	            }else{
	            	$errOther[] = "Resim Yüklenemedi";
	            }
	        }
   	 	}
   	 	else{
   	 		$errOther[] = "Dosya uzantısı: png, jpg, jpeg olmalıdır.";
   	 	}*/

   	 	if(count($errEmpty) == 0 && count($errOther) == 0)
   	 	{
   	 		$sorgu = $db->prepare("INSERT INTO property(Images, Name, Content) VALUES(?,?,?)");

   	 		$ekle = $sorgu->execute([$Images, $Name, $Content]);
   	 		if ($ekle) {
   	 			header('location: property.php');
   	 		} else {
   	 			$hata = $sorgu->errorInfo();
   	 			echo 'mysql Hatası'.$hata[2];
   	 		}				
   	 	}

   	 	return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
   	 }
   	}

   	function PropertyDelete($ID) {
   		global $db;


   		if(!is_numeric($ID)){
   			exit("Numeric değer değil");
   		}

   		$ID = intval($ID);

   		$result = $db->prepare("DELETE FROM property WHERE ID=?");
   		if($result->execute(array($ID))) {
   			unlink("../uploads/property/".$_GET['Images']);
   			return true;
   		}else{
   			return false;
   		}
   	}

   	function PropertyResimEdit($ID){
   		global $db;
   		include 'plugins/class.upload.php';
   		if (!empty($_FILES['Images']['name'])) {
   			$handle = new Upload($_FILES['Images']);
   			if ($handle->uploaded) {
   				$handle->image_resize   = true;
					//$handle->image_resize          = true;
					//$handle->image_ratio_y         = true;
   				$handle->image_x               = 50;
   				$handle->image_y               = 50;
   				$handle->auto_create_dir    = true;
   				$handle->file_auto_rename   = true;
   				$handle->file_safe_name   = true;
					//$handle->file_max_size    = $sql['img_upload_limit'];
   				$handle->allowed      = array('image/jpeg','image/jpg','image/png');
   				$handle->file_new_name_body = time()."-".generateRandomString(3);
   				$targetPath = "../uploads/property";
   				$handle->process($targetPath);
   				if ($handle->processed) {
   					$Images = $handle->file_dst_name;
   					$sorgu = $db->prepare("UPDATE property SET Images=? WHERE ID = ?");
   					$ekle = $sorgu->execute([$Images, $ID]);
					//$Images = $handle->file_new_name_body;
   					$return = $targetPath. $handle->file_dst_name;
   				}

   			} else {
   				$errOther[] = "Resim Yüklenemedi";
   			}
   		}
   	}
   	function PropertyEdit($ID) {
   		global $db;

   		if (isset($_POST['guncelle'])) {
   			PropertyResimEdit($ID);

   			$Name = cleanData($_POST['Name']);
   			$Content = cleanData($_POST['Content']);

   			$sorgu = $db->prepare("UPDATE property SET Name=?, Content=? WHERE ID = ?");

   			$ekle = $sorgu->execute([$Name, $Content, $ID]);
   			if ($ekle) {
   				header('location: property.php');
   			} else {
   				$hata = $sorgu->errorInfo();
   				echo 'mysql Hatası'.$hata[2];
   			}
   		}
   	}

#**************************************************************************************************************************     
      function PopupFind($ID) {
         global $db;


         if(!is_numeric($ID)){
            exit("Numeric değer değil");
         }

         $ID = cleanData($ID, 1);

         $result = $db->prepare("SELECT * FROM popup WHERE ID = ?");
         $result->execute(array($ID));
         $line = $result->fetch(PDO::FETCH_ASSOC);

         return $line;
      }

      function PopupAdd() {
         global $db;
         include 'plugins/class.upload.php';
         $errEmpty = array();
         $errOther = array();

         if (isset($_POST['ekle'])) {
            $Name = cleanData($_POST['Name']);
            $Header = cleanData($_POST['Header']);
            $Content = cleanData($_POST['Content']);
            $Status = cleanData($_POST['Status']);
            $StartDate = cleanData($_POST['StartDate']);
            $EndDate = cleanData($_POST['EndDate']);

            if (empty($Header)) {
               $errEmpty[] = "Header alanını boş bırakmayınız.";
            }
            if ($_FILES['Images']['name'] != '') {
               $handle = new Upload($_FILES['Images']);
               if ($handle->uploaded) {
                  $handle->image_resize   = true;
         //$handle->image_resize          = true;
         //$handle->image_ratio_y         = true;
                  $handle->image_x               = 568;
                  $handle->image_y               = 320;
                  $handle->auto_create_dir    = true;
                  $handle->file_auto_rename   = true;
                  $handle->file_safe_name   = true;
         //$handle->file_max_size    = $sql['img_upload_limit'];
                  $handle->allowed      = array('image/jpeg','image/jpg','image/png');
                  $handle->file_new_name_body = time()."-".generateRandomString(3);
                  $targetPath = "../uploads/popup";
                  $handle->process($targetPath);
                  if ($handle->processed) {
                     $Images = $handle->file_dst_name;
            //$Images = $handle->file_new_name_body;
                     $return = $targetPath. $handle->file_dst_name;
                  }

               } else {
                  $errOther[] = "Resim Yüklenemedi";
               }
            }
            
      /*$uzanti = end(explode(".",$_FILES["Images"]["name"]));
      if ($uzanti == "png" || $uzanti == "jpeg" || $uzanti == "jpg" || $uzanti == "JPG") {
           $finfo = new finfo();
           $fileinfo = $finfo->file($_FILES["Images"]["tmp_name"], FILEINFO_MIME);
           if($fileinfo == 'image/png; charset=binary' || $fileinfo == 'image/jpeg; charset=binary' || $fileinfo == 'image/jpg; charset=binary')
           {
               $resimAdi = time()."-".generateRandomString(3).".".$uzanti;
               $resimYolu = "../images/slider/bg/".$resimAdi;
               if (move_uploaded_file($_FILES["Images"]["tmp_name"], $resimYolu)) 
               {
                  $Images = $resimAdi;
               }else{
                  $errOther[] = "Resim Yüklenemedi";
               }
           }
         }
         else{
            $errOther[] = "Dosya uzantısı: png, jpg, jpeg olmalıdır.";
         }*/

         if(count($errEmpty) == 0 && count($errOther) == 0)
         {
            $sorgu = $db->prepare("INSERT INTO popup(Name, Header, Images, Content, Status, StartDate, EndDate) VALUES(?,?,?,?,?,?,?)");

            $ekle = $sorgu->execute([$Name, $Header, $Images, $Content, $Status, $StartDate, $EndDate]);
            if ($ekle) {
               header('location: popup.php');
            } else {
               $hata = $sorgu->errorInfo();
               echo 'mysql Hatası'.$hata[2];
            }           
         }

         return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
      }
   }

   function PopupList() {
      global $db;

      $result = $db->prepare("SELECT * FROM popup");
      $result->execute();
      $line = $result->fetchAll(PDO::FETCH_ASSOC);
      return $line;
   }

   function PopupDelete($ID) {
      global $db;


      if(!is_numeric($ID)){
         exit("Numeric değer değil");
      }

      $ID = intval($ID);

      $result = $db->prepare("DELETE FROM popup WHERE ID=?");
      if($result->execute(array($ID))) {
         unlink("../uploads/popup/".$_GET['Images']);
         return true;
      }else{
         return false;
      }
   }
   function PopupResimEdit($ID){
      global $db;
      include 'plugins/class.upload.php';
      if (!empty($_FILES['Images']['name'])) {
         $handle = new Upload($_FILES['Images']);
         if ($handle->uploaded) {
            $handle->image_resize   = true;
               //$handle->image_resize          = true;
               //$handle->image_ratio_y         = true;
            $handle->image_x               = 568;
            $handle->image_y               = 320;
            $handle->auto_create_dir    = true;
            $handle->file_auto_rename   = true;
            $handle->file_safe_name   = true;
               //$handle->file_max_size    = $sql['img_upload_limit'];
            $handle->allowed      = array('image/jpeg','image/jpg','image/png');
            $handle->file_new_name_body = time()."-".generateRandomString(3);
            $targetPath = "../uploads/popup";
            $handle->process($targetPath);
            if ($handle->processed) {
               $Images = $handle->file_dst_name;
               $sorgu = $db->prepare("UPDATE popup SET Images=? WHERE ID = ?");
               $ekle = $sorgu->execute([$Images, $ID]);
               //$Images = $handle->file_new_name_body;
               $return = $targetPath. $handle->file_dst_name;
            }

         } else {
            $errOther[] = "Resim Yüklenemedi";
         }
      }
   }
   function PopupEdit($ID) {
      global $db;

      if (isset($_POST['guncelle'])) {
         PopupResimEdit($ID);

         $Name = cleanData($_POST['Name']);
         $Header = cleanData($_POST['Header']);
         $Content = cleanData($_POST['Content']);
         $Status = cleanData($_POST['Status']);
         $StartDate = cleanData($_POST['StartDate']);
         $EndDate = cleanData($_POST['EndDate']);

         $sorgu = $db->prepare("UPDATE popup SET Name=?, Header=?, Content=?, Status=?, StartDate=?, EndDate=? WHERE ID = ?");

         $ekle = $sorgu->execute([$Name, $Header, $Content, $Status, $StartDate, $EndDate, $ID]);
         if ($ekle) {
            header('location: popup.php');
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }
      }
   }

#**************************************************************************************************************************

   function PagesFind($ID) {
      global $db;


      if(!is_numeric($ID)){
         exit("Numeric değer değil");
      }

      $ID = cleanData($ID, 1);

      $result = $db->prepare("SELECT * FROM pages WHERE ID = ?");
      $result->execute(array($ID));
      $line = $result->fetch(PDO::FETCH_ASSOC);

      return $line;
   }

   function PagesAdd() {
      global $db;
      $errEmpty = array();
      $errOther = array();

      if (isset($_POST['ekle'])) {
         $SupID = $_GET['SupID'];
         $Header = cleanData($_POST['Header']);
         $Content = cleanData($_POST['Content']);
         $Description = cleanData($_POST['Description']);
         $Keywords = cleanData($_POST['Keywords']);
         $Status = cleanData($_POST['Status']);
         $HomeShow = cleanData($_POST['HomeShow']);
         $CreateDate = date("Y-m-d H:i:s");

         if (empty($Header)) {
            $errEmpty[] = "Header alanını boş bırakmayınız.";
         }

         if(count($errEmpty) == 0 && count($errOther) == 0)
         {
            $sorgu = $db->prepare("INSERT INTO pages(SupID, Header, Content, Description, Keywords, Status, HomeShow, CreateDate) VALUES(?,?,?,?,?,?,?,?)");

            $ekle = $sorgu->execute([$SupID, $Header, $Content, $Description, $Keywords, $Status, $HomeShow, $CreateDate]);
            if ($ekle) {
               header('location: pages.php');
            } else {
               $hata = $sorgu->errorInfo();
               echo 'mysql Hatası'.$hata[2];
            }           
         }

         return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
      }
   }

   function PagesList($SupID) {
      global $db;

      $SupID = intval($SupID);
      $result = $db->prepare("SELECT *  FROM pages WHERE SupID=?");
      $result->execute(array($SupID));
      $line = $result->fetchAll(PDO::FETCH_ASSOC);
      return $line;
   }

   function PagesDelete($ID) {
      global $db;


      if(!is_numeric($ID)){
         exit("Numeric değer değil");
      }

      $ID = intval($ID);

      $result = $db->prepare("DELETE FROM pages WHERE ID=?");
      if($result->execute(array($ID))) {
         return true;
      }else{
         return false;
      }
   }

   function PagesEdit($ID) {
      global $db;

      if (isset($_POST['guncelle'])) {

         $Header = cleanData($_POST['Header']);
         $Content = ($_POST['Content']);
         $Description = cleanData($_POST['Description']);
         $Keywords = cleanData($_POST['Keywords']);
         $Status = cleanData($_POST['Status']);
         $HomeShow = cleanData($_POST['HomeShow']);
         $UpdateDate = date("Y-m-d H:i:s");

         $sorgu = $db->prepare("UPDATE pages SET Header=?, Content=?, Description=?, Keywords=?, Status=?, HomeShow=?, UpdateDate=? WHERE ID = ?");

         $ekle = $sorgu->execute([$Header, $Content, $Description, $Keywords, $Status, $HomeShow, $UpdateDate, $ID]);
         if ($ekle) {
            header('location: pages.php');
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }
      }
   }

#**************************************************************************************************************************

   function generateRandomString($length = 10) {
     $characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters);
     $randomString = '';
     for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   return $randomString;	
}

#**************************************************************************************************************************

function placardcategoriesFind($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = cleanData($ID, 1);

   $result = $db->prepare("SELECT * FROM placardcategories WHERE ID = ?");
   $result->execute(array($ID));
   $line = $result->fetch(PDO::FETCH_ASSOC);

   return $line;
}

function placardcategoriesAdd() {

   global $db;
   $errEmpty = array();
   $errOther = array();

   if (isset($_POST['ekle'])) {
      $Name = cleanData($_POST['Name']);
      $Header = cleanData($_POST['Header']);
      $Exp = cleanData($_POST['Exp']);

      if (empty($Name)) {
         $errEmpty[] = "Name alanını boş bırakmayınız.";
      }
      if (empty($Header)) {
         $errEmpty[] = "Header alanını boş bırakmayınız.";
      }

      if(count($errEmpty) == 0 && count($errOther) == 0)
      {
         $sorgu = $db->prepare("INSERT INTO placardcategories(Name, Header, Exp) VALUES(?,?,?)");

         $ekle = $sorgu->execute([$Name, $Header, $Exp]);
         if ($ekle) {
            header('location: placardcategories.php');
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }           
      }

      return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
   }
}

function placardcategoriesList() {
   global $db;

   $result = $db->prepare("SELECT *  FROM placardcategories");
   $result->execute();
   $line = $result->fetchAll(PDO::FETCH_ASSOC);
   return $line;
}

function placardcategoriesDelete($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = intval($ID);

   $result = $db->prepare("DELETE FROM placardcategories WHERE ID=?");
   if($result->execute(array($ID))) {
      return true;
   }else{
      return false;
   }
}

function placardcategoriesEdit($ID) {
   global $db;

   if (isset($_POST['guncelle'])) {

      $Name = cleanData($_POST['Name']);
      $Header = cleanData($_POST['Header']);
      $Exp = cleanData($_POST['Exp']);

      $sorgu = $db->prepare("UPDATE placardcategories SET Name=?, Header=?, Exp=? WHERE ID = ?");

      $ekle = $sorgu->execute([$Name, $Header, $Exp, $ID]);
      if ($ekle) {
         header('location: placardcategories.php');
      } else {
         $hata = $sorgu->errorInfo();
         echo 'mysql Hatası'.$hata[2];
      }
   }
}

#**************************************************************************************************************************

function placardFind($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = cleanData($ID, 1);

   $result = $db->prepare("SELECT * FROM placard WHERE ID = ?");
   $result->execute(array($ID));
   $line = $result->fetch(PDO::FETCH_ASSOC);

   return $line;
}

function placardAdd() {
   include 'plugins/class.upload.php';
   global $db;
   $errEmpty = array();
   $errOther = array();

   if (isset($_POST['ekle'])) {
      $PlaCardCategoryID = $_GET['PlaCardCategoryID'];
      $Header = cleanData($_POST['Header']);
      $Link = cleanData($_POST['Link']);
      $Target = cleanData($_POST['Target']);

      if (empty($Header)) {
         $errEmpty[] = "Header alanını boş bırakmayınız.";
      }

      if ($_FILES['Images']['name'] != '') {
         $handle = new Upload($_FILES['Images']);
         if ($handle->uploaded) {
            $handle->image_resize   = true;
         //$handle->image_resize          = true;
         //$handle->image_ratio_y         = true;
            $handle->image_x               = 275;
            $handle->image_y               = 206;
            $handle->auto_create_dir    = true;
            $handle->file_auto_rename   = true;
            $handle->file_safe_name   = true;
         //$handle->file_max_size    = $sql['img_upload_limit'];
            $handle->allowed      = array('image/jpeg','image/jpg','image/png');
            $handle->file_new_name_body = time()."-".generateRandomString(3);
            $targetPath = "../uploads/PlaCard";
            $handle->process($targetPath);
            if ($handle->processed) {
               $Images = $handle->file_dst_name;
            //$Images = $handle->file_new_name_body;
               $return = $targetPath. $handle->file_dst_name;
            }

         } else {
            $errOther[] = "Resim Yüklenemedi";
         }
      }

      if(count($errEmpty) == 0 && count($errOther) == 0)
      {
         $sorgu = $db->prepare("INSERT INTO placard(PlaCardCategoryID, Header, Link, Target, Images) VALUES(?,?,?,?,?)");

         $ekle = $sorgu->execute([$PlaCardCategoryID, $Header, $Link, $Target, $Images]);
         if ($ekle) {
            header('location: placard.php?PlaCardCategoryID='.$PlaCardCategoryID);
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }           
      }

      return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
   }
}

function placardList($CategoryID) {
   global $db;

   $CategoryID = intval($CategoryID);
   $result = $db->prepare("SELECT *  FROM placard WHERE PlaCardCategoryID=?");
   $result->execute(array($CategoryID));
   $line = $result->fetchAll(PDO::FETCH_ASSOC);
   return $line;
}

function placardDelete($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = intval($ID);

   $result = $db->prepare("DELETE FROM placard WHERE ID=?");
   if($result->execute(array($ID))) {
      return true;
   }else{
      return false;
   }
}

function PlacardResimEdit($ID){
   global $db;
   include 'plugins/class.upload.php';
   if (!empty($_FILES['Images']['name'])) {
      $handle = new Upload($_FILES['Images']);
      if ($handle->uploaded) {
         $handle->image_resize   = true;
               //$handle->image_resize          = true;
               //$handle->image_ratio_y         = true;
         $handle->image_x               = 275;
         $handle->image_y               = 206;
         $handle->auto_create_dir    = true;
         $handle->file_auto_rename   = true;
         $handle->file_safe_name   = true;
               //$handle->file_max_size    = $sql['img_upload_limit'];
         $handle->allowed      = array('image/jpeg','image/jpg','image/png');
         $handle->file_new_name_body = time()."-".generateRandomString(3);
         $targetPath = "../uploads/PlaCard";
         $handle->process($targetPath);
         if ($handle->processed) {
            $Images = $handle->file_dst_name;
            $sorgu = $db->prepare("UPDATE placard SET Images=? WHERE ID = ?");
            $ekle = $sorgu->execute([$Images, $ID]);
               //$Images = $handle->file_new_name_body;
            $return = $targetPath. $handle->file_dst_name;
         }

      } else {
         $errOther[] = "Resim Yüklenemedi";
      }
   }
}

function placardEdit($ID) {
   global $db;
   PlacardResimEdit($ID);

   if (isset($_POST['guncelle'])) {

      $Header = cleanData($_POST['Header']);
      $Link = cleanData($_POST['Link']);
      $Target = cleanData($_POST['Target']);

      $sorgu = $db->prepare("UPDATE placard SET Header=?, Link=?, Target=? WHERE ID = ?");

      $ekle = $sorgu->execute([$Header, $Link, $Target, $ID]);
      if ($ekle) {
         $line = placardFind($ID);
         header('location: placard.php?PlaCardCategoryID='.$line['PlaCardCategoryID']);
      } else {
         $hata = $sorgu->errorInfo();
         echo 'mysql Hatası'.$hata[2];
      }
   }
}

function settingsList() {

   global $db;

   $result = $db->prepare("SELECT * FROM settings");
   $result->execute();
   $line = $result->fetchAll(PDO::FETCH_ASSOC);
   foreach ($line as $key=>$value) {
      $array[$value['Key']] = $value['Value']; 
      $arrayLabel[$value['Key']] = $value['Label']; 
   }
   return array($array, $arrayLabel);

}

function settingsEdit() {

   global $db;


   /*print_r($_POST);
   exit;*/
   
   $sorgu = $db->prepare("DELETE FROM settings");
   $sorgu->execute();

   foreach($_POST as $key=>$value){

      if($key == 'guncelle') continue;
      
      $sorgu = $db->prepare("INSERT INTO settings(`Label`, `Key`, `Value`) VALUES (?, ?,?)");
      $sorgu->execute([$_POST['Label'][$key], $key, $value]);      
   }


}

function projectsCategoriesList() {
   global $db;

   $result = $db->prepare("SELECT *  FROM projectscategories");
   $result->execute();
   $line = $result->fetchAll(PDO::FETCH_ASSOC);
   return $line;
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

function projectsCategoriesFind($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = cleanData($ID, 1);

   $result = $db->prepare("SELECT * FROM projectscategories WHERE ID = ?");
   $result->execute(array($ID));
   $line = $result->fetch(PDO::FETCH_ASSOC);

   return $line;
}

function projectsCategoriesAdd() {

   global $db;
   $errEmpty = array();
   $errOther = array();

   if (isset($_POST['ekle'])) {
      $Name = cleanData($_POST['Name']);

      if (empty($Name)) {
         $errEmpty[] = "Name alanını boş bırakmayınız.";
      }

      if(count($errEmpty) == 0 && count($errOther) == 0)
      {
         $sorgu = $db->prepare("INSERT INTO projectscategories(Name) VALUES(?)");

         $ekle = $sorgu->execute([$Name]);
         if ($ekle) {
            header('location: projectscategories.php');
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }           
      }

      return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
   }
}

function projectsCategoriesDelete($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = intval($ID);

   $result = $db->prepare("DELETE FROM projectscategories WHERE ID=?");
   if($result->execute(array($ID))) {
      return true;
   }else{
      return false;
   }
}

function projectsCategoriesEdit($ID) {
   global $db;

   if (isset($_POST['guncelle'])) {

      $Name = cleanData($_POST['Name']);

      $sorgu = $db->prepare("UPDATE projectscategories SET Name=? WHERE ID = ?");

      $ekle = $sorgu->execute([$Name, $ID]);
      if ($ekle) {
         header('location: projectscategories.php');
      } else {
         $hata = $sorgu->errorInfo();
         echo 'mysql Hatası'.$hata[2];
      }
   }
}

//*****************************************************************************************************************************

function ProjectsFind($ID) {
   global $db;


   if(!is_numeric($ID)){
      exit("Numeric değer değil");
   }

   $ID = cleanData($ID, 1);

   $result = $db->prepare("SELECT * FROM projects WHERE ID = ?");
   $result->execute(array($ID));
   $line = $result->fetch(PDO::FETCH_ASSOC);

   return $line;
}

function ProjectsAdd() {
   global $db;
   include 'plugins/class.upload.php';
   $errEmpty = array();
   $errOther = array();

   if (isset($_POST['ekle'])) {
      $ProjectsCategoriesID = cleanData($_POST['ProjectsCategoriesID']);
      $Name = cleanData($_POST['Name']);
      $Boss = cleanData($_POST['Boss']);
      $JobName = cleanData($_POST['JobName']);
      $ContractStartDate = cleanData($_POST['ContractStartDate']);
      $ContractEndDate = cleanData($_POST['ContractEndDate']);
      $Content = cleanData($_POST['Content']);

      if (empty($Name)) {
         $errEmpty[] = "Proje ismi alanını boş bırakmayınız.";
      }
      if ($_FILES['Images']['name'] != '') {
         $handle = new Upload($_FILES['Images']);
         if ($handle->uploaded) {
            $handle->image_resize   = true;
         //$handle->image_resize          = true;
         //$handle->image_ratio_y         = true;
            $handle->image_x               = 1000;
            $handle->image_y               = 750;
            $handle->auto_create_dir    = true;
            $handle->file_auto_rename   = true;
            $handle->file_safe_name   = true;
         //$handle->file_max_size    = $sql['img_upload_limit'];
            $handle->allowed      = array('image/jpeg','image/jpg','image/png');
            $handle->file_new_name_body = time()."-".generateRandomString(3);
            $targetPath = "../uploads/projects";
            $handle->process($targetPath);
            if ($handle->processed) {
               $Images = $handle->file_dst_name;
            //$Images = $handle->file_new_name_body;
               $return = $targetPath. $handle->file_dst_name;
            }

         } else {
            $errOther[] = "Resim Yüklenemedi";
         }
      }

      /*$uzanti = end(explode(".",$_FILES["Images"]["name"]));
      if ($uzanti == "png" || $uzanti == "jpeg" || $uzanti == "jpg" || $uzanti == "JPG") {
           $finfo = new finfo();
           $fileinfo = $finfo->file($_FILES["Images"]["tmp_name"], FILEINFO_MIME);
           if($fileinfo == 'image/png; charset=binary' || $fileinfo == 'image/jpeg; charset=binary' || $fileinfo == 'image/jpg; charset=binary')
           {
               $resimAdi = time()."-".generateRandomString(3).".".$uzanti;
               $resimYolu = "../images/slider/bg/".$resimAdi;
               if (move_uploaded_file($_FILES["Images"]["tmp_name"], $resimYolu)) 
               {
                  $Images = $resimAdi;
               }else{
                  $errOther[] = "Resim Yüklenemedi";
               }
           }
         }
         else{
            $errOther[] = "Dosya uzantısı: png, jpg, jpeg olmalıdır.";
         }*/

         if(count($errEmpty) == 0 && count($errOther) == 0)
         {
            $sorgu = $db->prepare("INSERT INTO projects(ProjectsCategoriesID, Images, Name, Boss, JobName, ContractStartDate, ContractEndDate, Content) VALUES(?,?,?,?,?,?,?,?)");

            $ekle = $sorgu->execute([$ProjectsCategoriesID, $Images, $Name, $Boss, $JobName, $ContractStartDate, $ContractEndDate, $Content]);
            if ($ekle) {
               header('location: projects.php');
            } else {
               $hata = $sorgu->errorInfo();
               echo 'mysql Hatası'.$hata[2];
            }           
         }

         return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
      }
   }

   function ProjectsList() {
      global $db;

      $result = $db->prepare("SELECT * FROM projects");
      $result->execute();
      $line = $result->fetchAll(PDO::FETCH_ASSOC);
      return $line;
   }

   function ProjectsDelete($ID) {
      global $db;


      if(!is_numeric($ID)){
         exit("Numeric değer değil");
      }

      $ID = intval($ID);

      $result = $db->prepare("DELETE FROM projects WHERE ID=?");
      if($result->execute(array($ID))) {
         unlink("../uploads/projects/".$_GET['Images']);
         return true;
      }else{
         return false;
      }
   }
   function ProjectsResimEdit($ID){
      global $db;
      include 'plugins/class.upload.php';
      if (!empty($_FILES['Images']['name'])) {
         $handle = new Upload($_FILES['Images']);
         if ($handle->uploaded) {
            $handle->image_resize   = true;
               //$handle->image_resize          = true;
               //$handle->image_ratio_y         = true;
            $handle->image_x               = 1000;
            $handle->image_y               = 750;
            $handle->auto_create_dir    = true;
            $handle->file_auto_rename   = true;
            $handle->file_safe_name   = true;
               //$handle->file_max_size    = $sql['img_upload_limit'];
            $handle->allowed      = array('image/jpeg','image/jpg','image/png');
            $handle->file_new_name_body = time()."-".generateRandomString(3);
            $targetPath = "../uploads/projects";
            $handle->process($targetPath);
            if ($handle->processed) {
               $Images = $handle->file_dst_name;
               $sorgu = $db->prepare("UPDATE projects SET Images=? WHERE ID = ?");
               $ekle = $sorgu->execute([$Images, $ID]);
               //$Images = $handle->file_new_name_body;
               $return = $targetPath. $handle->file_dst_name;
            }

         } else {
            $errOther[] = "Resim Yüklenemedi";
         }
      }
   }
   function ProjectsEdit($ID) {
      global $db;

      if (isset($_POST['guncelle'])) {
         ProjectsResimEdit($ID);

         $Name = cleanData($_POST['Name']);
         $Boss = cleanData($_POST['Boss']);
         $JobName = cleanData($_POST['JobName']);
         $ContractStartDate = cleanData($_POST['ContractStartDate']);
         $ContractEndDate = cleanData($_POST['ContractEndDate']);
         $Content = cleanData($_POST['Content']);

         $sorgu = $db->prepare("UPDATE projects SET Name=?, Boss=?, JobName=?, ContractStartDate=?, ContractEndDate=?, Content=? WHERE ID = ?");

         $ekle = $sorgu->execute([$Name, $Boss, $JobName, $ContractStartDate, $ContractEndDate, $Content, $ID]);
         if ($ekle) {
            header('location: projects.php');
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }
      }
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

   //*********************************************************************************************************************
   
   function BrandsFind($ID) {
      global $db;


      if(!is_numeric($ID)){
         exit("Numeric değer değil");
      }

      $ID = cleanData($ID, 1);

      $result = $db->prepare("SELECT * FROM brands WHERE ID = ?");
      $result->execute(array($ID));
      $line = $result->fetch(PDO::FETCH_ASSOC);

      return $line;
   }

   function BrandsAdd() {
      global $db;
      include 'plugins/class.upload.php';
      $errEmpty = array();
      $errOther = array();

      if (isset($_POST['ekle'])) {
         $Name = cleanData($_POST['Name']);
         $Link = cleanData($_POST['Link']);

         if (empty($Name)) {
            $errEmpty[] = "Marka İsmi alanını boş bırakmayınız.";
         }
         if ($_FILES['Images']['name'] != '') {
            $handle = new Upload($_FILES['Images']);
            if ($handle->uploaded) {
               $handle->image_resize   = true;
         //$handle->image_resize          = true;
         //$handle->image_ratio_y         = true;
               $handle->image_x               = 187;
               $handle->image_y               = 115;
               $handle->auto_create_dir    = true;
               $handle->file_auto_rename   = true;
               $handle->file_safe_name   = true;
         //$handle->file_max_size    = $sql['img_upload_limit'];
               $handle->allowed      = array('image/jpeg','image/jpg','image/png');
               $handle->file_new_name_body = time()."-".generateRandomString(3);
               $targetPath = "../uploads/brands";
               $handle->process($targetPath);
               if ($handle->processed) {
                  $Images = $handle->file_dst_name;
            //$Images = $handle->file_new_name_body;
                  $return = $targetPath. $handle->file_dst_name;
               }

            } else {
               $errOther[] = "Resim Yüklenemedi";
            }
         }

      /*$uzanti = end(explode(".",$_FILES["Images"]["name"]));
      if ($uzanti == "png" || $uzanti == "jpeg" || $uzanti == "jpg" || $uzanti == "JPG") {
           $finfo = new finfo();
           $fileinfo = $finfo->file($_FILES["Images"]["tmp_name"], FILEINFO_MIME);
           if($fileinfo == 'image/png; charset=binary' || $fileinfo == 'image/jpeg; charset=binary' || $fileinfo == 'image/jpg; charset=binary')
           {
               $resimAdi = time()."-".generateRandomString(3).".".$uzanti;
               $resimYolu = "../images/slider/bg/".$resimAdi;
               if (move_uploaded_file($_FILES["Images"]["tmp_name"], $resimYolu)) 
               {
                  $Images = $resimAdi;
               }else{
                  $errOther[] = "Resim Yüklenemedi";
               }
           }
         }
         else{
            $errOther[] = "Dosya uzantısı: png, jpg, jpeg olmalıdır.";
         }*/

         if(count($errEmpty) == 0 && count($errOther) == 0)
         {
            $sorgu = $db->prepare("INSERT INTO brands(Name, Images, Link) VALUES(?,?,?)");

            $ekle = $sorgu->execute([$Name, $Images, $Link]);
            if ($ekle) {
               header('location: brands.php');
            } else {
               $hata = $sorgu->errorInfo();
               echo 'mysql Hatası'.$hata[2];
            }           
         }

         return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
      }
   }

   function BrandsList() {
      global $db;

      $result = $db->prepare("SELECT * FROM brands");
      $result->execute();
      $line = $result->fetchAll(PDO::FETCH_ASSOC);
      return $line;
   }

   function BrandsDelete($ID) {
      global $db;


      if(!is_numeric($ID)){
         exit("Numeric değer değil");
      }

      $ID = intval($ID);

      $result = $db->prepare("DELETE FROM brands WHERE ID=?");
      if($result->execute(array($ID))) {
         unlink("../uploads/brands/".$_GET['Images']);
         return true;
      }else{
         return false;
      }
   }
   function BrandsResimEdit($ID){
      global $db;
      include 'plugins/class.upload.php';
      if (!empty($_FILES['Images']['name'])) {
         $handle = new Upload($_FILES['Images']);
         if ($handle->uploaded) {
            $handle->image_resize   = true;
               //$handle->image_resize          = true;
               //$handle->image_ratio_y         = true;
            $handle->image_x               = 187;
            $handle->image_y               = 115;
            $handle->auto_create_dir    = true;
            $handle->file_auto_rename   = true;
            $handle->file_safe_name   = true;
               //$handle->file_max_size    = $sql['img_upload_limit'];
            $handle->allowed      = array('image/jpeg','image/jpg','image/png');
            $handle->file_new_name_body = time()."-".generateRandomString(3);
            $targetPath = "../uploads/brands";
            $handle->process($targetPath);
            if ($handle->processed) {
               $Images = $handle->file_dst_name;
               $sorgu = $db->prepare("UPDATE brands SET Images=? WHERE ID = ?");
               $ekle = $sorgu->execute([$Images, $ID]);
               //$Images = $handle->file_new_name_body;
               $return = $targetPath. $handle->file_dst_name;
            }

         } else {
            $errOther[] = "Resim Yüklenemedi";
         }
      }
   }
   function BrandsEdit($ID) {
      global $db;

      if (isset($_POST['guncelle'])) {
         BrandsResimEdit($ID);

         $Name = cleanData($_POST['Name']);
         $Link = cleanData($_POST['Link']);

         $sorgu = $db->prepare("UPDATE brands SET Name=?, Link=? WHERE ID = ?");

         $ekle = $sorgu->execute([$Name, $Link, $ID]);
         if ($ekle) {
            header('location: brands.php');
         } else {
            $hata = $sorgu->errorInfo();
            echo 'mysql Hatası'.$hata[2];
         }
      }
   }


   ?>
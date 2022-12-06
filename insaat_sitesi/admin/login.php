<?php
$no_visible_elements = true;
include 'config.php';
include 'header.php'; 

if(isset($_POST['giris'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if (empty($Email)) {
        $errEmpty[] = "Mail Adresi";
    }
    if (empty($Password)) {
        $errEmpty[] = "Şifre";
    }
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errOther[] = "Düzgün mail adresi griniz";
    }
    if (strlen($Password) < 5) {
        $errOther[] = "Şifrenizi 5 karakterden küçük yapmayınız.";
    }


    if (count($errEmpty) == 0 && count($errOther) == 0) {
        $PasswordMd5 = md5($Password);

        $sorgu = $db->prepare("SELECT Email, Password, lockedCount FROM users WHERE Email=?");
        $sorgu->execute(array($Email));

        if($sorgu->rowCount() > 0) {
            $line = $sorgu->fetch(PDO::FETCH_ASSOC);

            if($Email == $line['Email'] && $PasswordMd5 == $line['Password']) {
                if($line['lockedCount'] >= 3) {
                    $errOther[] = "Hesabınız kitlendi.";
                }
            }

            if($PasswordMd5 != $line['Password']) {
                $sorgu = $db->prepare("UPDATE users SET lockedCount=lockedCount+1 WHERE Email=?");
                $sorgu->execute([$Email]);
            }
        }

        if (count($errEmpty) == 0 && count($errOther) == 0) {
            $sorgu = $db->prepare("SELECT ID, Email, Password FROM users WHERE Email=? AND Password=?");
            $sorgu->execute(array($Email, $PasswordMd5));
            if ($sorgu->rowCount() > 0) {

                $line = $sorgu->fetch(PDO::FETCH_ASSOC);
                if ($line['Email'] == $Email && $line['Password'] == $PasswordMd5) {
                    
                    $sorgu = $db->prepare("UPDATE users Set lockedCount=0 WHERE Email=?");
                    $sorgu->execute(array($Email));

                    session_regenerate_id();
                     $_SESSION['userID'] = $line['ID'];
                     $_SESSION['Email'] = $line['Email'];

                    header("location: index.php");
                    exit;
                    
                }
                
            }else{
                // locked +++ ;
                $errOther[]= "Kulanıcı Bulunamadı.";
            }
        }
    }
}

?>

<div class="row">
    <div class="col-md-12 center login-header">
        <h2>Yönetim Paneline Hoşgeldiniz!!!</h2>
    </div>
    <!--/span-->
</div><!--/row-->

<div class="row">
    <div class="well col-md-5 center login-box">
        <div class="alert alert-info">
            Giriş yapmak için mail adresinizi ve şifrenizi giriniz.
        </div>
        <form class="form-horizontal" action="login.php" method="post">
            <fieldset>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                    <input type="email" class="form-control" name="Email" placeholder="Email Adresini Giriniz">
                </div>
                <div class="clearfix"></div><br>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                    <input type="password" class="form-control" name="Password" placeholder="Şifrenizi Giriniz">
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>

                <p class="center col-md-5">
                    <button type="submit" name="giris" class="btn btn-primary">Giriş Yap</button>
                </p>
            </fieldset>
        </form>
        <?php 
        if(count($errEmpty) > 0) {
            foreach($errEmpty as $value) {
            ?>
            <div class="alert alert-danger" role="alert">Boş bırakılmayacak alanlar: <?php echo $value; ?></div>
      <?php } } ?>
      <?php 
        if(count($errOther) > 0) {
            foreach($errOther as $value) {
            ?>
            <div class="alert alert-danger" role="alert"><?php echo $value; ?></div>
      <?php } } ?>
  </div>
  <!--/span-->
</div><!--/row-->
<?php require('footer.php'); ?>
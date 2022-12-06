<?php 

include 'config.php';
include 'functions.php';
include 'header.php'; 

$linecontactsList = contactsList();

$RouterLink = basename($_SERVER['PHP_SELF'], ".php");
$linePlacardRouterLinkFind = PlacardRouterLinkFind($RouterLink);
$linePlaCardCategoriesList = PlaCardCategoriesList($linePlacardRouterLinkFind['ID']);

if (isset($_POST['gonder'])) {

    if($_SESSION['csrf_token'] == $_POST['csrf_token']){
        $errOther = array();
        $errEmpty = array();

        if ($_POST['name'] == '') {
            $errEmpty[]  = "Adınız Soyadınız";
        }
        if ($_POST['email'] == '') {
            $errEmpty[]  = "Mail Adresiniz";
        }
        if ($_POST['subject'] == '') {
            $errEmpty[]  = "Konu";
        }
        if ($_POST['message'] == '') {
            $errEmpty[]  = "Mesajınız";
        }

        if(strlen($_POST['name']) < 3){
            $errOther[] = "Adınız Syoyasınız alanı en en 3 karakter olmalı";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $errOther[] = "Düzgün bir mail adresi giriniz";
      }
      if(count($errOther) == 0 && count($errEmpty) == 0) {
        $gidecek_mail = "osmann_yldz7878@hotmail.com";
        $subject = "Web sitesinin iletişim bölümünden mesaj geldi";
        $message = "<table>
        <tr><td>Adınız Soyadınız:</td><td>".$_POST['name']."</td></tr>
        <tr><td>Email Adresi:</td><td>".$_POST['email']."</td></tr>
        <tr><td>Konu:</td><td>".$_POST['subject']."</td></tr>
        <tr><td>Mesajınız:</td><td>".$_POST['message']."</td></tr>
        </table>";
        $send_mail = mailSend($gidecek_mail, $subject, $message);
        if($send_mail){
         $return =  ContactAdd($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
         if($return){
           $success_message = "Mesajınız başarılı bir şekilde gönderilmiştir.";
       }else{
           $error_message = "Mesajınız başarılı bir şekilde gönderilmiştir. Veritabanına kaydedilemedi.";
       }
       
   }
   else
   {
    $error_message = "Lütfen bir hata oluştu daha sonra tekrar deneyiniz.";
}
}

}else{
    //print "csrf_token error.!!!";
}

}

$_SESSION['csrf_token'] = md5(generateRandomString());


?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="6" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">

                        <h2 class="bradcaump-title">İLETİŞİM</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Anasayfa</a>
                            <span class="brd-separetor">-</span>
                            <span class="breadcrumb-item active">İletişim</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Address -->
<section class="htc__contact__area bg__white ptb--150">
    <div class="container">

        <?php foreach ($linecontactsList as $row) { ?>

            <div class="row pb--10">
                <div class="col-md-12">
                    <div class="htc__contact__inner">
                        <h2 class="title__line--5"><?php echo $row['Header']; ?></h2>
                    </div>
                    <div class="htc__address__container">
                        <!-- Start Single Address -->
                        <div class="ct__address">
                            <div class="ct__address__icon">
                                <i class="zmdi zmdi-pin"></i>
                            </div>
                            <div class="ct__details">
                                <p><?php echo $row['Adress']; ?></p>
                            </div>
                        </div>
                        <!-- End Single Address -->
                        <!-- Start Single Address -->
                        <div class="ct__address">
                            <div class="ct__address__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="ct__details">
                                <p><a href="tel:+9<?php echo $row['Phone']; ?>"><?php echo $row['Phone']; ?></a></p>
                                <p><a href="tel:+9<?php echo $row['Fax']; ?>"><?php echo $row['Fax']; ?></a></p>
                            </div>
                        </div>
                        <!-- End Single Address -->
                        <!-- Start Single Address -->
                        <div class="ct__address">
                            <div class="ct__address__icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="ct__details">
                                <p><a href="https://<?php echo $row['Web']; ?>/"><?php echo $row['Web']; ?></a></p>
                            </div>

                        </div>
                        <!-- End Single Address -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="htc__google__map">
                        <h2 class="title__line--5">BULUNDUĞUMUZ KONUM</h2>
                        <div class="map__contacts">
                            <div id="googleMap">
                                <iframe src="<?php echo $row['Maps']; ?>" width="100%" height="200" style="border: 1px solid #fcc236;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="htc__contact__form__wrap">
                    <h2 class="title__line--5">BİZE MESAJ GÖNDER</h2>
                    <div class="contact-form-wrap">
                        <form action="contact.php" method="post">
                            <div class="single-contact-inner">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <span>Adınız Soyadınız*</span>
                                        <input type="text" name="name">
                                    </div>
                                    <div class="contact-box email">
                                        <span>Mail Adresiniz*</span>
                                        <input type="text" name="email">
                                    </div>
                                    <div class="contact-box subject">
                                        <span>Konu*</span>
                                        <input type="text" name="subject">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <span>Mesajınız*</span>
                                        <textarea name="message"></textarea>
                                    </div>
                                    <div class="contact-btn">
                                        <input type="hidden" name="csrf_token" value="<?php print $_SESSION['csrf_token'] ?>">
                                        <button type="submit" name="gonder" class="htc__btn btn--theme">GÖNDER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php 
                        if(count($errEmpty) > 0){
                            ?>
                            <div class="alert alert-danger">Lütfen alanları doldurunuz:<?php print implode(", ", $errEmpty); ?></div>
                            <?php
                        }
                        ?>
                        <?php 
                        if(count($errOther) > 0){
                            print "<ul class='alert alert-danger pl-3'>";
                            foreach ($errOther as $value) {
                                ?>
                                <li style="list-style-type: circle;"><?php print $value; ?></li>
                                <?php
                            }
                            print "</ul>";
                        }
                        ?>
                        <?php if(isset($success_message)) { ?>
                            <div class="alert alert-success"><?php echo $success_message ?></div>
                        <?php } ?>
                        <?php if(isset($error_message)) { ?>
                            <div class="alert alert-danger"><?php echo $error_message ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Address -->

<!-- start About Area -->
<?php 
   /* $PlaCardArray = array(
        array(
            "Header"=>"Bina Yıkımı",
            "Link"=>"http://google.com",
            "Images"=>"images/service/1.jpg",
        ),
        array(
            "Header"=>"İnşaat Yıkımı",
            "Link"=>"http://google.com",
            "Images"=>"images/service/1.jpg",
        ),
        

    );*/
    ?>
    <?php 
    /*foreach ($linePlaCardCategoriesList as $value) {
        $linePlaCardList = PlaCardList($value['ID']);
        ?>
        <section class="htc__service__area service--2 bg__gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="service__section__wrap clearfix">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 h1__service pt--40 pb--30">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="section__title text-left">
                                        <h2 class="title__line"><?php echo $value['Header']; ?></h2>
                                        <p><?php echo $value['Exp']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Start Single Service -->

                                <?php 
                                foreach($linePlaCardList as $PlaCard){
                                    ?>
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        <div class="service">
                                            <div class="service__thumb">
                                                <a href="single-service.html">
                                                    <img src="uploads/PlaCard/<?php echo $PlaCard['Images']; ?>" alt="service images">
                                                </a>
                                                <div class="service__hover">
                                                    <div class="service__action">
                                                        <a target="<?php echo $PlaCard['Target']; ?>" href="<?php echo $PlaCard['Link']; ?>">DETAY</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="service__details">
                                                <h2><a target="<?php echo $PlaCard['Target']; ?>" href="<?php echo $PlaCard['Images']; ?>"><?php print $PlaCard['Header']; ?></a></h2>
                                            </div>
                                        </div></div>
                                        <?php 
                                    }
                                    ?>

                                    <!-- End Single Service -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
         <?php } */ ?><!--
        <section class="htc__service__area service--2 bg__gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="service__section__wrap clearfix">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 h1__service pt--40 pb--30">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="section__title text-left">
                                        <h2 class="title__line"><?php echo $linePlaCardExpCuff['Name']; ?></h2>
                                        <p><?php echo $linePlaCardExpCuff['Exp']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 Start Single Service 

                                <?php 
                                foreach($linePlaCard_2 as $PlaCard){
                                    ?>
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        <div class="service">
                                            <div class="service__thumb">
                                                <a href="single-service.html">
                                                    <img src="uploads/PlaCard/<?php echo $PlaCard['Images']; ?>" alt="service images">
                                                </a>
                                                <div class="service__hover">
                                                    <div class="service__action">
                                                        <a target="<?php echo $PlaCard['Target']; ?>" href="<?php echo $PlaCard['Link']; ?>">DETAY</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="service__details">
                                                <h2><a target="<?php echo $PlaCard['Target']; ?>" href="<?php echo $PlaCard['Images']; ?>"><?php print $PlaCard['Header']; ?></a></h2>
                                            </div>
                                        </div></div>
                                        <?php 
                                    }
                                    ?>

                                     End Single Service 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
             End About Area -->


            <?php include 'footer.php'; ?>
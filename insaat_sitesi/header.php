<?php 

include 'config.php';
$popupModal = popupModal();
if($_SESSION['LANG'] == ""){
    $_SESSION['LANG'] = 'tr';
}
include 'lang/'.$_SESSION['LANG'].".php";
$lang = $_SESSION['LANG'];

?>

<!doctype html>
<html class="no-js" lang="tr">


<head>
    <meta charset="utf-8">
    <base href="<?php print $URL; ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $TITLE; ?> | <?php echo $lineSettings['siteName']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="<?php print $KEYWORDS ?>" />
    <meta name="description" content="<?php print $DESCRIPTION; ?>" />
    <meta http-equiv="refresh" content="500" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel  main css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>


    <?php 
        //print $_SESSION['a'];
        //unset($_SESSION['a']);
        //print $_SESSION['gosterim']++;
    if($_SESSION['a'] == '') {
        $_SESSION['a'] = 1;
        if ($popupModal != "yok") { 
            ?>


            <!-- Modal -->
            <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php print $popupModal['Header']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <?php if (!empty($popupModal['Images'])) { ?>
                    <img src="uploads/popup/<?php print $popupModal['Images']; ?>">
                <?php } ?>
                <?php if (!empty($popupModal['Content'])) { ?>
                    <p><?php print $popupModal['Content']; ?></p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
<?php } } ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <div id="header" class="htc-header">
            <!-- Start Header Top -->
            <div class="htc__header__top bg__cat--1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <ul class="heaher__top__left">
                                <li><i class="fa fa-clock-o"></i><?php echo $lineSettings['workHours']; ?></li>
                                <li><i class="fa fa-phone"></i><a href="tel:+9<?php echo $lineSettings['Phone1']; ?>"><?php echo $lineSettings['Phone1']; ?></a></li>
                                <li><i class="fa fa-instagram"></i><a href="<?php echo $lineSettings['Instagram']; ?>">Yıldızlar İnşaat</a></li>
                                <li><i class="fa fa-facebook"></i><a href="<?php echo $lineSettings['Facebook']; ?>">Yıldızlar İnşaat</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="header__top__right">
                                <ul class="login-register">
                                    <?php /* ?><li class="separator"><i class="fa fa-user"></i></li>
                                    <li><a href="login-register.php">GİRİŞ YAP</a></li>
                                    <li class="separator">/</li>
                                    <li><a href="login-register.php">KAYIT OL</a></li> <?php */ ?>
                                    <li class="separator"><i class="fa fa-user"></i></li>
                                    <li><a href="dil_degistir.php?lang=tr">Türkçe</a></li>
                                    <li class="separator">/</li>
                                    <li><a href="dil_degistir.php?lang=en">İngilizce</a></li>
                                    <li class="separator">/</li>
                                    <li><a href="dil_degistir.php?lang=ge">Almanca</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Top -->
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-7">
                            <div class="logo">
                                <a href="anasayfa">
                                    <img src="images/logo/logo.png" alt="<?php echo $lineSettings['siteName']; ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-5">
                            <nav class="main__menu__nav  hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <?php $mainMenuList = mainMenuList(0); ?>
                                    <?php foreach ($mainMenuList as $menuList) { ?>
                                        <li class="drop"><a href="<?php echo $menuList['Link']; ?>"><?php echo $menuList['Name']; ?></a>
                                            <ul class="dropdown">
                                                <?php $mainMenuAltList = mainMenuList($menuList['ID']); ?>
                                                <?php foreach ($mainMenuAltList as $menuAltList) { ?>
                                                    <li><a href="<?php echo $menuAltList['Link']; ?>"><?php echo $menuAltList['Name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!--
                                    <li><a href="about.php">HAKKIMIZDA</a></li>
                                    <li class="drop"><a href="javascript:void(0)">PROJELERİMİZ</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">DEVAM EDEN PROJELERİMİZ</a></li>
                                            <li><a href="projects-three.html">TAMAMLANAN PROJELERİMİZ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="service.php">SERVİSLERİMİZ</a></li>
                                    <li><a href="contact.php">İLETİŞİM</a></li>
                                -->
                            </ul>
                        </nav>
                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <?php $mainMenuList = mainMenuList(0); ?>
                                    <?php foreach ($mainMenuList as $menuList) { ?>
                                        <li><a href="<?php echo $menuList['Link']; ?>"><?php echo $menuList['Name_tr']; ?></a>
                                            <ul>
                                                <?php $mainMenuAltList = mainMenuList($menuList['ID']); ?>
                                                <?php foreach ($mainMenuAltList as $menuAltList) { ?>
                                                    <li><a href="<?php echo $menuAltList['Link']; ?>"><?php echo $menuAltList['Name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                        <!--
                                        <li><a href="about.php">HAKKIMIZDA2</a></li>
                                        <li><a href="javascript:void(0)">PROJELERİMİZ2</a>
                                            <ul>
                                                <li><a href="blog.html">DEVAM EDEN PROJELERİMİZ</a></li>
                                                <li><a href="projects-three.html">TAMAMLANAN PROJELERİMİZ</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="service.php">SERVİSLERİMİZ</a></li>
                                        <li><a href="contact.php">İLETİŞİM</a></li>
                                    -->
                                </ul>
                            </nav>
                        </div> 
                    </div>
                    <div class="col-md-2 col-sm-6 hidden-xs">
                        <div class="htc__header__search">
                            <form method="get" id="ara_form" action="proje-ara.php">
                                <input type="text" name="search" placeholder="<?php echo $LANG['search']; ?>">
                                <a href="javascript:void(0)" onClick="ara()"><i class="fa fa-search"></i></a>
                                <!-- <input type="submit" name="ara"> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </div>
    <!-- End Header Style --> 
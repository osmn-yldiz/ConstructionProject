<?php 

$linecontactsFirstList = contactsFirstList();
$lineFooterShow = FooterShow();

$Addres = $linecontactsFirstList['Adress'];
$AddressExplode = explode(" ", $Addres);
$AddressExplode[7] = $AddressExplode[7]."<br>";
$FooterAddress = implode(" ", $AddressExplode);
$lineFastLinks = FastLinks();
$linelastedProjects = lastedProjects();

?>

<!-- Start Newsletter Area -->
<section class="htc__newsletter__area ptb--90 bg__gray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="newsletter__wrap">
                    <h2 class="title__line">SİTEMİZE <span class="text--theme">KAYIT OL</span></h2>
                    <h4>Sitemize kayıt olun ve en son yaptığımız projelerden ilk sizin haberiniz olsun</h4>
                    <div class="newsletter__form">
                        <div class="input__box">
                            <div id="mc_embed_signup">
                                <form action="" onsubmit="return false" method="post" id="subscribeForm" name="subscribeForm" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                        <div class="news__input">
                                            <input type="email" value="" name="Email" class="email" id="mce-EMAIL" placeholder="Email Adresinizi Giriniz" required>
                                        </div>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <div class="clearfix subscribe__btn"><input type="submit" value="KAYIT OL" onclick="emailListAdd()" name="gonder" id="mc-embedded-subscribe" class="bst__btn btn--white__color">

                                        </div>
                                        <div id="subscribeResult">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter__thumb">
        <div class="newsletter__thumb__inner">
            <img src="images/others/1.png" alt="newsletter img">
        </div>
    </div>
</section>
<!-- End Newsletter Area -->
<!-- Start Contact Address -->
<div class="htc__contact__address add-res bg__cat--1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="htc__contact__wrap clearfix">
                    <!-- Start Single Address -->
                    <div class="ht__address__inner">
                        <div class="ht__address__icon map-pin">
                            <i class="zmdi zmdi-pin"></i>
                        </div>
                        <div class="ht__address__details">
                            <p><a href="<?php echo $linecontactsFirstList['Maps']; ?>"><?php echo $FooterAddress; ?></a></p>
                        </div>
                    </div>
                    <!-- End Single Address -->
                    <!-- Start Single Address -->
                    <div class="ht__address__inner">
                        <div class="ht__address__icon glob">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="ht__address__details">
                            <p><a href="//<?php echo $lineSettings['Web1']; ?>"><?php echo $lineSettings['Web1']; ?></a></p>
                            <p><a href="http://<?php echo $lineSettings['Web2']; ?>"><?php echo $lineSettings['Web2']; ?></a></p>
                        </div>
                    </div>
                    <!-- End Single Address -->
                    <!-- Start Single Address -->
                    <div class="ht__address__inner">
                        <div class="ht__address__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="ht__address__details">
                            <p><a href="tel:+9<?php echo $lineSettings['Phone1']; ?>"><?php echo $lineSettings['Phone1']; ?></a></p>
                            <p><a href="tel:+9<?php echo $lineSettings['Phone2']; ?>"><?php echo $lineSettings['Phone2']; ?></a></p>
                        </div>
                    </div>
                    <!-- End Single Address -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Address -->
<!-- Start Footer Area -->
<footer class="htc__footer__area">
    <div class="footer__top ptb--130" data--1f2d30__overlay="9.5" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat fixed center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="htc__footer__wrap clearfix">
                    <!-- Start Single Footer -->
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="footer foo">
                            <div class="footer__widget">
                                <h2 class="ft__title">HAKKIMIZDA</h2>
                            </div>
                            <div class="ft__details">
                                <p><?php echo strip_tags($lineFooterShow['Content']); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer -->
                    <!-- Start Single Footer -->
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 xmt-40">
                        <div class="footer quick__link foo">
                            <div class="footer__widget">
                                <h2 class="ft__title">HIZLI LİNKLER</h2>
                            </div>
                            <div class="footer__link">
                                <ul class="ft__menu">
                                    <?php 
                                    foreach ($lineFastLinks as $row) { 
                                        if($row['Link'] == "") continue;
                                        ?>

                                        <li><a href="<?php echo ($row['Link'] != "" ? $row['Name'] : ""); ?>"><?php echo $row['Name']; ?></a></li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer -->
                    <!-- Start Single Footer -->
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 smt-40 xmt-40">
                        <div class="footer foo">
                            <div class="footer__widget">
                                <h2 class="ft__title">SON PROJELER</h2>
                            </div>
                            <ul class="footer__instagram">
                                <?php foreach ($linelastedProjects as $row) { ?>

                                    <li><img src="thumbnail.php?Thumbwidth=370&thumb=<?php echo $row['Images']; ?>" alt="<?php echo $row['Name']; ?>"></li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Footer -->
                    <!-- Start Single Footer -->
                    <!--
                    <div class="col-md-3 col-lg-2 col-lg-offset-1 col-sm-6 col-xs-12 smt-40 xmt-40">
                        <div class="footer foo">
                            <div class="footer__widget">
                                <h2 class="ft__title">INQUARY</h2>
                                <div class="footer__link">
                                    <ul class="ft__menu">
                                        <li><a href="#">Construction</a></li>
                                        <li><a href="#">Architecture</a></li>
                                        <li><a href="#">Plambing</a></li>
                                        <li><a href="#">Plambing</a></li>
                                    </ul>
                                    <ul class="ft__menu">
                                        <li><a href="#">Painting</a></li>
                                        <li><a href="#">Roofing</a></li>
                                        <li><a href="#">Plambing</a></li>
                                        <li><a href="#">Features</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                -->
                <!-- End Single Footer -->
            </div>
        </div>
    </div>
</div>
<div class="copyright bg__theme">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="copyright__inner">
                    <p>Copyright <i class="fa fa-copyright"></i> <a href="kendi_hayatim/index.php" target="_blank">Osman YILDIZ</a>
                        Tüm Hakları Saklıdır. <?php echo date("Y"); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="js/main.js"></script>

<?php if ($popupModal != "yok") { ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#popupModal").modal("show");
        });
    </script>
<?php } ?>

<script src="js/lazyload.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("img.lazyload").lazyload();
    });

</script>
</body>



</html>

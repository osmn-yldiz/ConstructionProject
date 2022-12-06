<?php 

include 'config.php'; 
include 'functions.php';

$RouterLink = basename($_SERVER['PHP_SELF'], ".php");

$linePlacardRouterLinkFind = PlacardRouterLinkFind($RouterLink);

$linePlaCardCategoriesList = PlaCardCategoriesList($linePlacardRouterLinkFind['ID']);
//$pagesInfo = pagesFindID($_GET['ID']);
$pagesInfo = pagesFindSeoName($_GET['SeoName']);
//print $pagesInfo['SupID'];
$pagesParentInfo = pagesFindSupID($pagesInfo['SupID']);
//print_r($pagesParentInfo);

$KEYWORDS = $pagesInfo['Keywords'];
$DESCRIPTION = $pagesInfo['Description'];

$linebrandsList = brandsList();


include 'header.php'; 

?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="6" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title"><?php echo $pagesParentInfo['Header']; ?></h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Anasayfa</a>
                            <span class="brd-separetor">-</span>
                            <span class="breadcrumb-item "><?php echo $pagesParentInfo['Header']; ?></span>
                            <span class="brd-separetor">-</span>
                            <span class="breadcrumb-item active"><?php echo $pagesInfo['Header']; ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Construction Area -->
<?php /*<section class="htc__best__construction ptb--150">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!--<div class="htc__bst__construc">
                    <div class="section__title text-center">
                        <h2 class="title__line">Neden <span class="text--theme">YILDIZLAR GAYRİMENKUL</span> ?</h2>
                        <p>Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.</p>
                    </div>
                    <div class="htc__bst__btn text-center mt--30">
                        <a class="htc__btn" href="contact.html">BUY NOW</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    </section> */ ?>
    <!-- End Construction Area -->
    <!-- Start Offer Area -->
    <section class="htc__mission__area bg__gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-7 col-xs-12">
                    <div class="htc__mission__container">
                        <div class="">
                            <h2 class="title__line text-center" style="margin-bottom: 15px;"> <span class="text--theme"><b><?php echo $pagesInfo['Header']; ?></b></span></h2>
                            <p><?php echo $pagesInfo['Content']; ?></p> <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!--<div class="htc__offer__thumb">
        <div class="htc__offer__thumb__inner">
            <img src="images/about/1.jpg" alt="offer img">
        </div>
    </div>-->
</section>
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
    <?php /* ?>
    <?php 
    foreach ($linePlaCardCategoriesList as $value) {
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
            
        <?php } ?><?php */ ?>
        <section class="htc__service__area service--2 bg__gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="service__section__wrap clearfix">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 h1__service">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="section__title text-left">
                                        <h2 class="title__line"><?php echo $linePlaCardExpCuff['Name']; ?></h2>
                                        <p><?php echo $linePlaCardExpCuff['Exp']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Start Single Service -->

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

                                    <!-- End Single Service -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Area -->
            <!-- End Offer Area -->
            <!-- Start Offer Area -->
            <section class="htc__offer__area ptb--150 bg__white">
                <div class="container">
                    <div class="row">
                     <?php include 'components/PropertyList.php'; ?>
                 </div>
             </div>
         </section>
         <!-- End Offer Area -->
         <?php /* ?><!-- Start Testimonial Area -->
         <section class="htc__testimonial__area ptb--130" data--gray__overlay="9" style="background: rgba(0, 0, 0, 0) url(images/bg/1.jpg) no-repeat fixed center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12">
                        <div class="htc__testimonial__wrap">
                            <div class="section__title text-left">
                                <h2 class="title__line">CLIENTS <span class="text--theme">SAYS</span></h2>
                                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasur</p>
                            </div>
                            <div class="testimonial__activation clearfix">
                             <!-- Start Single Testimonial -->
                             <div class="testimonial">
                                <div class="testimonial__thumb">
                                 <img src="images/test/client/1.jpg" alt="clint image">
                             </div>
                             <div class="testimonial__details">
                                <div class="tes__icon">
                                    <i class="fa fa-quote-right"></i>
                                </div>
                                <p>On the other hand, we denounce with righteous indignation and the tdislike men who are beguiled </p>
                                <h2><a href="#">Ken Williams</a></h2>
                                <h4>CEO, Alves</h4>
                            </div>
                        </div>
                        <!-- End Single Testimonial -->
                        <!-- Start Single Testimonial -->
                        <div class="testimonial">
                            <div class="testimonial__thumb">
                             <img src="images/test/client/1.jpg" alt="clint image">
                         </div>
                         <div class="testimonial__details">
                            <div class="tes__icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <p>On the other hand, we denounce with righteous indignation and the tdislike men who are beguiled </p>
                            <h2><a href="#">Ken Williams</a></h2>
                            <h4>CEO, Alves</h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                    <!-- Start Single Testimonial -->
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                         <img src="images/test/client/1.jpg" alt="clint image">
                     </div>
                     <div class="testimonial__details">
                        <div class="tes__icon">
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <p>On the other hand, we denounce with righteous indignation and the tdislike men who are beguiled </p>
                        <h2><a href="#">Ken Williams</a></h2>
                        <h4>CEO, Alves</h4>
                    </div>
                </div>
                <!-- End Single Testimonial -->
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6  col-lg-offset-1 col-sm-12 col-xs-12 smt-40">
        <div class="reguest__quote">
            <div class="section__title text-left">
                <h2 class="title__line">REQUEST A <span class="text--theme">QUOTE</span></h2>
                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasur</p>
            </div>
            <form id="contact-form" action="https://d29u17ylf1ylz9.cloudfront.net/simply-construction/mail-faq.php" method="post">
                <div class="clint__comment__form">
                    <div class="single__cl__form">
                        <input name="name" type="text" placeholder="Name">
                        <input name="email" type="email" placeholder="Email">
                    </div>
                    <div class="single__cl__form">
                        <input name="telephone" type="tel" placeholder="Phone">
                        <input name="subject" type="text" placeholder="Subject">
                    </div>
                    <div class="single__cl__message">
                        <textarea name="message" placeholder="Massage"></textarea>
                    </div>
                    <div class="clint__submit__btn">
                        <button class="submit htc__btn" type="submit">
                            SEND MESSAGE 
                        </button>
                    </div>
                </div>
            </form>
            <p class="form-messege"></p>
        </div>
    </div>
</div>
</div>
</section>
<!-- End Testimonial Area --> <?php */ ?>
<?php /* ?><!-- Start Counter Up Area -->
<section class="htc__counterup__area ptb--50" style="background: rgba(0, 0, 0, 0) url(images/bg/3.jpg) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="htc__counterup__wrap">
                    <!-- Start Single Fact -->
                    <div class="funfact">
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count ">
                                    <span class="count">598</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>PROJECTS</h2>
                            </div>
                        </div>
                    </div> 
                    <!-- End Single Fact -->
                    <!-- Start Single Fact -->
                    <div class="funfact">
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count ">
                                    <span class="count">128</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>CLIENTS</h2>
                            </div>
                        </div>
                    </div> 
                    <!-- End Single Fact -->
                    <!-- Start Single Fact -->
                    <div class="funfact">
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count ">
                                    <span class="count">339</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>SUCCESS</h2>
                            </div>
                        </div>
                    </div> 
                    <!-- End Single Fact -->
                    <!-- Start Single Fact -->
                    <div class="funfact">
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count ">
                                    <span class="count">109</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>AWARDS</h2>
                            </div>
                        </div>
                    </div> 
                    <!-- End Single Fact -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Counter Up Area --> <?php */ ?>
<!-- Start Blog Area -->
<div class="htc__brand__area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="brand__list">
                    <?php foreach ($linebrandsList as $row) { ?>

                        <li><a href="<?php echo $row['Link']; ?>"><img src="uploads/brands/<?php echo $row['Images']; ?>" alt="<?php echo $row['Name']; ?>"></a></li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<?php include 'footer.php'; ?>
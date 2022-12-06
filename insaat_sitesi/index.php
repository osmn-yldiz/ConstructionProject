<?php 

include 'config.php'; 
include 'functions.php';

$lineSettings = settingList();

$RouterLink = basename($_SERVER['PHP_SELF'], ".php");
$SliderList = SliderList();
$lineHomeShow = pagesHomeShow();
//$linePlaCardExpCuff = PlaCardExpCuff();
$linePlacardRouterLinkFind = PlacardRouterLinkFind($RouterLink);
$linePlaCardCategoriesList = PlaCardCategoriesList($linePlacardRouterLinkFind['ID']);

$linelastedProjects = lastedProjects();

$linebrandsList = brandsList();

$TITLE = "";
$DESCRIPTION = "Yıldızlar Gayrimenkul web sitesi.";
$KEYWORDS = "yıldızlar gayrimenkul, yıldızlar karabük, gayrimenkul, emlak, ev satışı, gayrimenkul satışı, karabük ev, karabük gayrimenkul, karabük emlak, yildizlar emlak, yildizlar gayrimenkul";
include 'header.php'; 


?>


<!-- Start Slider Area -->
<div class="slider__container">
    <div class="slider__activation__wrap owl-carousel owl-theme">
        <!-- Start Single Slide -->
        <?php foreach ($SliderList as $row) { ?>
        <div class="slide slider__fixed--height slide__align--center"
            style="background: rgba(0, 0, 0, 0) url(uploads/slider/<?php echo $row['Images']; ?>) no-repeat scroll 0 0 / cover;"
            data--black__overlay="6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="slider__inner">
                            <h4><?php echo $row['FirstName']; ?></h4>
                            <h1><?php echo $row['SecondName']; ?></h1>
                            <p><?php echo $row['Content']; ?></p>
                            <div class="slider__btn">
                                <a class="htc__btn"
                                    href="<?php echo $row['Link']; ?>"><?php echo $row['LinkName']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="htc__slider__fornt__img">
                <img src="images/slider/fornt-img/1.png" alt="slider images">
            </div>
        </div>
        <?php } ?>

        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Offer Area -->
<section class="htc__offer__area htc__offer--2 pb--120 bg__gray">
    <div class="container">
        <div class="row">
            <?php include 'components/PropertyList.php'; ?>
        </div>
    </div>
    <div class="h1__offer__image">
        <img src="images/others/3.png" alt="">
    </div>
</section>
<!-- End Offer Area -->
<!-- Start About Area -->
<section class="htc__about__area about--2 text__pos ptb--150 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title text-center">
                    <h2 class="title__line">HAKKIMIZDA & <span class="text--theme">HİZMETLERİMİZ</span></h2>
                    <p>1999'dan beri değişmeyen vizyonumuz ve sürekli gelişen misyonumuz ile durmadan çalışmaya ve
                        üretmeye devam ediyoruz.</p>
                </div>
            </div>
        </div>


        <div class="row mt--70">
            <?php
            foreach ($lineHomeShow as $value) {
               ?>
            <div class="col-md-4 col-lg-4  col-sm-6 col-xs-12">
                <div class="about foo">
                    <div class="about__inner">
                        <h2><a href="about.html"><?php echo $value['Header']; ?></a></h2>
                        <p style="display:inline-block"><?php echo mb_substr($value['Content'] ,0,100, 'UTF-8'); ?></p>
                        <div class="about__btn">
                            <a href="pages.php?ID=<?php print $value['ID']; ?>">DEVAMINI OKU</a>
                        </div>
                        <div class="about__icon">
                            <img src="images/others/icon/1.png" alt="icon images">
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php 
        }
        ?>
        </div>
    </div>
    <div class="text__shape">
        <h2>GAYRİMENKUL</h2>
    </div>
</section>
<!-- End About Area -->
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
    foreach ($linePlaCardCategoriesList as $value) {
        $linePlaCardList = PlaCardList($value['ID']);
        ?>
<section class="htc__service__area service--2 bg__gray">
    <div class="container">
        <div class="row">
            <div class="service__section__wrap clearfix">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 h1__service pt--40 pb--30">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section__title text-center">
                                <h2 class="title__line"><?php echo $value['Header']; ?></h2>
                                <div class="text-left" style="margin-bottom: 15px; margin-top: 5px;">
                                    <?php echo $value['Exp']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <!-- Start Single Service -->

                        <?php 
                                foreach($linePlaCardList as $PlaCard){
                                    ?>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                            <div class="service">
                                <div class="service__thumb">
                                    <a href="single-service.html">
                                        <img src="uploads/PlaCard/<?php echo $PlaCard['Images']; ?>"
                                            alt="service images">
                                    </a>
                                    <div class="service__hover">
                                        <div class="service__action">
                                            <a target="<?php echo $PlaCard['Target']; ?>"
                                                href="<?php echo $PlaCard['Link']; ?>">DETAY</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service__details">
                                    <h2><a target="<?php echo $PlaCard['Target']; ?>"
                                            href="<?php echo $PlaCard['Images']; ?>"><?php print $PlaCard['Header']; ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
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
<?php } ?>
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
                        <!-- Start Single Service -->

                        <?php 
                                foreach($linePlaCard_2 as $PlaCard){
                                    ?>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                            <div class="service">
                                <div class="service__thumb">
                                    <a href="single-service.html">
                                        <img src="uploads/PlaCard/<?php echo $PlaCard['Images']; ?>"
                                            alt="service images">
                                    </a>
                                    <div class="service__hover">
                                        <div class="service__action">
                                            <a target="<?php echo $PlaCard['Target']; ?>"
                                                href="<?php echo $PlaCard['Link']; ?>">DETAY</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service__details">
                                    <h2><a target="<?php echo $PlaCard['Target']; ?>"
                                            href="<?php echo $PlaCard['Images']; ?>"><?php print $PlaCard['Header']; ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
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

<!-- Start Latest Project Area -->
<section class="htc__latest__project__area ptb--150 bg__white text__pos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title text-center">
                    <h2 class="title__line"><?php echo $LANG['latest_projects']; ?></h2>
                    <p>Güven odaklı çalışma prensiplerimiz ile daima en kaliteli hizmeti sunmaya ve anlaştığımız zamanda
                        teslim etmeye önem veriyoruz. Bizi diğerlerinden ayıran en önemli farkımız her anlamda
                        müşterilerimizi memnun etmeyi başarmaktır.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="htc__latest__project__wrap h1__project clearfix mt--30">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <?php foreach ($linelastedProjects as $row) { ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="project__itm foo">
                                <div class="project__thumb">
                                    <a href="projects-details.php?ID=<?php echo $row['ID']; ?>">
                                        <img src="thumbnail.php?Thumbwidth=325&thumb=<?php echo $row['Images'] ?>"
                                            alt="<?php echo $row['Name']; ?>">
                                    </a>
                                    <div class="project__hover__info">
                                        <div class="project__action">
                                            <h2><a href="projects-details.php?ID=<?php echo $row['ID']; ?>">DETAY</a>
                                            </h2>
                                            <h4>SÖZ. BİTİŞ TARİHİ : <?php echo trDate($row['ContractEndDate']); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text__shape">
        <h2>YILDIZLAR</h2>
    </div>
</section>
<!-- End Latest Project Area -->
<!-- Start Counter Up Area -->
<?php /* ?><section class="htc__counterup__area count--2 h1__countdown bg__gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="counterup__left__thumb">
                    <img src="images/about/4.png" alt="images">
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="htc__callto__action">
                    <h2># BEST <span class="text--theme">CONSTRUCTION</span> THEME</h2>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
                        demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot
                        foresee the pain and trouble</p>
                    <div class="htc__call__btn">
                        <a class="htc__btn" href="#">BUY NOW</a>
                    </div>
                </div>
                <div class="htc__counterup__wrap"
                    style="background: rgba(0, 0, 0, 0) url(images/bg/10.png) no-repeat scroll center center / cover ;">
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
                    <div class="funfact hidden-md">
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
<?php */ ?>
<!-- End Counter Up Area -->
<!-- Start Team Area -->
<?php /* ?>
<section class="htc__team__area bg__white h1__team--one ptb--150 text__pos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title text-center">
                    <h2 class="title__line">OUR <span class="text--theme">TEAM</span></h2>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
                        demoralized by the charms of pleasure of the moment, so blinded by desire</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="htc__team__wrap clearfix mt--30">
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                    <div class="team foo">
                        <div class="team__inner">
                            <div class="team__thumb">
                                <img src="images/team/1.jpg" alt="team image">
                            </div>
                            <div class="team__hover__info">
                                <ul class="team__social__link">
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team__details">
                            <h2><a href="#">STAWART SMITH</a></h2>
                            <h4>Chief Engineer</h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                    <div class="team foo">
                        <div class="team__inner">
                            <div class="team__thumb">
                                <img src="images/team/2.jpg" alt="team image">
                            </div>
                            <div class="team__hover__info">
                                <ul class="team__social__link">
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team__details">
                            <h2><a href="#">KALVIN MOMEN</a></h2>
                            <h4>KALVIN MOMEN</h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                    <div class="team foo">
                        <div class="team__inner">
                            <div class="team__thumb">
                                <img src="images/team/3.jpg" alt="team image">
                            </div>
                            <div class="team__hover__info">
                                <ul class="team__social__link">
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team__details">
                            <h2><a href="#">ANDREW SIMONS</a></h2>
                            <h4>Chief Electicians</h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 hidden-sm col-xs-12">
                    <div class="team foo">
                        <div class="team__inner">
                            <div class="team__thumb">
                                <img src="images/team/4.jpg" alt="team image">
                            </div>
                            <div class="team__hover__info">
                                <ul class="team__social__link">
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team__details">
                            <h2><a href="#">MARK TAYLOR</a></h2>
                            <h4>Chief Engineer</h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
        </div>
    </div>
    <div class="text__shape">
        <h2>TEAM</h2>
    </div>
</section>
<?php */ ?>
<!-- End Team Area -->
<!-- Start Testimonial Area -->
<?php /* ?>
<section class="htc__testimonial__area ptb--130" data--gray__overlay="9.5"
    style="background: rgba(0, 0, 0, 0) url(images/bg/1.jpg) no-repeat fixed center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12">
                <div class="htc__testimonial__wrap">
                    <div class="section__title text-left">
                        <h2 class="title__line">CLIENTS <span class="text--theme">SAYS</span></h2>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                            and demoralized by the charms of pleasur</p>
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
                                <p>On the other hand, we denounce with righteous indignation and the tdislike men who
                                    are beguiled </p>
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
                                <p>On the other hand, we denounce with righteous indignation and the tdislike men who
                                    are beguiled </p>
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
                                <p>On the other hand, we denounce with righteous indignation and the tdislike men who
                                    are beguiled </p>
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
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                            and demoralized by the charms of pleasur</p>
                    </div>
                    <form id="contact-form"
                        action="https://d29u17ylf1ylz9.cloudfront.net/simply-construction/mail-faq.php" method="post">
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
<?php */ ?>
<!-- End Testimonial Area -->
<!-- Start Blog Area -->
<?php /* ?>
<section class="htc__blog__area pt--150 bg__white">
    <div class="container">
        <div class="row">
            <div class="section__title text-center">
                <h2 class="title__line">LATEST <span class="text--theme">BLOG</span></h2>
                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
                    demoralized by the charms of pleasure of the moment, so blinded by desire</p>
            </div>
        </div>
        <div class="row">
            <div class="htc__blog__wrap mt--30 clearfix">
                <!-- Start Single Blog -->
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog foo">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="images/blog/blog-img/1.jpg" alt="blog image">
                            </a>
                            <div class="blog__hover__info">
                                <ul class="blog__meta">
                                    <li>By : <a href="#">Kalvin</a></li>
                                    <li>20 July</li>
                                    <li><a href="#">Comments 5</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog__details">
                            <h2><a href="blog-details.html">Lorem ipsum dolor sit amet, cotur adipiscing elit, sed do
                                    eiusmod </a></h2>
                            <div class="blog__btn">
                                <a href="blog-details.html">READ MORE<i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog foo">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="images/blog/blog-img/2.jpg" alt="blog image">
                            </a>
                            <div class="blog__hover__info">
                                <ul class="blog__meta">
                                    <li>By : <a href="#">Kalvin</a></li>
                                    <li>20 July</li>
                                    <li><a href="#">Comments 5</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog__details">
                            <h2><a href="blog-details.html">Lorem ipsum dolor sit amet, cotur adipiscing elit, sed do
                                    eiusmod </a></h2>
                            <div class="blog__btn">
                                <a href="blog-details.html">READ MORE<i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-4 col-lg-4 hidden-sm col-xs-12">
                    <div class="blog foo">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="images/blog/blog-img/3.jpg" alt="blog image">
                            </a>
                            <div class="blog__hover__info">
                                <ul class="blog__meta">
                                    <li>By : <a href="#">Kalvin</a></li>
                                    <li>20 July</li>
                                    <li><a href="#">Comments 5</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog__details">
                            <h2><a href="blog-details.html">Lorem ipsum dolor sit amet, cotur adipiscing elit, sed do
                                    eiusmod </a></h2>
                            <div class="blog__btn">
                                <a href="blog-details.html">READ MORE<i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>
<?php */ ?>
<!-- End Blog Area -->
<!-- Start Blog Area -->
<div class="htc__brand__area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="brand__list">
                    <?php foreach ($linebrandsList as $row) { ?>

                    <li><a href="<?php echo $row['Link']; ?>"><img src="uploads/brands/<?php echo $row['Images']; ?>"
                                alt="<?php echo $row['Name']; ?>"></a></li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<?php include'footer.php'; ?>
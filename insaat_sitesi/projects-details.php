<?php

include 'config.php';
include 'functions.php';
$lineProjectsDetails = projectsDetailsSeoName($_GET['SeoName']); 
$lineProjectsImages = projectsImages($lineProjectsDetails['ID']);
$lineprojectsRandom = projectsRandom();
$lineprojectsFindCategoriesID = projectsFindCategoriesID($lineProjectsDetails['ProjectsCategoriesID']);

$TITLE = $lineProjectsDetails['Name'];
$KEYWORDS = "";
$DESCRIPTION = "";

include 'header.php';



?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="6" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title"><?php echo $lineProjectsDetails['Name']; ?></h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Anasayfa</a>
                          <span class="brd-separetor">-</span>
                          <a class="breadcrumb-item" href="projects-categories.php">PROJELERİMİZ</a>
                          <span class="brd-separetor">-</span>
                          <a class="breadcrumb-item" href="projects.php?ProjectsCategoriesID=<?php print $lineprojectsFindCategoriesID['ID']; ?>"><?php print $lineprojectsFindCategoriesID['Name']; ?></a>
                          <span class="brd-separetor">-</span>
                          <span class="breadcrumb-item active"><?php echo $lineProjectsDetails['Name']; ?></span>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Blog Area -->
<section class="htc__project__details__page ptb--150 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="htc__single__service">
                    <div class="htc__single__service__tab">
                        <div class="ht-portfolio-pic-show">
                            <div class="ht-portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="thumbnail.php?Thumbwidth=770&thumb=<?php echo $lineProjectsDetails['Images'] ?>" alt="<?php echo $lineProjectsDetails['Name']; ?>">
                                </div>
                                <?php 
                                $i=2;
                                foreach($lineProjectsImages as $row) { ?>
                                <div role="tabpanel" class="tab-pane fade" id="img-tab-<?php echo $i; ?>">
                                    <img src="thumbnail.php?Thumbwidth=770&thumb=<?php echo $row['Images'] ?>" alt="<?php echo $lineProjectsDetails['Name']; ?>">
                                </div>
                                <?php $i++; } ?>
                                
                            </div>
                        </div>
                        <!-- Start Small images -->
                        <div class="ht__service__small__image nav nav-tabs clearfix">
                            <ul role="tablist" class="prodict-det-small  clearfix">
                               <li role="presentation" class="pot-small-img img-tab-1 active">
                                <a href="#img-tab-1" role="tab" data-toggle="tab">
                                    <img src="thumbnail.php?Thumbwidth=177&thumb=<?php echo $lineProjectsDetails['Images'] ?>" alt="<?php echo $lineProjectsDetails['Name']; ?>">
                                </a>
                            </li>
                            <?php  $i=2; foreach($lineProjectsImages as $row) { ?>
                            <li role="presentation" class="pot-small-img img-tab-<?php echo $i; ?> <?php echo ($i==1?'active':'') ?>">
                                <a href="#img-tab-<?php echo $i; ?>" role="tab" data-toggle="tab">
                                    <img src="thumbnail.php?Thumbwidth=177&thumb=<?php echo $row['Images'] ?>" alt="<?php echo $lineProjectsDetails['Name']; ?>">
                                </a>
                            </li>
                            <?php $i++; } ?>
                        </ul>
                    </div>
                    <!-- End Small images --> 
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="single__project__rightsidebar">
                <!-- Start Single Item -->
                <div class="pro__dtl__inner bg__gray">
                    <h2>PROJE DETAYI</h2>
                    <div class="pro__dtl__content">
                        <ul class="pro__dtl__list font__bold">
                            <li>İŞVEREN :</li>
                            <li>İŞİN ADI :</li>
                            <li>SÖZ. BAŞ. TARİHİ :</li>
                            <li>SÖZ. BİT. TARİHİ :</li>
                        </ul>
                        <ul class="pro__dtl__list">
                            <li><?php echo ($lineProjectsDetails['Boss'] == "" ? "Bilgi girilmemiş" : $lineProjectsDetails['Boss']); ?></li>
                            <li><?php echo ($lineProjectsDetails['JobName'] == "" ? "Bilgi girilmemiş" : $lineProjectsDetails['JobName']); ?></li>
                            <li><?php echo trDate($lineProjectsDetails['ContractStartDate']); ?></li>
                            <li><?php echo trDate($lineProjectsDetails['ContractEndDate']); ?></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="htc__pro__desc__container">
                <!-- start Single Details -->
                <div class="">
                    <h2>PROJE HAKKINDA BİLGİ</h2>
                    <p><?php echo $lineProjectsDetails['Content']; ?></p>
                </div>
                <!-- End Single Details -->
            </div>
        </div>
    </div>
</div>
</section>
<!-- End Blog Area -->
<!-- Start Service Area -->
<section class="htc__project__area bg__white pb--150">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title text-center">
                    <h2 class="title__line">RELATED <span class="text--theme">PROJECTS</span></h2>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="rl__project__wrap clearfix mt--60 xmt-40">
                <!-- Start Single Service -->
                <?php foreach ($lineprojectsRandom as $row) { ?>            
                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                    <div class="rl__project foo">
                        <div class="project__thumb">
                            <a href="projelerimiz/<?php echo $row['katSeoName'] ?>/<?php echo $row['SeoName'] ?>">
                                <img src="thumbnail.php?Thumbwidth=270&thumb=<?php echo $row['Images'] ?>" alt="<?php echo $row['Name'] ?>">
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Service Area -->

<?php include 'footer.php'; ?>
<?php 

include 'config.php';
include 'functions.php';

$c = $_GET['ProjectsCategoriesID'];
$search = strip_tags($_GET['search']);
$page = $_GET['page'];
if($page < 1) {
	$page=1;
} 
$page = $page-1;


$start = $page*3;


//$kategori = projectsCategoriesListArray();

$lineprojectsFindCategoriesID = projectsFindCategoriesID($c);
$projectsSearchListArray = projectsSearchList($start, $search);
//print_r($projectsSearchListArray);exit;
$projectsSearchList = $projectsSearchListArray[0];
$totalList = $projectsSearchListArray[1];
//$projectsList  = json_decode($projectsList);
$TITLE = $lineprojectsFindCategoriesID['Name'];
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
						<h2 class="bradcaump-title"><?php echo $lineprojectsFindCategoriesID['Name']; ?></h2>
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.php">Anasayfa</a>
							<span class="brd-separetor">-</span>
							<a class="breadcrumb-item">Arama</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->
<!-- Start Blog Area -->
<section class="htc__blog__area ptb--150 bg__white">
	<div class="container">
		<div class="row">
			<div class="htc__blog__wrap clearfix">
				<!-- Start Single Blog -->
				<h3>Aranan Kelime=<?php echo strip_tags($_GET['search']); ?></h3>
				<?php foreach ($projectsSearchList as $row) {
            //$kategori = projectsFindCategoriesID($row['ProjectsCategoriesID']);
					?>
					<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
						<div class="blog foo">
							<div class="blog__thumb">
								<a href="projects-details.php?ID=<?php print $row->ID ?>">
									<img class="lazyload"  data-src="thumbnail.php?Thumbwidth=370&thumb=<?php echo $row->Images ?>" alt="<?php echo $row->Name; ?>">
								</a>
								<div class="blog__hover__info">
									<ul class="blog__meta">
										<li>Sözleşme Bitiş Tarihi: <?php echo trDate($row->ContractEndDate); ?></li>
									</ul>
								</div>
							</div>
							<div class="blog__details">
								<h2 class="ucnokta"><a href="projects-details.php?ID=<?php print $row->ID ?>"><?php echo $row->Name; ?></a></h2>
								<div class="blog__btn">
									<a href="projects-details.php?ID=<?php print $row->ID ?>">DETAY İÇİN TIKLAYINIZ<i class="zmdi zmdi-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<div style="clear: both"></div>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="proje-ara.php?search=<?php echo $search; ?>&page=<?php echo $page; ?>">Previous</a></li>
						<?php 
						$total = ceil($totalList/3);
						for($i=1; $i <= $total; $i++)
						{
							?>


							<li class="page-item"><a class="page-link" href="proje-ara.php?search=<?php echo $search ?>&page=<?php echo $i ?>"><?php print $i; ?></a></li>

							<?php
						}
						?>

						<?php  
						if($page < ($total-1) )
						{
							?>
							<li class="page-item"><a class="page-link" href="proje-ara.php?search=<?php echo $search ?>&page=<?php echo $page+2 ?>">Next</a></li>
							<?php 
						}
						?>
					</ul>
				</nav>
				<!-- End Single Blog -->
			</div>
		</div>
	</div>
</section>
<!-- End Blog Area -->

<?php include 'footer.php'; ?>
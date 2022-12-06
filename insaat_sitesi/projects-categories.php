<?php 

include 'config.php';
include 'functions.php';

//$lineprojectsCategoriesList = projectsCategoriesList();
$data = array(
	"hash"	=> "amtqa2pramtqa21nbWZtaG10bXNtc21nbGxha2R0a2RrYXNkYWRmamtqa2pramtqa21nbWZtaG10bXNtc21nbGxha2R0a2RrYXNkYWRm"
);

$lineprojectsCategoriesList = jsonPost($URL."web-services/projectsCategoriesList.php", $data);
$lineprojectsCategoriesList = json_decode($lineprojectsCategoriesList);

$TITLE = $lineprojectsCategoriesList->Name;
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
						<h2 class="bradcaump-title">PROJELERİMİZ</h2>
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.php">Anasayfa</a>
							<span class="brd-separetor">-</span>
							<span class="breadcrumb-item active">PROJELERİMİZ</span>
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
				<?php foreach ($lineprojectsCategoriesList as $row) {
					?>
					<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
						<div class="blog foo">
							<div class="blog__thumb">
								<a href="projelerimiz/<?php echo $row->SeoName; ?>">
									<img class="lazyload"  data-src="thumbnail.php?Dir=projects_categories&Thumbwidth=370&thumb=<?php echo $row->Images ?>" alt="<?php echo $row->Name; ?>">
								</a>
							</div>
							<div class="blog__details">
								<h2 class="ucnokta"><a href="projelerimiz/<?php echo $row->SeoName; ?>"><?php echo $row->Name; ?></a></h2>
								<div class="blog__btn">
									<a href="projelerimiz/<?php echo $row->SeoName; ?>">DETAY İÇİN TIKLAYINIZ<i class="zmdi zmdi-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- End Single Blog -->
			</div>
		</div>
	</div>
</section>
<!-- End Blog Area -->

<?php include 'footer.php'; ?>
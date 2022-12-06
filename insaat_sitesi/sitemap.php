<?php 
include 'config.php';
include 'functions.php';

$linepagesList = pagesList();
$lineprojectsCategoriesList = projectsCategoriesList();
$lineprojectsAllList = projectsAllList();

header("Content-type: text/xml");


?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo $URL ?>/index.php</loc>
    </url>
    <?php foreach($linepagesList as $row) { ?>
    <url>
        <loc><?php echo $URL ?>/pages.php?ID=<?php echo $row['ID']; ?></loc>
        <lastmod><?php echo ($row['UpdateDate'] != "" ? $row['UpdateDate']:$row['CreateDate']) ?></lastmod>
    </url>
    <?php } ?>
    <?php foreach($lineprojectsCategoriesList as $row) { ?>
    <url>
        <loc><?php echo $URL ?>/projects.php?ProjectsCategoriesID=<?php echo $row['ID']; ?></loc>
        <lastmod><?php echo ($row['UpdateDate'] != "" ? $row['UpdateDate']:$row['CreateDate']) ?></lastmod>
    </url>
    <?php } ?>
    <?php foreach($lineprojectsAllList as $row) { ?>
    <url>
        <loc><?php echo $URL ?>/projects-details.php?ID=<?php echo $row['ID']; ?></loc>
        <lastmod><?php echo ($row['UpdateDate'] != "" ? $row['UpdateDate']:$row['CreateDate']) ?></lastmod>
    </url>
    <?php } ?>
</urlset>
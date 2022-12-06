<?php

// Example for dynamic image
// See www.mywebmymail.com for more details

if (isset($_REQUEST['thumb'])) {
    include_once('class/easyphpthumbnail.class.php');
    // Your full path to the images
    if(empty($_GET['Dir']))
        $dir = 'uploads/projects/';
    else if($_GET['Dir'] == 'projects_categories'){
        $dir = 'uploads/projects_categories/';
    }
    // Create the thumbnail
    $thumb = new easyphpthumbnail;
    if(isset($_GET['Thumbheight'])){
        $thumb ->Thumbheight = intval($_GET['Thumbheight']);
    }

    if(isset($_GET['Thumbwidth'])){
        $thumb ->Thumbwidth = intval($_GET['Thumbwidth']);
    }

    if(isset($_GET['Thumbsize'])){
        $thumb ->Thumbsize = intval($_GET['Thumbsize']);
    }
    //$thumb -> Quality = 95;

    /*$thumb->Watermarkpng = 'img/logo.png';
    $thumb->Watermarkposition = '10% 50%';
    $thumb->Watermarktransparency = 90;*/
    $thumb -> Createthumb($dir . basename($_REQUEST['thumb']), "");
    
}

?>
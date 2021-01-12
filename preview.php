<?php
    if( (
        !isset($_GET['preview']) && 
        'true' == $_GET['preview']
    ) ){
        include 'views/partials/preview-fail.php';
    }else{
        include 'views/partials/preview-'.$_GET['post_type'].'.php';
    }
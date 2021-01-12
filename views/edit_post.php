<?php 
    $results = get_post_by_ID($_GET['id']);
    while($row = $results->fetch_assoc()){
        include 'forms/post_form.php'; 
    }
include 'partials/modal-media-gallery.php';
?>
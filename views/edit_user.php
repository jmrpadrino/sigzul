<?php 
    $results = get_user_by_ID($_GET['id']);
    while($row = $results->fetch_assoc()){
        include 'forms/user_form.php'; 
    }
include 'partials/modal-media-gallery.php';
?>
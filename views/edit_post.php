<?php 
    $results = get_post_by_ID($database, $_GET['id']);
    while($row = $results->fetch_assoc()){
    include 'forms/post_form.php'; 
    }
?>
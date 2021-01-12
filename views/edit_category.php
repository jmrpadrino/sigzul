<?php 
    $results = get_term_by_ID($_GET['id']);
    while($row = $results->fetch_assoc()){
    include 'forms/category_form.php'; 
    }
?>
<?php
/**
 * Devuelve SLUG validado
 */

function sigzul_validar_slug($slug){
    if(is_array($slug)){
        return false;
    }
    global $database;
    $new_slug = '';
    $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE post_name LIKE '".$slug."%'";
    $database->query($query);
    
    if($database->error){
        echo 'error';
    }else{
        if ( $database->affected_rows > 0 ){
            $new_slug = $slug .'-'. ($database->affected_rows + 1);
        }else{
            $new_slug = $slug;
        }
    }
    echo $new_slug;
}
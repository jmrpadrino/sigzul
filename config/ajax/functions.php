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

/**
 * Eliminar archivo de los medios
 */

function sigzul_remove_media(){
    $file = $_GET['data'];
    if ($file){
        // buscar el Archivo
        $ruta = THEME_DIR . UPLOADS_PATH . $file;
        if( !unlink($ruta) ){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}
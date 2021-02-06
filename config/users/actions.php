<?php
get_users_list();
// Guardar el usuario o su actualizacion
if( isset( $_POST['save_user'] ) ){    
    $results = save_user($_POST);
    header('Location: '. SITE_URL .'/?action=show_all_users');
    die();
}
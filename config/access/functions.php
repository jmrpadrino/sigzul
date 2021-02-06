<?php
// Valida credenciales de usuarios
function validate_user_data($post){
    global $database;
    $query = "SELECT * FROM " . TABLE_PREFIX . "users WHERE user = '".$post['user']."' AND pass = '".$post['pass']."'";
    return $database->query( $query );
}

// Valida usuario logeado
function is_user_logged_in(){
    if( isset( $_SESSION['user_logged'] ) ){
        return true;
    }
    return false;
}
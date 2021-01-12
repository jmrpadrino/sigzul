<?php
// Valida usuario logeado
function is_user_logged_in(){
    if( isset( $_SESSION['user_logged'] ) ){
        return true;
    }
    return false;
}

function get_user_data($dabatase, $id){
    
}
<?php 
// Login
if(isset($_POST['user'])) {
    if( 
        'admin' ==  $_POST['user'] &&
        '123' ==  $_POST['pass']
    ){
        $_SESSION['user_logged'] = 1;
    }else{
        $message .= 'Datos de acceso incorrectos</br>';
    }
}

// Logout
if ( isset( $_GET['logout'] ) ){
    unset ( $_SESSION['user_logged'] );
}

// Valida usuario logeado
function is_user_logged_in(){
    if( isset( $_SESSION['user_logged'] ) ){
        return true;
    }
    return false;
}

function get_user_data($dabatase, $id){
    
}

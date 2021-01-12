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
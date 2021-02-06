<?php 
// Login
if(isset($_POST['user'])) {

    // buscar credenciales del usuario.
    $result = validate_user_data($_POST);
    if( $result->num_rows > 0 ){
        $result = $result->fetch_assoc();
        $_SESSION['user_logged'] = $result['ID'];
        $_SESSION['user_name'] = $result['user'];
        $_SESSION['user_cap'] = $result['capabilities'];
    }else{
        $message .= 'Datos de acceso incorrectos';
    }
}
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// Logout
if ( isset( $_GET['logout'] ) ){
    unset ( $_SESSION['user_logged'] );
}
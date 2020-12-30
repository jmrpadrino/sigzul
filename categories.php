<?php
// Funciones
include 'categories/functions.php';
// Guardar el post
if( isset( $_POST['save_form'] ) ){
    $results = save_form_categories($database, $_POST);
    if( $results === true ){
        $message = 'Se han guardado los datos';
        $message = '';
    }else{
        echo $message = $results;
        $message = '';
    }
  }
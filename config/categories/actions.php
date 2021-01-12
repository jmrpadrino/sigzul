<?php
// Guardar el post
if( isset( $_POST['save_category_form'] ) ){
    $results = save_form_categories($_POST);
    if( $results === true ){
        $message = 'Se han guardado los datos';
        $message = '';
    }else{
        echo $message = $results;
        $message = '';
    }
  }
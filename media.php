<?php
$supported_format = array('gif','jpg','jpeg','png');
define('SUPORTED_IMAGE_FORMATS', $supported_format);

// Consultas
$media = '';
include 'media/functions.php';

// Guardar la imagen
if( isset( $_POST['save_file'] ) ){
    $results = save_file($_FILES);
    $message = $results;
}

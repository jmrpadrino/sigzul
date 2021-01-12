<?php
// Conectar con base de datos
$database = new mysqli(
    DB_HOST,
    DB_USER,
    DB_PASSWORD, 
    DB_NAME
);
if ($database->connect_errno) {
    $message .= "Falló la conexión a MySQL: (" . $database->connect_errno . ") " . $database->connect_error . '<br/>';
}else{
    $_GLOBAL['database'] = $database;
}
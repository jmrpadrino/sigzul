<?php 
    include '../config.php';

    $function = 'sigzul_' . $_GET['action'];
    if ($function){
        $function($_GET['data']);
    }
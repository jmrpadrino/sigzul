<?php 
// Inicio de sesion
session_start();

// Declaraciones
define('THEME_URL', 'http://sigzul.test');
define('THEME_DIR', __DIR__ );
define('UPLOADS_PATH', '/uploads/');
define('SITE_URL', 'http://sigzul.test');
define('SITE_NAME', 'Sigzul');
define('SITE_DESCRIPTION', 'Sistema de Gestión de Contenidos LifEscozul');

// Fecha y Hora
date_default_timezone_set('America/Guayaquil');

// Mensajes
$message = '';

// Database
include 'database.php';

// Users Access
include 'access.php';

// Media
include 'media.php';

// Categories
include 'categories.php';
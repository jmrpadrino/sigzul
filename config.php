<?php 
// Inicio de sesion
session_start();

// Fecha y Hora
date_default_timezone_set('America/Guayaquil');

// Declaraciones generales
define('THEME_URL', 'http://sigzul.test');
define('THEME_DIR', __DIR__ );
define('UPLOADS_PATH', '/uploads/');
define('SITE_URL', 'http://sigzul.test');
define('SITE_NAME', 'Sigzul');
define('SITE_DESCRIPTION', 'Sistema de Gestión de Contenidos LifEscozul');

// Declaraciones Base de Datos
define( 'DB_NAME', 'sigzul' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', 'utf8_general_ci' );
define( 'TABLE_PREFIX', 'lec_' );

// Globals
$message = '';
$database = '';
$results = '';
$media = '';
$users_list = '';
$category_list = '';

// Conectar con base de datos
include 'config/conn.php';

// Functions
include 'config/database/functions.php';
include 'config/media/functions.php';
include 'config/access/functions.php';
include 'config/categories/functions.php';
include 'config/users/functions.php';

// Acciones
include 'config/database/actions.php';
include 'config/media/actions.php';
include 'config/access/actions.php';
include 'config/categories/actions.php';
include 'config/users/actions.php';

// AJAX
include 'config/ajax/functions.php';
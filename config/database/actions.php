<?php 
global $database;
$users_table = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."users` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(256) NOT NULL,
    `user` varchar(256) NOT NULL,
    `pass` varchar(256) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET." COLLATE=".DB_COLLATE.";";

$posts_table = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."posts` (
    `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
    `post_date` datetime NOT NULL DEFAULT current_timestamp(),
    `post_content` longtext NOT NULL,
    `post_title` text NOT NULL,
    `post_excerpt` text NOT NULL,
    `post_status` varchar(20) NOT NULL DEFAULT 'publish',
    `post_name` varchar(200) NOT NULL,
    `post_featuredimage` longtext NOT NULL,
    `post_category` longtext NOT NULL,
    `post_seo_title` varchar(255) NOT NULL,
    `post_seo_desc` varchar(255) NOT NULL,
    `post_seo_slug` varchar(200) NOT NULL,
    `post_seo_keywords` longtext NOT NULL,
    `post_seo_canonical` varchar(255) NOT NULL,
    `post_seo_schema` longtext NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET." COLLATE=".DB_COLLATE.";";

$comments_table = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."comentarios` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `fecha_item` datetime NOT NULL,
    `fecha_pub` datetime NOT NULL,
    `nombre` varchar(256) NOT NULL,
    `comentario` text NOT NULL,
    `pais` varchar(100) NOT NULL,
    `rating` int(1) NOT NULL,
    `aprobado` tinyint(1) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET." COLLATE=".DB_COLLATE.";";

$terms_table = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."terms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `term_title` text NOT NULL,
  `term_name` varchar(200) NOT NULL,
  `term_description` text NOT NULL,
  `term_featuredimage` LONGTEXT NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET." COLLATE=".DB_COLLATE.";";


// Crear tablas
$database->query( $users_table );
if ($database->error) {
  $message .= "No se completó la operacion: (" . $database->errno . ") " . $database->error . '<br/>';
}
$database->query( $posts_table );
if ($database->error) {
  $message .= "No se completó la operacion: (" . $database->errno . ") " . $database->error . '<br/>';
}
$database->query( $comments_table );
if ($database->error) {
  $message .= "No se completó la operacion: (" . $database->errno . ") " . $database->error . '<br/>';
}
$database->query( $terms_table );
if ($database->error) {
    $message .= "No se completó la operacion: (" . $database->errno . ") " . $database->error . '<br/>';
}

// Guardar el post
if( isset( $_POST['save_form'] ) ){
  $results = save_form($_POST);
  if( $results === true ){
      $message = 'Se han guardado los datos';
      $message = '';
  }else{
      echo $message = $results;
      $message = '';
  }
}
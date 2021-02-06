<?php 
// Niveles de usuario
function get_users_levels(){
    $levels = array(
        'administrador' => 'Administrador',
        'editor' => 'Editor',
        'autor' => 'Autor',
        'colaborador' => 'Colaborador',
        'suscriptor' => 'Suscriptor'
    );
    return $levels;
}

// funcion Obtener todos los usuarios
function get_users(){
    global $database;
    $posts_per_page = 10;
    if(isset($_GET['posts_per_page'])){
        $posts_per_page = $_GET['posts_per_page'];
    }
    $page = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    if(!isset($_GET['filterby'])){
        $query = "SELECT * FROM ".TABLE_PREFIX."users ORDER BY ID DESC";
    }else{
        $query = "SELECT * FROM ".TABLE_PREFIX."users ORDER BY ID DESC LIMIT " . $posts_per_page;
    }
    return $database->query( $query );

}

function get_users_list(){
    global $database;
    global $users_list;
    $users_list = array();
    $query = "SELECT ID,user,email FROM ".TABLE_PREFIX."users ORDER BY ID DESC";
    $results =  $database->query( $query );
    while($row = $results->fetch_assoc()){
        $users_list[] = $row;
    }
    return $users_list;
}

// funciono obtener Usuario por ID
function get_user_by_ID($id){
    global $database;
    $query = "SELECT * FROM ".TABLE_PREFIX."users WHERE ID = " . $id;
    return $database->query( $query );
}

// funcion Guardar el Usuario
function save_user($data){    
    global $database;
    if (!$data) {
        return false;
    }else{
        $query = '';
        if ( isset ( $_GET['id'] ) ){
            // UPDATE
            $query .= "UPDATE " . TABLE_PREFIX . "users SET ";

            foreach ( $data as $key => $field ) {
                if ( 'save_user' != $key ){
                    $fields[] = $key . "='" . $field . "'";
                }
            }
            $query .= implode(',', $fields);
            $query .= " WHERE ID='". $_GET['id'] ."'";
        
        }else{
            // INSERT
            $fields = $values = array();
            $query .= "INSERT INTO " . TABLE_PREFIX . "users (";
            foreach ( $data as $key => $field ) {
                if ( 'save_user' != $key ){
                    $fields[] = $key;
                }
            }
            $query .= implode(',', $fields);
            $query .= ") VALUES (";
            foreach ( $data as $key => $field ) {
                if ( 'save_user' != $key ){
                    $values[] = "'" . $field . "'";
                }
            }
            $query .= implode(',', $values);
            $query .= ")";
            
        }
        
        $database->query($query);
        if( !$database->error ){
            $_SESSION['message'] .= 'Los cambios se han guardado con éxito.';
            return true;
        }
        return $database->error;
        
    }
}

function lec_generate_password( $length = 16, $special_chars = true, $extra_special_chars = false ) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    if ( $special_chars ) {
        $chars .= '!@#$%^&*()';
    }
    if ( $extra_special_chars ) {
        $chars .= '-_ []{}<>~`+=,.;:/?|';
    }

    $password = '';
    for ( $i = 0; $i < $length; $i++ ) {
        $password .= substr( $chars, rand( 0, strlen( $chars ) - 1 ), 1 );
    }
    return $password;
}
<?php 
// funcion Obtener todos los posts
function get_posts(){
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
        $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE post_type='post' ORDER BY ID DESC";
    }else{
        $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE post_type='post' ORDER BY ID DESC LIMIT " . $posts_per_page;
    }
    return $database->query( $query );

}

// funcion Obtener todos los posts ordenados por $orden
function get_posts_ordered($order = 'ASC', $by = 'post_date'){
    global $database;
    $query = "SELECT * FROM '" . TABLE_PREFIX . "posts' ORDER BY " . $by ." " . $order;
    $results = $database->query( $query );
    return $results;
}

// funcion Obtener post por ID
function get_post_by_ID($id){
    global $database;
    $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE ID = " . $id;
    return $database->query( $query );
}

// funcion Guardar el post
function save_form($data){    
    global $database;
    if (!$data) {
        return false;
    }else{
        $query = '';
        if ( isset ( $_GET['id'] ) ){
            // UPDATE
            $query .= "UPDATE " . TABLE_PREFIX . "posts SET ";

            foreach ( $data as $key => $field ) {
                if ( 'save_form' != $key ){
                    /*
                    if ( isset($_POST['post_category']) && $key == 'post_category'){
                        $field = serialize($field);
                    }
                    */
                    $fields[] = $key . "='" . $database->real_escape_string($field) . "'";
                }
            }
            $query .= implode(',', $fields);
            $query .= " WHERE ID='". $_GET['id'] ."'";
        
        }else{
            // INSERT
            $fields = $values = array();
            $query .= "INSERT INTO " . TABLE_PREFIX . "posts (";
            $query .= 'post_author,';
            foreach ( $data as $key => $field ) {
                if ( 'save_form' != $key ){
                    $fields[] = $key;
                }
            }
            $query .= implode(',', $fields);
            $query .= ") VALUES (";
            // Value for post author
            $query .= "1,";
            foreach ( $data as $key => $field ) {
                if ( 'save_form' != $key ){
                    // If is adding caregories
                    /*
                    if ( isset($_POST['post_category']) && $key == 'post_category'){
                        $field = serialize($field);
                    }
                    */
                    if ( isset($_POST['post_content']) && $key == 'post_content'){
                        $field = $database->real_escape_string($field);
                    }
                    $values[] = "'" . $field . "'";
                }
            }
            $query .= implode(',', $values);
            $query .= ")";
            
        }
        
        $database->query($query);
        
        if( !$database->error ){
            return true;
        }
        return $database->error;
        
    }
}

// funcion Obtener todos los posts
function get_pages(){
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
        $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE post_type='page' ORDER BY ID DESC";
    }else{
        $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE post_type='page' ORDER BY ID DESC LIMIT " . $posts_per_page;
    }
    return $database->query( $query );

}
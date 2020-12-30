<?php 

// funcion Obtener todos los posts
function get_posts($database){
    $query = "SELECT * FROM ".TABLE_PREFIX."posts ORDER BY ID DESC";
    return $database->query( $query );

}

// funcion Obtener todos los posts ordenados por $orden
function get_posts_ordered($database, $order = 'ASC', $by = 'post_date'){
    $query = "SELECT * FROM '" . TABLE_PREFIX . "posts' ORDER BY " . $by ." " . $order;
    $results = $database->query( $query );
    return $results;
}

// funcion Obtener post por ID
function get_post_by_ID($database, $id){
    $query = "SELECT * FROM ".TABLE_PREFIX."posts WHERE ID = " . $id;
    return $database->query( $query );

}

// funcion Guardar el post
function save_form($database, $data){
    if (!$data) {
        return false;
    }else{
        $query = '';
        if ( isset ( $_GET['id'] ) ){
            // UPDATE
            $query .= "UPDATE " . TABLE_PREFIX . "posts SET ";

            foreach ( $data as $key => $field ) {
                if ( 'save_form' != $key ){
                    if ( isset($_POST['post_category']) && $key == 'post_category'){
                        $field = serialize($field);
                    }
                    $fields[] = $key . "='" . $field . "'";
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
            $query .= "'1',";
            foreach ( $data as $key => $field ) {
                if ( 'save_form' != $key ){
                    // If is adding caregories
                    if ( isset($_POST['post_category']) && $key == 'post_category'){
                        $field = serialize($field);
                    }
                    $values[] = "'" . $field . "'";
                }
            }
            $query .= implode(',', $values);
            $query .= ")";
            
        }
        //echo $query;
        
        $database->query($query);
        if( !$database->error ){
            return true;
        }
        return $database->error;
        
    }
}
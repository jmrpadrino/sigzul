<?php 

// funcion Obtener todos los posts
function get_categories(){
    global $database;
    $query = "SELECT * FROM ".TABLE_PREFIX."terms ORDER BY term_title ASC";
    return $database->query( $query );

}
// funcion Obtener todos los posts
function get_categories_array(){
    global $database;
    $categories = array();
    $query = "SELECT * FROM ".TABLE_PREFIX."terms ORDER BY term_title ASC";
    while($row = $database->query( $query )){
        $categories[$row['ID']] = $row['term_title'];
    };
    return $categories;
}
// funcion Obtener todos los posts
function get_term_by_ID($id = ''){
    global $database;
    $query = "SELECT * FROM ".TABLE_PREFIX."terms WHERE ID=" . $id;
    return $database->query( $query );
}
// Agregar y guardr cambios en categorias
function save_form_categories($data = ''){
    global $database;
    if (!$data) {
        return false;
    }else{
        $query = '';
        if ( isset ( $_GET['id'] ) ){
            // UPDATE
            $query .= "UPDATE " . TABLE_PREFIX . "terms SET ";

            foreach ( $data as $key => $field ) {
                if ( 'save_category_form' != $key ){
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
            $query .= "INSERT INTO " . TABLE_PREFIX . "terms (";
            foreach ( $data as $key => $field ) {
                if ( 'save_category_form' != $key ){
                    $fields[] = $key;
                }
            }
            $query .= implode(',', $fields);
            $query .= ") VALUES (";
            // Value for post author
            foreach ( $data as $key => $field ) {
                if ( 'save_category_form' != $key ){
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
<?php 
    global $database;
    if ( isset ( $_GET['do_table'] ) ) {
        $query = '';
        if ('TRUNCATE' == $_GET['t_action']){
            $query = 'TRUNCATE TABLE ' . $_GET['t_name'];
        }
        if ('DROP' == $_GET['t_action']){
            $query = 'DROP TABLE ' . $_GET['t_name'];
        }
        $database->query($query);
    }
?>

<div class="row">
    <div class="col">
        <h1><?php echo $view['title'] ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <h2>Tablas</h2>
    <?php
        $query = 'SHOW TABLES';
        $results = $database->query($query);
        while( $row = $results->fetch_assoc() ){
             echo $row['Tables_in_sigzul'] . '<br />';
        };
    ?>
    </div>
    <div class="col-md-9">
        <form action="?action=desktop">
            <label for="t_name">
                Tabla
                    <?php 
                        while( $row2 = $results->fetch_assoc() ){
                            echo 'aqui';
                            echo '<option value="'.$row2['Tables_in_sigzul'].'">'. $row2['Tables_in_sigzul'] . '</option>';
                        };
                    ?>
                <select name="t_name" requied>
                    <option>Seleccione</option>
                    <option value="lec_posts">POSTS</option>
                    <option value="lec_terms">CATEGORIAS</option>                    
                </select>
            </label>
            <label for="t_name">
                Acción
                <select name="t_action" required>
                    <option>Seleccione</option>
                    <option value="DROP">DROP</option>
                    <option value="TRUNCATE">TRUNCATE</option>
                </select>
            </label>
            <input type="submit" name="do_table" value="Ejecutar">
        </form>
    </div>
</div>
<?php global $database; ?>
<div class="row">
    <div class="col">
        <h1><?php echo $view['title'] ?></h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-2">
    <h2>Tablas</h2>
    <?php
        $query = 'SHOW TABLES';
        $results = $database->query($query);
        while( $row = $results->fetch_assoc() ){
             echo $row['Tables_in_sigzul'] . '<br />';
        };
    ?>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-sm-12">
                <form action="?action=execute_queries" method="post">
                    <h2>Query</h2>
                    <textarea class="form-control" id="q_name" name="query" placeholder="Use código SQL" rows="5" required></textarea>
                    <input class="mt-3" type="submit" name="do_query" value="Ejecutar">
                </form>
                <hr />
                <?php 
                    if (isset($_POST['do_query'])){ 
                        ?>
                <p><strong>Ejecutado:</strong> <?php echo $_POST['query']; ?></p>
                <br />
                <?php
                        $query = $_POST['query'];
                        $result = $database->query($query);
                        if (!$result){
                            echo 'Ha ocurrido un error. ' . $result->error();
                        }else{
                            while($row = $result->fetch_assoc()){
                                echo '<pre>';
                                var_dump($row);
                                echo '</pre>';
                            }
                        }
                ?>
                
                <?php } ?>
            </div>
        </div>
    </div>
</div>
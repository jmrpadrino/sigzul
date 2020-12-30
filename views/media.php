<div class="row">
    <div class="col-12">
        <h1><?php echo $view['title'] ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a class="btn btn-secondary collapsed" data-toggle="collapse" href="#addmedia" aria-expanded="false" aria-controls="addmedia">Agregar medios</a>
    </div>
    <div class="col-12 mt-4 mb-4">
        <form action="?action=media" method="post" enctype="multipart/form-data">
            <div class="collapse" id="addmedia" style="">
                <input id="featured_image" 
                    type="file" 
                    data-max-file-size="1M"
                    data-max-file-size-preview="1M"
                    data-height="250"
                    name="media_file" required>
                    <input class="btn btn-primary mt-4" type="submit" name="save_file" value="Guardar Medio">
            </div>
        </form>
    </div>
</div>
<div class="row">
<?php 
    $images_list = get_the_images_list();
    if(!count($images_list) > 0){
        echo 'No hay imagenes cargadas';
    }else{
        foreach($images_list as $image){
?>
    <div class="col-sm-12 col-md-6 mb-4">
        <div class="row">
            <div class="col-sm-3">
                <img alt="" class="img-fluid m-auto" src="<?php echo UPLOADS_PATH . $image; ?>">
            </div>
            <div class="col-sm-9">
                <h5><?php echo $image; ?></h5>
                <p><strong>URL</strong><br /><?php echo THEME_URL . UPLOADS_PATH . $image; ?></p>
            </div>
        </div>
    </div>
<?php
        } // End foreach
    } // End if
?>
</div>
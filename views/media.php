<style scoped>
    .remove-item {
        position: absolute;
        display: none;
        top: 10px;
        right: 10px;
        cursor:pointer;
        z-index: 9;
    }
    .remove-item .c-icon {
        font-size: 1.2rem!important;
        width: 1.2rem!important;
        height: 1.2rem!important;
    }
    .remove-item:hover { color: red; }
    .image-placeholder:hover { background: #e2e2e2; }
    .image-placeholder:hover .remove-item { display: block; }
</style>
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
<div class="row border-bottom">
    <div class="col-12">
        <nav aria-label="Page navigation example">
            <p><strong>Filtrar por inicial del nombre del archivo</strong></p>
            <ul class="pagination pagination-sm justify-content-start">
                <li class="page-item active" data-target="all"><a class="page-link" tabindex="-1">Todos</a></li>
                <?php for ($i = 0; $i < 10; $i++){ ?>
                <li class="page-item" data-target="group-<?php echo $i; ?>"><a class="page-link"><?php echo $i; ?></a></li>
                <?php } ?>
                <?php for ($i = 97; $i <= 122; $i++){ ?>
                <li class="page-item" data-target="group-<?php echo chr($i); ?>"><a class="page-link"><?php echo chr($i); ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8" style="min-height: 50vh; overflow-y: auto;">
        <div class="row">
        <?php 
            $images_list = get_the_images_list();
            if(!count($images_list) > 0){
                echo 'No hay imagenes cargadas';
            }else{
                foreach($images_list as $index => $image){
        ?>
            <div class="col-sm-2 d-flex justify-content-center align-items-center p-3 group group-<?php echo strtolower($image[0]); ?> image-placeholder">
            <div class="remove-item" title="Eliminar elemento" data-file="<?php echo $image; ?>"><svg class="c-icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use></svg></div>
                <label for="img_<?php echo $index; ?>">
                    <input class="featued_image_radio" id="img_<?php echo $index; ?>" type="radio" name="image_selected" value="<?php echo $image; ?>" data-name="<?php echo $image; ?>" data-url="<?php echo THEME_URL . UPLOADS_PATH . $image; ?>">
                    <img alt="" class="featured_image_image img-fluid m-auto border" src="<?php echo UPLOADS_PATH . $image; ?>">
                </label>
            </div>                            
        <?php
                } // End foreach
            } // End if
            ?>
        </div>                        
    </div>
    <div class="col-md-4 border-left">
        <div id="show_frame" class="sticky-top mt-3 mb-5"></div>
    </div>
</div>
<!--
<div class="row">
<?php 
    $images_list = get_the_images_list();
    if(!count($images_list) > 0){
        echo 'No hay imagenes cargadas';
    }else{
        foreach($images_list as $image){
?>
    <div class="col-sm-12 col-md-6 image-placeholder">
        <div class="remove-item" title="Eliminar elemento" data-file="<?php echo $image; ?>"><svg class="c-icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use></svg></div>
        <div class="row">
            <div class="col-sm-3 p-3">
                <img alt="" class="img-fluid m-auto" src="<?php echo UPLOADS_PATH . $image; ?>">
            </div>
            <div class="col-sm-9 p-3">
                <h5><?php echo $image; ?></h5>
                <p class="mb-0"><strong>URL</strong><br /><?php echo THEME_URL . UPLOADS_PATH . $image; ?></p>
            </div>
        </div>
    </div>
<?php
        } // End foreach
    } // End if
?>
</div>
-->

<div class="modal fade" id="mediamodal" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Imagen Destacada</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row border-bottom">
                    <div class="col-sm-12">
                        <nav aria-label="Page navigation example">
                            <p><strong>Filtrar por inicial del nombre del archivo</strong></p>
                            <ul class="pagination pagination-sm justify-content-start">
                                <li class="page-item active" data-target="all"><a class="page-link" tabindex="-1">Todos</a></li>
                                <?php for ($i = 0; $i < 10; $i++){ ?>
                                <li class="page-item" data-target="group-<?php echo $i; ?>"><a class="page-link"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <?php for ($i = 97; $i <= 122; $i++){ ?>
                                <li class="page-item" data-target="group-<?php echo chr($i); ?>"><a class="page-link"><?php echo chr($i); ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8" style="min-height: 50vh; overflow-y: auto;">
                        <div class="row">
                        <?php 
                            $images_list = get_the_images_list();
                            if(!count($images_list) > 0){
                                echo 'No hay imagenes cargadas';
                            }else{
                                foreach($images_list as $index => $image){
                        ?>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center p-3 group group-<?php echo strtolower($image[0]); ?>">
                                <label for="img_<?php echo $index; ?>">
                                    <input class="featued_image_radio" id="img_<?php echo $index; ?>" type="radio" name="image_selected" value="<?php echo $image; ?>" data-name="<?php echo $image; ?>" data-url="<?php echo THEME_URL . UPLOADS_PATH . $image; ?>">
                                    <img alt="" class="featured_image_image img-fluid m-auto border" src="<?php echo UPLOADS_PATH . $image; ?>">
                                </label>
                            </div>                            
                        <?php
                                } // End foreach
                            } // End if
                            ?>
                        </div>                        
                    </div>
                    <div class="col-md-4 border-left">
                        <div id="show_frame"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-ghost-danger" type="button" data-dismiss="modal">Cancelar</button>
                <button id="remove_image" class="btn btn-primary" type="button">Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
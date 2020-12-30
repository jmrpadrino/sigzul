<?php 
    $form_action = 'show_all_posts';
    if ( 'edit_post' == $_GET['action'] ){
        $form_action = 'edit_post&id=' . $_GET['id'];
    }
    $cats = array(
        array(
            'id' => 1,
            'name' => 'Escozul',
        ),
        array(
            'id' => 2,
            'name' => 'Historia',
        ),
        array(
            'id' => 3,
            'name' => 'Tratamientos',
        ),
        array(
            'id' => 4,
            'name' => 'Resultados',
        ),
        array(
            'id' => 5,
            'name' => 'Vidatox',
        ),
    )

?>
<form class="form-horizontal" action="?action=<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col">
            <h1><?php echo $view['title'] ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="form-group row">
                <div class="col-md-12">
                    <input class="form-control form-control-lg"
                        value="<?php echo (isset( $row['post_title'] ) ) ? $row['post_title'] : '' ; ?>"
                        class="form-control w-100" id="title" type="text" name="post_title"
                        placeholder="Titulo de la entrada" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <label class="mb-0" style="width: 25%;">URL: <?php echo SITE_URL; ?>/</label>
                    <input value="<?php echo (isset( $row['post_name'] ) ) ? $row['post_name'] : '' ; ?>"
                        class="form-control " id="slug" type="text" name="post_name" placeholder="post_name" readonly>
                        <?php if (isset( $row['post_name'] ) ) {?>
                            &nbsp;&nbsp;&nbsp;<button id="change_slug" class="btn btn-secondary" type="button">Editar</button>
                            <button id="change_slug_cancel" class="btn btn-link d-none">Cancelar</button>
                        <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea class="form-control w-100" id="content" name="post_content"
                        placeholder="Escriba aqui en contenido del post"><?php echo (isset( $row['post_content'] ) ) ? $row['post_content'] : '' ; ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><strong>Extracto</strong></div>
                <div class="card-body">
                    <textarea class="form-control w-100" name="post_excerpt" rows="5"
                        placeholder="Escriba aqui el resúmen"><?php echo (isset( $row['post_excerpt'] ) ) ? $row['post_excerpt'] : '' ; ?></textarea>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><strong>SEO</strong></div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Title Tag</label>
                        <div class="col-md-12">
                            <input
                                value="<?php echo (isset( $row['post_seo_title'] ) ) ? $row['post_seo_title'] : '' ; ?>"
                                class="form-control" type="text" name="post_seo_title" placeholder="Max. 70 caracteres">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Description Tag</label>
                        <div class="col-md-12">
                            <textarea class="form-control w-100" name="post_seo_desc"
                                placeholder="Max. 230 caracteres"><?php echo (isset( $row['post_seo_desc'] ) ) ? $row['post_seo_desc'] : '' ; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Keywords Tag</label>
                        <div class="col-md-12">
                            <textarea class="form-control w-100" name="post_seo_keywords"
                                placeholder="Max. 230 caracteres"><?php echo (isset( $row['post_seo_keywords'] ) ) ? $row['post_seo_keywords'] : 'Escozul, Escorpion Azul, Escoazul, Alacran Azul, Escozul y Vidatox, Escorpion Azul Cuba, Escozine, Alacran Azul Cuba, Obtener el Escozul, Veneno del Escorpion Azul, Escozul Cuba, Veneno del Alacran Azul' ; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Sobreescribir
                            <strong>Slug</strong></label>
                        <div class="col-md-12">
                            <input
                                value="<?php echo (isset( $row['post_seo_slug'] ) ) ? $row['post_seo_slug'] : '' ; ?>"
                                class="form-control" type="text" name="post_seo_slug">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">URL canónica</label>
                        <div class="col-md-12">
                            <input
                                value="<?php echo (isset( $row['post_seo_canonical'] ) ) ? $row['post_seo_canonical'] : '' ; ?>"
                                class="form-control" type="text" name="post_seo_canonical">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Schema (JSON format) <span
                                class="text-muted">más informacion <a href="https://schema.org/"
                                    target="_blank">aquí</a>.</span></label>
                        <div class="col-md-12">
                            <textarea id="schema"
                                name="post_seo_schema"><?php echo (isset( $row['post_seo_schema'] ) ) ? $row['post_seo_schema'] : '' ; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><strong>Categorías</strong></div>
                <div class="card-body">
                    <?php 

                    foreach($cats as $i => $cat){      
                        $cat_checked = '';
                        if(isset($row['post_category'])){
                            if(in_array($cat['id'], unserialize($row['post_category']))){
                                $cat_checked = 'checked';
                            }
                        }

                ?>
                    <div class="form-check checkbox">
                        <input id="cat_<?php echo $i; ?>" class="form-check-input" name="post_category[]" type="checkbox"
                            value="<?php echo $cat['id']; ?>" <?php echo $cat_checked;?>>
                        <label class="form-check-label" for="cat_<?php echo $i; ?>"><?php echo $cat['name']; ?></label>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><strong>Imagen destacada</strong></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="featured_image" type="hidden" name="post_featuredimage" value="<?php echo (isset($row['post_featuredimage'])) ? $row['post_featuredimage'] : ''; ?>">
                            <a href="#" data-toggle="modal" data-target="#mediamodal">
                                <img id="featured_image_placeholder" class="img-fluid mb-2" src="<?php echo (isset($row['post_featuredimage']) && !empty($row['post_featuredimage'])) ? $row['post_featuredimage'] : '/assets/img/no-thumbnail-post.jpg'; ?>">
                            </a>
                            <a href="#" data-toggle="modal" data-target="#mediamodal">Asignar imagen destacada</a>
                            <button id="clearFeaturedImage" class="btn btn-ghost-danger <?php echo (isset($row['post_featuredimage'])) ? '' : 'd-none'; ?>" onclick="clearFeaturedImageField()" type="button">Quitar imagen destacada</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong>Publicar</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Estado</label>
                        <div class="col-md-12">
                            <select class="form-control" name="post_status">
                                <option value="draft"
                                    <?php echo ( isset($row['post_status']) && 'draft' == $row['post_status'] ) ? 'selected' : ''?>>
                                    Borrador</option>
                                <option value="publish"
                                    <?php echo ( isset($row['post_status']) && 'publish' == $row['post_status'] ) ? 'selected' : ''?>>
                                    Publicado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Fecha de publicación</label>
                        <div class="col-md-12">
                            <input class="form-control" type="date" name="post_date"
                                value="<?php echo (isset( $row['post_date'] ) ) ? date('Y-m-d', strtotime($row['post_date'])) : date('Y-m-d') ; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" name="save_form"
                        type="submit"><?php echo (isset( $row['ID'] ) ) ? 'Actualizar' : 'Publicar' ; ?></button>&nbsp;&nbsp;
                    <a class="btn-link text-danger" href="/">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
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
                <button id="set_featured_image" class="btn btn-primary" type="button" disabled>Asignar como imagen destacada</button>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
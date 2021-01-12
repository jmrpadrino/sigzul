<?php 
    $form_action = 'categories';
    if ( 'edit_category' == $_GET['action'] ){
        $form_action = 'edit_category&id=' . $_GET['id'];
    }
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
                        value="<?php echo (isset( $row['term_title'] ) ) ? $row['term_title'] : '' ; ?>"
                        class="form-control w-100" id="title" type="text" name="term_title"
                        placeholder="Nombre de la categoría" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <label class="mb-0" style="width: 25%;">URL: <?php echo SITE_URL; ?>/</label>
                    <input value="<?php echo (isset( $row['term_name'] ) ) ? $row['term_name'] : '' ; ?>"
                        class="form-control " id="slug" type="text" name="term_name" placeholder="nombre-categoria" readonly>
                        <?php if (isset( $row['term_name'] ) ) {?>
                            &nbsp;&nbsp;&nbsp;<button id="change_slug" class="btn btn-secondary" type="button">Editar</button>
                            <button id="change_slug_cancel" class="btn btn-link d-none">Cancelar</button>
                        <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea class="form-control w-100" id="content" name="term_description"
                        placeholder="Escriba aqui en contenido del post" rows="14"><?php echo (isset( $row['term_description'] ) ) ? $row['term_description'] : '' ; ?></textarea>
                </div>
            </div>
            <!--
            <div class="card">
                <div class="card-header"><strong>SEO</strong></div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Title Tag</label>
                        <div class="col-md-12">
                            <input
                                value="<?php echo (isset( $row['term_seo_title'] ) ) ? $row['term_seo_title'] : '' ; ?>"
                                class="form-control" type="text" name="term_seo_title" placeholder="Max. 70 caracteres">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Description Tag</label>
                        <div class="col-md-12">
                            <textarea class="form-control w-100" name="term_seo_desc"
                                placeholder="Max. 230 caracteres"><?php echo (isset( $row['term_seo_desc'] ) ) ? $row['term_seo_desc'] : '' ; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Keywords Tag</label>
                        <div class="col-md-12">
                            <textarea class="form-control w-100" name="term_seo_keywords"
                                placeholder="Max. 230 caracteres"><?php echo (isset( $row['term_seo_keywords'] ) ) ? $row['term_seo_keywords'] : 'Escozul, Escorpion Azul, Escoazul, Alacran Azul, Escozul y Vidatox, Escorpion Azul Cuba, Escozine, Alacran Azul Cuba, Obtener el Escozul, Veneno del Escorpion Azul, Escozul Cuba, Veneno del Alacran Azul' ; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Sobreescribir
                            <strong>Slug</strong></label>
                        <div class="col-md-12">
                            <input
                                value="<?php echo (isset( $row['term_seo_slug'] ) ) ? $row['term_seo_slug'] : '' ; ?>"
                                class="form-control" type="text" name="term_seo_slug">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">URL canónica</label>
                        <div class="col-md-12">
                            <input
                                value="<?php echo (isset( $row['term_seo_canonical'] ) ) ? $row['term_seo_canonical'] : '' ; ?>"
                                class="form-control" type="text" name="term_seo_canonical">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Schema (JSON format) <span
                                class="text-muted">más informacion <a href="https://schema.org/"
                                    target="_blank">aquí</a>.</span></label>
                        <div class="col-md-12">
                            <textarea id="schema"
                                name="term_seo_schema"><?php echo (isset( $row['term_seo_schema'] ) ) ? $row['term_seo_schema'] : '' ; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><strong>Imagen destacada</strong></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="featured_image" type="hidden" name="term_featuredimage" value="<?php echo (isset($row['term_featuredimage'])) ? $row['term_featuredimage'] : ''; ?>">
                            <a href="#" data-toggle="modal" data-target="#mediamodal">
                                <img id="featured_image_placeholder" class="img-fluid mb-2" src="<?php echo (isset($row['term_featuredimage']) && !empty($row['term_featuredimage'])) ? $row['term_featuredimage'] : '/assets/img/no-thumbnail-post.jpg'; ?>">
                            </a>
                            <a href="#" data-toggle="modal" data-target="#mediamodal">Asignar imagen destacada</a>
                            <button id="clearFeaturedImage" class="btn btn-ghost-danger <?php echo (isset($row['term_featuredimage'])) ? '' : 'd-none'; ?>" onclick="clearFeaturedImageField()" type="button">Quitar imagen destacada</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong>Publicar</strong>
                </div>
                <div class="card-body">
                    <button class="btn btn-sm btn-primary" name="save_category_form"
                        type="submit"><?php echo (isset( $row['ID'] ) ) ? 'Actualizar' : 'Publicar' ; ?></button>&nbsp;&nbsp;
                    <a class="btn-link text-danger" href="/">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
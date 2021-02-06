<?php 
    $show_edit_btn = false;
    $form_action = 'show_all_users';
    $password = lec_generate_password();
    if ( 'edit_user' == $_GET['action'] ){
        $form_action = 'edit_user&id=' . $_GET['id'];
        $show_edit_btn = true;
    }
?>
<form class="form-horizontal" action="?action=<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col">
            <h1><?php echo $view['title'] ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="form-group row">
                <div class="col-md-12">
                    <input class="form-control form-control-lg"
                        value="<?php echo (isset( $row['user'] ) ) ? $row['user'] : '' ; ?>"
                        class="form-control w-100" id="title" type="text" name="user"
                        placeholder="Usuario" required>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><strong>Datos</strong></div>
                <div class="card-body">
                    <label for="content"><b>Correo Electrónico</b></label>
                    <input class="form-control" name="email" value="<?php echo (isset( $row['email'] ) ) ? $row['email'] : '' ; ?>" required>
                    <?php if(!isset($_GET['id'])){ ?>
                    <label for="content"><b>Contraseña</b></label>
                    <input class="form-control" name="pass" value="<?php echo $password; ?>" required>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header"><strong>Nivel</strong></div>
                <div class="card-body">
                    <?php 

                        $levels = get_users_levels();
                        $item = 0;
                        foreach ($levels as $level){
                            $level_checked = '';
                            if ( isset($row['capabilities'])){
                                if( $row['capabilities'] == strtolower($level)){
                                    $level_checked = 'checked';
                                }
                            }
                    ?>
                    <div class="form-check checkbox">
                        <input id="cat_<?php echo $level; ?>" class="form-check-input" name="capabilities" type="radio"
                            value="<?php echo strtolower($level); ?>" <?php echo $level_checked;?> <?php echo ($item == 0 && !(isset($_GET['id']))) ? 'required' : ''; ?>>
                        <label class="form-check-label" for="cat_<?php echo $level; ?>"><?php echo $level; ?></label>
                    </div>
                    <?php $item++; } ?>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" name="save_user"
                        type="submit"><?php echo (isset( $row['ID'] ) ) ? 'Actualizar' : 'Publicar' ; ?></button>&nbsp;&nbsp;
                    <a class="btn-link text-danger" href="/">Cancelar</a>
                </div>
            </div>
            <?php if(isset($_GET['id'])){ ?>
            <div class="card">
                <div class="card-header"><strong>Seguridad</strong></div>
                <div class="card-body">
                    <label for="content"><b>Reestablecer contraseña</b></label>
                    <a class="btn btn-sm btn-danger" href="/">Resetear</a>
                    
                </div>
            </div>
            <?php } ?>
            <!--
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
            -->
        </div>
    </div>
</form>
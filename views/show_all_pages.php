<?php
    $results = get_pages();
    if ( !$results->num_rows > 0 ) {
        $message .= 'No hay existen registros. Haga clic <a href="?action=add_new_page">aqui</a> para <strong>Añadir una entrada nueva</strong>.';
    }
?>
<div class="row">
    <div class="col-12">
        <h1><?php echo $view['title'] ?></h1>
        <a class="btn btn-sm btn-primary" href="?action=add_new_page">Añadir nueva</a>
    </div>
    <div class="col-12">
        <p><?php echo $message; ?>
    </div>
</div>

<?php if ( $results->num_rows > 0 ) { ?>
<div class="row">
    <div class="col-12">    
        <p class="text-danger"><strong>Hacer Barra de utilidades</strong></p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-responsive-sm table-striped">
            <thead>
                <tr>
                <th width="50">
                        <svg width="18" height="18" alt="CoreUI Logo">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-image"></use>
                        </svg>
                    </th>
                    <th>Título</th>
                    <th width="100">Fecha</th>
                    <th width="100">Autor</th>
                    <th width="50">SEO</th>
                    <th width="18"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $results->fetch_assoc() ){ ?>
                <?php //ecopre($row); ?>
                <tr>
                    <td><?php 
                        if($row['post_featuredimage']){
                    ?>
                        <svg width="18" height="18" alt="CoreUI Logo">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-image"></use>
                        </svg>
                    <?php }else{ ?>
                        <svg width="18" height="18" alt="CoreUI Logo">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-image-broken"></use>
                        </svg>
                    <?php } ?></td>
                    <td>
                        <a href="?action=edit_page&id=<?php echo $row['ID']; ?>" title="Editar"><strong><?php echo $row['post_title']; ?></strong></a> <?php if ('draft' == $row['post_status']){ ?>- <span class="text-muted">Borrador</span><?php } ?> 
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($row['post_date'])); ?></td>
                    <td><?php 
                        foreach($users_list as $user){
                            if($row['post_author'] == $user['ID']){
                                echo $user['user'];
                                break;
                            }
                        }
                    ?></td>
                    <td>
                        <?php 
                            $puntos = 0;
                            if(strlen(trim($row['post_seo_title'])) > 0){
                                $puntos++;
                            }
                            if(strlen(trim($row['post_seo_desc'])) > 0){
                                $puntos++;
                            }
                            if(strlen(trim($row['post_seo_slug'])) > 0){
                                $puntos++;
                            }
                            if(strlen(trim($row['post_seo_keywords'])) > 0){
                                $puntos++;
                            }
                            if(strlen(trim($row['post_seo_canonical'])) > 0){
                                $puntos++;
                            }
                            if(strlen(trim($row['post_seo_schema'])) > 0){
                                $puntos++;
                            }

                            $badge = 'danger';
                            $color = 'white';
                            if($puntos >= 5){
                                $badge = 'success';
                            }
                            if($puntos < 5 && $puntos > 2){
                                $badge = 'warning';
                                $color = 'black';
                            }
                        ?>
                        <span class="badge badge-<?php echo $badge; ?> text-<?php echo $color; ?>">SEO</span>
                    </td>
                    <td>
                        <a class="text-danger" title="Eliminar" href="?action=trash_post&id=<?php echo $row['ID']; ?>">
                            <svg width="18" height="18" alt="CoreUI Logo">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                            </svg>
                        </a>
                    </td>
                </tr>        
            <?php } ?>
            <tbody>
        </table>
    </div>
</div>
<?php if ( !$results->num_rows / 1 >= 1 ) { ?>
<div class="row">
    <div class="col-12">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
        </ul>
    </div>
</div>
<?php } ?>
<?php } ?>
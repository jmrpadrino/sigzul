<?php
    $results = get_posts($database);
    if ( !$results->num_rows > 0 ) {
        $message .= 'No hay existen registros. Haga clic <a href="?action=add_new_post">aqui</a> para <strong>Añadir una entrada nueva</strong>.';
    }
?>
<div class="row">
    <div class="col-12">
        <h1><?php echo $view['title'] ?></h1>
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
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>
                        <svg width="18" height="18" alt="CoreUI Logo">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-image"></use>
                        </svg>
                    </th>
                    <th>Autor</th>
                    <th>Categorías</th>
                    <th>SEO</th>
                    <th width="18"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $results->fetch_assoc() ){ ?>
                <?php //ecopre($row); ?>
                <tr>
                    <td>
                        <a href="?action=edit_post&id=<?php echo $row['ID']; ?>" title="Editar"><strong><?php echo $row['post_title']; ?></strong></a>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($row['post_date'])); ?></td>
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
                    <td><?php echo ($row['post_author'] == 1) ? 'Admin': 'Consultar en DB'; ?></td>
                    <td><?php 
                        $categories = unserialize($row['post_category']);
                        echo implode(', ', $categories);
                    ?></td>
                    <td>
                        <span class="badge badge-success">SEO</span>
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
<?php if ( !$results->num_rows > 10 ) { ?>
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
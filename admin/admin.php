<?php include 'admin/sidebar.php'; ?>
<div class="c-wrapper c-fixed-components">
    <?php include 'admin/navigation.php'; ?>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php if( $message ): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Información!</strong> <?php echo $message; ?>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
                <?php 
                    if ( isset( $_GET['action'] ) ){
                        include 'views/' . $_GET['action'] . '.php';
                    }else{
                        include 'views/desktop.php';
                    }
                ?>
            </div>
        </main>
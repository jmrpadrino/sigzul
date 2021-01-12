<?php 
    include 'config.php';
    global $database;
    // obtener el post de la DB
    $query = 'SELECT * FROM lec_posts WHERE ID=' . $_GET['id'];
    $post = $database->query($query);

    while($row = $post->fetch_assoc()){
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <title>Título</title>

    <meta name="description" content="¿El cáncer que es? su impacto en nuestra vida. Que hacer y que tratamientos llevar. Como se origina 
    el cáncer. Entendiendo el cáncer. Como combatirlo." />

    <meta name="keywords" content="Escozul, Escorpion Azul, Escoazul, Alacran Azul, Escozul y Vidatox, Escorpion Azul Cuba, Escozine, Alacran Azul Cuba, Obtener el Escozul, Veneno del Escorpion Azul, Escozul Cuba, Veneno del Alacran Azul" />    

    <meta property="og:image" content="/images/blog-que-es-el-cancer.png" />
    <meta property="og:image:secure_url" content="/images/blog-que-es-el-cancer.png" />
    
    <link rel="canonical" href="https://escozul-cuba.com/que-es-el-cancer/" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://escozul-cuba.com/css/main.css" async>
    <link rel="stylesheet" href="https://escozul-cuba.com/css/custom-styles.css" async>

</head>

<body>
    <div class="page text-center bg-alabaster"> 
        <div class="container page-main">
            <div class="row">
                <div class="col-sm-12 col-md-8 page-main-content">
                    <div class="row">
                        <div class="col-sm-12 mb-5">
                            <h1 class="page-title"><?php echo $row['post_title']; ?></h1>
                            <p class="page-summary"><?php echo $row['post_excerpt']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (!empty($row['post_featuredimage'])){ ?>
                            <img class="img-responsive page-thumbnail" src="<?php echo $row['post_featuredimage']; ?>" alt="LifEscozul&reg;">
                            <?php } ?>
                            <?php echo $row['post_content']; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 page-sidebar">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="http://placehold.it/320x600?text=Sidebar" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>

</html>
<?php } // END WHILE ?>
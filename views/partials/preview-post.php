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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://escozul-cuba.com/css/main.css" async>
    <link rel="stylesheet" href="https://escozul-cuba.com/css/custom-styles.css" async>
    <style>
        .page-main-content p { text-indent: 0; }
        .page-main-content img { 
            width: 100%;
            margin: 100px 0; 
            height: 100%;
            border-radius: 12px;
            box-shadow: 0 28px 50px -10px rgba(0, 0, 0, 0.1);
        }
        .page-main-content hr {
            width: 100%;
            height: 2px;
            margin: 100px 40px 60.2px 0;
            opacity: 0.4;
            background-color: #e5e5e5;
        }
    </style>
</head>

<body>
    <div class="page text-center bg-alabaster"> 
        <div class="container page-main">
            <div class="row">
                <div class="col-sm-12 col-md-8 page-main-content">
                    <div class="row">
                        <div class="col-sm-12 mb-5">
                            <h1 class="bg-gradient-blue fs-28 uppercase ta-c mb-3"><?php echo $row['post_title']; ?></h1>
                            <p class="page-summary"><?php echo $row['post_init_text']; ?></p>
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
<?php

// Obtener vista
$view = get_view_data();

// Enrutado de vistas
function get_view_data(){
    // información general de la vista.
    $views = array(
        'no_content' => array(
            'title' => 'No Existe',
            'slug' => '',
            'short_title' => 'Sin contenido'
        ),
        'desktop' => array(
            'title' => 'Escritorio',
            'slug' => '',
            'short_title' => ''
        ),
        'execute_queries' => array(
            'title' => 'Manejo de los datos',
            'slug' => 'execute_queries',
            'short_title' => 'Base de datos'
        ),
        'show_all_posts' => array(
            'title' => 'Todas las entradas',
            'slug' => 'show_all_posts',
            'short_title' => 'Entradas'
        ),
        'add_new_post' => array(
            'title' => 'Añadir una nueva entrada',
            'slug' => 'add_new_post',
            'short_title' => 'Añadir Entrada'
        ),
        'edit_post' => array(
            'title' => 'Editar una entrada',
            'slug' => 'edit_post',
            'short_title' => 'Editar Entrada'
        ),
        'show_all_pages' => array(
            'title' => 'Todas las páginas',
            'slug' => 'show_all_pages',
            'short_title' => 'Páginas'
        ),
        'add_new_page' => array(
            'title' => 'Añadir una nueva página',
            'slug' => 'add_new_page',
            'short_title' => 'Añadir Página'
        ),
        'edit_page' => array(
            'title' => 'Editar una página',
            'slug' => 'edit_page',
            'short_title' => 'Editar Página'
        ),
        'show_all_terms' => array(
            'title' => 'Términos para la Wiki',
            'slug' => 'show_all_terms',
            'short_title' => 'Terminos'
        ),
        'add_new_term' => array(
            'title' => 'Agregar nuevo término',
            'slug' => 'add_new_term',
            'short_title' => 'Agregar Término'
        ),
        'show_all_lifescozul_results' => array(
            'title' => 'Todos los resultados de LifEscozul',
            'slug' => 'show_all_lifescozul_results',
            'short_title' => 'Resultados'
        ),
        'add_new_lifescozul_result' => array(
            'title' => 'Agregar nuevo resultado',
            'slug' => 'add_new_lifescozul_result',
            'short_title' => 'Agregar Resultado'
        ),
        'show_all_escozul_results' => array(
            'title' => 'Todos los resultados de Escozul',
            'slug' => 'show_all_escozul_results',
            'short_title' => 'Resultados'
        ),
        'add_new_escozul_result' => array(
            'title' => 'Agregar nuevo resultado',
            'slug' => 'add_new_lifescozul_result',
            'short_title' => 'Agregar Resultado'
        ),
        'show_all_timeline_results' => array(
            'title' => 'Todos los resultados Timeline',
            'slug' => 'show_all_timeline_results',
            'short_title' => 'Resultados'
        ),
        'add_new_timeline_result' => array(
            'title' => 'Agregar nuevo resultado',
            'slug' => 'add_new_timeline_result',
            'short_title' => 'Agregar Resultado'
        ),
        'cancer' => array(
            'title' => 'Agregar y Eliminar tipos de Cáncer',
            'slug' => 'cancer',
            'short_title' => 'Tipos de Cáncer'
        ),
        'categories' => array(
            'title' => 'Agregar y Eliminar Categorías',
            'slug' => 'categories',
            'short_title' => 'Categorías'
        ),
        'add_new_category' => array(
            'title' => 'Añadir una categoría',
            'slug' => 'add_new_category',
            'short_title' => 'Añadir categoría'
        ),
        'edit_category' => array(
            'title' => 'Editar una categoría',
            'slug' => 'edit_category',
            'short_title' => 'Editar categoría'
        ),
        'media' => array(
            'title' => 'Agregar y Eliminar elementos multimedia',
            'slug' => 'media',
            'short_title' => 'Medios'
        ),
        'show_all_users' => array(
            'title' => 'Usuarios',
            'slug' => 'show_all_users',
            'short_title' => 'Usuarios'
        ),
        'add_new_user' => array(
            'title' => 'Añadir Usuario',
            'slug' => 'add_new_user',
            'short_title' => 'Añadir Usuario'
        ),
        'edit_user' => array(
            'title' => 'Editar Usuario',
            'slug' => 'edit_user',
            'short_title' => 'Editar Usuario'
        ),
    );
    
    if( isset($_GET['action']) ) {
        if (array_key_exists($_GET['action'], $views)){
            return $views[$_GET['action']];
        }else{
            return $views['no_content'];
        }
    }
    return $views['desktop'];

}

/**
 * Enqueue header and footer scripts
 *
 * @return void
 */
function enqueue_header_scripts(){
    $action = '';
    if ( isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if ( 
        'media' == $action
    ){ 
?>
        <link href="vendors/dropify/dropify.min.css" rel="stylesheet">
<?php
    }

    if ( 
        'add_new_post' == $action ||
        'edit_post' == $action ||
        'add_new_page' == $action ||
        'edit_page' == $action
    ){ 
?>
    <link href="vendors/codemirror/codemirror.css" rel="stylesheet">
    <script src="vendors/codemirror/codemirror.js"></script>
    <script src="vendors/codemirror/mode/javascript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js" integrity="sha512-sOO7yng64iQzv/uLE8sCEhca7yet+D6vPGDEdXCqit1elBUAJD1jYIYqz0ov9HMd/k30e4UVFAovmSG92E995A==" crossorigin="anonymous"></script>
    <script>
        var templates = [
                    { 
                        title: 'Subtitulo H2 naranja/subrayado', 
                        description: 'Alineado a la izquierda y subrayado (Naranja)', 
                        content: '<h2 class="quote-styled ta-r">Cambiar_este_texto</h2>' 
                    },
                    { 
                        title: 'Subtitulo H2 naranja/centro', 
                        description: 'Alineado al centro (Naranja)', 
                        content: '<h2 class="text-orange ta-c fs-24">Cambiar_este_texto</h2>' 
                    },
                    { 
                        title: 'Subtitulo H2 naranja-gradiente/centro', 
                        description: 'Alineado al centro (Naranja gradiente)', 
                        content: '<h2 class="bg-gradient-orange uppercase ta-c fs-24">Cambiar_este_texto</h2>' 
                    },
                    { 
                        title: 'Subtitulo H2 Azul/centro', 
                        description: 'Alineado al centro (azul)', 
                        content: '<h2 class="text-blue-main uppercase ta-c fs-20">Cambiar_este_texto</h2>' 
                    },
                ];
        tinymce.init(
            {
                selector:'#content',
                height: 800,
                language: 'es',
                language_url : '/langs/es.js',
                menubar: 'file edit view insert template format tools table tc help',
                contextmenu: 'link image imagetools table configurepermanentpen insert template',
                //toolbar: 'template',
                templates: templates,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor table',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount template hr importcss'
                ],
                content_css : '/css/tiny-custom-styles.css',
                relative_urls : false,
                remove_script_host : false,
                importcss_append: true
            }
        );
        tinymce.init(
            {
                selector:'#post_init_text',
                height: 300,
                language: 'es',
                language_url : '/langs/es.js',
                menubar: 'file edit view insert format templates tools tc help',
                contextmenu: 'link configurepermanentpen',
                templates: templates,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor table',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount template'
                ],
                content_css : '/css/tiny-custom-styles.css',
                relative_urls : false,
                remove_script_host : false,
            }
        );
    </script>
<?php 
    } // End if action add_new_post
} // End enqueue_header_scripts

function enqueue_footer_scripts(){
?>
    <script>
        // Javascript global vars
        var sigzul_vars = {
            'ajax_url'      : '<?php echo THEME_URL; ?>/config/admin-ajax.php',
            'site_url'      : '<?php echo THEME_URL; ?>',
            'media_url'     : '<?php echo UPLOADS_PATH; ?>'
        }
    </script>
<?php 
    $action = '';
    if ( isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if ( 
        'media' == $action
    ){
?>
    <script src="vendors/dropify/dropify.min.js"></script>
    <script>
        jQuery(document).ready(function(){
            $('#featured_image').dropify({
                error: {
                    'fileSize': 'El archivo es muy grande ({{ value }} max).',
                    'imageFormat': 'Formato de imagen no permitido ({{ value }}).'
                },
                messages: {
                    default: 'Arrastre y suelte el archivo aqui',
                    replace: 'Arrastre y suelte un archivo o haga clic para reemplazar',
                    remove:  'Quitar',
                    error:   'Hubo un error inesperado',
                }
            });
        })
    </script>
<?php
    }

    if ( 
        'add_new_post' == $action ||
        'edit_post' == $action ||
        'add_new_page' == $action ||
        'edit_page' == $action
    ){ 
?>
<script>
    window.onload = function() {
        editor = CodeMirror.fromTextArea(document.getElementById("schema"), {
            mode: "javascript",
            lineNumbers: true,
            //value: document.documentElement.innerHTML
        });
    };
    jQuery(document).ready(function(){
        console.log('listo')
        /*
        $('#featured_image').dropify({
            error: {
                'fileSize': 'El archivo es muy grande ({{ value }} max).',
                'imageFormat': 'Formato de imagen no permitido ({{ value }}).'
            },
            messages: {
                default: 'Arrastre y suelte el archivo aqui',
                replace: 'Arrastre y suelte un archivo o haga clic para reemplazar',
                remove:  'Quitar',
                error:   'Hubo un error inesperado',
            }
        });
        */
    })
</script>
<?php 
    } // End if action add_new_post
} // End enqueue_footer_scripts


// Helpers usuario
function ecopre( $var = ''){
    echo '<pre>';
    var_dump( $var );
    echo '</pre>';
}
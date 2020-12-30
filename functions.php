<?php
// Incluir configuraciones
include 'config.php';

// Obtener vista
$view = get_view_data();

// Enrutado de vistas
function get_view_data(){
    // información general de la vista.
    $views = array(
        'desktop' => array(
            'title' => 'Escritorio',
            'slug' => '',
            'short_title' => ''
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
    );
    
    if( isset($_GET['action']) ) {
        return $views[$_GET['action']];
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
        'edit_post' == $action
    ){ 
?>
    <link href="vendors/codemirror/codemirror.css" rel="stylesheet">
    <script src="vendors/codemirror/codemirror.js"></script>
    <script src="vendors/codemirror/mode/javascript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js" integrity="sha512-sOO7yng64iQzv/uLE8sCEhca7yet+D6vPGDEdXCqit1elBUAJD1jYIYqz0ov9HMd/k30e4UVFAovmSG92E995A==" crossorigin="anonymous"></script>
    <script>
        tinymce.init(
            {
                selector:'#content',
                height: 500,
                language: 'es',
                language_url : '/langs/es.js',
                menubar: 'file edit view insert format tools table tc help',
                contextmenu: 'link image imagetools table configurepermanentpen',
                templates: [
                    { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                ],
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor table',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
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
            'ajax_url'      : '',
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
        'edit_post' == $action
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
        $('#title').focusout(function(){
            var slug = '';
            slug = generateSlug($(this).val());
            $('#slug').val(slug);
        })
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
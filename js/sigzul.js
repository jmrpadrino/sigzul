$(document).ready(function(){  
    var featuredImageUrl = '';
    var slug_input = $('#slug').val(); 
    // Para la fecha del sistema
    setInterval(function(){ 
        var now = new Date();
        $('#current_date').html(now);
    }, 1000);

    // Para las imagenes destacadas 
    $('.featued_image_radio').click(function(){
        var element = $(this);
        var html = '';
        html += '<img class="img-fluid" src="'+ element.data('url') +'">';
        html += '<p><strong>' + element.data('name') + '</strong></p>';
        html += '<input class="form-control w-100 mb-3" id="image_selected_url" type="text" value="'+ element.data('url') +'" readonly>';        
        $('#show_frame').html('');
        $('#show_frame').append(html);
        $('#set_featured_image').removeAttr('disabled');
        featuredImageUrl = element.data('url');
    })
    $('#set_featured_image').click(function (e) {
        $('#featured_image').val(featuredImageUrl);
        $('#featured_image_placeholder').attr('src', featuredImageUrl);
        $('#clearFeaturedImage').removeClass('d-none');
        $('#mediamodal').modal('hide');
    });

    // Navegacion del modal de medios
    $('.page-item').click( function(){
        var grupo = $(this).data('target');
        if ('all' != grupo){
            $('div.group').removeClass('d-flex');
            $('div.group').addClass('d-none');
            $('div.'+grupo).addClass('d-flex');
        }else{
            $('div.group').addClass('d-flex');
            $('div.group').removeClass('d-none');
        }
        $('.page-item').removeClass('active');
        $(this).addClass('active');
        
    })

    // Creción del Slug
    $('#title').focusout(function(){
        if( '' == $('#slug').val() ){
            generateSlug($(this).val());
        }
    })

    // activar Cambio de Slug
    $('#change_slug').click(function(){
        $('#slug').removeAttr('readonly').focus();
        if($(this).text() == 'Editar'){
            $(this).text('Guardar');
        }else{
            if($('#slug').val() != slug_input){
                generateSlug($('#slug').val());
            }
            $('#slug').attr('readonly', true);
            $(this).text('Editar').focus();
        }
    })

    /**
     * Eliminar imagen permanentemente
     */
    $('.remove-item').click( function() {
        var resp = confirm('¿Si esta de acuerdo con ELIMINAR la imagen "'+ $(this).data('file') +'"?');
        var item = $(this);
        if( true === resp ){
            $.ajax({
                url: sigzul_vars.ajax_url,
                data: {
                    action: 'remove_media',
                    data: $(this).data('file')
                },
                beforeSend: function(){
                },
                success: function(response){
                    if('false' == response){
                        alert('No se ha podido eliminar el archivo.');
                    }else{
                        $('#show_frame').html('');
                        item.parents('.image-placeholder').remove();
                    }
                    
                }, 
                error: function(a,b){
                    console.log(a);
                    console.log(b);
                }
            })
        }
    })
})

function clearFeaturedImageField(){
    $('#featured_image_placeholder').attr('src', sigzul_vars.site_url+'/assets/img/no-thumbnail-post.jpg');
    $('#featured_image').val('');
    $('#clearFeaturedImage').addClass('d-none');
}

function generateSlug (str) {
    if (str.length > 0){
        var slug;
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
    
        // remove accents, swap ñ for n, etc
        var from = "ÁàáãäâÉèéëêÍìíïîÓòóöôÚùúüûÑñç·/_,:;";
        var to   = "aaaaaaeeeeeiiiiiooooouuuuunnc------";

        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        // Consultar en la base de datos si existe via AJAX
        $.ajax({
            url: sigzul_vars.ajax_url,
            data: {
                action: 'validar_slug',
                data: str
            },
            success: function(response){ 
                slug = response;
                $('#slug').val(slug);
            }
        });
    }
};
$(document).ready(function(){  
    var featuredImageUrl = '';  
    $('.featued_image_radio').click(function(){
        var element = $(this);
        var html = '';
        html += '<img class="img-fluid" src="'+ element.data('url') +'">';
        html += '<p><strong>' + element.data('name') + '</strong></p>';
        html += '<input class="form-control w-100 mb-3" id="image_selected_url" type="text" value="'+ element.data('url') +'" readonly>';
        html += '<a class="text-danger" href="?action=media&remove='+element.data('name')+'">Eliminar permanentemente</a>';
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
})

function clearFeaturedImageField(){
    $('#featured_image_placeholder').attr('src', sigzul_vars.site_url+'/assets/img/no-thumbnail-post.jpg');
    $('#featured_image').val('');
    $('#clearFeaturedImage').addClass('d-none');
}

function generateSlug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "ÁàáãäâÉèéëêÍìíïîÓòóöôÚùúüûñç·/_,:;";
    var to   = "aaaaaaeeeeeiiiiiooooouuuuunc------";

    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
};
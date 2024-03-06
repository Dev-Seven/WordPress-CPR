(function ($) {

	"use strict";

	$(window).on('load', function () {
		$('[data-loader="circle-side"]').fadeOut(); // will first fade out the loading animation
		$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(350);
		$(window).scroll();
	});

	// Lazy load images
	var lazyLoadInstance = new LazyLoad({
	    elements_selector: ".lazy"
	});

	// Sticky nav
	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 1) {
			$('.element_to_stick').addClass("sticky");
		} else {
			$('.element_to_stick').removeClass("sticky");
		}
	});
	$(window).scroll();

	// Header background
	$('.background-image').each(function(){
		$(this).css('background-image', $(this).attr('data-background'));
	});

	// Scroll animation
	scrollCue.init({
	    percentage : 0.85
	});
	
	// Video modal
	$('.btn_play, .video').magnificPopup({
		type: 'iframe',
		closeMarkup: '<button title="%title%" type="button" class="mfp-close" style="font-size:24px; margin-right:-10px;">&#215;</button>'
	});
  function buscar_ajax(input1, input2) {

    input1.keyup(function(e) {
     
        // prevent browser autocomplete
        jQuery(this).attr('autocomplete','off');
         
        // get search term
        var searchTerm = jQuery(this).val();

        var urlFull  = window.location.href;     // URL completa
        var ruta     = window.location.pathname; // URL sin "http://dominio.com"
        var dominio = urlFull.replace(ruta,''); // URL solo "http://dominio.com"

        if(searchTerm.length > 2) { 
            jQuery.ajax({
            url: dominio + "/wp-admin/admin-ajax.php",
            type:"POST",
            data:{

             
            'action':'ajax_search',
            'term' :searchTerm
            },
            success:function(result){    
                input2.fadeIn(200).html(result);
            }
            });
        } else {
            input2.fadeOut(200);
        }

        if(searchTerm.length == 0){
            input2.hide();
        }

        if(e.keyCode == 27){
            jQuery(this).val('');
            input2.hide();
        }

        jQuery('body').click(function(e){
            if ( !jQuery(e.target).hasClass("busqueda") ) {
                input2.fadeOut(200);
                jQuery(this).val('');
            } 
        });
    });

    input1.keypress(function(e) {
        if(e.keyCode == 27){
            jQuery(this).val('');
            input2.fadeOut(200);
        }
    });
}


var buscaHead1 = jQuery('input#s');
var buscaHead2 = jQuery('ul#dhemy-ajax-search');
buscar_ajax(
 buscaHead1, buscaHead2 );  



//	jQuery(document).ready(function(){
//	jQuery(document).on('click','.dcsLoadMorePostsbtn',function(){
//		var ajaxurl = dcs_frontend_ajax_object.ajaxurl;
//		var dcsPostType = jQuery('input[name="dcsPostType"]').val();
//		var offset = parseInt(jQuery('input[name="offset"]').val() );
//		var dcsloadMorePosts = parseInt(jQuery('input[name="dcsloadMorePosts"]').val() );
//		var newOffset = offset+dcsloadMorePosts;
//		jQuery('.btnLoadmoreWrapper').hide();
//		jQuery.ajax({
//			type: "people",
//			url: ajaxurl,
//			data: ({
//				action: "dcsAjaxLoadMorePostsAjaxReq",
//				offset: newOffset,
//				dcsloadMorePosts: dcsloadMorePosts,
//				postType: dcsPostType,
//			}),
//			success: function(response){
//				if (!jQuery.trim(response)){ 
//					// blank output
//					jQuery('.noMorePostsFound').show();
//				}else{
//					// append to last div
//					jQuery(response).insertAfter(jQuery('.loadMoreRepeat').last());
//					jQuery('input[name="offset"]').val(newOffset);
//					jQuery('.btnLoadmoreWrapper').show();
//				}
//			},
//			beforeSend: function() {
//				jQuery('.dcsLoaderImg').show();
//			},
//			complete: function(){
//				jQuery('.dcsLoaderImg').hide();
//			},
//		});
//	});
//});
	
	

	
	
})(window.jQuery); 
//$('.search-toggle').addClass('closed');
//
//$('.search-toggle .search-icon').click(function(e) {
//  if ($('.search-toggle').hasClass('closed')) {
//    $('.search-toggle').removeClass('closed').addClass('opened');
//    $('.search-toggle, .search-container').addClass('opened');
//    $('#search-terms').focus();
//  } else {
//    $('.search-toggle').removeClass('opened').addClass('closed');
//    $('.search-toggle, .search-container').removeClass('opened');
//  }
//});	

 
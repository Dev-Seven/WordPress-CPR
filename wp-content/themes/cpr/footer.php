<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cpr
 */

?>
<footer>
	    <div class="container">
	            <div class="footer-link f-first">
	                <div class="footer_wp">
<!--	                    <h3>About</h3>-->
						<div id="footer-sidebar1">
<?php
if(is_active_sidebar('footer-sidebar-1')){
dynamic_sidebar('footer-sidebar-1');
}
?>
</div>
						<div id="footer-sidebar2">
<?php
if(is_active_sidebar('footer-sidebar-2')){
dynamic_sidebar('footer-sidebar-2');
}
?>
</div>
						
<!--
	                    <ul>
						<li><a href="#">People</a></li>
<li><a href="#">Archive</a></li>
<li><a href="#">News</a></li>
<li><a href="#">The Centre</a></li>
<li><a href="#">Covering Board</a></li>
<li><a href="#">Funding</a></li>
<li><a href="#">CPE-A Safe Space</a></li>
						</ul>
-->
	                </div>
	            </div>
	            <div class="footer-link f-second">
	                <div class="footer_wp">
<!--	                    <h3>Research</h3>-->
<div id="footer-sidebar3">
<?php
if(is_active_sidebar('footer-sidebar-3')){
dynamic_sidebar('footer-sidebar-3');
}
?>
</div>
<!--
	                    <ul>
						<li><a href="#">Opinions</a></li>
							<li><a href="#">Books</a></li>
							<li><a href="#">Journal Articles</a></li>
							<li><a href="#">Book Chapters</a></li>
							<li><a href="#">Briefs & Reports</a></li>
							<li><a href="#">Working Papers</a></li>
							<li><a href="#">Projects</a></li>
</ul>
-->
	                </div>
	            </div>
	            <div class="footer-link f-third">
	                <div class="footer_wp">
<div id="footer-sidebar4">
<?php
if(is_active_sidebar('footer-sidebar-4')){
dynamic_sidebar('footer-sidebar-4');
}
?>
</div>
<!--
	                    <ul>
	                       <li><a href="#">Events</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Vacancies</a></li>
							<li><a href="#">Notices</a></li>
	                    </ul>
-->
	                </div>
	            </div>
	            <div class="newsletter-sec">
	                <h3><a href="<?php echo esc_url( home_url( '/subscribe' ) );?>">Subscribe to email updates</a></h3>
<!--
	                <div id="newsletter">
	                    <div id="message-newsletter"></div>
	                    <form method="post" action="#" name="newsletter_form" id="newsletter_form">
	                        <div class="form-group">
	                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Enter email Address">
	                            <button type="submit" id="submit-newsletter">Subscribe</button>
	                        </div>
	                    </form>
	                </div>
-->
					<div class="foo-email"><a href="mailto:communication@cprindia.org">Click here share your feedback</a></div>
					<div class="social-icon">
						<span>Follow us on social:</span>
	                    <ul>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" width="23" height="23" alt=""/></a></li>
	                        <?php /*?><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" width="23" height="23" alt=""/></a></li><?php */?>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" width="23" height="23" alt=""/></a></li>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-in.png" width="23" height="23" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" width="23" height="23" alt=""/></a></li>
	                    </ul>
		</div>
	            </div>
	       
	    </div>
	</footer>
    <a class="back-to-top">
       <span><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-up fa-w-14 fa-2x"><path fill="#2c314c" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z" class="yellow-clr"></path></svg></span>
    </a>


	<?php /*?><footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php dynamic_footerlink( 'Footer-1' ); ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'cpr' ) ); ?>">
				<?php
				printf( esc_html__( 'Proudly powered by %s', 'cpr' ), 'WordPress' );
				?>
			</a>			
		</div><!-- .site-info -->
	</footer><?php */?><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.6.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>
   	<script src="<?php echo get_template_directory_uri(); ?>/js/modal_popup.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
 <script src="<?php echo get_template_directory_uri(); ?>/js/slider_func.js"></script>
 <script src="<?php echo get_template_directory_uri(); ?>/js/marquee.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/common_func.js"></script>
   <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script>

	
jQuery('.search-toggle').addClass('closed');

jQuery('.search-toggle .search-icon').click(function(e) {
  if (jQuery('.search-toggle').hasClass('closed')) {
    jQuery('.search-toggle').removeClass('closed').addClass('opened');
    jQuery('.search-toggle, .search-container').addClass('opened');
    jQuery('#search-terms').focus();
  } else {
    jQuery('.search-toggle').removeClass('opened').addClass('closed');
    jQuery('.search-toggle, .search-container').removeClass('opened');
  }
});

     jQuery(".tab_content").hide();
    jQuery(".tab_content:first").show();

  /* if in tab mode */
    jQuery("ul.tabs li").click(function() {
		
      jQuery(".tab_content").hide();
      var activeTab = jQuery(this).attr("rel"); 
      jQuery("#"+activeTab).fadeIn();		
		
      jQuery("ul.tabs li").removeClass("active");
      jQuery(this).addClass("active");

	  jQuery(".tab_drawer_heading").removeClass("d_active");
	  jQuery(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
	  
    });
	/* if in drawer mode */
	jQuery(".tab_drawer_heading").click(function() {
      
      jQuery(".tab_content").hide();
      var d_activeTab = jQuery(this).attr("rel"); 
      jQuery("#"+d_activeTab).fadeIn();
	  
	  jQuery(".tab_drawer_heading").removeClass("d_active");
      jQuery(this).addClass("d_active");
	  
	  jQuery("ul.tabs li").removeClass("active");
	  jQuery("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
	
	
	/* Extra class "tab_last" 
	   to add border to right side
	   of last tab */
	jQuery('ul.tabs li').last().addClass("tab_last");

</script>
<script>
jQuery('.slider-single').slick({
 	slidesToShow: 1,
 	slidesToScroll: 1,
 	arrows: false,
 	fade: false,
 	adaptiveHeight: true,
 	infinite: false,
	useTransform: true,
	autoplay: true,  
 	speed:1000,
 	cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
 });

 jQuery('.slider-nav')
 	.on('init', function(event, slick) {
 		jQuery('.slider-nav .slick-slide.slick-current').addClass('is-active');
 	})
 	.slick({
 		slidesToShow: 4,
 		slidesToScroll:4,
 		dots: false,
 		focusOnSelect: false,
	    arrows: false,
 		infinite: false,
 		responsive: [{
 			breakpoint: 1024,
 			settings: {
 				slidesToShow: 4,
 				slidesToScroll: 4,
 			}
 		}, {
 			breakpoint: 767,
 			settings: {
 				slidesToShow: 2,
 				slidesToScroll:1,
				arrows: false,
			}
 		}]
 	});

 jQuery('.slider-single').on('afterChange', function(event, slick, currentSlide) {
 	jQuery('.slider-nav').slick('slickGoTo', currentSlide);
 	var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
 	jQuery('.slider-nav .slick-slide.is-active').removeClass('is-active');
 	jQuery(currrentNavSlideElem).addClass('is-active');
 });

 jQuery('.slider-nav').on('click', '.slick-slide', function(event) {
 	event.preventDefault();
 	var goToSingleSlide = jQuery(this).data('slick-index');

 	jQuery('.slider-single').slick('slickGoTo', goToSingleSlide);
 });

jQuery('.author-name h5').each(function() {
	var linkText = jQuery(this).html();
	var linkText1 = linkText.toLowerCase();
	jQuery(this).html(linkText1);
  });

  jQuery('.publish-sec h3').each(function() {
	var linkText = jQuery(this).html();
	var linkText1 = linkText.toLowerCase();
	jQuery(this).html(linkText1);
  });

  jQuery('.tab-news-sec .news-date p').each(function() {
	var linkText = jQuery(this).html();
	var linkText1 = linkText.toLowerCase();
	jQuery(this).html(linkText1);
  });

  jQuery('.pbr-heading-sec h3').each(function() {
	var linkText = jQuery(this).html();
	var linkText1 = linkText.toLowerCase();
	jQuery(this).html(linkText1);
  });

  jQuery('.tab-news-sec .news-date p').each(function() {
	var linkText = jQuery(this).html();
	var linkText1 = linkText.toLowerCase();
	jQuery(this).html(linkText1);
  });
	$(document).ready(function(){
		if (window.location.href.indexOf("past-events") > -1) {
			setTimeout (function () {
				$("#past-events").trigger("click");
				$('.nav-link').removeClass('active');
				$('#past-events').addClass('active');

			}, 500)
		}	
	})
</script>
<script src='https://isotope.metafizzy.co/isotope.pkgd.js'></script>

<script>
jQuery(document).ready(function(){
//	$("#options").click(function(){
//		var test = $(".category12").val();
//		alert(test);
//	});
//	var test = $(".category").val();
//	alert(test);
		jQuery('#container').isotope({
		  // options
		  itemSelector: '.item',
		  layoutMode: 'fitRows'
		});

		updateCount();
	});
	var filters = {};
	// do stuff when checkbox change
	$('#options').on( 'change', function( jQEvent ) {
		var $checkbox = $( jQEvent.target );
		manageCheckbox( $checkbox );

		var comboFilter = getComboFilter( filters );

		$('#container').isotope({ filter: comboFilter });

		$('#container').isotope( 'on', 'layoutComplete', function( isoInstance, laidOutItems ) {
			updateCount();
		} );

	});

	$.expr[':'].hasClassStartingWith = function(el, i, selector) {
		var re = new RegExp("\\b" + selector[3]);
		return re.test(el.className);
	}

	function updateCount() {
		var numItems = 0;
		$('.count').each(function( index ) {
			if ( $(this).prev('input').hasClass('all') ) {
				numItems = $('.item').length;
				$(this).html(numItems);
			} else {
				itemClass = $(this).prev('input').val().substring(1);
				var itemSelector = "#container div:hasClassStartingWith('" + itemClass + "')";
				numItems = $(itemSelector).not(":hidden").length;
				$(this).html(numItems);
			}
		});
		
	}

	function getComboFilter( filters ) {
		var i = 0;
		var comboFilters = [];
		var message = [];
		
		for ( var prop in filters ) {
			message.push( filters[ prop ].join(' ') );
			var filterGroup = filters[ prop ];
			// skip to next filter group if it doesn't have any values
			if ( !filterGroup.length ) {
		  		continue;
			}
			if ( i === 0 ) {
		  		// copy to new array
		  		comboFilters = filterGroup.slice(0);
			} else {
		  		var filterSelectors = [];
		 		// copy to fresh array
		  		var groupCombo = comboFilters.slice(0); // [ A, B ]
		  		// merge filter Groups
		  		for (var k=0, len3 = filterGroup.length; k < len3; k++) {
		    		for (var j=0, len2 = groupCombo.length; j < len2; j++) {
		      			filterSelectors.push( groupCombo[j] + filterGroup[k] ); // [ 1, 2 ]
		    		}

		  		}
		  		// apply filter selectors to combo filters for next group
		  		comboFilters = filterSelectors;
			}
			i++;
		}

		var comboFilter = comboFilters.join(', ');
		return comboFilter;
	}

	function manageCheckbox( $checkbox ) {
	  var checkbox = $checkbox[0];

	  var group = $checkbox.parents('fieldset').attr('data-group');
	  // create array for filter group, if not there yet
	  var filterGroup = filters[ group ];
	  if ( !filterGroup ) {
	    filterGroup = filters[ group ] = [];
	  }

	  var isAll = $checkbox.hasClass('all');
	  // reset filter group if the all box was checked
	  if ( isAll ) {
	    delete filters[ group ];
	    if ( !checkbox.checked ) {
	      checkbox.checked = 'checked';
	    }
	  }
	  // index of
	  var index = $.inArray( checkbox.value, filterGroup );

	  if ( checkbox.checked ) {
	    var selector = isAll ? 'input' : 'input.all';
	    $checkbox.siblings( selector ).removeAttr('checked');

	    if ( !isAll && index === -1 ) {
	      // add filter to group
	      filters[ group ].push( checkbox.value );
	    }

	  } else if ( !isAll ) {
	    // remove filter from group
	    filters[ group ].splice( index, 1 );
	    // if unchecked the last box, check the all
	    if ( !$checkbox.siblings('[checked]').length ) {
	      $checkbox.siblings('input.all').attr('checked', 'checked');
	    }
	  }

	}

</script>
</body>
</html>

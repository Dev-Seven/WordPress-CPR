<?php
/**
 * Template Name: About Template
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<!--<div class="top_margin"></div>-->
			<div class="inner_banner"> <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="About"><div class="tab_margin"></div></div>
			<div id="main" class="wrapper">
	             <div class="container-fluid">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
					    <?php if(function_exists('bcn_display'))
					    {
					        bcn_display();
					    }?>
					</div>
	            </div>
                  <div id="content" class="site-content">
				<?php get_template_part('content', 'about'); ?>
                </div>
			</div>

			  
			<script>
				/*jQuery(document).ready(function ()
		        {
		            jQuery('.nav-tabs-new li a').pageNav({'scroll_shift': jQuery('.nav-tabs-new').outerHeight() + 205});
		        });*/
		        jQuery.noConflict();
						jQuery(document).ready(function() {






//window.location.hash = ui.panel.id;
	 

  var navpos = jQuery('.tab_margin').offset();
  //console.log(navpos.top);

    jQuery(window).bind('scroll', function(event, ui) {

    	//window.location.hash = ui.panel.id;
      if (jQuery(window).scrollTop() > navpos.top) {
      	 
        jQuery('header').addClass('scrollnav');
        jQuery('#tab_btn').addClass('ffg');
        
       		
       }

       else {

         jQuery('header').removeClass('scrollnav');
         jQuery('#tab_btn').removeClass('ffg');
       
         //window.location.hash = ui.panel.id;
       }

    });

});




			</script>
<?php get_footer(); ?>
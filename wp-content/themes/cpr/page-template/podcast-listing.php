<?php
/**
 * Template Name: Podcast Listing Template
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

get_header();
?>
<!--<div class="top_margin"></div>-->
<section class="inner-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          <?php
          if ( function_exists( 'bcn_display' ) ) {
            bcn_display();
          }
          ?>
        </div>
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
    </div>
  </div>
</section>
<div class="innerpage-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
          $maincontent = get_the_id();
          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
			
					  <a href="https://india-speak-the-cpr-podcast.simplecast.com/" target="_blank" class="mt-1 btn_1 outline">Listen & Subscribe</a>

        </div>
		  
		  
		  <?php /*?> <div class="col-md-12 mt-5">
		   <iframe height="200px" width="100%" frameborder="no" scrolling="no" seamless src="https://player.simplecast.com/c9f4dc27-3171-4dd7-a673-ff12f5f57999?dark=true"></iframe>
		   </div><?php */?>
		  
      </div>
    </div>
  </div>
<?php /*?><div class="innerpage-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php
              if ( have_rows( 'podcastlist' ) ):
                while ( have_rows( 'podcastlist' ) ): the_row();
              $pdf_name1 = get_sub_field( 'podcasturl' );
         
              ?>
              <a href="<?php
                if ($pdf_name1 != ""){
                  echo $pdf_name1;
                } else {

                }
               ?>" target="_blank">
             <div class="col-md-12 mt-5">
		   <iframe height="200px" width="100%" frameborder="no" scrolling="no" seamless src="<?php echo $pdf_name1; ?>"></iframe>
		   </div>
              </a>
              <?php	endwhile; ?>
              <?php
              else :
                //echo "Test";
                endif;
              ?>
      </div>
    </div>
  </div>
</div><?php */?>
        
 <div class="podcast-listing" id="podcast">
  <div class="container">
     <div class="row">
      <?php
      if ( have_rows( 'podcastlist' ) ):
        $total = count(get_field('podcastlist'));
      $count = 0;
      $number = 10; 
        while ( have_rows( 'podcastlist' ) ): the_row();
   $podcasturl = get_sub_field( 'podcasturl' );
      ?>
		 
		<div class="col-md-12">
			 <a href="<?php echo $podcasturl; ?>" target="_blank">
        <iframe height="200px" width="100%" frameborder="no" scrolling="no" seamless src="<?php echo $podcasturl; ?>"></iframe>
				   </a>
      </div> 
	      <?php
        if ($count == $number) {
          // we've shown the number, break out of loop
          break;
        } ?>  
      <?php	$count++; endwhile; 
      else : endif;
      ?>
    </div>
	  <div style="width: 100%; text-align: center; margin: 30px 0 50px">
     <a id="podcast-load-more" class="loadmore" href="javascript: my_repeater_show_more();" <?php if ($total < $count) { ?> style="display: none;"<?php } ?>><span>Load More</span><img src="<?php echo get_template_directory_uri(); ?>/images/icon-loadmore.png" alt=""/></a></div>
  </div>
</div>    


<?php get_footer(); ?>
<script type="text/javascript">
  var my_repeater_field_post_id = <?php echo $post->ID; ?>;
  var my_repeater_field_offset = <?php echo $number + 1; ?>;
  var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
  var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
  var my_repeater_more = true;
  
  function my_repeater_show_more() {
    
	
    // make ajax request
    jQuery.post(
		
      my_repeater_ajax_url, {
		  
		  
        // this is the AJAX action we set up in PHP
        'action': 'my_repeater_show_more',
        'post_id': my_repeater_field_post_id,
        'offset': my_repeater_field_offset,
        'nonce': my_repeater_field_nonce
      },
      function (json) {
        // add content to container
        // this ID must match the containter 
        // you want to append content to
        jQuery('#podcast .row').append(json['content']);
        // update offset
        my_repeater_field_offset = json['offset'];
		  
		  
        // see if there is more, if not then hide the more link
        if (!json['more']) {
          // this ID must match the id of the show more link
          jQuery('#podcast-load-more').css('display', 'none');
        }
      },
      'json'
    );
  }
  
</script>
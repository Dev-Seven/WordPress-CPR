<?php
/**
 * Template Name: People Listing Template
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

<div class="faculty-listing">
  <div class="container">
    <div class="row">
   
		  <div class="col-md-12">
			  <div class="faculty-searchbar">
				  
						  
				  
				<form class="form" id="superform" action="" method="post" enctype="">


					<label>Search People</label>
					  <input class="form-control" type="text" placeholder="Search by Name" aria-label="search">
					  <input class="form-control" type="text" placeholder="Search by Designation" aria-label="search">
					   <input type="hidden" name="post_type" value="people" />
					  <input type="submit" class="search-button" onclick="myFunction()"/>
					  <input type="hidden" name="post_type" value="fod_videos" />

				  </form>
				 
				  </div>
		 </div>
		

      </div>
	  
	   <div class="row">
	  		<?php /*?><?php echo do_shortcode('[ajaxloadmoreblogdemo post_type="people" initial_posts="4" loadmore_posts="4"]');?><?php */?>
	</div>
	
	</div>

<div id="primary" class="content-area">
	 <div class="container">
		
      <?php $args = array(
        'post_type' => 'people',
        'post_status' => 'publish',
        'posts_per_page' => '4',
        'paged' => 1,
      );
		
      $blog_posts = new WP_Query( $args ); 
		 
//		 echo "<pre>";
//		 print_r($blog_posts);
//		  echo "</pre>";
//		 exit;
		 
		 		 
		 ?>
      <?php if ( $blog_posts->have_posts() ) :?>
		 
          <div class="row blog-posts">
          <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); 
			   $faculty_image = get_field( 'faculty_image' );
		 $faculty_designation = get_field( 'faculty_designation' );
			  ?>
           <div class="col-md-6 col-lg-4 col-xl-3">
		    <a href="<?php  echo get_permalink( $id ) ?>">
        <div class="item">
          <div class="item-img"> <img src="<?php echo $faculty_image; ?>" alt=""> </div>
          <h3><?php the_title(); ?></h3>
          <p><?php echo $faculty_designation; ?></p>
        </div>
		  </a>
      </div> 
           
          <?php endwhile; ?>
        </div>
        <div class="loadmore"><span>Load More</span><img src="<?php echo get_template_directory_uri(); ?>/images/icon-loadmore.png" alt=""/></div>
        <span class="no-more-post"></span>
      <?php endif; ?>
    </div>
	</div>
  <?php get_footer(); ?>
	
	
	
<script type="text/javascript">
	
	
	jQuery( document ).ready( function(){
    var page = 2;
    jQuery( function($) {
      jQuery( 'body' ).on( 'click', '.loadmore', function() {
        var data = {
          'action': 'load_posts_by_ajax',
          'page': page,
          'security': blog.security
        };
        jQuery.post( blog.ajaxurl, data, function( response ) {
          if( $.trim(response) != '' ) {
            jQuery( '.blog-posts' ).append( response );
            page++;
          } else {
            jQuery( '.loadmore' ).hide();
            jQuery( ".no-more-post" ).html( "No More Post Available" );
          }
        });
      });
    });
  });
</script>

	


	


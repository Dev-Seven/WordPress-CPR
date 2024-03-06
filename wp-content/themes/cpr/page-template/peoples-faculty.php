<?php
/**
 * Template Name: People Faculty Template
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
				  
				  
<!--
				  <form role="search" method="post" class="search-form padding-4" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<input class="post_type" type="hidden" name="post_type" value="frequent" />
	</label>
	<input type="submit" class="search-submit button brand" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
-->
				  
				  
				  </div>
		 </div>
		

      </div>
		<div id="faculty">
     <div class="row">
		 
		 <?php 
		  $args = array(
            'post_type' => 'bookchapters',
            'post_status' => 'publish',
            'no_found_rows' => true,
);
     
      if ( have_rows( 'people_faculty' ) ):
        $total = count(get_field('people_faculty'));
      $count = 0;
      $number = 3; 
        while ( have_rows( 'people_faculty' ) ): the_row();
      $faculty_image = get_sub_field( 'faculty_image' );
      $faculty_name = get_sub_field( 'faculty_name' );
      $faculty_designation = get_sub_field( 'faculty_designation' );
 $faculty_link = get_sub_field( 'faculty_link' );
      ?>
      <div class="col-md-6 col-lg-4 col-xl-3">
		    <a href="<?php echo $faculty_link; ?>">
        <div class="item">
          <div class="item-img"> <img src="<?php echo $faculty_image; ?>" alt=""> </div>
          <h3><?php echo $faculty_name; ?></h3>
          <p><?php echo $faculty_designation; ?></p>
        </div>
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
			<div style="width: 100%; text-align: center;">
     <a id="faculty-load-more" class="loadmore" href="javascript: my_repeater_show_more();" <?php if ($total < $count) { ?> style="display: none;"<?php } ?>><span>Load More</span><img src="<?php echo get_template_directory_uri(); ?>/images/icon-loadmore.png" alt=""/></a></div>
  </div>
 </div>
</div>
<?php get_footer(); ?>


<script type="text/javascript">
	
	
$("document").ready(function(){
     $('.row').on('click','.addres',function(){
         console.log('Click Detectado');
         var formulario = $('#superform');
         var formData = new FormData(formulario);

          $.ajax({

                  type: "POST",
                  url: "addres.php",
                  data: formData,
                  async: false,
                  success: function(data) {
                        console.log('Funcionou');
                  },
                  error: function(data) {
                      console.log('Erro no formulario');
                  },
                  cache: false,
                  contetType: false,
                  processData: false
          });


     });
 });
	
	
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
        jQuery('#faculty .row').append(json['content']);
        // update offset
        my_repeater_field_offset = json['offset'];
        // see if there is more, if not then hide the more link
        if (!json['more']) {
          // this ID must match the id of the show more link
          jQuery('#faculty-load-more').css('display', 'none');
        }
      },
      'json'
    );
  }
  
</script>

	


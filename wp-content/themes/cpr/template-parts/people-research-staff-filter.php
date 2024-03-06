
<?php function data_fetch_presearch_staff(){
	 //$the_query = new WP_Query( array( 'posts_per_page' => 1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'people' ) );
$args = array(
      'post_type' => 'people',
      'tax_query' => array(
        array(
          'taxonomy' => 'people_category',
          'field' => 'slug',
          'terms' => 'research-staff',
        ),
      ),
      'post_status' => 'publish',
	  's' => esc_attr( $_POST['keyword'] ),
      'no_found_rows' => true,
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page' => -1,
    );
	 
//	print_r(esc_attr( $_POST['designation'] ));
	
	
		$blog_posts = new WP_Query( $args );
    ?>
 <div class="row">
      <?php if ( $blog_posts->have_posts() ) :?>
      <?php
      while ( $blog_posts->have_posts() ): $blog_posts->the_post();
     // $faculty_image = get_field( 'faculty_image' );
     // $faculty_designation = get_field( 'faculty_designation' );
		
      ?>
      <div class="col-md-6 col-lg-4 col-xl-3"> <a href="<?php  echo get_permalink( $id ) ?>">
        <?php
        $faculty_image = get_field( 'faculty_image' );
        $faculty_designation = get_field( 'faculty_designation' );
	
        ?>
	
        <div class="item">
          <div class="item-img">
            <?php if ($faculty_image != "") { ?>
            <img src="<?php echo $faculty_image; ?>" alt="">
            <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/faculty-img.jpg" alt="" />
            <?php } ?>
          </div>
          <h3>
            <?php the_title(); ?>
          </h3>
          <p><?php echo $faculty_designation; ?></p>
        </div>
        </a> </div>
		 

        
	  <?php endwhile;  else:?>
    <p class="text-center"><?php _e('Sorry, We did not find faculty.'); ?></p>
	 <?php
        wp_reset_postdata(); 
	 
    endif;
?>
	  </div>
<?php
    die();
}
?>

<?php function data_fetch_presearch_staff_name(){
 
    $designation = $_POST['designation'];
    $args = array(					
			'post_type' => 'people',
      'tax_query' => array(
        array(
          'taxonomy' => 'people_category',
          'field' => 'slug',
          'terms' => 'research-staff',
        ),
      ),
      'post_status' => 'publish',
      'no_found_rows' => true,
//      'orderby' => 'title',
//      'order' => 'ASC',
			'posts_per_page' => -1,
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'meta_key' => 'faculty_designation',
      
			'meta_query' => array(
				array(
					'key' => 'faculty_designation',
					'value' => $designation,
					'compare' => 'LIKE',
				)
        
			)
      
		);
	
	
		$blog_posts = new WP_Query( $args );
    ?>
 <div class="row">
      <?php if ( $blog_posts->have_posts() ) :?>
      <?php
      while ( $blog_posts->have_posts() ): $blog_posts->the_post();
     // $faculty_image = get_field( 'faculty_image' );
     // $faculty_designation = get_field( 'faculty_designation' );
		
      ?>
      <div class="col-md-6 col-lg-4 col-xl-3"> <a href="<?php  echo get_permalink( $id ) ?>">
        <?php
        $faculty_image = get_field( 'faculty_image' );
        $faculty_designation = get_field( 'faculty_designation' );	
        ?>
	
        <div class="item">
          <div class="item-img">
            <?php if ($faculty_image != "") { ?>
            <img src="<?php echo $faculty_image; ?>" alt="">
            <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/faculty-img.jpg" alt="" />
            <?php } ?>
          </div>
          <h3>
            <?php the_title(); ?>
          </h3>
          <p><?php echo $faculty_designation; ?></p>
        </div>
        </a> </div>
		       
	  <?php endwhile;  else:?>
    <p class="text-center"><?php _e('Sorry, We did not find faculty.'); ?></p>
	 <?php
        wp_reset_postdata(); 
	 
    endif;
?>
	  </div>
<?php
    die();
}
?>


    


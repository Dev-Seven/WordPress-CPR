<?php
/**
 * Template Name: Research Area Template
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
<div class="researchin-listing">
  <div class="container-fluid">
    
	 
    
	  <?php

// WP_Query Arguments
$args = array(
  'post_type' => 'researcharea',
  //'order' => 'DESC',
  'orderby' => 'menu_order',
   'order' => 'ASC',
  'post_status' => 'publish',
  'posts_per_page' => -1
);

// The Loop
$query = new WP_Query( $args );
   while ( $query->have_posts() ) : $query->the_post();
   $research_area_image = get_field( 'research_area_image' );
	   $research_area_publisher_link = get_field( 'research_area_publisher_link' );
	  

      // The count (must be inside the loop)
      $count++;
      $even_odd_class = ( ($count % 2) == 0 ) ? "even" : "odd"; 

	  if ($even_odd_class == "odd"){ ?>
			
	  <div class="rin-listing-item <?php echo $even_odd_class; ?>">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5 col-lg-4 col-xl-3 col-xxl-3">  
             <a href="<?php  echo get_permalink( $id ) ?>">
             <?php if ($research_area_image != "") { ?>
                  <img src="<?php echo $research_area_image; ?>" alt="">
                <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image-available.jpg" />
              <?php } ?>
              </a> 
            </div>
          <div class="col-md-7 col-lg-8 col-xl-9 col-xxl-9">
          <a href="<?php  echo get_permalink( $id ) ?>"> <h3>
              <?php the_title(); ?>
            </h3>
    </a>
          <a href="<?php  echo get_permalink( $id ) ?>" class="btn_1 outline">Read more<span>&gt;</span></a> </div>
        </div>
      </div>
	</div>
	  <?php } else { ?>
	  
	  <div class="rin-listing-item <?php echo $even_odd_class; ?>">
		
			<div class="container">
			<div class="row align-items-center research-right-img">
				<div class="col-md-5 col-lg-4 col-xl-3 col-xxl-3">
        <a href="<?php  echo get_permalink( $id ) ?>"> 
        <?php if ($research_area_image != "") { ?>
            <img src="<?php echo $research_area_image; ?>" alt=""> 
            <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image-available.jpg" />
              <?php } ?>
          </a>
				</div>
				 <div class="col-md-7 col-lg-8 col-xl-9 col-xxl-9">
         <a href="<?php  echo get_permalink( $id ) ?>">	<h3><?php the_title(); ?></h3> </a>
      <a href="<?php  echo get_permalink( $id ) ?>" class="btn_1 outline">Read more<span>&gt;</span></a>
		</div>
				
				</div>
		</div>
</div>
		  
	
	  
<?php } ?>




<?php endwhile; wp_reset_postdata(); ?>
	  
	  
	  
    <!--
	  <div class="rin-listing-item odd">
			<div class="container">
			<div class="row">
				 <div class="col-md-7 col-lg-8 col-xl-9 col-xxl-9">
		<h3>Governance and Public Policy Initiative</h3>
			<p>The Governance and Public Policy Initiative (GPPI) seeks to foster a strategic community that brings together Indian law makers, scholars, bureaucrats, and civil society leaders to discuss pressing issues of public policy. It works in partnership with national and international think tanks and partner institutions to convene roundtables, seminars, and conferences on a range of issues including democratic processes, national security, urban governance and development, jurisprudence, health, education, gender, and cyber security.
</p>
					  <a href="#" class="btn_1 outline">Read more<span>&gt;</span></a>
		</div>
				<div class="col-md-5 col-lg-4 col-xl-3 col-xxl-3">
		 <img src="<?php echo get_template_directory_uri(); ?>/images/img-ri2.jpg" alt="">
				</div>
				</div>
		</div>
</div>
	 
-->
    

  </div>
</div>
<?php get_footer(); ?>

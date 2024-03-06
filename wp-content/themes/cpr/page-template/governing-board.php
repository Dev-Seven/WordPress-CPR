<?php
/**
 * Template Name: Goverming Template
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


<div class="board-listing" id="governing">
  <div class="container">
     <div class="row">
      <?php
      if ( have_rows( 'governing_board_item' ) ):
        while ( have_rows( 'governing_board_item' ) ): the_row();
      $governing_faculty_image = get_sub_field( 'governing_faculty_image' );
      $governing_faculty_name = get_sub_field( 'governing_faculty_name' );
      $governing_faculty_designation = get_sub_field( 'governing_faculty_designation' );
      ?>
		 
		<div class="col-md-6 col-lg-4 col-xl-3">
        <div class="item">
          <div class="item-img"> 
            <?php if ($governing_faculty_image != "") { ?>
                  <img src="<?php echo $governing_faculty_image; ?>" alt=""> 
             <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image.png" />
              <?php } ?>
            </div>
          <h3><?php echo $governing_faculty_name; ?></h3>
          <p><?php echo $governing_faculty_designation; ?></p>
        </div>
      </div> 
 
      <?php	endwhile; 
       endif;
      ?>
    </div>
	 
  </div>
  </div>

<?php get_footer(); ?>


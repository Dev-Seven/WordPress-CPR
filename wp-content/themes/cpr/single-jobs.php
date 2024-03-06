<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cpr
 */

get_header(); ?>

			<main>
		<section class="inner-banner">
  <div class="container">
		<div class="row">
  
  <div class="col-md-12">
	  <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
					    <?php if(function_exists('bcn_display'))
					    {
					        bcn_display();
					    }?>
					</div>
	   <h1><?php the_title(); ?></h1>
		</div></div></div>	
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
</div>
					</div>
				</div>
				</div>
	
		
		<div class="jobs-single">
				 <?php
			
				$job_designation = get_field( 'job_designation' );
				$job_description = get_field( 'job_description' );
				$job_pdf_file = get_field( 'job_pdf_file' );
				$job_link = get_field( 'job_link' );

				 ?>
		<div class="col-md-6 col-lg-6 col-xl-7 col-xxl-8">
         <h3><?php echo $job_designation; ?></h3>
			<h3><?php echo $job_description; ?></h3>
			<h3><?php echo $job_pdf_file; ?></h3>
			<h3><?php echo $job_link; ?></h3>
      </div>	
			
			
			
				</div>

  
    
		
	</main>

			  
			
<?php get_footer(); ?>
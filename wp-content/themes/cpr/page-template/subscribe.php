<?php
/**
 * Template Name: Subscribe Template
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
<?php
$subscribe_title = get_field( 'subscribe_title' );
$subscribe_form_code = get_field( 'subscribe_form_code' );

      ?>
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
                 <div class="">
                       
				<h2><?php echo $subscribe_title; ?></h2>
				
			<div class="">
				<?php $maincontent = get_the_id(); 
						$content_post = get_post($maincontent);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
						?>
				</div>	 
			</div>
		</div>

	</div>
			<div class="row">
	<div class="subscribe-form">
					<div class=""><?php echo $subscribe_form_code; ?></div>
					
					
					</div>
				</div>
				</div>
			</div>

			
	
			
	
	</main>
			  
		
<?php get_footer(); ?>
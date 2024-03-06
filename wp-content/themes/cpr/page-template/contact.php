<?php
/**
 * Template Name: Contact Template
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
     
$contact_title = get_field( 'contact_title' );
$address = get_field( 'address' );
$image_phone = get_field( 'image_phone' );
$phone_no_text = get_field( 'phone_no_text' );
$image_fax = get_field( 'image_fax' );
$fax_text = get_field( 'fax_text' );
$image_email = get_field( 'image_email' );
$email_id_text = get_field( 'email_id_text' );
$contact_map = get_field( 'contact_map' );

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
		
	<div class="contactpage-content">
		<div class="container">
		<div class="row">
			<div class="col-md-6">
                 <div class="contact-left">
                         <div class="con-l-inner">
				<h3><?php echo $contact_title; ?></h3>
				<address><?php echo $address; ?></address>
			<div class="contact-block">
				<div><i><img src="<?php echo $image_phone; ?>" alt=""></i><span><?php echo $phone_no_text; ?></span></div>
				<div><i><img src="<?php echo $image_fax; ?>" alt=""></i><span><?php echo $fax_text; ?></span></div>
				<div><i><img src="<?php echo $image_email; ?>" alt=""></i><span><?php echo $email_id_text; ?></span></div>
				</div>	 
				</div>	 
			</div>
		</div>

	</div>
	<div class="contact-right">
					<div class="contact-map"><?php echo $contact_map; ?></div>
					
					
					</div>
				</div>
				</div>
			

			
	
			
	
	</main>
			  
		
<?php get_footer(); ?>
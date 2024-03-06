<?php
/**
 * Template Name: Event Detail Template
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
     
$sub_value = get_field( 'event_name' );
$sub_value1 = get_field( 'event_detail_title' );
$sub_value2 = get_field( 'date' );
$sub_value3 = get_field( 'time' );
$sub_value4 = get_field( 'location' );
$sub_value5 = get_field( 'hosts' );
$sub_value6 = get_field( 'hostlinktitle' );
$sub_value7 = get_field( 'host_link' );
$sub_value8 = get_field( 'host_text' );
$sub_value9 = get_field( 'event_text' );
$sub_value10 = get_field( 'event_publish_name' );
$sub_value11 = get_field( 'event_issue_text' );

$sub_value15 = get_field( 'chair_image' );
$sub_value16 = get_field( 'chair_title' );
$sub_value17 = get_field( 'chair_designation' );

$sub_value18 = get_field( 'moderator_image' );
$sub_value19 = get_field( 'moderator_title' );
$sub_value20 = get_field( 'moderator_designation' );
$featured_events_box = get_field( 'featured_events_box' );
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
		
	<div class="event-title">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">
                       
				<h2><?php echo $sub_value; ?></h2>
				
					 
			
		</div>
				</div>
			</div>
	</div>
				<section class="event-detail-sec">			
		<div class="container">
			<div class="row">
                 <div class="col-md-6">	
					 <div class="event-info">
					 <div class="heading">
					<h3><?php echo $sub_value1; ?></h3> 
					 </div>
					 <ul>
					 <li class="left-title">Date</li><li class="right-text"><?php echo $sub_value2; ?><?php echo $sub_value3; ?></li>
					 <li class="left-title">Location</li><li class="right-text"><?php echo $sub_value4; ?></li>
					<li class="left-title">Hosts</li><li class="right-text"><?php echo $sub_value5; ?></li>
					 </ul>
					 <a href="<?php echo $sub_value7; ?>" class="btn_outline2"><?php echo $sub_value6; ?></a>
				<div class="hostlink-text"><?php echo $sub_value8; ?></div>
				</div>
					 </div>
				
				 <div class="col-md-6">
					 <div class="host-info">
					 <h4><?php echo $sub_value9; ?></h4>
					 <div class="publish-by"><?php echo $sub_value10; ?></div>
					 <div class="calender-sec">
						 <div class="calender-left">
						  <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/eve-icon-calender.png" alt=""><span>Add to Calendar</span></a></div>
						  <div class="query-text">
						 <?php echo $sub_value11; ?></div></div>
				</div>
			</div>	
				
			</div>
	</div>
		</section>		
		<div class="event-content">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">		
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
				
				
		
					 
					 
	<section class="panelists-sec">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">	
				 <div class="heading">	 
		<h3><?php echo $sub_value1; ?></h3> 
		</div>			 
		</div>	
		</div>
			<div class="row justify-content-center">
				<div class="panel-wi">
			<?php
      if ( have_rows( 'panelists' ) ):
        while ( have_rows( 'panelists' ) ): the_row();
      $sub_value12 = get_sub_field( 'panelist_image' );
      $sub_value13 = get_sub_field( 'panelist_title' );
      $sub_value14 = get_sub_field( 'panelists_designation' );
				
      ?>
		
                 <div class="col-md-3">	
		<div class="item">
          <div class="item-img"> <img src="<?php echo $sub_value12; ?>" alt=""> </div>
          <h3><?php echo $sub_value13; ?></h3>
          <p><?php echo $sub_value14; ?></p>
        </div>
		</div>	
		
			
		 <?php	endwhile; ?>
      <?php
      else :

        endif;
      ?>	
					</div>
				<div class="hr"></div>
		</div>	
			
			<div class="row chairperson-sec">
				<div class="chairperson-wi">
                 <div class="col-md-6">	
		<div class="item">
			<h3 class="heading">Chair</h3>
          <div class="item-img"> <img src="<?php echo $sub_value15; ?>" alt=""> </div>
          <h3><?php echo $sub_value16; ?></h3>
          <p><?php echo $sub_value17; ?></p>
        </div>
		</div>	
		
				<div class="col-md-6">	
		<div class="item">
				<h3><h3 class="heading">Moderator</h3>
          <div class="item-img"> <img src="<?php echo $sub_value18; ?>" alt=""> </div>
          <h3><?php echo $sub_value19; ?></h3>
          <p><?php echo $sub_value20; ?></p>
        </div>
		</div>	
	
		</div>
			
		</div>	
		</div>		
			
			
			
			
			
	</section>
			
	
	</main>

			  
		
<?php get_footer(); ?>
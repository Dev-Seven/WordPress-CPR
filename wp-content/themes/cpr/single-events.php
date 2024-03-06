<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cpr
 */

get_header(); ?>
<!--<div class="top_margin"></div>-->
<?php
     
$event_name = get_field( 'event_name' );
$event_detail_title = get_field( 'event_detail_title' );
$event_date = get_field( 'event_date' );
$event_start_time = get_field( 'event_start_time' );
$event_end_time = get_field( 'event_end_time' );
$event_location = get_field( 'event_location' );
$event_hosts = get_field( 'event_hosts' );
$event_hostlinktitle = get_field( 'event_hostlinktitle' );
$event_host_link = get_field( 'event_host_link' );
$event_host_text = get_field( 'event_host_text' );
$event_invite_text = get_field( 'event_invite_text' );
$event_publish_name = get_field( 'event_publish_name' );
$event_issue_text = get_field( 'event_issue_text' );

$chair_image = get_field( 'chair_image' );
$chair_title = get_field( 'chair_title' );
$chair_designation = get_field( 'chair_designation' );

$moderator_image = get_field( 'moderator_image' );
$moderator_title = get_field( 'moderator_title' );
$moderator_designation = get_field( 'moderator_designation' );
$featured_events_box = get_field( 'featured_events_box' );

$event_video =  get_field( 'event_video' );	
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
	   <h1>Events</h1>
</div></div></div>	
		</section>
		
	<div class="event-title">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">
                       
				<h2><?php the_title(); ?></h2>
				
					 
			
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
					<h3>Event Details</h3> 
					 </div>
					 <ul>
					 <li class="left-title">Date</li><li class="right-text"><?php echo $event_date; ?><br><?php echo $event_start_time; ?> to <?php echo $event_end_time; ?></li>
					 <li class="left-title">Location</li><li class="right-text"><?php echo $event_location; ?></li>
					<li class="left-title">Hosts</li><li class="right-text"><?php echo $event_hosts; ?></li>
					 </ul>
						  <?php if ($event_hostlinktitle != "") { ?>
						 <a href="<?php echo $event_host_link; ?>" class="btn_outline2"><?php echo $event_hostlinktitle; ?></a>
                           <?php } ?>
					 
				<div class="hostlink-text"><?php echo mb_strimwidth($event_host_text, 0, 120, "...");?></div>
				</div>
					 </div>
				
				 <div class="col-md-6">
					 <div class="host-info">
					 <h4><?php echo $event_invite_text; ?></h4>
					 <?php /*?><div class="publish-by"><?php echo $event_publish_name; ?></div><?php */?>
					 <div class="calender-sec">
				
					 <?php 
					 $today  = date('Y-m-d',strtotime('now'));
					 $events_date = date('Y-m-d',strtotime(get_field( 'event_date' )));
					 if ($events_date >= $today){
					 ?>

 					   <div class="calender-left">
						  <a href="https://calendar.google.com/calendar/u/0?cid=amk5dTBvcWw0dG11Y3ZrcGMwODZndWlzdGNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/eve-icon-calender.png" alt=""><span>Add to Calendar</span></a></div>
						 <?php } ?> 	

						<?php /*?> <div class="calender-left">
						  <a href="https://calendar.google.com/calendar/u/0?cid=amk5dTBvcWw0dG11Y3ZrcGMwODZndWlzdGNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/eve-icon-calender.png" alt=""><span>Add to Calendar</span></a></div><?php */?>
						  <div class="query-text"><?php echo mb_strimwidth($event_issue_text, 0, 120, "...");?></div>
						
						 </div>
						 
					<div class="event-video">
						<iframe width="100%" height="420" src="<?php echo $event_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						 </div>
				</div>
			</div>	
				
			</div>
	</div>
		</section>	
				
		  <?php $maincontent = get_the_id(); 
				$content_post = get_post($maincontent);
				$content = $content_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				
				
				if(isset($content) && !empty($content)){?>		
				<div class="event-content">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">		
		             <?php echo $content; ?>
					 </div>
				</div>
			</div>
	</div>
				<?php } ?>
				
		
					 
					 
	<section class="panelists-sec">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">	
				 <div class="heading">	 
		<h3>Panelists</h3> 
		</div>			 
		</div>	
		</div>
			<div class="panel-wi">	
			<div class="row justify-content-center">
			
			<?php
      if ( have_rows( 'panelists' ) ):
        while ( have_rows( 'panelists' ) ): the_row();
      $panelist_image = get_sub_field( 'panelist_image' );
      $panelist_title = get_sub_field( 'panelist_title' );
      $panelists_designation = get_sub_field( 'panelists_designation' );
				
      ?>
		
                 <div class="col-md-6 col-lg-4 col-xl-3">		
		<div class="item" style="margin-top: 35px;">
          <!-- <div class="item-img"> <img src="<?php // echo $panelist_image; ?>" alt=""> </div> -->
          <h3><?php echo $panelist_title; ?></h3>
          <p><?php echo $panelists_designation; ?></p>
        </div>
		</div>	
		
			
		 <?php	endwhile; ?>
      <?php else : endif; ?>	
					</div>
			
			
		</div>	
				<div class="hr"></div>
			<div class="chairperson-wi">
			<div class="row justify-content-center chairperson-sec">
				
					
		
					
       		<?php
      if ( have_rows( 'chair' ) ):
        while ( have_rows( 'chair' ) ): the_row(); 
      $chair_image = get_sub_field( 'chair_image' );
      $chair_title = get_sub_field( 'chair_title' );
      $chair_designation = get_sub_field( 'chair_designation' );
				
      ?>
	  <div class="col-md-12 col-lg-6 col-xl-6">	
				
	  <h3 class="heading">Chair</h3>		
				<div class="row justify-content-center">
			 
	 
				  <div class="col-md-6 col-lg-6 col-xl-6">
			<div class="item" style="margin-top: 35px;">
					
					<!-- <div class="item-img"> 
						<img src="<?php //echo $chair_image; ?>" alt=""> 
					</div> -->
						<h3><?php echo $chair_title; ?></h3>
						<p><?php echo $chair_designation; ?></p>
			</div>
				</div>
				</div>
				
				</div>	
		
				 <?php	endwhile; ?>
      <?php else : endif; ?>
				
			 <!-- <div class="col-md-12 col-lg-6 col-xl-6 justify-content-center">
				<h3 class="heading">Moderator</h3>

					<div class="row "> -->
										  <?php
      if ( have_rows( 'moderator' ) ):
        while ( have_rows( 'moderator' ) ): the_row();
      $moderator_image = get_sub_field( 'moderator_image' );
      $moderator_title = get_sub_field( 'moderator_title' );
      $moderator_designation = get_sub_field( 'moderator_designation' );
				
      ?>
	  <div class="col-md-12 col-lg-12 col-xl-6">	
				
	  <h3 class="heading">Moderator</h3>
				<div class="row justify-content-center">
				
				   <!-- <div class="col-md-6 col-lg-6 col-xl-6"> -->
				<div class="item" style="margin-top: 35px;">
						<!-- <div class="item-img"> <img src="<?php // echo $moderator_image; ?>" alt=""> </div> -->
						<h3><?php echo $moderator_title; ?></h3>
						<p><?php echo $moderator_designation; ?></p>
				</div>
					 	</div>
						 </div>	
		</div>				
				   <?php	endwhile; ?>
      <?php else : endif; ?>

						
			
	
			
		</div>	
		</div>		
			</div>	
			
			
			
			
	</section>
			
	
	</main>

			  
		
<?php get_footer(); ?>



<?php //if($chair_title != ""){ ?>
<?php// }?>
<?php// if($moderator_title != ""){ ?>
<?php //} ?>
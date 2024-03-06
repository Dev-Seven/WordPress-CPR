<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cpr
 */

get_header();
?>
 
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div id="post-wrap">
 
            <header class="entry-header">
                <h2 class="entry-title"><?php _e( 'Upcoming Events' ); ?></h2>
            </header>
			
			
			 <?php $args = array( 'post_type' => 'events', 'posts_per_page' => 3
 
);
 $event_name = get_field( 'event_name' );
$event_detail_title = get_field( 'event_detail_title' );
$event_date = get_field( 'event_date' );
$event_start_time = get_field( 'event_start_time' );
$event_end_time = get_field( 'event_end_time' );
$event_location = get_field( 'event_location' );
$event = new WP_Query( $args );
 
if( $event->have_posts() ) {
 
   while($event->have_posts()) : $event->the_post(); 
$today = date('Ymd');
$events_date = get_field('event_date');
if (strtotime($today) <= strtotime($events_date)) {
?>
        <li> Event on:
          <?php $date = get_field('event_date'); $date2 = date("F j, Y", strtotime($date)); ?>
		<?php echo $date2; ?>
          <a href="<?php the_permalink() ?>">
          <?php echo $event_location ?>
          </a> </li>
        <?php } endwhile; ?>
        <?php 
}
?>
			
			
			
			
			
			
			
		<?php
	
			
			
			$time = strtotime('now'); 
			
		$args = array(
                'post_type'         => 'events',
			     'meta_query' =>  array(
					 
					  array(
						  'key' => 'event_date_end',
						  'compare' => '>',
                          'value'  => $time
						  )
					 )
		);
			
			$query = new WP_Query( $args );
//	     echo "<pre>";
//	     print_r($query);		 
//		  exit;
//			
					
			     
//$event_name = get_field( 'event_name' );
//$event_detail_title = get_field( 'event_detail_title' );
//$event_date = get_field( 'event_date' );
//$event_start_time = get_field( 'event_start_time' );
//$event_end_time = get_field( 'event_end_time' );
//$event_location = get_field( 'event_location' );
			
			while($query -> have_posts()) : $query -> the_post();
			
		?>
			 <div class="col-md-5">
					<article class="home-event">
                  <div class="event-info">
     <h3><a href="<?php echo get_permalink($post->ID);?>"><?php echo get_field('event_name'); ?></a></h3>
                    <div class="mon-date">OCT<span>20</span></div>
                  </div>
 <figure> <img src="<?php echo get_field('events_image'); ?>" alt=""> </figure>
                  <div class="bottom-event-sec">
                    <div class="event-date-info">
                      <div class="full-md"><?php echo get_field('event_date'); ?></div>
                      <div class="full-md eve-time"><?php echo get_field('event_start_time'); ?> to <?php echo get_field('event_end_time'); ?></div>
                    </div>
                    <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
                  </div>
                </article>
					 </div>
			
			<?php endwhile; ?>
			
		

			

</div>
 
    </main><!-- #main -->
</section><!-- #primary -->
 
<?php get_footer(); ?>
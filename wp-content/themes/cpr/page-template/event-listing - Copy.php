<?php
/**
 * Template Name: Event listing Templatefdad
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
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

<section id=”primary” class=”content-area”>
<main id=”main” class=”site-main”>
<div id=”post-wrap”>

<h2>Upcoming Events</h2>

<?php
	$post_date = get_the_date( 'D M j' ); echo $post_date;
	


// get today's date
$date_now = date( 'Y-m-d' );

// get posts
$posts = get_posts(array(
'post_type' => 'events',
'posts_per_page' => -1,
'meta_key' => 'event_date',
'orderby' => 'meta_value',
'order' => 'ASC',
'compare' => '>=',
'value' => $post_date,
'type' => 'DATE',
));

if( $posts ): ?>

<ul class=”events-list”>

<?php foreach( $posts as $post ):

setup_postdata( $post )

?>
<li>
<div class=”entry-content”>
<?php the_field( 'event_date' ); ?>
<?php if( get_field( 'event_date_end' ) ):
echo ' – ';
the_field( 'event_date_end' );
endif; ?>
<br/>
<span class=”event-title”><?php the_title(); ?></span>
<br />
<?php the_field( 'event_location' ) ?>
</div>
</li>

<?php endforeach; ?>

</ul>

<?php wp_reset_postdata(); ?>

<? else: ?>

<p><?php _e( 'No upcoming events are currently on the calendar.' ); ?></p>

<?php endif; ?>

<hr />

<h2>Past Events</h2>

<?php
$time = strtotime('now');
	echo $time;
// get today's date
$date_now = date( 'Y-m-d' );
$date = new DateTime('2000-12-31');

$date->modify('+1 day');
echo $date->format('Y-m-d') . "\n";
// get posts
		$post_date = get_the_date( 'D M j' ); echo $post_date;

	
	
$past_args = array(
'post_type' => 'events',
'posts_per_page' => -1,
'meta_key' => 'event_date',
'orderby' => 'meta_value',
'order' => 'DESC',
'compare' => '<=',
'value' => $post_date,
'type' => 'DATE',
);

$query_past = new WP_Query( $past_args );

if( $query_past->$posts ): ?>

<ul class=”events-list”>

<?php foreach( $query_past->$posts as $query_past->$post ):

setup_postdata( $query_past->$post )

?>
<li>
<div class=”entry-content”>
<?php the_field( 'event_date' ); ?>
<?php if( get_field( 'event_date_end' ) ):
echo ' – ';
the_field( 'event_date_end' );
endif; ?>
<br/>
<span class=”event-title”><?php the_title(); ?></span>
<br />
<?php the_field( 'event_location' ) ?>
</div>
</li>

<?php endforeach; ?>

</ul>

<?php wp_reset_postdata(); ?>

<? else: ?>

<p><?php _e( 'No past events are currently on the calendar.' ); ?></p>

<?php endif; ?>

</div>

</main><!– #main –>
</section><!– #primary
<section class="event-slider-sec">
		<div class="container">
			<div class="row">
        <div class="col-md-12">
          <h2>Featured Events</h2>
        </div>
      </div>
			<div class="event-slider slider">

				<div>
		
		<article class="home-event">
                  <div class="event-info">
                    <h3><a href="#">Virtual Panel Discussion on 'Open Government in Education: The Experience of Social Audits in India.</a></h3>
                    <div class="mon-date">OCT<span>20</span></div>
                  </div>
                  <figure> <img src="<?php echo get_template_directory_uri(); ?>/images/blog-list1.jpg" alt=""> </figure>
                  <div class="bottom-event-sec">
                    <div class="event-date-info">
                      <div class="full-md">Wednesday, 20 OCT 2021</div>
                      <div class="full-md eve-time">11:00 AM TO 12:30 PM</div>
                    </div>
                    <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
                  </div>
                </article>
		
		
		</div>
	<!--			<div>

		<article class="home-event">
                  <div class="event-info">
                    <h3><a href="#">Virtual Panel Discussion on 'Open Government in Education: The Experience of Social Audits in India.</a></h3>
                    <div class="mon-date">OCT<span>20</span></div>
                  </div>
                  <figure> <img src="<?php // echo get_template_directory_uri(); ?>/images/blog-list1.jpg" alt=""> </figure>
                  <div class="bottom-event-sec">
                    <div class="event-date-info">
                      <div class="full-md">Wednesday, 20 OCT 2021</div>
                      <div class="full-md eve-time">11:00 AM TO 12:30 PM</div>
                    </div>
                    <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
                  </div>
                </article>
		
		
		</div>
				<div>
		<article class="home-event">
                  <div class="event-info">
                    <h3><a href="#">Virtual Panel Discussion on 'Open Government in Education: The Experience of Social Audits in India.</a></h3>
                    <div class="mon-date">OCT<span>20</span></div>
                  </div>
                  <figure> <img src="<?php // echo get_template_directory_uri(); ?>/images/blog-list1.jpg" alt=""> </figure>
                  <div class="bottom-event-sec">
                    <div class="event-date-info">
                      <div class="full-md">Wednesday, 20 OCT 2021</div>
                      <div class="full-md eve-time">11:00 AM TO 12:30 PM</div>
                    </div>
                    <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
                  </div>
                </article>
		
		
		</div>
				<div>
		<article class="home-event">
                  <div class="event-info">
                    <h3><a href="#">Virtual Panel Discussion on 'Open Government in Education: The Experience of Social Audits in India.</a></h3>
                    <div class="mon-date">OCT<span>20</span></div>
                  </div>
                  <figure> <img src="<?php // echo get_template_directory_uri(); ?>/images/blog-list1.jpg" alt=""> </figure>
                  <div class="bottom-event-sec">
                    <div class="event-date-info">
                      <div class="full-md">Wednesday, 20 OCT 2021</div>
                      <div class="full-md eve-time">11:00 AM TO 12:30 PM</div>
                    </div>
                    <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
                  </div>
                </article>

		
		</div>		
-->
    </div>
			</div>
</section>
<div class="fgfg">

</div>
<div class="event-eve-sec">
    <div class="container">
		<div class="row">
		 <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3">
			 <div class="calender-sec">
		<h4>Date (MM/DD/YY)</h4>
				 
				 			 
				 
				 
					 <form autocomplete="off">
        <div class="calender-part">
                <div class="input-group input-daterange">
					<div class="start-date">
					<input type="text" id="start" class="form-control text-left">					
					<span class="fa fa-calendar" id="fa-1"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-calender.png" alt=""></span>
						</div>
					<div class="to-text">to</div>
					<div class="end-date">
					<input type="text" id="end" class="form-control text-left">
					<span class="fa fa-calendar" id="fa-2"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-calender.png" alt=""></span> 
				</div>
            </div>
        </div>
    </form> 
			  <a href="#" class="btn_1 outline">Filter Events<span>&gt;</span></a>
				 </div>
					</div>
		 <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9">
      <div class="tabs_menu">
        <div class="tab-menu-sec">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"> <a id="upcoming-events" href="#upcoming-events-tab" class="nav-link active" data-toggle="tab" role="tab">Upcoming Events</a> </li>
            <li class="nav-item"> <a id="past-events" href="#past-events-tab" class="nav-link" data-toggle="tab" role="tab">Past Events</a> </li>
          </ul>
</div>
        <div class="tab-content" role="tablist">
     <div id="upcoming-events-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="upcoming-events-tab">
            <div class="row justify-content-center">
	

<?php
 $time = strtotime('now');
	echo $time;
            // get today's date
            $date = date('Y-m-d', strtotime("+1 day"));
 
            // get posts
            $futureposts = get_posts(array(
                'post_type'         => 'events',
                'posts_per_page'    => 0,
                'meta_key'          => 'event_date',
                'meta_value'        => 'event_date',
                'orderby'           => 'meta_value',
                'order'             => 'ASC',
                'meta_compare'      => '>',
                'value'             => $date,
                'type'              => 'time',
            ));
 
			
            if( $futureposts ): ?>
 
            
 
                <?php foreach( $futureposts as $post ) : setup_postdata( $post ); ?>

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
					
 
                    <?php wp_reset_postdata(); ?>
 
                <?php endforeach; ?>
 
             
 
            <? else: ?>
 
                <p><?php _e( 'No upcoming events are currently on the calendar.' ); ?></p>
 
            <?php endif; ?>
					
          </div>
          </div>
          <!-- /tab -->
          <div id="past-events-tab" class="card tab-pane fade" role="tabpanel" aria-labelledby="past-events-tab">
            <div class="row justify-content-center">
				
				<?php
  
            // get posts
            $pastposts = get_posts(array(
                'post_type'         => 'events',
                'posts_per_page'    => 0,
                'meta_key'          => 'event_date',
                'meta_value'        => 'event_date',
                'orderby'           => 'meta_value',
                'order'             => 'DESC',
                'meta_compare'      => '<',
                'value'             => $date,
                'type'              => 'DATE',
            ));
 
            if( $pastposts ): ?>
				
				 <?php foreach( $pastposts as $post ) : setup_postdata( $post ); ?>
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
				
				<?php wp_reset_postdata(); ?>
 
                <?php endforeach; ?>
 
               
 
            <? else: ?>
 
                <p><?php _e( 'No past events are currently on the calendar.' ); ?></p>
 
            <?php endif; ?>
				
			              
            </div>
          </div>
          <!-- /tab --> 
          
          <!-- /tab --> 
        </div>
        <!-- /tab-content --> 
      </div>
		</div>
      </div>
    </div>
  </div>


<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){

$('.input-daterange').datepicker({
format: 'dd-mm-yyyy',
todayHighlight: true,
startDate: '0d'
});

});
</script>


<?php

/**
 * Template Name: Event listing Template
 * Template Post Type: post, page
 * @package cpr
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
      <h1>Events</h1>
    </div>
  </div>
</div>
</section>
<section class="event-slider-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">  
        <h2>Featured Events</h2>
      </div>
    </div>

     
    <div class="event-slider slider">
<?php
		$args = array( 'post_type' => 'events', 'posts_per_page' => 5 );
		$event_name = get_field( 'event_name' );
            $event_detail_title = get_field( 'event_detail_title' );
            $event_date = get_field( 'event_date' );
            $event_start_time = get_field( 'event_start_time' );
            $event_end_time = get_field( 'event_end_time' );
            $event_location = get_field( 'event_location' );
		
		   $event = new WP_Query( $args );
		   if ( $event->have_posts() ) {
			     while ( $event->have_posts() ): $event->the_post();
					   if (get_field('featured_events_box') == 'Yes') { 
              $event_name = get_field('event_name');
						   $title = get_the_title();
               ?>		
		
						 <div>
						<article class="home-event">
                    <div class="event-info">
                      <h3><a href="<?php echo get_permalink($post->ID);?>"><?php //echo get_field('event_name'); 
                        echo mb_strimwidth($title, 0, 60, "...");
                      ?></a></h3>
                      <div class="mon-date"><?php echo date('M', strtotime(get_field('event_date'))); ?>
						  <span><?php echo date('d', strtotime(get_field('event_date'))); ?></span></div>
                    </div>
                    <figure> <img src="<?php echo get_field('events_image'); ?>" alt=""> </figure>
                    <div class="bottom-event-sec">
                      <div class="event-date-info">
                        <div class="full-md"><?php echo get_field('event_date'); ?></div>
                        <div class="full-md eve-time"><?php echo get_field('event_start_time'); ?> to <?php echo get_field('event_end_time'); ?></div>
                      </div>
<!--                      <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>-->
                    </div>
                  </article>
					  </div>
					
			<?php } 
			   endwhile;
			} else {?>
			   <h1>No Events Found.</h1>
		
		   <?php } ?>
	  
		</div>   
	  
	
  </div>
</section>
<div class="event-eve-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-3 col-xl-4 col-xxl-3">
        <div class="calender-sec">
          <h4>Date (MM/DD/YY)</h4>         
          <!-- Start Event FIlter -->
          <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">	
          <div class="calender-part">        
              <div class="input-group input-daterange">                    
                <div class="start-date">
                  <input type="text" name="start_date" id="start" class="form-control text-left start">
                  <span class="fa fa-calendar" id="fa-1"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-calender.png" alt=""></span> </div>
                <div class="to-text">to</div>
                <div class="end-date">
                  <input type="text" name="end_date" id="end" class="form-control text-left end">
                  <span class="fa fa-calendar" id="fa-2"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-calender.png" alt=""></span> </div>
                </div>          
                <button class="btn_1 outline">Filter Events</button>
                <input type="hidden" name="action" value="myfilter">
          </div>
                 </form>
        </div>
 
        
  <!-- End Event Filter -->

      </div>
      <div class="col-md-12 col-lg-9 col-xl-8 col-xxl-9">
      <div id="response">
        
<!--<div class="tabs_menu">
          <div class="tab-menu-sec">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a id="upcoming-events" href="#upcoming-events-tab" class="nav-link active" data-toggle="tab" role="tab">Upcoming Events</a> </li>
              <li class="nav-item"> <a id="past-events" href="#past-events-tab" class="nav-link" data-toggle="tab" role="tab">Past Events</a> </li>
            </ul>
          </div> </div>
-->
			<ul class="nav nav-tabs" id="myTab">
        <li class="nav-item active"><a class="nav-link active" data-toggle="tab" id="upcoming-events" href="#upcoming-events-tab">Upcoming Events</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" id="past-events" href="#past-events-tab">Past Events</a></li>
    </ul>
          <div class="tab-content" role="tablist">
            <?php
              // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            // $args = array( 'post_type' => 'events', 
            // 'posts_per_page' => 5,
            // // 'paged' => $paged,
            //  );
            $event_name = get_field( 'event_name' );
            $event_detail_title = get_field( 'event_detail_title' );
            $event_date = get_field( 'event_date' );
            $event_start_time = get_field( 'event_start_time' );
            $event_end_time = get_field( 'event_end_time' );
            $event_location = get_field( 'event_location' );
            // $event = new WP_Query( $args );
			 
			  ?>
<!--			  <div id="upcoming-events-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="upcoming-events-tab">-->
			    <div id="upcoming-events-tab" class="tab-pane fade in active">
				   <div class="row justify-content-center">   
          <?php 
            $paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
            $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
            $args = array( 'post_type' => 'events',
               'posts_per_page' => 12,
               'paged'=> $paged1,
               'post_status' => 'publish',
               'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                 array(
                     'key' => 'event_date', // Check the start date field
                     'value' => date('Y-m-d',strtotime('now')), // Set today's date (note the similar format)
                     'compare' => '>=', // Return the ones greater than today's date
                     'type' => 'DATE',
                     'orderby'	=> 'value',
                     'order'	=> 'DESC' // Let WordPress know we're working with date
                     )
                 ),        
             );
           
             $event = new WP_Query( $args );

            if ( $event->have_posts() ) {
              while ( $event->have_posts() ): $event->the_post();
              $today = date( 'Ymd' );
              $events_date = get_field( 'event_date' );             
              $event_name = get_field('event_name');
				 $title = get_the_title();?>                   
                <div class="col-md-6">
                  <article class="home-event">
                    <div class="event-info testing">
                      <h3><a href="<?php echo get_permalink($post->ID);?>"><?php //echo get_field('event_name'); 
                          echo mb_strimwidth($title, 0, 60, "...");
                      ?></a></h3>
                      <div class="mon-date"><?php echo date('M', strtotime(get_field('event_date'))); ?>
						  <span><?php echo date('d', strtotime(get_field('event_date'))); ?></span></div>
                    </div>
                    <figure> <img src="<?php echo get_field('events_image'); ?>" alt=""> </figure>
                    <div class="bottom-event-sec">
                      <div class="event-date-info">
                        <div class="full-md"><?php echo get_field('event_date'); ?></div>
                        <div class="full-md eve-time"><?php echo get_field('event_start_time'); ?> to <?php echo get_field('event_end_time'); ?></div>
                      </div>
                    </div>
                  </article>
                </div>				 
				    <?php endwhile; ?>
                      <?php } else {?>
                    <div class="col-md-12 text-center">
                    <p class="text-center">There are no upcoming events scheduled.</p>
                    </div>
					<?php }?>  
            <div class="clear-fix"></div>
						   <div class="pagination-list">	
                  <?php 
                  $total = $event->max_num_pages;
                  $pag_args1 = array(
                    'format'  => '?paged1=%#%',
                    'current' => $paged1,
                    'total'   => $total,
                    'prev_text' => '&laquo',
                    'next_text' => '&raquo;',
                    'add_args' => array( 'paged2' => $paged2 )
                );
                echo paginate_links( $pag_args1 );
                ?>
               </div>
           
					    </div>
            </div>
          
					  
<!--					  <div id="past-events-tab" class="card tab-pane fade past-eve" role="tabpanel" aria-labelledby="past-events-tab">-->
						     <div id="past-events-tab" class="tab-pane fade">
						   <div class="row justify-content-center">
             <?php  
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $args = array( 'post_type' => 'events',
              'posts_per_page' => 12,
              'paged'=> $paged2,
              'orderby' => 'date', 
          'order' => 'ASC',
              'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                array(
                    'key' => 'event_date', // Check the start date field
                    'value' => date('Y-m-d',strtotime('now')), // Set today's date (note the similar format)
                    'compare' => '<=', // Return the ones greater than today's date
                    'type' => 'DATE' // Let WordPress know we're working with date
                    )
                ),        
            );             
              $eventPast = new WP_Query( $args );
              ?>    
				  <?php
				  if($eventPast->have_posts() ){
            while ( $eventPast->have_posts() ): $eventPast->the_post();
            $today = date( 'Ymd' );
            $events_date = get_field( 'event_date' );
            $event_name = get_field('event_name');
				 $title = get_the_title();?>		                                        
                <div class="col-md-6">
                  <article class="home-event">
                    <div class="event-info">
                      <h3><a href="<?php echo get_permalink($post->ID);?>"><?php //echo get_field('event_name'); 
                        echo mb_strimwidth($title, 0, 60, "...");
                      ?></a></h3>
                      <div class="mon-date"><?php echo date('M', strtotime(get_field('event_date'))); ?>
						  <span><?php echo date('d', strtotime(get_field('event_date'))); ?></span></div>
                    </div>
                    <figure> <img src="<?php echo get_field('events_image'); ?>" alt=""> </figure>
                    <div class="bottom-event-sec">
                      <div class="event-date-info">
                        <div class="full-md"><?php echo get_field('event_date'); ?></div>
                        <div class="full-md eve-time"><?php echo get_field('event_start_time'); ?> to <?php echo get_field('event_end_time'); ?></div>
                      </div>
<!--                      <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>-->
                    </div>
                  </article>
                </div>
							 
                <?php endwhile;?>
                	<?php } ?>  
                <div class="clear-fix"></div>
						   <div class="pagination-list">	
                  <?php 
                   $pag_args2 = array(
                    'format'  => '?paged2=%#%',
                    'current' => $paged2,
                    'total'   => $eventPast->max_num_pages,
                    'prev_text' => '&laquo',
                    'next_text' => '&raquo;',
                    'add_args' => array( 'paged1' => $paged1 )
                );
                echo paginate_links( $pag_args2 );
                        ?>
               </div>
               </div>
					   </div>
            
           
          </div>
				
					   
					 
             </div>
				  </div>
          </div>
          </div>
			
        </div>
      </div>
      </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script> 
<script>

//        if (window.location.href.indexOf("/event/page") > -1) {
//            jQuery('#past-events').addClass('active');
//            jQuery('#past-events-tab').addClass('active show');
//
//            jQuery('#upcoming-events').removeClass('active');
//            jQuery('#upcoming-events-tab').removeClass('show active');
//        }
//    
//    $(document).ready(function(){
//        if (window.location.href.indexOf("/event/page") > -1) {
//            jQuery('#past-events').addClass('active');
//            jQuery('#past-events-tab').addClass('active show');
//
//            jQuery('#upcoming-events').removeClass('active');
//            jQuery('#upcoming-events-tab').removeClass('show active');
//            
//        }
//    });
jQuery(document).ready(function(){
	jQuery('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', jQuery(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		jQuery('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script>
<script>
jQuery(document).ready(function(){

jQuery('.start').datepicker({
format: 'dd-mm-yyyy',
// todayHighlight: true,
// startDate: '0d'
});
jQuery('.end').datepicker({
format: 'dd-mm-yyyy',
// todayHighlight: true,
// startDate: '0d'
});

});


jQuery(function($){
	jQuery('#filter').submit(function(){
		var filter = jQuery('#filter');
    console.log(filter);
		jQuery.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});
</script>

<?php get_footer(); ?>

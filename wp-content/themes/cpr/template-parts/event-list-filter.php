

<?php

add_action('wp_ajax_myfilter', 'event_date_function'); 
add_action('wp_ajax_nopriv_myfilter', 'event_date_function');

function event_date_function(){		
	$start =  $_POST['start_date'];
	$startDate = date("Ymd", strtotime($start));  
	$end =  $_POST['end_date'];
	$endDate = date("Ymd", strtotime($end));  

	if( isset( $_POST['start_date'] ) && $_POST['start_date'] && isset( $_POST['end_date'] ) && $_POST['end_date'] ) {	

		$args = array(					
			'post_type' => 'events',
			'posts_per_page' => -1,
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'meta_key' => 'event_date',
			'meta_query' => array(
				array(
					'key' => 'event_date',
					'value' => array($startDate, $endDate),
					'compare' => 'BETWEEN',
					'type' => 'DATE',
				)
			)
		);

	}
	// print_r($args);
	// if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox
 
	$query = new WP_Query( $args );?>
	<!-- // print_r($query); -->
        <div class="tabs_menu">
          <div class="tab-menu-sec">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a id="upcoming-events" href="#upcoming-events-tab" class="nav-link active" data-toggle="tab" role="tab">Upcoming Events</a> </li>
              <li class="nav-item"> <a id="past-events" href="#past-events-tab" class="nav-link" data-toggle="tab" role="tab">Past Events</a> </li>
            </ul>
          </div>
          <div class="tab-content" role="tablist">
            <?php
            $args = array( 'post_type' => 'events', 'posts_per_page' => -1 );
            $event_name = get_field( 'event_name' );
            $event_detail_title = get_field( 'event_detail_title' );
            $event_date = get_field( 'event_date' );
            $event_start_time = get_field( 'event_start_time' );
            $event_end_time = get_field( 'event_end_time' );
            $event_location = get_field( 'event_location' );?>

			<div id="upcoming-events-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="upcoming-events-tab">
			<div class="row justify-content-center">  
			<?php 
			  if ( $query->have_posts() ) {
				while ( $query->have_posts() ): $query->the_post();
				$today = date( 'Ymd' );
				$events_date = get_field( 'event_date' );
				$event_name = get_field('event_name');
				   $title = get_the_title();
				if ( strtotime( $today ) <= strtotime( $events_date ) ) {?>					
					 			                            
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
								<div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
							</div>
							</article>
						</div>
					
					  <?php } endwhile; wp_reset_postdata();?>
				  <?php }  else{
					  echo 'No events found';
					  } ?>
			  </div>														   
			  </div>
			  <div id="past-events-tab" class="card tab-pane fade" role="tabpanel" aria-labelledby="past-events-tab">
			  <div class="row justify-content-center">    
				  <?php
				   if ( $query->have_posts() ) {
					while ( $query->have_posts() ): $query->the_post();
					$today = date( 'Ymd' );
					$events_date = get_field( 'event_date' );
					$event_name = get_field('event_name');
						$title = get_the_title();
					if ( strtotime( $today ) >= strtotime( $events_date ) ) {
					?>
			                                    
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
                      <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div>
                    </div>
                  </article>
                </div>
						
                <?php } endwhile; wp_reset_postdata();
				}else{
					echo 'No events found';
				} die();?>
				                         
          </div>
		  </div>
			   
		</div>
			
		</div>
		
		<?php }?>




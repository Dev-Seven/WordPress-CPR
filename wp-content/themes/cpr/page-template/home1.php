<?php
/**
 * Template Name: Home1 Template
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
<main>
	
	
	<div class="home-slider-containermain">
		<div class="slider slider-single">
		<?php

$args = array(
  'post_type' => 'homebanner',
  'order' => 'DESC',
  'post_status' => 'publish',
  'posts_per_page' => 4
);

// The Loop
$query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
		$slider_title  = get_the_title(); 
		      $content  = get_the_content(); 
		$slider_url =  get_field( 'home_slider_url' );
		
//				 echo "<pre>";
//	     print_r($myimage);		 
//		  exit;
			         ?>

	
				<div><?php the_post_thumbnail( 'full' ); ?>		 
        <div class="meta"> <div class="slc">
          <h3><?php echo mb_strimwidth($slider_title, 0, 100, "...");?></h3>
          <div class="info">
            <?php echo mb_strimwidth($content, 0, 100, "...");?>
          </div>
          <a href="<?php echo $slider_url; ?>" class="btn_1 outline">Read more<span>&gt;</span></a> </div></div></div>
				

			
		
				  <?php
		   endwhile;
}
		?>
		</div>
			<div class="slider slider-nav">
		<?php

$args = array(
  'post_type' => 'homebanner',
  'order' => 'DESC',
  'post_status' => 'publish',
  'posts_per_page' => 4
);

// The Loop
$query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
		$slider_title1  = get_the_title(); 
			         ?>
		
				<div> <div class="item-slick">
        <div class="captions">
          <h3><?php echo mb_strimwidth($slider_title1, 0, 70, "...");?></h3>
        </div>
      </div></div>
				
				
								
			
		
		  <?php
		   endwhile;
}
		?>
				</div>
		</div>
	
	
	
	
	
  
	
	
	 <?php /*?><div class="home-video-sec">
    <div class="container">
      <div class="row">
		 
		    
         <div class="col-md-6 col-lg-7 col-xl-7 col-xxl-7">
          <div class="big-video">
			  
<?php echo do_shortcode('[youtube-feed]'); ?>

			   <?php  
		  // API config 
$API_Key    = 'AIzaSyDmL8jGOrkZWwKPbTXx0pGZIFqXEgcC5sk'; 
$Channel_ID = 'UCT0LvSYjYr2gmUDhx7Z3wtw'; 
$Max_Results = 1; 
 
// Get videos from channel by YouTube Data API 
$apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_Key.''); 

if($apiData){ 
    $videoList = json_decode($apiData); 
}else{ 
    echo 'Invalid API key or channel ID.'; 
}
			  $videoItTemp = null;			 
		  ?>
		 <?php
		  if(!empty($videoList->items)){ 
    foreach($videoList->items as $item){ 
        // Embed video 
        if(isset($item->id->videoId)){ 
			
			$videoItTemp = $item->id->videoId;
			
            echo ' 
			<a href="https://www.youtube.com/embed/'.$item->id->videoId.'">
            <div class="yvideo-box"> 
                <iframe width="100%" height="463" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
				</div>
                <div class="video-text">'. $item->snippet->title .'</div> 
            </div></a>
			'; 
        } 
    } 
}else{ 
			   //$not_in_next_two[ 1 ] = '.$item->id->videoId.';
    echo '<p class="error">'.$apiError.'</p>'; 
}
		  
		   ?>	

         
          
         
        </div>
		  </div>
			 <div class="col-md-6 col-lg-5 col-xl-5 col-xxl-5"> 
		<?php  
		  // API config 
$API_Key    = 'AIzaSyDmL8jGOrkZWwKPbTXx0pGZIFqXEgcC5sk'; 
$Channel_ID = 'UCT0LvSYjYr2gmUDhx7Z3wtw'; 
$Max_Results = 4; 
 
				
				 
// Get videos from channel by YouTube Data API 
$apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_Key.''); 
	
				
				 
if($apiData){ 
    $videoList = json_decode($apiData); 
	//$not_in_next_two = '1';
}else{ 
    echo 'Invalid API key or channel ID.'; 
}
		  ?>
		 <?php
		  if(!empty($videoList->items)){ 
    foreach($videoList->items as $item){ 
        // Embed video 
        if(isset($item->id->videoId)){ 
				
			
			if($videoItTemp != $item->id->videoId)
			{
				echo ' 
			 <div class="thumb-video-sec">
          <div class="thumb-video-des">
			 <a href="https://www.youtube.com/embed/'.$item->id->videoId.'">
            <div class="yvideo-box"> 
                <iframe width="224" height="118" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
				</div>
                <div class="video-text">'. $item->snippet->title .'</div> 
            </div></a></div>'; 	
			}
        } 
    } 
}else{ 
    echo '<p class="error">'.$apiError.'</p>'; 
}
		  
		   ?>		 
			 
			 
			 
			 
			 
      </div>
    </div>
  </div>
 </div><?php */?>
	
		
	<div class="home-featured-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Featured Research</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9 card-left">
          <?php
			$args = array( 
				'post_type' => array ('books', 'briefsreports', 'bookchapters', 'workingpapers'),
				'posts_per_page' => 1, 
				'orderby' => 'ID', 
				'order' => 'DESC',
				  'meta_query' => array(
                     array(
                        'key' => 'featured_image_box', // Custom field radio button
                        'value' => 'Yes', // default set to no, so they have to check yes.
                        'compare' => '=', 
                        'type'      => 'CHAR'
                      )
                 )
			);
	
          $bigp = new WP_Query( $args );
          ?>
          <?php
			
			$postId = null;
			
          if ( $bigp->have_posts() ) {
            while ( $bigp->have_posts() ) {
              $bigp->the_post();
				//$research_image = get_field( 'research_image' );
				 $title = get_the_title();
              ?>
          <div class="card"><a href="<?php echo get_permalink( $id ) ?>"><img src="<?php echo $research_image; ?>" class="card-img-top" alt=""></a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php echo get_permalink( $id ) ?>"> <?php echo mb_strimwidth($title, 0, 60);?></a>
              </h5>
              <div class="card-text">
                <?php $content = get_the_content(); echo mb_strimwidth($content, 0, 200);?>
              </div>
				<a href="<?php  echo get_permalink( $id ) ?>research-initiatives/" class="btn_1 outline">Read More<span>&gt;</span></a>
            </div>
          </div>
          <?php
          $not_in_next_two[ 1 ] = get_the_ID();
          }

          }
          else {}
          wp_reset_postdata();
          ?>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3 card-right">
          <?php

			$next_args = array( 
				'post_type' => array ('books', 'briefsreports', 'bookchapters', 'workingpapers'),
				'posts_per_page' => 2, 
				'orderby' => 'ID', 
				'order' => 'DESC',
				'post__not_in' => $not_in_next_two,
				'meta_query' => array(
                     array(
                        'key' => 'featured_image_box', // Custom field radio button
                        'value' => 'Yes', // default set to no, so they have to check yes.
                        'compare' => '=', 
                        'type'      => 'CHAR'
                      )
                 )
			);
	
         $next_the_query = new WP_Query( $next_args );
		  ?>
          <?php
          if ( $next_the_query->have_posts() ) {
            while ( $next_the_query->have_posts() ) {
              $next_the_query->the_post();
					 $title = get_the_title();
              ?>
         <div class="card"><a href="<?php  echo get_permalink( $id ) ?>"><img src="<?php echo $research_image; ?>" class="card-img-top" alt=""> </a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php  echo get_permalink( $id ) ?>"><?php the_title(); ?> </a>
              </h5>
				<a href="<?php  echo get_permalink( $id ) ?>research-initiatives/" class="btn_1 outline">Read More<span>&gt;</span></a>
            </div>
          </div>
          <?php
				  
          }

          } else {}
          wp_reset_postdata();
          ?>
 </div>
      </div>
    </div>
  </div>
	

	<?php /*?><div class="home-featured-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Featured Research</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9 card-left">
          <?php
			$args = array( 
				'post_type' => array ('books', 'briefsreports', 'bookchapters', 'workingpapers'),
				'posts_per_page' => 1, 
				'orderby' => 'ID', 
				'order' => 'DESC',
				  'meta_query' => array(
                     array(
                        'key' => 'featured_image_box', // Custom field radio button
                        'value' => 'Yes', // default set to no, so they have to check yes.
                        'compare' => '=', 
                        'type'      => 'CHAR'
                      )
                 )
			);
	
          $bigp = new WP_Query( $args );
//			echo "<pre>";
//			print_r($bigp);
//			echo "</pre>";
//			exit;
          ?>
          <?php
          if ( $bigp->have_posts() ) {
            while ( $bigp->have_posts() ) {
              $bigp->the_post();
				//$research_image = get_field( 'research_image' );
				 $title = get_the_title();
              ?>
          <div class="card"><a href="<?php echo get_permalink( $id ) ?>"><img src="<?php echo $research_image; ?>" class="card-img-top" alt=""></a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php echo get_permalink( $id ) ?>"> <?php echo mb_strimwidth($title, 0, 60);?></a>
              </h5>
              <div class="card-text">
                <?php $content = get_the_content(); echo mb_strimwidth($content, 0, 200);?>
              </div>
				<a href="<?php  echo get_permalink( $id ) ?>research-initiatives/" class="btn_1 outline">Read More<span>&gt;</span></a>
            </div>
          </div>
          <?php
          $not_in_next_two[ 1 ] = get_the_ID();
          }

          }
          else {}
          wp_reset_postdata();
          ?>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3 card-right">
          <?php

			$next_args = array( 
				'post_type' => array ('books', 'briefsreports', 'bookchapters', 'workingpapers'),
				'posts_per_page' => 2, 
				'orderby' => 'ID', 
				'order' => 'DESC',
				//'post__not_in' => $not_in_next_two,
				'meta_query' => array(
                     array(
                        'key' => 'featured_image_box', // Custom field radio button
                        'value' => 'Yes', // default set to no, so they have to check yes.
                        'compare' => '=', 
                        'type'      => 'CHAR'
                      )
                 )
			);
	
         $next_the_query = new WP_Query( $next_args );
		  ?>
          <?php
          if ( $next_the_query->have_posts() ) {
            while ( $next_the_query->have_posts() ) {
              $next_the_query->the_post();
					 $title = get_the_title();
              ?>
         <div class="card"><a href="<?php  echo get_permalink( $id ) ?>"><img src="<?php echo $research_image; ?>" class="card-img-top" alt=""> </a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php  echo get_permalink( $id ) ?>"><?php the_title(); ?> </a>
              </h5>
				<a href="<?php  echo get_permalink( $id ) ?>research-initiatives/" class="btn_1 outline">Read More<span>&gt;</span></a>
            </div>
          </div>
          <?php
          }

          } else {}
          wp_reset_postdata();
          ?>
 </div>
      </div>
    </div>
  </div><?php */?>
	
	
	
	
	
  <?php /*?><div class="home-featured-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Featured Research</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9 card-left">
          <?php
          $args = array(
            'post_type' => 'research',
            'post_status' => 'publish',
            'posts_per_page' => '1',
          );
          $bigp = new WP_Query( $args );
          ?>
          <?php
          if ( $bigp->have_posts() ) {
            while ( $bigp->have_posts() ) {
              $bigp->the_post();
				$research_image = get_field( 'research_image' );
              ?>
          <a href="<?php  echo get_permalink( $id ) ?>">
          <div class="card"> <img src="<?php echo $research_image; ?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">
                <?php the_title(); ?>
              </h5>
              <div class="card-text">
                <?php $content = get_the_content(); echo mb_strimwidth($content, 0, 350);?>
              </div>
            </div>
          </div>
          </a>
          <?php
          $not_in_next_two[ 1 ] = get_the_ID();
          }

          }
          else {}
          wp_reset_postdata();
          ?>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3 card-right">
          <?php
          $next_args = array(
            'post_type' => 'research',
            'post_status' => 'publish',
            'posts_per_page' => 2,
            'order' => 'DESC',
            'orderby' => 'ID',
            'post__not_in' => $not_in_next_two
          );
          $next_the_query = new WP_Query( $next_args );
		
          ?>
          <?php
          if ( $next_the_query->have_posts() ) {
            while ( $next_the_query->have_posts() ) {
              $next_the_query->the_post();
					$research_image = get_field( 'research_image' );
              ?>
          <a href="<?php  echo get_permalink( $id ) ?>">
          <div class="card"> <img src="<?php echo $research_image; ?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">
                <?php the_title(); ?>
              </h5>
            </div>
          </div>
          </a>
          <?php
          }

          } else {}
          wp_reset_postdata();
          ?>
          <a href="<?php  echo get_permalink( $id ) ?>research-initiatives/" class="btn_1 outline">View More<span>&gt;</span></a> </div>
      </div>
    </div>
  </div><?php */?>
  <div class="home-event-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Events</h3>
        </div>
      </div>
      <div class="tabs_menu">
        <div class="tab-menu-sec">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"> <a id="upcoming-events" href="#upcoming-events-tab" class="nav-link active" data-toggle="tab" role="tab">Upcoming Events</a> </li>
            <li class="nav-item"> <a id="past-events" href="#past-events-tab" class="nav-link" data-toggle="tab" role="tab">Past Events</a> </li>
          </ul>
          <a href="<?php  echo get_permalink( $id ) ?>event/" class="btn_1 outline h-vaue-btn">View All Upcoming Events<span>&gt;</span></a> </div>
        <div class="tab-content" role="tablist">
          <?php
          $args = array( 'post_type' => 'events', 'posts_per_page' => 10

          );
          $event_name = get_field( 'event_name' );
          $event_detail_title = get_field( 'event_detail_title' );
          $event_date = get_field( 'event_date' );
          $event_start_time = get_field( 'event_start_time' );
          $event_end_time = get_field( 'event_end_time' );
          $event_location = get_field( 'event_location' );
          $event = new WP_Query( $args );

          ?>
          <div id="upcoming-events-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="upcoming-events-tab">
            <div class="row">
              <?php
              if ( $event->have_posts() ) {

                while ( $event->have_posts() ): $event->the_post();
                $today = date( 'Ymd' );
                $events_date = get_field( 'event_date' );
                $event_name = get_the_title();
                if ( strtotime( $today ) <= strtotime( $events_date ) ) {
                  ?>
              <div class="col-md-4">
                <article class="home-event">
                  <div class="event-info">
                    <h3><a href="<?php echo get_permalink($post->ID);?>"><?php echo mb_strimwidth($event_name, 0, 60, "...");?></a></h3>
                    <div class="mon-date"><?php echo date('M', strtotime(get_field('event_date'))); ?> <span><?php echo date('d', strtotime(get_field('event_date'))); ?></span></div>
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
              <?php } endwhile; ?>
            </div>
          </div>
          <div id="past-events-tab" class="card tab-pane fade" role="tabpanel" aria-labelledby="past-events-tab">
            <div class="row">
              <?php
              while ( $event->have_posts() ): $event->the_post();
              $today = date( 'Ymd' );
              $events_date = get_field( 'event_date' );
              $event_name = get_the_title();
              if ( strtotime( $today ) >= strtotime( $events_date ) ) {
                ?>
              <div class="col-md-4">
                <article class="home-event">
                  <div class="event-info">
                    <h3><a href="<?php echo get_permalink($post->ID);?>"><?php echo mb_strimwidth($event_name, 0, 60, "...");?></a></h3>
                    <div class="mon-date"><?php echo date('M', strtotime(get_field('event_date'))); ?> <span><?php echo date('d', strtotime(get_field('event_date'))); ?></span></div>
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
              <?php } endwhile; ?>
            </div>
          </div>
          <?php
          }
          ?>
          
          <!-- /tab --> 
        </div>
		   <a href="<?php  echo get_permalink( $id ) ?>event/" class="btn_1 outline m-vaue-btn">View All Upcoming Events<span>&gt;</span></a>
        <!-- /tab-content --> 
      </div>
      <!-- /tabs_menu--> 
      
    </div>
    <!-- /container --> 
  </div>	
	
	
	
	
  
  
</main>
<?php get_footer(); ?>




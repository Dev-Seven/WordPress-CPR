<?php
/**
 * Template Name: Home Template
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
  'orderby' => 'menu_order',
  'order' => 'ASC',
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
		$home_slider_button_text =  get_field( 'home_slider_button_text' );
		$home_mobile_banner_image =  get_field( 'home_mobile_banner_image' );
		
//				 echo "<pre>";
//	     print_r($myimage);		 
//		  exit;
			         ?>

	
				<div><?php the_post_thumbnail( 'full' ); ?><img src="<?php echo $home_mobile_banner_image;?>" class="mob_banner"/> 
        <div class="meta"> <div class="slc">
          <h3><?php echo mb_strimwidth($slider_title, 0, 100, "...");?></h3>
          <div class="info">
            <?php echo mb_strimwidth($content, 0, 100, "...");?>
          </div>
          <a href="<?php echo $slider_url; ?>" class="btn_1 outline"><?php echo $home_slider_button_text;?><span>&gt;</span></a> </div></div></div>
				

			
		
				  <?php
		   endwhile;
}
		?>
		</div>
			<div class="slider slider-nav">
		<?php

$args = array(
  'post_type' => 'homebanner',
  'orderby' => 'menu_order',
  'order' => 'ASC',
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
  <?php /*?><div class="home-slider-container">
    <div class="slider-for">
<?php

$args = array(
  'post_type' => 'homebanner',
  'order' => 'DESC',
  'post_status' => 'publish',
  'posts_per_page' => 4
);


$query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
		$slider_title  = get_the_title(); 
		      $content  = get_the_content(); 
		$slider_url =  get_field( 'home_slider_url' );
		

			         ?>

      <div class="item-slick"><?php the_post_thumbnail( 'full' ); ?><img src="<?php echo $myimage; ?>" alt="">
        <div class="meta">
          <div class="slc">
            <h3><?php echo mb_strimwidth($slider_title, 0, 100, "...");?></h3>
            <div class="info">
             <?php echo mb_strimwidth($content, 0, 100, "...");?>
            </div>
            <a href="<?php echo $slider_url; ?>" class="btn_1 outline">Read more<span>&gt;</span></a> </div>
        </div>
      </div>
		
		  <?php
		   endwhile;
}
		?>

            

    
    </div>
    <div class="slider-nav slider-center-mode">
		<?php

$args = array(
  'post_type' => 'homebanner',
  'order' => 'DESC',
  'post_status' => 'publish',
  'posts_per_page' => 4
);


$query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
		$slider_title1  = get_the_title(); 
			         ?>
      <div class="item-slick">
        <div class="captions">
          <h3><?php echo mb_strimwidth($slider_title1, 0, 70, "...");?></h3>
        </div>
      </div>
			
		  <?php
		   endwhile;
}
		?>

    </div>
  </div><?php */?>
<?php
	$youtube_video_url =  get_field( 'youtube_video_url' );	
	$youtube_video_content =  get_field( 'youtube_video_content' );	
	$youtube_video_url1 =  get_field( 'youtube_video_url1' );	
	$youtube_video_content1 =  get_field( 'youtube_video_content1' );	
	$youtube_video_url2 =  get_field( 'youtube_video_url2' );	
	$youtube_video_content2 =  get_field( 'youtube_video_content2' );	
		$youtube_video_url3 =  get_field( 'youtube_video_url3' );	
	$youtube_video_content3 =  get_field( 'youtube_video_content3' );
	?>
	<div class="home-video-sec">
    <div class="container">
      <div class="row">
		   <div class="col-md-12">
		 <h3>Videos</h3>
		  </div> 
         <div class="col-md-12 col-lg-6 col-xl-7 col-xxl-7">
          <div class="big-video">
		<?php 
    // echo $youtube_video_url; 
    // exit;
    ?>
          
			  <iframe width="100%" height="463" src="<?php the_field('youtube_video_url', 88);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			  <div class="video-text"><?php the_field('youtube_video_content', 88);?></div>
          

        </div>
			  </div>
			 <div class="col-md-12 col-lg-6 col-xl-5 col-xxl-5"> 
			<div class="thumb-video-sec small-video">	 
				        <div class="thumb-video-des">
    
		<figure><iframe width="224" height="118" src="<?php the_field('youtube_video_url1',88 );?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
		  <div class="video-text"><?php echo the_field('youtube_video_content1',88);?></div>
			</div>
				 <div class="thumb-video-des">
     
		<figure><iframe width="224" height="118" src="<?php the_field('youtube_video_url2',88 );?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
		  <div class="video-text"><?php the_field('youtube_video_content2',88);?></div>
			</div>
				
				 <div class="thumb-video-des">
  
		<figure><iframe width="224" height="118" src="<?php the_field('youtube_video_url3',88);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
		  <div class="video-text"><?php the_field('youtube_video_content3',88);?></div>
			</div>
         
			 <a href="https://www.youtube.com/channel/UCT0LvSYjYr2gmUDhx7Z3wtw" class="btn_1 outline" target="_blank">View More<span>&gt;</span></a>

    </div>
		
			 
      </div>
    </div>
  </div>
 </div>
	
	<?php /*?><div class="home-video-sec">
    <div class="container">
      <div class="row">
		   <div class="col-md-12">
		 <h3>Videos</h3>
		  </div> 
         <div class="col-md-12 col-lg-6 col-xl-7 col-xxl-7">
          <div class="big-video">
			  
<?php //echo do_shortcode('[youtube-feed]'); ?>

			   <?php  
		  // API config 
$API_Key    = 'AIzaSyBf_0tRwm5_XyXtsejCPYFXVf9iPkLX65Q'; 
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
			 <div class="col-md-12 col-lg-6 col-xl-5 col-xxl-5"> 
		<?php  
		  // API config 
$API_Key    = 'AIzaSyBf_0tRwm5_XyXtsejCPYFXVf9iPkLX65Q'; 
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
 </div>
	</div><?php */?>
		
	<div class="home-featured-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Featured Research</h3>
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
          <div class="card"><a href="<?php echo get_permalink( $id ) ?>"><?php the_post_thumbnail();?></a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php echo get_permalink( $id ) ?>"> <?php echo mb_strimwidth($title, 0, 60);?></a>
              </h5>
              <div class="card-text">
                <?php $content = get_the_content(); echo mb_strimwidth($content, 0, 200);?>
              </div>
				<a href="<?php  echo get_permalink( $id ) ?>" class="btn_1 outline">Read More<span>&gt;</span></a>
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
         <div class="card"><a href="<?php  echo get_permalink( $id ) ?>"><?php the_post_thumbnail();?></a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php  echo get_permalink( $id ) ?>"><?php the_title(); ?> </a>
              </h5>
				<a href="<?php  echo get_permalink( $id ) ?>" class="btn_1 outline">Read More<span>&gt;</span></a>
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
		 <div class="home-podcast-sec">
			  <div class="container">
 <div class="row">
		   <div class="col-md-12">
		 <h3>India Speak: The CPR Podcast</h3>
		  </div> 
	  </div> 
				   </div> 
			 <div class="container-fuild text-center">

<?php if( get_field('podcast_image', '88') ): ?>
			<a href="podcast" target="_blank">
    <img src="<?php the_field('podcast_image','88'); ?>" height="300px"  />
			</a>
<?php endif; ?>
 </div> </div>
	  <div class="row">
		   <div class="col-md-12"></div> </div>
		
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
          </div>
          <div class="tab-content" role="tablist">
            <?php
            $args1 = array( 'post_type' => 'events', 'posts_per_page' => 2);
            $event_name = get_field( 'event_name' );
            $event_detail_title = get_field( 'event_detail_title' );
            $event_date = get_field( 'event_date' );
            $event_start_time = get_field( 'event_start_time' );
            $event_end_time = get_field( 'event_end_time' );
            $event_location = get_field( 'event_location' );
            $event = new WP_Query( $args1 );
            $count = $event->post_count;
			  ?>
			  <div id="upcoming-events-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="upcoming-events-tab">
				   <!-- <div class="row justify-content-center">    -->
           <div class="row"> 
          <?php 
					     $args = array( 'post_type' => 'events',
               'posts_per_page' => 3,              
               'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                 array(
                     'key' => 'event_date', // Check the start date field
                     'value' => date('Y-m-d',strtotime('now')), // Set today's date (note the similar format)
                     'compare' => '>=', // Return the ones greater than today's date
                     'type' => 'DATE',
//                     'orderby'	=> 'value',
//	                  'order'	=> 'DESC' // Let WordPress know we're working with date
                     )
                 ),  
									   'orderby' => "meta_value",
				  'meta_type' => 'DATE',
			   'order' => 'DESC',
             );
					   $event = new WP_Query($args);
          if ( $event->have_posts() ) {
              while ( $event->have_posts() ): $event->the_post();
         
             $today  = date('Y-m-d',strtotime('now'));
//			  echo $today;
              $events_date = date('Y-m-d',strtotime(get_field( 'event_date' )));
//			  echo $events_date;
              $event_name = get_field('event_name');
				      $title = get_the_title();?>
          
                 <div class="col-md-6 col-lg-6 col-xl-4">
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
                       <div class="add-calender"><a href="https://calendar.google.com/calendar/u/0?cid=amk5dTBvcWw0dG11Y3ZrcGMwODZndWlzdGNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ" target="_blank">ADD TO CALENDAR</a></div>
                    </div>
                  </article>
                </div>
				 
				    <?php  endwhile;  ?>
                    
                    <?php } else {?>
                    <div class="col-md-12 text-center">
                    <p class="text-center">There are no upcoming events scheduled.</p>
                    </div>
					<?php } ?>  
					    </div>
            </div>
          
					  
					  <div id="past-events-tab" class="card tab-pane fade" role="tabpanel" aria-labelledby="past-events-tab">
						   <div class="row justify-content-center">
				  <?php
			   $args = array( 'post_type' => 'events',
          'posts_per_page' => 3,
//          'orderby' => 'date', 
//          'order' => 'ASC',
          'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
            array(
                'key' => 'event_date', // Check the start date field
                'value' => date('Y-m-d',strtotime('now')), // Set today's date (note the similar format)
                'compare' => '<=', // Return the ones greater than today's date
               'type' => 'DATE', // Let WordPress know we're working with date
//                     'orderby'	=> 'value',
//	                  'order'	=> 'DESC',
                )
            ), 
							 'orderby' => "meta_value",
				  'meta_type' => 'DATE',
			   'order' => 'DESC',
        );
			  $eventPast = new WP_Query( $args );
			if($eventPast->have_posts() ){
				while ( $eventPast->have_posts() ): $eventPast->the_post();
        $today  = date('Y-m-d',strtotime('now'));
        $events_date = date('Y-m-d',strtotime(get_field( 'event_date' )));
            $event_name = get_field('event_name');
				 $title = get_the_title();?>           						      
                 <div class="col-md-6 col-lg-6 col-xl-4">
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
                      <!-- <div class="add-calender"><a href="#">ADD TO CALENDAR</a></div> -->
                    </div>
                  </article>
                </div>
							 
                <?php endwhile; ?>
				
			<?php }  ?>
            
					   </div>
            
           
          </div>
					   
					  </div>
             </div>
      <!-- /tabs_menu--> 
      
    </div>
    <!-- /container --> 
  </div>	
		<?php //$podcast_banner = get_field( 'podcast_banner' );?>
 
  
</main>
<?php get_footer(); ?>




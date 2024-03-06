<?php 
          
          $args = array(  
        'post_type' => 'events',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'order' => 'ASC',
        'cat' => 'home',
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
       
     
        the_excerpt(); 
    endwhile;
?>
   
 <?php
 $today = date('d/m/Y');

try {
    $args = array(
        'post_type' => 'events',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'value' => $today,
                'type' => 'DATE',
                'compare' => '>='
            )
        ),
        'meta_key' => 'event_date',
    );

    $upcomingEvents = new WP_Query($args);

    if ( $upcomingEvents->have_posts() ) {

        while ( $upcomingEvents->have_posts() ) {

            $upcomingEvents->the_post();

            // now $query->post is WP_Post Object, use:
            // $query->post->ID, $query->post->post_title, etc.

        }
    }

    wp_reset_postdata();

} catch (\Exception $ex) {
    error_log($ex);
}

?>
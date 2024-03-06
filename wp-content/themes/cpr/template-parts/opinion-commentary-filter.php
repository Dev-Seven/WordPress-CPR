<?php
function data_fetch_oc() {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $the_query = new WP_Query( 
  array( 
  'posts_per_page' => -1,
   's' => esc_attr( $_POST[ 'keyword' ] ),
    'post_type' => 'opinions'
	    //'paged' => $paged
	 )
	 );
  if ( $the_query->have_posts() ):
?>
	 <div class="row">
					<?php
    while ( $the_query->have_posts() ): $the_query->the_post();
  $opinion_published_date = get_field( 'opinion_published_date' );
  $opinion_publisher_journal_name = get_field( 'opinion_publisher_journal_name' );
  $opinion_link = get_field( 'opinion_link' );
  $opinion_pdf = get_field( 'opinion_pdf' );
  $opinion_image = get_field( 'opinion_image' );
  $author_name = get_field( 'author_name' );
  $title = get_the_title();

  ?>

<div class="col-md-6 col-lg-6 col-xl-4">
  <div class="item">
    <div class="head-sec"> <a href="<?php echo $opinion_link; ?>" class="opinionlink" target="_blank">
      <h5><?php echo mb_strimwidth($title, 0, 40, "..."); ?></h5>
      </a> </div>
  
    <div class="bottom-sec">
      <div class="author-name">
		  	 <h5>
             <?php

 $documents = get_posts(array(
    'post_type' => 'people',
    'meta_query' => array(
     array(
          'key' => 'opinions_detail', // name of custom field
          'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
          'compare' => 'LIKE'
             )
          )
       ));
 if( $documents ): ?>
                  
                  <?php 
                  
                  $numItems = count($documents);
                  $i = 0;
                  ?>                   
                  <?php foreach( $documents as $key=>$document): 
                     ?>
                      <?php
                    if(++$i === $numItems) { ?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
						   <?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 110, "")
						  ?>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                       <?php //echo get_the_title ( $document->ID ).','; ?>
						 <?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 110, "").',';
						  ?>  
						  
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
				 <?php if ($author_name != "") {
            // echo "<br>";echo "".$author_name; echo "<br>";
	echo "<br>";echo mb_strimwidth($author_name, 0, 50, "...");
 } ?>
 </h5>  
		  
		  
      </div>
<?php /*?>      <div class="op-date"> <a href="<?php echo $opinion_link; ?>" class="opinionlink" target="_blank">
        <div class="publisher-name"><?php echo $opinion_publisher_journal_name; ?><br>
          <?php echo $opinion_published_date; ?></div>
        </a> </div><?php */?>
    </div>
  </div>
</div>
   <?php endwhile;?>
    
		  </div>
		<?php else:?>
    <p class="text-center"><?php _e('Sorry, We did not find searched result.'); ?></p>
    
   
    
<?php
wp_reset_postdata();
endif;

die();
}

?>
	





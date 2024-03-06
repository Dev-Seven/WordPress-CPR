
<?php function data_fetch_project(){

    $the_query = new WP_Query( array( 'posts_per_page' => 1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'project' ) );
    if( $the_query->have_posts() ) :?>

 <div class="row">
	 <?php
        while( $the_query->have_posts() ): $the_query->the_post();
   $wp_author_name = get_field( 'author_name' );
              $publisher_name = get_field( 'publisher_name' );
              $published_date = get_field( 'published_date' );  
			  $title  = get_the_title(); 
		      $content  = get_the_content(); 
		  ?>
		  
		   <div class="col-md-6 col-lg-6 col-xl-4">
			 
          <div class="item">
            <div class="item-content">
              <div class="item-booktext">
				   <a href="<?php  echo get_permalink( $id ) ?> ">
                <h3><?php echo mb_strimwidth($title, 0, 70, "..."); ?></h3>
					   </a>
              <?php /*?> <p><?php echo mb_strimwidth($content, 0, 60, "..."); ?></p><?php */?>
              </div>
				
				<div class="bottom-sec">
                                <div class="author-name">
                                  
									  <h5><?php echo $wp_author_name; ?>
             <?php

 $documents = get_posts(array(
    'post_type' => 'people',
    'meta_query' => array(
     array(
          'key' => 'project_detail', // name of custom field
          'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
          'compare' => 'LIKE'
             )
          )
       ));
    //    echo "<pre>";
    //    print_r($documents);
    //    echo "</pre>";
    //    exit;
 ?>
   <?php if( $documents ): ?>
                  <?php foreach( $documents as $document ): ?>

                    <?php if (get_the_title ( $document->ID ) != "") { ?>
										  <?php /*?> <a href="<?php  echo get_permalink( $id ) ?> "><?php */?>
                    By <?php echo get_the_title ( $document->ID ); ?> 
                        <?php  echo "<br>"; ?>
                   <?php /*?></a>	<?php */?>
                      <?php } ?>

                  <?php endforeach; ?>
                  <?php endif; ?>
					
                 </h5>
								
									
                                </div>
                                <div class="ja-date">
									<a href="<?php  echo get_permalink( $id ) ?> ">
									 <div class="publisher-name">
										 <?php if ($publisher_name != "") {?><?php echo mb_strimwidth($publisher_name, 0, 30, "..."); ?><?php } ?><br><?php if ($published_date != "") {?><?php echo $published_date; ?><?php } ?>
										 </div>
                                </a>
                                </div>
                            </div>
             
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
}?>


           


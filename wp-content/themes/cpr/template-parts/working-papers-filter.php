
<?php function data_fetch_wp(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'workingpapers' ) );
    if( $the_query->have_posts() ) :?>
<div class="row">
	<?php
        while( $the_query->have_posts() ): $the_query->the_post();
   $wp_author_name = get_field( 'wp_author_name' );
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
              <p><?php echo mb_strimwidth($content, 0, 300, "..."); ?></p>
              </div>
				
				<div class="bottom-sec">
                                <div class="author-name">
                                  
							<h5>
             <?php

 $documents = get_posts(array(
    'post_type' => 'people',
    'meta_query' => array(
     array(
          'key' => 'working_papers_detail',
          'value' => '"' . get_the_ID() . '"', 
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
						  echo mb_strimwidth($authorname, 0, 110, "...")
						  ?>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
						   <?php $authorname = get_the_title ( $document->ID ); 
						 echo mb_strimwidth($authorname, 0, 110, "").',';
						  ?>
                       <?php //echo get_the_title ( $document->ID ).','; ?>
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
				 <?php if ($wp_author_name != "") {
            // echo "<br>";echo "".$wp_author_name;
	 echo "<br>";echo mb_strimwidth($wp_author_name, 0, 50, "...");
 } ?>

					
                 </h5>	
									
									
									
									
									  <?php //echo $wp_author_name; ?>
            <?php /*?><h5> <?php

 $documents = get_posts(array(
    'post_type' => 'people',
    'meta_query' => array(
     array(
          'key' => 'working_papers_detail', 
          'value' => '"' . get_the_ID() . '"',
          'compare' => 'LIKE'
             )
          )
       ));
 ?>
   <?php if( $documents ): ?>
                  <?php foreach( $documents as $document ): ?>

                    <?php if (get_the_title ( $document->ID ) != "") { ?>
                    By <?php echo get_the_title ( $document->ID ); ?> 
                        <?php  echo "<br>"; ?>
                      <?php } ?>
                  <?php endforeach; ?>
                  <?php endif; ?> </h5><?php */?>
					
                
								
									
                                </div>
                                <?php /*?><div class="ja-date">
									<a href="<?php  echo get_permalink( $id ) ?> ">
									 <div class="publisher-name">
										 <?php if ($publisher_name != "") {?><?php echo mb_strimwidth($publisher_name, 0, 30, "..."); ?><?php } ?><br><?php if ($published_date != "") {?><?php echo $published_date; ?><?php } ?>
										 </div>
                                </a>
                                </div><?php */?>
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



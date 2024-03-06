
<?php function data_fetch_pbr(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'briefsreports' ) );
    if( $the_query->have_posts() ) :?>
<div class="row">
	<?php
        while( $the_query->have_posts() ): $the_query->the_post();
   $briefs_reports_publisher_name = get_field( 'briefs_reports_publisher_name' );
      $briefs_reports_author = get_field( 'briefs_reports_author' );
      $briefs_reports_published_date = get_field( 'briefs_reports_published_date' );
      $briefs_reports_image = get_field( 'briefs_reports_image' );
      $briefs_reports_pdf = get_field( 'briefs_reports_pdf' );
      $title = get_the_title();
 $content = get_the_content();
      ?>

      <div class="col-md-6 col-lg-6 col-xl-4">
						 
                        <div class="item">
                            <div class="head-sec">
								 <a href="<?php echo get_permalink( $id ) ?>">
                                <h5><?php echo mb_strimwidth($title, 0, 40, "...");?></h5>
									</a>
                                     <p><?php echo mb_strimwidth($content, 0, 300, "..."); ?></p>
                            </div>

                            <div class="bottom-sec">
                               <div class="author-name">
								    <h5>
             <?php
              $documents = get_posts( array(
                'post_type' => 'people',
                'meta_query' => array(
                  array(
                    'key' => 'briefs_reports', // name of custom field
                    'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                    'compare' => 'LIKE'
                  )
                )
              ) );
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
						  echo mb_strimwidth($authorname, 0, 110, "...");
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
				 <?php if ($briefs_reports_author != "") {
             //echo "<br>";echo "".$briefs_reports_author; echo "<br>";
	echo "<br>";echo mb_strimwidth($briefs_reports_author, 0, 50, "...");
 } ?>
					
                 </h5>
                                
                                
                                </div>
                               <?php /*?> <div class="op-date">
									
									
									<a href="<?php echo $opinion_link; ?>" class="opinionlink" target="_blank">
									 <div class="publisher-name"><?php echo $briefs_reports_publisher_name; ?><br><?php if ($briefs_reports_published_date != "") {?>
              <div class="pub-date">Published : <?php echo $briefs_reports_published_date; ?></div>
              <?php } ?></div>
                               </a>
                                </div><?php */?>
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





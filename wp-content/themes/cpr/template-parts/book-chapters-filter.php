
<?php function data_fetch_bc(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'bookchapters' ) );
    if( $the_query->have_posts() ) :?>
  <div class="row">
	  <?php
        while( $the_query->have_posts() ): $the_query->the_post();
 
$book_chapters_title = get_field( 'book_chapters_title' );
$author_name = get_field( 'author_name' );
$publisher_edit_text = get_field( 'publisher_edit_text' );
$book_image = get_field( 'book_image' );
			  	  $title  = get_the_title();       
	$published_date = get_field( 'published_date' );		           
	?>
		 	 <div class="col-md-6 col-lg-6 col-xl-4">
				
				  <div class="item">
					<div class="item-img">
						<a href="<?php  echo get_permalink( $id ) ?> ">
                <?php if ($book_image != "") { ?>
                     <img src="<?php echo $book_image; ?>" alt=""> 
                <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image.png" />
                <?php } ?>
              </a>
            </div>
					<div class="item-content">
					  <div class="item-booktext">
						  <a href="<?php  echo get_permalink( $id ) ?> ">
						  <h3><?php echo mb_strimwidth($title, 0, 40, "...");?></h3>
						   <p><?php echo mb_strimwidth($publisher_edit_text, 0, 50, "...");?></p>
						  </a>
						    <?php if ($published_date != "") {?>
						<div class="pub-date"><?php echo $published_date; ?></div>
						  <?php } ?>
					  </div>
						
					  <div class="publisher-name">
						   <span class="d-block">By,</span> 
						  <?php 
		 $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'book_chapters_name', // name of custom field
                              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                              'compare' => 'LIKE'
                                  )
                              )
                          ));
          if( $documents ): ?>
                    <?php ?>
                  <?php //echo "<br>"; ?>
                  <?php 
                  
                  $numItems = count($documents);
                  $i = 0;
                  ?>                   
                  <?php foreach( $documents as $key=>$document): 
                     ?>
                      <?php
                    if(++$i === $numItems) { ?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                      <span><?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 50, "...")
						  ?></span>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                       <span><?php //echo get_the_title ( $document->ID ).','; ?><?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 50, "").',';
						  ?></span>
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
				<span class="sauthorname"><?php if ($author_name != "") {
	 //echo "<br>";
	$name = mb_strimwidth($author_name, 0, 30, "..."); 
echo "".$name;
 } ?>					</span>
						  
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



   
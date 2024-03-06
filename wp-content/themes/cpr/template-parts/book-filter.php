
<?php function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'books' ) );
    if( $the_query->have_posts() ) :
	?>
	 <div class="row">
					<?php
        while( $the_query->have_posts() ): $the_query->the_post();
  $author_name = get_field( 'author_name' );
      $book_image = get_field( 'book_image' );
      $published_date = get_field( 'published_date' );
      $title = get_the_title();

?>
  
          <div class="col-md-6 col-lg-6 col-xl-4"> <a href="<?php echo get_permalink( $id ) ?> ">
        <div class="item">
          <div class="item-img">
                <?php if ($book_image != "") { ?>
                    <img src="<?php echo $book_image; ?>" alt="">
                <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image.png" />
                <?php } ?>
              
              </div>
          <div class="item-content">
            <div class="item-booktext">
              <h3><?php echo mb_strimwidth($title, 0, 40, "...");?></h3>
              <?php if ($published_date != "") {?>
              <div class="pub-date">Published : <?php echo $published_date; ?></div>
              <?php } ?>
            </div>
            <div class="publisher-name">
				 <span class="d-block">By,</span>
				<?php 
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'books_article_name', 
                              'value' => '"' . get_the_ID() . '"', 
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
				<span class="sauthorname">			
					<?php if ($author_name != "") {
	 //echo "<br>";
	$name = mb_strimwidth($author_name, 0, 30, "..."); 
echo "".$name;
 } ?>					</span>
           </div>
          </div>
        </div>
        </a> </div>

        <?php endwhile;?>
		  </div>
		<?php else:?>
    <p class="text-center"><?php _e('Sorry, We did not find searched result.'); ?></p>
<?php
        wp_reset_postdata();  
    endif;

    die();
}?>




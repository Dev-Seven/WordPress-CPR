

<div class="books-listing book-list">
  <div class="container">
       <div class="row">
     <?php

      $custom_orderby = isset( $_GET[ 'orderby' ] ) ? sanitize_text_field( $_GET[ 'orderby' ] ) : "";

      if ( isset( $_GET[ 'orderby' ] ) && $_GET[ 'orderby' ] != "" ):

        if ( !empty( $custom_orderby ) && "id" == $custom_orderby ):
          $args = new WP_Query( array(
            'post_type' => 'books',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => "id",
            'order' => 'DESC',
          ) );
      endif;

      if ( !empty( $custom_orderby ) && "date" == $custom_orderby ):
        $args = new WP_Query( array(
          'post_type' => 'books',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby' => "post_title",
          'order' => 'ASC',
        ) );
      endif;
      else :

        $args = new WP_Query( array(
          'post_type' => 'books',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby' => "date",
          'order' => 'DESC',
        ) );
      endif;


      ?>
      <?php
      while ( $args->have_posts() ): $args->the_post();

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
            <div class="publisher-name"><span><?php echo mb_strimwidth($author_name, 0, 30, "..."); ?>
              <?php
              $documents = get_posts( array(
                'post_type' => 'people',
                'meta_query' => array(
                  array(
                    'key' => 'books_article_name', // name of custom field
                    'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                    'compare' => 'LIKE'
                  )
                )
              ) );
              ?>
              <?php if( $documents ): ?>
              <?php foreach( $documents as $document ): ?>
              <?php echo get_the_title( $document->ID, 0, 30, "..." ); ?>
              <?php endforeach; ?>
              <?php endif; ?>
              </span></div>
          </div>
        </div>
        </a> </div>
                



      <?php endwhile; ?>

    <?php /*?><?php  echo do_shortcode('[ajax_load_more id="7810736940" container_type="div" css_classes="large-4" post_type="books" posts_per_page="8" offset="8" images_loaded="true" transition_container_classes="large4" progress_bar="true" progress_bar_color="ed7070"]'); ?><?php */?>
    </div>
    <!-- /tabs_menu--> 
  </div>
  <!-- /container --> 
 </div>

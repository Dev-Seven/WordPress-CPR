<div class="marquee-main">
<marquee bgcolor="#2c314c" direction="left" scrolldelay="90" behavior="scroll">
	<?php
        $args = array(
			'post_type' => array ('post', 'books', 'research'),
				'posts_per_page' => 3, 
				'orderby' => 'ID', 
				'order' => 'DESC',
				'post__not_in' => $not_in_next_two,
				'meta_query' => array(
                     array(
                        'key' => 'featured_highlight_box', // Custom field radio button
                        'value' => 'Yes', // default set to no, so they have to check yes.
                        'compare' => '=', 
                        'type'      => 'CHAR'
                      )
                 )
        );
        $query = new WP_Query( $args );
         if ( $query->have_posts() ) {
          while ( $query->have_posts() ): $query->the_post();
          $highlighttitle = get_the_title();
          $post_date = get_the_date( 'M jS' );
          ?>
<p><a href="<?php echo get_permalink(get_the_ID());?>"><span class="date"><?php echo $post_date; ?>:</span><?php echo mb_strimwidth($highlighttitle, 0, 60, "..."); ?></a></p>
	 <?php
        endwhile;
        }
		  wp_reset_postdata();
        ?>
</marquee>
</div>



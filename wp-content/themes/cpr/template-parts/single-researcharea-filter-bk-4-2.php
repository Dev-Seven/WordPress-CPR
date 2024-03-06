
<?php function data_fetch_single_research7(){ ?>

  <div id="tab7" class="tab_content" style="display:block;">
        <?php 
        $test = array(            
          'post_type' => 'workingpapers',
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                'value' => esc_attr( $_POST['keyword7'] ),
                'compare' => 'LIKE'
                )
            )
          );
          $allCategories = new WP_Query($test);
        ?>

        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
         <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $wptitle = get_the_title( $document->ID );?>
                                    <div class="tab-news-sec">
                                        <div class="tab-news-text">            
                                            <h3><?php echo mb_strimwidth($wptitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
                                        </div>
                                        <div class="news-date">
                                            <p><?php echo the_field("published_date", $document->ID ); ?></p>
                                            <p><?php echo the_field("wp_author_name", $document->ID ); ?></p>
                                        </div>
                                    </div>
                                    </a>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>

<?php function data_fetch_single_research6(){ 
  ?>
  <div id="tab6" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'briefsreports',
          's' => esc_attr( $_POST['keyword6'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            // 'meta_query' => array(
            //     array(
            //     'value' => esc_attr( $_POST['keyword6'] ),
            //     'compare' => 'LIKE'
            //     )
            // )
//			 'meta_query' => array(
//                                    array(
//                                    'key' => 'briefs_reports_research_area_details',
//                                    'value' => '"' . get_the_ID() . '"',
//                                    'compare' => 'LIKE'
//                                    )
//                                )
          );
          $allCategories = new WP_Query($test1);
          // print_r($allCategories);
        ?>

        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
	    <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $brtitle = get_the_title( $document->ID );?>
                                    <div class="tab-news-sec">
                                        <div class="tab-news-text">
                                            <h3><?php echo mb_strimwidth($brtitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php echo the_field("briefs_reports_publisher_name", $document->ID ); ?></p>
                                        </div>
                                        <div class="news-date">
                                            <p><?php echo the_field("briefs_reports_published_date", $document->ID ); ?></p>
                                            <p><?php echo the_field("briefs_reports_author", $document->ID ); ?></p>
                                        </div>
                                    </div>
                                </a>
	  
	  
	  
     <?php /*?>   <a href="<?php echo get_permalink(); ?>" target="_blank">					
            <div class="tab-news-sec">
                <div class="tab-news-text">
                    <h3><?php echo get_the_title(); ?>   			  
                    </h3>
                    <p><?php echo the_field("opinion_publisher_journal_name"); ?><?php echo the_field("publisher_name"); ?>
                    <?php echo the_field("publisher_edit_text" ); ?></p>
                </div>
                <div class="news-date">
                    <p>
                    <?php echo the_field("published_date"); ?><?php echo the_field("briefs_reports_published_date"); ?>
                    </p>
                    <p><?php echo the_field("author_name"); ?><?php echo the_field("briefs_reports_author"); ?><?php echo the_field("wp_author_name"); ?></p>
                </div>
            </div>
        </a><?php */?>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>

<?php function data_fetch_single_research2(){ 
  ?>
  <div id="tab2" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'opinions',
          's' => esc_attr( $_POST['keyword2'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            // 'meta_query' => array(
            //     array(
            //     'value' => esc_attr( $_POST['keyword6'] ),
            //     'compare' => 'LIKE'
            //     )
            // )
          );
          $allCategories = new WP_Query($test1);
          // print_r($allCategories);
        ?>

        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
	   <?php 
		  $opinion_link = get_field( 'opinion_link' );
		  $optitle = get_the_title( $document->ID );
		  ?>
        <a href="<?php echo the_field("opinion_link", $document->ID ); ?>" target="_blank">					
            <div class="tab-news-sec">
                <div class="tab-news-text">
					 <?php $optitle = get_the_title( $document->ID );?>
                                            <h3><?php echo mb_strimwidth($optitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php echo the_field("opinion_publisher_journal_name", $document->ID ); ?></p>
					
                   <?php /*?> <h3><?php echo get_the_title(); ?></h3>
                    <p><?php echo the_field("opinion_publisher_journal_name"); ?><?php echo the_field("publisher_name"); ?>
                    <?php echo the_field("publisher_edit_text" ); ?></p><?php */?>
                </div>
                <div class="news-date">
						<p> <?php echo the_field("published_date"); ?></p>
                                            <p><?php echo the_field("author_name", $document->ID ); ?></p>
                   <?php /*?> <p>
                    <?php echo the_field("published_date"); ?><?php echo the_field("briefs_reports_published_date"); ?>
                    </p>
                    <p><?php echo the_field("author_name"); ?><?php echo the_field("briefs_reports_author"); ?><?php echo the_field("wp_author_name"); ?></p><?php */?>
                </div>
            </div>
        </a>
        <?php endwhile; ?>
        <?php endif; die();?>
  </div>
      <?php 
}?>

<?php function data_fetch_single_research3(){ 
  ?>
  <div id="tab3" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'journalarticles',
          's' => esc_attr( $_POST['keyword3'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            // 'meta_query' => array(
            //     array(
            //     'value' => esc_attr( $_POST['keyword6'] ),
            //     'compare' => 'LIKE'
            //     )
            // )
          );
          $allCategories = new WP_Query($test1);
        ?>
        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
         <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $jatitle = get_the_title( $document->ID );?>
                                    <div class="tab-news-sec">
                                        <div class="tab-news-text">
                                            <h3> <?php echo mb_strimwidth($jatitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
                                        </div>
                                        <div class="news-date">
                                            <p><?php echo the_field("published_date", $document->ID ); ?></p>
                                            <p><?php echo the_field("author_name", $document->ID ); ?></p>
                                        </div>
                                    </div>
                                </a>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>

<?php function data_fetch_single_research4(){ 
  ?>
  <div id="tab4" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'books',
          's' => esc_attr( $_POST['keyword4'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            // 'meta_query' => array(
            //     array(
            //     'value' => esc_attr( $_POST['keyword6'] ),
            //     'compare' => 'LIKE'
            //     )
            // )
          );
          $allCategories = new WP_Query($test1);
        ?>
        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
         <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $bookstitle = get_the_title( $document->ID );?>
                                    <div class="tab-news-sec">
                                        <div class="tab-news-text">
                                            <h3><?php echo mb_strimwidth($bookstitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php echo the_field("publisher_edit_text", $document->ID ); ?></p>
                                        </div>
                                        <div class="news-date">
                                            <p><?php echo the_field("published_date", $document->ID ); ?></p>
                                            <p><?php echo the_field("author_name", $document->ID ); ?></p>
                                        </div>
                                    </div>
                                </a>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>

<?php function data_fetch_single_research5(){ 
  ?>
  <div id="tab5" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'bookchapters',
          's' => esc_attr( $_POST['keyword5'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            // 'meta_query' => array(
            //     array(
            //     'value' => esc_attr( $_POST['keyword6'] ),
            //     'compare' => 'LIKE'
            //     )
            // )
          );
          $allCategories = new WP_Query($test1);
        ?>
        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
         <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $bctitle = get_the_title( $document->ID );?>
                                        <div class="tab-news-sec">
                                            <div class="tab-news-text">
                                                <h3><?php echo mb_strimwidth($bctitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                                <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
                                            </div>
                                            <div class="news-date">
                                                <p><?php echo the_field("published_date", $document->ID ); ?></p>
                                                <p><?php echo the_field("author_name", $document->ID ); ?></p>
                                            </div>
                                        </div>
                                </a>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>
<?php function data_fetch_single_research8(){ 
  ?>
  <div id="tab8" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'post',
          's' => esc_attr( $_POST['keyword8'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            // 'meta_query' => array(
            //     array(
            //     'value' => esc_attr( $_POST['keyword6'] ),
            //     'compare' => 'LIKE'
            //     )
            // )
          );
          $allCategories = new WP_Query($test1);
        ?>
        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
       <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $newstitle = get_the_title( $document->ID );?>
                                    <div class="tab-news-sec">
                                        <div class="tab-news-text">
                                            <h3><?php echo mb_strimwidth($newstitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php //echo the_field("publisher_name", $document->ID ); ?></p>
                                        </div>
                                        <div class="news-date">
                                            <p><?php //cpr_posted_by(); ?></p>
                                            <p><?php the_date('F j, Y') ?></p>
                                        </div>
                                    </div>
                                </a>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>
<?php function data_fetch_single_research9(){ 
  ?>
  <div id="tab9" class="tab_content" style="display:block;">
        <?php 
        $test1 = array(            
          'post_type' => 'project',
          's' => esc_attr( $_POST['keyword9'] ),
			    'posts_per_page' =>-1,
            'post_status' => 'publish',
            'meta_query' => array(             
              array(
                  'key'       => 'project_status',
                  'compare'   => '=',
                  'value'     => 'active',
              )
          )
          );
          $allCategories = new WP_Query($test1);
        ?>
        <?php if ( $allCategories->have_posts() ) : ?>
        <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
         <a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">
                                    <?php $brtitle = get_the_title( $document->ID );?>
                                    <div class="tab-news-sec">
                                        <div class="tab-news-text">
                                            <h3><?php echo mb_strimwidth($brtitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
                                            <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
                                        </div>
                                        <div class="news-date">
                                            <p><?php echo the_field("published_date", $document->ID ); ?></p>
                                            <p><?php echo the_field("author_name", $document->ID ); ?></p>
                                        </div>
                                    </div>
                                </a>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>
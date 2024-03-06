
<?php function data_fetch_singleproject7(){ ?>

<div id="tab7" class="tab_content" style="display:block;">
      <?php 
      $test = array(            
        'post_type' => 'workingpapers',
              'posts_per_page' =>-1,
          'post_status' => 'publish',
          's' => esc_attr($_POST['keyword7']),
        //   'meta_query' => array(
        //       array(
        //       'value' => esc_attr( $_POST['keyword7'] ),
        //       'compare' => 'LIKE'
        //       )
        //   )
        );
        $allCategories = new WP_Query($test);
      ?>

      <?php if ( $allCategories->have_posts() ) : ?>
      <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>

<?php function data_fetch_singleproject6(){ 
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
        );
        $allCategories = new WP_Query($test1);
        // print_r($allCategories);
      ?>

      <?php if ( $allCategories->have_posts() ) : ?>
      <?php while ( $allCategories->have_posts() ): $allCategories->the_post(); ?>
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>

<?php function data_fetch_singleproject2(){ 
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
</div>
    <?php 
}?>

<?php function data_fetch_singleproject3(){ 
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
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>

<?php function data_fetch_singleproject4(){ 
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
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>

<?php function data_fetch_singleproject5(){ 
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
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>
<?php function data_fetch_singleproject8(){ 
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
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
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
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>

<?php function data_fetch_singleproject9(){ 
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
      <a href="<?php echo get_permalink(); ?>" target="_blank">					
          <div class="tab-news-sec">
              <div class="tab-news-text">
                  <h3><?php echo get_the_title(); ?>   			  
                  </h3>
                  <p><?php echo the_field("publisher_name"); ?>
              </div>
              <div class="news-date">
                  <p>
                  <?php echo the_field("published_date"); ?>
                  </p>
                  <p><?php echo the_field("author_name"); ?></p>
              </div>
          </div>
      </a>
      <?php endwhile; ?>
      <?php endif; die();?>
    </div>
    <?php 
}?>

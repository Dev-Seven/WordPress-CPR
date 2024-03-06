
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
         <?php
      $author_name = get_field( 'wp_author_name' );
      $publisher_name = get_field( 'publisher_name' );
      $published_date = get_field( 'published_date' );
				?>
				
		<?php $wptitle = get_the_title();?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($wptitle, 0, 60, "...");?></h3>
				   </a>
            <p><?php echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'working_papers_detail', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
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
	     <?php 
				 $author_name = get_field( 'briefs_reports_author' );
      $publisher_name = get_field( 'briefs_reports_publisher_name' );
      $published_date = get_field( 'briefs_reports_published_date' );
				?>
				
		<?php $brtitle = get_the_title();?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($brtitle, 0, 60, "...");?></h3>
				   </a>
            <p><?php echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'briefs_reports', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
	  
	
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
			$optitle = get_the_title();
      $author_name = get_field( 'author_name' );
      $opinion_publisher_journal_name = get_field( 'opinion_publisher_journal_name' );
      $published_date = get_field( 'opinion_published_date' );
				?>
						<div class="tab-news-sec">
          <div class="tab-news-text">
			   <a href="<?php echo $opinion_link; ?>" target="_blank">
            <h3><?php echo mb_strimwidth($optitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
            <p><?php echo $opinion_publisher_journal_name; ?></p>
			    </a>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php /*?><a href="<?php echo get_permalink($document->ID ); ?>"><?php echo the_field("author_name", $document->ID );?></a><?php */?>
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
				
				
			  </p>
			 
          </div>
        </div>
      
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
        <?php
				 $author_name = get_field( 'author_name' );
      $publisher_name = get_field( 'publisher_name' );
      $published_date = get_field( 'published_date' );
				?>
				
		<?php $jatitle = get_the_title(  );?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($jatitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
				   </a>
            <p><?php echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'ja_detail', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
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
           <?php
				 $author_name = get_field( 'author_name' );
      $publisher_name = get_field( 'publisher_edit_text' );
      $published_date = get_field( 'published_date' );
				?>
				
		<?php $bookstitle = get_the_title();?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($bookstitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
				   </a>
            <p><?php echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'books_article_name', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
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
         <?php 
				 $author_name = get_field( 'author_name' );
      $publisher_name = get_field( 'publisher_name' );
      $published_date = get_field( 'published_date' );
				?>
				
		<?php $bctitle = get_the_title();?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($bctitle, 0, 60, "...");?><?php //echo get_the_title( $document->ID ); ?> </h3>
				   </a>
            <p><?php echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'book_chapters_name', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
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
      <?php
      $author_name = get_field( 'wp_author_name' );
      $publisher_name = get_field( 'publisher_name' );
      $published_date = get_field( 'published_date' );
				?>
				
		<?php $newstitle = get_the_title();?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($newstitle, 0, 60, "...");?></h3>
				   </a>
            <p><?php //echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
             <p><?php// the_date('F j, Y') ?><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'news_detail', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
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
          <?php
      $author_name = get_field( 'author_name' );
      $publisher_name = get_field( 'publisher_name' );
      $published_date = get_field( 'published_date' );
				?>
				
		<?php $protitle = get_the_title();?>
        <div class="tab-news-sec">
          <div class="tab-news-text">
			  <a href="<?php echo get_permalink(); ?>" target="_blank">
             <h3><?php echo mb_strimwidth($protitle, 0, 60, "...");?></h3>
				   </a>
            <p><?php echo $publisher_name; ?></p>
          </div>
          <div class="news-date">
            <p><?php echo $published_date; ?></p>
            <p><?php
                  $documents = get_posts( array(
                    'post_type' => 'people',
                    'meta_query' => array(
                      array(
                        'key' => 'project_detail', 
                        'value' => '"' . get_the_ID() . '"', 
                        'compare' => 'LIKE'
                      )
                    )
                  ) );
				?>
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
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
				<?php// echo $author_name; ?></p>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; die();?>
      </div>
      <?php 
}?>
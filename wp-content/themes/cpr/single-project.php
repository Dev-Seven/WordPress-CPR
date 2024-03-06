<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cpr
 */

get_header();

$allCategories = get_posts( array(
  'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'post','people'),
'posts_per_page'=>-1,
 'orderby' => "date",
          'order' => 'DESC', 'meta_query' => array(
    array(
      'key' => array('project_relation_opinion_details',
                        'project_relation_journal_articles_details',
                        'project_relation_books_details',
                        'project_relation_book_chapters_details',
                        'project_relation_policy_briefs_reports_details',
                        'project_relation_working_papers_details',
                        'project_relation_news_details',
                        'project_detail'),
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$opinions = get_posts( array(
   'post_type' => 'opinions',
                                'orderby' => "id",
                            'order' => 'ASC',
							  'posts_per_page'=>-1,
                            'meta_query' => array(
                                array(
                                'key' => 'project_relation_opinion_details', // name of custom field
                                'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                'compare' => 'LIKE'
                                )
                            )
));

$journalArticles = get_posts( array(
    'post_type' => 'journalarticles',
                                'meta_key' => 'published_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                array(
                                    'key' => 'project_relation_journal_articles_details', // name of custom field
                                    'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                    'compare' => 'LIKE'
                                )
                            )
));

$books = get_posts( array(
  'post_type' => 'books',
                                'orderby' => "id",
                                'order' => 'ASC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_books_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
));

$bookChapters = get_posts( array(
  'post_type' => 'bookchapters',
                                'meta_key' => 'published_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_book_chapters_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
));

$briefsReports = get_posts( array(
  'post_type' => 'briefsreports',
                                'meta_key' => 'briefs_reports_published_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_policy_briefs_reports_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
));
$workingPapers = get_posts( array(
   'post_type' => 'workingpapers',
                            'orderby' => "id",
                            'order' => 'ASC',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                'key' => 'project_relation_working_papers_details',
                                'value' => '"' . get_the_ID() . '"',
                                'compare' => 'LIKE'
                                )
                            )
));

$news = get_posts( array(
  'post_type' => 'post',
                                    'orderby' => "id",
                                'order' => 'ASC',
                                    'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_news_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
));

$people = get_posts( array(
  'post_type' => 'people',
	'orderby' => "date",
    'order' => 'DESC',
	'posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'project_detail',
      'value' => '"' . get_the_ID() . '"', 
      'compare' => 'LIKE'
    )
  )
));


?>
<main>
	<div id="loader-wrapper">
			<div id="loader"></div>
         	</div>
  <section class="inner-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
     <?php /*?>     <?php
          if ( function_exists( 'bcn_display' ) ) {
            bcn_display();
          }
          ?><?php */?>
<div class="breadcrumb news-breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          <!-- Breadcrumb NavXT 6.6.0 -->
<span property="itemListElement" typeof="ListItem" class="breadcrumb-item">
	<a property="item" typeof="WebPage" title="Go to CPR." href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home"><span property="name">CPR</span></a>
	<meta property="position" content="1"></span>
			  <span property="itemListElement" typeof="ListItem" class="breadcrumb-item active">
				  <span property="name" class="post post-project current-item"><?php the_title(); ?></span>
				  <meta property="url" content="<?php  echo get_permalink( $id ) ?>">
				  <meta property="position" content="2">
			  </span>       
		  </div>
			
			
			
        </div>
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>
	
<div class="innerpage-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
          $maincontent = get_the_id();

          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
        </div>
      </div>
    </div>
  </div>	
	
	<?php
//print_r($allCategories);
if (($allCategories != NULL )){ ?>
    <div class="news-tab">
        <div class="left-part">      
            <div class="search-bar">
				<img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-grey-search.png" alt="">
                <!-- <input class="form-control" type="text" id="keyword" placeholder="Search Name" aria-label="search">   -->                
                <input class="form-control tab-section-input" type="text" id="keyword2" placeholder="" aria-label="search" onChange="fetch2()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword3" placeholder="" aria-label="search" onChange="fetch3()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword4" placeholder="" aria-label="search" onChange="fetch4()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword5" placeholder="" aria-label="search" onChange="fetch5()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword6" placeholder="" aria-label="search" onChange="fetch1()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword7" placeholder="" aria-label="search" onChange="fetch()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword8" placeholder="" aria-label="search" onChange="fetch8()" style="display:none;">
             

            </div>      
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <ul class="tabs">
                <!-- <?php
                    if (!empty($allCategories)) {
                    ?>
                        <li class="active" rel="tab1">All</li>
                    <?php
                    }
                ?> -->
                <?php
                    if (!empty($opinions)) {
                ?>
		            <li rel="tab2" id="singletab2">Opinion & Commentary</li>
                <?php   
                    }
                ?>
                <?php
                    if (!empty($journalArticles)) {
                ?>
                    <li rel="tab3" id="singletab3">Journal Articles</li>
                <?php   
                    }
                ?>

                <?php
                    if (!empty($books)) {
                ?>
                    <li rel="tab4" id="singletab4">Books</li>
                <?php   
                    }
                ?>

                <?php
                    if (!empty($bookChapters)) {
                ?>
                    <li rel="tab5" id="singletab5">Book Chapters</li>
                <?php   
                    }
                ?>

                <?php
                    if (!empty($briefsReports)) {
                ?>
                    <li rel="tab6" id="singletab6">Policy Briefs & Reports</li>
                <?php
                    }
                ?>

                <?php
                    if (!empty($workingPapers)) {
                ?>
                    <li rel="tab7" id="singletab7">Working Papers</li>
                <?php
                    }
                ?>

                <?php
                    if (!empty($news)) {
                ?>
                    <li rel="tab8" id="singletab8">Policy Engagements & Blogs</li>
                <?php
                    }
                ?>

		    </ul>
		</div>
    </div>
    
    <div class="tab-content">
		<div class="tab_container">
            <!-- <?php
            if (!empty($allCategories)) {
            ?> <h3 class="d_active tab_drawer_heading" rel="tab1">All</h3><?php
            }
            ?> -->
            <!-- <div id="single-researcharea">
                <div id="tab1" class="tab_content">
                    <?php 
                        $allCategories = get_posts( array(
                        'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'post', 'people'),
                        'meta_query' => array(
                        array(
                            'meta_key' => 'published_date',
                            'orderby' => 'meta_value',
                            'order' => 'DESC',
                        ),
                        array(
                            'meta_key' => 'briefs_reports_published_date',
                            'orderby' => 'meta_value',
                            'order' => 'DESC',
                        ),
                        ),
                    
                        'posts_per_page'=>-1,
                        'meta_query' => array(
                        array(
                            
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        )
                        )
                        ));
                    ?>
                    <?php if( $allCategories ): ?>
                        <?php foreach( $allCategories as $document ): ?>
                            <a href="<?php echo get_permalink( $document->ID ); ?>">			
                                <div class="tab-news-sec">
                                    <div class="tab-news-text">
                                        <h3><?php echo get_the_title( $document->ID ); ?></h3>
                                        <p><?php echo the_field("opinion_publisher_journal_name", $document->ID ); ?><?php echo the_field("publisher_name", $document->ID ); ?>
                                        <?php echo the_field("publisher_edit_text", $document->ID ); ?></p>
                                    </div>
                                    <div class="news-date">
                                        <p>
                                            <?php echo the_field("published_date", $document->ID ); ?><?php echo the_field("briefs_reports_published_date", $document->ID ); ?>
                                        </p>
                                        <p><?php echo the_field("author_name", $document->ID ); ?><?php echo the_field("briefs_reports_author", $document->ID ); ?><?php echo the_field("wp_author_name", $document->ID ); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div> -->
		        <?php
                    if (!empty($opinions)) {
                ?>
                <h3 class="tab_drawer_heading" rel="tab2">Opinions</h3><?php
                }
                ?>

                <div id="single-tab2">
                    <div id="tab2" class="tab_content">
                        <?php
                          $args = new WP_Query( array(
                            'post_type' => 'opinions',
                                'orderby' => "id",
                            'order' => 'ASC',
							  'posts_per_page'=>-1,
                            'meta_query' => array(
                                array(
                                'key' => 'project_relation_opinion_details', // name of custom field
                                'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                'compare' => 'LIKE'
                                )
                            )
                            ));
                            
                        ?>
                       	<?php  while ( $args->have_posts() ): $args->the_post();
			 $opinion_link = get_field( 'opinion_link' );
			$optitle = get_the_title();
      $author = get_field( 'author_name' );
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
			<p><?php echo $author; ?></p> 
          </div>
        </div>		
		 <?php endwhile; ?>
        <?php wp_reset_postdata();?>
                       
                    </div>
                </div>
			 
                <?php
                    if (!empty($journalArticles)) {
                ?>  
                <h3 class="tab_drawer_heading" rel="tab3">Journal Articles</h3><?php
                }
                ?>
                <div id="single-tab3">
                    <div id="tab3" class="tab_content">
                        <?php
                            $args = new WP_Query( array(
                                'post_type' => 'journalarticles',
                                'meta_key' => 'published_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                array(
                                    'key' => 'project_relation_journal_articles_details', // name of custom field
                                    'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                    'compare' => 'LIKE'
                                )
                            )
                            ));
                        ?>          
                       <?php  while ( $args->have_posts() ): $args->the_post();
				 $author = get_field( 'author_name' );
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
			  <p><?php echo $author; ?></p>
          </div>
        </div>
       
        <?php endwhile; ?>
        <?php wp_reset_postdata();?>	
                    </div>
                </div>
		        
                <?php
                    if (!empty($books)) {
                ?>
		        <h3 class="tab_drawer_heading" rel="tab4">Books</h3><?php
                }
                ?>

                <div id="single-tab4">
                    <div id="tab4" class="tab_content">
                        <?php
                            $args = new WP_Query( array(
                                'post_type' => 'books',
                                'orderby' => "id",
                                'order' => 'ASC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_books_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                            ));
                        ?>
                        <?php  while ( $args->have_posts() ): $args->the_post();
				 $author = get_field( 'author_name' );
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
			  <p><?php echo $author; ?></p>
          </div>
        </div>
       
        <?php endwhile; ?>
        <?php wp_reset_postdata();?>
                    </div>
                </div>

		        <?php
                    if (!empty($bookChapters)) {
                ?>
                <h3 class="tab_drawer_heading" rel="tab5">Book Chapters</h3><?php
                }
                ?>
                <div id="single-tab5">
                    <div id="tab5" class="tab_content">
                        <?php
                            $args = new WP_Query( array(
                                'post_type' => 'bookchapters',
                                'meta_key' => 'published_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_book_chapters_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                            ));
                        ?>
                         <?php  while ( $args->have_posts() ): $args->the_post();
				 $author = get_field( 'author_name' );
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
			  <p><?php echo $author; ?></p>
          </div>
        </div>
	  <?php endwhile; ?>
        <?php wp_reset_postdata();?>
                    </div>
                </div>
		        
                <?php
                    if (!empty($briefsReports)) {
                ?>
                <h3 class="tab_drawer_heading" rel="tab6">Briefs Reports</h3><?php
                }
                ?>
                
                <div id="single-tab6">
                    <div id="tab6" class="tab_content">
                        <?php
                            $args = new WP_Query( array(
                                'post_type' => 'briefsreports',
                                'meta_key' => 'briefs_reports_published_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                                'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_policy_briefs_reports_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                                ));
                        ?>
                                  
	  
	  <?php  while ( $args->have_posts() ): $args->the_post();
				 $author = get_field( 'briefs_reports_author' );
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
			  <p><?php echo $author; ?></p>
          </div>
        </div>
	  <?php endwhile; ?>
        <?php wp_reset_postdata();?>
                    </div>
                </div>
		    
                <?php
                    if (!empty($workingPapers)) {
                ?>
                <h3 class="tab_drawer_heading" rel="tab7">Working Papers</h3><?php
                }
                ?>
                <div id="single-tab7">
                    <div id="tab7" class="tab_content">
                        <?php
                         $args = new WP_Query( array(
                            'post_type' => 'workingpapers',
                            'orderby' => "id",
                            'order' => 'ASC',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                'key' => 'project_relation_working_papers_details',
                                'value' => '"' . get_the_ID() . '"',
                                'compare' => 'LIKE'
                                )
                            )
                            ) );
                        ?>
                        <?php  while ( $args->have_posts() ): $args->the_post();
      $author = get_field( 'wp_author_name' );
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
			  <p><?php echo $author; ?></p>
          </div>
        </div>
	  <?php endwhile; ?>
        <?php wp_reset_postdata();?>
                    </div>
                </div>    
		  
                <?php
                if (!empty($news)) {
                ?><h3 class="tab_drawer_heading" rel="tab8">Policy Engagements & Blogs</h3> <?php
                }
                ?>
                <div id="single-tab8">
                    <div id="tab8" class="tab_content newspost">
                        <?php
                            $args = new WP_Query( array(
                                'post_type' => 'post',
                                    'orderby' => "id",
                                'order' => 'ASC',
                                    'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_news_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                            ));
                        ?>
                                     
	  
	  <?php  while ( $args->have_posts() ): $args->the_post();
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
        <?php wp_reset_postdata();?>  
                    </div>
                </div>            

             
		</div>
  </div>
	</div>
	  <?php } ?>
		
	      <?php
	$ids = get_field('project_detail', false, false);
      $documents = get_posts( array(
        'post_type' => 'people',
		'posts_per_page' =>-1,
		  'post__in' => $ids,
		  'orderby' =>  'post__in',
//		'orderby' => "id",
//        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'project_detail', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
          )
        )
      ) );
      ?>
	 <?php
        if (!empty($documents)) {
          ?>
  <section class="rarea-faculty-sec">
    <div class="container-fluid">
<div class="row justify-content-center">
      <?php if( $documents ): ?>
      <?php foreach( $documents as $document ): ?>
      <div class="col-md-6 col-lg-4 col-xl-3"> <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="item">
          <div class="item-img"> <img src="<?php echo get_field("faculty_image", $document->ID );?>" alt=""> </div>
          <h3><?php echo get_the_title( $document->ID ); ?></h3>
          <p><?php echo the_field('faculty_designation', $document->ID) ?></p>
        </div>
        </a> </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
		</div>  
  </section>
  <?php } ?>
</main>
<?php get_footer(); ?>
<?php
function ajax_fetch_single_project() {
  ?>
<script type="text/javascript">
    $ = jQuery;
    $( document ).ready(function() {
        setTimeout(function(){
            $('.tabs li:first-child').trigger('click');
        }, 100);
//    $('#keyword7').show();
// 	$('#keyword6').hide();
    $('#singletab2').click(function(){
		$('#keyword2').show();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		//$('#keyword9').hide();
	})
    $('#singletab3').click(function(){
		$('#keyword3').show();
		$('#keyword2').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		//$('#keyword9').hide();
	})
    $('#singletab4').click(function(){
		$('#keyword4').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		//$('#keyword9').hide();
	})
    $('#singletab5').click(function(){
		$('#keyword5').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		//$('#keyword9').hide();
	})
	$('#singletab7').click(function(){
		$('#keyword7').show();
		$('#keyword6').hide();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword8').hide();
		//$('#keyword9').hide();
	})
    $('#singletab6').click(function(){
		$('#keyword6').show();
		$('#keyword7').hide();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword8').hide();
		//$('#keyword9').hide();
	})
    $('#singletab8').click(function(){
		$('#keyword8').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
		//$('#keyword9').hide();
	})
//    $('#singletab9').click(function(){
//		$('#keyword9').show();
//		$('#keyword2').hide();
//		$('#keyword3').hide();
//		$('#keyword4').hide();
//		$('#keyword5').hide();
//		$('#keyword6').hide();
//		$('#keyword7').hide();
//		$('#keyword8').hide();
//	})
    // $('.tabs li').click(function(){
	// 	fetch();
	// })
    });
function fetch(){	
	var keyword7 = jQuery('#keyword7').val();
        if(keyword7 != "")
		{
			// jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject7', keyword7: jQuery('#keyword7').val() },
				success: function(data) {
					jQuery('#single-tab7').html( data );    

                }               
			});
		}	    
}

function fetch1(){
    var keyword6 = jQuery('#keyword6').val();	
    if(keyword6 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject6', keyword6: jQuery('#keyword6').val() },
				success: function(data) {
					jQuery('#single-tab6').html( data );                   
				}                    
			});
		}	
}
function fetch2(){
    var keyword2 = jQuery('#keyword2').val();	
    console.log(keyword2);
    if(keyword2 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject2', keyword2: jQuery('#keyword2').val() },
				success: function(data) {
					jQuery('#single-tab2').html( data );                   
				}                    
			});
		}	
}
function fetch3(){
    var keyword3 = jQuery('#keyword3').val();	
    if(keyword3 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject3', keyword3: jQuery('#keyword3').val() },
				success: function(data) {
					jQuery('#single-tab3').html( data );                   
				}                    
			});
		}	
}function fetch4(){
    var keyword4 = jQuery('#keyword4').val();	
    if(keyword4 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject4', keyword4: jQuery('#keyword4').val() },
				success: function(data) {
					jQuery('#single-tab4').html( data );                   
				}                    
			});
		}	
}
function fetch5(){
    var keyword5 = jQuery('#keyword5').val();	
    if(keyword5 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject5', keyword5: jQuery('#keyword5').val() },
				success: function(data) {
					jQuery('#single-tab5').html( data );                   
				}                    
			});
		}	
}
function fetch8(){
    var keyword8 = jQuery('#keyword8').val();	
    if(keyword8 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleproject8', keyword8: jQuery('#keyword8').val() },
				success: function(data) {
					jQuery('#single-tab8').html( data );                   
				}                    
			});
		}	
}
//function fetch9(){
//    var keyword9 = jQuery('#keyword9').val();	
//    if(keyword9 != "")
//		{
//			jQuery.ajax({
//				url: '<?php echo admin_url('admin-ajax.php'); ?>',
//				type: 'post',
//				data: { action: 'data_fetch_singleproject9', keyword9: jQuery('#keyword9').val() },
//				success: function(data) {
//					jQuery('#single-tab9').html( data );                   
//				}                    
//			});
//		}	
//}
</script>
<?php
}
?>
<script>
jQuery(document).ready(function() {
	
	setTimeout(function(){
		jQuery('body').addClass('loaded');
		jQuery('h1').css('color','#222222');
	}, 3000);
	
});
</script>
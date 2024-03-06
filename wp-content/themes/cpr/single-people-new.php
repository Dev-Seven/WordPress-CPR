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
  'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'post', 'people'),
'posts_per_page'=>-1,
 'orderby' => "date",
          'order' => 'DESC', 'meta_query' => array(
    array(
      'key' => array('opinions_detail',
                        'ja_detail',
                        'books_article_name',
                        'book_chapters_name',
                        'briefs_reports',
                        'working_papers_detail',
                        'news_detail'
                        ),
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));
$opinions = get_posts( array(
  'post_type' => 'opinions',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'opinions_detail', // name of custom field
      'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
      'compare' => 'LIKE'
    )
  )
));

$journalArticles = get_posts( array(
  'post_type' => 'journalarticles',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'ja_detail', // name of custom field
      'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
      'compare' => 'LIKE'
    )
  )
));  

$books = get_posts( array(
  'post_type' => 'books',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'books_article_name',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$bookChapters = get_posts( array(
  'post_type' => 'bookchapters',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'book_chapters_name',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$briefsReports = get_posts( array(
  'post_type' => 'briefsreports',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'briefs_reports',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));
$workingPapers = get_posts( array(
  'post_type' => 'workingpapers',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'working_papers_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$news = get_posts( array(
  'post_type' => 'post',
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'news_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

?>
<?php

$faculty_image = get_field( 'faculty_image' );
$faculty_main_text = get_field( 'faculty_main_text' );
$faculty_designation = get_field( 'faculty_designation' );
$faculty_email_url = get_field( 'faculty_email_url' );
$faculty_email_text = get_field( 'faculty_email_text' );
$faculty_linked_image = get_field( 'faculty_linked_image' );
$faculty_linked_url = get_field( 'faculty_linked_url' );
$faculty_twitter_url = get_field( 'faculty_twitter_url' );
	
$book_chapters_title = get_field( 'book_chapters_title' );
$publisher_name = get_field( 'publisher_name' );
$publisher_edit_text = get_field( 'publisher_edit_text' );
$category_box = get_field( 'category_box' );

?>
<main>
  <section class="inner-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php
            if ( function_exists( 'bcn_display' ) ) {
              bcn_display();
            }
            ?>
          </div>
          <h1>
            <?php the_title(); ?>
          </h1>
          <div class="facylty-degination">
			    <?php if ($faculty_designation != "") { ?>
           <span><?php echo $faculty_designation; ?></span>
			    | 
        <?php } ?>
			 
			   <?php if ($faculty_email_text != "") { ?>
           <a href="mailto:<?php echo $faculty_email_url; ?>"><?php echo $faculty_email_text; ?></a>
        <?php } ?>
			  
			   <?php if ($faculty_linked_url != "") { ?>
           <a href="<?php echo $faculty_linked_url; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin-icon.png" alt="linkedin"></a>
        <?php } ?>
			    <?php if ($faculty_twitter_url != "") { ?>
           <a href="<?php echo $faculty_twitter_url; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter-yellow.png" alt="linkedin"></a>
        <?php } ?>
			   
			  
			  
			  
			   </div>
        </div>
      </div>
    </div>
  </section>
  <div class="innerpage-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="faculty-content">
			  <div class="faculty-img"> <img src="<?php echo $faculty_image; ?>" alt=""> </div>
            <div class="faculty-mc"><?php echo $faculty_main_text; ?></div>
            
          </div>
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
          $documents = get_posts( array(
          'post_type' => 'research',
          'meta_query' => array(
            array(
              'key' => array( 'research_detail', 'research_image' ), // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )
        ) );
         ?>
	 <?php
        if (!empty($documents)) {
          ?>
  <section class="initiative-sec">
    <div class="container-fluid initiative">
      <h3>Initiatives</h3>
      <div class="responsive slider">
        
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <div class="initiate-inner-sec">
          <div class="img-inner-sec"> <img src="<?php echo get_field("research_image", $document->ID );?>" class="d-block" alt="..."> </div>
          <div class="content-inner-sec">
            <h4><?php echo get_the_title( $document->ID ); ?></h4>
            <p><?php echo get_the_content($document->ID); ?><br>
              <span><a href="<?php echo get_permalink( $document->ID ); ?>" target="_blank">Read More</a></span> </p>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
	  <?php } ?>
	
	<?php
//print_r($allCategories);
if (($allCategories != NULL )){ ?>
  <div class="news-tab">
    <div class="left-part">
      <div class="search-bar"> <img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-grey-search.png" alt="">
<!--        <input class="form-control" type="text" placeholder="" aria-label="search">-->
		  
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
		            <li rel="tab2" id="singletab2">Opinions</li>
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
                    <li rel="tab6" id="singletab6">Briefs Reports</li>
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
                    <li rel="tab8" id="singletab8">News</li>
                <?php
                    }
                ?>
		  </ul> 
		</div>
    </div>
	  
	 
 
	  
	  
	  
       <div class="tab-content" id="v-pills-tabContent">
		
		
		
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
                        'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers'),
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
		$paged = (get_query_var("paged")) ? get_query_var("paged") : 1;
         //$documents = get_posts( array(
			 $query_args = query_posts (array(				   
          'post_type' => 'opinions',
			'orderby' => "id",
          'order' => 'ASC',
			 'posts_per_page' => 5,
			 'paged' => $paged,
          'meta_query' => array(
            array(
              'key' => 'opinions_detail', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )
			)
         );
							   
		$documents = get_posts($query_args);					   
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
            <p><?php echo the_field("opinion_publisher_journal_name", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p>
              <?php ?>
            </p>
            <p><?php echo the_field("author_name", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
						
        <?php endif; ?>
						<?php //pagination_bar(); 
            the_posts_pagination( array( 'mid_size' => 5 ) );
            ?>

		<div class="pagination-list">
 <?php 
$total = $documents->max_num_pages;

							  
// only bother with the rest if we have more than 1 page!
if ( $total > 1 )  {
     // get the current page
     if ( !$current_page = get_query_var('paged') )
          $current_page = 1;
     // structure of "format" depends on whether we're using pretty permalinks
     if( get_option('permalink_structure') ) {
	     $format = 'page/%#%';
     } else {
	     $format = 'page/%#%';
     }

     echo paginate_links(array(
         'base' => get_pagenum_link(1). '%_%',
          'format'   => 'page/%#%',
          'current'  => $current_page,
          'total'    => $total,
          'mid_size' => 4,
          'type'     => 'list',
		  'prev_text' => '&laquo',
		  'next_text' => '&raquo;',
     ));
}
			 ?>

<?php wp_reset_postdata(); ?>
 
</div>				
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
        $documents = get_posts( array(
          'post_type' => 'journalarticles',
		 'meta_key' => 'published_date',
		 'orderby' => 'meta_value',
          'order' => 'DESC',
			'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'ja_detail', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )

        ) );
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
            <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p><?php echo the_field("published_date", $document->ID ); ?></p>
            <p><?php echo the_field("author_name", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
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
      $documents = get_posts( array(
          'post_type' => 'books',
		  'orderby' => "id",
          'order' => 'ASC',
		  'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'books_article_name',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <!-- <a href="<?php echo get_permalink( $document->ID ); ?>">
		<h3><?php echo get_the_title( $document->ID ); ?> </h3>
		</a> --> 
        
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
            <p><?php echo the_field("publisher_edit_text", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p><?php echo the_field("published_date", $document->ID ); ?></p>
            <p><?php echo the_field("author_name", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
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
      $documents = get_posts( array(
          'post_type' => 'bookchapters',
		   'meta_key' => 'published_date',
		 'orderby' => 'meta_value',
          'order' => 'DESC',
		  'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'book_chapters_name',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <!-- <a href="<?php echo get_permalink( $document->ID ); ?>">
		<h3><?php echo get_the_title( $document->ID ); ?> </h3>
		</a> --> 
        
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
            <p><?php echo the_field("publisher_edit_text", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p><?php echo the_field("published_date", $document->ID ); ?></p>
            <p><?php echo the_field("author_name", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
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
        $documents = get_posts( array(
          'post_type' => 'briefsreports',
			 'meta_key' => 'briefs_reports_published_date',
		 'orderby' => 'meta_value',
          'order' => 'DESC',
			'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'briefs_reports',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
            <?php /*?>   <p><?php echo the_field("publisher_edit_text", $document->ID ); ?></p><?php */?>
          </div>
          <div class="news-date">
            <p><?php echo the_field("briefs_reports_published_date", $document->ID ); ?></p>
            <p><?php echo the_field("briefs_reports_author", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
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
        $documents = get_posts( array(
          'post_type' => 'workingpapers',
			 'orderby' => "id",
          'order' => 'ASC',
			'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'working_papers_detail',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
			
        ) );
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
            <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p><?php echo the_field("published_date", $document->ID ); ?></p>
            <p><?php echo the_field("briefs_reports_author", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
		 </div> 
		
 
       <?php
                if (!empty($news)) {
                ?><h3 class="tab_drawer_heading" rel="tab8">News</h3> <?php
                }
                ?>
                <div id="single-tab8">
                    <div id="tab8" class="tab_content">
	
        <?php
        $documents = get_posts( array(
          'post_type' => 'post',
		 'orderby' => "id",
          'order' => 'ASC',
			'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'news_detail',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
        ?>
        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <a href="<?php echo get_permalink( $document->ID ); ?>">
        <div class="tab-news-sec">
          <div class="tab-news-text">
            <h3><?php echo get_the_title( $document->ID ); ?></h3>
            <p><?php echo the_field("publisher_name", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p><?php echo the_field("published_date", $document->ID ); ?></p>
            <p><?php echo the_field("briefs_reports_author", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
		  </div> 
					</div> 
      </div>
    </div>
  </div>
		 <?php } ?>
</main>

<?php get_footer(); ?>

<?php
function ajax_fetch_singlepeople() {
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
	})
    $('#singletab3').click(function(){
		$('#keyword3').show();
		$('#keyword2').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
	})
    $('#singletab4').click(function(){
		$('#keyword4').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
	})
    $('#singletab5').click(function(){
		$('#keyword5').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
	})
	$('#singletab7').click(function(){
		$('#keyword7').show();
		$('#keyword6').hide();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword8').hide();

	})
    $('#singletab6').click(function(){
		$('#keyword6').show();
		$('#keyword7').hide();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword8').hide();
	})
    $('#singletab8').click(function(){
		$('#keyword8').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
	})
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
				data: { action: 'data_fetch_singlepeople7', keyword7: jQuery('#keyword7').val() },
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
				data: { action: 'data_fetch_singlepeople6', keyword6: jQuery('#keyword6').val() },
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
				data: { action: 'data_fetch_singlepeople2', keyword2: jQuery('#keyword2').val() },
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
				data: { action: 'data_fetch_singlepeople3', keyword3: jQuery('#keyword3').val() },
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
				data: { action: 'data_fetch_singlepeople4', keyword4: jQuery('#keyword4').val() },
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
				data: { action: 'data_fetch_singlepeople5', keyword5: jQuery('#keyword5').val() },
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
				data: { action: 'data_fetch_singlepeople8', keyword8: jQuery('#keyword8').val() },
				success: function(data) {
					jQuery('#single-tab8').html( data );                   
				}                    
			});
		}	
}
</script>
<?php
}
?>

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
  'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'project', 'post', 'people'),
'posts_per_page'=>-1,
 'orderby' => "date",
          'order' => 'DESC', 'meta_query' => array(
    array(
      'key' => array('opinions_relation_research_area_details',
                        'journal_article_research_area_detail',
                        'books_research_area_detail',
                        'book_chapters_research_area_detail',
                        'briefs_reports_research_area_details',
                        'working_papers_research_area_details',
                        'news_relation_research_area_details',
                        'research_detail'),
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$opinions = get_posts( array(
  'post_type' => 'opinions',
	'orderby' => "date",
          'order' => 'DESC',
	'posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'opinions_relation_research_area_details',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$journalArticles = get_posts( array(
  'post_type' => 'journalarticles',
	'orderby' => "date",
          'order' => 'DESC','posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'journal_article_research_area_detail',
      'value' => '"' . get_the_ID() . '"', 
      'compare' => 'LIKE'
    )
  )
));

$books = get_posts( array(
  'post_type' => 'books',
	'orderby' => "date",
          'order' => 'DESC','posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'books_research_area_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$bookChapters = get_posts( array(
  'post_type' => 'bookchapters',
	'orderby' => "date",
          'order' => 'DESC','posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'book_chapters_research_area_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$briefsReports = get_posts( array(
  'post_type' => 'briefsreports',
	'orderby' => "date",
          'order' => 'DESC','posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'briefs_reports_research_area_details',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));
$workingPapers = get_posts( array(
  'post_type' => 'workingpapers',
	'orderby' => "date",
          'order' => 'DESC','posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'working_papers_research_area_details',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$news = get_posts( array(
  'post_type' => 'post',
	'orderby' => "date",
          'order' => 'DESC','posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'news_relation_research_area_details',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$people = get_posts( array(
  'post_type' => 'people',
	// 'orderby' => "date",
    // 'order' => 'DESC',
    'posts_per_page'=>-1,
  'meta_query' => array(
    array(
      'key' => 'research_detail',
      'value' => '"' . get_the_ID() . '"', 
      'compare' => 'LIKE'
    )
  )
));

$project = get_posts( array(
    // 'post_type' => 'project',
    // 'orderby' => "date",
    // 'order' => 'DESC',
    // 'posts_per_page'=>-1, 
    // 'meta_query' => array(
    //   array(
    //     'key' => 'project_relation_research_area',
    //     'value' => '"' . get_the_ID() . '"', 
    //     'compare' => 'LIKE'
    //   )
    // )
    'post_type' => 'project',
    'orderby' => "date",
    'order' => 'DESC',
    'posts_per_page'=>-1, 
'meta_query' => array(
    array(
    'key' => 'project_relation_research_area',
    'value' => '"' . get_the_ID() . '"',
    'compare' => 'LIKE'
    ),
    array(
        'key'       => 'project_status',
        'compare'   => '=',
        'value'     => 'active',
    )
)
  ));

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
          
        </div>
      </div>
    </div>
  </section>
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
                <input class="form-control tab-section-input" type="text" id="keyword9" placeholder="" aria-label="search" onChange="fetch9()" style="display:none;">

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

<?php
                    if (!empty($project)) {
                ?>
                    <li rel="tab9" id="singletab9">Projects</li>
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
                        'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'project'),
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
                      //  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                        //   $documents = query_posts (array(		
                          $documents = get_posts( array(
                            'post_type' => 'opinions',
                            'orderby' => "id",
                            'order' => 'ASC',
							'posts_per_page'=>-1,
                            'meta_query' => array(
                                array(
                                'key' => 'opinions_relation_research_area_details', // name of custom field
                                'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                'compare' => 'LIKE'
                                )
                            )
                            ));
                            // echo "<pre>";
                            // print_r($documents);
                            // echo "</pre>";
                        ?>
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                                        </div>
                                        <div class="news-date">
                                            <p>
												<?php
							   $test = the_field("opinion_published_date", $document->ID );
							   $show_date = date('Y-m-d', strtotime($test));
												?>
												
                                            </p>
                                            <p><?php echo the_field("author_name", $document->ID ); ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php //wp_pagenavi();
//                         if(function_exists('wp_paginate')):
//                            // echo "test";
//     wp_paginate();  
// else :
//     the_posts_pagination( array(
//         'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
//         'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
//         'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
//     ) );
// endif;
//  if(function_exists('wp_paginate')) {
//     wp_paginate('range=4&anchor=2&nextpage=Next&previouspage=Previous');
// } 

//echo do_shortcode('[paginate_shortcode]');
                       
                        ?>
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
                                    'key' => 'journal_article_research_area_detail', // name of custom field
                                    'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                    'compare' => 'LIKE'
                                )
                            )
                            ));
                        ?>          
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                                    'key' => 'books_research_area_detail',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                            ));
                        ?>
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                                    'key' => 'book_chapters_research_area_detail',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                            ));
                        ?>
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                                    'key' => 'briefs_reports_research_area_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                                ));
                        ?>
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                'key' => 'working_papers_research_area_details',
                                'value' => '"' . get_the_ID() . '"',
                                'compare' => 'LIKE'
                                )
                            )
                            ) );
                        ?>
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>    
		  
                <?php
                if (!empty($news)) {
                ?><h3 class="tab_drawer_heading" rel="tab8">Policy Engagements & Blogs</h3> <?php
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
                                    'key' => 'news_relation_research_area_details',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    )
                                )
                            ));
                        ?>
                        <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
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
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>            

                <?php
                if (!empty($project)) {
                ?><h3 class="tab_drawer_heading" rel="tab9">Projects</h3> <?php
                }
                ?>
                <div id="single-tab9">
                    <div id="tab9" class="tab_content newspost">
                        <?php
                            $documents = get_posts( array(
                                'post_type' => 'project',
                                    'orderby' => "id",
                                'order' => 'ASC',
                                    'posts_per_page'=>-1,
                                'meta_query' => array(
                                    array(
                                    'key' => 'project_relation_research_area',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                    ),
                                    array(
                                        'key'       => 'project_status',
                                        'compare'   => '=',
                                        'value'     => 'active',
                                    )
                                )
                            ));
                        ?>
                       <?php
                        //echo the_field ("project_status");
                       if( $documents ): ?>
                            <?php foreach( $documents as $document ): 
                               
                                ?>
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
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>    

		</div>
  </div>
	</div>
	  <?php } ?>
		
	      <?php
	$ids = get_field('research_area_detail', false, false);
      $documents = get_posts( array(
        'post_type' => 'people',
		'posts_per_page'=> -1,
		  'post__in' => $ids,
		  'orderby' =>  'post__in',
        'meta_query' => array(
          array(
            'key' => 'research_area_detail', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE',
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

  <?php 
        // $people_new = get_field('')
  ?> 

</main>
<?php get_footer(); ?>
<?php
function ajax_fetch_single_researcharea() {
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
		$('#keyword9').hide();
	})
    $('#singletab3').click(function(){
		$('#keyword3').show();
		$('#keyword2').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		$('#keyword9').hide();
	})
    $('#singletab4').click(function(){
		$('#keyword4').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		$('#keyword9').hide();
	})
    $('#singletab5').click(function(){
		$('#keyword5').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
        $('#keyword8').hide();
		$('#keyword9').hide();
	})
	$('#singletab7').click(function(){
		$('#keyword7').show();
		$('#keyword6').hide();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword8').hide();
		$('#keyword9').hide();

	})
    $('#singletab6').click(function(){
		$('#keyword6').show();
		$('#keyword7').hide();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword8').hide();
		$('#keyword9').hide();
	})
    $('#singletab8').click(function(){
		$('#keyword8').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
		$('#keyword9').hide();
	})
    $('#singletab9').click(function(){
		$('#keyword9').show();
		$('#keyword2').hide();
		$('#keyword3').hide();
		$('#keyword4').hide();
		$('#keyword5').hide();
		$('#keyword6').hide();
		$('#keyword7').hide();
		$('#keyword8').hide();
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
				data: { action: 'data_fetch_single_research7', keyword7: jQuery('#keyword7').val() },
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
				data: { action: 'data_fetch_single_research6', keyword6: jQuery('#keyword6').val() },
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
				data: { action: 'data_fetch_single_research2', keyword2: jQuery('#keyword2').val() },
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
				data: { action: 'data_fetch_single_research3', keyword3: jQuery('#keyword3').val() },
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
				data: { action: 'data_fetch_single_research4', keyword4: jQuery('#keyword4').val() },
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
				data: { action: 'data_fetch_single_research5', keyword5: jQuery('#keyword5').val() },
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
				data: { action: 'data_fetch_single_research8', keyword8: jQuery('#keyword8').val() },
				success: function(data) {
					jQuery('#single-tab8').html( data );                   
				}                    
			});
		}	
}
function fetch9(){
    var keyword9 = jQuery('#keyword9').val();	
    if(keyword9 != "")
		{
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_single_research9', keyword9: jQuery('#keyword9').val() },
				success: function(data) {
					jQuery('#single-tab9').html( data );                   
				}                    
			});
		}	
}
</script>
<?php
}
?>

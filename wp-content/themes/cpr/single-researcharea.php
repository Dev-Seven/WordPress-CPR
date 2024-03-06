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
     'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 
     'briefsreports', 'workingpapers', 'project', 'post', 'people'),
     'posts_per_page'=>-1,
     'orderby' => "date",
     'order' => 'DESC', 
     'meta_query' => array(
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
     'order' => 'DESC',
     'posts_per_page'=>-1,
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
     'order' => 'DESC',
     'posts_per_page'=>-1,
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
   
   $briefsReports = get_posts( array(
     'post_type' => 'briefsreports',
   	'orderby' => "date",
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
   
   $workingPapers = get_posts( array(
     'post_type' => 'workingpapers',
   	'orderby' => "date",
     'order' => 'DESC',
     'posts_per_page'=>-1,
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
     'order' => 'DESC',
     'posts_per_page'=>2,
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
       'posts_per_page'=>2,
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
       'posts_per_page'=>2, 
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
         <input type="hidden" value="<?php echo get_the_ID(); ?>" id="researcharea_id" />
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
               <li rel="tab3" id="singletab3" class="ajax-btn" 
                  data-posttype="journalarticles" 
                  data-metaquery_key="journal_article_research_area_detail" 
                  data-peoplekey="ja_detail"
                  data-field_pub_name = "publisher_name"
                  data-field_pub_date = "published_date"
                  data-field_auther_name= "author_name"
                  data-tabid="tab3">Journal Articles</li>
               <?php   
                  }
                  ?>
               <?php
                  if (!empty($books)) {                      
                  ?>
               <li rel="tab4" id="singletab4" class="ajax-btn" 
                  data-posttype="books" 
                  data-metaquery_key="books_research_area_detail" 
                  data-peoplekey="books_article_name" 
                  data-field_pub_name = "publisher_edit_text"
                  data-field_pub_date = "published_date"
                  data-field_auther_name= "author_name"
                  data-tabid="tab4">Books</li>
               <?php   
                  }
                  ?>
               <?php
                  if (!empty($bookChapters)) {
                  ?>
               <li rel="tab5" id="singletab5" class="ajax-btn" 
                  data-posttype="bookchapters" 
                  data-metaquery_key="book_chapters_research_area_detail" 
                  data-peoplekey="book_chapters_name"    
                  data-field_pub_name = "publisher_name"
                  data-field_pub_date = "published_date"
                  data-field_auther_name= "author_name"
                  data-tabid="tab5">Book Chapters</li>
               <?php   
                  }
                  ?>
               <?php
                  if (!empty($briefsReports)) {
                  ?>
               <li rel="tab6" id="singletab6" class="ajax-btn" 
                  data-posttype="briefsreports"
                  data-metaquery_key="briefs_reports_research_area_details" 
                  data-peoplekey="briefs_reports" 
                  data-field_pub_name = "briefs_reports_publisher_name"                    
                  data-field_pub_date = "briefs_reports_published_date"
                  data-field_auther_name = "briefs_reports_author"
                  data-tabid="tab6">Policy Briefs & Reports</li>
               <?php
                  }
                  ?>
               <?php
                  if (!empty($workingPapers)) {                            
                  ?>                
               <li rel="tab7" id="singletab7" class="ajax-btn" 
                  data-posttype="workingpapers"
                  data-metaquery_key="working_papers_research_area_details" 
                  data-peoplekey="working_papers_detail" 
                  data-field_pub_name = "publisher_name"                    
                  data-field_pub_date = "published_date"
                  data-field_auther_name = "wp_author_name"                    
                  data-tabid="tab7">Working Papers</li>
               <?php
                  }
                  ?>
               <?php
                  if (!empty($news)) {                                       
                  ?>
               <li rel="tab8" id="singletab8" class="ajax-btn" 
                  data-posttype="post"                                         
                  data-metaquery_key="news_relation_research_area_details" 
                  data-peoplekey="news_detail" 
                  data-field_pub_name = "publisher_name"                    
                  data-field_pub_date = "published_date"
                  data-field_auther_name = "wp_author_name"
                  data-tabid="tab8">Policy Engagements & Blogs</li>
               <?php
                  }
                  ?>
               <?php
                  if (!empty($project)) {
                  ?>
               <li rel="tab9" id="singletab9" class="ajax-btn" 
                  data-posttype="project"                     
                  data-metaquery_key="project_relation_research_area" 
                  data-peoplekey="project_detail" 
                  data-field_pub_name = "publisher_name"                    
                  data-field_pub_date = "published_date"
                  data-field_auther_name = "wp_author_name"                    
                  data-tabid="tab9">Projects</li>
               <?php
                  }
                  ?>
            </ul>
         </div>
      </div>
      <style>
         .ajax-loader{
         position: absolute;
         width: 100%;
         background-color: #fff;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         bottom: 0;display: none;
         align-items: center;
         justify-content: center;
         }
      </style>
      <div class="tab-content" style="position: relative;">
         <div class="ajax-loader" style="">
            <!-- <img src="<?php echo get_template_directory_uri();?>/images/loader_1.gif"> -->
            <img style="width: 200px;height: 200px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif"/>
         </div>
         <div class="tab_container">
            <?php
               if (!empty($opinions)) {
               ?>
            <h3 class="tab_drawer_heading" rel="tab2">Opinions</h3>
            <?php
               }
               ?>
            <div id="single-tab2">
               <div id="tab2" class="tab_content tab2_content">
                  <?php
                  //global $wp_query;
                     $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                     
                     $args = new WP_Query( array(

                        'post_type' => 'opinions',
                        'orderby' => "id",
                        // 'order' => 'ASC',                 
                        'meta_key' => 'opinion_published_date',
                        'orderby' => "meta_value",
                        'orderby' => 'meta_value_num',
                        'meta_type' => 'DATE',
                        'order' => 'DESC', 

                        'posts_per_page'=>10,
                        'paged'=> 1,
                        'meta_query' => array(
                             array(
                            'key' => 'opinions_relation_research_area_details', // name of custom field
                            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                            'compare' => 'LIKE'
                            )
                         )
                        ));                         
                     ?>

                        <?php
                            $total_pages = $args->max_num_pages;   
                            
                        ?>

                    <input type="hidden" id="total_pages_tab2" value="<?php echo $total_pages?>" />

                  <?php  while ( $args->have_posts() ): $args->the_post();

                    
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
                                    ?>       
                           <?php       
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

                  
                  <div class="after-ajax-data">
                  </div>

                  <div class="loadmore" style="width: 100%;background: #191e36;color: #fff;padding: 5px 10px;margin-bottom: 10px;">
                  <!-- Load More... -->
                    <img style="width: 50px;height: 50px;" src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif"/>
                  </div>
                                                                   
                  <?php wp_reset_postdata();?>	
               </div>
            </div>
            <?php
               if (!empty($journalArticles)) {
               ?>  
            <h3 class="tab_drawer_heading ajax-btn" rel="tab3"            
                  data-posttype="journalarticles" 
                  data-metaquery_key="journal_article_research_area_detail" 
                  data-peoplekey="ja_detail"
                  data-field_pub_name = "publisher_name"
                  data-field_pub_date = "published_date"
                  data-field_auther_name= "author_name"
                  data-tabid="tab3">Journal Articles</h3>
            <?php
               }
               ?>
            <div id="single-tab3">
               <div id="tab3" class="tab_content">
               </div>
            </div>
            <?php
               if (!empty($books)) {
               ?>
            <h3 class="tab_drawer_heading ajax-btn" rel="tab4"            
                  data-posttype="books" 
                  data-metaquery_key="books_research_area_detail" 
                  data-peoplekey="books_article_name" 
                  data-field_pub_name = "publisher_edit_text"
                  data-field_pub_date = "published_date"
                  data-field_auther_name= "author_name"
                  data-tabid="tab4">Books</h3>
            <?php
               }
               ?>                
            <div id="single-tab4">
               <div id="tab4" class="tab_content">
               </div>
            </div>
            <?php
               if (!empty($bookChapters)) {
               ?>
            <h3 class="tab_drawer_heading ajax-btn" rel="tab5"            
                  data-posttype="bookchapters" 
                  data-metaquery_key="book_chapters_research_area_detail" 
                  data-peoplekey="book_chapters_name"    
                  data-field_pub_name = "publisher_name"
                  data-field_pub_date = "published_date"
                  data-field_auther_name= "author_name"
                  data-tabid="tab5">Book Chapters</h3>
            <?php
               }
               ?>
            <div id="single-tab5">
               <div id="tab5" class="tab_content">
               </div>
            </div>
            <?php
               if (!empty($briefsReports)) {
               ?>
            <h3 class="tab_drawer_heading ajax-btn" rel="tab6"            
                  data-posttype="briefsreports"
                  data-metaquery_key="briefs_reports_research_area_details" 
                  data-peoplekey="briefs_reports" 
                  data-field_pub_name = "briefs_reports_publisher_name"                    
                  data-field_pub_date = "briefs_reports_published_date"
                  data-field_auther_name = "briefs_reports_author"
                  data-tabid="tab6">Briefs Reports</h3>
            <?php
               }
               ?>                                
            <div id="single-tab6">
               <div id="tab6" class="tab_content">
               </div>
            </div>
            <?php
               if (!empty($workingPapers)) {
               ?>
            <h3 class="tab_drawer_heading ajax-btn"  rel="tab7"          
                  data-posttype="workingpapers"
                  data-metaquery_key="working_papers_research_area_details" 
                  data-peoplekey="working_papers_detail" 
                  data-field_pub_name = "publisher_name"                    
                  data-field_pub_date = "published_date"
                  data-field_auther_name = "wp_author_name"                    
                  data-tabid="tab7">Working Papers</h3>
            <?php
               }
               ?>
            <div id="single-tab7">
               <div id="tab7" class="tab_content">
               </div>
            </div>
            <?php
               if (!empty($news)) {
               ?>
            <h3 class="tab_drawer_heading ajax-btn"  rel="tab8"            
                  data-posttype="post"                                         
                  data-metaquery_key="news_relation_research_area_details" 
                  data-peoplekey="news_detail" 
                  data-field_pub_name = "publisher_name"                    
                  data-field_pub_date = "published_date"
                  data-field_auther_name = "wp_author_name"
                  data-tabid="tab8">Policy Engagements & Blogs</h3>
            <?php
               }
               ?>
            <div id="single-tab8">
               <div id="tab8" class="tab_content"               
                 >
               </div>
            </div>
            <?php
               if (!empty($project)) {
               ?>
            <h3 class="tab_drawer_heading ajax-btn" rel="tab9" 
                  data-posttype="project"                     
                  data-metaquery_key="project_relation_research_area" 
                  data-peoplekey="project_detail" 
                  data-field_pub_name = "publisher_name"                    
                  data-field_pub_date = "published_date"
                  data-field_auther_name = "wp_author_name"
                  data-tabid="tab9">Projects</h3>
            <?php
               }
               ?>
            <div id="single-tab9">
               <div id="tab9" class="tab_content newspost">
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
            <div class="col-md-6 col-lg-4 col-xl-3">
               <a href="<?php echo get_permalink( $document->ID ); ?>">
                  <div class="item">
                     <div class="item-img"> <img src="<?php echo get_field("faculty_image", $document->ID );?>" alt=""> </div>
                     <h3><?php echo get_the_title( $document->ID ); ?></h3>
                     <p><?php echo the_field('faculty_designation', $document->ID) ?></p>
                  </div>
               </a>
            </div>
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
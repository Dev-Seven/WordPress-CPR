<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cpr
 */

get_header();

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

$journalarticles = get_posts( array(
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

$bookchapters = get_posts( array(
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

$briefsreports = get_posts( array(
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
$workingpapers = get_posts( array(
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
        if(! empty($opinions) || ! empty($journalarticles) || ! empty($books) || ! empty($bookchapters) || ! empty($briefsreports)
	 || ! empty($workingpapers) || ! empty($news)){
          ?>
	
	
	
  <div class="news-tab">
    <div class="left-part">
      <div class="search-bar"> <img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-grey-search.png" alt="">
        <input class="form-control" type="text" placeholder="" aria-label="search">
      </div>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
 <ul class="tabs">
      <?php
        if (!empty($opinions)) {
      ?>
         <li rel="tab2">Opinions</li>
      <?php
        }
      ?>
       <?php
        if (!empty($journalarticles)) {
      ?>
        <li rel="tab3">Journal Articles</li>
      <?php
        }
      ?>


       <?php
        if (!empty($books)) {
      ?>
          <li rel="tab4">Books</li>
      <?php
        }
      ?>
		 

       <?php
        if (!empty($bookchapters)) {
      ?>
         <li rel="tab5">Book Chapters</li>
      <?php
        }
      ?>
		  
       <?php
        if (!empty($briefsreports)) {
      ?>
        <li rel="tab6">Briefs Reports</li>
      <?php
        }
      ?>
		 

       <?php
        if (!empty($workingpapers)) {
      ?>
           <li rel="tab7">Working Papers</li>
      <?php
        }
      ?>
		 

       <?php
        if (!empty($news)) {
      ?>
         <li rel="tab8">News</li>
      <?php
        }
      ?>
		  </ul> 
		</div>
    </div>
	  
	 
 
	  
	  
	  
       <div class="tab-content" id="v-pills-tabContent">
		
		
		
	<div class="tab_container">	
    
<?php

         if (!empty($opinions)) {
      ?>
       <h3 class="tab_drawer_heading" rel="tab2">Opinions</h3><?php
        }
      ?>
		<div id="tab2" class="tab_content">
         <?php
         $documents = get_posts( array(
          'post_type' => 'opinions',
			'orderby' => "id",
          'order' => 'ASC',
			 'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'opinions_detail', // name of custom field
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
            <p><?php echo the_field("opinion_publisher_journal_name", $document->ID ); ?></p>
          </div>
          <div class="news-date">
            <p>
              <?php   ?>
            </p>
            <p><?php echo the_field("author_name", $document->ID ); ?></p>
          </div>
        </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
     
      
	   <?php
        if (!empty($journalarticles)) {
      ?>
  
      <h3 class="tab_drawer_heading" rel="tab3">Journal Articles</h3><?php
        }
      ?>
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

		   <?php
        if (!empty($books)) {
      ?>
  
		 <h3 class="tab_drawer_heading" rel="tab4">Books</h3><?php
        }
      ?>
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
   <?php
        if (!empty($bookchapters)) {
      ?>
  
    <h3 class="tab_drawer_heading" rel="tab5">Book Chapters</h3><?php
        }
      ?>
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
		
	  <?php
        if (!empty($briefsreports)) {
      ?>
       <h3 class="tab_drawer_heading" rel="tab6">Briefs Reports</h3><?php
        }
      ?>
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
		
       <?php
        if (!empty($workingpapers)) {
      ?>
      <h3 class="tab_drawer_heading" rel="tab7">Working Papers</h3><?php
        }
      ?>
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
		 
		
 
       <?php
        if (!empty($news)) {
      ?>
		<h3 class="tab_drawer_heading" rel="tab8">News</h3> <?php
        }
      ?>
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
		 <?php } ?>
</main>

 
<?php get_footer(); ?>

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
  'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'post', 'project', 'people'),
'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => array('opinions_detail_research',
                        'journalarticles_detail',
                        'books_research_detail',
                        'book_chapters_research_detail',
                        'briefs_reports_research_detail',
                        'working_papers_detail_research',
                        'news_detail_research',
					 'project_detail_research',
                       ),
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$opinions = get_posts( array(
  'post_type' => 'opinions',
	'posts_per_page'=>-1,
	'meta_key' => 'opinion_published_date',
		  'orderby' => "meta_value",
		  'meta_type' => 'DATE',
          'order'=>'ASC',
  'meta_query' => array(
    array(
      'key' => 'opinions_detail_research',
      'value' => '"' . get_the_ID() . '"', 
		'compare' => 'LIKE'
    )
  )
));
      
$journalArticles = get_posts( array(
  'post_type' => 'journalarticles',
	'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'journalarticles_detail', 
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$books = get_posts( array(
  'post_type' => 'books',
	'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'books_research_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$bookChapters = get_posts( array(
  'post_type' => 'bookchapters',
	'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'book_chapters_research_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$briefsReports = get_posts( array(
  'post_type' => 'briefsreports',
	'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'briefs_reports_research_detail',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$workingPapers = get_posts( array(
  'post_type' => 'workingpapers',
	'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'working_papers_detail_research',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$news = get_posts( array(
  'post_type' => 'post',
	'posts_per_page'=>-1,
	'orderby' => "date",
          'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'news_detail_research',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
));

$project = get_posts( array(
//  'post_type' => 'project',
//  'orderby' => "date",
//  'order' => 'DESC',
//  'posts_per_page'=>-1, 
//  'meta_query' => array(
//    array(
//      'key' => 'project_detail_research',
//      'value' => '"' . get_the_ID() . '"', 
//      'compare' => 'LIKE'
//    )
//  )
	'post_type' => 'project',
	      'orderby' => "id",
          'order' => 'ASC',
		  'posts_per_page'=> -1,
          'meta_query' => array(
            array(
              'key' => 'project_detail_research',
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
	<?php 
	$twitter_url = get_field( 'twitter_url' );
	$website_link = get_field( 'website_link' );
	$facebook_link = get_field( 'facebook_link' );
	$linkedin_link = get_field( 'linkedin_link' );
	$instagram_link = get_field( 'instagram_link' );
	?>
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
			 <div class="facylty-degination website-link">
			 <?php 	
	if (!empty($twitter_url)) {?> 
           <a href="<?php echo $twitter_url; ?>" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-twitter fa-w-16 fa-2x" style="font-size: 2em;width:20px;"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" class=""></path></svg></a><?php } ?>
				 <?php  if(!empty($twitter_url) && !empty($website_link)){?><span class="r-line"></span><?php } ?>
				 <?php if ($website_link != "") { ?><a href="<?php echo $website_link; ?>" target="_blank">			 
				<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-globe fa-w-16 fa-2x" style="font-size: 2em;width:20px;"><path fill="currentColor" d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z" class=""></path></svg> 
				 </a>
         <?php } ?>   
			  <?php  if(!empty($website_link) && !empty($facebook_link)){?><span class="r-line"></span><?php } ?>
			<?php if ($facebook_link != "") { ?><a href="<?php echo $facebook_link; ?>" target="_blank">
				 <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-facebook-f fa-w-10 fa-2x" style="font-size: 2em;width:13px;"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" class=""></path></svg>
				 </a>
         <?php } ?>  
				 <?php  if(!empty($facebook_link) && !empty($instagram_link)){?><span class="r-line"></span><?php } ?>
				 <?php if ($instagram_link != "") { ?><a href="<?php echo $instagram_link; ?>" target="_blank">		 
				<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14 fa-2x" style="font-size: 2em;width:20px;"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path></svg>
				 </a>
         <?php } ?>  
				  <?php  if(!empty($linkedin_link)){?><span class="r-line"></span><?php } ?>
				 <?php if ($linkedin_link != "") { ?><a href="<?php echo $linkedin_link; ?>" target="_blank">		 
				<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-linkedin-in fa-w-14 fa-2x" style="font-size: 2em;width:20px;"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" class=""></path></svg>
				 </a>
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
 <?php /*?> <?php
        $documents = get_posts( array(
          'post_type' => 'people',
          'meta_query' => array(
            array(
              'key' => 'research_detail', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )
        ) );
        ?>
        <?php
        if (!empty($documents)) {
          ?>
  <section class="faculty-slider-sec">
    <div class="container-fluid">
      <div class="faculty-slider carousel">

        <?php if( $documents ): ?>
        <?php foreach( $documents as $document ): ?>
        <div>
          <div class="faculty-slider-box">
            <div class="facult-img"> <img src="<?php echo get_field("faculty_image", $document->ID );?>" class="d-block" alt="..."> </div>
            <div class="facult-info">
              <h4><?php echo get_the_title( $document->ID ); ?></h4>
              <p><?php echo the_field('faculty_designation', $document->ID) ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php } ?><?php */?>
	
	<?php
$ids = get_field('research_detail', false, false);
      $documents = get_posts( array(
          'post_type' => 'people',
		  'posts_per_page'=>-1,
		  'post__in' => $ids,
		  'orderby' =>  'post__in',
		  // 'orderby' => "id",
         // 'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'research_detail', // name of custom field
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
    </div>
  </section>
  <?php } ?>
	
	
	
	 <?php
//print_r($allCategories);
        if (($allCategories != NULL )){
          ?>
  <div class="news-tab">
    <div class="left-part">
      <div class="search-bar"> <img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-grey-search.png" alt="">
                <input class="form-control tab-section-input" type="text" id="keyword2" placeholder="" aria-label="search" onChange="fetch2()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword3" placeholder="" aria-label="search" onChange="fetch3()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword4" placeholder="" aria-label="search" onChange="fetch4()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword5" placeholder="" aria-label="search" onChange="fetch5()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword6" placeholder="" aria-label="search" onChange="fetch1()" style="display:none;">
                <input class="form-control tab-section-input" type="text" id="keyword7" placeholder="" aria-label="search" onChange="fetch()" style="display:none;">     <input class="form-control tab-section-input" type="text" id="keyword8" placeholder="" aria-label="search" onChange="fetch8()" style="display:none;">
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
    <div class="tab-content" id="v-pills-tabContent">
		<div class="tab_container">
		 <?php
        if (!empty($allCategories)) {
          ?> <h3 class="d_active tab_drawer_heading" rel="tab1">All</h3><?php
        }
      ?>
  <!-- <div id="tab1" class="tab_content">
        <?php 
        $allCategories = get_posts( array(
            'post_type' => array('opinions', 'journalarticles', 'books', 'bookchapters', 'briefsreports', 'workingpapers', 'project','people'),
           'orderby' => "id",
          'order' => 'ASC',
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
            <h3><?php echo get_the_title( $document->ID ); ?> </h3>
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
        <?php endif; wp_reset_postdata();?>

    
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
              'key' => 'opinions_detail_research', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )
        ) );
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
              'key' => 'journalarticles_detail', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
			
          )
        ) );
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
          'post_type' =>'books',
		    'orderby' => "id",
          'order' => 'ASC',
		  'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'books_research_detail',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
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
              'key' => 'book_chapters_research_detail', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )
        ) );
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
              'key' => 'briefs_reports_research_detail',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
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
			'posts_per_page'=>-1,
          'meta_query' => array(
            array(
              'key' => 'working_papers_detail_research',
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
              'key' => 'news_detail_research',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
        ) );
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
  <?php

         if (!empty($project)) {
      ?>
      <h3 class="tab_drawer_heading" rel="tab9">Projects</h3>
        
  <div id="single-tab9">
    <div id="tab9" class="tab_content newspost">
        <?php
        $args = new WP_Query( array(
          'post_type' => 'project',
	      'orderby' => "id",
          'order' => 'ASC',
		  'posts_per_page'=> -1,
          'meta_query' => array(
            array(
              'key' => 'project_detail_research',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            ),
            array(
              'key'       => 'project_status',
              'compare'   => '=',
              'value'     => 'active',
          )
          )
        ) );
        ?>
	
	
	  
	  <?php  while ( $args->have_posts() ): $args->the_post();
      $author = get_field( 'author_name' );
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
			  <p><?php echo $author; ?></p>
          </div>
        </div>
	  <?php endwhile; ?>
        <?php wp_reset_postdata();?>  
	  	
    </div>
  </div>
	<?php  
	  }
      ?>
            </div>
  </div>
  </div>
 <?php } ?>
	  
	  <?php
        if ((have_rows( 'research_project' ) != NULL )){
          ?>
	  <section class="single-research-bottom-sec">
		<div class="container">
			<div class="row justify-content-center">
			<?php
              if ( have_rows( 'research_project' ) ):
                while ( have_rows( 'research_project' ) ): the_row();
              $project_image = get_sub_field( 'project_image' );
              $project_title = get_sub_field( 'project_title' );
              $project_link = get_sub_field( 'project_link' );

              ?>
				<div class="col-md-6 col-lg-4 col-xl-3">
					 <a href="<?php echo $project_link; ?>" target="_blank">
						 <div class="item">
          <div class="item-img">
					<img src="<?php echo $project_image; ?>" alt=""> 
			   </div>
				<h4><?php echo $project_title; ?></h4>
			  </div>
							
						</a>
				</div>
			<?php	endwhile; ?>
              <?php
              else :
                endif;
              ?>
				
			</div>
			
			</div>
	</section>
	 	   <?php } ?>
	  
</main>
 
<?php get_footer(); ?>
<?php
function ajax_fetch_single_research() {
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
  // console.log(keyword7);
        if(keyword7 != "")
		{
			// jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_singleresearch7', keyword7: jQuery('#keyword7').val() },
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
				data: { action: 'data_fetch_singleresearch6', keyword6: jQuery('#keyword6').val() },
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
				data: { action: 'data_fetch_singleresearch2', keyword2: jQuery('#keyword2').val() },
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
				data: { action: 'data_fetch_singleresearch3', keyword3: jQuery('#keyword3').val() },
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
				data: { action: 'data_fetch_singleresearch4', keyword4: jQuery('#keyword4').val() },
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
				data: { action: 'data_fetch_singleresearch5', keyword5: jQuery('#keyword5').val() },
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
				data: { action: 'data_fetch_singleresearch8', keyword8: jQuery('#keyword8').val() },
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
				data: { action: 'data_fetch_singleresearch9', keyword9: jQuery('#keyword9').val() },
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


<?php

/**
 * Template Name: News single Template
 * Template Post Type: post, page
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cpr
 */

get_header();

?>
<section class="inner-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
		  
		  <div class="breadcrumb news-breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          <!-- Breadcrumb NavXT 6.6.0 -->
<span property="itemListElement" typeof="ListItem" class="breadcrumb-item">
	<a property="item" typeof="WebPage" title="Go to CPR." href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home"><span property="name">CPR</span></a>
	<meta property="position" content="1"></span>
			  <span property="itemListElement" typeof="ListItem">
				  <a property="item" typeof="WebPage" title="Go to the News category archives." href="<?php echo home_url( '/' ); ?>news-blogs/" class="taxonomy post category"><span property="name">Policy Engagements and Blogs</span></a>
				  <meta property="position" content="2"></span>
			  <span property="itemListElement" typeof="ListItem" class="breadcrumb-item active">
				  <span property="name" class="post post-post current-item"><?php the_title(); ?></span>
				  <meta property="url" content="<?php  echo get_permalink( $id ) ?>">
				  <meta property="position" content="3">
			  </span>       
		  </div>
		  
		  
		
		  
		  
		  
        <?php /*?><div class="breadcrumb news-breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          <?php
          if ( function_exists( 'bcn_display' ) ) {
            bcn_display();
          }
          ?>
        </div><?php */?>
        <h1>Policy Engagements and Blogs</h1>
      </div>
    </div>
  </div>
</section>


 <?php  while ( have_posts() ) : the_post(); ?>
<?php 
$published_date = get_field( 'published_date' );
?>
<div class="news-title-sec" id="Test_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-xl-7 col-xxl-8">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-5 col-xxl-4 publish-sec">
          <h3><?php	//cpr_posted_by(); ?>
			  
			 <?php  
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'news_detail', // name of custom field
                              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                              'compare' => 'LIKE'
                                  )
                              )
                          ));
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
                      <?php echo get_the_title($document->ID);?>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                        <?php echo get_the_title($document->ID).',';?>
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
			
 
			  
			  
			  
		  <?php /*?> <?php 
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'news_detail', // name of custom field
                              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                              'compare' => 'LIKE'
                                  )
                              )
                          ));
          ?>
            <?php if( $documents ): ?>
              <?php foreach( $documents as $document ): ?>
                   <?php echo get_the_title( $document->ID); ?> 
             <?php endforeach; ?>
          <?php endif; ?><?php */?>
		  
		  </h3>
        <div class="pyear"><?php //the_date('F j, Y') ?><?php echo $published_date; ?></div>
      </div>
    </div>
  </div>
</div>
<?php /*?><div class="news-content-sec">
  <div class="container">
    <div class="row">
		
		      <div class="col-md-12"> <?php echo $news_top_paragraph; ?> </div>
		<div class="col-md-12 text-center news-img">
			<img src="<?php echo $news_image; ?>" alt=""/>
       
      </div>

      
    </div>
  </div>
</div><?php */?>
 <div class="news-content">
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
			<div class="sp-bottom">
		<div class="row">
		<!-- <div class="col-md-6">		
		<div class="category">
			<div class="topics-bg">Topics</div>
			<div class="category-list">
	<?php 
//   $categories = get_the_category();
// if ( ! empty( $categories ) ) {
//     echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
// }	
	?>		
				</div>
		</div>
		 </div> -->
		<!-- <div class="col-md-6">
		<div class="tags-bg">Tags</div>
		<div class="tags-list">
		<?php
//echo get_the_tag_list('<p>',', ','</p>');
?>
			</div>
 </div> -->
 
			 </div>
				</div>
			<div style="height: 50px;"></div>
	  </div>
	  </div>
 <?php endwhile; ?>


<?php get_footer(); ?>

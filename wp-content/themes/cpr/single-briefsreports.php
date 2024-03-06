<?php
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
        <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          <?php
          if ( function_exists( 'bcn_display' ) ) {
            bcn_display();
          }
          ?>
        </div>
        <h1>Policy Briefs &amp; Reports</h1>
      </div>
    </div>
  </div>
</section>


<?php

$briefs_reports_publisher_name = get_field( 'briefs_reports_publisher_name' );
$briefs_reports_author = get_field( 'briefs_reports_author' );
$briefs_reports_published_date = get_field( 'briefs_reports_published_date' );
$briefs_reports_image = get_field( 'briefs_reports_image' );
$briefs_reports_pdf = get_field( 'briefs_reports_pdf' );
  $title  = get_the_title();
  ?>


	
<div class="pbr-heading-sec">
    <div class="container">
      <div class="row">
		  <div class="col-md-12 col-lg-6">
			<h2><?php echo $title; ?></h2>
			  <h3>
			  <?php  
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'briefs_reports', // name of custom field
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
			
		<?php if ($briefs_reports_author != "") {
  echo "<br>";echo "".$briefs_reports_author;
 } ?>  	  
				  
           <?php /*?> <?php if( $documents ): ?>
              <?php foreach( $documents as $document ): ?>
				    <a href="<?php echo get_permalink( $document->ID ); ?>">
              <?php echo get_the_title( $document->ID ); ?>,
				  </a>
             <?php endforeach; ?>
          <?php endif; ?>
          <?php echo $briefs_reports_author; ?><?php */?></h3>
			  <p><?php echo $briefs_reports_publisher_name; ?></p>
		<p><?php echo $briefs_reports_published_date; ?></p>
		  </div>
      

      </div>
</div>
  </div>	
	
	
	
  <div class="pbr-content-sec">
    <div class="container">
      <div class="row">
		  
		  
		  <div class="col-md-12 col-lg-7">
	<div class="pbr-content">
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
        <div class="col-md-12 col-lg-5 image-end">
			<?php if ($briefs_reports_image != "") { ?>
			<figure><img class="book-img" src="<?php echo $briefs_reports_image; ?>" alt=""/></figure>
			   <?php } ?>
    		 <?php if ($briefs_reports_pdf != "") { ?>
			<div class="pdf-link"><a href="<?php echo $briefs_reports_pdf; ?>" target="_blank">Download<img src="<?php echo get_template_directory_uri(); ?>/images/icon-pdf.png" alt=""/></a></div>
		  <?php } ?>
		  </div>

      </div>
</div>
  </div>
<!--<div style="height:150px;"></div>-->



<?php get_footer(); ?>

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
        <h1>Opinion and commentary</h1>
      </div>
    </div>
  </div>
</section>


<?php


$opinion_published_date = get_field( 'opinion_published_date' );
$opinion_publisher_journal_name = get_field( 'opinion_publisher_journal_name' );
$opinion_link = get_field( 'opinion_link' );
$opinion_pdf = get_field( 'opinion_pdf' );
$author_name = get_field( 'author_name' );
  ?>


<div class="books-title-sec" id="Test_1">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-7 col-xxl-8">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-5 col-xxl-4 publish-sec">
		<h3> <?php
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
    //    echo "<pre>";
    //    print_r($documents);
    //    echo "</pre>";
    //    exit;
 ?>
 <?php if( $documents ): ?>
 <?php foreach( $documents as $document ): ?>
   By <?php echo get_the_title( $document->ID ); ?>
   <?php endforeach; ?>
 <?php endif; ?><?php echo $author_name; ?></h3>
			<p><?php echo $opinion_publisher_journal_name; ?></p>
			<p><?php echo $opinion_published_date; ?></p>
      </div>
    </div>
  </div>
</div>
<div class="books-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="book-content">
          <?php
          $maincontent = get_the_id();
          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
			 <?php if ($opinion_link != "") { ?>
            <a href="<?php echo $opinion_link; ?>" target="_blank" class="btn_1 outline">Publisher Page<span>&gt;</span></a> 
           <?php } ?> 
			 <?php /*?><?php if ($$opinion_pdf != "") { ?>
			<div class="pdf-link"><a href="<?php echo $opinion_pdf; ?>" target="_blank">Download<img src="<?php echo get_template_directory_uri(); ?>/images/icon-pdf.png" alt=""/></a></div>
			  <?php } ?> <?php */?>
		  </div>
      </div>
    </div>
  </div>
</div>
<!--<div style="height:150px;"></div>-->



<?php get_footer(); ?>

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
        <h1>Books Chapters</h1>
      </div>
    </div>
  </div>
</section>


<?php

$book_chapters_title = get_field( 'book_chapters_title' );
$author_name = get_field( 'author_name' );
$publisher_edit_text = get_field( 'publisher_edit_text' );
$book_image = get_field( 'book_image' );
$publisher_link = get_field( 'publisher_link' );
$publisher_name = get_field( 'publisher_name' );
$published_date = get_field( 'published_date' );

  ?>


<div class="books-title-sec" id="Test_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-xl-7 col-xxl-8">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-5 col-xxl-4 publish-by-sec">
        <div class="publish-by-left">
          <?php //echo $author_name; 
          /*
           *  Query posts for a relationship value.
           *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
           */
  
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'book_chapters_name', // name of custom field
                              'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                              'compare' => 'LIKE'
                                  )
                              )
                          ));
          ?>
            <?php if( $documents ): ?>
              <?php foreach( $documents as $document ): ?>
                   <a href="<?php echo get_permalink( $document->ID ); ?>">
                   <h3><?php echo get_the_title( $document->ID ); ?> </h3>
                   </a>
             <?php endforeach; ?>
          <?php endif; ?>
			
        </div>
        <div class="editby">
			<span><?php echo $publisher_edit_text; ?></span>
            <span><?php echo $publisher_name; ?></span>
			<span><?php echo $author_name; ?></span>
			<span><?php echo $published_date; ?></span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="books-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-4"> <img src="<?php echo $book_image; ?>" alt=""/> </div>
      <div class="col-md-12 col-lg-8">
        <div class="book-content">
          <?php
          $maincontent = get_the_id();
          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
          <a href="<?php echo $publisher_link; ?>" target="_blank" class="btn_1 outline">Publisher Page<span>&gt;</span></a> </div>
      </div>
    </div>
  </div>
</div>
  <div class="clear-fix"></div>
<div class="book-bh"></div>

<?php get_footer(); ?>

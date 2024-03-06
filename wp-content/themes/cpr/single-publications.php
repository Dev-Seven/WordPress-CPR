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
        <h1>Publications</h1>
      </div>
    </div>
  </div>
</section>
<?php /*?><?php
$args = array(
  'post_type' => 'publications',
  'tax_query' => array(
    array(
      'taxonomy' => 'publications_category',
      'field' => 'slug',
      'terms' => 'book-chapters',
    ),
  ),
  'post_status' => 'publish',
  'no_found_rows' => true,
);


$query = new WP_Query( $args );

$book_chapters_title = get_field( 'book_chapters_title' );
$publisher_name = get_field( 'publisher_name' );
$publisher_edit_text = get_field( 'publisher_edit_text' );
$publisher_image = get_field( 'publisher_image' );
$publisher_link = get_field( 'publisher_link' );
$publish_date = get_field( 'publish_date' );


$book_chapters = $args[ 'tax_query' ][ 0 ][ 'terms' ];

//Second post code//

									   
$books = array(
            'post_type' => 'publications',
            'tax_query' => array(
                array(
                    'taxonomy'  => 'publications_category',
                    'field'     => 'slug',
                    'terms'     => 'books',
                    ), 
                ),
            'post_status' => 'publish',
            'no_found_rows' => true,
);

$books_array = new WP_Query($books);
$books_result =  $books_array->query_vars['tax_query'][0]['terms'];
							   


if ($book_chapters = 'book-chapters') {

  ?>
<div class="books-title-sec" id="Test_1">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-7 col-xxl-8">
        <h2><?php echo $book_chapters_title; ?></h2>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-5 col-xxl-4 publish-by-sec">
        <?php if( $publisher_edit_text !="" ) { ?>
        <div class="publish-by-left">
          <h3><?php echo $publisher_name; ?></h3>
        </div>
        <div class="editby"><span><?php echo $publisher_edit_text; ?></span>
          <?php } else { ?>
          <div class="publish-by-left">
            <h3><?php echo $publisher_name; ?></h3>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="books-content-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-4"> <img src="<?php echo $publisher_image; ?>" alt=""/> </div>
      <div class="col-md-8">
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
<div style="height:150px;"></div>
<?php


} elseif ($books_result = 'books') {

?>
<div class="books-title-sec" id="naimesh">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php echo $book_chapters_title; ?></h2>
      </div>
      <div class="col-md-6 publish-sec">
        <h3><?php echo $publisher_name; ?></h3>
        <div class="pyear"><?php echo $publish_date; ?></div>
      </div>
    </div>
  </div>
</div>
<div class="books-content-sec" id="chirag">
  <div class="container">
    <div class="row">
      <div class="col-md-4"> <img src="<?php echo $publisher_image; ?>" alt=""/> </div>
      <div class="col-md-8">
        <div class="book-content">
          <?php
          $maincontent = get_the_id();
          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
          <a href="<?php echo $publisher_link; ?>" class="btn_1 outline">Publisher Page<span>&gt;</span></a> </div>
      </div>
    </div>
  </div>
</div>

<?php
}

?><?php */?>
<?php get_footer(); ?>

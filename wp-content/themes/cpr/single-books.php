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
        <h1>Books</h1>
      </div>
    </div>
  </div>
</section>
<?php
$book_chapters_title = get_field( 'book_chapters_title' );
$author_name = get_field( 'author_name' );
$published_date = get_field( 'published_date' );
$book_image = get_field( 'book_image' );
$publisher_page_link = get_field( 'publisher_page_link' );
$publisher_journal_name = get_field( 'publisher_journal_name' );
$publisher_name = get_field( 'publisher_name' );
  ?>
<div class="books-title-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="col-md-12 col-lg-6 publish-sec">
		  <div class="bauthore">
          <?php $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'books_article_name', 
                              'value' => '"' . get_the_ID() . '"', 
                              'compare' => 'LIKE'
                                  )
                              )
                          ));?>
			  
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
			<?php if ($author_name != "") {
  echo "<br>";echo "".$author_name;
 } ?>  
			  
			  
          <?php /*?>if( $documents ): ?>
                    <?php ?>
                 
                  <?php 
                  
                  $numItems = count($documents);
                  $i = 0;
                  ?>                   
                  <?php foreach( $documents as $key=>$document): 
                     ?>
                      <?php
                    if(++$i === $numItems) { ?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                      <span><?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 50, "");
						  ?></span>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                       <span><?php //echo get_the_title ( $document->ID ).','; ?><?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 50, "").',';
						  ?></span>
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
          
       
          <span></span><?php if ($author_name != "") {
echo "".$author_name;
 } ?><?php */?>
 <?php// echo $author_name; ?></div>
        <div class="pyear"><?php echo $published_date; ?></div>
		    <div class="pyear"><?php echo $publisher_name; ?></div>
		    <div class="pyear"><?php echo $publisher_journal_name; ?></div>
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
        <?php if ($publisher_page_link != "") { ?>
            <a href="<?php echo $publisher_page_link; ?>" class="btn_1 outline" target="_blank">Publisher Page<span>&gt;</span></a>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="clear-fix"></div>
<div class="book-bh"></div>
<?php get_footer(); ?>

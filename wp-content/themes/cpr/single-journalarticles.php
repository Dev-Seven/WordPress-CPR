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
        <h1>Journal Articles</h1>
      </div>
    </div>
  </div>
</section>


<?php

              $author_name = get_field( 'author_name' );
              $publisher_name = get_field( 'publisher_name' );
              $published_date = get_field( 'published_date' );  
			        $title  = get_the_title();  
              $publisher_link  = get_field( 'publisher_link' );
$publisher_pdf = get_field( 'publisher_pdf' );
  ?>


<div class="books-title-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-xl-7 col-xxl-8">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-5 col-xxl-4 publish-sec">
          <h3>
			  
	<?php  
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'ja_detail', // name of custom field
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
			
		<?php if ($author_name != "") {
  echo "<br>";echo "".$author_name;
 } ?>  
			  
			  
          <?php /*?><?php

$documents = get_posts(array(
	'post_type' => 'people',
	'meta_query' => array(
	 array(
		   'key' => 'ja_detail', // name of custom field
		   'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
		   'compare' => 'LIKE'
			   )
		   )
	   ));
?>
<?php if( $documents ): ?>
<?php foreach( $documents as $document ): ?>
			   <a href="<?php echo get_permalink( $document->ID ); ?>">
  <?php echo get_the_title($document->ID);?>,
			  </a>
  <?php endforeach; ?>
<?php endif; ?>
			  
 <?php echo $author_name; ?>			  
			  
<?php if ($author_name != "") {
echo "".$author_name;
 } ?><?php */?>
      </h3>


			<p class="pyear"><?php echo $publisher_name; ?></p>
			<p class="pyear"><?php echo $published_date; ?></p>
      </div>
    </div>
  </div>
</div>
<div class="books-content-sec">
  <div class="container">
    <div class="row">
<?php /*?>      <div class="col-md-4"> <img src="<?php echo $book_image; ?>" alt=""/> </div>
<?php */?>     
		<div class="col-md-12">
        <div class="book-content ja-content">
          <?php
          $maincontent = get_the_id();
          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
          <?php if ($publisher_link != "") { ?>
            <a href="<?php echo $publisher_link; ?>" target="_blank" class="btn_1 outline">Publisher Page<span>&gt;</span></a> 
           <?php } ?> 
			 <?php if ($publisher_pdf != "") { ?>
           <a href="<?php echo $publisher_pdf; ?>" target="_blank" class="sja-pdf-link"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-pdf.png" alt=""/></a>
           <?php } ?> 
        </div>
      </div>
    </div>
  </div>
</div>
<!--<div style="height:150px;"></div>-->



<?php get_footer(); ?>

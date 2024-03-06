<?php
/**
 * Template Name: Book Template
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
    </div>
  </div>
</section>
<div class="books-listing book-list">
  <div class="container">
    <div class="row common">
      <div class="col-md-8">
        <div class="search-sec">
          <div class="search-box">
			 
            <div class="project-search-bar">
              <input class="form-control" type="text" id="keyword" placeholder="Search Books" aria-label="search">
            </div>
            <button class="search-button" type="button" onClick="fetch()">Search<span>&gt;</span></button>
			
			</div>
        </div>
      </div>
		
      <div class="col-md-4">
        <div class="dropdown">
          <button id="btn_custom" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if(isset($_GET['orderby']) && $_GET['orderby'] != ""): ?>
          <?php if($_GET['orderby'] == 'date'): ?>
          Newest to Oldest
          <?php endif; ?>
          <?php if($_GET['orderby'] == 'id'): ?>
          Oldest to Newest
          <?php endif; ?>
          <?php else: ?>
          Sort By
          <?php endif; ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/droupdown-arrow.png" alt="">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a data-value="date" class="dropdown-item sorting" href="javascript:void(0)">Newest to Oldest</a> <a data-value="id" class="dropdown-item sorting" href="javascript:void(0)">Oldest to Newest</a>
            <form method="GET" class="sorting-form">
              <input type="hidden" name="orderby" class="orderby">
            </form>
          </div>
        </div>
      </div>
    </div>
	  
	  		

    <div class="hide-data mb-book" id="datafetch">		
<?php $custom_orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : "";
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          if(isset($_GET['orderby']) && $_GET['orderby'] != ""):
          
            if ( !empty( $custom_orderby ) && "id" == $custom_orderby ):
          $args = new WP_Query( array(
            'post_type' => 'books',
            'post_status' => 'publish',
            'posts_per_page' => 18,
            'meta_key' => 'published_date',
				'orderby' => "meta_value",
				  'meta_type' => 'DATE',
			   'order' => 'DESC',
			  //'posts_per_page' => $num,
    'paged' => $paged
          ) );
      endif;

      if ( !empty( $custom_orderby ) && "date" == $custom_orderby ):
        $args = new WP_Query( array(
          'post_type' => 'books',
          'post_status' => 'publish',
          'posts_per_page' => 18,
         'meta_key' => 'published_date',
				'orderby' => "meta_value",
				  'meta_type' => 'DATE',
			 'order' => 'DESC',
			//'posts_per_page' => $num,
    'paged' => $paged
        ) );
      endif;
      else :

        $args = new WP_Query( array(
          'post_type' => 'books',
          'post_status' => 'publish',
          'posts_per_page' => 18,
           'meta_key' => 'published_date',
				'orderby' => "meta_value",
				  'meta_type' => 'DATE',
			 'order' => 'DESC',
			//'posts_per_page' => $num,
    'paged' => $paged
        ) );
      endif;

          ?>
					   <div class="row">
					<?php
      while ( $args->have_posts() ): $args->the_post();
      $author_name = get_field( 'author_name' );
      $book_image = get_field( 'book_image' );
      $published_date = get_field( 'published_date' );
      $title = get_the_title();

      ?>
				
					<div class="col-md-6 col-lg-6 col-xl-4"> 
        <div class="item">
          <div class="item-img">
			  <a href="<?php echo get_permalink( $id ) ?> ">
                <?php if ($book_image != "") { ?>
                    <img src="<?php echo $book_image; ?>" alt="">
                <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image.png" />
                <?php } ?>
			  </a>
              </div>
          <div class="item-content">
            <div class="item-booktext">
				 <a href="<?php echo get_permalink( $id ) ?> "><h3><?php echo mb_strimwidth($title, 0, 40, "...");?></h3></a>
              <?php if ($published_date != "") {?>
              <div class="pub-date">Published : <?php echo $published_date; ?></div>
              <?php } ?>
            </div>
            <div class="publisher-name">
<!--				 <span class="d-block">By,</span>-->
				<?php 
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'books_article_name', 
                              'value' => '"' . get_the_ID() . '"', 
                              'compare' => 'LIKE'
                                  )
                              )
                          ));
          //if( $documents ): 
				?>
                    <?php ?>
                  <?php //echo "<br>"; ?>
				<?php if( !empty($documents) || !empty($author_name) ):?> 
				<span class="d-block">by,</span>
				<?php endif; ?> 
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
						  echo mb_strimwidth($authorname, 0, 50, "...")
						  ?></span>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                       <span><?php //echo get_the_title ( $document->ID ).','; ?><?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 50, ",...")
						  ?></span>
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
                  <?php //endif; ?>
				<span class="sauthorname">			
					<?php if ($author_name != "") {
	 //echo "<br>";
	$name = mb_strimwidth($author_name, 0, 30, "..."); 
echo "".$name;
 } ?>					</span>
           </div>
          </div>
        </div>
 </div>
					
                    
                      <?php endwhile; ?>
						      <div class="clear-fix"></div>
						   <div class="pagination-list">
	<?php /*?><div class="pagi-prev-btn"><?php previous_posts_link( '&laquo;', $parent->max_num_pages) ?></div><?php */?>		
 <?php 
$total = $args->max_num_pages;
// only bother with the rest if we have more than 1 page!
if ( $total > 1 )  {
     // get the current page
     if ( !$current_page = get_query_var('paged') )
          $current_page = 1;
     // structure of "format" depends on whether we're using pretty permalinks
     if( get_option('permalink_structure') ) {
	     $format = 'page/%#%';
     } else {
	     $format = 'page/%#%';
     }

     echo paginate_links(array(
         'base' => get_pagenum_link(1). '%_%',
          'format'   => 'page/%#%',
          'current'  => $current_page,
          'total'    => $total,
          'mid_size' => 4,
          'type'     => 'list',
		  'prev_text' => '&laquo',
		  'next_text' => '&raquo;',
     ));
}
			 ?>
		<?php /*?><div class="pagi-next-btn"><?php next_posts_link( '&raquo;', $parent->max_num_pages) ?></div><?php */?>

<?php wp_reset_postdata(); ?>
 
</div>
</div>      

    </div>
				
    <!-- /tabs_menu--> 
  </div>
  <!-- /container --> 

</div>

<?php get_footer(); ?>
<script>
    jQuery(document).on('click','.sorting', function(){
    let sorting_value  = jQuery(this).attr("data-value");
     jQuery('.orderby').val(sorting_value);
     jQuery('.sorting-form').submit();
   });
</script> 
<?php
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){
	
	var keyword = jQuery('#keyword').val();
	
	
	
	if(keyword != "")
		{
			jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#datafetch').html( data );
				}
			});
		}
	
}
	
$(document).ready(function () {
        $(".search-button").click(function () {
            // Get input field values:
           var keyword = jQuery('#keyword').val();

            // Simple validation at client's end
            // We simply change border color to red if empty field using .css()
            var proceed = true;
            // Everything looks good! Proceed...
            if (proceed) {
                /* Submit form via AJAX using jQuery. */
            }
        });

        // Reset previously set border colors and hide all message on .keyup()
        $(".search-button").keyup(function () {
            $(".search-button").css('border-color', '');
            $("#datafetch").slideUp();
        });
    });	
</script>

<?php
}
?>



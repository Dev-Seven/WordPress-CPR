<?php
/**
 * Template Name: Book chapters Template
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
<div class="books-listing bookc-list">
    <div class="container">
		<div class="row common">
		  <div class="col-md-8">
                        <div class="search-sec">
          <div class="search-box">
			 
            <div class="project-search-bar">
              <input class="form-control" type="text" id="keyword" placeholder="Search Book chapters" aria-label="search">
            </div>
            <button class="search-button" type="button" onclick="fetch()">Search<span>&gt;</span></button>
			
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
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                <a data-value="date" class="dropdown-item sorting" href="javascript:void(0)">Newest to Oldest</a>
                <a data-value="id" class="dropdown-item sorting" href="javascript:void(0)">Oldest to Newest</a>
                
                <form method="GET" class="sorting-form">
                  <input type="hidden" name="orderby" class="orderby">
                </form>

               </div>
            </div>
                    </div>
		 </div>
    <div class="hide-data mb-book" id="datafetch_bc">	
<?php
		 
		$custom_orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : "";
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          if(isset($_GET['orderby']) && $_GET['orderby'] != ""):
          
            if ( !empty( $custom_orderby ) && "id" == $custom_orderby ):
          $args = new WP_Query( array(
            'post_type' => 'bookchapters',
            'post_status' => 'publish',
            'posts_per_page' => 18,
           'meta_key' => 'published_date',
				'orderby' => "meta_value",
				  'meta_type' => 'DATE',
			   'order' => 'ASC',
			  //'posts_per_page' => $num,
    'paged' => $paged
          ) );
      endif;

      if ( !empty( $custom_orderby ) && "date" == $custom_orderby ):
        $args = new WP_Query( array(
          'post_type' => 'bookchapters',
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
          'post_type' => 'bookchapters',
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
     
$book_chapters_title = get_field( 'book_chapters_title' );
$author_name = get_field( 'author_name' );
$publisher_edit_text = get_field( 'publisher_edit_text' );
$book_image = get_field( 'book_image' );
			  	  $title  = get_the_title();       
	$published_date = get_field( 'published_date' );

      ?>
				
					 <div class="col-md-6 col-lg-6 col-xl-4">
				
				  <div class="item">
					<div class="item-img">
						<a href="<?php  echo get_permalink( $id ) ?> ">
                <?php if ($book_image != "") { ?>
                     <img src="<?php echo $book_image; ?>" alt=""> 
                <?php } else { ?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/no-image.png" />
                <?php } ?>
                </a>
            </div>
					<div class="item-content">
					  <div class="item-booktext">
						  	<a href="<?php  echo get_permalink( $id ) ?> ">
						  <h3><?php echo mb_strimwidth($title, 0, 40, "...");?></h3>
						   <p><?php echo mb_strimwidth($publisher_edit_text, 0, 40, "...");?></p>
						  </a>
						    <?php if ($published_date != "") {?>
						<div class="pub-date"><?php echo $published_date; ?></div>
						  <?php } ?>
					  </div>
						
					  <div class="publisher-name">
						   
						  <?php 
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
          if( $documents ): ?>
                    <?php ?>
                  <?php //echo "<br>"; ?>
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
						  echo mb_strimwidth($authorname, 0, 140, "...")
						  ?></span>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                       <span><?php //echo get_the_title ( $document->ID ).','; ?><?php $authorname = get_the_title ( $document->ID ); 
						  echo mb_strimwidth($authorname, 0, 140, "").',';
						  ?></span>
                      </a>
                  <?php   } ?>                                                  
         <?php ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
				<?php /*?><span class="sauthorname"><?php if ($author_name != "") {

	$name = mb_strimwidth($author_name, 0, 50, "..."); 
echo "".$name;
 } ?>					</span><?php */?>
						  
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
	window.addEventListener('keyup', function(event) {
  if (event.keyCode === 13) {
 jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_bc', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#datafetch_bc').html( data );
				}
			});
  }
});
</script>
<?php
function ajax_fetch_bc() {
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
				data: { action: 'data_fetch_bc', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#datafetch_bc').html( data );
				}
			});
		}
}
</script>

<?php
}
?>


<?php
/**
 * Template Name: News Listing Template
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
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
                                    <input class="form-control" type="text" id="keyword" placeholder="Search News" aria-label="search">

<!--
									<select class="form-control">
											<option>Default select</option><option>Default select</option>							
										<option>Default select</option></select>
-->

                    
                    

						
                                </div><button class="search-button" type="button" onclick="fetch()">Search<span>&gt;</span></button>
                            </div>
                        </div>
                    </div>
		<div class="col-md-4">
                        <div class="dropdown">
               <button id="btn_custom" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    
				   <?php 				   				  
				   ?>
               <?php 
        
             
               if(isset($_GET['orderby']) && $_GET['orderby'] != ""): 
                
               ?>
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
<!--
                    <div class="col-md-4">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort By<img src="img/down-arrow.png" alt="">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Oldest</a>
                            </div>
                        </div>
                    </div>
-->
		 </div>
     <div id="news_filter">
      <div class="row newslisting">
		   <?php 
       $custom_orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : "";
		  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       if(isset($_GET['orderby']) && $_GET['orderby'] != ""):
       
         if(!empty($custom_orderby) && "id" == $custom_orderby):
           $args = new WP_Query(array(
             'post_type'=>'post',
             'post_status' => 'publish',
             'posts_per_page'=>18,
       'meta_key' => 'published_date',
       'orderby' => "meta_value",
       'meta_type' => 'DATE',
             'order'=>'ASC',
			    'paged' => $paged
             ));  
            endif;

            if(!empty($custom_orderby) && "date" == $custom_orderby):
            
              $args = new WP_Query(array(
                'post_type'=>'post',
                'post_status' => 'publish',
                'posts_per_page'=>18,
                'meta_key' => 'published_date',
        'orderby' => "meta_value",
          'meta_type' => 'DATE',
                'order'=>'DESC',
				   'paged' => $paged
                ));
            endif;
       else:

         $args = new WP_Query(array(
             'post_type'=>'post',
                'post_status' => 'publish',
                'posts_per_page'=>18,
                'meta_key' => 'published_date',
        'orderby' => "meta_value",
          'meta_type' => 'DATE',
                'order'=>'DESC',
    'paged' => $paged
             ));
       endif;
      //  query_posts(array('post_type' => 'post','orderby' => 'date', 'posts_per_page' => -1)); 
              if($args->have_posts()) : 
                while($args->have_posts()) : $args->the_post();
              
		  $published_date = get_field( 'published_date' );
       $title = get_the_title();
 $content  = get_the_content();
		  ?>

		  <div class="col-md-6 col-lg-6 col-xl-4">
			
          <div class="items">
            <?php /*?> <a href="<?php echo get_permalink( $id ) ?>"><div class="item-img"><?php the_post_thumbnail(); ?></div>  </a><?php */?><?php //the_title(); ?> <?php /*?><p><?php echo mb_strimwidth($content, 0, 300, "..."); ?></p><?php */?>
            <div class="item-content">
              <div class="item-booktext">
                <h3> <a href="<?php echo get_permalink( $id ) ?>"><?php echo mb_strimwidth($title, 0, 70, "...");?>  </a></h3>
              </div>
				<div class="bottom-sec">
                <div class="author-name">
                     <h3>
                     <span><?php 
           $documents = get_posts(array(
                       'post_type' => 'people',
                       'meta_query' => array(
                        array(
                              'key' => 'news_detail',
                              'value' => '"' . get_the_ID() . '"',
                              'compare' => 'LIKE'
                                  )
                              )
                          ));
          ?>
             <?php if($documents) { ?>
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
						    echo mb_strimwidth($authorname, 0, 110, "...");
						  ?>
                      </a>
                   <?php  }else{?>
                      <a href="<?php echo get_permalink( $document->ID ); ?>">
                        <?php $authorname = get_the_title ( $document->ID ); 
						    echo mb_strimwidth($authorname, 0, 100, "").',';
						  ?>
                      </a>
                  <?php   } ?>                                                  
                  <?php endforeach; ?>
        <?php  } ?></span></h3></div>
                              <!--  <div class="news-date"></div>-->
								<?php //the_date('F j, Y') ?><?php //echo $published_date; ?>
                            </div>
<!--              <div class="publisher-name"></div>-->
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
       <?php else : ?>

          

       <?php endif; wp_reset_query(); ?>

		  
		  
      </div>		
		
         </div>
	   </div>
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
				data: { action: 'data_fetch_news', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#news_filter').html( data );
				}
			});
  }
});
</script>
<?php
function ajax_fetch_oc() {
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
				data: { action: 'data_fetch_news', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#news_filter').html( data );
				}
			});
		}
}
</script>

<?php
}
?>
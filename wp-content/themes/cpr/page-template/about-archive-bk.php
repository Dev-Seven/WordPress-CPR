<?php
/**
 * Template Name: About Archive Template
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


<div class="faculty-listing" id="archive-id">

  <div class="container"> 
  <div class="tabs_menu">
    <div class="tab-menu-sec">
            <ul class="nav nav-tabs" role="tablist">                
              <li class="nav-item"> <a id="peoplearchive" href="#peoplearchive-tab" class="nav-link active" data-toggle="tab" role="tab">People Archive</a> </li>
              <li class="nav-item"> <a id="pastproject" href="#pastproject-tab" class="nav-link" data-toggle="tab" role="tab">Past Projects</a> </li>
            </ul>
          </div>
          <div class="tab-content" role="tablist">
   
			    <div id="peoplearchive-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="peoplearchive-tab">
                <div class="faculty-listing">
                 <div class="row justify-content-center">     
                
                 <?php 
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;		 
                  $args = array(		
                      'post_type' => 'people',
                              'tax_query' => array(
                                  array(
                                      'taxonomy'  => 'people_category',
                                      'field'     => 'slug',
                                      'terms'     => 'faculty-archive',
                                      ), 
                                  ),
                              'post_status' => 'publish',
                      'orderby' => 'title',
                        'order' => 'ASC',
                          'posts_per_page' => 16,
					   'paged' => $paged,
                          //'paged'=>$paged
                      );
                      //query
                      $query1 = new WP_Query($args);?>
                      
                        <?php while ($query1->have_posts()): $query1->the_post();?>
                    
                    <div class="col-md-6 col-lg-4 col-xl-3">
                          <a href="<?php echo get_permalink( $id ) ?>">
                          <?php   $faculty_image = get_field( 'faculty_image' );
                      $faculty_designation = get_field( 'faculty_designation' );
                          ?>
                            <div class="item">
                              <div class="item-img">
                          <?php if ($faculty_image != "") { ?>
                                <img src="<?php echo $faculty_image; ?>" alt="">
                                <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/faculty-img.jpg" alt="" />
                                <?php } ?>
                          </div>
                              <h3><?php the_title(); ?></h3>
                              <p><?php echo $faculty_designation; ?></p>
                            </div>
                        </a>
                        </div> 
                      
                      <?php endwhile; ?>
					 
					 <div class="clear-fix"></div>
					  
					 
					 
					 <div class="pagination-list">	
                  <?php 
                  
                  $total = $query1->max_num_pages;
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
               </div>
					 
					 
					 
                  </div>      				 		
                </div>               
					    </div>

                       		
            <div id="pastproject-tab" class="card tab-pane fade past-project" role="tabpanel" aria-labelledby="pastproject-tab">
                    <div class="row justify-content-center">
                    <?php
                        $pro_author_name = get_field( 'author_name' );
                        $published_date = get_field( 'published_date' ); 
					?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array(
                    'post_type' => 'project',
                    'orderby' => "date",
                    'order' => 'DESC',
                    'paged' => $paged,
                    'posts_per_page'=> 16,                       
                    'meta_key'       => 'project_status',
                    'meta_compare'   => 'LIKE',
                    'meta_value'     => 'close'                      
                 
                  );
                  $query = new WP_Query($args);
//						  echo "<pre>";
//                             print_r($query);
//                             echo "</pre>";
                  ?>               	
                <?php if($query->have_posts()): 
                  ?>
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <div class="col-sm-12 col-md-6">
                <?php $protitle = get_the_title();?>
                    <div class="tab-news-sec">
                        <div class="tab-news-text">
                                <a href="<?php echo get_permalink(); ?>">
                            <h3><?php echo mb_strimwidth($protitle, 0, 40, "...");?></h3>
                                </a>	 
                        </div>
                        <div class="news-date">
                            <p><?php echo the_field("published_date"); ?></p>
                            <p class="pa-author-name"><?php
                          $documents = get_posts(array(
                              'post_type' => 'people',
                              'meta_query' => array(
                              array(
                                    'key' => 'project_detail',
                                    'value' => '"' . get_the_ID() . '"', 
                                    'compare' => 'LIKE'
                                      )
                                    )
                                ));
                              $authorname = get_the_title ( $document->ID ); 
								
                          ?>
                          <?php if( $documents ): ?>
                            <?php                   
                                $numItems = count($documents);
                                $i = 0;
                                ?>  
                                <?php foreach( $documents as $document ): ?>
                                    <?php if (get_the_title ( $document->ID ) != "") { ?>
                                    <?php
                                    if(++$i === $numItems) { ?>
                                    <?php $authorname_new = get_the_title ( $document->ID ); 
                                        echo mb_strimwidth($authorname_new, 0, 40, "");
                                        ?>             
                                <?php  }else{ ?>

                                    <?php $authorname_new = get_the_title ( $document->ID ); 
                                        echo mb_strimwidth($authorname_new, 0, 40, "").',';
                                        ?>                             
                                <?php }?>                   
                                                                
                                    <?php } ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
           <?php endwhile;?>
						  <div class="clear-fix"></div>
				<?php //echo do_shortcode('[cptapagination custom_post_type=project post_limit=5]'); ?>		
						
						   <div class="pagination-list">	
                  <?php 
                  
                  $total = $query->max_num_pages;
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
               </div>
		<?php /*?>				<div class="pagination-list">
           <?php if (function_exists("pagination")) {
                pagination($query->max_num_pages);
            } ?>   
							</div><?php */?>
           <?php endif;?>                   
				</div>	
          </div>									   
	</div>
</div>
</div>
</div>








 <!--<div class="wrap">
  <div id="primary" class="content-area">
    <div class="col-md-12 content">
      <div class = "inner-box content no-right-margin darkviolet">
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            // This is required for AJAX to work on our page
            var ajaxurl = '<?php //echo admin_url('admin-ajax.php'); ?>';
            function load_all_posts(page){
              var data = {
                page: page,
                action: "demo_pagination_posts"
              };
              // Send the data
              $.post(ajaxurl, data, function(response) {
                $(".pagination_container").html(response);
              });
            }
            load_all_posts(1); // Load page 1 as the default
            $(document).on('click','.pagination-link ul li',function(){
              var page = $(this).attr('p');
              load_all_posts(page);
            });
          }); 
        </script>
        <div class = "pag_loading">
          <div class = "pagination_container">
            <div class="post-content"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->
<?php get_footer();?>     

<script>
        if (window.location.href.indexOf("/archive/page") > -1) {
            $('#pastproject').addClass('active');
            $('#pastproject-tab').addClass('active show');

            $('#peoplearchive').removeClass('active');
            $('#peoplearchive-tab').removeClass('show active');
        }
    
    $(document).ready(function(){
        if (window.location.href.indexOf("/archive/page") > -1) {
            $('#pastproject').addClass('active');
            $('#pastproject-tab').addClass('active show');

            $('#peoplearchive').removeClass('active');
            $('#peoplearchive-tab').removeClass('show active');
            
        //   $('#pastproject').trigger('click');
        }
    });
</script>

<script>
(function( $ ) {
	
	$.fn.wpPagination = function( options ) {
		options = $.extend({
			links: "a",
			action: "pagination",
			ajaxURL: "http://" + location.host + "/wp-admin/admin-ajax.php",
			next: ".next"
		}, options);
		
		function WPPagination( element ) {
			this.$el = $( element );
			this.init();
		}
		
		WPPagination.prototype = {
			init: function() {
				this.createLoader();
				this.createEnd();
				this.handleNext();
				this.handleLinks();
			},
			createLoader: function() {
				var self = this;
				$('#pagination').prepend( "<span id='pagination-loader'>Loading...</span>" );
				$('#pagination-loader').hide();
			},
			createEnd: function() {
				var self = this;
				$('#pagination').prepend( "<span id='pagination-end'>End</span>" );
				$('#pagination-end').hide();
			},
			handleNext: function() {
				var self = this;
				var $next = $( options.next, self.$el );
			},
			handleLinks: function() {
				var self = this,
				$links = $( options.links, self.$el ),
				$pagination = $( "#pagination" );
				$loader = $( "#pagination-loader" );
				$end = $( "#pagination-end" );
				
				$links.click(function( e ) {
					e.preventDefault();

					$('#pagination .next').fadeOut();
					$loader.fadeIn();

					var $a = $( this ),
					url = $a.attr("href"),
					page = url.match( /\d+/ ),
					pageNumber = page[0],
					data = {
						action: options.action,
						page: pageNumber,
						posttype: $('#pagination-post-type').text()
					};
					
					$.get( options.ajaxURL, data, function( html ) {
						$pagination.before( "<div id='page-" + pageNumber + "'></div>" );
						$pagination.before( html );
						$a.attr("href", url.replace('/' + pageNumber + '/', '/' + ( parseInt(pageNumber) + 1 ) + '/'));
						
						if ( !html ) {
							$('#pagination .next').remove();
							$loader.fadeOut();
							$end.fadeIn();
						} else {
							$loader.fadeOut();
							$('#pagination .next').fadeIn();
							smoothScroll($('#page-' + pageNumber), 85);
						}
					});
				});
			}
		};
		
		return this.each(function() {
			var element = this;
			var pagination = new WPPagination( element );
		});
	};
	
	$(function() {
		if( $( "#pagination" ).length ) {
			$( "#pagination" ).wpPagination();
		}
	});
	
})( jQuery );
</script>


<?php
function ajax_fetch_farchive() {
  ?>
<script type="text/javascript">
function fetch(){
	
	var keyword = jQuery('#keyword').val();
	//console.log(keyword);
	var designation = jQuery('#designation').val();
	if(keyword != "")
		{
			jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_farchive', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#data_fetch_farchive').html( data );
				}
			});
		}
	
		if(designation != "")
		{
			jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_farchive_name', designation: jQuery('#designation').val() },
				success: function(data) {
					jQuery('#data_fetch_farchive').html( data );
				}
			});
		}
}
</script>
<?php
}
?>


	


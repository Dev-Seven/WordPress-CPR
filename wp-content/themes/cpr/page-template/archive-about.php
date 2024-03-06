<?php
/**
 * Template Name: Archive Main Template
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
	<style>
		.fade:not(.show) {opacity:1;}
		</style>

<div class="faculty-listing" id="archive-id">

  <div class="container"> 
	   <div class="tab-menu-sec">
	      <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item active"><a class="nav-link active" data-toggle="tab" id="peoplearchive" href="#peoplearchive-tab">People Archive</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" id="pastproject" href="#pastproject-tab">Past Projects</a></li>
    </ul>
	    </div>

          <div class="tab-content" id="tabs">
   
			    <div id="peoplearchive-tab" class="tab-pane fade in active">
                <div class="faculty-listing">
                 <div class="row justify-content-center">     
                
                 <?php
                  $paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
            $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;	 
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
					   'paged'=> $paged1,
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
                 <?php /*?> <?php 
                  
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
                        ?><?php */?>
							  
							  <?php 
                  $total = $query1->max_num_pages;
                  $pag_args1 = array(
                    'format'  => '?paged1=%#%',
                    'current' => $paged1,
                    'total'   => $total,
                    'prev_text' => '&laquo',
                    'next_text' => '&raquo;',
                    'add_args' => array( 'paged2' => $paged2 )
                );
                echo paginate_links( $pag_args1 );
                ?>
               </div>
					 
					 
					 
                  </div>      				 		
                </div>               
					    </div>

                       		
            <div id="pastproject-tab" class="tab-pane fade past-project">
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
                    'paged'=> $paged2,
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
                   $pag_args2 = array(
                    'format'  => '?paged2=%#%',
                    'current' => $paged2,
                    'total'   => $query->max_num_pages,
                    'prev_text' => '&laquo',
                    'next_text' => '&raquo;',
                    'add_args' => array( 'paged1' => $paged1 )
                );
                echo paginate_links( $pag_args2 );
                        ?>
                  <?php /*?><?php 
                  
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
                        ?><?php */?>
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





<script>
	jQuery(document).ready(function(){
	jQuery('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', jQuery(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		jQuery('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script>
<?php get_footer();?>     





	


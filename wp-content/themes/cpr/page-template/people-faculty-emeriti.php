<?php

/*
 * Template Name:  People Faculty Emeriti
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

<div class="faculty-listing">
  <div class="container">
    <div class="row">
   
		  <div class="col-md-12">
			  <div class="faculty-searchbar">
				  
						  
				  
				


					<label>Search People</label>
					 <input class="form-control" type="text" id="keyword" placeholder="Search Name" aria-label="search"><input class="form-control" type="text" id="designation"  placeholder="Search by Designation" aria-label="search"><button class="search-button" type="button" onClick="fetch()">Search<span>&gt;</span></button>


				 
				  </div>
		 </div>
		

      </div>
	  
	 
	</div>

	<div class="container"> 
<div class="hide-data" id="data_fetch_pfacultyemeriti">
  <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;		 
	    $args = array(		
		 'post_type' => 'people',
            'tax_query' => array(
                array(
                    'taxonomy'  => 'people_category',
                    'field'     => 'slug',
                    'terms'     => 'faculty-emeriti',
                    ), 
                ),
            'post_status' => 'publish',
		 'orderby' => 'title',
      'order' => 'ASC',
        'posts_per_page' =>16,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);?>
  
    
	 <div class="row">
       <?php while ($query->have_posts()): $query->the_post();?>
  
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
	<?php /*?><div class="pagi-prev-btn"><?php previous_posts_link( '&laquo;', $parent->max_num_pages) ?></div><?php */?>		
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
		<?php /*?><div class="pagi-next-btn"><?php next_posts_link( '&raquo;', $parent->max_num_pages) ?></div><?php */?>

<?php wp_reset_postdata(); ?>
 
</div>
</div>
		 
		 
		 
		 
        </div>

     
    </div>
  </div>
  <?php get_footer(); ?>
	<script>
window.addEventListener('keyup', function(event) {
  if (event.keyCode === 13) {
	  var keyword = jQuery('#keyword').val();
	//console.log(keyword);
if(keyword != "")
		{
			jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_pfacultyemeriti', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#data_fetch_pfacultyemeriti').html( data );
				}
			});
		}

  }
});
	
	window.addEventListener('keyup', function(event) {
  if (event.keyCode === 13) {
	  	var designation = jQuery('#designation').val();
jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
	  if(designation != ""){
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_pfacultyemeriti_name', designation: jQuery('#designation').val() },
				success: function(data) {
					jQuery('#data_fetch_pfacultyemeriti').html( data );
				}
			});
	  }
  }
});
</script>

<?php
function ajax_fetch_pfacultyemeriti() {
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
				data: { action: 'data_fetch_pfacultyemeriti', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#data_fetch_pfacultyemeriti').html( data );
				}
			});
		}
	if(designation != "")
		{
			jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_pfacultyemeriti_name', designation: jQuery('#designation').val() },
				success: function(data) {
					jQuery('#data_fetch_pfacultyemeriti').html( data );
				}
			});
		}
	
	

}
</script>
<?php
}
?>


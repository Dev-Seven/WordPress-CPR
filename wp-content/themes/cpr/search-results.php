<?php

/* Template Name: SearchWP Supplemental Search Results */

global $post;

// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';
?>

<?php
// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;

if ( class_exists( 'SWP_Query' ) ) {

	$engine = 'main_searchbar'; // taken from the SearchWP settings screen
$today = current_time('Ymd');
	$swp_query = new SWP_Query(
		 
		// see all args at https://searchwp.com/docs/swp_query/
		array(
			's' => $query,
			'engine' => $engine,
			'page'   => $swppg,		
			'fields' => 'all', 
	        //'meta_key' => 'published_date', 
			//'orderby' => "post_title",
			//'orderby' => "meta_value_num",
			//'orderby' => "meta_value",
			//'meta_type' => 'DATE',
			//'order' => 'DESC',
		'meta_key' => 'published_date','briefs_reports_published_date','opinion_published_date',
			//'meta_value' => 'meta_key',
            //'orderby' => 'date',
			//'meta_type' => 'DATE',
		 'orderby' => "meta_value",
          'meta_type' => 'DATE',
		    'order' => 'DESC',
           // 'meta_key'=>'custom_date',
			
//			'orderby'=>'meta_value', 
//'meta_key'=>'published_date',
//'order'=>'DESC', 
			
			'posts_per_page' => -1,
			
		)
		 
	
	);
	          
//	
//	print_r($search_cusQuery);
	// set up pagination
	$pagination = paginate_links( array(
		'format'  => '?swppg=%#%',
		'current' => $swppg,
		'total'   => $swp_query->max_num_pages,
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
		'type'     => 'list',
	) );
	
}


get_header(); 

global $wpdb;
$all_blog_posts1 = $wpdb->get_results($wpdb->prepare("
    
SELECT * FROM `wp_posts` WHERE `post_title` LIKE '%".$_GET['swpquery']."%'"));

$getId = [];
$getIdAll = [];
                                                                                                                                                                                                                                                                   
foreach($all_blog_posts1 as $key => $value)
{                                                                                                                                                                                                                                                                                                                                                                                                           
    $getId[] = $value->ID;
   
}

//$getMetaData = [];
//$ids = $wpdb->get_results($wpdb->prepare("SELECT GROUP_CONCAT(metakey_name) as id from wp_metakeys"));
//foreach($ids as $key => $value)
//{                                                                                                                                                                                                                                                                                                                                                                                                           
//    $getMetaData[] = $value->id;
//   
//}
//
// echo "<pre>";
//print_r($getMetaData);
//die;

$getIdAll[] = $wpdb->get_results($wpdb->prepare("  
SELECT * FROM `wp_postmeta` WHERE `meta_key` in ('opinions_detail', 'books_article_name', 'book_chapters_name', 'ja_detail', 'briefs_reports', 'working_papers_detail', 'news_detail') AND `meta_value` LIKE '%:\"$getId[0]\";%' "
)); ?>



<?php
//SELECT pm.meta_value FROM {$wpdb->postmeta} pm LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id WHERE pm.meta_key LIKE '%s' "
// SELECT * FROM `wp_postmeta` WHERE `meta_key` LIKE 'opinions_detail' AND `meta_value` LIKE '%:\"$getId[0]\";%' "
//$myvals = get_post_meta($post_id);
//
//print_r($myvals);
//exit;
//
//foreach($myvals as $key=>$val)
//{
//    echo $key . ' : ' . $val[0] . '<br/>';
//}
?>

<style>
	.item{width:100%!important;}
</style>
<section class="inner-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          </div>
          <?php /*?><h1>Search Results : <?php printf("<span>" . get_search_query() . "</span>"); ?></h1><?php */?> 
		
				<h1 class="page-title">
					<?php if ( ! empty( $query ) ) : ?>
						<?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), $query ); ?>
					<?php else : ?>
						Search
					<?php endif; ?>
				</h1>

				<!-- begin search form -->
				<div class="search-box">
					<form role="search" method="get" class="search-form" action="<?php echo esc_html( get_permalink() ); ?>">
						<label>
							<span class="screen-reader-text">Search for:</span>
<!--							<input type="search" class="search-field" placeholder="Search..." value="" name="swpquery" title="Search for:">-->
						</label>
					</form>
				</div>
				<!-- end search form -->

			
        </div>
      </div>
    </div>
  </section>
	<section id="primary" class="content-area search-result-cpr">
		<main id="main" class="site-main" role="main">
				
			<?php $post_types = get_post_types(); 
	$exclude_cpts = array(
    'oembed_cache',
	'user_request',
	'homebanner',
		
);
// Builtin types needed.
$builtin = array(
    //'post',
);
// All CPTs.
$cpts = get_post_types( array(
    'public'   => true,
    '_builtin' => false
) );
// remove Excluded CPTs from All CPTs.
foreach($exclude_cpts as $exclude_cpt)
    unset($cpts[$exclude_cpt]);
// Merge Builtin types and 'important' CPTs to resulting array to use as argument.
	$post_types = array_merge($builtin, $cpts);
	?>
			
	
			
	
 <div class="container">
    <div class="row">
  
		 <div class="col-md-12">	
	<div class="box">
    <div class="center">

        <div id="demo" class="box jplist">

            <!-- ios button: show/hide panel -->
            <div class="jplist-ios-button">
                <i class="fa fa-sort"></i>
<!--                jPList Actions-->
            </div>
 <div class="row">
  
		 <div class="col-md-3">
            <!-- panel -->
            <div class="jplist-panel box panel-top">

                <div class="jplist-group" data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="themes">
					
					
					
                    <ul>
						
					<li><input type="checkbox" data-path=".people" id="people" type="checkbox"><span>People</span></li>
						 <li><input type="checkbox" data-path=".opinions" id="opinions" type="checkbox"><span>Opinion & Commentary</span></li>
						 <li><input type="checkbox" data-path=".briefsreports" id="briefsreports" type="checkbox"><span>Policy Briefs & Reports</span></li>	
					<li><input type="checkbox" data-path=".journalarticles" id="journalarticles" type="checkbox"><span>Journal Articles</span></li>
						 <li><input type="checkbox" data-path=".workingpapers" id="workingpapers" type="checkbox"><span>Working Papers</span></li>
						 <li><input type="checkbox" data-path=".books" id="books" type="checkbox"><span>Books</span></li>	
						<li><input type="checkbox" data-path=".bookchapters" id="bookchapters" type="checkbox"><span>Books Chapters</span></li>
						 <li><input type="checkbox" data-path=".post" id="post" type="checkbox"><span>Policy Engagements & Blogs</span></li>
						 <li><input type="checkbox" data-path=".project" id="project" type="checkbox"><span>Project</span></li>
						<li><input type="checkbox" data-path=".events" id="events" type="checkbox"><span>Events</span></li>
						
						
						
						
						
<!--
   <li><input type="checkbox" data-control-type="button-filter" data-control-action="filter" data-control-name="jobs-btn"                                data-path=".jobs"><span>Work With Us</span></li>
   <li><input type="checkbox" data-control-type="button-filter" data-control-action="filter" data-control-name="research-btn"                                data-path=".research"><span>Research Initiatives</span></li>
-->
	

  
 

<!--   <li><input type="checkbox" data-control-type="button-filter" data-control-action="filter" data-control-name="researcharea-btn"                                data-path=".researcharea"><span>Research Areas</span></li>        -->
                    </ul>
                </div>
            </div>
			 </div>
             <?php 
              $args = get_posts(array(
				  'post_type' => array('people','opinions','briefsreports','journalarticles','workingpapers','books','bookchapters','post','events'),
				  'fields'  => 'ids', // Only get post IDs
				 //'meta_key' => 'published_date',
			//'orderby'=> 'title',
			//'meta_type' => 'DATE', 
				  //'order' => 'ASC',
				 'posts_per_page'  => -1
  			));         
	
            ?>

 <div class="col-md-9">
            <!-- data -->
	
	 
	 
            <div class="list box text-shadow">
				 <?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
				foreach ( $swp_query->posts as $post ) {
					//echo "<pre>"; print_r($post);
	  				$faculty_main_text = get_field( 'faculty_main_text' );?>
				  <div class="list-item box">

	  <div class="<?php echo get_post_type( $post_id );?> product-block item search-result">        
         <h3>
			 <?php 
				$abc = get_post_type( $post_id );
				if($abc == "opinions"){
					 $getLink = $wpdb->get_results($wpdb->prepare("SELECT meta_value FROM `wp_postmeta` WHERE `post_id` = $post_id and meta_key = 'opinion_link' "));
					 ?>
			 			<a href="<?php echo $getLink[0]->meta_value; ?>" class="opinionlink" target="_blank">	
			 	<?php
				 } else {
					 ?>
			 			<a href="<?php echo get_permalink(); ?>">							
			 	<?php
				 } ?>
							<?php the_title(); ?>
						</a>
			</h3>
			 
								
		  <div class="post-typebg"><?php echo get_post_type( $post_id );?></div> <?php// echo $published_date;?>
								<?php the_excerpt(); ?>
								
							<?php echo mb_strimwidth($faculty_main_text, 0, 250, "[…]"); ?>
		   </div>
					  
					  
					  
					 
      </div>
	  <?php }}?>
				
				
				
           <?php foreach($getIdAll[0] as $key => $test)
            {?>
            <?php 
				
				if(in_array($test->post_id,$args)) {?>
                 <div class="list-item box">
                <div class="<?php echo get_post_type( $test->post_id );?> product-block item search-result">    
                  
					
					 
			 <?php 
				$abc = get_post_type( $test->post_id );
			 	 if($abc == "opinions"){
					   $getLink = $wpdb->get_results($wpdb->prepare("SELECT meta_value FROM `wp_postmeta` WHERE `post_id` = '".$test->post_id."' and meta_key = 'opinion_link' "));
					 ?>
			 			  <h3>
                    <a href="<?php echo $getLink[0]->meta_value; ?>">
                        <?php echo get_the_title($test->post_id); ?>
                    </a></h3>
			 	<?php
				 } else {
					 ?>
			 			  <h3>
                    <a href="<?php echo get_permalink($test->post_id); ?>">
                        <?php echo get_the_title($test->post_id); ?>
                    </a></h3>
							
			 	<?php
				 } ?>
					
					
					
					
                    <div class="post-typebg"><?php echo get_post_type( $test->post_id );?></div><br>
					<?php echo get_the_excerpt($test->post_id); ?>
                </div>    
				</div>
            <?php } ?>
            <?php }
            ?>


            </div>

			 	 						
            <div class="box jplist-no-results text-shadow align-center">
                <p>No results found</p>
            </div>

            <!-- ios button: show/hide panel -->
            <div class="jplist-ios-button">
                <i class="fa fa-sort"></i>
<!--                jPList Actions-->
            </div>

            <!-- panel -->
            <div class="jplist-panel box panel-bottom">

                <!-- items per page dropdown -->
                <div
                        class="jplist-drop-down"
                        data-control-type="items-per-page-drop-down"
                        data-control-name="paging"
                        data-control-action="paging"
                        data-control-animate-to-top="true">

                    <ul>
                        <li><span data-number="3"> 3 per page </span></li>
                        <li><span data-number="5"> 5 per page </span></li>
                        <li><span data-number="10" data-default="true"> 10 per page </span></li>
                        <li><span data-number="all"> View All </span></li>
                    </ul>
                </div>

                <!-- sort dropdown -->
                

                <!-- pagination results -->
                <div
                        class="jplist-label"
                        data-type="{start} - {end} of {all}"
                        data-control-type="pagination-info"
                        data-control-name="paging"
                        data-control-action="paging">
                </div>

                <!-- pagination -->
                <div
                        class="jplist-pagination"
                        data-control-animate-to-top="true"
                        data-control-type="pagination"
                        data-control-name="paging"
                        data-control-action="paging">
                </div>

            </div>
</div>
        </div>
			</div>

    </div>
</div>
		
																								
	 </div>
	 
	  </div>
	 
	 </div>
		</main>
	
		
	</section>

<?php get_footer(); ?>	

 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- jPList core js and css  -->
    <link href="<?php echo get_template_directory_uri(); ?>/js/isotope/css/jplist.core.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope/js/jplist.core.min.js"></script>

    <!-- jPList sort bundle -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope/js/jplist.sort-bundle.min.js"></script>

    <!-- jPList textbox filter control -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope/js/jplist.textbox-filter.min.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/js/isotope/css/jplist.textbox-filter.min.css" rel="stylesheet" type="text/css" />

    <!-- jPList pagination bundle -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope/js/jplist.pagination-bundle.min.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/js/isotope/css/jplist.pagination-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- jPList history bundle -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope/js/jplist.history-bundle.min.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/js/isotope/css/jplist.history-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- jPList toggle bundle -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope/js/jplist.filter-toggle-bundle.min.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/js/isotope/css/jplist.filter-toggle-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- jPList start -->
    <script>
        jQuery('document').ready(function(){

            jQuery('#demo').jplist({
                itemsBox: '.list',
                itemPath: '.list-item',
                panelPath: '.jplist-panel'
                //,debug: true
            });
        });

    </script>

<!--
<ul id="filters">
    <li>
        <input type="checkbox" value="categorya" id="filter-categorya" />
        <label for="filter-categorya">Category A</label>
    </li>
    <li>
        <input type="checkbox" value="categoryb" id="filter-categoryb" />
        <label for="filter-categoryb">Category B</label>
    </li>
</ul>
<div class="test">
<div class="categorya categoryb">A, B</div>
<div class="categorya">A</div>
<div class="categorya">A</div>
<div class="categorya">A</div>
<div class="categoryb">B</div>
<div class="categoryb">B</div>
<div class="categoryb">B</div>
	</div>
-->
<!--
<script>
jQuery("#filters :checkbox").click(function() {
       jQuery(".list .list-item").hide();
       jQuery("#filters :checkbox:checked").each(function() {
           jQuery("." + $(this).val()).show();
       });
    });

</script>
-->
<style>
	.jplist-drop-down, .jplist-label{visibility: hidden;}
	.jplist-panel .jplist-pagination button:focus{outline: none;}
	.jplist-panel .jplist-pagination button:hover { color: #f8cd47;}
</style>

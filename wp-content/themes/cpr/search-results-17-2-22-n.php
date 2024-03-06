<?php

/* Template Name: SearchWP Supplemental Search Results */

global $post;

// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';

// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;

if ( class_exists( 'SWP_Query' ) ) {

	$engine = 'main_searchbar'; // taken from the SearchWP settings screen

	$swp_query = new SWP_Query(
		// see all args at https://searchwp.com/docs/swp_query/
		array(
			's'      => $query,
			'engine' => $engine,
			'page'   => $swppg,	
			'meta_key' => 'published_date','briefs_reports_published_date','opinion_published_date',
			'orderby' => "meta_value",
			'meta_type' => 'DATE',
			'order' => 'DESC',
			'posts_per_page' => -1,
	
		)
	);
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

get_header(); ?>
<style>
	.item{width:100%!important;}
</style>
<section class="inner-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php
// if ( function_exists( 'bcn_display' ) ) {
// bcn_display();
//  }
?>
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
	'homevideo'
);
// Builtin types needed.
$builtin = array(
    'post',
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


        <div class="col-md-3">
		  
		 <?php /*?> <div id="stuff-filters" class="stuff-filters">    	  
	  <?php 
	  foreach($post_types as $key) {?>
	  <label><input type="checkbox" value="<?php echo $key;?>" class="filter-item" /><span class="posttypetext"><?php echo $key;?></span></label>
	  <?php } ?>
  </div><?php */?>

  <div id="stuff-filters" class="stuff-filters">    	  
	
	  <label><input type="checkbox" value="post" class="filter-item" /><span class="posttypetext">Policy Engagements & Blogs</span></label>
	  <label><input type="checkbox" value="events" class="filter-item" /><span class="posttypetext">Events</span></label>
	  <label><input type="checkbox" value="jobs" class="filter-item" /><span class="posttypetext">Work With Us</span></label>
	  <label><input type="checkbox" value="research" class="filter-item" /><span class="posttypetext">Research Initiatives</span></label>
	  <label><input type="checkbox" value="people" class="filter-item" /><span class="posttypetext">People</span></label>
	  <label><input type="checkbox" value="books" class="filter-item" /><span class="posttypetext">Books</span></label>
	  <label><input type="checkbox" value="bookchapters" class="filter-item" /><span class="posttypetext">Books Chapters</span></label>
	  <label><input type="checkbox" value="opinions" class="filter-item" /><span class="posttypetext">Opinion & Commentary</span></label>
	  <label><input type="checkbox" value="journalarticles" class="filter-item" /><span class="posttypetext">Journal Articles</span></label>
	  <label><input type="checkbox" value="briefsreports" class="filter-item" /><span class="posttypetext">Policy Briefs & Reports</span></label>
	  <label><input type="checkbox" value="workingpapers" class="filter-item" /><span class="posttypetext">Working Papers</span></label>
	  <label><input type="checkbox" value="project" class="filter-item" /><span class="posttypetext">Project</span></label>
	  <label><input type="checkbox" value="researcharea" class="filter-item" /><span class="posttypetext">Research Areas</span></label>
	  
  </div>
	 </div>		
		
	  <div class="col-md-9">	
  <div id="products">
	  <?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
				foreach ( $swp_query->posts as $post ) {
	$test = get_post_type( $post_id );
	  ?>
	  <div class="<?php echo $test;?> product-block item">        
         <div class="search-result">
							<h3>
								<a href="<?php echo get_permalink(); ?>">
									<?php the_title(); ?>
								</a>
								</h3>
							<div class="post-typebg"><?php echo get_post_type( $post_id );?></div> <?php echo $published_date;?>
								<?php the_excerpt(); ?>
								
							<?php echo mb_strimwidth($faculty_main_text, 0, 250, "[…]"); ?>
						</div>	 		
      </div>
	  <?php } }wp_reset_postdata();
?>
	  <div id="pagination" class="pagination"></div>
  </div> 
	 </div>			
		 </div>		
	  </div>		
	
		</main>
	
		
	</section>

		

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'></script>
<!--<script src="https://cdn.shopify.com/s/files/1/0771/2161/t/3/assets/jPages.min.js?10688064064350896456"></script>-->
<script>
    
	
	jQuery(document).ready(function(){
            
        var itemSelector = ".item"; 
        var $checkboxes = $('.filter-item');
        var $container = $('#products').isotope({ itemSelector: itemSelector });
    
        //Ascending order
        var responsiveIsotope = [ [480, 4] , [720, 6] ];
        var itemsPerPageDefault = 10;
        var itemsPerPage = defineItemsPerPage();
        var currentNumberPages = 1;
        var currentPage = 3;
        var currentFilter = '*';
        var filterAttribute = 'data-filter';
        var filterValue = "";
        var pageAttribute = 'data-page';
        var pagerClass = 'isotope-pager';
    
        // update items based on current filters    
        function changeFilter(selector) { $container.isotope({ filter: selector }); }
    
        //grab all checked filters and goto page on fresh isotope output
        function goToPage(n) {
            currentPage = n;
            var selector = itemSelector;
            var exclusives = [];
                // for each box checked, add its value and push to array
                $checkboxes.each(function (i, elem) {
                    if (elem.checked) {
                        selector += ( currentFilter != '*' ) ? '.'+elem.value : '';
                        exclusives.push(selector);
                    }
                });
                // smash all values back together for 'and' filtering
                filterValue = exclusives.length ? exclusives.join('') : '*';
                
                // add page number to the string of filters
                var wordPage = currentPage.toString();
                filterValue += ('.'+wordPage);
           
            changeFilter(filterValue);
        }
    
        // determine page breaks based on window width and preset values
        function defineItemsPerPage() {
            var pages = itemsPerPageDefault;
    
            for( var i = 0; i < responsiveIsotope.length; i++ ) {
                if( $(window).width() <= responsiveIsotope[i][0] ) {
                    pages = responsiveIsotope[i][1];
                    break;
                }
            }
            return pages;
        }
        
        function setPagination() {
    
            var SettingsPagesOnItems = function(){
                var itemsLength = $container.children(itemSelector).length;
                var pages = Math.ceil(itemsLength / itemsPerPage);
                var item = 1;
                var page = 1;
				var midRange = 7;
                var selector = itemSelector;
                var exclusives = [];
                    // for each box checked, add its value and push to array
                    $checkboxes.each(function (i, elem) {
                        if (elem.checked) {
                            selector += ( currentFilter != '*' ) ? '.'+elem.value : '';
                            exclusives.push(selector);
                        }
                    });
                    // smash all values back together for 'and' filtering
                    filterValue = exclusives.length ? exclusives.join('') : '*';
                    // find each child element with current filter values
                    $container.children(filterValue).each(function(){
                        // increment page if a new one is needed
                        if( item > itemsPerPage ) {
                            page++;
                            item = 1;
                        }
                        // add page number to element as a class
                        wordPage = page.toString();
                        
                        var classes = $(this).attr('class').split(' ');
                        var lastClass = classes[classes.length-1];
                        // last class shorter than 4 will be a page number, if so, grab and replace
                        if(lastClass.length < 4){
                            $(this).removeClass();
                            classes.pop();
                            classes.push(wordPage);
                            classes = classes.join(' ');
                            $(this).addClass(classes);
                        } else {
                            // if there was no page number, add it
                           $(this).addClass(wordPage); 
                        }
                        item++;
                    });
                currentNumberPages = page;
            }();
    
            // create page number navigation
            var CreatePagers = function() {
    
                var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);
    
                $isotopePager.html('');
                if(currentNumberPages > 1){
                  for( var i = 0; i < currentNumberPages; i++ ) {
                      var $pager = $('<a href="javascript:void(0);" class="pager" '+pageAttribute+'="'+(i+1)+'"></a>');
                          $pager.html(i+1);

                          $pager.click(function(){
                              var page = $(this).eq(0).attr(pageAttribute);
                              goToPage(page);
                          });
                      $pager.appendTo($isotopePager);
                  }
                }
                $container.after($isotopePager);
            }();
        }
        // remove checks from all boxes and refilter
        function clearAll(){
            $checkboxes.each(function (i, elem) {
                if (elem.checked) {
                    elem.checked = null;
                }
            });
           currentFilter = '*';
           setPagination();
           goToPage(1);
        }
    
        setPagination();
        goToPage(1);
    
        //event handlers
        $checkboxes.change(function(){
            var filter = $(this).attr(filterAttribute);
            currentFilter = filter;
            setPagination();
            goToPage(1);
        });
        
        $('#clear-filters').click(function(){clearAll()});
    
        $(window).resize(function(){
            itemsPerPage = defineItemsPerPage();
            setPagination();
            goToPage(1);
        });         
  
	});
	
	
</script>


			
 
<?php get_footer();
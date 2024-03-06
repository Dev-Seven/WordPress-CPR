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
	'homebanner'
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
<!--
      <div class="col-md-3">
<form id="options">
	<fieldset data-group="category">
		<legend>Category</legend>
		<?php foreach($post_types as $key) {?>
		<div class="d-block"> <label><input type="checkbox" name="category" class="filter-item" value=".<?php echo $key;?>"><span><?php echo $key;?></span> </label></div>
		<?php } ?>
	</fieldset>
	
</form>
	</div>
-->
		  
		
	<div id="wrapper">
  <!-- Checkboxes: targeted in the JS by class and value set to the class on item you want to filter for -->
  <div id="stuff-filters">    	  
	   <span id="clear-filters"><span class="fas fa-times-circle"></span>&nbsp;Reset</span>
	  <?php 
	  foreach($post_types as $key) {?>
	  <label><input type="checkbox" value="<?php echo $key;?>" class="filter-item" /><?php echo $key;?></label>
	  <?php } ?>
  </div>
			
		
		
  <div id="products">
	  <?php foreach ( $swp_query->posts as $post ) {
	  
	  $faculty_main_text = get_field( 'faculty_main_text' );?>
	  <div class="<?php echo get_post_type( $post_id );?> product-block item" >        
          <p><?php the_title(); ?></p> 
		 
		
      </div>
	  <?php } wp_reset_postdata();
?>
  </div> 
</div>
		
																								
	
		</main><!-- .site-main -->
	
		
	</section>

		
<!--
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'></script>
<script>
    
        var itemSelector = ".item"; 
        var $checkboxes = $('.filter-item');
        var $container = $('#products').isotope({ itemSelector: itemSelector });
    
        //Ascending order
        var responsiveIsotope = [ [1080, 4] , [4500, 6] ];
        var itemsPerPageDefault = 5;
        var itemsPerPage = defineItemsPerPage();
        var currentNumberPages = 1; 
        var currentPage = 1;
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
                        
                        var classes = $(this).attr('class').split('');
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
  
  
</script>
-->

			
			
			<div class="box">
    <div class="center">
        <!--<><><><><><><><><><><><><><><><><><><><><><><><><><> DEMO START <><><><><><><><><><><><><><><><><><><><><><><><><><>-->

        <!-- demo -->
        <div id="demo" class="box jplist" style="margin: 20px 0 50px 0">

            <!-- ios button: show/hide panel -->
            <div class="jplist-ios-button">
                <i class="fa fa-sort"></i>
                jPList Actions
            </div>

            <!-- panel -->
            <div class="jplist-panel box panel-top">

                <!-- back button button -->
              

                <!-- filter by title -->
               

                <!-- filter by description -->
              

                <div class="jplist-group">
                    <ul>
						 <?php 
	  foreach($post_types as $key) {?>
	

                        <li>
						<span
                                data-control-type="button-filter"
                                data-control-action="filter"
                                data-control-name="<?php echo $key;?>-btn"
                                data-path="<?php echo $key;?>"
                                data-selected="true">
								<i class="fa fa-caret-right"></i>
								<?php echo $key;?>
						</span>
 </li>	  <?php } ?>
                       
                    </ul>
                </div>

                <!-- pagination results -->
               
                <!-- pagination control -->
              
            </div>

            <!-- data -->
            <div class="list box text-shadow">
 <?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
				foreach ( $swp_query->posts as $post ) {
	  
	  $faculty_main_text = get_field( 'faculty_main_text' );?>
				  <div class="list-item box">

	  <div class="<?php echo get_post_type( $post_id );?> product-block item" >        
          <p><?php the_title(); ?></p> 
		   </div>
		
      </div>
	  <?php }}?>
                <!-- item 1 -->
              
              

                <!-- item 2 -->
                

                <!-- item 3 -->
                

                <!-- item 4 -->
                

                <!-- item 5 -->
                

                <!-- item 6 -->
                

                <!-- item 7 -->
                

                <!-- item 8 -->
                

                <!-- item 9 -->
                

                <!-- item 10 -->
                

                <!-- item 11 -->
                

                <!-- item 12 -->
                

                <!-- item 13 -->
                

                <!-- item 14 -->
                

                <!-- item 15 -->
                

                <!-- item 16 -->
                

            </div>


            <div class="box jplist-no-results text-shadow align-center">
                <p>No results found</p>
            </div>

            <!-- ios button: show/hide panel -->
            <div class="jplist-ios-button">
                <i class="fa fa-sort"></i>
                jPList Actions
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
        <!-- end of demo -->
        <!--<><><><><><><><><><><><><><><><><><><><><><><><><><> DEMO END <><><><><><><><><><><><><><><><><><><><><><><><><><>-->
    </div>
</div>
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
<?php //get_footer();
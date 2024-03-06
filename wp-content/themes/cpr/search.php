<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cpr
 */
get_header(); ?>
<section class="inner-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          </div>
          <h1>Search Results : <?php printf("<span>" . get_search_query() . "</span>"); ?></h1> 
        </div>
      </div>
    </div>
  </section>

<?php 

$query = get_search_query();
global $wpdb;
$all_blog_posts1 = $wpdb->get_results($wpdb->prepare("
    
SELECT * FROM `wp_posts` WHERE `post_title` LIKE '%".$_GET['s']."%'"));

$getId = [];
$getIdAll = [];
foreach($all_blog_posts1 as $key => $value)
{

    $getId[] = $value->ID;
   
}
$getIdAll[] = $wpdb->get_results($wpdb->prepare("       
  
SELECT * FROM `wp_postmeta` WHERE `meta_key` LIKE 'opinions_detail' AND `meta_value` LIKE '%:\"$getId[0]\";%' "));

$postIdAll = [];
foreach($getIdAll[0] as $key => $test)
{?>
<?php if(isset($test->post_id)) {?>
    <h1><?php echo get_the_title($test->post_id);?></h1></br>

<?php }?>
<?php }

echo "<pre>";
print_r($getIdAll[0]);
echo "</pre>";



?>
<div class="innerpage-content search-result-p">
<?php /*?><form role="search" method="get" class="search-form form-inline" action="<?php echo home_url('/'); ?>">
  <div class="input-group">
    <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" placeholder="Search <?php bloginfo('name'); ?>">
    <label class="hide">Search for:</label>
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default">Search</button>
    </span>
  </div>
 </form><?php */?>
  <?php /*?><div class="input-group">
    <label for="post_type-filter">Select post type:</label>
      <?php //all_post_types(); ?>

      <?php $post_types = get_post_types(); 
	$exclude_cpts = array(
    'oembed_cache',
	'user_request',
	'homebanner',
  'homevideo'
);
// Builtin types needed.
$builtin = array(
    'post'
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
	$post_types = array_unique(array_merge($builtin, $cpts), SORT_REGULAR); 

  
	?>
	<?php foreach($post_types as $key) {?>
		<input type="checkbox" name="category" class="category12" value=".<?php echo $key;?>"><?php echo $key;?> <span class="count"></span><br>
		<?php } ?>

  </div><?php */?>

<?php /*?><div class="container">
    <div class="row">
      <div class="col-md-12">
		<?php if (have_posts()): ?>

			<?php /*?><div class="page-header">
				<h1 class="page-title">
				Search Result for:
					<?php printf("<span>" . get_search_query() . "</span>"); ?>
				</h1>
			</div><?php */?>

			<?php /*?><?php while (have_posts()):
       the_post(); ?>
				<div id="post-<?php the_ID(); ?>" class="srp-head-main">
	<div class="entry-header">
		<?php
  if (is_singular()):
      the_title('<h1 class="entry-title">', "</h1>");?>
		<?php
  else:{?>
     <h2 class="entry-title"><a href="<?php echo get_the_permalink($post_id); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="post-typebg"><?php echo get_post_type( $post_id );?></div>
					<?php echo $published_date;?>
								<?php the_excerpt(); ?>
		<?php
	   }endif;
?> 
	</div>
					
			
			 </div>						
<?php endwhile; ?>
	
		<?php endif; ?></div>
		
	
      </div>
    </div>
				<?php */?>
		
  
	
	 </div>


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
	 <?php if (have_posts()): ?>

			<?php /*?><div class="page-header">
				<h1 class="page-title">
				Search Result for:
					<?php printf("<span>" . get_search_query() . "</span>"); ?>
				</h1>
			</div><?php */?>

			<?php while (have_posts()):
       the_post(); ?>
				<div id="post-<?php the_ID(); ?>" class="srp-head-main <?php echo get_post_type( $post_id );?>">
	<div class="entry-header">
		<?php
  if (is_singular()):
      the_title('<h1 class="entry-title">', "</h1>");?>
		<?php
  else:{?>
     <h2 class="entry-title"><a href="<?php echo get_the_permalink($post_id); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="post-typebg"><?php echo get_post_type( $post_id );?></div>
					<?php echo $published_date;?>
								<?php the_excerpt(); ?>
		<?php
	   }endif;
?> 
	</div>
					
			
			 </div>						
<?php endwhile; ?>
	
		<?php endif; ?>
  </div> 
</div>
		
																								
	
		</main><!-- .site-main -->
	
		
	</section>

  


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'></script>
<script>
    jQuery(document).ready(function(){
          
        var itemSelector = ".item"; 
        var $checkboxes = $('.filter-item');
        var $container = $('#products').isotope({ itemSelector: itemSelector });
    
        //Ascending order
        var responsiveIsotope = [ [480, 4] , [720, 6] ];
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


<?php //get_sidebar();
//get_footer();

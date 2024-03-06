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
			'posts_per_page' => 10,
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
      <div class="col-md-3">
<form id="options">
	<fieldset data-group="category">
		<legend>Category</legend>
		<?php foreach($post_types as $key) {?>
		<input type="checkbox" name="category" class="category12" value=".<?php echo $key;?>"><?php echo $key;?><span class="count"></span><br>
		<?php } ?>
	</fieldset>
	
</form>
		  
		  </div>
		  
      <div class="col-md-9">
		
		<?php /*?>	<div id="container">
					<?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
				foreach ( $swp_query->posts as $post ) {
				?>
					<div class="item <?php echo get_post_type( $post_id );?>">
					<?php the_title(); ?>
				</div>
				
				
					<?php } }?>
					<?php ?><?php */?>			
  
 <div id="container">
   

			<?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
				foreach ( $swp_query->posts as $post ) {
					
					?>
					
					<?php $faculty_main_text = get_field( 'faculty_main_text' );
		  $published_date = get_field( 'published_date' ); ?>
		  <div id="containers">
		  		<div class="item <?php echo get_post_type( $post_id );?>">
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
		  </div>
					<?php
				}
				
			wp_reset_postdata();

				// pagination
				if ( $swp_query->max_num_pages > 1 ) { ?>
					<div class="navigation pagination" role="navigation">
						<h2 class="screen-reader-text">Posts navigation</h2>
						<div class="nav-links">
							<?php echo wp_kses_post( $pagination ); ?>
						</div>
					</div>
				<?php }
			} else {
				?>
		  <p>No results found.</p>
		  <?php
			} ?>
</div>
		</div>
	</div>
			
			</div>
		</main><!-- .site-main -->
	
		
	</section><!-- .content-area -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://isotope.metafizzy.co/isotope.pkgd.js'></script>
<script>

jQuery(document).ready(function(){
		jQuery('#container').isotope({
		  // options
		  itemSelector: '.item',
		  layoutMode: 'fitRows'
		});

		updateCount();
	});
	var filters = {};
	// do stuff when checkbox change
	$('#options').on( 'change', function( jQEvent ) {
		var $checkbox = $( jQEvent.target );
		manageCheckbox( $checkbox );

		var comboFilter = getComboFilter( filters );

		$('#container').isotope({ filter: comboFilter });

		$('#container').isotope( 'on', 'layoutComplete', function( isoInstance, laidOutItems ) {
			updateCount();
		} );

	});

	$.expr[':'].hasClassStartingWith = function(el, i, selector) {
		var re = new RegExp("\\b" + selector[3]);
		return re.test(el.className);
	}

	function updateCount() {
		var numItems = 0;
		$('.count').each(function( index ) {
			if ( $(this).prev('input').hasClass('all') ) {
				numItems = $('.item').length;
				$(this).html(numItems);
			} else {
				itemClass = $(this).prev('input').val().substring(1);
				var itemSelector = "#container div:hasClassStartingWith('" + itemClass + "')";
				numItems = $(itemSelector).not(":hidden").length;
				$(this).html(numItems);
			}
		});
		
	}

	function getComboFilter( filters ) {
		var i = 0;
		var comboFilters = [];
		var message = [];
		
		for ( var prop in filters ) {
			message.push( filters[ prop ].join(' ') );
			var filterGroup = filters[ prop ];
			// skip to next filter group if it doesn't have any values
			if ( !filterGroup.length ) {
		  		continue;
			}
			if ( i === 0 ) {
		  		// copy to new array
		  		comboFilters = filterGroup.slice(0);
			} else {
		  		var filterSelectors = [];
		 		// copy to fresh array
		  		var groupCombo = comboFilters.slice(0); // [ A, B ]
		  		// merge filter Groups
		  		for (var k=0, len3 = filterGroup.length; k < len3; k++) {
		    		for (var j=0, len2 = groupCombo.length; j < len2; j++) {
		      			filterSelectors.push( groupCombo[j] + filterGroup[k] ); // [ 1, 2 ]
		    		}

		  		}
		  		// apply filter selectors to combo filters for next group
		  		comboFilters = filterSelectors;
			}
			i++;
		}

		var comboFilter = comboFilters.join(', ');
		return comboFilter;
	}

	function manageCheckbox( $checkbox ) {
	  var checkbox = $checkbox[0];

	  var group = $checkbox.parents('fieldset').attr('data-group');
	  // create array for filter group, if not there yet
	  var filterGroup = filters[ group ];
	  if ( !filterGroup ) {
	    filterGroup = filters[ group ] = [];
	  }

	  var isAll = $checkbox.hasClass('all');
	  // reset filter group if the all box was checked
	  if ( isAll ) {
	    delete filters[ group ];
	    if ( !checkbox.checked ) {
	      checkbox.checked = 'checked';
	    }
	  }
	  // index of
	  var index = $.inArray( checkbox.value, filterGroup );

	  if ( checkbox.checked ) {
	    var selector = isAll ? 'input' : 'input.all';
	    $checkbox.siblings( selector ).removeAttr('checked');

	    if ( !isAll && index === -1 ) {
	      // add filter to group
	      filters[ group ].push( checkbox.value );
	    }

	  } else if ( !isAll ) {
	    // remove filter from group
	    filters[ group ].splice( index, 1 );
	    // if unchecked the last box, check the all
	    if ( !$checkbox.siblings('[checked]').length ) {
	      $checkbox.siblings('input.all').attr('checked', 'checked');
	    }
	  }

	}

</script>

<?php get_footer();
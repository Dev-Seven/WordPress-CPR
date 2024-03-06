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
<div class="innerpage-content search-result-p">
<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url('/'); ?>">
  <div class="input-group">
    <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" placeholder="Search <?php bloginfo('name'); ?>">
    <label class="hide">Search for:</label>
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default">Search</button>
    </span>
  </div>
 
  <div class="input-group">
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

  </div>
</form>
<div class="container">
    <div class="row">
      <div class="col-md-12">
		<?php if (have_posts()): ?>

			<?php /*?><div class="page-header">
				<h1 class="page-title">
				Search Result for:
					<?php printf("<span>" . get_search_query() . "</span>"); ?>
				</h1>
			</div><?php */?>

			<?php while (have_posts()):
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
					
			<div class="">
		
	<?php

$content = get_the_content();
// $content = preg_replace("/<img[^>]+\>/i", " ", $content);    
$content = preg_replace('/*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);      
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
//  $content = get_the_content();
 echo mb_strimwidth($content, 0, 200, "...");

 ?>

		  
</div>
			 </div>						
<?php endwhile; ?>
	
		<?php endif; ?>
				
		
  </div>
		
	
      </div>
    </div>
	<div class="container">
    <div class="row">
      <div class="col-md-12">
  <div class="search-r pagination-list">
    <?php echo njengah_number_pagination(); ?> 
  </div>  
     </div>
    </div>
	 </div>
	 </div>

<div class="innerpage-content search-result-p">
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
	

<form id="options">
	<fieldset data-group="category">
		<legend>Category</legend>
		<?php foreach($post_types as $key) {?>
		<input type="checkbox" name="category" class="category12" value=".<?php echo $key;?>"><?php echo $key;?> <span class="count"></span><br>
		<?php } ?>
	</fieldset>
</form>


<div class="container" id="container">
    <div class="row">
      <div class="col-md-12">
		
		 <?php foreach($post_types as $key) {	

// echo "<pre>";
// print_r($key);
// echo "</pre>";
// exit;

	if($key == 'post'){?>
		<div class="item post">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
			
		</div>			
	<?php } elseif($key == 'events'){?>
	<div class="item events">
				<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>
		<?php } elseif($key == 'people'){?>
	<div class="item people">
	<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
	</div>
	<?php }elseif($key == 'bookchapters'){?>
		<div class="item bookchapters">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>	
	<?php }elseif($key == 'books'){?>
		<div class="item books">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php }elseif($key == 'research'){?>
		<div class="item research">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php }elseif($key == 'opinions'){?>
		<div class="item opinions">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php }elseif($key == 'journalarticles'){?>
		<div class="item journalarticles">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php } 
		//   wp_reset_postdata();
		  ?>
	
	<?php if($key == 'briefsreports'){?>
		<div class="item briefsreports">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php } elseif($key == 'workingpapers'){?>
		<div class="item workingpapers">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php }elseif($key == 'project'){?>
		<div class="item project">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php }elseif($key == 'researcharea'){?>
		<div class="item researcharea">
			<?php the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
			?>
		</div>		
	<?php } 
		   wp_reset_postdata();
		  ?>
	
<?php }?>	
		  	  
		  
		  
		  
		<!-- <?php // if (have_posts()): ?>

			<?php// while (have_posts()):
      // the_post(); ?>
				<div id="post-<?php //the_ID(); ?>" class="srp-head-main">
	<div class="entry-header">
		<?php /*?><?php
  if (is_singular()):
      the_title('<h1 class="entry-title">', "</h1>");
	
		
 else:
      the_title(
          '<h2 class="entry-title"><a href="' .
              esc_url(get_permalink()) .
              '" rel="bookmark">',
          "</a></h2>"
      );
		endif;?><?php */?>
	
	</div>
					
			
			 </div>						
<?php //endwhile; ?>
	
		<?php// endif; ?> -->
  </div>
		
	
      </div>
    </div>
	<div class="container">
    <div class="row">
      <div class="col-md-12">
  <div class="search-r pagination-list">
	 
    <?php //echo njengah_number_pagination(); ?> 
  </div>  
     </div>
    </div>
	 </div>
	 </div>


<?php /*?><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><?php */?>

<?php //get_sidebar();
get_footer();

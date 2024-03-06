<?php
/**
 * Template Name: Facylty individual Template
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

get_header(); ?>
<!--<div class="top_margin"></div>-->
<?php
     
$sub_value = get_field( 'faculty_image' );
$sub_value1 = get_field( 'faculty_main_text' );
$sub_value2 = get_field( 'faculty_designation' );
$sub_value3 = get_field( 'faculty_email_url' );
$sub_value4 = get_field( 'faculty_email_text' );
$sub_value5 = get_field( 'faculty_linked_image' );
$sub_value6 = get_field( 'faculty_linked_url' );

$tabtitle1 = get_field( 'opinions_title' );
$tabtitle2 = get_field( 'journal_articles_title' );
$tabtitle3 = get_field( 'book_chapters_title' );
$tabtitle4 = get_field( 'briefs_reports_title' );
$tabtitle5 = get_field( 'working_papers_title' );
$tabtitle6 = get_field( 'news_title' );

$book_chapters_title = get_field( 'book_chapters_title' );
$publisher_name = get_field( 'publisher_name' );
$publisher_edit_text = get_field( 'publisher_edit_text' );
$category_box = get_field( 'category_box' );

      ?>
			<main>
		<section class="inner-banner">
  <div class="container">
		<div class="row">
  
  <div class="col-md-12">
	  <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
					    <?php if(function_exists('bcn_display'))
					    {
					        bcn_display();
					    }?>
					</div>
	   <h1><?php the_title(); ?></h1>
	  	  <div class="facylty-degination"><span><?php echo $sub_value2; ?></span> | <a href="mailto:<?php echo $sub_value3; ?>"><?php echo $sub_value4; ?></a>
			  <a href="<?php echo $sub_value6; ?>"><img src="<?php echo $sub_value5; ?>" alt="linkedin"></a></div>

		</div></div></div>	
		</section>
		
	<div class="innerpage-content">
		<div class="container">
			<div class="row">
                 <div class="col-md-12">
                       
			<div class="faculty-content">
				<h3><?php echo $sub_value1; ?></h3>
				<div class="faculty-img">
					<img src="<?php echo $sub_value; ?>" alt="">
				</div>
			</div>
					 
			<?php $maincontent = get_the_id(); 
						$content_post = get_post($maincontent);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
						?>
		</div>
				</div>
			</div>
	</div>
			
	<section class="initiative-sec">
		<div class="container-fluid initiative">
			<h3>Initiatives</h3>
			
			<div class="responsive slider">
      <div class="initiate-inner-sec">
						<div class="img-inner-sec">
							<img src="<?php echo get_template_directory_uri(); ?>/images/state-capacity-initative.png" class="d-block" alt="...">
						</div>
						<div class="content-inner-sec">
							<h4>State Capacity Initiative</h4>
							<p>he State Capacity Initiative at CPR is an interdisciplinary research and practice programme focused on addressing the challenges of the 21st-century Indian state. The purpose of this initiative is to place the critical challenges of building state capacity at the heart of the field of policy research in India, where it has always belonged but remains surprisingly marginalised.<br>
							<span><a href="#">Read More</a></span>
							</p>
							
						</div>
					</div>
				<div class="initiate-inner-sec">
						<div class="img-inner-sec">
							<img src="<?php echo get_template_directory_uri(); ?>/images/initative-ban-2.png" class="d-block" alt="...">
						</div>
						<div class="content-inner-sec">
							<h4>JNNURM Initiative </h4>
							<p>The JNNURM is a federal investment program in cities, launched in 2005. The study reviews and analyses the program’s rationale and performance.<br>
							<span><a href="#">Read More</a></span>
							</p>
						</div>
					</div>
				<div>
   
  </div>
			
			
			
			
			
			
			<?php /*?><div class="container arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png" alt=""></div><?php */?>
			
		</div>
	</section>
			
	<div class="news-tab">
		
<div class="left-part">
	<div class="search-bar">
                   <img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-grey-search.png" alt="">
                    <input class="form-control" type="text" placeholder="" aria-label="search">
							</div>
	
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo $tabtitle1; ?></a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo $tabtitle2; ?></a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><?php echo $tabtitle3; ?></a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><?php echo $tabtitle4; ?></a>
		 <a class="nav-link" id="v-pills-settings-tab1" data-toggle="pill" href="#v-pills-settings1" role="tab" aria-controls="v-pills-settings1" aria-selected="false"><?php echo $tabtitle5; ?></a>
		 <a class="nav-link" id="v-pills-settings-tab2" data-toggle="pill" href="#v-pills-settings2" role="tab" aria-controls="v-pills-settings2" aria-selected="false"><?php echo $tabtitle6; ?></a>
    </div>
</div>
  
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	<?php /*?><?php 
		$loop = new WP_Query(

array(

'post_type' => 'publications',
'meta_query' => array(
'relation' => 'AND',
array(
'key' => 'category_box',
'value' => 'Book Chapters',
'compare' => '='
),

),

'orderby'=>'title',
'order'=>'ASC',
'numberposts' => 1

)
);    
		  
?>		  
	
	if( $posts ) {
    <?php echo $book_chapters_title; ?><?php echo $publisher_name; ?>	
}		  
	<?php */?>  
		  
	 <?php /*?> <?php
  wp_reset_postdata();
  $myargs = array (
      'showposts' => 6,
      'post_type' => 'publications',
      'meta_key' => 'category_box',
     // 'meta_value' => 'Book Chapters'
	  //'id'=>'acf-field_61a4a3779c92e-Book-Chapters',
	 // 'compare' => '=',
  );
		  
		      $query = new WP_Query( $myargs );
			echo "<pre>";
		     print_r($query);
		  exit;
	
  $myquery = new WP_Query($myargs);
  if($myquery->have_posts() ) :
		  
      while($myquery->have_posts() ) : $myquery->the_post();
      the_title(); 

      endwhile;
      endif;
      wp_reset_postdata();
      ?><?php */?>
	  
		  
		  
		  
<?php 
		 
//    $args = array(
//        'post_type'         => 'publications',
//        'posts_per_page'    => -1,
//        'meta_key'          => 'category_box',
//        'meta_value'        => 'Yes'
//    );

//$my_acf_checkbox_field_arr = get_field('category_box');
		  $args = array( 
  'numberposts'		=> 1, // -1 is for all
  'post_type'		=> 'publications', // or 'post', 'page'
  //'orderby' 		=> 'publisher Name', // or 'date', 'rand'
  'order' 		=> 'ASC', // or 'DESC'
'meta_key'          => 'category_box',
			  
			  'key'     => 'category_box',
			'value'   => 'Book Chapters',
			'compare' => '=',
'meta_value'        =>'Book Chapters',
);
		  
		  
//    $query = new WP_Query( $args );
//			echo "<pre>";
//		     print_r($query);
//		  exit;
		  
		  
	$the_query = new WP_Query( $args );

 if( $the_query->have_posts() ):
 while( $the_query->have_posts() ) : $the_query->the_post();
 	echo the_title(); 
 endwhile;
 endif;

 wp_reset_query();	  
?>

<?php //if( $query->have_posts() ) : ?>
   
<?php echo $book_chapters_title; ?><?php echo $publisher_name; ?>
		  <?php wp_reset_postdata(); ?>
<?//php endif; ?>
		  
		  
		  
<?php
$posts = get_posts(array(
    'meta_query' => array(
        array(
            'key'     => 'category_box',
            'value'   => 'Book Chapters',
            'compare' => 'LIKE'
        )
    )
));

if( $posts ) {
    // Do something.
}
?>
		  
	<?php /*?> <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3><?php echo $book_chapters_title; ?></h3>
<p><?php echo $publisher_edit_text; ?></p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p><?php echo $publisher_name; ?></p>
				</div>
		</div>	 <?php */?> 



		  
		  
		  <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		
		 <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		  
		</div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
		  <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		
		 <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
		  <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		
		 <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
		  <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		
		 <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		</div>
		
		<div class="tab-pane fade" id="v-pills-settings1" role="tabpanel" aria-labelledby="v-pills-settings-tab1">
		  <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		
		 <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		</div>
		
		<div class="tab-pane fade" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings-tab2">
		  <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		
		 <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		   <div class="tab-news-sec">
			  <div class="tab-news-text">
			<h3>Reshaping the State-citizen relationship</h3>
<p>Hindustan Times, 1</p>
			</div>
			<div class="news-date">
			<p>30 July 2021</p>
<p>By Yamini Aiyar</p>
				</div>
		</div>
		</div>
    </div>
	</div>
	</main>

			  
		
<?php get_footer(); ?>
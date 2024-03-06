<?php
/**
 * Template Name: Work With us Template
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
	   <h1><?php the_title();
	   ?></h1>
		</div></div></div>	
		</section>
			<div class="innerpage-content">
	        <div class="container">
				<div class="row">
				
				
                    <div class="col-md-12">
                       
					<p class="mb-0"><?php $maincontent = get_the_id(); 
						$content_post = get_post($maincontent);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
						?>	</p>	
						
						
						
						
						
						
						
                    </div>
                  
		
					
					
					
					
					
				</div>
				
	        </div>
	    </div>
		
		<div class="opening-listing">
	        <div class="container">
				<div class="row">
				<div class="col-md-12">
					<div class="vacanci-sec">
					<h3 class="small-heading">Current Vacancies</h3>
					<div class="search-box">
						<div class="search-bar">
                    <img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-grey-search.png" alt="">
				    <input class="form-control" type="text" id="keyword" placeholder="Search Job Title or Keyword" aria-label="search">
							</div>
					<?php /*?><div class="location-bar">
                    <img class="search-user" src="<?php echo get_template_directory_uri(); ?>/images/icon-location.png" alt="">
                    <input class="form-control" type="text" placeholder="Location " aria-label="location">
							</div>	<?php */?>
					<button class="search-button" type="button" onClick="fetch()">Search<span>&gt;</span></button>	
						
					</div>	
            </div>
 </div>
					
				 	
				</div>
	          
				
				<div class="hide-data mb-openinglist" id="datafetch-openinglist">		
				<div class="row">	
			 <?php 
		  $args = array(
            'post_type' => 'jobs',
            'post_status' => 'publish',
			  'posts_per_page' => -1,
			    'order' => 'DESC',
            'no_found_rows' => true,
);
		  //$my_query = new WP_Query( $args );
		  
		  $query = new WP_Query( $args );
//		 echo "<pre>";
//	     print_r($query);		 
//		  exit;
		  
		  if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
                $job_designation = get_field( 'job_designation' );
				$job_description = get_field( 'job_description' );
				$job_pdf_file = get_field( 'job_pdf_file' );
				$job_link = get_field( 'job_link' );
                $content = get_the_content();
			  
             
	?> 
					
					<div><?php //echo $job_description; ?>
							 <p><?php// echo mb_strimwidth($content, 0, 60, "..."); ?></p>
							</div>
					
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="item">
                            <h3><?php echo mb_strimwidth($job_designation, 0, 80, "..."); ?><?php// echo $job_designation; ?></h3>
                           <div class="ap-btn-sec">
<!--							 <a href="#" class="btn_1 outline">Apply Now<span>&gt;</span></a>-->
<a href="<?php echo $job_pdf_file; ?>" class="open-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/pdf.png" alt=""/></a>	
							</div>
                        </div>

                    </div>
					
						  <?php
		   endwhile;
}
		?>
                  
					
				
					
				</div>
				</div>
				
				
			  <!-- /tabs_menu-->


	        </div>
	        <!-- /container -->
	    </div>
	
		<!--<div class="opening-form" id="opening-form">
	        <div class="container">
				<div class="row">	
					<div class="heading">
					<h3>Interested in working with CPR outside of the openings listed above? </h3>
<h3>Get in touch using the form to the below, and we will get back to you in case there is an opening.</h3>
						</div>
					
					
			
		</div>
				
				<div>
				
					</div>
		 </div>	
		</div>	
		-->	<?php //echo do_shortcode('[contact-form-7 id="507" title="work with us"]'); ?>
		
		
		
		
		
		
		
	</main>

			  
			
<?php get_footer(); ?>
<?php
function ajax_fetch_opening() {
?>
<script type="text/javascript">
function fetch(){
	
	var keyword = jQuery('#keyword').val();
	
	
	
	if(keyword != "")
		{
			jQuery('.search-button').css({"cursor": "pointer", "pointer-events": "auto"});
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: { action: 'data_fetch_opening', keyword: jQuery('#keyword').val() },
				success: function(data) {
					jQuery('#datafetch-openinglist').html( data );
				}
			});
		}
	
}
	
</script>

<?php
}
?>



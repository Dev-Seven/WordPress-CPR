<?php
/**
 * Template Name: Who We Are Template
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
<?php
     
$vision_and_mission = get_field( 'vision_and_mission' );
$heritage_illustrious_alumni_content = get_field( 'heritage_illustrious_alumni_content' );
$funders_and_partners_content = get_field( 'funders_and_partners_content' );
 $our_impact_content = get_field( 'our_impact_content' );
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
	  	  

		</div></div></div>	
		</section>
		
			
 <section class="about-sec">
            <div class="container">
                <div class="about-left-sec">
                    <h3>About</h3>
                    <?php $maincontent = get_the_id(); 
						$content_post = get_post($maincontent);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
						?>
                </div>
                <div class="about-right-sec">
                    <h3>Vision and Mission</h3>
					<div>
					<?php echo $vision_and_mission; ?>
					
					
					</div>
					
                   
                </div>
            </div>
        </section>
        <section class="alumni-sec">
            <div class="container">
				<div class="row">
					<div class="col-md-12">
                <div class="alumni-inner-sec">
                    <h3>Alumni</h3>
                    <p>CPR has been home to some of the brightest minds in India. Leading policymakers, scholars, bureaucrats and thought leaders have been associated with the Centre in various capacities.</p>
                </div>
                <div class="member-sec">
					
					
					
					
					 <h3>Founder</h3>
                    <div class="cpr-faculty">
                       <ul>
						<?php
      if ( have_rows( 'cpr_founder' ) ):
        while ( have_rows( 'cpr_founder' ) ): the_row();
              $cpr_faculty_image = get_sub_field( 'cpr_founder_image' );
						 $cpr_faculty_name = get_sub_field( 'cpr_founder_name' );
      ?>
						<li class="item">
		         
		<figure>
						  	<img src="<?php echo $cpr_faculty_image; ?>" alt=""> 
			  				</figure>
          <h3> <?php echo $cpr_faculty_name; ?></h3>
        </li>
		  
      <?php endwhile; 
     endif;
      ?>				
		</ul>
                    </div>
					
					
                    <h4>Former Members of the CPR Governing Board</h4>
					
					
                    <div class="board-member">
						<ul>
						<?php
      if ( have_rows( 'cpr_governing_board' ) ):
        while ( have_rows( 'cpr_governing_board' ) ): the_row();
              $cpr_governing_members_board_image = get_sub_field( 'cpr_governing_members_board_image' );
						 $cpr_governing_members_board_name = get_sub_field( 'cpr_governing_members_board_name' );
      ?>
						<li class="item">
		         
		<figure>
						  	<img src=" <?php echo $cpr_governing_members_board_image; ?>" alt=""> 
			  				</figure>
          <h3> <?php echo $cpr_governing_members_board_name; ?></h3>
        </li>
		  
      <?php endwhile; 
     endif;
      ?>				
		</ul>				
						
						
                       
                    </div>
					
					
					
					
                    <h4>Former CPR Faculty</h4>
                    <div class="cpr-faculty">
                       <ul>
						<?php
      if ( have_rows( 'cpr_faculty' ) ):
        while ( have_rows( 'cpr_faculty' ) ): the_row();
              $cpr_faculty_image = get_sub_field( 'cpr_faculty_image' );
						 $cpr_faculty_name = get_sub_field( 'cpr_faculty_name' );
      ?>
						<li class="item">
		         
		<figure>
						  	<img src="<?php echo $cpr_faculty_image; ?>" alt=""> 
			  				</figure>
          <h3> <?php echo $cpr_faculty_name; ?></h3>
        </li>
		  
      <?php endwhile; 
     endif;
      ?>				
		</ul>
                    </div>
                </div>
					</div></div>
            </div>
        </section>
        <section class="partner-sec">
            <div class="container">
				<div class="row">
					<div class="col-md-12">
                <div class="partner-inner-sec">
                    <h3>Funders and Partners</h3>
                    <?php echo $funders_and_partners_content; ?>
                </div>
				<div class="row">
					<div class="col-md-12">
					<ul class="partner-row">
					<?php
      if ( have_rows( 'funders_and_partners_logo' ) ):
        while ( have_rows( 'funders_and_partners_logo' ) ): the_row();
              $funders_partners_image = get_sub_field( 'funders_partners_image' );
      ?>
					<li>
                  <img src="<?php echo $funders_partners_image; ?>" alt=""> 
                   </li>
				
      
      <?php endwhile; 
     endif;
      ?>	</ul>
            </div>
			</div>	
            </div>	
			</div>	
            </div>
        </section>
        <section class="impact-sec">
            <div class="container">
                <div class="impact-inner-sec">
                    <h3>CPR’s footprint in 2021</h3>
<!--                    <p>CPR’s footprint in 2020-21</p>-->
                </div>
				<div class="row">
					<div class="col-md-12">
				  <div class="impact-list">
					<ul class="impact-row">
					<?php
      if ( have_rows( 'our_impact_count' ) ):
        while ( have_rows( 'our_impact_count' ) ): the_row();
              $impact_count = get_sub_field( 'impact_count' );
						$impact_title = get_sub_field( 'impact_title' );
      ?>
					<li>
                  <h3><?php echo $impact_count; ?></h3>
					<p><?php echo $impact_title; ?></p>
                   </li>
				
      
      <?php endwhile; 
     endif;
      ?>	</ul>  
					  
					  
				</div>
				</div>
					</div>
				
				
				
                
            </div>
        </section>
	 <?php if ($our_impact_content != "") { ?>
	 <section class="impact-contect-sec">
            <div class="container">
				<div class="row">
					<div class="col-md-12">
	<p><?php echo $our_impact_content; ?></p>
	</div>
				</div>
					</div>
			  </section>	
	<?php } ?>
	</main>



<?php get_footer(); ?>

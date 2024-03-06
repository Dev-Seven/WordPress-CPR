<?php
/**
 * Template Name: Accountability Initiative Template
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

<?php
     
//$sub_value = get_field( 'faculty_image' );
//$sub_value1 = get_field( 'faculty_main_text' );
//$sub_value2 = get_field( 'faculty_designation' );
//$sub_value3 = get_field( 'faculty_email_url' );
//$sub_value4 = get_field( 'faculty_email_text' );
//$sub_value5 = get_field( 'faculty_linked_image' );
//$sub_value6 = get_field( 'faculty_linked_url' );

//$tabtitle1 = get_field( 'opinions_title' );
//$tabtitle2 = get_field( 'journal_articles_title' );
//$tabtitle3 = get_field( 'book_chapters_title' );
//$tabtitle4 = get_field( 'briefs_reports_title' );
//$tabtitle5 = get_field( 'working_papers_title' );
//$tabtitle6 = get_field( 'news_title' );


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
			<div class="innerpage-content">
	        <div class="container">
				<div class="row">
				  <div class="col-md-12">
		 <?php
        $maincontent = get_the_id();

        $content_post = get_post( $maincontent );
        $content = $content_post->post_content;
        $content = apply_filters( 'the_content', $content );
        $content = str_replace( ']]>', ']]&gt;', $content );
        echo $content;
        ?>
</div>
					</div>
				</div>
				</div>
	<section class="faculty-slider-sec">
		<div class="container-fluid">
			<div class="faculty-slider carousel">
    <div>
      <div class="faculty-slider-box">
						<div class="facult-img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/yamini-aiyar.jpg" class="d-block" alt="...">
						</div>
						<div class="facult-info">
							<h4>Yamini Aiyar</h4>
							<p>President and Chief Executive</p>
						</div>
					</div>
		</div>
    <div>
      <div class="faculty-slider-box">
						<div class="facult-img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/avni-kapur.jpg" class="d-block" alt="...">
						</div>
						<div class="facult-info">
							<h4>Avani Kapur</h4>
							<p>Fellow</p>
						</div>
					</div>
   </div>
    <div>
      <div class="faculty-slider-box">
						<div class="facult-img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/mridusmita-bordoloi.jpg" class="d-block" alt="...">
						</div>
						<div class="facult-info">
							<h4>Mridusmita Bordoloi</h4>
							<p>Associate Fellow</p>
						</div>
					</div>
    </div>
    <div>
      <div class="faculty-slider-box">
						<div class="facult-img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/jenny-john.jpg" class="d-block" alt="...">
						</div>
						<div class="facult-info">
							<h4>Jenny Susan John</h4>
							<p>Research Associate</p>
						</div>
					</div>
  </div>
    <div>
      <div class="faculty-slider-box">
						<div class="facult-img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/aamna-ahmad.jpg" class="d-block" alt="...">
						</div>
						<div class="facult-info">
							<h4>Aamna Ahmad</h4>
							<p>Learning and Development Associate</p>
						</div>
					</div>
   </div>
</div>
			
			
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
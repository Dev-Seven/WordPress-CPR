<?php
/**
 * Template Name: Funding Template
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
<!--<div class="top_margin"></div>-->
<section class="inner-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
          <?php
          if ( function_exists( 'bcn_display' ) ) {
            bcn_display();
          }
          ?>
        </div>
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
    </div>
  </div>
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
    
    <!-- /tabs_menu--> 
    
  </div>
  <!-- /container --> 
</div>
<?php
$tabtitle = get_field( 'tab_name1' );
$tabtitle1 = get_field( 'tab_name2' );
$tabtitle2 = get_field( 'tab_name3' );
?>
<div class="funding-report-sec grey-tabbing">
  <div class="container">
    <div class="tabs_menu">
      <div class="tab-menu-sec">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a id="annual-reports" href="#annual-reports-tab" class="nav-link active" data-toggle="tab" role="tab"><?php echo $tabtitle; ?></a> </li>
          <li class="nav-item"> <a id="grants" href="#grants-tab" class="nav-link" data-toggle="tab" role="tab"><?php echo $tabtitle1; ?></a> </li>
          <li class="nav-item"> <a id="fcra" href="#fcra-tab" class="nav-link" data-toggle="tab" role="tab"><?php echo $tabtitle2; ?></a> </li>
        </ul>
      </div>
      <div class="tab-content" role="tablist">
        <div id="annual-reports-tab" class="tab-pane fade show active" role="tabpanel" aria-labelledby="annual-reports-tab">
          <div class="row">
            <div class="col-md-12">
              <?php
              if ( have_rows( 'pdf_main1' ) ):
                while ( have_rows( 'pdf_main1' ) ): the_row();
              $pdf_name1 = get_sub_field( 'pdf_name1' );
              $pdf_year1 = get_sub_field( 'pdf_year1' );
              $pdf_file1 = get_sub_field( 'pdf_file1' );

              ?>
              <a href="<?php
                if ($pdf_file1 != ""){
                  echo $pdf_file1;
                } else {

                }
               ?>" target="_blank">
              <div class="pdf-item">
                <div class="pdf-info">
                  <p><?php if ($pdf_name1 != ""){
                      echo $pdf_name1;
                  } else {

                  }
                    ?></p>
                  <h4><?php if ($pdf_year1 != "") {
                    echo $pdf_year1;
                  } else {

                  }
                    ?></h4>
                </div>
              </div>
              </a>
              <?php	endwhile; ?>
              <?php
              else :
                //echo "Test";
                endif;
              ?>
            </div>
          </div>
        </div>
        <!-- /tab -->
        <div id="grants-tab" class="tab-pane fade" role="tabpanel" aria-labelledby="grants-tab">
          <div class="row">
            <div class="col-md-12">
              <?php
              if ( have_rows( 'pdf_main2' ) ):
                while ( have_rows( 'pdf_main2' ) ): the_row();
              $pdf_name2 = get_sub_field( 'pdf_name2' );
              $pdf_year2 = get_sub_field( 'pdf_year2' );
              $pdf_file2 = get_sub_field( 'pdf_file2' );

              ?>
              <a href="<?php echo $pdf_file2; ?>" target="_blank">
              <div class="pdf-item">
                <div class="pdf-info">
                  <p><?php echo $pdf_name2; ?></p>
                  <h4><?php echo $pdf_year2; ?></h4>
                  <p></p>
                </div>
              </div>
              </a>
              <?php	endwhile; ?>
              <?php
              else :

                endif;
              ?>
            </div>
          </div>
        </div>
        <!-- /tab -->
        <div id="fcra-tab" class="tab-pane fade" role="tabpanel" aria-labelledby="fcra-tab">
          <div class="row">
            <div class="col-md-12">
              <?php
              if ( have_rows( 'pdf_main3' ) ):
                while ( have_rows( 'pdf_main3' ) ): the_row();
              $pdf_name3 = get_sub_field( 'pdf_name3' );
              $pdf_year3 = get_sub_field( 'pdf_year3' );
              $pdf_file3 = get_sub_field( 'pdf_file3' );

              ?>
               <a href="<?php echo $pdf_file3; ?>" target="_blank">
              <div class="pdf-item">
                <div class="pdf-info">
                  <p><?php echo $pdf_name3; ?></p>
                  <h4><?php echo $pdf_year3; ?></h4>
                  <p></p>
                </div>
              </div>
              </a>
              <?php	endwhile; ?>
              <?php
              else :

                endif;
              ?>
            </div>
          </div>
        </div>
        <!-- /tab --> 
      </div>
      <!-- /tab-content --> 
    </div>
    <!-- /tabs_menu--> 
    
  </div>
  <!-- /container --> 
</div>
<?php get_footer(); ?>

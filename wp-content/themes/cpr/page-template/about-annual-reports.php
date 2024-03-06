<?php
/**
 * Template Name: About Annual Reports Template
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

<section class="annual-report-sec">
  <div class="container">
    <div class="inner-report-sec">
      <?php
      $maincontent = get_the_id();

      $content_post = get_post( $maincontent );
      $content = $content_post->post_content;
      $content = apply_filters( 'the_content', $content );
      $content = str_replace( ']]>', ']]&gt;', $content );
      echo $content;
      ?>
    </div>
    <div class="annual-reports-tab">
      <div class="top-part">
        <ul id="tabs" class="nav nav-tabs nav-pills" role="tablist">
          <li class="nav-item"> <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Annual Reports</a> </li>
          <li class="annual-border"></li>
          <li class="nav-item"> <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Archive</a> </li>
        </ul>
      </div>
      <div id="content" class="tab-content" role="tablist">
        <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
          <div class="card-header" role="tab" id="heading-A">
            <h5 class="mobile-tab mb-0"> <a data-toggle="collapse" href="#collapse-A" data-parent="#content" aria-expanded="true" aria-controls="collapse-A"> Annual Reports </a> </h5>
          </div>
          <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A" data-parent="#content">
            <div class="card-body">
              <div class="row annual-report">
                <?php
                if ( have_rows( 'annual_reports_pdf' ) ):
                  while ( have_rows( 'annual_reports_pdf' ) ): the_row();
                $annual_report_name = get_sub_field( 'annual_report_name' );
                $annual_report_year = get_sub_field( 'annual_report_year' );
                $annual_reports_pdf = get_sub_field( 'annual_reports_pdf' );

                ?>
               
                <div class="col-md-4 col-lg-4">
					 <a href="<?php
                if ($annual_reports_pdf != ""){
                  echo $annual_reports_pdf;
                } else {

                }
               ?>" target="_blank">
                  <div class="annual-report-list">
                    <div class="text-sec">
                      <h3>
                        <?php
                        if ( $annual_report_name != "" ) {
                          echo $annual_report_name;
                        } else {

                        }
                        ?>
                      </h3>
                      <p>
                        <?php
                        if ( $annual_report_year != "" ) {
                          echo $annual_report_year;
                        } else {

                        }
                        ?>
                      </p>
                    </div>
                    <div class="pdf-sec"> <img src="<?php echo get_template_directory_uri(); ?>/images/pdf.png" alt="pdf"> </div>
                  </div>
						  </a>
                </div>
               
                <?php	endwhile; ?>
                <?php
                else :
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
          <div class="card-header" role="tab" id="heading-B">
            <h5 class="mobile-tab mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-B" data-parent="#content" aria-expanded="false" aria-controls="collapse-B"> Archive </a> </h5>
          </div>
          <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B" data-parent="#content">
            <div class="card-body">
              <div class="row annual-report">
                <?php
                if ( have_rows( 'archive_reports_pdf' ) ):
                  while ( have_rows( 'archive_reports_pdf' ) ): the_row();
                $archive_report_name = get_sub_field( 'archive_report_name' );
                $archive_report_year = get_sub_field( 'archive_report_year' );
                $archive_reports_pdf = get_sub_field( 'archive_reports_pdf' );

                ?>
                <div class="col-md-4 col-lg-4"> <a href="<?php
                if ($archive_reports_pdf != ""){
                  echo $archive_reports_pdf;
                } else {

                }
               ?>" target="_blank">
                  <div class="annual-report-list">
                    <div class="text-sec">
                      <h3>
                        <?php
                        if ( $archive_report_name != "" ) {
                          echo $archive_report_name;
                        } else {

                        }
                        ?>
                      </h3>
                      <p>
                        <?php
                        if ( $archive_report_year != "" ) {
                          echo $archive_report_year;
                        } else {

                        }
                        ?>
                      </p>
                    </div>
                    <div class="pdf-sec"> <img src="<?php echo get_template_directory_uri(); ?>/images/pdf.png" alt="pdf"> </div>
                  </div>
                  </a> </div>
                <?php	endwhile; ?>
                <?php
                else :
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>

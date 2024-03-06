
<?php function data_fetch_opening(){
    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'jobs' ) );
    if( $the_query->have_posts() ) :
	?>
	 <div class="row">
					<?php
        while( $the_query->have_posts() ): $the_query->the_post();
  $job_designation = get_field( 'job_designation' );
				$job_description = get_field( 'job_description' );
				$job_pdf_file = get_field( 'job_pdf_file' );
				$job_link = get_field( 'job_link' );

?>
  
            <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="item">
                            <h3><?php echo $job_designation; ?></h3>
                            <div><?php //echo $job_description; ?>
							<?php
          $maincontent = get_the_id();
          $content_post = get_post( $maincontent );
          $content = $content_post->post_content;
          $content = apply_filters( 'the_content', $content );
          $content = str_replace( ']]>', ']]&gt;', $content );
          echo $content;
          ?>
							</div>
							
							<div class="ap-btn-sec">
<!--							 <a href="#" class="btn_1 outline">Apply Now<span>&gt;</span></a>-->
<a href="<?php echo $job_pdf_file; ?>" class="open-link" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/pdf.png" alt=""/></a>	
							</div>
                        </div>

                    </div>

        <?php endwhile;?>
		  </div>
		<?php else:?>
    <p class="text-center"><?php _e('Sorry, We did not find searched result.'); ?></p>
<?php
        wp_reset_postdata();  
    endif;

    die();
}?>







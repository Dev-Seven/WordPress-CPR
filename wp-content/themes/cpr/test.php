<?php
// Template Name: Test

get_header();?>
<?php
// Template Name: Test

get_header();?>
<div class="tabs_menu">
    <div class="tab-menu-sec">
            <ul class="nav nav-tabs" role="tablist">                
              <li class="nav-item"> <a id="peoplearchive" href="#peoplearchive-tab" class="nav-link active" data-toggle="tab" role="tab">People Archive</a> </li>
              <li class="nav-item"> <a id="pastproject" href="#pastproject-tab" class="nav-link" data-toggle="tab" role="tab">Past Projects</a> </li>
            </ul>
          </div>
          <div class="tab-content" role="tablist">
   
			    <div id="peoplearchive-tab" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="peoplearchive-tab">
                <div class="faculty-listing">
                 <div class="row justify-content-center">     
                
                  <?php
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;		 
                  $args = array(		
                      'post_type' => 'people',
                              'tax_query' => array(
                                  array(
                                      'taxonomy'  => 'people_category',
                                      'field'     => 'slug',
                                      'terms'     => 'faculty-archive',
                                      ), 
                                  ),
                              'post_status' => 'publish',
                      'orderby' => 'title',
                        'order' => 'ASC',
                          'posts_per_page' => -1,
                          //'paged'=>$paged
                      );
                      //query
                      $query = new WP_Query($args);?>
                      
                        <?php while ($query->have_posts()): $query->the_post();?>
                    
                    <div class="col-md-6 col-lg-4 col-xl-3">
                          <a href="<?php echo get_permalink( $id ) ?>">
                          <?php   $faculty_image = get_field( 'faculty_image' );
                      $faculty_designation = get_field( 'faculty_designation' );
                          ?>
                            <div class="item">
                              <div class="item-img">
                          <?php if ($faculty_image != "") { ?>
                                <img src="<?php echo $faculty_image; ?>" alt="">
                                <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/faculty-img.jpg" alt="" />
                                <?php } ?>
                          </div>
                              <h3><?php the_title(); ?></h3>
                              <p><?php echo $faculty_designation; ?></p>
                            </div>
                        </a>
                        </div> 
                      
                      <?php endwhile; 
                      ?>
                  </div>      				 		
                </div>               
					    </div>

                       		
            <div id="pastproject-tab" class="card tab-pane fade past-project" role="tabpanel" aria-labelledby="pastproject-tab">
                    <div class="row justify-content-center">
                    <?php
                        $pro_author_name = get_field( 'author_name' );
                        $published_date = get_field( 'published_date' ); 
					?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array(
                    'post_type' => 'project',
                    'orderby' => "date",
                    'order' => 'DESC',
                    'paged' => $paged,
                    'posts_per_page'=> 5, 
                    'meta_query' => array(                       
                          'key'       => 'project_status',
                          'compare'   => '=',
                          'value'     => 'close',                        
                    )	
                  );
                  $query = new WP_Query($args);
                  ?>
               	
                <?php if($query->have_posts()): 
                  ?>
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <div class="col-sm-12 col-md-6">
                <?php $protitle = get_the_title();?>
                    <div class="tab-news-sec">
                        <div class="tab-news-text">
                                <a href="<?php echo get_permalink(); ?>">
                            <h3><?php echo mb_strimwidth($protitle, 0, 40, "...");?></h3>
                                </a>	 
                        </div>
                        <div class="news-date">
                            <p><?php echo the_field("published_date"); ?></p>
                            <p class="pa-author-name"><?php
                          $documents = get_posts(array(
                              'post_type' => 'people',
                              'meta_query' => array(
                              array(
                                    'key' => 'project_detail',
                                    'value' => '"' . get_the_ID() . '"', 
                                    'compare' => 'LIKE'
                                      )
                                    )
                                ));
                              $authorname = get_the_title ( $document->ID ); 
                          ?>
                          <?php if( $documents ): ?>
                            <?php                   
                                $numItems = count($documents);
                                $i = 0;
                                ?>  
                                <?php foreach( $documents as $document ): ?>
                                    <?php if (get_the_title ( $document->ID ) != "") { ?>
                                    <?php
                                    if(++$i === $numItems) { ?>
                                    <?php $authorname_new = get_the_title ( $document->ID ); 
                                        echo mb_strimwidth($authorname_new, 0, 40, "");
                                        ?>             
                                <?php  }else{ ?>

                                    <?php $authorname_new = get_the_title ( $document->ID ); 
                                        echo mb_strimwidth($authorname_new, 0, 40, "").',';
                                        ?>                             
                                <?php }?>                   
                                                                
                                    <?php } ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
           <?php endwhile;?>   
           <?php if (function_exists("pagination")) {
                pagination($query->max_num_pages);
            } 
?>   
           <?php endif;?>                   
				</div>	
          </div>									   
	</div>
</div>
<?php get_footer();?>             
<script>


        if (window.location.href.indexOf("/test/page") > -1) {
            $('#pastproject').addClass('active');
            $('#pastproject-tab').addClass('active show');

            $('#peoplearchive').removeClass('active');
            $('#peoplearchive-tab').removeClass('show active');
        }
    
    $(document).ready(function(){
        if (window.location.href.indexOf("/test/page") > -1) {
            $('#pastproject').addClass('active');
            $('#pastproject-tab').addClass('active show');

            $('#peoplearchive').removeClass('active');
            $('#peoplearchive-tab').removeClass('show active');
            
        //   $('#pastproject').trigger('click');
        }
    });
</script>


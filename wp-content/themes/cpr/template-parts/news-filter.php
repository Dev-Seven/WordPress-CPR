<?php
function data_fetch_news() {?>
<div class="row newslisting">
    <?php query_posts(array('post_type' => 'post','orderby' => 'date', 'posts_per_page' => -1,'s' => esc_attr( $_POST['keyword'] ))); 
       if(have_posts()) : 
        while(have_posts()) : the_post();
        $published_date = get_field( 'published_date' );?>
   <div class="col-md-6 col-lg-4 col-xl-4">    
        <div class="items">
        <a href="<?php echo get_permalink( $id ) ?>"><div class="item-img"><?php the_post_thumbnail(); ?></div> </a>
            <div class="item-content">
                <div class="item-booktext">
                    <h3> <a href="<?php echo get_permalink( $id ) ?>"><?php the_title(); ?></a></h3>        
                </div>         
                <div class="bottom-sec">
                <div class="author-name">
                             <h3>
								 <?php /*?><img src="<?php echo get_template_directory_uri(); ?>/images/news-author-icon.png" alt=""><span><?php	cpr_posted_by(); ?><?php */?>
                             <?php 
                            $documents = get_posts(array(
                                        'post_type' => 'people',
                                        'meta_query' => array(
                                        array(
                                            'key' => 'news_detail', // name of custom field
                                            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                            'compare' => 'LIKE'
                                                )
                                            )
                                        ));
                            ?>
                            <?php if( $documents ): ?>
                            <?php foreach( $documents as $document ): ?>
                                    <?php echo get_the_title( $document->ID, 0, 60, "..." ); ?> 
                            <?php endforeach; ?>
                            <?php endif; ?>	                                                                  
                            </span></h3>
                         </div>
                         <div class="news-date"><?php //the_date('F j, Y') ?><?php echo $published_date; ?>
                        </div>
                     </div>
             
        </div>
    </div>
          
 </div>
<?php endwhile; ?>
<?php else : ?>
	<div class="col-md-12">
     <p class="text-center">Sorry, We did not find searched result.</p> 
		</div>
<?php endif; wp_reset_query(); die();?>
</div>		
  <?php 
}

?>
	
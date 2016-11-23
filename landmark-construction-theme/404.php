<?php 
/* Error (404) Template */  
get_header();
?>    
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky"> 
  
  <!-- Page Content Start -->
  <?php
  landmark_construction_theme_get_defaults();
  $error_page_id = landmark_construction_get_theme_options('error_page_id', 'empty', 'false');

 	if ( $error_page_id != "" ) {
  	
    if ( !empty($error_page_id) ) {
	  $the_query = new WP_Query( 'page_id='.$error_page_id.'&post_type=page' );
      while ( $the_query->have_posts() ) :
      $the_query->the_post();
      ?><div class="container"><div class="row"><div class="col-md-12">  
      <?php the_content(); ?>
      </div></div></div>
      <?php 
      endwhile;
      wp_reset_postdata();
    }
    }
	?>
  
</section>

<?php get_footer();?>

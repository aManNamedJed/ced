<?php

	get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>    
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky">  
      <div class="caption-container">
        <div class="caption" <?php landmark_construction_theme_caption_image($post); ?>><div class="container"><div class="row"><div class="col-md-12">
              <h1 <?php landmark_construction_theme_h2($post); ?>><?php the_title(); ?></h1> 
              <p><?php echo get_post_meta($post->ID, '_landmark_construction_theme_page_subtitle', true); ?></p>
        </div></div></div></div>
			</div>
  <!-- Page Content Start -->
  <div class="container"><div class="row">
    <div class="col-sm-8 col-md-8">
    <div class="page-outer">
      
    <?php the_content(); ?>    
    <?php wp_link_pages(); ?>
    </div>  
    
    <?php if (comments_open()){ ?>    
    <div class="bg-color white"><div class="container"><div class="row"><div class="col-md-12">    
        <div id="comment" class="comments-wrapper">
              <?php comments_template(); ?>
        </div>
    </div></div></div></div>
    <?php } ?>
    </div>
    <?php get_sidebar();?>
   </div></div>

</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer();?>
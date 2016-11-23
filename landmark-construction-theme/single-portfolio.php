<?php
landmark_construction_theme_get_defaults(); 
get_header(); 

if ( isset($landmark_construction_theme_options['portfolio_header'])) {
$portfolio_header = $landmark_construction_theme_options['portfolio_header'];
}
else { $portfolio_header = "Portfolio"; }
if ( isset($landmark_construction_theme_options['portfolio_caption'])) {
$portfolio_caption = $landmark_construction_theme_options['portfolio_caption'];
}
else { $portfolio_caption = ""; } 
$caption_style = landmark_construction_get_theme_options('landmark_construction_theme_caption_style', 'caption-style1', 'false');
?>
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky">
      <div class="caption-container <?php echo esc_attr($caption_style); ?>">
        <div class="caption">     
          <div class="container"><div class="row"><div class="col-md-12">
              <h1 <?php landmark_construction_theme_h2($post); ?>>                 
              <?php echo esc_html($portfolio_header); ?></h1>            
              <p><?php echo esc_html($portfolio_caption); ?></p>
              <?php if ( $caption_style == "caption-style2" ) {
              ?>
              <div class="bt-page-breadcrumb">
              <?php
              landmark_construction_theme_breadcrumb(); 
              ?>
              </div>
              <?php
              }
              ?>             
          </div></div></div>         
        </div>
      </div> 
  
	<!-- Portfolio Content Start -->	
	  <div class="portfolio-single-container">
    	<div class="container">
        	<div class="row">
                <div class="col-md-12">
              <div class="portfolio-single-nav">
                <?php next_post_link('<div class="next-project">%link</div>', '<i class="fa fa-caret-right" aria-hidden="true"></i>', FALSE); ?>    
                <?php previous_post_link('<div class="prev-project">%link</div>', '<i class="fa fa-caret-left" aria-hidden="true"></i>', FALSE); ?>
              </div>
          </div>
            <div class="clearfix"></div>
			  <?php
			  if (have_posts()) : while (have_posts()) : the_post(); 
					the_content();
	  		  endwhile; else: ?>
			  <p>Sorry, no posts matched your criteria.</p>
 	  		  <?php endif; ?>
	  		</div>
	  	</div>
	  </div>
</section>
<?php get_footer();?>
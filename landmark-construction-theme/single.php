<?php 

$landmark_construction_theme_options=landmark_construction_theme_get_defaults();

get_header(); 

$blog_style = landmark_construction_get_theme_options('blog_style', 'blog-style1', 'false');
$blog_header = landmark_construction_get_theme_options('blog_header', 'Blog', 'false');
$blog_caption = landmark_construction_get_theme_options('blog_caption', 'empty', 'false');
$landmark_construction_theme_activate_blog = landmark_construction_get_theme_options('landmark_construction_theme_activate_blog', '0', 'check');
$caption_style = landmark_construction_get_theme_options('landmark_construction_theme_caption_style', 'caption-style1', 'false');
?>
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky"> 
  <!-- Content Start -->  
    <div class="blog-style">
      <div class="caption-container <?php echo esc_attr($caption_style); ?>">
        <div class="caption">     
          <div class="container"><div class="row"><div class="col-md-12">
              <h2><?php echo esc_html($blog_header); ?></h2>            
              <p><?php echo esc_html($blog_caption); ?></p>
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
      <div class="container">
        <div class="row">
          <?php
          if ( $landmark_construction_theme_activate_blog == 1 ) {
            get_template_part( 'includes/single/single', $blog_style ); 
          }
          else {
            get_template_part( 'includes/single/single', 'classic');
          }
          ?>
        </div>
      </div>
    </div>

</section>
<?php get_footer(); ?>
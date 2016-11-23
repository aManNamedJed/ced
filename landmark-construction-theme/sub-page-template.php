<?php
/* Template Name: SubPage Template */  
landmark_construction_theme_get_defaults();

get_header();
$caption_style = landmark_construction_get_theme_options('landmark_construction_theme_caption_style', 'caption-style1', 'false');
?>

<?php while ( have_posts() ) : the_post(); ?>    
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky">  
      <div class="caption-container <?php echo esc_attr($caption_style); ?>">
        <div class="caption" <?php landmark_construction_theme_caption_image($post); ?>>     
          <div class="container"><div class="row"><div class="col-md-12">
              <h1 <?php landmark_construction_theme_h2($post); ?>><?php the_title(); ?></h1>            
              <p><?php echo get_post_meta($post->ID, '_landmark_construction_theme_page_subtitle', true); ?></p>
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
  <div class="container"><div class="row">
  <!-- Page Content Start -->
    
    <?php
    $sidebar_single_style = get_post_meta( $id, "_sidebar_style", true);
    if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
    ?><div class="col-md-8">
    <?php
    the_content(); 
    ?>
    </div>
    
    <?php 
      $the_query = new WP_Query( 'page_id='.$sidebar_single_style.'&post_type=sidebars' );
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
      ?><div class="col-md-4">  
      <?php the_content(); ?>
      </div>
      <?php 
      endwhile;
      wp_reset_postdata();    
    } 
    else {
    the_content();   
    }
    ?>
  </div></div>  
    
    <?php if (comments_open()){ ?>    
    <div class="bg-color white"><div class="container"><div class="row"><div class="col-md-12">    
        <div id="comment" class="comments-wrapper">
              <?php comments_template(); ?>
        </div>
    </div></div></div></div>
    <?php } ?>

</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer();?>
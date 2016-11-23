<?php
$landmark_construction_theme_options=landmark_construction_theme_get_defaults();
$blogid = get_the_ID();
$sidebar_single_style = get_post_meta( $blogid, "_sidebar_style", true);
$content_class = "col-sm-8 col-md-8 blog-wrapper single-blog-style7 col-md-offset-2"; 
if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
    $sidebar_single_column = get_post_meta( $blogid, "_sidebar_column", true);
    if ( $sidebar_single_column == "sidebar_4") {
      $content_class ="col-sm-8 col-md-8 blog-wrapper single-blog-style2";
      $sidebar_class ="col-sm-4 col-md-4";
    }
    else {
      $content_class ="col-sm-9 col-md-9 blog-wrapper single-blog-style2";
      $sidebar_class ="col-sm-3 col-md-3";      
    }
}
?>
<div class="<?php echo esc_attr($content_class); ?>">
  <div class="bt-blog-posts">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!-- Loop Start -->
          <article <?php post_class('post-item') ?>>            
            <?php 
            $format = get_post_format();
            if( !in_array($format, array('quote', 'link'))) { ?> 
            <div class="bt_thumbnail">
            <?php                        
              switch ($format) {
                case 'audio':
                  if (has_post_thumbnail()) { the_post_thumbnail('landmark_construction_theme-blog-single'); }
                  ?>
                  <div class="bt_audio"><?php landmark_construction_theme_audio();?></div>
                  <?php
                  break;
                case 'video':
                  if (has_post_thumbnail()) { the_post_thumbnail('landmark_construction_theme-blog-single'); }
                  ?>
                <div id="prettyVideo-<?php the_ID();?>" class="bt_video hide"><?php landmark_construction_theme_video(); ?></div>
                <div class="bt-video-icon"><a class="prettyPhoto" data-rel="prettyPhoto" href="#prettyVideo-<?php the_ID();?>"><i class="fa fa-play"></i></a></div> 
                  <?php
                  break;
                case 'gallery':
                  landmark_construction_theme_gallery('landmark_construction_theme-blog-single');?>
                <?php
                  break;
                default:
                  if (has_post_thumbnail()) { 
                  ?><a class="prettyPhoto" data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
                  <?php
                    the_post_thumbnail('landmark_construction_theme-blog-single'); 
                  }
                  ?>
                  </a>                 
                  <?php
                  break;
              }
            ?>
            </div> 
              <div class="blog-content">
                  <div class="blog-subtitle">
                <span class="icons"><i class="fa fa-user"></i><?php echo the_author_posts_link(); ?></span>
                <span class="icons"><i class="fa fa-calendar"></i><?php the_time('M j'); ?></span>
                <span class="icons"><a href='#comment'><i class="fa fa-comment"></i><?php comments_number( '0', '1', '%' ); ?></a></span>
                <span class="icons"><?php if( function_exists('zilla_likes') ) { zilla_likes(); } ?></span>
              </div>
              <div class="blog-inner">
                <h1 class="blog-title"><?php the_title(); ?></h1>
                  <?php the_content(); ?>         
                </div>        
              </div> 
            <?php }
            else {
                switch ($format) {
                    case 'quote':
                      ?>
                      <div class="bt-blog-quote">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_content(); ?></a>
                      <span class="bt-quote-title">&mdash; <?php the_title(); ?></span>
                      </div>
                      <?php
                      break;
                    case 'link':
                      ?>
                      <div class="bt-blog-link">
                      <a href="<?php echo esc_url( landmark_construction_theme_get_link_url() ); ?>" target="_blank" class="bt-linkout"><?php the_title();?></a>
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_content(); ?></a>
                      </div>
                      <?php
                      break;

                    default:
 
                      break;
                  }                  
            }
            ?>

            <?php wp_link_pages(); ?>
            

          </article>
      <?php endwhile; else: ?>
          <p><?php echo esc_attr_e('Sorry, no posts matched your criteria.', 'landmark-construction-theme');?></p>
      <?php endif; ?>


      <div class="about-the-author">
      <?php 
      if ( $landmark_construction_theme_options['blog_widget_list'][2] == 1 ) {
      ?>      
        <div class="top">
              <div class="author-avatar">
              <?php echo get_avatar( get_the_author_meta('email') , 168 ); ?>
              </div>
              <div class="author-meta">            
                  <h6><?php echo esc_html__(' About Author', 'landmark-construction-theme'); ?><span><?php echo esc_attr(get_the_author_meta('display_name')); ?></span></h6>
                  <div class="author-bio">   
                  <p class="about-author-desc"><?php echo esc_attr(get_the_author_meta('description')); ?></p>
                  </div>
                  <div class="clearfix"></div>
              </div>
        </div>
      <?php } ?>
      <?php 
      if ( $landmark_construction_theme_options['blog_widget_list'][4] == 1 ) {
      ?>      
        <div class="bottom">
          <div class="posttags">
            <span class="title"><i class="fa fa-tags"></i><?php echo esc_html__('Tags:', 'landmark-construction-theme'); the_tags('<span class="tag1">', '</span><span class="tag"> , ', '</span>');?></span>
          </div>
        </div>
      <?php } ?>
      <?php 
      if ( $landmark_construction_theme_options['blog_widget_list'][3] == 1 ) {
      ?>      
        <div class="bottom-share">
            <span class="title"><?php echo esc_html__('Share Or Like Post: ', 'landmark-construction-theme');?></span>
            <span class="facebook-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-facebook"></i></span>
            <span class="twitter-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-twitter"></i></span>
            <span class="pinterest-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-pinterest"></i></span>
            <span class="google-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-google-plus"></i></span>
            <span class="tumblr-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-tumblr"></i></span>
            <span class="linkedin-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-linkedin"></i></span>
            <span class="stumbleupon-share" data-url="<?php esc_js(the_permalink());?>" data-title="<?php esc_js(the_title());?>"><i class="fa fa-stumbleupon"></i></span>  
          
        </div>
      <?php } ?>
      </div> 
      <?php 
      if ( $landmark_construction_theme_options['blog_widget_list'][5] == 1 ) {
      ?>    
    <div class="prevnext">
      <div class="blog-left"><?php previous_post_link('%link', '<i class="fa fa-long-arrow-left">  </i> Previus Post'); ?></div>
      <div class="blog-right"><?php next_post_link('%link', 'Next Post  <i class="fa fa-long-arrow-right"></i> '); ?></div>
      <div class="clearfix"></div>
    </div> 
    <?php } ?>                     
    <?php 
    if ( $landmark_construction_theme_options['blog_widget_list'][1] == 1 ) {
      
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
      $first_tag = $tags[0]->term_id;
      $args=array(
        'tag__in' => array($first_tag),
        'post__not_in' => array($post->ID),
        'posts_per_page'=>6,
        'ignore_sticky_posts' => 1
      );
    $my_query = new WP_Query($args);
    ?><?php
    if( $my_query->have_posts() ) {?>
    <div class="related-posts bt-related-2">
    <h6><?php echo esc_attr_e('Related Posts', 'landmark-construction-theme'); ?></h6>
    <div class="related-box">
    <?php  
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <div class="related-item">        
        <?php if (has_post_thumbnail()) {
          ?><div class="related-thumb"><?php
          the_post_thumbnail('landmark_construction_theme-blog_widget5');
          ?><div class="blog-over-thumb">
            <a class="prettyPhoto" data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"><i class="fa fa-eye"></i></a>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><i class="fa fa-link"></i></a>
            </div>
            </div>
          <?php
        }
        ?>
        <div class="blog-subtitle">
          <i class="fa fa-user"></i><?php echo the_author_posts_link(); ?>
          <i class="fa fa-calendar"></i><?php the_time('M j'); ?>
          <i class="fa fa-comment"></i><?php comments_number( '0', '1', '%' ); ?>
          <?php if( function_exists('zilla_likes') ) { zilla_likes(); } ?>
        </div>
        <div class="blog-content">        
        <h3 class="blog-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>                                   

          <?php echo '<p>' . wp_trim_words( get_the_content(), 19 ) . '</p>'; ?>
        </div>      
      </div>
    <?php endwhile; ?>
    </div></div>
    <?php } 
    wp_reset_postdata();
    }
    }
    ?>  
    <div class="clearfix"></div>
  <div id="comment" class="comments-wrapper"><?php comments_template(); ?></div>
</div>
</div>

<?php 
if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
      $the_query = new WP_Query( 'page_id='.$sidebar_single_style.'&post_type=sidebars' );
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
      ?><div class="<?php echo esc_attr($sidebar_class); ?>">  
      <?php the_content(); ?>
      </div>
      <?php 
      endwhile;
      wp_reset_postdata();
}
?>

<div class="clearfix"></div>
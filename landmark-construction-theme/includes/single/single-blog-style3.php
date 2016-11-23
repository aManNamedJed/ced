<?php
$landmark_construction_theme_options=landmark_construction_theme_get_defaults();
$byadmin = "By";
$incategory = "in";
if ( !empty($landmark_construction_theme_options['translate_comment'])) {
  $comment = $landmark_construction_theme_options['translate_comment'];
}
if ( !empty($landmark_construction_theme_options['translate_comments'])) {
  $comments = $landmark_construction_theme_options['translate_comments'];
}
if ( !empty($landmark_construction_theme_options['translate_byadmin'])) {
  $byadmin = $landmark_construction_theme_options['translate_byadmin'];
}
if ( !empty($landmark_construction_theme_options['translate_likes'])) {
  $likes = $landmark_construction_theme_options['translate_likes'];
}
$blogid = get_the_ID();
$sidebar_single_style = get_post_meta( $blogid, "_sidebar_style", true);
$content_class = "col-sm-8 col-md-8 blog-wrapper single-blog-style3 col-md-offset-2"; 
if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
    $sidebar_single_column = get_post_meta( $blogid, "_sidebar_column", true);
    if ( $sidebar_single_column == "sidebar_4") {
      $content_class ="col-sm-8 col-md-8 blog-wrapper single-blog-style3";
      $sidebar_class ="col-sm-4 col-md-4";
    }
    else {
      $content_class ="col-sm-9 col-md-9 blog-wrapper single-blog-style3";
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
              <div class="posticon">
                <div class="time">
                 <h3><?php the_time('j'); ?></h3>
                 <h4><?php the_time('M'); ?></h4>
                </div>
                
              </div>
                  <?php
                  break;
                case 'video':
                  if (has_post_thumbnail()) { the_post_thumbnail('landmark_construction_theme-blog-single'); }
                  ?>
                <div id="prettyVideo-<?php the_ID();?>" class="bt_video hide"><?php landmark_construction_theme_video(); ?></div>
                <div class="bt-video-icon"><a class="prettyPhoto" data-rel="prettyPhoto" href="#prettyVideo-<?php the_ID();?>"><i class="fa fa-play"></i></a></div> 
              <div class="posticon">
                <div class="time">
                 <h3><?php the_time('j'); ?></h3>
                 <h4><?php the_time('M'); ?></h4>
                </div>
                
              </div>
                  <?php
                  break;
                case 'gallery':
                  landmark_construction_theme_gallery('landmark_construction_theme-blog-single');?>
              <div class="posticon">
                <div class="time">
                 <h3><?php the_time('j'); ?></h3>
                 <h4><?php the_time('M'); ?></h4>
                </div>
                
              </div>
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
              <div class="posticon">
                <div class="time">
                 <h3><?php the_time('j'); ?></h3>
                 <h4><?php the_time('M'); ?></h4>
                </div>
                
              </div>
                 
                  <?php
                  break;
              }
            ?>
            </div>    
            
              <div class="blog-content">
                <h1 class="blog-title"><?php the_title(); ?></h1>
                <div class="blog-meta">
                 <div class="left">
                  <span class="admin"><?php echo esc_html($byadmin); ?> <?php the_author_posts_link(); ?></span>|
                  <span class="category"><?php echo esc_html($incategory); ?> <?php the_category( ', ' ); ?></span>
                 </div>
                 <div class="right">  
                   <span class="likes">
                  <?php if( function_exists('zilla_likes') ) { ?><span><?php zilla_likes(); ?></span><?php } ?> 
                     </span>
                   <span class="comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i><?php comments_number( '0 ', '1 ', '% '); ?></a></span>
                 </div>
                </div>
                <div class="blog-inner">
                  <?php the_content(); ?>
                  
                </div> 
                
              </div>
      <?php 
      if ( $landmark_construction_theme_options['blog_widget_list'][4] == 1 ) {
      ?>               
            <div class="single-blog-tags"><?php the_tags('<span>', '</span><span>', '</span>'); ?></div>
      <?php } ?>
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
      <?php 
      if ( $landmark_construction_theme_options['blog_widget_list'][2] == 1 ) {
      ?>      
      <div class="about-the-author">
        <div class="author-avatar">
        <?php echo get_avatar( get_the_author_meta('email') , 168 ); ?>
          <div class="about-author-social">
             
              <?php
                $authorFacebook = get_the_author_meta('facebook');
                  if( !empty($authorFacebook) ) {
                    ?><a href="<?php echo esc_url($authorFacebook); ?>" target="_blank"><div class="social-facebook"><i class="fa fa-facebook"></i></div></a>
                    <?php  
                  }
                  $authorTwitter = get_the_author_meta('twitter');
                  if( !empty($authorTwitter) ) {
                    ?><a href="<?php echo esc_url($authorTwitter); ?>" target="_blank"><div class="social-twitter"><i class="fa fa-twitter"></i></div></a> 
                    <?php  
                  }
                  $authorPinterest = get_the_author_meta('pinterest');
                  if( !empty($authorPinterest) ) {
                    ?><a href="<?php echo esc_url($authorPinterest); ?>" target="_blank"><div class="social-pinterest"><i class="fa fa-pinterest"></i></div></a>
                    <?php 
                  }
                  $authorGooglep = get_the_author_meta('googlep');
                  if( !empty($authorGooglep) ) {
                    ?><a href="<?php echo esc_url($authorGooglep); ?>" target="_blank"><div class="social-google-plus"><i class="fa fa-google-plus"></i></div></a><?php 
                  }
                  $authorDribbble = get_the_author_meta('dribbble');
                    if( !empty($authorDribbble) ) {
                    ?><a href="<?php echo esc_url($authorDribbble); ?>" target="_blank"><div class="social-dribbble"><i class="fa fa-dribbble"></i></div></a>
                    <?php  
                  }
                  ?>                   
          </div>
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
      
        //for use in the loop, list 5 post titles related to first tag on current post
        $tags = wp_get_post_tags($post->ID);
        if ($tags) {
          $first_tag = $tags[0]->term_id;
          $args=array(
          'tag__in' => array($first_tag),
          'post__not_in' => array($post->ID),
          'posts_per_page'=>10,
          'ignore_sticky_posts' => 1
        );
        $my_query = new WP_Query($args);
          ?><?php
          if( $my_query->have_posts() ) {
          ?>
          <div class="related-posts bt-related-1">
          <h6><?php echo esc_attr_e('Related Posts', 'landmark-construction-theme'); ?></h6>
          <div class="related-box">
          <?php  
            while ($my_query->have_posts()) : $my_query->the_post(); ?>            
              <div class="related-item">
              <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('landmark_construction_theme-blog_widget8');
              }
              ?> 
              <div class="recentpostinside"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><i class="fa fa-search fa-6"></i></a></div>             
              </div>      
            <?php
            endwhile;
            ?> 
            </div>
            <div class="clearfix"></div>
            </div>
          <?php  
          }
          wp_reset_postdata();
        }
        }
    ?>              

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
<?php
$landmark_construction_theme_options=landmark_construction_theme_get_defaults();
$comment = "Comment";
$comments = "Comments";
$likes = "Likes";
$byadmin = "Posted By:";
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
?>
<div class="col-sm-8 col-md-8 blog-wrapper single-blog-style7">
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
                <div class="icon"></div>
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
                <div class="icon"></div>
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
                <div class="icon"></div>
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
                <div class="icon"></div>
              </div>
                 
                  <?php
                  break;
              }
            ?>
            </div>    
               
              <div class="blog-content">
                <h1 class="blog-title"><?php the_title(); ?></h1>
                <div class="blog-meta">                      
                 
                  
                  <span class="comment"><a href="<?php comments_link(); ?>"><?php comments_number( '0 '.$comment, '1 '.$comment, '% '.$comments); ?></a>|</span>               
                  <?php if( function_exists('zilla_likes') ) { ?><span><?php zilla_likes(); ?> <?php echo esc_html($likes); ?></span><?php } ?>                
                </div>
                <div class="blog-inner">
                  <?php the_content(); ?>
                  
                </div> 
                
              </div>
      <?php 
      if ( isset($landmark_construction_theme_options['blog_widget_list'][4]) && $landmark_construction_theme_options['blog_widget_list'][4] == 1 ) {
      ?>               
            <div class="single-blog-tags"> <div class="admin"><?php echo get_avatar( get_the_author_meta('email') , 168 ); ?> <?php echo esc_html($byadmin); ?> <?php the_author_posts_link(); ?></div><div class="tags"><?php the_tags('<span>', '</span><span>', '</span>'); ?></div></div>
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
      
  </div>
  <div id="comment" class="comments-wrapper"><?php comments_template(); ?></div>
</div>

<?php get_sidebar(); ?>

<div class="clearfix"></div>
<?php
$readmore = "Read More";
$share = "Share";
$single_comment = "Comment";
$plural_comment = "Comments"; 
$by_translate = "BY";
$likes = "Likes";
landmark_construction_theme_get_defaults(); 

if ( !empty($landmark_construction_theme_options['translate_share'])) {
  $readmore = $landmark_construction_theme_options['translate_share'];
}
if ( !empty($landmark_construction_theme_options['translate_more'])) {
  $readmore = $landmark_construction_theme_options['translate_more'];
}
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

$blogid = get_option( 'page_for_posts' );
$sidebar_single_column = get_post_meta( $blogid, "_sidebar_column", true);
$sidebar_single_style = get_post_meta( $blogid, "_sidebar_style", true);
$content_class = "col-sm-12 col-md-12 blog-wrapper blog-style3"; 
if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
    $sidebar_single_column = get_post_meta( $blogid, "_sidebar_column", true);
    if ( $sidebar_single_column == "sidebar_4") {
      $content_class ="col-sm-8 col-md-8 blog-wrapper blog-style3";
      $sidebar_class ="col-sm-4 col-md-4";
    }
    else {
      $content_class ="col-sm-9 col-md-9 blog-wrapper blog-style3";
      $sidebar_class ="col-sm-9 col-md-3";      
    }
}
?>
<div class="<?php echo esc_attr($content_class); ?>">
    <div class="bt-blog-posts">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- Loop Start -->
            <article <?php post_class('post-item'); ?>>
            <?php 
            $format = get_post_format();
            if( !in_array($format, array('quote', 'link'))) { ?>               
            <div class="bt_thumbnail">
            <?php             
              switch ($format) {
                case 'audio':
                  if (has_post_thumbnail()) { the_post_thumbnail('landmark_construction_theme-blog_widget3'); }
                  ?>
                  <div class="bt_audio"><?php landmark_construction_theme_audio();?></div>
                  <?php
                  break;
                case 'video':
                  if (has_post_thumbnail()) { the_post_thumbnail('landmark_construction_theme-blog_widget3'); }
                  ?>
                <div id="prettyVideo-<?php the_ID();?>" class="bt_video hide"><?php landmark_construction_theme_video(); ?></div>
                <div class="bt-video-icon"><a class="prettyPhoto" data-rel="prettyPhoto" href="#prettyVideo-<?php the_ID();?>"><i class="fa fa-play"></i></a></div>                 
                  <?php
                  break;
                case 'gallery':
                  landmark_construction_theme_gallery('landmark_construction_theme-blog_widget3');
                  break;
                default:
                  if (has_post_thumbnail()) { 
                  ?><a class="prettyPhoto" data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
                  <?php
                    the_post_thumbnail('landmark_construction_theme-blog_widget3'); 
                  ?></a>                  
                  <?php
                  }
                  ?>                  
                  <?php
                  break;
              }
            ?>
                  <div class="overdate"><span class="dateonly-j"><?php the_time('j'); ?></span><span class="dateonly-m"><?php the_time('M'); ?></span></div>
            </div>
            <div class="bt_content">
              <h3 class="blog-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>                     
              <div class="blog-subtitle">
                <?php echo esc_html($by_translate); echo ' '; echo the_author_posts_link(); ?>
                <span class="bt_blog_title_sep"> | </span>
                <?php the_category('<span>,</span> '); ?>
              </div>
              <div class="blog-content">
                <?php echo '<p>' . wp_trim_words( get_the_content(), 36 ) . '</p>'; ?>
              </div>
            </div>
            <div class="bt_blog_widget_footer">
              <?php if( function_exists('zilla_likes') ) { ?><div class="blog-icon-box pull-left"><?php zilla_likes(); ?></div><?php } ?>
              <div class="blog-icon-box pull-left"><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></div>
              <div class="blog-icon-box pull-right"><a class="bt_blog_widget-more" href="<?php the_permalink(); ?>"><i class="fa fa-long-arrow-right"></i><?php echo esc_html($readmore); ?></a></div>
              <div class="clearfix"></div>
            </div>                   
            <?php }
            else {
                switch ($format) {
                    case 'quote':
                    ?>
                      <div class="bt_thumbnail">
                        <?php
                        if (has_post_thumbnail()) { 
                        ?><a class="prettyPhoto" data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
                        <?php
                          the_post_thumbnail('landmark_construction_theme-blog_widget3'); 
                        ?></a>
                        <?php
                        }
                        ?>                 
                      </div>
                      <div class="bt-blog-quote">
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_content(); ?></a>
                      <span class="bt-quote-title">&mdash; <?php the_title(); ?></span>
                      </div>
                      <div class="bt_blog_widget_footer">
                        <?php if( function_exists('zilla_likes') ) { ?><div class="blog-icon-box pull-left"><?php zilla_likes(); ?></div><?php } ?>
                        <div class="blog-icon-box pull-left"><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></div>
                        <div class="blog-icon-box pull-right"><a class="bt_blog_widget-more" href="<?php the_permalink(); ?>"><i class="fa fa-long-arrow-right"></i><?php echo esc_html($readmore); ?></a></div>
                        <div class="clearfix"></div>
                      </div>                      
                    <?php  
                      break;
                    case 'link':
                    ?>
                      <div class="bt_thumbnail">
                        <?php
                        if (has_post_thumbnail()) { 
                        ?><a class="prettyPhoto" data-rel="prettyPhoto" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
                        <?php
                          the_post_thumbnail('landmark_construction_theme-blog_widget3'); 
                        ?></a>
                        <?php
                        }
                        ?>                 
                      </div>
                      <div class="bt-blog-link">
                      <a href="<?php echo esc_url( landmark_construction_theme_get_link_url() ); ?>" target="_blank" class="bt-linkout"><?php the_title();?></a>
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_content(); ?></a>
                      </div>
                      <div class="bt_blog_widget_footer">
                        <?php if( function_exists('zilla_likes') ) { ?><div class="blog-icon-box pull-left"><?php zilla_likes(); ?></div><?php } ?>
                        <div class="blog-icon-box pull-left"><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></div>
                        <div class="blog-icon-box pull-right"><a class="bt_blog_widget-more" href="<?php the_permalink(); ?>"><i class="fa fa-long-arrow-right"></i><?php echo esc_html($readmore); ?></a></div>
                        <div class="clearfix"></div>
                      </div>                      
                    <?php
                      break;

                    default:
 
                      break;
                  }                  
            }
            ?>
            </article>
            
            <?php endwhile; else: ?>
            <p><?php echo esc_html_e('Sorry, no posts matched your criteria.', 'landmark-construction-theme');?></p>
            <?php endif; ?>
    </div>
    <div class="pagination-container">
        <div class="index-pagination">
            <?php   
              landmark_construction_theme_pagination(); 
            ?>
        </div>
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
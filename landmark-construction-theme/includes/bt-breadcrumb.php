<?php
function landmark_construction_theme_breadcrumb() {
  
  $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = __('Home', 'landmark-construction-theme'); // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show

  
  global $post;
  $homeLink =  home_url();
  
  if (is_home() || is_front_page()) {
  
    if ($showOnHome == 1) echo '<nav class="bt-breadcrumb"><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a><span class="bt-delimeter">&raquo;</span>Blog</nav>';
  
  }  

  else {
  
    echo '<nav class="bt-breadcrumb"><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a> <span class="bt-delimeter">&raquo;</span> ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' <span class="bt-delimeter">&raquo;</span> ');
      echo 'Archive by category "' . single_cat_title('', false) . '"';
  
    } elseif ( is_search() ) {
      echo 'Search results for "' . get_search_query() . '"';
  
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span class="bt-delimeter">&raquo;</span> ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> <span class="bt-delimeter">&raquo;</span> ';
      echo get_the_time('d');
  
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span class="bt-delimeter">&raquo;</span> ';
      echo get_the_time('F');
  
    } elseif ( is_year() ) {
      echo get_the_time('Y');
  
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . esc_url($homeLink) . '">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' <span class="bt-delimeter">&raquo;</span> ' . get_the_title();
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' <span class="bt-delimeter">&raquo;</span> ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo '' . $cats . '';
        if ($showCurrent == 1) echo get_the_title();
      }
  
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo esc_html($post_type->labels->singular_name);
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, '<span class="bt-delimeter">></span>') ) ? '' : $cat_parents;
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' <span class="bt-delimeter">&raquo;</span> ' . get_the_title();
  
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo get_the_title();
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo !empty($breadcrumbs[$i]);
        if ($i != count($breadcrumbs)-1) echo ' <span class="bt-delimeter">&raquo;</span> ';
      }
      if ($showCurrent == 1) echo ' <span class="bt-delimeter">&raquo;</span> ' . get_the_title();
  
    } elseif ( is_tag() ) {
      echo 'Posts tagged "' . single_tag_title('', false) . '"';
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo 'Articles posted by ' . $userdata->display_name;
  
    } elseif ( is_404() ) {
      echo 'Error 404';
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo esc_html__('Page', 'landmark-construction-theme') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
    echo '</nav>';
  
  }
} 
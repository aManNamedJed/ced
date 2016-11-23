<?php
//OptionTree Stuff
function landmark_construction_theme_themeoptions_setup() {
  global $landmark_construction_theme_options;
    
  $all_css = $overridecss = "";
  $header_style = "header-style1";
  if ( isset($landmark_construction_theme_options['header_style'])) {
  $header_style = $landmark_construction_theme_options['header_style'];
  }
  /* asset color */
      
  //
  // Body Back Image  
  //

  //
  // Loader
  //
  $preloader = "";
  if ( isset($landmark_construction_theme_options['loader_style'])) {
  $preloader = $landmark_construction_theme_options['loader_style'];
  }
  if ( $preloader != "" && $preloader != "bt_disable_loader" ) {
   $overridecss .=  ' ' . " #bliccaThemes-layout { opacity: 0; }";
  }  
  
  //
  // Header Codes
  // 

  if ( !empty($landmark_construction_theme_options['headerbg']['rgba'])) {
    $overridecss .=  ' ' . ".bliccaThemes-header { background: {$landmark_construction_theme_options['headerbg']['rgba']};}";
  }
  if ( !empty($landmark_construction_theme_options['stickybg']['rgba'])) {
    $overridecss .=  ' ' . ".bliccaThemes-header.on-sticky { background: {$landmark_construction_theme_options['stickybg']['rgba']};}";
  }

  $header_layout = "classic";
  
  if ( isset($landmark_construction_theme_options['header_layout']) ) {
    $header_layout = $landmark_construction_theme_options['header_layout'];
  }
  if ( $header_layout == "classic" ) { 
      if ( !empty($landmark_construction_theme_options['navbarbg']['rgba'])) {
        $overridecss .=  ' ' . ".{$header_style} .navbar-default { background: {$landmark_construction_theme_options['navbarbg']['rgba']};}";
      }
    
      if ( !empty($landmark_construction_theme_options['navbg']['rgba'])) {
        $overridecss .=  ' ' . ".navbar-default .navbar-collapse { background: {$landmark_construction_theme_options['navbg']['rgba']};}";
      }
    
      if ( !empty($landmark_construction_theme_options['btnavbar-border'])) {
        $overridecss .=  ' ' . ".{$header_style} .navbar-default { border-top: 1px solid {$landmark_construction_theme_options['btnavbar-border']};}";
      }
    
      if ( !empty($landmark_construction_theme_options['btnav-border'])) {
        $overridecss .=  ' ' . ".{$header_style} .nav { border-top: 1px solid {$landmark_construction_theme_options['btnav-border']};}";
      }    
  }
  
  else {
      if ( !empty($landmark_construction_theme_options['navbarbg']['rgba'])) {
        $overridecss .=  ' ' . ".navfull-logo-area, .bt-full-nav { background: {$landmark_construction_theme_options['navbarbg']['rgba']};}";
      }
    
      if ( !empty($landmark_construction_theme_options['navbg']['rgba'])) {
        $overridecss .=  ' ' . ".bt-full-nav { background: {$landmark_construction_theme_options['navbg']['rgba']};}";
      } 
    
      if ( !empty($landmark_construction_theme_options['navfullbg']['rgba']) ) {
        $overridecss .=  ' ' . ".{$header_style} .navbar-default .navbar-collapse { background: {$landmark_construction_theme_options['navfullbg']['rgba']}!important;}";
      }
      if ( !empty($landmark_construction_theme_options['btnavbar-border'])) {
        $overridecss .=  ' ' . ".{$header_style} .navfull-logo-area { border-top: 1px solid {$landmark_construction_theme_options['btnavbar-border']};}";
      }    
      if ( !empty($landmark_construction_theme_options['btnav-border'])) {
        $overridecss .=  ' ' . ".bt-full-nav { border-top: 1px solid {$landmark_construction_theme_options['btnav-border']};}";
      }
  }
  
  
  
  if ( !empty($landmark_construction_theme_options['nav-link-color']['regular'])) {
    $overridecss .=  ' ' . ".{$header_style} .nav>li>a { color: {$landmark_construction_theme_options['nav-link-color']['regular']};}";
  }

  if ( !empty($landmark_construction_theme_options['nav-link-color']['hover'])) {
    $overridecss .=  ' ' . ".{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:hover, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:hover, .{$header_style} .navbar-default .navbar-nav>li>a:hover { color: {$landmark_construction_theme_options['nav-link-color']['hover']};}";
  }
  
  if ( !empty($landmark_construction_theme_options['nav-link-color']['active'])) {
    $overridecss .=  ' ' . ".{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:focus, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-ancestor>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:focus, .{$header_style} .navbar-default .navbar-nav>li>a:focus { color: {$landmark_construction_theme_options['nav-link-color']['active']};}";
  }

  if ( !empty($landmark_construction_theme_options['sticky-nav-link-color']['regular'])) {
    $overridecss .=  ' ' . ".{$header_style}.on-sticky .nav>li>a { color: {$landmark_construction_theme_options['sticky-nav-link-color']['regular']};}";
  }

  if ( !empty($landmark_construction_theme_options['sticky-nav-link-color']['hover'])) {
    $overridecss .=  ' ' . ".{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-item>a:hover, .{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:hover, .{$header_style}.on-sticky .navbar-default .navbar-nav>li>a:hover { color: {$landmark_construction_theme_options['sticky-nav-link-color']['hover']};}";
  }
  
  if ( !empty($landmark_construction_theme_options['sticky-nav-link-color']['active'])) {
    $overridecss .=  ' ' . ".{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-item>a, .{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-item>a:focus, .{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-parent>a, .{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-ancestor>a, .{$header_style}.on-sticky .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:focus, .{$header_style}.on-sticky .navbar-default .navbar-nav>li>a:focus { color: {$landmark_construction_theme_options['sticky-nav-link-color']['active']};}";
  }  
  
  if ( !empty($landmark_construction_theme_options['nav-link-bg'])) {
    $overridecss .=  ' ' . ".{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:focus, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:focus, .{$header_style} .navbar-default .navbar-nav>li>a:focus { background: {$landmark_construction_theme_options['nav-link-bg']};}";
  }

  if ( !empty($landmark_construction_theme_options['nav-link-bg-hover'])) {
    $overridecss .=  ' ' . ".{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:hover, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:focus, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:hover, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:focus, 
  .{$header_style} .navbar-default .navbar-nav>li>a:hover, 
  .{$header_style} .navbar-default .navbar-nav>li>a:focus { background: {$landmark_construction_theme_options['nav-link-bg-hover']};}";
  }

  if ( !empty($landmark_construction_theme_options['nav-link-border'])) {
    $overridecss .=  ' ' . ".{$header_style} .nav>li>a { border-color: {$landmark_construction_theme_options['nav-link-border']};}";
  }
  if ( !empty($landmark_construction_theme_options['nav-link-border-active'])) {
    $overridecss .=  ' ' . ".{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:focus, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-ancestor>a, .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:focus, .{$header_style} .navbar-default .navbar-nav>li>a:focus { border-color: {$landmark_construction_theme_options['nav-link-border-active']};}";
  }
  if ( !empty($landmark_construction_theme_options['nav-link-border-hover'])) {
    $overridecss .=  ' ' . "
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:hover, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-item>a:focus, 
  
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:hover, 
  .{$header_style} .navbar-default .navbar-nav>.firstitem.current-menu-parent>a:focus, 
  .{$header_style} .navbar-default .navbar-nav>li>a:hover, 
  .{$header_style} .navbar-default .navbar-nav>li>a:focus { border-color: {$landmark_construction_theme_options['nav-link-border-hover']};}";
  }

  if ( !empty($landmark_construction_theme_options['menu-icon-link-color'])) {
    $overridecss .=  ' ' . ".menu-item-icon { color: {$landmark_construction_theme_options['menu-icon-link-color']};}";
  }
  
  if ( !empty($landmark_construction_theme_options['menu-icon-margin'])) {
    $overridecss .=  ' ' . ".menu-item-icon { margin-right: {$landmark_construction_theme_options['menu-icon-margin']}px;}";
  }  
  
  
  
  /* top section */
  if ( !empty($landmark_construction_theme_options['top_section_height'])) {
    $overridecss .=  ' ' . ".top-section-table { height: {$landmark_construction_theme_options['top_section_height']}px;}";
  }
  if ( !empty($landmark_construction_theme_options['topsectionbg']['rgba'])) {
    $overridecss .=  ' ' . ".topsection { background: {$landmark_construction_theme_options['topsectionbg']['rgba']};}";
  }

 
  /* header social color settings */
  if ( !empty($landmark_construction_theme_options['social_widget_size'])) {
    $overridecss .= ' ' . ".header-social a div { font-size: {$landmark_construction_theme_options['social_widget_size']}px;}"; 
  }   
  if ( !empty($landmark_construction_theme_options['social_widget_height'])) {
    $overridecss .= ' ' . ".header-social a div { height: {$landmark_construction_theme_options['social_widget_height']}px;line-height:{$landmark_construction_theme_options['social_widget_height']}px;}"; 
  }
  if ( !empty($landmark_construction_theme_options['social_widget_width'])) {
    $overridecss .= ' ' . ".header-social a div { width: {$landmark_construction_theme_options['social_widget_width']}px;}"; 
  }  
  if ( !empty($landmark_construction_theme_options['social_widget_link_color']['regular'])) { 
    $overridecss .= ' ' . ".header-social a div { color: {$landmark_construction_theme_options['social_widget_link_color']['regular']};}";
  }
  if ( !empty($landmark_construction_theme_options['social_widget_link_color']['hover'])) { 
    $overridecss .= ' ' . ".header-social a div:hover { color: {$landmark_construction_theme_options['social_widget_link_color']['hover']};}";
  }
  if ( !empty($landmark_construction_theme_options['social_widget_link_color']['active'])) { 
    $overridecss .= ' ' . ".header-social a div { color: {$landmark_construction_theme_options['social_widget_link_color']['active']};}";
  }
  if ( !empty($landmark_construction_theme_options['social_widget_background'])) { 
    $overridecss .= ' ' . ".header-social a div { background: {$landmark_construction_theme_options['social_widget_background']};}";
  }
  if ( !empty($landmark_construction_theme_options['social_widget_background_hover'])) { 
    $overridecss .= ' ' . ".header-social a div:hover { background: {$landmark_construction_theme_options['social_widget_background_hover']};}";
  }
  if ( !empty($landmark_construction_theme_options['social_widget_border_color'])) { 
    $overridecss .= ' ' . ".header-social a div { border-color: {$landmark_construction_theme_options['social_widget_border_color']};}";
  }
  if ( !empty($landmark_construction_theme_options['social_widget_border_color_hover'])) { 
    $overridecss .= ' ' . ".header-social a div:hover { border-color: {$landmark_construction_theme_options['social_widget_border_color_hover']};}";
  }
  
  /* header search icon */
  if ( !empty($landmark_construction_theme_options['search_icon_color']['regular'])) { 
    $overridecss .= ' ' . ".bliccaThemes-header-search i { color: {$landmark_construction_theme_options['search_icon_color']['regular']};}";
  }
  if ( !empty($landmark_construction_theme_options['search_icon_color']['hover'])) { 
    $overridecss .= ' ' . ".bliccaThemes-header-search:hover i { color: {$landmark_construction_theme_options['search_icon_color']['hover']};}";
  }


  if ( !empty($landmark_construction_theme_options['search_icon_background'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search { background-color: {$landmark_construction_theme_options['search_icon_background']};}";
  }
  
  if ( !empty($landmark_construction_theme_options['search_icon_background_hover'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search:hover { background-color: {$landmark_construction_theme_options['search_icon_background_hover']};}";
  } 

  if ( !empty($landmark_construction_theme_options['search_icon_border'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search { border-color: {$landmark_construction_theme_options['search_icon_border']};}";
  } 

  if ( !empty($landmark_construction_theme_options['search_icon_border_on_hover'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search:hover { border-color: {$landmark_construction_theme_options['search_icon_border_on_hover']};}";
  } 


  if ( !empty($landmark_construction_theme_options['search_icon_font_size'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search { font-size: {$landmark_construction_theme_options['search_icon_font_size']}px;}";
  }   
  if ( !empty($landmark_construction_theme_options['search_icon_width'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search.search-circle-bg { width: {$landmark_construction_theme_options['search_icon_width']}px;}";
  } 

  if ( !empty($landmark_construction_theme_options['search_icon_height'])) { 
    $overridecss .=  ' ' . ".bliccaThemes-header-search.search-circle-bg { height: {$landmark_construction_theme_options['search_icon_height']}px; line-height: {$landmark_construction_theme_options['search_icon_height']}px;}";
  }     
  /* cart font size */

  if ( !empty($landmark_construction_theme_options['cart_text_font_size'])) { 
    $overridecss .=  ' ' . ".bt-cart-header { font-size: {$landmark_construction_theme_options['cart_text_font_size']}px;}";
  }  
  
  if ( !empty($landmark_construction_theme_options['cart_text_width'])) { 
    $overridecss .=  ' ' . ".bt-cart-header { min-width: {$landmark_construction_theme_options['cart_text_width']}px!important;}";
  } 

  if ( !empty($landmark_construction_theme_options['cart_text_height'])) { 
    $overridecss .=  ' ' . ".bt-cart-header { height: {$landmark_construction_theme_options['cart_text_height']}px!important; line-height:{$landmark_construction_theme_options['cart_text_height']}px !important; }";
  }    
  //
  // Dropdown Settings
  //
  if ( !empty($landmark_construction_theme_options['dropdown_link_color']['regular'])) {
    $overridecss .=  ' ' . ".dropdown-menu>li>a { color: {$landmark_construction_theme_options['dropdown_link_color']['regular']};}";
  }

  if ( !empty($landmark_construction_theme_options['dropdown_link_color']['hover'])) {
    $overridecss .=  ' ' . ".dropdown-menu>li>a:hover { color: {$landmark_construction_theme_options['dropdown_link_color']['hover']};}";
  }
  
  if ( !empty($landmark_construction_theme_options['dropdown_link_color']['active'])) {
    $overridecss .=  ' ' . ".dropdown-menu>li>a:active, .dropdown-menu>li>a:focus { color: {$landmark_construction_theme_options['dropdown_link_color']['active']};}";
  }  

  if ( !empty($landmark_construction_theme_options['dropdown_link_bg'])) { 
    $overridecss .=  ' ' . ".navbar-nav>li>.dropdown-menu { background-color: {$landmark_construction_theme_options['dropdown_link_bg']};}";
  } 

  if ( !empty($landmark_construction_theme_options['dropdown_link_bg_hover'])) { 
    $overridecss .=  ' ' . ".dropdown-menu>li>a:hover:hover { background-color: {$landmark_construction_theme_options['dropdown_link_bg_hover']};}";
  } 
  
  if ( !empty($landmark_construction_theme_options['dropdown_border_color'])) { 
    $overridecss .=  ' ' . ".navbar-nav>li>.dropdown-menu { border-color: {$landmark_construction_theme_options['dropdown_border_color']};}";
  }  

  if ( !empty($landmark_construction_theme_options['dropdown_top_border_color'])) { 
    $overridecss .=  ' ' . ".navbar-nav>li>.dropdown-menu { border-top-color: {$landmark_construction_theme_options['dropdown_top_border_color']};}";
  }

  if ( !empty($landmark_construction_theme_options['dropdown_icon_color'])) { 
    $overridecss .=  ' ' . ".dropdown-menu>li>a .menu-item-icon { color: {$landmark_construction_theme_options['dropdown_icon_color']};}";
  }  
  //
  // Mega Menu Settings
  //
  
  if ( !empty($landmark_construction_theme_options['mega_menu_link_color']['regular'])) {
    $overridecss .=  ' ' . ".multi .dropdown-menu li>ul>li>a { color: {$landmark_construction_theme_options['mega_menu_link_color']['regular']};}";
  }

  if ( !empty($landmark_construction_theme_options['mega_menu_link_color']['hover'])) {
    $overridecss .=  ' ' . ".multi .dropdown-menu li>ul>li>a:hover { color: {$landmark_construction_theme_options['mega_menu_link_color']['hover']};}";
  }
  
  if ( !empty($landmark_construction_theme_options['mega_menu_link_color']['active'])) {
    $overridecss .=  ' ' . ".multi .dropdown-menu li>ul>li>a:active { color: {$landmark_construction_theme_options['mega_menu_link_color']['active']};}";
  }  

  if ( !empty($landmark_construction_theme_options['mega_menu_link_bg'])) { 
    $overridecss .=  ' ' . ".multi .dropdown-menu li>ul>li>a { background-color: {$landmark_construction_theme_options['mega_menu_link_bg']};}";
  } 

  if ( !empty($landmark_construction_theme_options['mega_menu_link_bg_hover'])) { 
    $overridecss .=  ' ' . ".multi .dropdown-menu li>ul>li>a:hover { background-color: {$landmark_construction_theme_options['mega_menu_link_bg_hover']};}";
  } 
  
  if ( !empty($landmark_construction_theme_options['mega_title_color'])) { 
    $overridecss .=  ' ' . ".multi .dropdown-menu>li>a { color: {$landmark_construction_theme_options['mega_title_color']};}";
  }  

  if ( !empty($landmark_construction_theme_options['mega_title_bg'])) { 
    $overridecss .=  ' ' . ".multi .dropdown-menu>li>a { background-color: {$landmark_construction_theme_options['mega_title_bg']};}";
  }

  if ( !empty($landmark_construction_theme_options['mega_menu_border_color'])) { 
    $overridecss .=  ' ' . ".multi.dropdown > ul > li { border-color: {$landmark_construction_theme_options['mega_menu_border_color']};}";
  }

  if ( !empty($landmark_construction_theme_options['mega_menu_icon_color'])) { 
    $overridecss .=  ' ' . ".multi .menu-item-icon { color: {$landmark_construction_theme_options['mega_menu_icon_color']};}";
  }   
  
  /* Caption */
  
  if ( !empty($landmark_construction_theme_options['caption_height'])) {
    $overridecss .=  ' ' . ".caption { height: {$landmark_construction_theme_options['caption_height']}px !important;}";
  }
  //
  // Blog Page
  //
  if ( !empty($landmark_construction_theme_options['blog_bg'])) { 
    $overridecss .=  ' ' . ".blog .blog-style { background: {$landmark_construction_theme_options['blog_bg']};}";
  }
  if ( !empty($landmark_construction_theme_options['blog_single_bg'])) { 
    $overridecss .=  ' ' . ".single .blog-style { background: {$landmark_construction_theme_options['blog_single_bg']};}";
  }  
  //
  // Fonts
  //

  // 
  // Footer Code
  //

 
  global $post;
  $r = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'footers') );
  if ($r->have_posts()) :
  while ( $r->have_posts() ) : $r->the_post();
  $footer_id = $post->ID;
  $shortcodes_custom_css = get_post_meta( $footer_id, '_wpb_shortcodes_custom_css', true );
  if ( ! empty( $shortcodes_custom_css ) ) {
  $overridecss = $overridecss . ' ' . $shortcodes_custom_css; 
  }
  endwhile; 
  endif;
  wp_reset_postdata(); 

  // 
  // Sidebar Code
  //


  global $post;
  $r = new WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'sidebars') );
  if ($r->have_posts()) :
  while ( $r->have_posts() ) : $r->the_post();
  $sidebar_id = $post->ID;
  $shortcodes_custom_css = get_post_meta( $sidebar_id, '_wpb_shortcodes_custom_css', true );
  if ( ! empty( $shortcodes_custom_css ) ) {
  $overridecss = $overridecss . ' ' . $shortcodes_custom_css; 
  }
  endwhile; 
  endif;
  wp_reset_postdata();
  
  //
  // 404 Page
  // 
  
  if ( isset($landmark_construction_theme_options['error_page_id'])) {
    $error_page_id =  $landmark_construction_theme_options['error_page_id'];
    $shortcodes_custom_css = get_post_meta( $error_page_id, '_wpb_shortcodes_custom_css', true );
    if ( ! empty( $shortcodes_custom_css ) ) {
    $overridecss = $overridecss . ' ' . $shortcodes_custom_css; 
    }    
  }
  //
  // Miscellaneous
  //
  
  //
  // Don't write anything below, just write above
  //
  if ( !empty($landmark_construction_theme_options['custom_css']) ) {
  $overridecss =  $overridecss . ' ' . "{$landmark_construction_theme_options['custom_css']}";
  }
  
  $all_css = $overridecss;


  define('landmark_construction_theme_custom', $all_css);
  function landmark_construction_theme_user_style() {
    wp_add_inline_style( 'custom_style', landmark_construction_theme_custom);
  }
  add_action('wp_enqueue_scripts', 'landmark_construction_theme_user_style', 21);


  /***********************/
  /* Register Custom CSS */
  /***********************/
  function landmark_construction_theme_style() {
      wp_enqueue_style( 
              'custom_style',
              get_template_directory_uri() . '/css/options.css' 
      );
      
      
  }
  
  add_action( 'wp_enqueue_scripts', 'landmark_construction_theme_style', 20 );  
}
add_action( 'after_setup_theme', 'landmark_construction_theme_themeoptions_setup' );
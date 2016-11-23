<?php
    landmark_construction_theme_get_defaults();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php 
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
     if ( isset($landmark_construction_theme_options['favicon_upload']['url'])) {
     $favicon_upload = $landmark_construction_theme_options['favicon_upload']['url'];   
     if (!empty($favicon_upload)){?>
        <link rel="shortcut icon" href="<?php echo esc_url($favicon_upload); ?>" />
     <?php 
     }
     }
    }
    wp_head();   
    ?>
  </head>
  <?php

  $header_style = landmark_construction_get_theme_options('header_style', 'header-style8', 'false');  
  $header_layout = landmark_construction_get_theme_options('header_layout', 'classic', 'false');  
  
  if ( $header_layout != "classic" ) {
   $header_style .= " header-navfull-style"; 
  }

  $boxed = landmark_construction_get_theme_options('boxed', '0', 'Yes');

  $landmark_construction_theme_options['enable_minimal'][1] = landmark_construction_get_theme_options('enable_minimal', '0', 'check');
 
  ?>
  <body <?php body_class(); ?>>

    <div id="bliccaThemes-layout">
    <?php 
    
    if ( $boxed == 1 ) {
    ?><div class="bliccaThemesBox"><?php
    }
		?>     
    <!-- Top Section -->
    <!-- Header -->

    <?php 
    if ( $landmark_construction_theme_options['enable_minimal'][1] != 1 ) { 
    ?>
    <header id="landmark_construction_theme_header" class="bliccaThemes-header header-<?php echo esc_attr($header_layout); ?> <?php echo esc_attr($header_style);?> off-sticky">
			<?php 
						get_template_part( 'includes/header/bt-header', $header_layout ); 
			?>	  
    </header>
    <?php
    }
    ?>
    <?php 
    if ( $landmark_construction_theme_options['enable_minimal'][1] == 1 ) { 
    ?>    
    <header id ="landmark_construction_theme_header" class="bliccaThemes-header header-minimal off-sticky">
      <?php 
            get_template_part( 'includes/header/bt-header', 'minimal' ); 
      ?>      
    </header>
    <?php
    }
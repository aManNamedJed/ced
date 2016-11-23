<?php
  landmark_construction_theme_get_defaults();
  $logo_upload = $header_logo_sticky = $logo_texty = "";
  $logo_upload = landmark_construction_get_theme_options('header_logo', 'empty', 'url');
  $header_logo_sticky = landmark_construction_get_theme_options('header_logo_sticky', 'empty', 'url');
  if ( empty($header_logo_sticky) ) {
    $header_logo_sticky = $logo_upload;
  }

  $logo_texty = landmark_construction_get_theme_options('logo_text', 'empty', 'false');
?>
<div class="minimal-menu-container"><div class="minimal-menu-scroll">
  <div class="container"><div class="row"><div class="col-md-8 col-md-offset-4">
	<div class="minimal-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text">
            <?php if (!empty($logo_texty)) {
                echo esc_html($logo_texty);
            }              
            elseif (!empty($logo_upload)) { ?>
                      <img src="<?php echo esc_url($logo_upload);?>" alt="<?php bloginfo('name'); ?>" class="logo" />
                      <img src="<?php echo esc_url($header_logo_sticky);?>" alt="<?php bloginfo('name'); ?>" class="stickylogo" /> 
            <?php } ?>
        </a> 
    </div>	
    <div class="minimal-menu-button">
    	<i class="fa fa-bars"></i>
    	<i class="fa fa-times"></i>
    </div>
		<div class="clearfix"></div>
    <div class="minimal-menu">
        <?php if(has_nav_menu('main_menu')) { 
            wp_nav_menu(
                array(
                    'theme_location'        => 'main_menu',
                    'container'             => '',
                    'container_class'       => false,
                    'menu_class'            => 'nav navbar-nav',
                    'fallback_cb'           => 'primary_menu_fallback'
                ));
            } else { ?>
                <ul class="nav navbar-nav">
                     <li><a href="<?php echo esc_url(get_admin_url()).'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
                </ul>
            <?php } ?>
    </div>
  
    </div></div></div>
</div></div>
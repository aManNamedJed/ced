<?php
  landmark_construction_theme_get_defaults();
  $logo_upload = $header_logo_sticky = $logo_texty = "";
  $logo_upload = landmark_construction_get_theme_options('header_logo', 'empty', 'url');
  $header_logo_sticky = landmark_construction_get_theme_options('header_logo_sticky', 'empty', 'url');
  if ( empty($header_logo_sticky) ) {
    $header_logo_sticky = $logo_upload;
  }

  $logo_texty = landmark_construction_get_theme_options('logo_text', 'empty', 'false');
  $enable_topsection = landmark_construction_get_theme_options('enable_topsection', '0', 'Yes');
  $topsection_layout = landmark_construction_get_theme_options('topsection_layout', '0', 'false');
   
if ( $enable_topsection == 1) { ?>
  <div class="topsection topsection-<?php echo esc_attr($topsection_layout); ?>">    
      <div class="container"><div class="row"><div class="col-md-12">
          <div class="topsection-left-area">
              <?php
              $layout = landmark_construction_get_theme_options('bt_topsection_left', '0', 'multi');         
              if ($layout): foreach ($layout as $key=>$value) {
                if ($key != "placebo") {
                 get_template_part( 'includes/header/widgets/bt-header-widget', $key );
                 }
              }              
              endif;
              ?>
          </div>
          <?php if ( $topsection_layout != "centered" ) { ?>
          <div class="topsection-right-area">
              <?php
              $layout = landmark_construction_get_theme_options('bt_topsection_right','0','multi');         
              if ($layout): foreach ($layout as $key=>$value) {
                if ($key != "placebo") {
                 get_template_part( 'includes/header/widgets/bt-header-widget', $key );
                 }
              }              
              endif;
              ?>
          </div>
          <?php } ?>
          <div class="clearfix"></div>
      </div></div></div>
  </div>
<?php 
}
?>


          <!-- Main Menu -->
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="navfull-logo-area">

            <div class="center-logo-area">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text">
                    <?php if (!empty($logo_texty)) {
                      echo esc_html($logo_texty);
                    }              
                    elseif (!empty($logo_upload)) { ?>
                      <img src="<?php echo esc_url($logo_upload);?>" alt="<?php bloginfo('name'); ?>" class="logo" />
                      <img src="<?php echo esc_url($header_logo_sticky);?>" alt="<?php bloginfo('name'); ?>" class="stickylogo" />
                    <?php } ?>
              </a>
              <div class="responsive-navigation-button">
                 <i class="fa fa-bars"></i>
              </div>              
            </div>
            <div class="bt-after-logo">
                  <?php
                    $layout = landmark_construction_get_theme_options('bt_logo_right', '0', 'multi');         
                    if ($layout): foreach ($layout as $key=>$value) {
                      if ($key != "placebo") {
                       get_template_part( 'includes/header/widgets/bt-header-widget', $key );
                       }
                    }              
                    endif;
                  ?>             
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
  </div>

  
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="container"><div class="row"><div class="col-md-12">
                  <div class="bt-full-nav">                 
                  <?php if(has_nav_menu('main_menu')) { 
                        wp_nav_menu(
                          array(
                              'theme_location'        => 'main_menu',
                              'container'             => '',
                              'container_class'       => false,
                              'menu_class'            => 'nav navbar-nav',
                              'fallback_cb'           => 'primary_menu_fallback',
                              'walker'                => new landmark_construction_theme_walker_main_menu2()
                          ));
                  } else { ?>
                     <ul class="nav navbar-nav">
                     <li><a href="<?php echo esc_url(get_admin_url()).'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
                     </ul>
                  <?php } ?>
                  <div class="bt-after-navigation">
                  <?php
                    $layout = landmark_construction_get_theme_options('bt_after_navigation', '0', 'multi');
                    if ($layout): foreach ($layout as $key=>$value) {
                      if ($key != "placebo") {
                       get_template_part( 'includes/header/widgets/bt-header-widget', $key );
                       }
                    }              
                    endif;
                  ?>
                  </div>
                  </div>                   
                </div></div></div>
            </div><!-- /.navbar-collapse -->
          
          </nav>
            <nav class="responsive-menu-container">
              <div class="responsive-menu">
                <?php if(has_nav_menu('main_menu')) { 
                    wp_nav_menu(
                        array(
                            'theme_location'        => 'main_menu',
                            'container'             => '',
                            'container_class'       => false,
                            'menu_class'            => 'mobile-navigation',
                            'fallback_cb'           => 'primary_menu_fallback',
                            'link_after'            => '<span class="dropdown-icon"><i class="fa fa-plus"></i></span>'
                        ));
                    } else { ?>
                        <ul class="nav navbar-nav">
                             <li><a href="<?php echo esc_url(get_admin_url()).'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </nav>              
          <div class="clearfix"></div>

<?php
/***************************/
/*      FRAMEWORK          */
/***************************/


include (get_template_directory() . '/includes/page_metaboxes.php');
require_once( get_template_directory() . '/includes/ReduxFramework.config.php' );

/******************/
/*Register Scripts*/
/******************/
if (!function_exists('landmark_construction_theme_script')) {
	function landmark_construction_theme_script() {
	    
	    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
        wp_register_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array( 'jquery' ), '', false );  
	    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );   
	    wp_register_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '', true);
	    wp_register_script( 'landmark-construction-theme-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '', true);
	    wp_register_script( 'landmark-construction-theme-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);

        wp_enqueue_script('pace');
	    wp_enqueue_script('bootstrap');
	    wp_enqueue_script('imagesloaded');
	    wp_enqueue_script('landmark-construction-theme-plugins'); 
	    wp_enqueue_script('landmark-construction-theme-main-js');

	    }
	add_action( "wp_enqueue_scripts", "landmark_construction_theme_script" );
}

/***********************/
/*    Register  CSS    */
/***********************/
if (!function_exists('landmark_construction_theme_styles')) {
	function landmark_construction_theme_styles($theme_options) {
	    wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css');
	    wp_register_style('font-awesome', get_template_directory_uri(). '/css/font-awesome.min.css');  
	    wp_register_style('prettyPhoto', get_template_directory_uri(). '/css/prettyPhoto.css');
	    wp_register_style('landmark-construction-theme-main-css', get_template_directory_uri(). '/css/main.css');
	    wp_register_style('landmark-construction-theme-animate', get_template_directory_uri(). '/css/animate.css');
	    wp_enqueue_style('bootstrap');
	    wp_enqueue_style('font-awesome');
	    wp_enqueue_style('prettyPhoto');  
	    wp_enqueue_style('landmark-construction-theme-main-css');
	    wp_enqueue_style('landmark-construction-theme-animate');        
	}
	add_action('wp_enqueue_scripts', 'landmark_construction_theme_styles');
}
/***********************/
/* Register Style CSS  */
/***********************/
if (!function_exists('landmark_construction_theme_child')) {
	function landmark_construction_theme_child() {
	    wp_register_style('child', get_stylesheet_uri() );
	    wp_enqueue_style('child');
	}
	add_action('wp_enqueue_scripts', 'landmark_construction_theme_child', 22);
}
/******************/
/* Register Fonts */
/******************/
function landmark_construction_theme_theme_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'landmark-construction-theme' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Poppins:400,300,500,600,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;
}

/*
Enqueue scripts and styles.
*/
function landmark_construction_theme_theme_fonts() {
    wp_enqueue_style( 'bliccaThemes-fonts', landmark_construction_theme_theme_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'landmark_construction_theme_theme_fonts' );
/***********************/
/*     Admin Files     */
/***********************/ 
function landmark_construction_theme_wp_admin_files() {
        wp_register_style( 'landmark-construction-theme-wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'landmark-construction-theme-wp_admin_css' );
        wp_register_script( 'landmark-construction-theme-wp_admin_js', get_template_directory_uri() . '/js/admin-script.js');	          
	    wp_enqueue_script('landmark-construction-theme-wp_admin_js');
	    global $pagenow;
        if ($pagenow == 'nav-menus.php') {	    
		wp_enqueue_media();
		wp_enqueue_script('wp-color-picker');
    	wp_enqueue_style('wp-color-picker');	 
    	}            
}
add_action( 'admin_enqueue_scripts', 'landmark_construction_theme_wp_admin_files' );

/********************/
/* Content Width    */
/*******************/   
if ( ! isset( $content_width ) ) $content_width = 1140;

/*****************/
/*** Thumbnail ***/
/*****************/
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 870, 522, true );
  add_image_size( 'landmark_construction_theme-blog-single', 870, 384, true);
  add_image_size( 'landmark_construction_theme-blog_widget1', 770, 440, true );
  add_image_size( 'landmark_construction_theme-blog_widget3', 770, 490, true );
  add_image_size( 'landmark_construction_theme-blog_widget5', 540, 400, true );
  add_image_size( 'landmark_construction_theme-blog_widget6', 480, 416, true );
  add_image_size( 'landmark_construction_theme-blog_widget8', 270, 384, true );
  add_image_size( 'landmark_construction_theme-blog_widget9', 330, 558, true );
  add_image_size( 'landmark_construction_theme-blog_widget10', 528, 534, true );
  add_image_size( 'landmark_construction_theme-portfolio_size1', 584, 528, true);
  add_image_size( 'landmark_construction_theme-portfolio_size2', 540, 528, true);
  add_image_size( 'landmark_construction_theme-portfolio_size4', 480, 550, true);
  add_image_size( 'landmark_construction_theme-portfolio_size8', 740, 528, true);
  add_image_size( 'landmark_construction_theme-portfolio_size16', 520, 336, true);
  add_image_size( 'landmark_construction_theme-masonry1', 582, 396, true);
  add_image_size( 'landmark_construction_theme-masonry2', 576, 390, true);
  add_image_size( 'landmark_construction_theme-masonry3', 480, 660, true);
  add_theme_support( 'automatic-feed-links' );
}
/*****************/
/*  WP Title     */
/*****************/

add_theme_support( "title-tag" );
if ( ! function_exists( '_wp_render_title_tag' ) ) {
    function landmark_construction_theme_render_title() {
?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'landmark_construction_theme_render_title' );
}
/******************************/
/* Multiple Image for Gallery */
/*****************************/

if (class_exists('MultiPostThumbnails')) {
$types = array('post');
 foreach($types as $type) {
new MultiPostThumbnails(array(
'label' => 'Secondary Image',
'id' => 'secondary-image',
'post_type' => $type
 ) );

new MultiPostThumbnails(array(
'label' => 'Third Image',
'id' => 'third-image',
'post_type' => $type
 ) );

new MultiPostThumbnails(array(
'label' => 'Fourth Image',
'id' => 'fourth-image',
'post_type' => $type
 ) );

new MultiPostThumbnails(array(
'label' => 'Fifth Image',
'id' => 'fifth-image',
'post_type' => $type
 ) );

new MultiPostThumbnails(array(
'label' => 'Sixth Image',
'id' => 'last-image',
'post_type' => $type
 ) );
 }
}


/*************************/
/*   landmark Theme Options  */
/*************************/
if (!function_exists('landmark_construction_theme_get_defaults')) {
function landmark_construction_theme_get_defaults() {  
global $landmark_construction_theme_options;
return $landmark_construction_theme_options;
}  
}  

if (!function_exists('landmark_construction_get_theme_options')) {
function landmark_construction_get_theme_options($var_name, $default_val, $type) {
	global $landmark_construction_theme_options;
	if ( $type == "false" ) {
		if ( isset($landmark_construction_theme_options[$var_name]) ){
			return $landmark_construction_theme_options[$var_name];
		}
		else {
			if ( $default_val == "empty") {
				return "";
			}
			else {
			return $default_val;
			}
		}
	}
	if ( $type == "check") {
		if ( isset($landmark_construction_theme_options[$var_name][1]) ) {
			return $landmark_construction_theme_options[$var_name][1];
		}
		else {
			if ( $default_val == "empty") {
				return "";
			}
			else {
			return $default_val;
			}
		}		
	}

	if ( $type == "url") {

		if ( isset($landmark_construction_theme_options[$var_name]['url']) ) {
			return $landmark_construction_theme_options[$var_name]['url'];
		}
		else {
			if ( $default_val == "empty") {
				return "";
			}
			else {
			return $default_val;
			}
		}		
	}

	if ( $type == "multi" ) {
		return $landmark_construction_theme_options[$var_name]['enabled'];
	}
	if ( $type == "Yes" ) {
  		if ( isset($landmark_construction_theme_options[$var_name]['Yes'])) { 			
		return $landmark_construction_theme_options[$var_name]['Yes'];
		}
		else {
		return $default_val;
		}
	}	
}
}

/*************************/
/*   landmark Body Classes   */
/*************************/
if (!function_exists('landmark_construction_theme_body_classes')) {
function landmark_construction_theme_body_classes($classes) {
  global $landmark_construction_theme_options;

  $smoothscroll =  $landmark_construction_theme_options['disable_smooth_scroll']['1'];
  if ( $smoothscroll == 1 ) {
  $classes[] = "enable_smoothscroll";  
  }
  else { 
  $classes[] = "disable_smoothscroll";   
  }

  $fixed_header = $landmark_construction_theme_options['enable_transparent']['1'];
  if ( $fixed_header == 1) {
  $classes[] = "enable_fixhead";
  }

  $disable_sticky = $landmark_construction_theme_options['disable_sticky']['1'];
  if ( $disable_sticky == 1) {
  $classes[] = "enable_sticky";
  }
  else {
  $classes[] = "disable_sticky"; 
  }

  $preloader = $landmark_construction_theme_options['loader_style'];
  if ( $preloader != "" ) {
  $classes[] = ' '.$preloader;
  }

	return $classes;
}
add_filter( 'body_class', 'landmark_construction_theme_body_classes' );
}
/*************************/
/* Thumbnail need these */
/************************/
include ( get_template_directory() . '/includes/function-vt-resize.php');

/**********************/
/*** Custom Post Type */
/**********************/
include (get_template_directory() . '/includes/custom-post-type.php');

/**************************/
/*** Blog intro length ***/
/*************************/

if (!function_exists('landmark_construction_theme_custom_excerpt_length')) {
	
	function landmark_construction_theme_custom_excerpt_length( $length ) {
		global $landmark_construction_theme_options;

		if(isset($landmark_construction_theme_options['user_excerpt_length']) && $landmark_construction_theme_options['user_excerpt_length'] != 60 ){
			 return $landmark_construction_theme_options['user_excerpt_length'];
		} else {
			return 60;
		}
	}

	add_filter( 'excerpt_length', 'landmark_construction_theme_custom_excerpt_length', 999 );
}
/************************/
/* Dynamic CSS */
/************************/

  include (get_template_directory() . '/css/options.php');
  
/*********************/
/* Load Text Domain */
/*********************/
add_action('after_setup_theme', 'landmark_construction_theme_lang_text_setup');
function landmark_construction_theme_lang_text_setup(){
load_theme_textdomain('landmark-construction-theme', get_template_directory().'/languages');
}
/**************************/
/*    Include Plugins     */
/**************************/
 
require_once get_template_directory() . "/plugins/install.php";

/**********************/
/*---Register Menus---*/
/*********************/
if ( !function_exists('landmark_construction_theme_register_my_menus')) {
	function landmark_construction_theme_register_my_menus() {
	register_nav_menus(
	array(
	'main_menu' => 'Main Menu'
	)
	);
	}
	add_action( 'init', 'landmark_construction_theme_register_my_menus' );
}
/*********************************/
/* Register Walker for Main Menu */
/*********************************/
class landmark_construction_theme_sweet_custom_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'landmark_construction_theme_scm_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'landmark_construction_theme_scm_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'landmark_construction_theme_scm_edit_walker'), 10, 2 );

	} // end constructor
	
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function landmark_construction_theme_scm_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->extra_class = get_post_meta( $menu_item->ID, '_menu_item_extra_class', true );
        $menu_item->mega_menu_style = get_post_meta( $menu_item->ID, '_menu_item_mega_menu_style', true);
        $menu_item->widgetized_menu_area = get_post_meta( $menu_item->ID, '_menu_item_widgetized_menu_area',true);
	    $menu_item->add_mega_menu = get_post_meta( $menu_item->ID, '_menu_item_add_mega_menu', true );
	    $menu_item->bt_use_icon = get_post_meta( $menu_item->ID, '_menu_item_bt_use_icon', true );
	    $menu_item->mega_menu_background_position = get_post_meta( $menu_item->ID, '_menu_item_mega_menu_background_position', true );
	    $menu_item->mega_menu_background_repeat = get_post_meta( $menu_item->ID, '_menu_item_mega_menu_background_repeat', true );
	    $menu_item->mega_menu_background_image = get_post_meta( $menu_item->ID, '_menu_item_mega_menu_background_image', true );
	    $menu_item->mega_menu_background_color = get_post_meta( $menu_item->ID, '_menu_item_mega_menu_background_color', true );
	    $menu_item->mega_padding_bottom = get_post_meta( $menu_item->ID, '_menu_item_mega_padding_bottom', true );
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function landmark_construction_theme_scm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent  
		if ( !isset($_REQUEST['menu-item-extra_class'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-extra_class'][$menu_item_db_id] = '';
			}
			$extra_class_value = $_REQUEST['menu-item-extra_class'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_extra_class', $extra_class_value );
 
	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-mega_menu_style'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-mega_menu_style'][$menu_item_db_id] = '';
		}
			$mega_menu_style_value = $_REQUEST['menu-item-mega_menu_style'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_style', $mega_menu_style_value );	 	    
	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-widgetized_menu_area'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-widgetized_menu_area'][$menu_item_db_id] = '';
		}
			$widgetized_menu_area_value = $_REQUEST['menu-item-widgetized_menu_area'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_widgetized_menu_area', $widgetized_menu_area_value );	        
	    // Check if element is properly sent  
		if ( !isset($_REQUEST['menu-item-add_mega_menu'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-add_mega_menu'][$menu_item_db_id] = '';
			}
			$add_mega_menu_value = $_REQUEST['menu-item-add_mega_menu'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_add_mega_menu', $add_mega_menu_value );
    
	    // Check if element is properly sent
	    if ( isset( $_REQUEST['menu-item-bt_use_icon'] ) && is_array( $_REQUEST['menu-item-bt_use_icon']) ) {
	        $bt_use_icon_value = $_REQUEST['menu-item-bt_use_icon'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_bt_use_icon', $bt_use_icon_value );
	    }

	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-mega_menu_style'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-mega_menu_style'][$menu_item_db_id] = '';
		}
			$mega_menu_style_value = $_REQUEST['menu-item-mega_menu_style'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_style', $mega_menu_style_value );	 
	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-mega_menu_background_color'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-mega_menu_background_color'][$menu_item_db_id] = '';
		}
			$mega_menu_background_color_value = $_REQUEST['menu-item-mega_menu_background_color'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_background_color', $mega_menu_background_color_value );
	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-mega_menu_background_image'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-mega_menu_background_image'][$menu_item_db_id] = '';
		}
			$mega_menu_background_image_value = $_REQUEST['menu-item-mega_menu_background_image'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_background_image', $mega_menu_background_image_value );	 
	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-mega_menu_background_repeat'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-mega_menu_background_repeat'][$menu_item_db_id] = '';
		}
			$mega_menu_background_repeat_value = $_REQUEST['menu-item-mega_menu_background_repeat'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_background_repeat', $mega_menu_background_repeat_value );	 
	    // Check if element is properly sent

		if ( !isset($_REQUEST['menu-item-mega_menu_background_position'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-mega_menu_background_position'][$menu_item_db_id] = '';
		}
			$mega_menu_background_position_value = $_REQUEST['menu-item-mega_menu_background_position'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_mega_menu_background_position', $mega_menu_background_position_value );
	    // Check if element is properly sent
	    if ( isset( $_REQUEST['menu-item-mega_padding_bottom'] ) && is_array( $_REQUEST['menu-item-mega_padding_bottom']) ) {
	        $mega_padding_bottom_value = $_REQUEST['menu-item-mega_padding_bottom'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_mega_padding_bottom', $mega_padding_bottom_value );
	    }				 										 				    	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function landmark_construction_theme_scm_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}
// instantiate plugin's class
$GLOBALS['sweet_custom_menu'] = new landmark_construction_theme_sweet_custom_menu();
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {	
	}
	
	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
	}
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $_wp_nav_menu_max_depth;
	   
	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
	
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	    ob_start();
	    $item_id = esc_attr( $item->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );
	
	    $original_title = '';
	    if ( 'taxonomy' == $item->type ) {
	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $item->type ) {
	        $original_object = get_post( $item->object_id );
	        $original_title = $original_object->post_title;
	    }
	
	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $item->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );
	
	    $title = $item->title;
	
	    if ( ! empty( $item->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        /* translators: %s: title of menu item which is invalid */
	        $title = sprintf( '%s (Invalid)', $item->title );
	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
	        $classes[] = 'pending';
	        /* translators: %s: title of menu item in draft status */
	        $title = sprintf( '%s (Pending)', $item->title );
	    }
	
	    $title = empty( $item->label ) ? $title : $item->label;
	
	    ?>
	    <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'landmark-construction-theme'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'landmark-construction-theme'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'landmark-construction-theme'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
	                    ?>"><?php _e( 'Edit Menu Item', 'landmark-construction-theme' ); ?></a>
	                </span>
	            </dt>
	        </dl>
	
	        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
	            <?php if( 'custom' == $item->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
	                        <?php _e( 'URL', 'landmark-construction-theme' ); ?><br />
	                        <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Navigation Label', 'landmark-construction-theme'  ); ?><br />
	                    <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Title Attribute', 'landmark-construction-theme'  ); ?><br />
	                    <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	                </label>
	            </p>
	            <p class="field-link-target description">
	                <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
	                    <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
	                    <?php _e( 'Open link in a new window/tab', 'landmark-construction-theme'  ); ?>
	                </label>
	            </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'CSS Classes (optional)', 'landmark-construction-theme' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Link Relationship (XFN)', 'landmark-construction-theme' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Description', 'landmark-construction-theme' ); ?><br />
	                    <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
	                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'landmark-construction-theme'); ?></span>
	                </label><br />
	            </p>        
	            <?php
	            /* New fields insertion starts here */
	            ?>
              <?php
              /* Mega Menu */
              ?>
              
	            <p class="field-custom mega_menu_select">
                  
                  <?php _e( 'Mega Menu', 'landmark-construction-theme' ); ?><br />
	                <label class="mega-menu-check" for="edit-menu-item-extra_class-<?php echo esc_attr($item_id); ?>">
	                    
	                    <input type="checkbox" id="edit-menu-item-extra_class-<?php echo esc_attr($item_id); ?>" value="multi" name="menu-item-extra_class[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->extra_class, 'multi' ); ?>/>
                      <?php _e( 'Make this item\'s child element mega menu. Please read documentation for more information.', 'landmark-construction-theme'  ); ?>
	                </label>
	            </p>
            <div class="mega-menu-all-container">
 				<p class="field-custom mega_menu_style"> 
                 <?php _e( 'Mega Menu Column', 'landmark-construction-theme' ); ?><br />
                 <label for="edit-menu-item-mega_menu_style-<?php echo esc_attr($item_id); ?>">
            		 <select name="menu-item-mega_menu_style[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-mega_menu_style-<?php echo esc_attr($item_id); ?>" class="widefat">
                      <option value="choose" <?php selected( $item->mega_menu_style, 'choose' ); ?>><?php echo esc_html__("Choose Style", "landmark-construction-theme"); ?></option>
                      <option value="mega_style_4" <?php selected( $item->mega_menu_style, 'mega_style_4' ); ?>><?php echo esc_html__("4 column", "landmark-construction-theme"); ?></option>
                      <option value="mega_style_3" <?php selected( $item->mega_menu_style, 'mega_style_3' ); ?>><?php echo esc_html__("3 column", "landmark-construction-theme"); ?></option>
                      <option value="mega_style_32" <?php selected( $item->mega_menu_style, 'mega_style_32' ); ?>><?php echo esc_html__("3 column 2", "landmark-construction-theme"); ?></option>
                 </select>
                 </label>
                </p>
              <div class="bt_mega_settings_container">
	              <p class="field-custom mega_menu_background_color">
					<label for="edit-menu-item-mega_menu_background_color-<?php echo esc_attr($item_id); ?>">
					<?php _e( 'Mega Menu Background Color', 'landmark-construction-theme' ); ?>
					<br>
					<input class="mega_menu_background_color colorpicker" type="text" id="edit-menu-item-mega_menu_background_color-<?php echo esc_attr($item_id); ?>" name="menu-item-mega_menu_background_color[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->mega_menu_background_color ); ?>" data-default-color="#ffffff"/>
					</label>
	              </p>
	              <p class="field-custom mega_menu_background_image">
	                <?php _e( 'Upload an image for background', "landmark-construction-theme");
	                    if ( $item->mega_menu_background_image != '' ) :
	                        echo '<img class="bt_mega_image_preview custom_media_image-'.($item_id).'" src="'.esc_attr( $item->mega_menu_background_image ).'"/><br />';
	                    endif;
	                ?>
	        
	                <input type="text" class="widefat mega_menu_background_image-<?php echo esc_attr($item_id); ?>" name="mega-menu-bg-admin-en menu-item-mega_menu_background_image[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-mega_menu_background_image-<?php echo esc_attr($item_id); ?>" value="<?php echo esc_attr( $item->mega_menu_background_image ); ?>">
	        
	                <input type="button" data-fieldid="<?php echo esc_attr($item_id); ?>" class="button button-primary custom_media_button" name="edit-menu-item-mega_menu_background_image-<?php echo esc_attr($item_id); ?>_button" id="edit-menu-item-mega_menu_background_image-<?php echo esc_attr($item_id); ?>_button" value="Upload Image" />
              
	              </p>
	              <p class="field-custom mega_menu_background_repeat">
                     <?php _e( 'Background Repeat', 'landmark-construction-theme' ); ?><br />
                     <label for="edit-menu-item-mega_menu_background_repeat-<?php echo esc_attr($item_id); ?>">
            		 <select name="menu-item-mega_menu_background_repeat[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-mega_menu_background_repeat-<?php echo esc_attr($item_id); ?>" class="widefat">
                      <option value="no-repeat" <?php selected( $item->mega_menu_background_repeat, 'no-repeat' ); ?>><?php echo esc_html__("No Repeat", "landmark-construction-theme"); ?></option>
                      <option value="repeat-x" <?php selected( $item->mega_menu_background_repeat, 'repeat-x' ); ?>><?php echo esc_html__("Repeat X", "landmark-construction-theme"); ?></option>
                      <option value="repeat-y" <?php selected( $item->mega_menu_background_repeat, 'repeat-y' ); ?>><?php echo esc_html__("Repeat Y", "landmark-construction-theme"); ?></option>
                      <option value="repeat" <?php selected( $item->mega_menu_background_repeat, 'repeat' ); ?>><?php echo esc_html__("Repeat", "landmark-construction-theme"); ?></option>
                 	  </select>
                      </label>  
	              </p>
	              <p class="field-custom mega_menu_background_position">
                     <?php _e( 'Background Position', 'landmark-construction-theme' ); ?><br />
                     <label for="edit-menu-item-mega_menu_background_position-<?php echo esc_attr($item_id); ?>">
            		 <select name="menu-item-mega_menu_background_position[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-mega_menu_background_position-<?php echo esc_attr($item_id); ?>" class="widefat">
                      <option value="left top" <?php selected( $item->mega_menu_background_position, 'left top' ); ?>><?php echo esc_html__("Left Top", "landmark-construction-theme"); ?></option>
                      <option value="left center" <?php selected( $item->mega_menu_background_position, 'left center' ); ?>><?php echo esc_html__("Left Center", "landmark-construction-theme"); ?></option>
                      <option value="left bottom" <?php selected( $item->mega_menu_background_position, 'left bottom' ); ?>><?php echo esc_html__("Left Bottom", "landmark-construction-theme"); ?></option>
                      <option value="right top" <?php selected( $item->mega_menu_background_position, 'right top' ); ?>><?php echo esc_html__("Right Top", "landmark-construction-theme"); ?></option>
                      <option value="right center" <?php selected( $item->mega_menu_background_position, 'right center' ); ?>><?php echo esc_html__("Right Center", "landmark-construction-theme"); ?></option>
                      <option value="right bottom" <?php selected( $item->mega_menu_background_position, 'right bottom' ); ?>><?php echo esc_html__("Right Bottom", "landmark-construction-theme"); ?></option>
                      <option value="center top" <?php selected( $item->mega_menu_background_position, 'center top' ); ?>><?php echo esc_html__("Center Top", "landmark-construction-theme"); ?></option>
                      <option value="center center" <?php selected( $item->mega_menu_background_position, 'center center' ); ?>><?php echo esc_html__("Center Center", "landmark-construction-theme"); ?></option>
                      <option value="center bottom" <?php selected( $item->mega_menu_background_position, 'center bottom' ); ?>><?php echo esc_html__("Center Bottom", "landmark-construction-theme"); ?></option>                      
                 	  </select>
                      </label> 
	              </p>
	          </div>                

	            <p class="field-custom mega_padding_bottom">
	                <label for="edit-menu-item-mega_padding_bottom-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Padding-Bottom Value for Mega Menu, dont add px etc. Write a number', 'landmark-construction-theme' ); ?><br />
	                    <input type="text" id="edit-menu-item-mega_padding_bottom-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-mega_padding_bottom" name="menu-item-mega_padding_bottom[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->mega_padding_bottom ); ?>" />
	                </label>
	            </p>
              </div>
             			  <p class="field-custom widgetized_menu_area"> 
                 <?php _e( 'Use Widget in Mega Menu', 'landmark-construction-theme' ); ?><br />
                 <label for="edit-menu-item-widgetized_menu_area-<?php echo esc_attr($item_id); ?>">
            		 <select name="menu-item-widgetized_menu_area[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-widgetized_menu_area-<?php echo esc_attr($item_id); ?>" class="widefat">
                      <option value="choose" <?php selected( $item->widgetized_menu_area, 'choose' ); ?>><?php echo esc_html__("Choose Widget Area", "landmark-construction-theme");?></option>
                      <option value="bliccathemes-header-widget-1" <?php selected( $item->widgetized_menu_area, 'bliccathemes-header-widget-1' ); ?>><?php echo esc_html__("Header Widget 1", "landmark-construction-theme"); ?></option>
                      <option value="bliccathemes-header-widget-2" <?php selected( $item->widgetized_menu_area, 'bliccathemes-header-widget-2' ); ?>><?php echo esc_html__("Header Widget 2", "landmark-construction-theme"); ?></option>
                      <option value="bliccathemes-header-widget-3" <?php selected( $item->widgetized_menu_area, 'bliccathemes-header-widget-3' ); ?>><?php echo esc_html__("Header Widget 3", "landmark-construction-theme"); ?></option>
                      <option value="bliccathemes-header-widget-4" <?php selected( $item->widgetized_menu_area, 'bliccathemes-header-widget-4' ); ?>><?php echo esc_html__("Header Widget 4", "landmark-construction-theme"); ?></option>
                      <option value="bliccathemes-header-widget-5" <?php selected( $item->widgetized_menu_area, 'bliccathemes-header-widget-5' ); ?>><?php echo esc_html__("Header Widget 5", "landmark-construction-theme"); ?></option>
                 </select>
                 </label>
              </p>
	            <p class="field-custom add_mega_menu">
                  <?php _e( 'Add Icon', 'landmark-construction-theme'); ?><br />
	                <label for="edit-menu-item-add_mega_menu-<?php echo esc_attr($item_id); ?>">
	                    <input class="bt-menu-icon-check" data-icon-check="bt-menu-item-id<?php echo esc_attr($item_id);?>" type="checkbox" id="edit-menu-item-add_mega_menu-<?php echo esc_attr($item_id); ?>" value="bt_show_icon" name="menu-item-add_mega_menu[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->add_mega_menu, 'bt_show_icon' ); ?> />
	                    <?php _e( 'Do you want to add icon to menu label', 'landmark-construction-theme'  ); ?>
	                </label>
	            </p>
			      <?php
			      $icons = array('fa-500px', 'fa-adjust', 'fa-adn', 'fa-align-center', 'fa-align-justify', 'fa-align-left', 'fa-align-right', 'fa-amazon', 'fa-ambulance', 'fa-anchor', 'fa-android', 'fa-angellist', 'fa-angle-double-down', 'fa-angle-double-left', 'fa-angle-double-right', 'fa-angle-double-up', 'fa-angle-down', 'fa-angle-left', 'fa-angle-right', 'fa-angle-up', 'fa-apple', 'fa-archive', 'fa-area-chart', 'fa-arrow-circle-down', 'fa-arrow-circle-left', 'fa-arrow-circle-o-down', 'fa-arrow-circle-o-left', 'fa-arrow-circle-o-right', 'fa-arrow-circle-o-up', 'fa-arrow-circle-right', 'fa-arrow-circle-up', 'fa-arrow-down', 'fa-arrow-left', 'fa-arrow-right', 'fa-arrow-up', 'fa-arrows', 'fa-arrows-alt', 'fa-arrows-h', 'fa-arrows-v', 'fa-asterisk', 'fa-at', 'fa-automobile', 'fa-backward', 'fa-balance-scale', 'fa-ban', 'fa-bank', 'fa-bar-chart', 'fa-bar-chart-o', 'fa-barcode', 'fa-bars', 'fa-battery-0', 'fa-battery-1', 'fa-battery-2', 'fa-battery-3', 'fa-battery-4', 'fa-battery-empty', 'fa-battery-full', 'fa-battery-half', 'fa-battery-quarter', 'fa-battery-three-quarters', 'fa-bed', 'fa-beer', 'fa-behance', 'fa-behance-square', 'fa-bell', 'fa-bell-o', 'fa-bell-slash', 'fa-bell-slash-o', 'fa-bicycle', 'fa-binoculars', 'fa-birthday-cake', 'fa-bitbucket', 'fa-bitbucket-square', 'fa-bitcoin', 'fa-black-tie', 'fa-bold', 'fa-bolt', 'fa-bomb', 'fa-book', 'fa-bookmark', 'fa-bookmark-o', 'fa-briefcase', 'fa-btc', 'fa-bug', 'fa-building', 'fa-building-o', 'fa-bullhorn', 'fa-bullseye', 'fa-bus', 'fa-buysellads', 'fa-cab', 'fa-calculator', 'fa-calendar', 'fa-calendar-check-o', 'fa-calendar-minus-o', 'fa-calendar-o', 'fa-calendar-plus-o', 'fa-calendar-times-o', 'fa-camera', 'fa-camera-retro', 'fa-car', 'fa-caret-down', 'fa-caret-left', 'fa-caret-right', 'fa-caret-square-o-down', 'fa-caret-square-o-left', 'fa-caret-square-o-right', 'fa-caret-square-o-up', 'fa-caret-up', 'fa-cart-arrow-down', 'fa-cart-plus', 'fa-cc', 'fa-cc-amex', 'fa-cc-diners-club', 'fa-cc-discover', 'fa-cc-jcb', 'fa-cc-mastercard', 'fa-cc-paypal', 'fa-cc-stripe', 'fa-cc-visa', 'fa-certificate', 'fa-chain', 'fa-chain-broken', 'fa-check', 'fa-check-circle', 'fa-check-circle-o', 'fa-check-square', 'fa-check-square-o', 'fa-chevron-circle-down', 'fa-chevron-circle-left', 'fa-chevron-circle-right', 'fa-chevron-circle-up', 'fa-chevron-down', 'fa-chevron-left', 'fa-chevron-right', 'fa-chevron-up', 'fa-child', 'fa-chrome', 'fa-circle', 'fa-circle-o', 'fa-circle-o-notch', 'fa-circle-thin', 'fa-clipboard', 'fa-clock-o', 'fa-clone', 'fa-close', 'fa-cloud', 'fa-cloud-download', 'fa-cloud-upload', 'fa-cny', 'fa-code', 'fa-code-fork', 'fa-codepen', 'fa-coffee', 'fa-cog', 'fa-cogs', 'fa-columns', 'fa-comment', 'fa-comment-o', 'fa-commenting', 'fa-commenting-o', 'fa-comments', 'fa-comments-o', 'fa-compass', 'fa-compress', 'fa-connectdevelop', 'fa-contao', 'fa-copy', 'fa-copyright', 'fa-creative-commons', 'fa-credit-card', 'fa-crop', 'fa-crosshairs', 'fa-css3', 'fa-cube', 'fa-cubes', 'fa-cut', 'fa-cutlery', 'fa-dashboard', 'fa-dashcube', 'fa-database', 'fa-dedent', 'fa-delicious', 'fa-desktop', 'fa-deviantart', 'fa-diamond', 'fa-digg', 'fa-dollar', 'fa-dot-circle-o', 'fa-download', 'fa-dribbble', 'fa-dropbox', 'fa-drupal', 'fa-edit', 'fa-eject', 'fa-ellipsis-h', 'fa-ellipsis-v', 'fa-empire', 'fa-envelope', 'fa-envelope-o', 'fa-envelope-square', 'fa-eraser', 'fa-eur', 'fa-euro', 'fa-exchange', 'fa-exclamation', 'fa-exclamation-circle', 'fa-exclamation-triangle', 'fa-expand', 'fa-expeditedssl', 'fa-external-link', 'fa-external-link-square', 'fa-eye', 'fa-eye-slash', 'fa-eyedropper', 'fa-facebook', 'fa-facebook-f', 'fa-facebook-official', 'fa-facebook-square', 'fa-fast-backward', 'fa-fast-forward', 'fa-fax', 'fa-feed', 'fa-female', 'fa-fighter-jet', 'fa-file', 'fa-file-archive-o', 'fa-file-audio-o', 'fa-file-code-o', 'fa-file-excel-o', 'fa-file-image-o', 'fa-file-movie-o', 'fa-file-o', 'fa-file-pdf-o', 'fa-file-photo-o', 'fa-file-picture-o', 'fa-file-powerpoint-o', 'fa-file-sound-o', 'fa-file-text', 'fa-file-text-o', 'fa-file-video-o', 'fa-file-word-o', 'fa-file-zip-o', 'fa-files-o', 'fa-film', 'fa-filter', 'fa-fire', 'fa-fire-extinguisher', 'fa-firefox', 'fa-flag', 'fa-flag-checkered', 'fa-flag-o', 'fa-flash', 'fa-flask', 'fa-flickr', 'fa-floppy-o', 'fa-folder', 'fa-folder-o', 'fa-folder-open', 'fa-folder-open-o', 'fa-font', 'fa-fonticons', 'fa-forumbee', 'fa-forward', 'fa-foursquare', 'fa-frown-o', 'fa-futbol-o', 'fa-gamepad', 'fa-gavel', 'fa-gbp', 'fa-ge', 'fa-gear', 'fa-gears', 'fa-genderless', 'fa-get-pocket', 'fa-gg', 'fa-gg-circle', 'fa-gift', 'fa-git', 'fa-git-square', 'fa-github', 'fa-github-alt', 'fa-github-square', 'fa-gittip', 'fa-glass', 'fa-globe', 'fa-google', 'fa-google-plus', 'fa-google-plus-square', 'fa-google-wallet', 'fa-graduation-cap', 'fa-gratipay', 'fa-group', 'fa-h-square', 'fa-hacker-news', 'fa-hand-grab-o', 'fa-hand-lizard-o', 'fa-hand-o-down', 'fa-hand-o-left', 'fa-hand-o-right', 'fa-hand-o-up', 'fa-hand-paper-o', 'fa-hand-peace-o', 'fa-hand-pointer-o', 'fa-hand-rock-o', 'fa-hand-scissors-o', 'fa-hand-spock-o', 'fa-hand-stop-o', 'fa-hdd-o', 'fa-header', 'fa-headphones', 'fa-heart', 'fa-heart-o', 'fa-heartbeat', 'fa-history', 'fa-home', 'fa-hospital-o', 'fa-hotel', 'fa-hourglass', 'fa-hourglass-1', 'fa-hourglass-2', 'fa-hourglass-3', 'fa-hourglass-end', 'fa-hourglass-half', 'fa-hourglass-o', 'fa-hourglass-start', 'fa-houzz', 'fa-html5', 'fa-i-cursor', 'fa-ils', 'fa-image', 'fa-inbox', 'fa-indent', 'fa-industry', 'fa-info', 'fa-info-circle', 'fa-inr', 'fa-instagram', 'fa-institution', 'fa-internet-explorer', 'fa-intersex', 'fa-ioxhost', 'fa-italic', 'fa-joomla', 'fa-jpy', 'fa-jsfiddle', 'fa-key', 'fa-keyboard-o', 'fa-krw', 'fa-language', 'fa-laptop', 'fa-lastfm', 'fa-lastfm-square', 'fa-leaf', 'fa-leanpub', 'fa-legal', 'fa-lemon-o', 'fa-level-down', 'fa-level-up', 'fa-life-bouy', 'fa-life-buoy', 'fa-life-ring', 'fa-life-saver', 'fa-lightbulb-o', 'fa-line-chart', 'fa-link', 'fa-linkedin', 'fa-linkedin-square', 'fa-linux', 'fa-list', 'fa-list-alt', 'fa-list-ol', 'fa-list-ul', 'fa-location-arrow', 'fa-lock', 'fa-long-arrow-down', 'fa-long-arrow-left', 'fa-long-arrow-right', 'fa-long-arrow-up', 'fa-magic', 'fa-magnet', 'fa-mail-forward', 'fa-mail-reply', 'fa-mail-reply-all', 'fa-male', 'fa-map', 'fa-map-marker', 'fa-map-o', 'fa-map-pin', 'fa-map-signs', 'fa-mars', 'fa-mars-double', 'fa-mars-stroke', 'fa-mars-stroke-h', 'fa-mars-stroke-v', 'fa-maxcdn', 'fa-meanpath', 'fa-medium', 'fa-medkit', 'fa-meh-o', 'fa-mercury', 'fa-microphone', 'fa-microphone-slash', 'fa-minus', 'fa-minus-circle', 'fa-minus-square', 'fa-minus-square-o', 'fa-mobile', 'fa-mobile-phone', 'fa-money', 'fa-moon-o', 'fa-mortar-board', 'fa-motorcycle', 'fa-mouse-pointer', 'fa-music', 'fa-navicon', 'fa-neuter', 'fa-newspaper-o', 'fa-object-group', 'fa-object-ungroup', 'fa-odnoklassniki', 'fa-odnoklassniki-square', 'fa-opencart', 'fa-openid', 'fa-opera', 'fa-optin-monster', 'fa-outdent', 'fa-pagelines', 'fa-paint-brush', 'fa-paper-plane', 'fa-paper-plane-o', 'fa-paperclip', 'fa-paragraph', 'fa-paste', 'fa-pause', 'fa-paw', 'fa-paypal', 'fa-pencil', 'fa-pencil-square', 'fa-pencil-square-o', 'fa-phone', 'fa-phone-square', 'fa-photo', 'fa-picture-o', 'fa-pie-chart', 'fa-pied-piper', 'fa-pied-piper-alt', 'fa-pinterest', 'fa-pinterest-p', 'fa-pinterest-square', 'fa-plane', 'fa-play', 'fa-play-circle', 'fa-play-circle-o', 'fa-plug', 'fa-plus', 'fa-plus-circle', 'fa-plus-square', 'fa-plus-square-o', 'fa-power-off', 'fa-print', 'fa-puzzle-piece', 'fa-qq', 'fa-qrcode', 'fa-question', 'fa-question-circle', 'fa-quote-left', 'fa-quote-right', 'fa-ra', 'fa-random', 'fa-rebel', 'fa-recycle', 'fa-reddit', 'fa-reddit-square', 'fa-refresh', 'fa-registered', 'fa-remove', 'fa-renren', 'fa-reorder', 'fa-repeat', 'fa-reply', 'fa-reply-all', 'fa-retweet', 'fa-rmb', 'fa-road', 'fa-rocket', 'fa-rotate-left', 'fa-rotate-right', 'fa-rouble', 'fa-rss', 'fa-rss-square', 'fa-rub', 'fa-ruble', 'fa-rupee', 'fa-safari', 'fa-save', 'fa-scissors', 'fa-search', 'fa-search-minus', 'fa-search-plus', 'fa-sellsy', 'fa-send', 'fa-send-o', 'fa-server', 'fa-share', 'fa-share-alt', 'fa-share-alt-square', 'fa-share-square', 'fa-share-square-o', 'fa-shekel', 'fa-sheqel', 'fa-shield', 'fa-ship', 'fa-shirtsinbulk', 'fa-shopping-cart', 'fa-sign-in', 'fa-sign-out', 'fa-signal', 'fa-simplybuilt', 'fa-sitemap', 'fa-skyatlas', 'fa-skype', 'fa-slack', 'fa-sliders', 'fa-slideshare', 'fa-smile-o', 'fa-soccer-ball-o', 'fa-sort', 'fa-sort-alpha-asc', 'fa-sort-alpha-desc', 'fa-sort-amount-asc', 'fa-sort-amount-desc', 'fa-sort-asc', 'fa-sort-desc', 'fa-sort-down', 'fa-sort-numeric-asc', 'fa-sort-numeric-desc', 'fa-sort-up', 'fa-soundcloud', 'fa-space-shuttle', 'fa-spinner', 'fa-spoon', 'fa-spotify', 'fa-square', 'fa-square-o', 'fa-stack-exchange', 'fa-stack-overflow', 'fa-star', 'fa-star-half', 'fa-star-half-empty', 'fa-star-half-full', 'fa-star-half-o', 'fa-star-o', 'fa-steam', 'fa-steam-square', 'fa-step-backward', 'fa-step-forward', 'fa-stethoscope', 'fa-sticky-note', 'fa-sticky-note-o', 'fa-stop', 'fa-street-view', 'fa-strikethrough', 'fa-stumbleupon', 'fa-stumbleupon-circle', 'fa-subscript', 'fa-subway', 'fa-suitcase', 'fa-sun-o', 'fa-superscript', 'fa-support', 'fa-table', 'fa-tablet', 'fa-tachometer', 'fa-tag', 'fa-tags', 'fa-tasks', 'fa-taxi', 'fa-television', 'fa-tencent-weibo', 'fa-terminal', 'fa-text-height', 'fa-text-width', 'fa-th', 'fa-th-large', 'fa-th-list', 'fa-thumb-tack', 'fa-thumbs-down', 'fa-thumbs-o-down', 'fa-thumbs-o-up', 'fa-thumbs-up', 'fa-ticket', 'fa-times', 'fa-times-circle', 'fa-times-circle-o', 'fa-tint', 'fa-toggle-down', 'fa-toggle-left', 'fa-toggle-off', 'fa-toggle-on', 'fa-toggle-right', 'fa-toggle-up', 'fa-trademark', 'fa-train', 'fa-transgender', 'fa-transgender-alt', 'fa-trash', 'fa-trash-o', 'fa-tree', 'fa-trello', 'fa-tripadvisor', 'fa-trophy', 'fa-truck', 'fa-try', 'fa-tty', 'fa-tumblr', 'fa-tumblr-square', 'fa-turkish-lira', 'fa-tv', 'fa-twitch', 'fa-twitter', 'fa-twitter-square', 'fa-umbrella', 'fa-underline', 'fa-undo', 'fa-university', 'fa-unlink', 'fa-unlock', 'fa-unlock-alt', 'fa-unsorted', 'fa-upload', 'fa-usd', 'fa-user', 'fa-user-md', 'fa-user-plus', 'fa-user-secret', 'fa-user-times', 'fa-users', 'fa-venus', 'fa-venus-double', 'fa-venus-mars', 'fa-viacoin', 'fa-video-camera', 'fa-vimeo', 'fa-vimeo-square', 'fa-vine', 'fa-vk', 'fa-volume-down', 'fa-volume-off', 'fa-volume-up', 'fa-warning', 'fa-wechat', 'fa-weibo', 'fa-weixin', 'fa-whatsapp', 'fa-wheelchair', 'fa-wifi', 'fa-wikipedia-w', 'fa-windows', 'fa-won', 'fa-wordpress', 'fa-wrench', 'fa-xing', 'fa-xing-square', 'fa-y-combinator', 'fa-y-combinator-square', 'fa-yahoo', 'fa-yc', 'fa-yc-square', 'fa-yelp', 'fa-yen', 'fa-youtube', 'fa-youtube-play', 'fa-youtube-square');    
			      ?>
			      <?php 
			      if ( $item->bt_use_icon == "" ) {
			      	$tempvalue = "fa-500px";
			      }
			      else {
			      	$tempvalue = $item->bt_use_icon;
			      }
			      ?>
			      
            <div class="bt-icon-settings-content<?php if (empty($item->add_mega_menu)) { echo ' bt-icon-set-hide'; } ?> bt-menu-item-id<?php echo esc_attr($item_id); ?>">
              <label for="edit-menu-item-bt_use_icon-<?php echo esc_attr($item_id); ?>">
			      <?php _e( 'Choose Icon', 'landmark-construction-theme' ); ?><br />
      			  <input type="hidden" name="menu-item-bt_use_icon[<?php echo esc_attr($item_id); ?>]" class="bt_use_icons bt_use_icon_<?php echo esc_attr($item_id); ?> widefat code edit-menu-item-custom" value="<?php echo esc_attr( $tempvalue ); ?>" id="edit-menu-item-bt_use_icon-<?php echo esc_attr($item_id); ?>"/>
      			  </label>
			      <div class="bt-icon-preview bt_use_icon_<?php echo esc_attr($item_id); ?>"><i class="fa <?php echo esc_attr( $item->bt_use_icon ); ?>"></i></div>
			      <input class="bt-search" type="text" placeholder="Search" />
			      <div class="bt-icon-dropdown">
			      <ul class="bt-icon-list">
			      <?php
			      $a = 1;
			      foreach($icons as $icon)
			      {
			      	if ( $item->bt_use_icon != "" ) {
			        $selected = ($icon == $item->bt_use_icon) ? 'class="selected bt_use_icon_'.esc_attr($item_id).'"' : 'class="bt_use_icon_'.esc_attr($item_id).'"';			      		
			      	}
			      	else {
			      		if ( $a == 1 ) {
			      			$selected = 'class="selected bt_use_icon_'.esc_attr($item_id).'"';
			      		}
			      		else {
			      			$selected = 'class="bt_use_icon_'.esc_attr($item_id).'"';
			      		}
			      	}

			        $id = 'icon-'.$a;
			        echo '<li '.$selected.' data-icon="'.$icon.'"><i class="bt-icon fa '.$icon.'"></i><label class="bt-icon">'.$icon.'</label></li>';
			        $a++;
			      }
			      ?>
			      </ul>
			      </div>
            </div>
	            <?php
	            /* New fields insertion ends here */
	            ?>
	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( 'Original: %s', '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
	                echo wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                ); ?>"><?php _e('Remove', 'landmark-construction-theme'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'landmark-construction-theme'); ?></a>
	            </div>
	
	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php
	    
	    $output .= ob_get_clean();

	    }
}
class landmark_construction_theme_walker_main_menu extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth=0, $args=array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        
        ( $display_depth % 2  ? 'dropdown-menu' : '' ),
        ( $display_depth >=2 ? 'dropdown-menu' : '' )
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth = 0, $args = array(),$current_object_id = 0) {
    $mainSite = home_url();
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'firstitem' : '' ),
        ( $depth >=2 ? '' : '' ),
        ( $depth % 2 ? '' : '' ),
        
    );
    $depth_class_names = esc_attr( implode( '', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
    
    if ( $depth > 0 ) { $item->extra_class = ""; }
    $data_styles = "";
    if ( $depth == 0 && $item->extra_class == "multi") {
    	$data_styles = ' data-mega-bg="'.$item->mega_menu_background_image.'" data-mega-bc="'.$item->mega_menu_background_color.'" data-mega-br="'.$item->mega_menu_background_repeat.'" data-mega-bp="'.$item->mega_menu_background_position.'" data-mega-padding="'.$item->mega_padding_bottom.'"';
    }
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' '. $item->extra_class . '"'.$data_styles.'>';
 
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    if($item->object == 'sections') {
        $attributes .= ! empty( $item->url )        ? ' href="#go'.$item->object_id.'"' : '';
    }
    else {
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    }
    $attributes .= ! empty( $item->object_id )    ? ' data-id="go' . esc_attr( $item->object_id )  .'"' : '';
    $attributes .= ' class="menu-link"';
    if ( $item->add_mega_menu=="bt_show_icon") {
    $preicon = '<i class="menu-item-icon fa '.$item->bt_use_icon.'"></i>';
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        $preicon.apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
	}
	else 
	{
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
	}
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	

}
}

class landmark_construction_theme_walker_main_menu2 extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth=0, $args=array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        
        ( $display_depth % 2  ? 'dropdown-menu' : '' ),
        ( $display_depth >=2 ? 'dropdown-menu' : '' )
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth = 0, $args = array(),$current_object_id = 0) {
    $mainSite = home_url();
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'firstitem' : '' ),
        ( $depth >=2 ? '' : '' ),
        ( $depth % 2 ? '' : '' ),
        
    );
    $depth_class_names = esc_attr( implode( '', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
    if ( $depth > 0 ) { $item->extra_class = ""; }
    $data_styles = "";
    if ( $depth == 0 && $item->extra_class == "multi") {
    	$data_styles = ' data-mega-bg="'.$item->mega_menu_background_image.'" data-mega-bc="'.$item->mega_menu_background_color.'" data-mega-br="'.$item->mega_menu_background_repeat.'" data-mega-bp="'.$item->mega_menu_background_position.'" data-mega-padding="'.$item->mega_padding_bottom.'"';
		$item->extra_class.= ' '.$item->mega_menu_style;    
    }    

    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' '. $item->extra_class . '"'.$data_styles.'>';
  
    // link attributes

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    if($item->object == 'sections') {
        $attributes .= ! empty( $item->url )        ? ' href="'.$mainSite.'#go'.$item->object_id.'"' : '';
    }
    else {
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';
    }
    $attributes .= ! empty( $item->object_id )    ? ' data-id="' . esc_attr( $item->object_id )  .'"' : '';
    $attributes .= ' class="menu-link"';

    if ( $item->add_mega_menu=="bt_show_icon") {
    $preicon = '<i class="menu-item-icon fa '.$item->bt_use_icon.'"></i>';
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        $preicon.apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
	}
	else {
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
	}
	  if ( $item->widgetized_menu_area != "choose" && $item->widgetized_menu_area != "" ) {
	  	  $item_output = "";
	  	  
     	  ob_start();
          if (is_active_sidebar( $item->widgetized_menu_area ) ) {
          	dynamic_sidebar( $item->widgetized_menu_area );
          }
      	  $item_output .= ob_get_contents();
          ob_end_clean(); 
          
      }
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    
}
}
/*******************************/
/* WordPress Widgets&Sidebar   */
/*******************************/
/******************************/
/* Sidebar */
/******************************/
if (!function_exists('landmark_construction_theme_sidebar')) {
	function landmark_construction_theme_sidebar() {
	  
	register_sidebar(array(
	'name'          => __( 'Main Sidebar', 'landmark-construction-theme' ),
	'id'            => 'bliccathemes-sidebar-1',
	'description'   => 'Default Sidebar area, please use our sidebar creator for sidebar like our demo page sidebar',
	'before_widget' => '<div class="sidebar-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h5>',
	'after_title'   => '</h5>',
	));
	register_sidebar(array(
	'name'          => __( 'Shop Sidebar', 'landmark-construction-theme' ),
	'id'            => 'bliccathemes-sidebar-2',
	'description'   => 'Shop Sidebar',
	'before_widget' => '<div class="sidebar-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h5>',
	'after_title'   => '</h5>',
	)); 
	register_sidebar(array(
	'name'          => __( 'Header Widget', 'landmark-construction-theme' ),
	'id'            => 'bliccathemes-header-widget',
	'description'   => 'This widget area is for adding widget to topsection or widgetised area in navigation',
	'before_widget' => '<div class="header-text-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '',
	'after_title'   => '',
	));
	register_sidebar(array(
	'name'          => __( 'Extra Menu', 'landmark-construction-theme' ),
	'description'   => 'This widget area is for adding widget to your hidden menu(sliding on right of your website) in header',
	'id'            => 'bliccathemes-extra-menu',
	'before_widget' => '<div class="extra-menu %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '',
	'after_title'   => '',
	));      
	}
	add_action( 'widgets_init', 'landmark_construction_theme_sidebar' );
}

/******************************/
/* Footer and Mega Menu Area Widget */
/******************************/
if (!function_exists('landmark_construction_theme_widget')) {
	function landmark_construction_theme_widget() {
 
	register_sidebar( array(
	        'name' => __( 'Header Widget 1', 'landmark-construction-theme' ),
	        'id' => 'bliccathemes-header-widget-1',
	        'description' => __( 'Widget area for your mega menu', 'landmark-construction-theme' ),
	        'before_widget' => '<div class="header-mega-widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	) );

	register_sidebar( array(
	        'name' => __( 'Header Widget 2', 'landmark-construction-theme' ),
	        'id' => 'bliccathemes-header-widget-2',
	        'description' => __( 'Widget area for your mega menu', 'landmark-construction-theme' ),
	        'before_widget' => '<div class="header-mega-widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	) );
	register_sidebar( array(
	        'name' => __( 'Header Widget 3', 'landmark-construction-theme' ),
	        'id' => 'bliccathemes-header-widget-3',
	        'description' => __( 'Widget area for your mega menu', 'landmark-construction-theme' ),
	        'before_widget' => '<div class="header-mega-widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	) );
	register_sidebar( array(
	        'name' => __( 'Header Widget 4', 'landmark-construction-theme' ),
	        'id' => 'bliccathemes-header-widget-4',
	        'description' => __( 'Widget area for your mega menu', 'landmark-construction-theme' ),
	        'before_widget' => '<div class="header-mega-widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	) ); 
	register_sidebar( array(
	        'name' => __( 'Header Widget 5', 'landmark-construction-theme' ),
	        'id' => 'bliccathemes-header-widget-5',
	        'description' => __( 'Widget area for your mega menu', 'landmark-construction-theme' ),
	        'before_widget' => '<div class="header-mega-widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	) );  
	}
	add_action( 'widgets_init', 'landmark_construction_theme_widget' );
}
/*********************************/
/*           Comment             */
/*********************************/
if ( ! function_exists( 'landmark_construction_theme_comment' ) ) :
function landmark_construction_theme_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'landmark-construction-theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'landmark-construction-theme' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="media">
                    <div class="pull-left">            
                        <?php echo get_avatar( $comment, 80 ); ?>
                    </div>
                    <div class="media-body"><div class="title-date">
                    <?php printf( __( '%s', 'landmark-construction-theme' ), sprintf( '<h3 class="media-heading"><span>%s</span></h3>', get_comment_author_link() ) ); ?>
                    <p class="comment-date">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                        <?php
                            /* translators: 1: date, 2: time */
                            printf( __( '%1$s at %2$s', 'landmark-construction-theme' ), get_comment_date(), get_comment_time() ); ?>
                        </time></a>
                    </p></div>
                    <div class="comment-text"><?php comment_text(); ?></div>
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>  
                    <p class="reply"> <?php edit_comment_link( __( '(Edit)', 'landmark-construction-theme' ), ' ' );
                    ?>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', 'landmark-construction-theme' ); ?></em>
                    <?php endif; ?>
                    </p>
                    </div>
            
        </article><!-- #comment-## -->
 
    <?php
            break;
    endswitch;
}
endif; // ends check for landmark_construction_theme_comment()

/*** Comment Form ***/


if ( !function_exists('landmark_construction_theme_defaults_comment_form')) {
	function landmark_construction_theme_defaults_comment_form($defaults) {
    $placemessage = __("Type here message", "landmark-construction-theme");

  	landmark_construction_theme_get_defaults();
	if ( !isset($landmark_construction_theme_options['comment_title'])) {
		$landmark_construction_theme_options['comment_title'] = "Post a Comment";
	}
	$comment_title = '<span>'. $landmark_construction_theme_options['comment_title'] . '</span>'; 

	$defaults['comment_field'] = '<div class="clearfix"></div><div class="col-md-12 form-group"><textarea class="required form-control" type="text" rows="7" placeholder="'.$placemessage.'" id="landmark_construction_theme_comment" name="comment" aria-required="true"></textarea></div>';
	$defaults['comment_notes_after'] = "";
	$defaults['comment_notes_before'] = "";
	$defaults['label_submit'] = __('Submit', 'landmark-construction-theme');
	$defaults['title_reply']  = $comment_title;

	    return $defaults;
	}
	add_filter('comment_form_defaults','landmark_construction_theme_defaults_comment_form');
}

if (!function_exists('landmark_construction_theme_alter_comment_form_fields')) {
function landmark_construction_theme_alter_comment_form_fields(){
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $placename = __("Full Name", "landmark-construction-theme");
    $placeemail = __("Email Address", "landmark-construction-theme");
    $placeweb = __("Your Website", "landmark-construction-theme");
    
    $fields =  array(
        'author' => '<div class="col-md-4 form-group formleft">'  .
                    '<input id="author" class="required form-control" name="author" type="text" placeholder="'.$placename.'" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />'.'</div>',
        'email'  => '<div class="col-md-4 form-group">' .
                    '<input id="email" class="required form-control" name="email" type="text" placeholder="'.$placeemail.'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div>',
        'url'    => '<div class="col-md-4 form-group formright">' .
                    '<input id="url" class="form-control" name="url" type="text" placeholder="'.$placeweb.'" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/>'.'</div>',
        
    );
    return $fields;
}

add_filter('comment_form_default_fields','landmark_construction_theme_alter_comment_form_fields');
}
function landmark_construction_theme_move_comment( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'landmark_construction_theme_move_comment' );

                           
/********************************/
/*         Pagination           */
/********************************/
if ( !function_exists('landmark_construction_theme_pagination')) {
function landmark_construction_theme_pagination($pages = '', $range = 4)
	{  
	    global $wp_query;

	                        $big = 999999999; // need an unlikely integer

	                        echo paginate_links( array(
	                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	                            'format' => '?paged=%#%',
	                            'current' => max( 1, get_query_var('paged') ),
	                            'total' => $wp_query->max_num_pages,
	                            'type'         => 'list',
                                'prev_text'          => '&laquo;',
								'next_text'          => '&raquo;',
	                        ) );
	}
}
if ( !function_exists('landmark_construction_theme_custom_nextpage_links')) {
	function landmark_construction_theme_custom_nextpage_links($defaults) {
	$args = array(
	'before' => '<div class="pagination-container"><div class="post-pagination">',
	'after' => '</div></div>',
	'link_before'      => '<span>',
	'link_after'       => '</span>'
	);
	$r = wp_parse_args($args, $defaults);
	return $r;
	}
	add_filter('wp_link_pages_args','landmark_construction_theme_custom_nextpage_links');
}

/*****************************/
/* ADD CAPTION IMAGE TO PAGE */
/*****************************/
if ( ! function_exists( 'landmark_construction_theme_caption_image' ) ) {
function landmark_construction_theme_caption_image ($post) {
    $thumb_id = get_post_thumbnail_id($post->ID);
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
    $thumb_url = $thumb_url_array[0];
    $text_color = $back_size = "";
    $text_color = get_post_meta($post->ID, '_landmark_construction_theme_page_color', true);
    $back_color = get_post_meta($post->ID, '_landmark_construction_theme_page_back', true);
  
    $back_size = get_post_meta($post->ID, '_landmark_construction_theme_page_caption', true);
    if ( $back_size != "" ) {
    $back_size = 'height:'.$back_size.'px; padding:0;';
    }
    else {
    $back_size = 'height: 100px; padding:0;';
    }
    if ( $back_color != "") {
    $back_color = "background:#e2e2e2;";  
    }
    else { $back_color ="";}
    if ( $text_color != "") { $text_color = 'color:'.$text_color.';'; }
    else {
    $text_color = '';
    }
    if (has_post_thumbnail()) { 
    echo 'style="'.esc_attr($back_size).'background: url('.esc_url($thumb_url).') no-repeat center; background-size: cover;'.esc_attr($text_color).'"';

    }
    else {
    echo 'style="'.esc_attr($back_size).esc_attr($back_color).esc_attr($text_color).'"';
    
    }
}
}

if ( ! function_exists( 'landmark_construction_theme_h2' ) ) {
function landmark_construction_theme_h2 ($post) {
    $text_color = "";
    if ( isset($post->ID)) {
    $text_color = get_post_meta($post->ID, '_landmark_construction_theme_page_color', true);
    }
    if ( $text_color != "") { echo 'style="color:'.esc_attr($text_color).';"'; }
    else {
    echo '';  
    }
}
}
/*******************************/
/* Gallery Links               */
/*******************************/
    function landmark_construction_theme_gallery_thumbnail_url($pid){  
    $image_id = get_post_thumbnail_id($pid);    
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');    
    return  $image_url[0];    
    }    
/**********************/
/*   Twitter Widget   */
/**********************/
function landmark_construction_theme_twitapi_links($text) {
      $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)','<a href="\\1">\\1</a>', $text);
            $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)','\\1<a href="http://\\2">\\2</a>', $text);
            return $text;
  }

if ( ! function_exists( 'landmark_construction_theme_timeSince' ) ) {  
function landmark_construction_theme_timeSince($time) {

        $since = time() - strtotime($time);

        $string     = '';

        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'minute'),
            array(1 , 'second')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $string = ($count == 1) ? '1 ' . $name . ' ago' : $count . ' ' . $name . 's ago';

        return $string;

    }  
}

/******************************/
/*     POPULAR TAG WIDGET     */
/******************************/
//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'landmark_construction_theme_tag_widget_limit');
 
//Limit number of tags inside widget
function landmark_construction_theme_tag_widget_limit($args){
 
 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 10; //Limit number of tags
 }
 
 return $args;
}                           
class landmark_construction_theme_popular_tag extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'landmark_construction_theme_pop_tags', 'description' => __( "Add most used tags to Widget Area", 'landmark-construction-theme') );
        parent::__construct('landmark_construction_theme_tag_cloud', __('bliccaThemes Tag Cloud', 'landmark-construction-theme'), $widget_ops);  
    }

    function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        ?>
        <?php echo !empty( $before_widget) ? $before_widget : ''; ?>
        <?php if ( $title !="" ) { 
        	echo !empty( $before_title ) ? $before_title : ''; 
        	echo !empty( $title ) ? $title : '';
        	echo !empty( $after_title ) ? $after_title : ''; 
        	} 
        ?>
            <div class="bliccaThemes-tag-cloud">
               <?php wp_tag_cloud('unit=px&smallest=13&largest=13&number=10&format=list'); ?>
            </div>
        <?php echo !empty($after_widget) ? $after_widget: ''; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
    }   

        function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = strip_tags($instance['title']);
?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'landmark-construction-theme'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
    }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "landmark_construction_theme_popular_tag" );' ) );


/*****************************/
/* bliccaThemes RECENT POST    */
/*****************************/
class landmark_construction_theme_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site", 'landmark-construction-theme') );
        parent::__construct('bliccaThemes-recent-posts', __('bliccaThemes Recent Posts', 'landmark-construction-theme'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';


    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo esc_html($cache[ $args['widget_id'] ]);
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'landmark-construction-theme') : $instance['title'], $instance, $this->id_base);
        if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
            $number = 3;
        

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>

        <?php echo !empty( $before_widget) ? $before_widget : ''; ?>
        <?php if ( $title !="" ) { 
        	echo !empty( $before_title ) ? $before_title : ''; 
        	echo !empty( $title ) ? $title : '';
        	echo !empty( $after_title ) ? $after_title : ''; 
        	} 
        ?>
        <div class="bliccaThemes-recent-post-widget">
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <article class="bliccaThemes-recent-post">
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if (has_post_thumbnail()) { $thumb = get_post_thumbnail_id(); 
                                        $image = vt_resize( $thumb, '', 74, 70, true );?>
                                        <img src="<?php echo esc_url($image['url']); ?>" width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>" alt="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>" /><?php } else if ( has_post_format( 'video' )) { echo '<div class="recentpostinside"><i class="fa fa-video-camera"></i></div>';} else if ( has_post_format( 'audio' )) { echo '<div class="recentpostinside"><i class="fa fa-music"></i></div>';} else if ( has_post_format( 'quote' )) { echo '<div class="recentpostinside"><i class="fa fa-quote-left"></i></div>';} else  { echo '<div class="recentpostinside"><i class="fa fa-picture-o"></i></div>';}?></a>
                <h6><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h6>
                <p class="popular-date"><?php echo get_the_date(); ?></p>
             <div class="clearfix"></div>   
            </article>
        <?php endwhile; ?>
        </div>
        <?php echo !empty($after_widget) ? $after_widget : ''; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
       



        return $instance;
    }



    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'landmark-construction-theme' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( 'Number of posts to show:', 'landmark-construction-theme' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

<?php
    }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "landmark_construction_theme_Recent_Posts" );' ) );


/**********************/
/*   Social Widget    */
/**********************/
class landmark_construction_theme_mini_socwid extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'landmark_construction_theme_mini_socwid', 'description' => __( "Mini Social Widget", 'landmark-construction-theme') );
        parent::__construct('landmark_construction_theme_mini_socwid', __('Social Widget', 'landmark-construction-theme'), $widget_ops);
        $this->alt_option_name = 'mini_soc';


    }

    function widget($args, $instance) {
        $cache = wp_cache_get('landmark_construction_theme_mini_socwid', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo !empty($cache[ $args['widget_id'] ]);
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'landmark-construction-theme') : $instance['title'], $instance, $this->id_base);
        ?>
        <div class="footer-widget">
              <div class="social-widget">
                <?php landmark_construction_theme_get_defaults(); ?>
                <?php if ( $landmark_construction_theme_options['social_facebook'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_facebook']);?>" target="_blank"><div class="social-facebook"><i class="fa fa-facebook"></i></div></a>

                <?php } if ( $landmark_construction_theme_options['social_twitter'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_twitter']);?>" target="_blank"><div class="social-twitter"><i class="fa fa-twitter"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_pinterest'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_pinterest']);?>" target="_blank"><div class="social-pinterest"><i class="fa fa-pinterest"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_instagram'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_instagram']);?>" target="_blank"><div class="social-instagram"><i class="fa fa-instagram"></i></div></a>

                <?php } if ( $landmark_construction_theme_options['social_flickr'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_flickr']);?>" target="_blank"><div class="social-flickr"><i class="fa fa-flickr"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_google'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_google']);?>" target="_blank"><div class="social-google-plus"><i class="fa fa-google-plus"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_dribbble'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_dribbble']);?>" target="_blank"><div class="social-dribbble"><i class="fa fa-dribbble"></i></div></a>
               
                <?php } if ( $landmark_construction_theme_options['social_linkedin'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_linkedin']);?>" target="_blank"><div class="social-linkedin"><i class="fa fa-linkedin"></i></div></a>
               

                <?php } if ( $landmark_construction_theme_options['social_digg'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_digg']);?>" target="_blank"><div class="social-digg"><i class="fa fa-digg"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_yelp'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_yelp']);?>" target="_blank"><div class="social-yelp"><i class="fa fa-yelp"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_skype'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_skype']);?>" target="_blank"><div class="social-skype"><i class="fa fa-skype"></i></div></a>
                
                
                <?php } if ( $landmark_construction_theme_options['social_vimeo'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_vimeo']);?>" target="_blank"><div class="social-vimeo"><i class="fa fa-vimeo-square"></i></div></a>
                
                <?php } if ( $landmark_construction_theme_options['social_youtube'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_youtube']);?>" target="_blank"><div class="social-youtube"><i class="fa fa-youtube"></i></div></a>
                                
                <?php } if ( $landmark_construction_theme_options['social_stumbleupon'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_stumbleupon']);?>" target="_blank"><div class="social-stumbleupon"><i class="fa fa-stumbleupon"></i></div></a>
                
                
                <?php } if ( $landmark_construction_theme_options['social_yahoo'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_yahoo']);?>" target="_blank"><div class="social-yahoo"><i class="fa fa-yahoo"></i></div></a>
                
                
                <?php } if ( $landmark_construction_theme_options['social_foursquare'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_foursquare']);?>" target="_blank"><div class="social-foursquare"><i class="fa fa-foursquare"></i></div></a>
              
                
                <?php } if ( $landmark_construction_theme_options['social_rss'] != '') { ?>
                <a href="<?php echo esc_url($landmark_construction_theme_options['social_rss']);?>" target="_blank"><div class="social-rss"><i class="fa fa-rss"></i></div></a>
                <?php } ?>
              </div>
        </div>
        <?php 
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('landmark_construction_theme_mini_socwid', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);





        return $instance;
    }


    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

        
?>
        
<?php
    }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "landmark_construction_theme_mini_socwid" );' ) );
/*********************/
/*    Social Links   */
/*********************/
if ( ! function_exists( 'landmark_construction_theme_social_links' ) ) {
function landmark_construction_theme_social_links(){
  	$landmark_construction_theme_options=landmark_construction_theme_get_defaults();

	$social_facebook = $landmark_construction_theme_options['social_facebook'];
	$social_twitter = $landmark_construction_theme_options['social_twitter'];
	$social_yelp = $landmark_construction_theme_options['social_yelp'];
	$social_pinterest = $landmark_construction_theme_options['social_pinterest'];
	$social_instagram = $landmark_construction_theme_options['social_instagram'];
	$social_flickr = $landmark_construction_theme_options['social_flickr'];
	$social_google = $landmark_construction_theme_options['social_google'];
	$social_dribbble = $landmark_construction_theme_options['social_dribbble'];
	$social_linkedin = $landmark_construction_theme_options['social_linkedin'];
	$social_digg = $landmark_construction_theme_options['social_digg'];
	$social_skype = $landmark_construction_theme_options['social_skype'];
	$social_vimeo = $landmark_construction_theme_options['social_vimeo'];
	$social_youtube = $landmark_construction_theme_options['social_youtube'];
	$social_stumbleupon = $landmark_construction_theme_options['social_stumbleupon'];
	$social_yahoo = $landmark_construction_theme_options['social_yahoo'];
	$social_foursquare = $landmark_construction_theme_options['social_foursquare'];
	$social_rss = $landmark_construction_theme_options['social_rss'];
	$social_facebook = $landmark_construction_theme_options['social_facebook'];


    if ( $social_facebook != '') { ?>
	  <a href="<?php echo esc_url($social_facebook);?>" target="_blank"><div class="social-facebook"><i class="fa fa-facebook"></i></div></a>

	  <?php } if ( $social_twitter != '') { ?>
	  <a href="<?php echo esc_url($social_twitter);?>" target="_blank"><div class="social-twitter"><i class="fa fa-twitter"></i></div></a>
 
	  <?php } if ( $social_yelp != '') { ?>
	  <a href="<?php echo esc_url($social_yelp);?>" target="_blank"><div class="social-yelp"><i class="fa fa-yelp"></i></div></a>

	  <?php } if ( $social_pinterest != '') { ?>
	  <a href="<?php echo esc_url($social_pinterest);?>" target="_blank"><div class="social-pinterest"><i class="fa fa-pinterest"></i></div></a>

	  <?php } if ( $social_instagram != '') { ?>
	  <a href="<?php echo esc_url($social_instagram);?>" target="_blank"><div class="social-instagram"><i class="fa fa-instagram"></i></div></a>

	  <?php } if ( $social_flickr != '') { ?>
	  <a href="<?php echo esc_url($social_flickr);?>" target="_blank"><div class="social-flickr"><i class="fa fa-flickr"></i></div></a>

    <?php } if ( $social_google != '') { ?>
	  <a href="<?php echo esc_url($social_google);?>" target="_blank"><div class="social-google-plus"><i class="fa fa-google-plus"></i></div></a>

    <?php } if ( $social_dribbble != '') { ?>
    <a href="<?php echo esc_url($social_dribbble);?>" target="_blank"><div class="social-dribbble"><i class="fa fa-dribbble"></i></div></a>
               
    <?php } if ( $social_linkedin != '') { ?>
    <a href="<?php echo esc_url($social_linkedin);?>" target="_blank"><div class="social-linkedin"><i class="fa fa-linkedin"></i></div></a>
               
    <?php } if ( $social_digg != '') { ?>
    <a href="<?php echo esc_url($social_digg);?>" target="_blank"><div class="social-digg"><i class="fa fa-digg"></i></div></a>             
             
    <?php } if ( $social_skype != '') { ?>
    <a href="<?php echo esc_url($social_skype);?>" target="_blank"><div class="social-skype"><i class="fa fa-skype"></i></div></a>     
                
    <?php } if ( $social_vimeo != '') { ?>
    <a href="<?php echo esc_url($social_vimeo);?>" target="_blank"><div class="social-vimeo"><i class="fa fa-vimeo-square"></i></div></a>
                
    <?php } if ( $social_youtube != '') { ?>
    <a href="<?php echo esc_url($social_youtube);?>" target="_blank"><div class="social-youtube"><i class="fa fa-youtube"></i></div></a>
                
    <?php } if ( $social_stumbleupon != '') { ?>
    <a href="<?php echo esc_url($social_stumbleupon);?>" target="_blank"><div class="social-stumbleupon"><i class="fa fa-stumbleupon"></i></div></a>
                
    <?php } if ( $social_yahoo != '') { ?>
    <a href="<?php echo esc_url($social_yahoo);?>" target="_blank"><div class="social-yahoo"><i class="fa fa-yahoo"></i></div></a> 
                
    <?php } if ( $social_foursquare != '') { ?>
    <a href="<?php echo esc_url($social_foursquare);?>" target="_blank"><div class="social-foursquare"><i class="fa fa-foursquare"></i></div></a>
              
    <?php } if ( $social_rss != '') { ?>
    <a href="<?php echo esc_url($social_rss);?>" target="_blank"><div class="social-rss"><i class="fa fa-rss"></i></div></a>
    <?php }  
}
}
/*********************************/
/* CUSTOM PAGE BUILDER ELEMENT * /
/********************************/

include (get_template_directory() . '/includes/shortcodes.php');


add_action( 'after_setup_theme', 'landmark_construction_theme_vc_editor' );
function landmark_construction_theme_vc_editor() {
    update_option('wpb_js_content_types', array( 'page', 'footers', 'sidebars' ) );
}


add_action( 'init', 'landmark_construction_theme_vcSetAsTheme' );
function landmark_construction_theme_vcSetAsTheme() {
    if (function_exists('vc_set_as_theme')) vc_set_as_theme(true);
}
/*********************/
/*   WOO COMMERCE    */
/*********************/
add_theme_support( 'woocommerce' );
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    include (get_template_directory() . '/includes/landmark-shop.php');
}

                           
/********************/
/* Social to Author */
/********************/                           
function landmark_construction_theme_author( $contactmethods ) {
$contactmethods['twitter'] = 'Twitter';
$contactmethods['facebook'] = 'Facebook';
$contactmethods['dribbble'] = 'Dribbble';
$contactmethods['googlep'] = 'Google +'; 
$contactmethods['pinterest'] = 'Pinterest';
return $contactmethods;
}
add_filter('user_contactmethods','landmark_construction_theme_author',10,1);
/*****************/
/* Breadcrumbs   */
/*****************/
include (get_template_directory() . '/includes/bt-breadcrumb.php');
                           
if ( !function_exists( 'landmark_construction_theme_slider_import' ) ) {
    function landmark_construction_theme_slider_import( $demo_active_import , $demo_directory_path ) {
        reset( $demo_active_import );
        $current_key = key( $demo_active_import );
        /************************************************************************
        * Import slider(s) for the current demo being imported
        *************************************************************************/
        if ( class_exists( 'RevSlider' ) ) {
            //If it's demo3 or demo5
            $wbc_sliders_array = array(
                'demo1' => 'home1.zip', //Set slider zip name
            );

            if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
              $wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
              if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
                $slider = new RevSlider();
                $slider->importSliderFromPost( true, true, $demo_directory_path.'home1.zip' );                
                $slider->importSliderFromPost( true, true, $demo_directory_path.'home2.zip' );
                $slider->importSliderFromPost( true, true, $demo_directory_path.'project1.zip' );
              }
            }
        }
    }
    
    add_action( 'wbc_importer_after_content_import', 'landmark_construction_theme_slider_import', 10, 2 );
}
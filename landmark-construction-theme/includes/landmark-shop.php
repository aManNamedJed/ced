<?php 

landmark_construction_theme_get_defaults();
function landmark_construction_theme_woocommerce() {
  if ( class_exists( 'woocommerce' ) ) { return true; }
  return false;
}

if ( !landmark_construction_theme_woocommerce() ) { return false; }

// Change number of products displayed per page
add_filter( 'loop_shop_per_page', function ( $cols ) {
global $landmark_construction_theme_options;  
  if ( !isset($landmark_construction_theme_options['shop_page_item'] ) || $landmark_construction_theme_options['shop_page_item'] =="" ) {
      $shop_paged = 10;
  }
  else {
      $shop_paged = $landmark_construction_theme_options['shop_page_item'];
  }
    return $shop_paged;
}, 20 );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'blicca_Themes_loop_columns');
if (!function_exists('blicca_Themes_loop_columns')) {
  function blicca_Themes_loop_columns() { 
  global $landmark_construction_theme_options;  
   $shop_item = 4;
   $shopid = get_option( 'woocommerce_shop_page_id' ); 
   $sidebar_single_style = get_post_meta( $shopid, "_sidebar_style", true);
   if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {  
   $shop_item = 3;
   }    
    return $shop_item; 
  }
}

/* WooCommerce Related */ 
add_filter( 'woocommerce_output_related_products_args', 'landmark_construction_theme_woo_related' );
function landmark_construction_theme_woo_related( $args ) {
$args['posts_per_page']     = 4; // 3 related products
$args['columns']            = 4; // arranged in columns

return $args;
}

/* Creating Layouts */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action( 'woocommerce_before_main_content', 'landmark_construction_theme_before_main_content', 10);
add_action( 'woocommerce_after_main_content', 'landmark_construction_theme_after_main_content', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0);
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
add_action( 'woocommerce_single_product_summary','woocommerce_template_single_rating', 15);
/* Delete WooTitle */
add_filter('woocommerce_show_page_title', 'landmark_construction_theme_remove_wootitle');

function landmark_construction_theme_remove_wootitle( $variable ) {
$variable=false;
return $variable;
}

/***********************************/
/* Layout Codes for All Shop Pages */
/***********************************/
function landmark_construction_theme_before_main_content($location) {
global $post;
global $woocommerce;
global $landmark_construction_theme_options;  
global $pagename;
/* Getting Sidebar and Column */
$shopid = get_option( 'woocommerce_shop_page_id' ); 
$sidebar_single_column = get_post_meta( $shopid, "_sidebar_column", true);
$sidebar_single_style = get_post_meta( $shopid, "_sidebar_style", true);
$content_class = "col-md-12"; 
$shop_item = "4";
if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
    
    if ( $sidebar_single_column == "sidebar_4") {
      $content_class ="col-sm-8 col-md-8";
      $sidebar_class ="col-sm-4 col-md-4";
      $shop_item = 3;
    }
    else {
      $content_class ="col-sm-9 col-md-9";
      $sidebar_class ="col-sm-9 col-md-3";      
      $shop_item = 3;
    }
}


if(isset($landmark_construction_theme_options['shop_header'])) { $shop_header =  $landmark_construction_theme_options['shop_header']; }
    else { $shop_header = "Set from Theme Options"; }
if(isset($landmark_construction_theme_options['shop_caption'])) { /*dont */ }
    else { $landmark_construction_theme_options['shop_caption'] = " "; }
$caption_style = "caption-style1"; 
if ( isset($landmark_construction_theme_options['landmark_construction_theme_caption_style']) ) {
   $caption_style = $landmark_construction_theme_options['landmark_construction_theme_caption_style'];
}  
 
if ( is_cart() || is_checkout() || is_single() || is_page(wc_get_page_id( 'cart' )) ) { $content_class = "col-md-12"; }
?>
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky">   
    <div class="caption-container bt-shop-caption <?php echo esc_attr($caption_style); ?>">
        <div class="caption"><div class="container"><div class="row"><div class="col-md-12">
            <h1>
            <?php if ( is_woocommerce() ) {
              woocommerce_page_title(); 
            } else {
              echo esc_html($shop_header); 
            } 
            ?>
            </h1>    
            <?php       
            if ($landmark_construction_theme_options['shop_caption'] != "") { 
            ?>
              <p><?php echo esc_html($landmark_construction_theme_options['shop_caption']); ?></p>
            <?php 
            } 
            ?>
            <?php if ( $caption_style == "caption-style2" ) {
              ?>
              <div class="bt-page-breadcrumb">
              <?php
              landmark_construction_theme_breadcrumb(); 
              ?>
              </div>
              <?php
              }
             ?>               
        </div></div></div></div>
  </div>
  <div class="bliccaThemes-shop bliccaThemes-shop-grid<?php echo esc_attr($shop_item); ?>">
    <div class="container"><div class="row"><div class="<?php echo esc_attr($content_class); ?>">
<?php      
}

function landmark_construction_theme_after_main_content($location) {
global $woocommerce;  
$shopid = get_option( 'woocommerce_shop_page_id' ); 
$sidebar_single_column = get_post_meta( $shopid, "_sidebar_column", true);
$sidebar_single_style = get_post_meta( $shopid, "_sidebar_style", true);
$content_class = "col-md-12";
if ( $sidebar_single_style != "no_sidebar" && $sidebar_single_style != "" ) {
    
    if ( $sidebar_single_column == "sidebar_4") {
      $content_class ="col-sm-8 col-md-8";
      $sidebar_class ="col-sm-4 col-md-4";
      $shop_item = 3;
    }
    else {
      $content_class ="col-sm-9 col-md-9";
      $sidebar_class ="col-sm-9 col-md-3";      
      $shop_item = 3;
    }
}

if ( is_cart() || is_checkout() || is_single() || is_page(wc_get_page_id( 'cart' )) ) { $content_class = "col-md-12"; } 
?>
  </div>
  <?php
  if ( $content_class != "col-md-12"  ) { 
          ?><div class="<?php echo esc_attr($sidebar_class); ?>">
          <?php
          get_sidebar('shop');
          $the_query = new WP_Query( 'page_id='.$sidebar_single_style.'&post_type=sidebars' );
          while ( $the_query->have_posts() ) :
            $the_query->the_post();
          ?>
          <?php    
          $content = get_the_content();
          if ( !empty($content) ) {
          the_content(); 
          }
          ?>
          </div>
          <?php 
          endwhile;
          wp_reset_postdata();
    
  }
  ?>
  </div></div></div>
</section>
  <?php
}

/* WooCommerce Share */
add_action( 'woocommerce_share', 'landmark_construction_theme_woo_share', 10 );
function landmark_construction_theme_woo_share() {
  ?>
  <div class="bt-shop-share">
  <div class="bt-shop-share-text"><?php echo esc_html__("Share with Friends","landmark-construction-theme"); ?></div>
  <?php
  landmark_construction_theme_share_widget();
  ?>
  <div class="clearfix"></div>
  </div>
  <?php
}

/* You may be interested */
add_action('init', 'landmark_construction_theme_delete_cross');
function landmark_construction_theme_delete_cross() {
  global $product;  
  remove_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' , 10);
  remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
}

/***********************/
/* WooCommerce Styling */
/***********************/          
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'landmark_construction_theme_woocommerce_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function landmark_construction_theme_woocommerce_override_checkout_fields( $fields ) {
  // Add placeholder
     $fields['billing']['billing_first_name']['placeholder'] = 'First name';
     $fields['billing']['billing_last_name']['placeholder'] = 'Last name';
     $fields['billing']['billing_company']['placeholder'] = 'Company name';
     $fields['billing']['billing_address_1']['placeholder'] = 'Address';
     $fields['billing']['billing_address_2']['placeholder'] = 'Appartment, unit, etc. (optional)';
     $fields['billing']['billing_city']['placeholder'] = 'Town / City';
     $fields['billing']['billing_postcode']['placeholder'] = 'Zip code';
     $fields['billing']['billing_country']['placeholder'] = 'Select a Country';
     $fields['billing']['billing_state']['placeholder'] = 'State / Country';
     $fields['billing']['billing_email']['placeholder'] = 'Email address';
     $fields['billing']['billing_phone']['placeholder'] = 'Phone';
     $fields['shipping']['shipping_first_name']['placeholder'] = 'First name';
     $fields['shipping']['shipping_last_name']['placeholder'] = 'Last name';
     $fields['shipping']['shipping_company']['placeholder'] = 'Company name';
     $fields['shipping']['shipping_address_1']['placeholder'] = 'Address';
     $fields['shipping']['shipping_address_2']['placeholder'] = 'Appartment, unit, etc. (optional)';
     $fields['shipping']['shipping_city']['placeholder'] = 'Town / City';
     $fields['shipping']['shipping_postcode']['placeholder'] = 'Zip code';
     $fields['shipping']['shipping_country']['placeholder'] = 'Select a Country';
     $fields['shipping']['shipping_state']['placeholder'] = 'State / Country';
     $fields['order']['order_comments']['placeholder'] = 'Notes about your order, e.g special note for delivery';
     $fields['account']['account_username']['placeholder'] = 'Username';
     $fields['account']['account_password']['placeholder'] = 'Password';
     $fields['account']['account_password-2']['placeholder'] = 'Password';

     // Remove Labels
     unset($fields['billing']['billing_first_name']['label']);
     unset($fields['billing']['billing_last_name']['label']);
     unset($fields['billing']['billing_company']['label']);
     unset($fields['billing']['billing_address_1']['label']);
     unset($fields['billing']['billing_city']['label']);
     unset($fields['billing']['billing_postcode']['label']);
     unset($fields['billing']['billing_country']['label']);
     unset($fields['billing']['billing_state']['label']);
     unset($fields['billing']['billing_email']['label']);
     unset($fields['billing']['billing_phone']['label']);
     unset($fields['shipping']['shipping_first_name']['label']);
     unset($fields['shipping']['shipping_last_name']['label']);
     unset($fields['shipping']['shipping_company']['label']);
     unset($fields['shipping']['shipping_address_1']['label']);
     unset($fields['shipping']['shipping_city']['label']);
     unset($fields['shipping']['shipping_postcode']['label']);
     unset($fields['shipping']['shipping_country']['label']);
     unset($fields['shipping']['shipping_state']['label']);
     unset($fields['order']['order_comments']['label']);
     unset($fields['account']['account_username']['label']);
     unset($fields['account']['account_password']['label']);
     unset($fields['account']['account_password-2']['label']);
     return $fields;
}          
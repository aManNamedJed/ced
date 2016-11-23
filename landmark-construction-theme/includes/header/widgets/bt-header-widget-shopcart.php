<?php
/*********************/
/* BliccaThemes Cart */
/*********************/

	
  if (!function_exists('landmark_construction_theme_get_shopwid')) {
  function landmark_construction_theme_get_shopwid() { 
  global $woocommerce; 
  global $landmark_construction_theme_options;
  }  
  }
	$cart_content = "icon";
	$cart_text = "Cart";
	$background_style = "cart-1";
	if ( isset($landmark_construction_theme_options['cart_background_style'])) {
		$background_style = $landmark_construction_theme_options['cart_background_style'];
	}
	if ( isset($landmark_construction_theme_options['cart_content'])) {
		$cart_content = $landmark_construction_theme_options['cart_content'];
	}
	if ( isset($landmark_construction_theme_options['cart_text'])) {
		$cart_text = $landmark_construction_theme_options['cart_text'];
	}
	if ( !$woocommerce ) { return false; }

	if(class_exists('Woocommerce') ) {
	$cart_total_number = $woocommerce->cart->cart_contents_count;
	$cart_total_price = $woocommerce->cart->get_cart_total();  
	?>

		<div class="bt-cart-header <?php echo esc_attr($background_style); ?>">
			<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
				<i class="fa fa-shopping-cart"></i>
				<?php
				switch ($cart_content) {
					case 'icon_text':
						echo esc_html($cart_text);
						break;
					case 'icon_text_total':
						echo esc_html($cart_text).' '.$cart_total_price;
            break;
					case 'icon_count':
						echo esc_html($cart_total_number);
						if ( $cart_total_number > 1 ) { echo 'items'; }
						else { echo 'item'; } 
            break;
					case 'icon_count_two':
						?>
						<div class="bt-cart-number">
						<?php echo esc_html($cart_total_number); ?>	
						</div>
						<?php
					  break;
          case 'icon_text_count':
						echo esc_html($cart_text).' '.esc_html($cart_total_number);
						if ( $cart_total_number > 1 ) { echo 'items'; }
						else { echo 'item'; } 				
            break;
					default:
						
						break;
				}
				?>				
			</a>	
			<div class="bt-cart">			
				<?php the_widget( 'WC_Widget_Cart', 'title= ', 'before_title=&after_title=' ); ?>
			 	<div class="clearfix"></div>
			</div>
		</div>
		<?php 
		}

<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs">

		<?php foreach ( $tabs as $key => $tab ) : ?>
			<?php if ( $key == "reviews" ) {
				?>
				</div></div></div></div></div>
				<div class="bt-review-shop"><div class="container"><div class="row"><div class="col-md-12">
				<?php
			}
			?>
			<div class="bt-product-information" id="<?php echo $key ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>
			<?php if ( $key == "reviews" ) {
				?>
				</div></div></div></div>
				
				<?php
			}
			?>
		<?php endforeach; ?>
	</div>
	
<?php endif; ?>
<div class="bt-shop-related"><div class="container"><div class="row"><div class="col-md-12">
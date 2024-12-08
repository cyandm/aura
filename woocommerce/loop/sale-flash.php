<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

	<?php
	$price_percent = 0;

	if ( $product->is_type( 'variable' ) ) {

		$variants = $product->get_available_variations();

		foreach ( $variants as $variant ) {
			if ( $variant['display_price'] !== $variant['display_regular_price'] ) {
				$price_percent = round( ( $variant['display_regular_price'] - $variant['display_price'] ) * 100 / $variant['display_regular_price'] );
				break;
			}
		}



	}

	if ( $product->is_type( 'simple' ) ) {
		$price_percent = round( $product->get_regular_price() - $product->get_sale_price() ) * 100 / $product->get_regular_price();
	}

	?>


	<?php
	$html = '<span class="absolute top-2 left-2 py-1 px-3 text-sm rounded-lg bg-rose-500 text-white">';
	$html .= strval( $price_percent ) . '%';
	$html .= '</span>';
	?>

	<?php echo apply_filters( 'woocommerce_sale_flash', $html, $post, $product ); ?>

	<?php
endif;

if ( ! $product->is_in_stock() ) {
	echo '<span class="absolute top-2 left-2 py-1 px-3 text-sm rounded-lg bg-rose-500 text-white">ناموجود</span>';
}

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

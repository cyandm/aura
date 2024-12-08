<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products mt-4">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2 class=" py-4 text-3xl"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php woocommerce_product_loop_start(); ?>
		<swiper-container slides-per-view="1"
						  breakpoints="{&quot;768&quot;:{&quot;slidesPerView&quot;:2},&quot;1200&quot;:{&quot;slidesPerView&quot;:3},&quot;1440&quot;:{&quot;slidesPerView&quot;:4}}"
						  pagination="true"
						  pagination-el="#paginationEl"
						  space-between="8">

			<?php foreach ( $related_products as $related_product ) : ?>
				<swiper-slide class="p-2">
					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
			
					wc_get_template_part( 'content', 'product' );
					?>
				</swiper-slide>
			<?php endforeach; ?>

		</swiper-container>

		<div id="paginationEl"
			 class="w-full flex justify-center items-start my-2"></div>
		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();

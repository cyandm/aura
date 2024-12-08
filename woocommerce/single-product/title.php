<?php

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
global $product;



//@CYAN ADD CLASS
the_title('<h1 class="product_title entry-title text-3xl max-md:text-2xl  font-medium">', '</h1>'); ?>


<div class="flex justify-between items-center">

	<!-- @CYAN ADD SKU -->
	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>
		<div class="sku_wrapper text-gray-500 mt-3 max-md:mb-3"><?php esc_html_e('SKU:', 'woocommerce'); ?>
			<span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span>
		</div>
	<?php endif; ?>

	<?php if (! empty(get_field('english_name'))) : ?>
		<div class="text-gray-500">
			<?php echo get_field('english_name') ?>
		</div>
	<?php endif; ?>
</div>
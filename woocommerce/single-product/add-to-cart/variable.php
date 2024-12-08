<?php


defined('ABSPATH') || exit;

global $product;

$attribute_keys = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);

do_action('woocommerce_before_add_to_cart_form'); ?>

<form class="variations_form cart flex flex-col justify-center items-center gap-3"
	action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
	method="post"
	enctype='multipart/form-data'
	data-product_id="<?php echo absint($product->get_id()); ?>"
	data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. 
								?>">
	<?php do_action('woocommerce_before_variations_form'); ?>

	<?php if (empty($available_variations) && false !== $available_variations) : ?>
		<p class="stock out-of-stock">
			<?php echo esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); ?>
		</p>
	<?php else : ?>
		<div class="flex !mb-0 | variations"
			cellspacing="0"
			role="presentation">
			<div class="w-full">
				<?php foreach ($attributes as $attribute_name => $options) : ?>
					<div class="flex justify-between w-full items-center border-b py-4 w-">
						<div class="label">
							<label for="<?php echo esc_attr(sanitize_title($attribute_name)); ?>">
								<?php echo wc_attribute_label($attribute_name); // WPCS: XSS ok. 
								?>
							</label>
						</div>
						<div class="value ">
							<?php
							wc_dropdown_variation_attribute_options(
								array(
									'options' => $options,
									'attribute' => $attribute_name,
									'product' => $product,
									'class' => '!m-0 rounded-2xl border-violet-400 !min-w-60 max-sm:!min-w-52'
								)
							);
							echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations !hidden" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : '';
							?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php do_action('woocommerce_after_variations_table'); ?>

		<div
			class="flex justify-between w-full items-center max-md:flex-col max-md:gap-3 max-md:items-start | single_variation_wrap ">
			<?php
			/**
			 * Hook: woocommerce_before_single_variation.
			 */
			do_action('woocommerce_before_single_variation');

			/**
			 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
			 *
			 * @since 2.4.0
			 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
			 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
			 */
			do_action('woocommerce_single_variation');

			/**
			 * Hook: woocommerce_after_single_variation.
			 */
			do_action('woocommerce_after_single_variation');
			?>
		</div>
	<?php endif; ?>

	<?php do_action('woocommerce_after_variations_form'); ?>
</form>



<?php
do_action('woocommerce_after_add_to_cart_form');

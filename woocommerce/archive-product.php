<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

global $wp_query;
// var_dump( $wp_query->tax_query );

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20 @removed by CYAN
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content'); ?>


<div class="flex justify-between items-center p-4 bg-gray-200 rounded-lg max-md:flex-col max-md:items-start">
	<?php
	/**
	 * Hook: woocommerce_shop_loop_header.
	 *
	 * @since 8.6.0
	 *
	 * @hooked woocommerce_product_taxonomy_archive_header - 10 @removed by CYAN
	 * @hooked woocommerce_breadcrumb - 20 @added by cyan
	 * @hooked woocommerce_catalog_ordering - 30 @added by cyan
	 */
	do_action('woocommerce_shop_loop_header');
	?>
</div>

<div class="py-5"></div>

<div class="flex max-lg:flex-col gap-4">

	<div class="w-96 max-lg:hidden">
		<?php
		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
		?>
	</div>

	<div class="lg:hidden">
		<div class="flex p-4 justify-between rounded-lg border"
			id="filterOpener">
			<span class="text-lg">
				فیلتر ها
			</span>

			<div class="relative">

				<?php if (! empty($_GET)) : ?>
					<div class="absolute size-2 bg-red-600 left-0 top-0 rounded-full">
						<div class="animate-ping absolute size-2 bg-red-600 left-0 top-0 rounded-full">

						</div>
					</div>

				<?php endif; ?>

				<svg class="icon">
					<use href="#icon-Settings,-Filter-2" />
				</svg>
			</div>
		</div>
		<div id="filterOpening"
			class=" bg-white fixed inset-0 z-50 p-5 transition-all duration-300 [clip-path:polygon(100%_0%_,_100%_0%,_100%_100%,_100%_100%)] overflow-auto">

			<div id="filterCloser"
				class="flex p-4 justify-between rounded-lg border w-full ">
				<span>
					بستن
				</span>
				<svg class="icon rotate-45">
					<use href="#icon-plus" />
				</svg>
			</div>

			<div class="py-2"></div>

			<?php

			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action('woocommerce_sidebar');
			?>
		</div>
	</div>

	<div class="w-full">
		<?php
		if (woocommerce_product_loop()) {


			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20 @removed by CYAN
			 * @hooked woocommerce_catalog_ordering - 30 @removed by CYAN
			 */
			do_action('woocommerce_before_shop_loop');

			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action('woocommerce_shop_loop');

					wc_get_template_part('content', 'product');
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}

		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content'); ?>
	</div>

</div>



<?php if (get_the_archive_description()) : ?>
	<div class="p-8 container bg-gray-200 rounded-3xl mt-5">
		<div class="prose prose-img:rounded-2xl">
			<?php
			echo get_the_archive_description();
			?>
		</div>
	</div>
<?php endif; ?>

<?php
get_footer('shop');

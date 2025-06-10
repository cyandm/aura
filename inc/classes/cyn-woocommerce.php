<?php

if (! class_exists('cyn_woocommerce')) {
	class cyn_woocommerce
	{

		function __construct()
		{


			add_filter('woocommerce_breadcrumb_defaults', [$this, 'customize_breadcrumb']);
			add_filter('woocommerce_single_product_image_gallery_classes', [$this, 'product_image_wrapper_class']);
			add_filter('woocommerce_gallery_image_html_attachment_image_params', [$this, 'product_image_class']);
			add_filter('wc_price', [$this, 'price_class'], 10, 5);
			add_action('woocommerce_single_product_summary', [$this, 'woocommerce_template_table'], 6);
			add_action('woocommerce_product_loop_title_classes', [$this, 'title_card_class']);
			add_filter('woocommerce_variable_price_html', [$this, 'change_price_variable'], 10, 2);
			add_action('woocommerce_before_shop_loop_item', [$this, 'cyn_template_loop_product_link_open'], 5);
			add_filter('woocommerce_account_menu_items', [$this, 'customize_dashboard_nav'], 10, 2);
			add_filter('woocommerce_account_orders_columns', [$this, 'add_column_to_order'], 10, 1);
			add_filter('woocommerce_catalog_orderby', [$this, 'customize_orders_column'], 10, 1);
			add_filter('woocommerce_show_variation_price', '__return_true');
			add_filter('woocommerce_billing_fields', [$this, 'cyn_checkout_fields']);
			add_filter('woocommerce_default_address_fields', [$this, 'cyn_default_field']);
			add_filter('', [$this, '']);


			add_action('cyn_title', 'woocommerce_template_single_title', 5);

			add_action('woocommerce_shop_loop_header', 'woocommerce_breadcrumb', 20);

			// add_action( 'woocommerce_after_shop_loop_item_title', [ $this, 'cyn_display_gender' ], 10 );
			add_action('woocommerce_shop_loop_header', 'woocommerce_catalog_ordering', 30);

			$this->remove_actions();
		}


		function remove_actions()
		{

			remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

			remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

			remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

			remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
			remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

			remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
			remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);

			remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
			remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);

			remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
		}



		function customize_breadcrumb($breadcrumb_defaults)
		{
			$breadcrumb_defaults = [
				'delimiter' => '<span>←</span>',
				'wrap_before' => '<nav class="[&_*]:min-w-max max-w-full overflow-auto !py-2 [&_a]:text-gray-500 hover:[&_a]:text-gray-950 [&_a]:transition-colors [&_a]:duration-300 flex gap-2 text-gray-950" aria-label="Breadcrumb">',
				'wrap_after' => '</nav>',
				'before' => '<span>',
				'after' => '</span>',
				'home' => _x('Home', 'breadcrumb', 'woocommerce'),
			];

			return $breadcrumb_defaults;
		}

		function product_image_wrapper_class($class)
		{
			array_push($class, 'min-w-full');

			return $class;
		}

		function product_image_class($attrs)
		{

			$attrs['class'] = 'rounded-3xl border border-gray mb-3 ml-2';

			return $attrs;
		}

		function woocommerce_template_table()
		{
			global $product;
			do_action('woocommerce_product_additional_information', $product);
		}

		function price_class($return, $price, $args, $unformatted_price, $original_price)
		{

			$negative = $price < 0;

			$formatted_price = ($negative ? '-' : '') . sprintf($args['price_format'], '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol($args['currency']) . '</span>', $price);
			$return = '<span class="text-primary max-md:text-sm"><bdi class="">' . $formatted_price . '</bdi></span>';


			return $return;
		}

		function title_card_class($classes)
		{
			$classes .= 'text-lg md:mt-4 line-clamp-2 max-md:text-sm';

			return $classes;
		}

		function cyn_display_gender($product_secondary = null)
		{

			if (! empty($product_secondary)) {
				$product = $product_secondary;
			} else {
				global $product;
			}


			$attrs = $product->get_attributes();
			$gender = isset($attrs['pa_gender']) ? $attrs['pa_gender'] : null;

			if (is_null($gender))
				return;

			echo '<div class="flex gap-1">';

			foreach ($gender->get_terms() as $i => $term) :
				$name = $term->name;
				$class = '';
				$svg = '';

				if ($name === 'مردانه') {
					$class .= 'bg-sky-200 text-sky-800';
					$svg = file_get_contents(CYN_THEME_DIRECTORY . '/assets/svg/men.svg');
				}
				if ($name == 'زنانه') {
					$class .= 'bg-rose-200 text-rose-800';
					$svg = file_get_contents(CYN_THEME_DIRECTORY . '/assets/svg/women.svg');
				}

				if ($i === 0) {
					$class .= ' mr-1';
				}

				if ($name !== 'یونیسکس') {
					echo "<div class=\"rounded-lg p-[2px]  inline-flex items-center flex-row-reverse size-5 md:size-6 $class ?>\"> <span class=\"max-md:hidden \">  </span> <span>$svg</span> </div>";
				} else {
					echo "<div class=\"rounded-lg p-[2px]  inline-flex items-center flex-row-reverse size-5 md:size-6 bg-sky-200 text-sky-800 ?>\"> <span class=\"max-md:hidden \">  </span> <span> " .
						file_get_contents(CYN_THEME_DIRECTORY . '/assets/svg/men.svg') . " </span> </div>";

					echo "<div class=\"rounded-lg p-[2px]  inline-flex items-center flex-row-reverse size-5 md:size-6 bg-rose-200 text-rose-800 ?>\"> <span class=\"max-md:hidden \">  </span> <span>" .
						file_get_contents(CYN_THEME_DIRECTORY . '/assets/svg/women.svg') . "</span> </div>";
				}

			endforeach;

			echo '</div>';
		}

		function change_price_variable($price, $product)
		{
			$prices = $product->get_variation_prices(true);


			return '<span class="text-sm">شروع قیمت از:</span>' . wc_price(current($prices['price']));
		}

		function cyn_template_loop_product_link_open()
		{
			global $product;

			$link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

			echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link max-md:flex max-md:flex-row-reverse max-md:justify-between max-md:gap-2">';
		}

		function customize_dashboard_nav($items, $endpoints)
		{
			unset($items['downloads']);

			$new_items = [];

			foreach ($items as $key => $label) {
				$new_item = [
					'endpoint' => $key,
					'label' => $label,
					'icon' => '',
				];

				if ($key === 'dashboard') {
					$new_item['icon'] = '#icon-User,-Profile';
				}

				if ($key === 'orders') {
					$new_item['icon'] = '#icon-store-mobile-11';
				}

				if ($key === 'payment-methods') {
					$new_item['icon'] = '#icon-Infornation,-Info';
				}

				if ($key === 'edit-address') {
					$new_item['icon'] = '#icon-Pin,-Location-1';
				}

				if ($key === 'edit-account') {
					$new_item['icon'] = '#icon-Pen,-Edit,-Write';
				}

				if ($key === 'customer-logout') {
					$new_item['icon'] = '#icon-Sign-Out,-Right';
				}



				array_push($new_items, $new_item);
			}

			return $new_items;
		}

		function add_column_to_order($columns)
		{

			$insert = ['order-count' => __('تعداد محصولات', 'cyn-dm')];
			$columns = array_merge(array_slice($columns, 0, 4), $insert, array_slice($columns, 4));

			return $columns;
		}

		function customize_orders_column($order_items)
		{
			unset($order_items['menu_order']);
			unset($order_items['popularity']);
			unset($order_items['rating']);

			return $order_items;
		}

		function cyn_checkout_fields($fields)
		{

			$fields['billing_country']['class'] = 'hidden';
			$fields['billing_company']['class'] = 'hidden';
			$fields['billing_address_2']['class'] = '!hidden';

			$fields['billing_email']['required'] = false;
			$fields['billing_postcode']['required'] = false;
			$fields['billing_phone']['required'] = true;



			return $fields;
		}

		function cyn_default_field($fields)
		{
			$fields['email']['required'] = false;
			$fields['postcode']['required'] = false;

			$fields['city']['class'] = 'form-row-last';
			$fields['state']['class'] = 'form-row-first';

			$fields['state']['priority'] = '';
			$fields['city']['priority'] = '';
			$fields['address_1']['priority'] = '';



			return $fields;
		}
	}
}

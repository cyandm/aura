<?php

if (! class_exists('cyn_filters')) {
	class cyn_filters
	{

		function __construct()
		{
			add_action('cyn_woocommerce_filters', [$this, 'wrapper_start'], 5);
			add_action('cyn_woocommerce_filters', [$this, 'display_in_stock'], 10);
			add_action('cyn_woocommerce_filters', [$this, 'display_in_offer'], 15);
			add_action('cyn_woocommerce_filters', [$this, 'display_terms'], 20);
			add_action('cyn_woocommerce_filters', [$this, 'display_price'], 30);
			add_action('cyn_woocommerce_filters', [$this, 'display_submit_button'], 90);
			add_action('cyn_woocommerce_filters', [$this, 'wrapper_end'], 100);


			add_action('woocommerce_product_query', [$this, 'apply_filter']);
		}

		function wrapper_start()
		{
			echo '<form action="" method="get" class="filters |  divide-y [&_>_*]:py-4">';
			echo '<div class="text-lg font-semibold"> فیلتر ها </div>';
		}

		function display_in_stock()
		{

?>
			<label class="flex items-center justify-between gap-3 cursor-pointer">
				<input type="checkbox"
					<?php echo ! empty($_GET['in_stock']) ? 'checked' : '' ?>

					name="in_stock"
					class="sr-only peer">
				<span class="ms-3 text-lg  text-gray-900 dark:text-gray-300">نمایش محصولات موجود</span>

				<div
					class="relative peer-checked:bg-violet-400 w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-violet-400 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all">
				</div>
			</label>

		<?php

		}
		function display_in_offer()
		{

		?>
			<label class="flex items-center justify-between gap-3 cursor-pointer">
				<input type="checkbox"
					<?php echo ! empty($_GET['in_offer']) ? 'checked' : '' ?>
					name="in_offer"
					class="sr-only peer">

				<span class="ms-3 text-lg  text-gray-900 dark:text-gray-300">نمایش محصولات تخفیف دار</span>

				<div
					class="relative peer-checked:bg-violet-400 w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-violet-400 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all">
				</div>
			</label>

<?php
		}

		function display_terms()
		{

			$category = get_term_by('slug', get_query_var('product_cat'), 'product_cat');
			if (empty($category)) {
				return;
			}



			$taxonomies = get_field('filters', 'product_cat_' . $category->term_id);
			$taxonomies = !empty($taxonomies) ? $taxonomies : [];


			foreach ($taxonomies as $tax) {
				wc_get_template('global/tax-filter.php', ['tax' => $tax]);
			}
		}

		function display_price()
		{
			wc_get_template('global/price-filter.php');
		}

		function display_submit_button()
		{

			$button = '<button class="primary-btn px-4 py-2 text-md max-md:w-full">';
			$button .= 'اعمال فیلترها';
			$button .= '</button>';

			printf('<div class="w-full flex justify-end"> %s </div>', $button);
		}

		function wrapper_end()
		{
			echo '</form>';
		}


		function apply_filter(WP_Query $query)
		{
			if (is_admin() || ! $query->is_main_query() || ! $query->is_archive())
				return;


			if (empty($_GET))
				return;


			function inStock(WP_Query $query)
			{


				$meta = $query->get('meta_query');

				array_push($meta, [
					'key' => '_stock_status',
					'compare' => '==',
					'value' => 'instock'
				]);

				$query->set('meta_query', $meta);
			}

			function inOffer(WP_Query $query)
			{

				$product_ids_on_sale = wc_get_product_ids_on_sale();
				$query->set('post__in', $product_ids_on_sale);
			}

			function taxFilter(WP_Query $query, $key)
			{
				$tax_arr = explode('_', $key);

				$term_id = end($tax_arr);
				$taxonomy_slug = implode('_', array_splice($tax_arr, 1, count($tax_arr) - 2));

				$term = get_term($term_id, $taxonomy_slug);

				$tax_query = $query->get('tax_query');

				if (is_array($tax_query)) {
					foreach ($tax_query as $index => $tax_item) {
						if (!isset($tax_item['taxonomy'])) {
							continue;
						}

						if ($tax_item['taxonomy'] == $taxonomy_slug) {

							array_push($tax_query[$index]['terms'], $term_id);
							$query->set('tax_query', $tax_query);

							return;
						}
					}
				}

				array_push($tax_query, [
					'taxonomy' => $taxonomy_slug,
					'filed' => 'term_id',
					'terms' => [$term->term_id],
				]);

				$query->set('tax_query', $tax_query);
			}

			function priceFilter(WP_Query $query)
			{

				$meta = $query->get('meta_query');

				if (is_array($meta)) {
					foreach ($meta as $meta_item) {
						if ($meta_item['key'] === '_price') {
							return;
						}
					}
				}


				$min = str_replace(',', '', $_GET['minPrice']);
				$max = str_replace(',', '', $_GET['maxPrice']);


				array_push($meta, [
					'key' => '_price',
					'type' => 'NUMERIC',
					'compare' => 'BETWEEN',
					'value' => [$min, $max]
				]);

				$query->set('meta_query', $meta);
			}


			foreach ($_GET as $key => $value) {

				switch ($key) {

					case 'in_stock':
						inStock($query);
						break;

					case 'in_offer':
						inOffer($query);
						break;

					case str_contains($key, 'tax_'):
						taxFilter($query, $key);
						break;

					case 'minPrice':
					case 'maxPrice':
						priceFilter($query);
						break;

					default:
						return;
				}
			}
		}
	}
}

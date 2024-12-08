<?php
if (! defined('ABSPATH')) {
	exit;
}
?>

<div class="space-y-2">
	<div class="text-2xl">
		دسته بندی محصولات
	</div>


	<form action="/"
		id="productCat">
		<div class="[&_select]:w-full">
			<?php
			wp_dropdown_categories([
				'show_option_none' => 'هیچکدام',
				'option_none_value' => 'shop',
				'selected' => -1,
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent' => 0,
				'class' => 'form-select rounded-lg border border-gray-300 cursor-pointer w-full',
				'value_field' => 'slug'
			]);
			?>
		</div>

		<input type="hidden"
			name="baseUrl"
			value="<?php echo site_url(get_option('woocommerce_permalinks')['category_base']) ?>">

		<input type="hidden"
			name="categoryBase"
			value="<?php echo get_option('woocommerce_permalinks')['category_base'] ?>">
	</form>
</div>
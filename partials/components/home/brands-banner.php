<?php
if (false === function_exists('render_grid_items')) {
	function render_grid_items($brand_category, $className)
	{

		if (empty($brand_category)) return;
?>
		<a href="<?php echo esc_url($brand_category['brand_link']) ?>" class="<?php echo $className ?> relative group">
			<?php echo wp_get_attachment_image($brand_category['brand_img'], 'full', false, ['class' => 'w-full object-cover h-full']) ?>

			<div class="absolute bg-white/50 xl:backdrop-blur-xl py-1 pl-4 pr-6 bottom-6 rounded-l-xl font-medium text-2xl text-zinc-800 flex items-center">
				<span class="w-full">
					<?php echo $brand_category['brand_category_title'] ?>
				</span>
				<svg class="icon -rotate-90 transition-all group-hover:-translate-x-2 size-8">
					<use href="#icon-Arrow,-Up-1" />
				</svg>
			</div>

		</a>
<?php
	}
}

?>

<?php
$brand_cat_1 = get_field('brand_cat_1');
$brand_cat_2 = get_field('brand_cat_2');
$brand_cat_3 = get_field('brand_cat_3');
$brand_cat_4 = get_field('brand_cat_4');
$brand_categories_title = get_field('brand_categories_title');

if (!empty($brand_cat_1["brand_img"]) && !empty($brand_cat_2["brand_img"]) && !empty($brand_cat_3["brand_img"]) && !empty($brand_cat_4["brand_img"])):
?>

	<section class="my-9 max-w-full">

		<div class="container flex gap-2 flex-col items-center">



			<div class="w-full flex flex-row justify-between">

				<h2 class="text-title_2 font-normal lg:text-title_1 text-zinc-800">
					<?php echo $brand_categories_title ?>
				</h2>

				<a href="<?php echo get_post_type_archive_link('product') ?>"
					class="group hidden lg:flex items-center justify-end gap-2 order-3 lg:order-2 mt-4 mb-6 lg:text-left text-zinc-800">
					<span>
						مشاهده همه
					</span>
					<svg class="icon -rotate-90 transition-all group-hover:-translate-x-2">
						<use href="#icon-Arrow,-Up-1" />
					</svg>
				</a>

			</div>

			<div class="w-full grid grid-cols-10 grid-rows-2 max-sm:grid-rows-4 h-[533px] max-sm:h-[900px]">

				<?php
				render_grid_items($brand_cat_1, 'col-span-5 row-span-2 [&>img]:rounded-r-3xl max-lg:col-span-5 max-lg:row-span-1 max-sm:col-span-10 max-lg:[&>img]:rounded-r-none max-lg:[&>img]:rounded-tr-3xl max-sm:[&>img]:rounded-tl-3xl');
				render_grid_items($brand_cat_2, 'col-span-3 row-span-2 max-lg:col-span-5 max-lg:row-span-1 max-sm:col-span-10 max-lg:[&>img]:rounded-tl-3xl max-sm:[&>img]:rounded-l-none');
				render_grid_items($brand_cat_3, 'col-span-2 row-span-1 [&>img]:rounded-tl-3xl max-lg:col-span-5 max-lg:row-span-1 max-sm:col-span-10 max-lg:[&>img]:rounded-tl-none max-lg:[&>img]:rounded-br-3xl max-sm:[&>img]:rounded-r-none');
				render_grid_items($brand_cat_4, 'col-span-2 row-span-1 [&>img]:rounded-bl-3xl max-lg:col-span-5 max-lg:row-span-1 max-sm:col-span-10 max-sm:[&>img]:rounded-br-3xl');
				?>

			</div>

		</div>

	</section>

<?php endif ?>
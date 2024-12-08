<?php

$home_blog_id = get_option('page_for_posts');

$feature_posts = get_field('feature_posts', $home_blog_id);
$selected_cats = get_field('selected_cats', $home_blog_id);

$view_all = get_field('view_all', $home_blog_id);

?>

<?php get_header() ?>

<main class="container">

	<?php if (! empty($feature_posts)) : ?>
		<div class="grid gap-2 md:grid-cols-3">
			<?php foreach ($feature_posts as $index => $post_id) : ?>
				<?php cyn_get_card('general', [
					'title' => get_the_title($post_id),
					'link' => get_permalink($post_id),
					'img_id' => get_post_thumbnail_id($post_id),
					'class' => in_array($index, [0, 3]) ? 'md:col-span-2' : 'md:col-span-1'
				]) ?>
			<?php endforeach; ?>
		</div>


		<div class="py-2 md:py-5"></div>
	<?php endif; ?>


	<?php if (! empty($selected_cats)) : ?>

		<div>
			<h2 class="text-xl md:text-4xl font-medium">دسته بندی مقالات</h2>
		</div>

		<div class="py-2 md:py-4"></div>


		<div class="hidden md:grid gap-3 grid-cols-3">
			<?php foreach ($selected_cats as $index => $cat_slug) :

				$category = get_category_by_slug($cat_slug);

			?>

				<a href="<?php echo get_term_link($category, 'category') ?>"
					class="<?php echo in_array($index, [1, 2]) ? 'col-span-2' : 'col-span-1' ?> rounded-4xl overflow-hidden relative  after:absolute after:inset-0 after:bg-black/70 hover:after:bg-black/40 after:transition-colors after:pointer-events-none">
					<?php echo wp_get_attachment_image(get_field('custom_thumbnail', 'category_' . $category->term_id), 'full', false, ['class' => 'w-full h-full object-cover']) ?>

					<div
						class="absolute inset-0 flex justify-center items-center text-xl md:text-3xl text-white opacity-0 hover:opacity-100 transition-opacity z-20">
						<?php echo $category->name ?>
					</div>
				</a>

			<?php endforeach; ?>
		</div>

		<div class="md:hidden">
			<swiper-container space-between="8"
				pagination="true"
				pagination-el="#categoryPagination">
				<?php foreach ($selected_cats as $index => $cat_slug) :
					$category = get_category_by_slug($cat_slug);

				?>
					<swiper-slide>
						<?php cyn_get_card('general', [
							'title' => $category->name,
							'link' => get_term_link($category, 'category'),
							'img_id' => get_field('custom_thumbnail', 'category_' . $category->term_id),
						]) ?>
					</swiper-slide>
				<?php endforeach; ?>
			</swiper-container>
			<div id="categoryPagination"
				class="flex justify-center my-3"> </div>
		</div>

		<div class="py-5"></div>

	<?php endif; ?>

	<div class="flex justify-between items-center">
		<h2 class="text-title_2 font-normal lg:text-title_1 text-zinc-800">مقالات تازه منتشر شده</h2>

		<a href="<?php echo $view_all ?>" class="group hidden lg:flex items-center justify-end gap-2 order-3 lg:order-2 mt-4 mb-6 lg:text-left text-zinc-800">
			<span>مشاهده همه</span>

			<svg class="icon -rotate-90 transition-all group-hover:-translate-x-2 size-8">
				<use href="#icon-Arrow,-Up-1" />
			</svg>
		</a>
	</div>

	<div class="py-4"></div>


	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 [&_>_*]:flex-1 max-md:flex-col">
		<?php foreach (get_posts(['posts_per_page' => 8]) as $post) : ?>
			<?php cyn_get_card('post') ?>
		<?php endforeach; ?>
	</div>

</main>

<?php get_footer() ?>
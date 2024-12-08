<?php

defined('ABSPATH') || exit;

global $wp_query;

$search_type = empty($_GET['search-type']) ? 'all' : $_GET['search-type'];

?>

<?php get_header() ?>

<div class="py-4 container">
	<?php if (function_exists('rank_math_the_breadcrumbs')) {
		rank_math_the_breadcrumbs();
	}
	?>
</div>

<div class="container">
	<div id="searchPostType"
		class="bg-gray-200 py-2 flex justify-between items-center rounded-lg px-4 max-md:flex-col max-md:gap-5">

		<form id="search-form"
			class="flex max-md:flex-col gap-2 max-md:w-full">

			<div class="">
				<div class="relative">
					<div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
						<svg class="icon">
							<use href="#icon-Search" />
						</svg>
					</div>
					<input type="text"
						id="email-address-icon"
						name="s"
						value="<?php the_search_query() ?>"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
						placeholder="جستجو نمایید">
				</div>
			</div>

			<div class='max-md:px-2'>
				<div class="flex justify-start items-center gap-2 max-sm:flex-col max-sm:items-start">

					<div class="">
						جستجو در :
					</div>

					<div class="flex">

						<div class="p-2 flex-wrap flex gap-2">
							<div class="flex justify-center items-center gap-1">
								<input class=""
									value="all"
									type="radio"
									name="search-type"
									id="search-all"
									<?php echo $search_type === 'all' ? 'checked' : '' ?>>
								<label for="product">همه</label>
							</div>

							<div class="flex justify-center items-center gap-1">
								<input class=""
									value="product"
									type="radio"
									name="search-type"
									id="search-product"
									<?php echo $search_type === 'product' ? 'checked' : '' ?>>
								<label for="product">محصولات</label>
							</div>

							<div class="flex justify-center items-center gap-1">
								<input class="custom filter blog_input"
									value="post"
									type="radio"
									name="search-type"
									id="search-blog"
									<?php echo $search_type === 'post' ? 'checked' : '' ?>>
								<label for="blog">نوشته ها</label>
							</div>

						</div>
					</div>
				</div>
			</div>
		</form>


		<div class="">
			<?php if (! empty($_GET['s'])) : ?>
				<span class="">
					<?php echo $wp_query->post_count . ' نتیجه' ?>
				</span>
			<?php endif ?>
		</div>
	</div>

	<div class="p-2">


		<?php if (! empty($_GET['s'])) : ?>

			<?php if (have_posts()) : ?>

				<div id="searchPostsWrapper"
					class="space-y-4">
					<?php while (have_posts()) :
						the_post()
					?>
						<div class="">
							<?php cyn_get_card('search') ?>
						</div>
					<?php endwhile; ?>
				</div>

			<?php
			else :
				cyn_get_component('search-not-found');
			endif;
			?>

		<?php endif; ?>
	</div>
</div>


<?php get_footer() ?>
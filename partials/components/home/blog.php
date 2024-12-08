<?php
$query = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 3,
]);

?>

<section class="my-9 max-w-full">
	<div class="container flex gap-2 flex-col items-center">

		<div class="w-full flex flex-row justify-between">
			<h2 class="text-title_2 font-normal lg:text-title_1 text-zinc-800">📝️ مقالات</h2>

			<a href="<?= get_post_type_archive_link('post') ?>" class="flex items-center group gap-2 order-3 lg:order-2 mt-4 mb-6 text-center lg:text-right">
				<span>
					مشاهده همه
				</span>

				<svg class="icon -rotate-90 transition-all group-hover:-translate-x-2">
					<use href="#icon-Arrow,-Up-1" />
				</svg>

			</a>
		</div>

		<div class="order-2 lg:order-3 w-full">
			<?php
			if ($query->have_posts()) : ?>

				<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 lg:gap-5">

					<?php while ($query->have_posts()) :
						$query->the_post();
						cyn_get_card('post');
					endwhile;
					?>
				</div>

			<?php
			else :
				cyn_get_component('not-found', ['post-type' => 'post']);
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
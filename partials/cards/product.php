<?php
$postId = $args['post-id'] ?? get_the_ID();
$product = wc_get_product($postId);


$varProducts = $product->get_children();
?>

<a href="<?php echo esc_url(get_permalink($product->get_id())); ?>" class="w-full not-prose swiper-slide py-2">

	<div class="h-full p-4 rounded-3xl relative justify-between group overflow-hidden transition-all duration-500 shadow-cxl bg-white hover:shadow-cxt border border-transparent hover:border-violet-400/30">

		<div class="aspect-w-1 aspect-h-1">

			<?php
			if (has_post_thumbnail($product->get_id())) {
				echo get_the_post_thumbnail($product->get_id(), [600, 600], ['class' => 'w-full max-h-full !h-full object-cover not-prose rounded-3xl']);
			} else {
				echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/placeholder-image.webp') . '" alt="Default Image" class="w-full max-h-full !h-full object-cover not-prose rounded-3xl">';
			}
			?>

		</div>

		<div class="flex flex-col gap-3 pt-2 h-full">

			<div class="grid gap-2 flex-col">

				<div class="text-base font-medium min-h-12">
					<?php echo esc_html(get_the_title($product->get_id())); ?>
				</div>

				<?php if ($product->get_price_html()): ?>

					<div class="py-3 px-2 bg-neutral-200 rounded-xl text-base font-medium transition-all duration-500 group-hover:bg-violet-400 group-hover:text-white text-center mt-auto">
						<?php echo $product->get_price_html(); ?>
					</div>

				<?php endif; ?>

			</div>
		</div>

		<?php if ($product->get_stock_status() === 'outofstock'): ?>
			<div class="absolute top-0 left-0 p-2">
				<p class="py-1 px-2 bg-red-800 rounded-full text-white text-sm font-normal">
					نا موجود
				</p>
			</div>
		<?php endif; ?>

	</div>
</a>
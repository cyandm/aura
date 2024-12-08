<?php
$post_ID = $args['post-id'] ?? get_the_ID();
$rel = $args['rel'] ?? 'dofollow';
?>



<a rel="<?php echo $rel ?>"
	href="<?php echo get_permalink($post_ID) ?>"
	class="flex gap-3">
	<div>
		<div>
			<p class="text-base font-bold">
				<?php echo get_the_title($post_ID) ?>
			</p>

			<p class="text-gray-500 line-clamp-2">
				<?php echo cyn_limit_str(get_the_excerpt($post_ID), 15) ?>
			</p>
		</div>

		<div class="flex justify-between text-gray-500 pt-2">

			<div>
				<?php echo get_the_date() ?>
			</div>

			<div>
				<?php echo get_the_author() ?>
			</div>
		</div>
	</div>

	<div>
		<?php
		if (has_post_thumbnail($post_ID)) {
			echo get_the_post_thumbnail($post_ID, [100, 100], ['class' => 'rounded-md min-w-[100px]']);
		} else {
			echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/placeholder-image.webp') . '" alt="Default Image" class="rounded-md min-w-[100px] max-w-[100px]">';
		}
		?>
	</div>

</a>
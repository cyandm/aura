<?php
$postID = $args['post-id'] ?? get_the_ID();
$classes = $args['class'] ?? '';
$inner_class = $args['inner-class'] ?? '';

?>


<a href="<?php the_permalink($postID) ?>"
	class="rounded-none md:rounded-3xl overflow-hidden relative flex my-2 md:my-0 border-b  md:border-b-0 pb-5 md:pb-0 items-center isolate <?php echo $classes ?>">
	<div class="flex flex-row-reverse md:block h-full xl:w-full <?php echo $inner_class ?>">
		<div class="md:size-full min-w-28 md:min-h-96">
			<?php
			if (has_post_thumbnail($postID)) {
				echo get_the_post_thumbnail($postID, 'full', ['class' => 'rounded-lg md:rounded-none md:size-full size-28 object-cover']);
			} else {
				echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/placeholder-image.webp') . '" alt="Default Image" class="rounded-lg md:rounded-none md:size-full size-28 object-cover">';
			}
			?>
		</div>
		<div class="px-3 py-0 md:py-3 bg-white/65 relative md:absolute md:bottom-0 md:right-0 md:left-0 backdrop-blur-xl flex flex-col justify-between">
			<div>
				<h3 class="text-neutral-950 text-base font-medium mb-1 line-clamp-1">
					<?= get_the_title($postID); ?>
				</h3>
				<p class="text-base font-normal text-gray-800 md:text-base  mb-1 leading-6 md:leading-7 line-clamp-2">
					<?= get_the_excerpt($postID) ?>
				</p>
			</div>
			<ul class="flex flex-wrap gap-6 text-xs text-neutral-400">
				<li>
					<svg class="icon size-4">
						<use href="#icon-calendar" />
					</svg>
					<span>
						<?= get_the_date('', $postID); ?>
					</span>
				</li>
				<li>
					<svg class="icon size-4">
						<use href="#icon-Pen,-Edit,-Write" />
					</svg>
					<span>
						<?= get_the_author_meta('display_name', get_post($postID)->post_author); ?>
					</span>
				</li>
			</ul>
		</div>
	</div>

</a>
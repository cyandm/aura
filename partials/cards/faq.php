<?php
$postId = $args['post-id'] ?? get_the_ID();

if ($postId === 0) {
	throw new ErrorException('post id is invalid', 0, E_WARNING);
}

?>

<div class="py-6 | faq-card"
	id="<?php echo "faq-$postId" ?>">
	<div class="faq-toggle | flex justify-between gap-2 items-center cursor-pointer">
		<span class="max-md:text-body_s text-primary-20 text-zinc-800 text-base font-medium">
			<?php echo '• ' . get_the_title($postId) ?>
		</span>

		<svg class="icon size-4 fill-primary-50 stroke-primary-50 text-primary-50 transition-all text-zinc-800">
			<use href="#icon-plus"></use>
		</svg>
	</div>

	<div class="faq-expert | text-primary-40 text-body_s grid grid-rows-[0fr] transition-all duration-300">
		<div class="overflow-hidden">
			<div class="pt-4 [&_a]:text-[#172EF9] [&_a]:underline text-neutral-600 text-base font-normal">
				<?php echo get_the_content(null, false, $postId) ?>
			</div>
		</div>
	</div>
</div>
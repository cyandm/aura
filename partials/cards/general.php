<?php
$img_id = $args['img_id'];
$title = $args['title'];
$link = $args['link'];
$class = $args['class'] ?? '';

?>


<a href="<?php echo $link ?>"
   class="relative block h-[12rem] md:h-[24rem] rounded-2xl overflow-hidden <?php echo $class ?>">
	<?php echo wp_get_attachment_image( $img_id, 'full', false, [ 'class' => 'w-full h-full object-cover' ] ) ?>

	<div class="p-3 bg-white/65 absolute bottom-0 right-0 left-0 backdrop-blur-xl flex justify-between items-center">
		<h3 class="text-black text-base mb-1 line-clamp-1">
			<?= $title ?>
		</h3>

		<svg class="icon size-6 -rotate-90">
			<use href="#icon-Arrow,-Up-1" />
		</svg>
	</div>

</a>
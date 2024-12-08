<?php
$post_type = $args['post-type'] ?? 'post';
$obj = get_post_type_object($post_type);



?>


<div class="w-full bg-violet-400 text-white p-4 rounded-lg">
	<div class="text-title_2 text-center">
		<?php echo get_post_type_labels($obj)->not_found . '!' ?>
	</div>
</div>
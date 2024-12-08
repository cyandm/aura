<?php
$categories = get_terms([
	'taxonomy' => 'category',
]);

?>

<!-- Categories  -->
<div>
	<div class="text-2xl pb-2 font-medium">
		<?php _e('دسته بندی ها', 'cyn-dm') ?>
	</div>

	<div class="grid gap-2">

		<?php foreach ($categories as $index => $cat) : ?>
			<div class="border border-gray-200 rounded-md p-2">
				<a href="<?php echo get_term_link($cat) ?> " class="w-full block">
					<?php echo $cat->name ?>
				</a>
			</div>
		<?php endforeach; ?>

	</div>

</div>
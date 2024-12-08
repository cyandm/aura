<?php


$new_posts = get_posts( [ 
	'posts_per_page' => 3,
	'post__not_in' => [ get_the_ID() ]
] );

?>


<!-- New Posts -->
<div>
	<div class="text-2xl pb-2 font-medium">
		<?php _e( 'تازه منتشر شده', 'cyn-dm' ) ?>
	</div>

	<div class="grid gap-3 divide-y divide-gray-300 [&:not(:first-child)]:[&_>_*]:pt-5">
		<?php
		foreach ( $new_posts as $post ) {
			cyn_get_card( 'post-mini', [ 'rel' => 'nofollow' ] );
		}

		wp_reset_postdata();
		?>
	</div>
</div>
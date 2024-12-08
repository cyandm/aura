<?php
/* Template name: magazine */

$query = new WP_Query( [ 
	'post_type' => 'post',
	'posts_per_page' => 12,
] );

?>


<?php get_header() ?>

<main class="container flex gap-5 max-lg:flex-col-reverse">

	<?php cyn_get_component( 'sidebar-archive-blog' ) ?>

	<div class='w-full'>
		<?php if ( $query->have_posts() ) : ?>
			<div class="space-y-4">
				<div class="grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3  xl:grid-cols-4  gap-4">

					<?php
					while ( $query->have_posts() ) :
						$query->the_post();

						cyn_get_card( 'post' );
					endwhile;
					?>

				</div>

				<div>
					<?php cyn_get_component( 'pagination', [ 'query' => $query ] ) ?>
				</div>
			</div>
		<?php else : ?>
			<div class="bg-blue-100 border-r-4 border-blue-700 p-2 w-full rounded-md">
				متاسفانه هیچ مقاله ای یافت نشد!
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer() ?>
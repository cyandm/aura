<?php
$query = new WP_Query([
	'post_type' => 'slider',
	'posts_per_page' => -1,
]);

if (!$query->have_posts()) return;
?>

	<section class="mb-7 -mt-[var(--header-height)]">
		<div class="lg:h-screen z-10 relative">
			<swiper-container class="lg:h-screen" autoplay="true">
				<?php
				if ($query->have_posts()) :
					while ($query->have_posts()) :
						$query->the_post();
				?>
						<swiper-slide>
							<?php cyn_get_card('slider') ?>
						</swiper-slide>
				<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</swiper-container>
		</div>
	</section>
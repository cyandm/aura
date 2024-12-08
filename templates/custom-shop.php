<?php
/* Template name: custom-shop */

$banner_1 = get_field( 'banner_1' );
$banner_2 = get_field( 'banner_2' );
$banner_3 = get_field( 'banner_3' );

$has_banners = ! empty( $banner_1 ) && ! empty( $banner_2 ) && ! empty( $banner_3 );

?>

<?php get_header() ?>

<main class="container">

	<?php if ( $has_banners ) : ?>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<div>
					<?php cyn_get_card( 'general',
						[ 
							'title' => get_field( "banner_text_$i" ),
							'link' => get_field( "banner_link_$i" ),
							'img_id' => get_field( "banner_$i" ),
						] ) ?>
				</div>
			<?php endfor; ?>
		</div>

	<?php endif; ?>


	<?php for ( $i = 1; $i <= 10; $i++ ) :
		$text = get_field( "product_text_$i" );
		$products = get_field( "products_$i" );
		$link = get_field( "product_link_$i" );

		if ( empty( $text ) || empty( $products ) || empty( $link ) )
			continue;
		?>

		<section class="mt-16  woocommerce">
			<div class="flex justify-between items-center mb-4">
				<h2 class="text-xl font-normal lg:text-3xl"><?php echo $text ?></h2>


				<a href="<?= $link ?>"
				   class="lg:flex items-center gap-2 hidden text-center lg:text-right">
					<span>
						مشاهده همه
					</span>

					<svg class="icon -rotate-90">
						<use href="#icon-Arrow,-Up-1" />
					</svg>

				</a>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 ">
				<?php foreach ( $products as $product_ID ) {
					$product = wc_get_product( $product_ID );
					wc_get_template_part( 'content', 'product' );
				} ?>
			</div>

			<a href="<?= $link ?>"
			   class="flex items-center justify-center my-4 gap-2 lg:hidden text-center lg:text-right">
				<span>
					مشاهده همه
				</span>

				<svg class="icon -rotate-90">
					<use href="#icon-Arrow,-Up-1" />
				</svg>

			</a>

		</section>

	<?php endfor; ?>

</main>

<?php get_footer() ?>
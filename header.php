<?php
$render_template = $args['render_template'] ?? true;
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>
	class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body <?php body_class('overflow-x-hidden font-peyda') ?>>
	<?php wp_body_open() ?>

	<?php //cyn_get_component( 'preloader' ) 
	?>

	<?php if ($render_template) : ?>

		<svg id="chevron-down"
			class="icon hidden">
			<use href="#icon-chevron-down" />
		</svg>

		<header class="bg-transparent xl:bg-white/50 xl:backdrop-blur-xl py-4 flex items-center relative z-20">
			<div class="container mx-auto px-4">
				<div class="grid grid-cols-12 items-center">
					<div class="col-span-1 hidden xl:block">
						<?php
						if (function_exists('the_custom_logo')) {
							the_custom_logo();
						}
						?>
					</div>


					<div class="col-span-12 xl:col-span-8 flex gap-1 justify-between">



						<div class="block xl:hidden "
							id="menu-slide-icon">
							<svg class="icon rotate-180 bg-violet-400 rounded-full text-white size-10 p-2">
								<use href="#icon-menu-burger-square" />
							</svg>
						</div>

						<div class="block xl:hidden">
							<a href="/">
								<div class="bg-violet-400 rounded-full size-10 p-1.5 flex">
									<img src="<?php echo get_option('header_custom_logo') ?>"
										alt="">
								</div>

							</a>
						</div>

						<?php wp_nav_menu([
							'menu_id' => 'main-menu',
							'menu_class' => 'hidden gap-5 text-primary xl:flex text-neutral-950',
							'depth' => '3',
							'theme_location' => 'header_menu',
							'container' => 'ul'
						]); ?>
					</div>

					<div class="flex flex-wrap gap-3 col-span-6 xl:col-span-3  items-center justify-end">


						<a href="<?= get_site_url() . '/?s=&search-type=all' ?>"
							class="hidden xl:block shadow-md rounded-3xl text-primary xl:bg-white/20 bg-opacity-16 w-10 h-10 text-center leading-10">
							<svg class="icon text-neutral-950">
								<use href="#icon-Search" />
							</svg>
						</a>
						<a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
							class="hidden xl:block shadow-md rounded-3xl text-primary xl:bg-white/20 bg-opacity-16 w-10 h-10 text-center leading-10">
							<svg class="icon text-neutral-950">
								<use href="#icon-User,-Profile" />
							</svg>
						</a>

						<a href="<?= wc_get_cart_url() ?>" class="hidden xl:block shadow-md rounded-3xl text-primary bg-white bg-opacity-16 h-10 text-center relative primary-btn small-btn pt-2 text-xs font-medium">

							<div class="absolute bg-blue-900 text-white -top-1 -right-1 size-4 rounded-full flex items-center justify-center text-xs">
								<?php echo WC()->cart->get_cart_contents_count() ?>
							</div>

							<svg class="icon">
								<use href="#icon-Shopping-Cart" />
							</svg>

							<span>سبد خرید</span>

						</a>

					</div>
				</div>
			</div>

			<?php cyn_get_component('/mobile-menu') ?>
		</header>

		<?php cyn_get_component('/popup') ?>

	<?php endif; ?>

	<svg class="icon hidden"
		id="trashIcon">
		<use href="#icon-trash-delete-bin-2-1" />
	</svg>
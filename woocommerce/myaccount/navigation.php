<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

if (! defined('ABSPATH')) {
	exit;
}
global $wp;

do_action('woocommerce_before_account_navigation');
?>

<div class="py-5">
	<h1 class="text-2xl">
		<?php echo get_user_meta(get_current_user_id(), 'nickname', true) ?>
	</h1>

	<span class="text-gray-600">
		به گالری سراد خوش آمدید
	</span>
</div>

<nav class="woocommerce-MyAccount-navigation"
	aria-label="<?php esc_html_e('Account pages', 'woocommerce'); ?>">
	<ul class="space-y-2 [&_.is-active_a]:border-violet-400 [&_.is-active_a]:text-violet-400 max-md:hidden">
		<?php foreach (wc_get_account_menu_items() as $item) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes($item['endpoint']); ?>">
				<a class=" border-gray-200 border p-2 rounded-lg flex justify-between"
					href="<?php echo esc_url(wc_get_account_endpoint_url($item['endpoint'])); ?>">
					<span>
						<?php echo esc_html($item['label']); ?>
					</span>

					<svg class="icon">
						<use href="<?php echo $item['icon'] ?>"></use>
					</svg>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<div class="select-box relative mb-4 md:hidden">
		<div class="select-box-selector | rounded-full pl-3 pr-4 py-2 border bg-white border-primary-70 flex justify-between items-center">

			<span class="select-box-value">
				انتخاب
				<?php

				foreach (wc_get_account_menu_items() as $item) {

					if (isset($wp->query_vars[$item['endpoint']])) {
						echo $item['label'];
					}
				}


				?>

			</span>

			<svg class="size-4 transition-all duration-300">
				<use href="#icon-chevron-down"></use>
			</svg>


			<div
				class="select-box-panel | bg-white px-4 rounded-xl divide-y divide-primary-90  shadow-md absolute top-12 right-0 w-full z-50 opacity-0 -translate-y-4 pointer-events-none transition-all duration-300">

				<?php foreach (wc_get_account_menu_items() as $item) : ?>
					<a href="<?php echo esc_url(wc_get_account_endpoint_url($item['endpoint'])); ?>"
						class="py-3 select-box-option flex justify-between items-center">

						<span>
							<?php echo esc_html($item['label']); ?>
						</span>

						<span>
							<svg class="icon">
								<use href="<?php echo $item['icon'] ?>"></use>
							</svg>
						</span>
					</a>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>
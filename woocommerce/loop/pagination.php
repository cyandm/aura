<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<div class="flex justify-between items-center mt-3 flex-col gap-2 md:flex-row">
	<nav
		 class="woocommerce-pagination flex  [&_.current]:!text-white [&_.current]:!bg-black [&_ul]:!flex [&_ul]:gap-2 [&_ul]:!border-none [&_li]:!border [&_li]:!rounded-md [&_li]:!size-8">
		<?php
		echo paginate_links(
			apply_filters(
				'woocommerce_pagination_args',
				array( // WPCS: XSS ok.
					'base' => $base,
					'format' => $format,
					'add_args' => false,
					'current' => max( 1, $current ),
					'total' => $total,
					'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
					'next_text' => is_rtl() ? '&larr;' : '&rarr;',
					'type' => 'list',
					'end_size' => 1,
					'mid_size' => 1,
				)
			)
		);
		?>
	</nav>

	<div class="border rounded-md p-2 text-sm">
		<?php woocommerce_result_count() ?>
	</div>
</div>
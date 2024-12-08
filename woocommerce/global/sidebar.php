<?php

/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */


if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

?>

<div class="space-y-4">

	<?php //echo do_shortcode( '[cyn_showcase]' ) 
	?>

	<?php wc_get_template('global/category-drop-down.php') ?>


	<div class="">
		<?php
		/**
		 * Hook: cyn_woocommerce_filters.
		 * @hooked CYN_FILTERS:wrapper-start - 5
		 * @hooked CYN_FILTERS:display_in_stock - 10
		 * @hooked CYN_FILTERS:wrapper-end - 100
		 */

		do_action('cyn_woocommerce_filters');
		?>
	</div>



</div>


<?php

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

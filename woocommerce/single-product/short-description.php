<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>

<div class="mt-10 mb-7">
	<div class="border-b py-4 text-3xl">توضیحات محصول</div>
</div>

<div class="woocommerce-product-details__short-description prose">
	<?php echo $short_description; // WPCS: XSS ok. ?>
</div>
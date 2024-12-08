<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


echo woocommerce_get_product_thumbnail( 'woocommerce_thumbnail', [ 'class' => 'w-full rounded-xl object-cover max-md:size-[14rem] max-md:aspect-square' ] );








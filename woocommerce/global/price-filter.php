<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$products = get_posts( array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'orderby' => 'meta_value_num',
	'meta_key' => '_price',
	'posts_per_page' => -1,
) );

$highest = $products[ array_key_first( $products ) ];
$lowest = $products[ array_key_last( $products ) ];

$highest_price = get_post_meta( $highest->ID, '_price', true );
$lowest_price = get_post_meta( $lowest->ID, '_price', true );
?>


<div class="toggle-tab">
	<div class="flex justify-between items-center px-2 | toggle-opener cursor-pointer">
		<span class="text-lg">
			<?php printf( 'بر اساس %s', 'قیمت' ) ?>
		</span>
		<svg class="icon">
			<use href="#icon-plus" />
		</svg>
	</div>


	<div class=" toggle-opening grid grid-rows-[0fr] transition-all">

		<div class="overflow-hidden">
			<div class=" space-y-4 my-3 px-2s">
				<div class="">
					<div class="flex justify-between items-center">
						<label for="minPrice"
							   class="text-sm">حداقل قیمت</label>

						<div class="border p-0.5">
							<input id="minPriceInput"
								   class="max-w-28 p-[0.4rem] border-none"
								   name="minPrice"
								   type="text"
								   value="<?php echo $_GET['minPrice'] ?? $lowest_price ?>">


							<span>تومان</span>
						</div>

					</div>

				</div>

				<div class="">
					<div class="flex justify-between items-center">

						<label for="maxPrice"
							   class="text-sm">حداکثر قیمت</label>
						<div class="border p-0.5">
							<input id="maxPriceInput"
								   class="max-w-28 p-[0.4rem] border-none"
								   type="text"
								   name="maxPrice"
								   value="<?php echo $_GET['maxPrice'] ?? $highest_price ?>">
							<span>تومان</span>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

</div>
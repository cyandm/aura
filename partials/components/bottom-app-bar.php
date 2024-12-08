<div
	class="block md:hidden fixed left-0 right-0 bottom-4 z-40 bg-gray-100 w-11/12 mx-auto rounded-2xl border shadow-2xl">
	<ul class="flex justify-around m-3 [&_svg]:text-black ">

		<li class="relative">
			<div
				class="absolute bg-rose-500 text-white -top-1 -right-1 size-4 rounded-full flex items-center justify-center text-xs">
				<?php echo WC()->cart->get_cart_contents_count() ?>
			</div>
			<a class="shadow-md rounded-3xl block bg-white w-10 h-10 text-center leading-10"
				href="<?php echo esc_url(wc_get_cart_url()) ?>">
				<svg class="icon">
					<use href="#icon-Shopping-Cart" />
				</svg>
			</a>
		</li>
		<li>
			<a class="shadow-md rounded-3xl block bg-white w-10 h-10 text-center leading-10"
				href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))) ?>">
				<svg class="icon">
					<use href="#icon-store-mobile-11" />
				</svg>
			</a>
		</li>
		<li>
			<a class="shadow-md rounded-3xl block bg-white w-10 h-10 text-center leading-10"
				href="/?s=&search-type=all">
				<svg class="icon">
					<use href="#icon-Search" />
				</svg>
			</a>
		</li>

		<li>
			<a class="shadow-md rounded-3xl block bg-white w-10 h-10 text-center leading-10"
				href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')) ?>">
				<svg class="icon">
					<use href="#icon-User,-Profile" />
				</svg>
			</a>
		</li>
	</ul>
</div>
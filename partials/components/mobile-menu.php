<div id="sliding-menu"
	class="w-0 h-full fixed z-50 top-0 right-0 bg-white overflow-x-hidden transition-all duration-500">
	<div class="py-8 px-4">
		<div class="flex flex-row items-center gap-4 justify-between mb-9">

			<div class="flex gap-2">
				<a href="#"
					class="shadow-md rounded-3xl text-primary bg-white bg-opacity-16 w-10 h-10 text-center leading-10"
					id="menu-slide-close">
					<svg class="icon rotate-45">
						<use href="#icon-plus" />
					</svg>
				</a>


				<a href="<?php echo esc_url(wc_get_cart_url()); ?>"
					class="shadow-md rounded-3xl text-primary bg-white bg-opacity-16 w-10 h-10 text-center leading-10">
					<svg class="icon">
						<use href="#icon-Shopping-Cart" />
					</svg>
				</a>
			</div>

			<form method="get"
				action="<?= get_site_url() . '/?s=&search-type=all' ?>"
				class="flex items-center border-b border-gray-300 py-2">
				<input type="text"
					placeholder="دنبال چی میگردی؟"
					name="s"
					class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" />
				<button type="submit"
					class="flex-shrink-0 bg-transparent border-none text-gray-700 py-1 px-2 focus:outline-none">
					<svg class="icon">
						<use href="#icon-Search" />
					</svg>
				</button>
			</form>
		</div>
		<?php

		wp_nav_menu([
			'menu_id' => 'mobile-menu',
			'menu_class' => 'flex flex-wrap flex-col gap-5 text-primary',
			'depth' => '3',
			'theme_location' => 'mobile_menu',
			'container' => 'ul'
		]); ?>


		<!-- <div>
			<?php //echo do_shortcode('[cyn_showcase]') 
			?>
		</div> -->

		<ul class="flex flex-wrap flex-row gap-3 mt-9 justify-center">
			<?php

			?>
			<!-- <li>
				<a href="<?= esc_url($link_whatsapp); ?>">
					<svg class="icon">
						<use href="#icon-Whatsup" />
					</svg>
				</a>
			</li>

			<li>
				<a href="<?= esc_url($link_youtube); ?>">
					<svg class="icon">
						<use href="#icon-Youtube" />
					</svg>
				</a>
			</li> -->
		</ul>
	</div>
</div>
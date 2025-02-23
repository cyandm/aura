<?php
$render_template = $args['render_template'] ?? true;

$link_instagram = get_option('link_instagram');
$link_telegram = get_option('link_telegram');
$link_whatsapp = get_option('link_whatsapp');
$footer_logo = get_option('footer_logo');
//$footer_inperson = get_option('footer_inperson');
$footer_support = get_option('footer_support');
$footer_hours = get_option('footer_hours');
// $btn_link_whatsapp = get_option('btn_link_whatsapp');
// $btn_link_phones = get_option('btn_link_phones');
// $btn_link_instagram = get_option('btn_link_instagram');

$enamad = get_option('enamad');
?>

<?php if ($render_template) : ?>
	<section class="font-peyda mt-12 border-t border-gray">
		<div class="container mx-auto px-10 lg:px-10 py-5">
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
				<!-- <div class="flex items-center">
					<img class="ml-4 w-16 h-16"
						src="<? //= get_stylesheet_directory_uri() . '/assets/img/car.svg'; 
								?>"
						alt="Car Icon" />
					<div>
						<h3 class="text-lg font-bold">ارسال رایگان</h3>
						<p class="text-sm">خرید بالای ۷۰۰ هزار تومن</p>
					</div>
				</div> -->
				<div class="flex items-center justify-center">
					<img class="ml-4 w-16 h-16"
						src="<?= get_stylesheet_directory_uri() . '/assets/img/support.svg'; ?>"
						alt="Box Icon" />
					<div>
						<h3 class="text-lg font-bold">پشتیبانی</h3>
						<p class="text-sm">مختص کل ایران</p>
					</div>
				</div>
				<div class="flex items-center justify-center">
					<img class="ml-4 w-16 h-16"
						src="<?= get_stylesheet_directory_uri() . '/assets/img/click-mobile.svg'; ?>"
						alt="Click Mobile Icon" />
					<div>
						<h3 class="text-lg font-bold">اصالت کالا</h3>
						<p class="text-sm">ضمانت اصل بودن تمام کالاها</p>
					</div>
				</div>
				<div class="flex items-center justify-center">
					<img class="ml-4 w-16 h-16"
						src="<?= get_stylesheet_directory_uri() . '/assets/img/secure-payment.svg'; ?>"
						alt="Earth Icon" />
					<div>
						<h3 class="text-lg font-bold">خرید مطمئن</h3>
						<p class="text-sm">تعویض تا 24 ساعت در صورت داشتن ایراد</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="max-md:pb-20 bg-[#F4F3FF] text-indigo-900">
		<div class="container mx-auto p-10 md:p-8 lg:p-10">
			<div class="flex flex-wrap justify-center gap-8 text-base font-medium">
				<div class="w-[45%] max-md:w-[45%] md:w-[22%] lg:w-[14%] max-sm:w-full border-l max-sm:border-b max-sm:border-l-0 max-sm:pb-8 border-indigo-200 whitespace-nowrap">
					<?php wp_nav_menu(['menu_class' => 'space-y-9 list-square', 'depth' => '1', 'theme_location' => 'footer1_menu', 'container' => 'ul']); ?>
				</div>
				<div class="w-[45%] max-md:w-[45%] md:w-[22%] lg:w-[14%] max-sm:w-full border-l-0 md:border-l max-sm:border-b max-sm:border-l-0 max-sm:pb-8 border-indigo-200 whitespace-nowrap">
					<?php wp_nav_menu(['menu_class' => 'space-y-9 list-square', 'depth' => '1', 'theme_location' => 'footer2_menu', 'container' => 'ul']); ?>
				</div>
				<div class="w-[45%] max-md:w-[45%] md:w-[22%] lg:w-[14%] max-sm:w-full border-l max-sm:border-b max-sm:border-l-0 max-sm:pb-8 border-indigo-200 whitespace-nowrap max-md:pt-2">
					<?php wp_nav_menu(['menu_class' => 'space-y-9 list-square', 'depth' => '1', 'theme_location' => 'footer3_menu', 'container' => 'ul']); ?>
				</div>
				<div class="w-[100%] max-md:w-[45%] md:w-[18%] lg:w-[25%] max-sm:w-full max-md:pt-2 flex flex-col gap-10 max-md:gap-16">
					<ul class="space-y-9 list-square">
						<!-- <li><? //= esc_html($footer_inperson); 
									?></li> -->
						<li>
							<a href="tel:<?= $footer_support; ?>">
								شماره واتس اپ : <?= esc_html($footer_support); ?>
							</a>
						</li>
						<!-- <li>ساعات پاسخگویی : <? //= esc_html($footer_hours); 
													?></li> -->
					</ul>

					<?php if ($enamad): ?>

						<div class="w-full [&>a>img]:w-20 [&>a>img]:h-auto flex flex-col justify-center items-center lg:hidden">
							<?= $enamad ?>
						</div>

					<?php endif ?>


					<!-- <div class="mt-9 sm:w-[100%]">
						<ul class="space-y-5 text-xs">
							<li>
								<a href="<? //= esc_url($btn_link_phones); 
											?>"
									class="rounded-3xl flex items-center w-52 py-2 px-5 bg-white/20">
									<div class="flex justify-between items-center gap-1">
										<svg class="icon">
											<use href="#icon-Phone,-Call-11" />
										</svg>
										شماره تماس ها
									</div>
									<svg class="icon size-4 mr-auto ml-0 rotate-90">
										<use href="#icon-chevron-down" />
									</svg>
								</a>
							</li>
							<li>
								<a href="<? //= esc_url($btn_link_instagram); 
											?>"
									class="rounded-3xl flex items-center w-52 py-2 px-5 bg-white/20">
									<div class="flex justify-between items-center gap-1">
										<svg class="icon">
											<use href="#icon-instagram" />
										</svg>
										اینستاگرام ها
									</div>
									<svg class="icon size-4 mr-auto ml-0 rotate-90">
										<use href="#icon-chevron-down" />
									</svg>
								</a>
							</li>
							<li><a href="<? //= esc_url($btn_link_whatsapp); 
											?>"
									class="rounded-3xl flex items-center w-52 py-2 px-5 bg-white/20">
									<div class="flex justify-between items-center gap-1">
										<svg class="icon">
											<use href="#icon-Whatsup" />
										</svg> ارتباط در واتس اپ
									</div>

									<svg class="icon size-4 mr-auto ml-0 rotate-90">
										<use href="#icon-chevron-down" />
									</svg>

								</a>

							</li>
						</ul>
					</div> -->

				</div>
				<div class="w-[100%] md:w-[100%] lg:w-[15%] xl:w-[22%] flex items-center justify-center lg:justify-end order-first lg:order-none">
					<div class="flex flex-col items-center justify-center gap-6">

						<?php
						if ($footer_logo) {
							echo '<a href="' . esc_url(home_url()) . '"><img src="' . esc_url($footer_logo) . '" alt="' . get_bloginfo('name') . '" /></a>';
						} ?>

						<?php if ($enamad): ?>

							<div class="w-full [&>a>img]:w-20 [&>a>img]:h-auto flex flex-col justify-center items-center max-lg:hidden">
								<?= $enamad ?>
							</div>

						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
		<div class="container mx-auto p-10 md:p-8 lg:p-10 text-center">
			<ul class="flex justify-center gap-8 pt-6 border-t border-indigo-200 md:pb-0 [&>li>a]:bg-white [&>li>a]:p-2 [&>li>a]:rounded-full [&>li>a]:transition-all [&>li>a]:duration-500">

				<?php if (!empty($link_whatsapp)): ?>

					<li class="group">
						<a href="<?= esc_url($link_whatsapp);
									?>" class="group-hover:bg-indigo-600 flex items-center justify-center">
							<svg class="icon text-indigo-600 group-hover:text-white transition-all duration-500">
								<use href="#icon-Whatsup" />
							</svg>
						</a>
					</li>

				<?php endif ?>

				<?php if ($link_instagram): ?>

					<li class="group">
						<a href="<?= esc_url($link_instagram);
									?>" class="group-hover:bg-indigo-600 flex items-center justify-center">
							<svg class="icon text-indigo-600 group-hover:text-white transition-all duration-500">
								<use href="#icon-instagram" />
							</svg>
						</a>
					</li>

				<?php endif ?>

				<?php if ($link_telegram): ?>

					<li class="group">
						<a href="<?= esc_url($link_telegram);
									?>" class="group-hover:bg-indigo-600 flex items-center justify-center">
							<svg class="icon text-indigo-600 group-hover:text-white transition-all duration-500">
								<use href="#icon-Send" />
							</svg>
						</a>
					</li>

				<?php endif ?>

			</ul>

			<div class="mt-4 pt-4">
				<span class="text-indigo-500 text-sm font-normal">Design & Develope by <a href="https://cyandm.com">Cyan DM</a></span>
			</div>
		</div>
		<?php cyn_get_component('bottom-app-bar') ?>
	</footer>

<?php endif; ?>

<div class="icons">
	<?php include_once(CYN_THEME_DIRECTORY . '/assets/icons/icons.svg') ?>
</div>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>
<?php
/* Template name: instagram  */
get_header();

$btn_link_whatsapp = get_option( 'btn_link_whatsapp' );
$btn_link_phones = get_option( 'btn_link_phones' );
?>

<section class="bg-no-repeat items-center bg-contain md:bg-cover h-auto lg:h-[45rem] instagram-page"
		 style="background-image:url('<?= get_stylesheet_directory_uri() . '/assets/img/bg-template.jpg'; ?>');">
	<div class="container mx-auto flex h-full items-center justify-start px-4 lg:px-10 mt-">
		<div class="w-full lg:w-[60%] xl:w-[40%] bg-none lg:bg-gray-300 p-0 lg:p-8 rounded-4xl">
			<h1 class="text-xl lg:text-5xl leading-7 lg:leading-425 mb-1 lg:mb-3 text-cgray2 mt-12 lg:mt-16">
				<?= get_the_title(); ?>
			</h1>
			<h3 class="text-xs lg:text-xl w-[42%] lg:w-[100%]">ما منتظر دریافت پیام های شما و پاسخ به سوالاتتون هستیم.
			</h3>
			<div class="bg-gray-300 lg:bg-none rounded-3xl lg:rounded-none p-8 lg:p-0 mt-[7.5rem] md:mt-20">
				<div class="text-xl font-light [&_a]:underline">
					<?php the_content(); ?>
				</div>
				<div class="flex gap-4 md:mb-16 mt-7">
					<a class="flex justify-center items-center bg-gray-200 px-1 py-2 rounded-3xl bg-white-24 text-xs"
					   href="<?= esc_url( $btn_link_whatsapp ); ?>">

						<svg class="icon size-5">
							<use href="#icon-Whatsup" />
						</svg>
						ارتباط در واتسپ
						<svg class="icon size-3 rotate-90">
							<use href="#icon-chevron-down" />
						</svg>

					</a>
					<a class="flex justify-center items-center bg-gray-200 px-1 py-2 rounded-3xl bg-white-24 text-xs"
					   href="<?= esc_url( $btn_link_phones ); ?>">
						<svg class="icon size-5">
							<use href="#icon-Phone,-Call-11" />
						</svg>
						شماره تماس ها
						<svg class="icon size-3 rotate-90">
							<use href="#icon-chevron-down" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
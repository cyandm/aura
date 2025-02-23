<?php
/* Template name: Contact-us */
get_header();

$thumbnail_url = get_the_post_thumbnail_url();
$btn_link_whatsapp = get_option('link_whatsapp');
$btn_link_instagram = get_option('link_instagram');
$contact_title = get_field("contact_title");
$sub_title = get_field("sub_title");
?>

<section class="bg-no-repeat items-center bg-contain md:bg-cover h-auto lg:h-[45rem] instagram-page" style="background-image:url('<?= $thumbnail_url; ?>');">

	<div class="container mx-auto flex h-full items-center justify-start px-4 lg:px-10 md:py-10">

		<div class="w-full lg:w-[60%] xl:w-[50%] bg-gray-300 p-4 lg:p-8 rounded-4xl mt-48 md:mt-0">

			<h1 class="text-3xl lg:text-5xl leading-7 lg:leading-425 mb-1 lg:mb-3 mt-8">
				<?= $contact_title ? $contact_title : get_the_title(); ?>
			</h1>

			<h3 class="text-xs lg:text-xl w-full">
				<?= $sub_title ?>
			</h3>

			<div class="bg-gray-300 lg:bg-none rounded-3xl lg:rounded-none p-0 mt-4">

				<form method="post" action="" id="contact_form" class="w-full grid grid-cols-2 max-sm:grid-cols-1 max-sm:grid-rows-1 gap-3 [&_input]:w-full [&_textarea]:w-full [&_input]:rounded-2xl [&_textarea]:rounded-2xl [&_input]:border-none [&_textarea]:border-none">

					<div class="col-span-1 max-sm:col-span-2">
						<input type="text" name="name" id="name" placeholder="نام و نام خانوادگی" required>
					</div>

					<div class="col-span-1 max-sm:col-span-2">
						<input type="email" name="email" id="email" placeholder="ایمیل" required>
					</div>

					<div class="col-span-1 max-sm:col-span-2">
						<input type="text" name="phone" id="phone" placeholder="شماره همراه" required>
					</div>

					<div class="col-span-1 max-sm:col-span-2">
						<input type="text" name="subject" id="subject" placeholder="موضوع" required>
					</div>

					<div class="col-span-2">
						<textarea name="message" id="message" rows="7" maxlength="65525" placeholder="پیام شما" required></textarea>
					</div>

					<div class="form-btn col-span-2 flex justify-center">
						<button id="submit_form" class="btn-icon px-3 py-2 rounded-2xl transition-all duration-300 bg-white hover:bg-violet-400 hover:text-white" data-callback="ContactForm" type="submit">ارسال پیام</button>
					</div>

				</form>

				<div class="flex gap-4 mb-8 mt-7 justify-center">
					<a class="flex justify-center items-center bg-violet-400 text-white px-1 py-2 rounded-3xl text-sm" href="<?= esc_url($btn_link_whatsapp); ?>">

						<svg class="icon size-5">
							<use href="#icon-Whatsup" />
						</svg>
						ارتباط در واتساپ
						<svg class="icon size-3 rotate-90">
							<use href="#icon-chevron-down" />
						</svg>

					</a>

					<a class="flex justify-center items-center bg-violet-400 text-white px-1 py-2 rounded-3xl text-sm"
						href="<?= esc_url($btn_link_instagram); ?>">
						<svg class="icon size-5">
							<use href="#icon-instagram" />
						</svg>
						ارتباط در اینستاگرام <svg class="icon size-3 rotate-90">
							<use href="#icon-chevron-down" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
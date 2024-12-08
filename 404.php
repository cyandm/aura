<?php defined( 'ABSPATH' ) || exit; ?>

<?php get_header(); ?>

<section>
	<div class="container text-center mx-auto px-10 py-8">
		<h1 class="text-5xl text-gray-700 font-medium">404</h1>
		<p class="text-gray-600 text-base mt-4 mb-6">متاسفانه صفحه ی مورد نظر یافت نشد!</p>
		<img class="mx-auto"
			 src="<?= get_stylesheet_directory_uri() . '/assets/img/search-not-found.png' ?>" />
		<a href="<?php echo home_url(); ?>"
		   class="inline-block primary-btn my-6">بازگشت به صفحه اصلی</a>
	</div>
</section>

<?php get_footer(); ?>
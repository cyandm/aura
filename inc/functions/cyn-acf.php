<?php
add_action('acf/include_fields', 'cyn_register_acf');

function cyn_register_acf()
{
	if (! function_exists('acf_add_local_field_group')) {
		return;
	}
	cyn_register_acf_slider();
	cyn_register_acf_home_page();
	//cyn_register_acf_custom_products_page();
	cyn_register_acf_posts();
	cyn_register_acf_about_us();
	cyn_register_acf_contact_us();
	cyn_register_acf_home_blog();
	cyn_register_acf_product_cats();
}

function cyn_register_acf_slider()
{
	$fields = [
		cyn_acf_add_image('mobile_slider', 'عکس اسلایدر برای موبایل', 50),
		cyn_acf_add_image('desktop_slider', 'عکس اسلایدر برای دسکتاپ', 50),
		cyn_acf_add_text('url', 'لینک اسلایدر', 1),
	];

	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'slider',
			],
		],
	];

	cyn_register_acf_group('تنظیمات ', $fields, $location);
}

function cyn_register_acf_home_page()
{
	$fields = [];

	array_push($fields, cyn_acf_add_tab('دسته بندی برند ها'));

	array_push($fields, cyn_acf_add_text('brand_categories_title', 'عنوان دسته بندی برند ها'));

	for ($i = 1; $i <= 3; $i++) {
		array_push($fields, cyn_acf_add_group("brand_cat_$i", "برند $i", [
			cyn_acf_add_image('brand_img', 'عکس برند'),
			cyn_acf_add_text('brand_category_title', 'عنوان دسته بندی برند'),
			cyn_acf_add_text('brand_link', 'لینک دسته بندی برند'),
		]));
	}


	array_push($fields, cyn_acf_add_tab('گروه محصولات'));

	array_push($fields, cyn_acf_add_text('last_products_title', 'عنوان سکشن محصولات جدید'));
	array_push($fields, cyn_acf_add_text('last_products_link', 'لینک سکشن محصولات جدید'));

	for ($i = 1; $i <= 6; $i++) {
		array_push($fields, cyn_acf_add_group("group_$i", "گروه $i", [
			cyn_acf_add_text('title', 'عنوان بخش'),
			cyn_acf_add_text('link', 'لینک بخش'),
			cyn_acf_add_wysiwyg('description', 'توضیحات بخش'),
			cyn_acf_add_post_object('products', 'محصولات بخش', 'product', '', 1),
		]));
	}



	array_push($fields, cyn_acf_add_tab('دیگر تنظیمات'));
	array_push($fields, cyn_acf_add_link('contact_us_link', 'لینک تماس با ما - سوالات متداول'));



	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/home.php',
			],
		],
	];

	cyn_register_acf_group('تنظیمات ', $fields, $location);
}

// function cyn_register_acf_custom_products_page()
// {
// 	$fields = [];

// 	array_push($fields, cyn_acf_add_tab('بنر میانی'));

// 	array_push($fields, cyn_acf_add_link('middle_banner_link', 'لینک بنر میانی'));
// 	array_push($fields, cyn_acf_add_image('desktop_middle_banner', 'عکس بنر میانی برای دسکتاپ'));
// 	array_push($fields, cyn_acf_add_image('mobile_middle_banner', 'عکس بنر میانی برای موبایل'));


// 	array_push($fields, cyn_acf_add_tab('گروه محصولات'));

// 	array_push($fields, cyn_acf_add_text('last_products_title', 'عنوان سکشن محصولات جدید'));
// 	array_push($fields, cyn_acf_add_text('last_products_link', 'لینک سکشن محصولات جدید'));

// 	for ($i = 1; $i <= 6; $i++) {
// 		array_push($fields, cyn_acf_add_group("group_$i", "گروه $i", [
// 			cyn_acf_add_text('title', 'عنوان بخش'),
// 			cyn_acf_add_text('link', 'لینک بخش'),
// 			cyn_acf_add_wysiwyg('description', 'توضیحات بخش'),
// 			cyn_acf_add_post_object('products', 'محصولات بخش', 'product', '', 1),
// 		]));
// 	}

// 	// array_push($fields, cyn_acf_add_tab('دیگر تنظیمات'));
// 	// array_push($fields, cyn_acf_add_link('contact_us_link', 'لینک تماس با ما - سوالات متداول'));

// 	$location = [
// 		[
// 			[
// 				'param' => 'page_template',
// 				'operator' => '==',
// 				'value' => 'templates/custom-products.php',
// 			],
// 		],
// 	];

// 	cyn_register_acf_group('تنظیمات ', $fields, $location);
// }

function cyn_register_acf_about_us()
{
	$fields = [
		cyn_acf_add_text('about_title_top', 'عنوان بالا'),
		cyn_acf_add_text('about_title_bottom', 'عنوان پایین'),

		cyn_acf_add_image('gallery_img_one', 'تصویر اول'),
		cyn_acf_add_image('gallery_img_two', 'تصویر دوم'),
		cyn_acf_add_image('gallery_img_three', 'تصویر سوم'),
	];



	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/about-us.php',
			],
		],
	];

	cyn_register_acf_group('تنظیمات ', $fields, $location);
}

function cyn_register_acf_contact_us()
{
	$fields = [
		cyn_acf_add_text('contact_title', 'عنوان (عنوان بدون پر کردن این قسمت "تماس با" ما میباشد)'),
		cyn_acf_add_text('sub_title', 'زیر عنوان'),
	];



	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/contact-us.php',
			],
		],
	];

	cyn_register_acf_group('تنظیمات ', $fields, $location);
}

function cyn_register_acf_posts()
{
	$fields = [
		cyn_acf_add_post_object('faq_post', 'سوالات متداول', 'faq', '', 1),
	];

	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			],
		],
	];

	cyn_register_acf_group('تنظیمات ', $fields, $location);
}

function cyn_register_acf_home_blog()
{

	$choices = [];
	$cats = get_categories();

	foreach ($cats as $cat) {
		$choices[$cat->slug] = $cat->name;
	}

	$fields = [
		cyn_acf_add_post_object('feature_posts', 'پست های برجسته', 'post', 100, 1),
		cyn_acf_add_options('selected_cats', 'دسته بندی های برجسته', $choices, 1),
		cyn_acf_add_link('view_all', 'مشاهده همه')
	];

	$location = [
		[
			[
				'param' => 'page',
				'operator' => '==',
				'value' => get_option('page_for_posts'),
			],
		],
	];

	cyn_register_acf_group('تنظیمات ', $fields, $location);
}

function cyn_register_acf_product_cats()
{

	$choices = [];
	$taxes = get_taxonomies([], 'objects', 'or');


	foreach ($taxes as $tax => $tax_object) {
		if (str_contains($tax, 'pa_')) {
			$choices[$tax] = $tax_object->label;
		}
	}

	$choices['product_notes'] = 'نت های عطر';


	$fields = [
		cyn_acf_add_options('filters', 'انتخاب فیلتر ها', $choices, 1),
		cyn_acf_add_text('slogan', 'شعار'),
	];

	$location = [
		[
			[
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'product_cat',
			],
		],
	];
	cyn_register_acf_group('تنظیمات دسته محصولات', $fields, $location);
}

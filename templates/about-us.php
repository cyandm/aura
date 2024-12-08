<?php
/* Template name: about-us */
get_header();

$thumbnail_url = get_the_post_thumbnail_url();
$about_title_top = get_field( 'about_title_top' );
$about_title_bottom = get_field( 'about_title_bottom' );

$gallery_img_one_id = get_field( 'gallery_img_one' );
$img_one = wp_get_attachment_image_src( $gallery_img_one_id, 'full' );

$gallery_img_two_id = get_field( 'gallery_img_two' );
$img_two = wp_get_attachment_image_src( $gallery_img_two_id, 'full' );

$gallery_img_three_id = get_field( 'gallery_img_three' );
$img_three = wp_get_attachment_image_src( $gallery_img_three_id, 'full' );
?>
<section class="about-us-page">
	<div class="bg-no-repeat items-center bg-cover md:bg-cover h-auto lg:h-[45rem]"
		 style="background-image:url('<?= $thumbnail_url; ?>');">
		<div class="container mx-auto flex h-full items-center justify-end px-3 lg:px-10">
			<div class="w-[60%] pt-16 pb-16 ">
				<h1 class="text-white text-xl lg:text-5xl mb-4 leading-6 lg:leading-424 font-medium">
					<?= esc_html( $about_title_top ); ?>
				</h1>
				<h3 class="text-white text-base lg:text-4xl font-medium"><?= esc_html( $about_title_bottom ); ?></h3>
			</div>
		</div>
	</div>
	<div class="container mx-auto px-4 lg:px-10 mt-10">

		<div class="prose">
			<?php the_content(); ?>
		</div>

		<h2 class="my-6 text-3xl">گالری تصاویر</h2>
		<div class="flex gap-4 flex-col lg:flex-row mx-auto gallery">
			<div class="flex flex-col gap-4 w-[100%] lg:w-[30%]">
				<img class="rounded-4xl w-full"
					 src="<?= $img_two[0]; ?>" />
				<img class="rounded-4xl w-full"
					 src="<?= $img_three[0]; ?>" />
			</div>
			<img class="rounded-4xl w-[100%] lg:w-[70%]"
				 src="<?= $img_one[0]; ?>" />
		</div>
	</div>

</section>

<?php get_footer(); ?>
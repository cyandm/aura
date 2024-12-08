<?php
$postId = $args['post-id'] ?? get_the_ID();
$mobile_slider = get_field('mobile_slider', $postId);
$desktop_slider = get_field('desktop_slider', $postId);
?>

<a href="<?php echo get_field('url', $postId) ?>" class="relative max-h-full">
	<?php
	if ($desktop_slider && $mobile_slider) :
		echo wp_get_attachment_image($desktop_slider, 'full', false, ['class' => 'w-full max-h-full object-cover object-bottom lg:hidden']);
		echo wp_get_attachment_image($mobile_slider, 'full', false, ['class' => 'w-full max-h-full object-cover object-bottom max-lg:hidden']);
	else :
		echo 'لطفا تصویر انتخاب نمایید!';
	endif;
	?>
</a>
<?php

if (! defined('ABSPATH')) {
	exit;
}

if (! $notices) {
	return;
}



?>

<?php foreach ($notices as $notice) : ?>
	<div class="bg-[#F4F3FF] 
	p-2 mb-4 rounded-md border-r-4
	 border-violet-400 text-indigo-900 flex justify-between items-center flex-row max-md:flex-col-reverse 
	 [&_a]:!border [&_a]:!border-solid [&_a]:!border-violet-400 max-md:[&_a]:!mt-2 [&_a]:!bg-violet-400 [&_a]:!text-sm [&_a]:!mr-auto [&_a]:!ml-0 [&_a]:!text-white [&_a]:rounded-lg"
		<?php echo wc_get_notice_data_attr($notice); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
		?>
		role="alert">

		<?php echo wc_kses_notice($notice['notice']); ?>
	</div>
<?php endforeach; ?>
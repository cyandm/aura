<?php
$mode = $args['mode'];

?>

<?php if ( $mode === 'text' ) : ?>
	<div class="border bg-violet-400 text-white rounded-full my-3">
		<a class="flex justify-between p-2 px-4"
		   href="<?php echo get_option( 'cyn_shortcode_showcase_link' ) ?>">

			<span>
				<?php echo get_option( 'cyn_shortcode_showcase_text' ) ?>
			</span>


			<svg class="icon -rotate-90">
				<use href="#icon-Arrow,-Up-1" />
			</svg>
		</a>
	</div>
<?php endif; ?>
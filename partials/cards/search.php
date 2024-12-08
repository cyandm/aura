<a href="<?php echo get_permalink() ?>"
   class="py-2 px-4 border border-gray-50 flex gap-2">
	<div>
		<?php the_post_thumbnail( [ 100, 100 ], [ 'class' => 'rounded-md min-w-[80px]' ] ) ?>
	</div>

	<div>
		<div class="text-lg  md:text-2xl ">
			<?php the_title() ?>
		</div>

		<div class="text-gray-500">
			<span>
				<?php echo get_post_type_object( get_post_type() )->labels->singular_name ?>
			</span>
			|
			<span>
				<?php echo get_field( 'english_name' ) ?>
			</span>
		</div>
	</div>
</a>
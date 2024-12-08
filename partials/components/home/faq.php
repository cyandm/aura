<?php
$faq_cats = get_terms([
	'taxonomy' => 'faq-cat',
	'hide_empty' => true
]);

?>


<section class="container space-y-4" id="faq">
	<div class="text-title_2 font-normal lg:text-title_1 text-zinc-800 flex justify-between">
		<?php _e('⁉️ اگه برات سوالی پیش اومد', 'cyn-dm') ?>

	</div>

	<div class="grid grid-cols-6 gap-5">
		<div class="col-span-1 space-y-4 max-md:hidden">
			<?php foreach ($faq_cats as $index => $category) : ?>
				<div class="fade-in-down"
					anim-delay="<?php echo $index * 0.3 ?>">
					<div id="<?php echo "faq-cat-" . $category->term_id ?>"
						class="faq-handler | rounded-full cursor-pointer duration-300 bg-white text-zinc-800 text-center p-2 border hover:bg-violet-400 hover:border-primary-0 hover:text-white transition-all shadow-cxl hover:shadow-cxt text-base font-medium">
						<?php echo $category->name ?>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="fade-in-down"
				anim-delay="<?php echo count($faq_cats) * 0.3 ?>">
				<a href="<?php echo get_field('contact_us_link', get_option('page_on_front')) ?>"
					class="rounded-full block cursor-pointer duration-300 text-zinc-800 bg-white text-center p-2 border hover:bg-violet-400 hover:border-primary-0 hover:text-white transition-all shadow-cxl hover:shadow-cxt text-base font-medium">
					<?php _e('تماس با ما', 'cyn-dm') ?>
				</a>
			</div>
		</div>

		<div class="col-span-6 md:hidden ">
			<div class="select-box relative">

				<div
					class="select-box-selector | rounded-full pl-3 pr-4 py-2 border bg-white border-primary-70 flex justify-between items-center">

					<span class="select-box-value">
						<?php echo $faq_cats[0]->name ?>
					</span>

					<svg class="size-4 transition-all duration-300">
						<use href="#icon-chevron-down"></use>
					</svg>
				</div>

				<div
					class="select-box-panel | bg-white px-4 rounded-xl divide-y divide-primary-90 shadow-md absolute top-12 w-full z-50 opacity-0 -translate-y-4 pointer-events-none transition-all duration-300">

					<?php foreach ($faq_cats as $index => $category) : ?>
						<div id="<?php echo "faq-cat-" . $category->term_id ?>"
							class="faq-handler | py-3 select-box-option">
							<?php echo $category->name ?>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>

		<div class="col-span-5 max-md:col-span-6">
			<div class="fade-in-down"
				anim-delay="0.8">
				<?php foreach ($faq_cats as $index => $category) : ?>
					<div class="faq-panel grid grid-rows-[0fr] transition-all duration-700"
						controlled-by="<?php echo "faq-cat-" . $category->term_id ?>">
						<div class="overflow-hidden">
							<?php cyn_get_component('faq-group', ['type' => 'query', 'term_ids' => [$category->term_id]]) ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
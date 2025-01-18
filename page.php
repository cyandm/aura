<?php
$categories = get_the_category() ?? [];



?>


<?php get_header() ?>

<main class="container">


	<div class="py-3">
		<?php if (function_exists('rank_math_the_breadcrumbs')) {
			rank_math_the_breadcrumbs();
		} ?>
	</div>

	<div class="py-2"></div>


	<div class="flex gap-5 max-lg:flex-col-reverse">


		<?php //cyn_get_component('sidebar-blog') 
		?>



		<div class="space-y-6">
			<div>
				<?php the_post_thumbnail('full', ['class' => 'rounded-3xl']) ?>
			</div>


			<div class="flex justify-between flex-wrap gap-4">
				<div class="flex gap-2">
					<?php foreach ($categories as $category) : ?>
						<a href="<?php echo get_term_link($category) ?>"
							class="p-2 bg-gray-100 rounded-md">
							<?php echo $category->name ?>
						</a>
					<?php endforeach; ?>
				</div>

				<div class="flex gap-4 items-center max-md:w-full max-md:justify-between">

					<div class="flex items-center gap-1">

						<svg class="icon">
							<use href="#icon-calendar" />
						</svg>

						<span>
							<?php echo get_the_date() ?>
						</span>

					</div>

					<div class="flex items-center gap-1">

						<svg class="icon">
							<use href="#icon-Pen,-Edit,-Write" />
						</svg>

						<span>
							<?php echo get_the_author() ?>
						</span>

					</div>
				</div>
			</div>

			<div class="prose prose-base prose-h1:text-4xl max-md:prose-h1:text-2xl prose-img:rounded-3xl toc-handler">
				<h1 class="leading-6">
					<?php the_title() ?>
				</h1>

				<?php cyn_get_component('toc', ['class' => 'lg:hidden not-prose text-base text-black']) ?>

				<div class="">
					<?php the_content() ?>
				</div>
			</div>


			<div>
				<?php cyn_get_component('faq-group', ['type' => 'acf', 'acf_field' => 'faq_post', 'post-id' => get_the_ID(), 'title' => 'سوالات متداول']) ?>
			</div>


			<?php if (comments_open()) : ?>
				<div>
					<?php comments_template() ?>
				</div>
			<?php endif; ?>
		</div>



	</div>



</main>

<?php get_footer() ?>
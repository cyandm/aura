<?php
global $wp_query;

$query = $args['query'] ?? $wp_query;
?>

<div class="container pagination flex mb-40 justify-start">

	<?php
	$big = 999999999;
	echo _navigation_markup( paginate_links( [ 
		'screen_reader_text' => ' ',
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'total' => $query->max_num_pages,
		'aria_current' => 'page',
		'show_all' => true,
		'prev_next' => true,
		'type' => 'plain',
		'prev_text' => '<span class="bg-white rounded-md border border-gray-200 p-1 inline-flex justify-center items-center size-8 transition-all duration-300 cursor-pointer color-black  hover:border-gray-400"> < </span>',
		'next_text' => '<span class="bg-white rounded-md border border-gray-200 p-1 inline-flex justify-center items-center size-8 transition-all duration-300 cursor-pointer color-black  hover:border-gray-400"> > </span>',
		'before_page_number' => '<span class="bg-white rounded-md border border-gray-200 p-1 inline-flex justify-center items-center size-8 transition-all duration-300 cursor-pointer color-black  hover:border-gray-400">',
		'after_page_number' => '</span>',
	] ) );

	?>
</div>
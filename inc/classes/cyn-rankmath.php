<?php
class cyn_rankmath
{
	public function __construct()
	{
		add_filter('rank_math/frontend/breadcrumb/args', [$this, 'change_wrapper']);
	}


	function change_wrapper($args)
	{

		$args['delimiter'] = '&nbsp;/&nbsp;';
		$args['wrap_before'] = '<nav class="rank-math-breadcrumb"><div class="flex items-center gap-1 text-gray-500 [&_.last]:text-black overflow-hidden overflow-x-auto [&_span]:whitespace-nowrap scrollbar-hide">';
		$args['wrap_after'] = '</div></nav>';
		$args['before'] = '<span class="hover:text-black transition-colors">';
		$args['after'] = '</span>';

		return $args;
	}
}

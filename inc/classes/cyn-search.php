<?php

class cyn_search {
	public function __construct() {
		add_action( 'pre_get_posts', [ $this, 'searchPage' ] );

		/*
		 * add english_name field to search
		 * @source https://support.advancedcustomfields.com/forums/topic/adding-custom-fields-search-to-wordpress-search/
		 */
		add_filter( 'posts_join', [ $this, 'search_join' ] );
		add_filter( 'posts_where', [ $this, 'search_where' ] );
		add_filter( 'posts_distinct', [ $this, 'search_distinct' ] );

	}

	public function searchPage( WP_Query $query ) {
		if ( ! $query->is_search() || ! $query->is_main_query() )
			return;

		$post_type = $_GET['search-type'] === 'all' ? null : $_GET['search-type'];

		$query->set( 'posts_per_page', -1 );
		$query->set( 'post_type', $post_type );

	}

	public function search_join( $join ) {
		global $wpdb;

		if ( is_search() ) {
			$join .= ' LEFT JOIN ' . $wpdb->postmeta . ' english_name ON ' . $wpdb->posts . '.ID = english_name.post_id ';
		}

		return $join;
	}

	public function search_where( $where ) {
		global $pagenow, $wpdb;

		if ( is_search() ) {
			$where = preg_replace(
				"/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
				"(" . $wpdb->posts . ".post_title LIKE $1) OR (english_name.meta_value LIKE $1)", $where );
		}

		return $where;
	}

	public function search_distinct( $where ) {
		global $wpdb;

		if ( is_search() ) {
			return "DISTINCT";
		}

		return $where;
	}
}








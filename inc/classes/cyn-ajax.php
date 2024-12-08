<?php

if ( ! class_exists( 'cyn_ajax' ) ) {
	class cyn_ajax {

		function __construct() {
			add_action( 'rest_api_init', [ $this, 'register_routes' ] );
		}


		function register_routes() {
			register_rest_route( 'cynApi/v1', '/formatPrice', [ 
				'methods' => 'POST',
				'callback' => [ $this, 'format_price' ],
			] );
		}


		function format_price( WP_REST_Request $req ) {
			return wc_price( $req->get_param( 'price' ) );
		}
	}
}
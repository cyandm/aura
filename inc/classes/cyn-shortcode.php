<?php
class cyn_shortcode {
	public function __construct() {
		add_action( 'init', [ $this, 'add_codes' ] );
	}


	public function add_codes() {
		add_shortcode( 'cyn_showcase', [ $this, 'cyn_showcase' ] );
	}

	public function cyn_showcase( $atts ) {

		$attributes = shortcode_atts( [ 
			'mode' => 'text'
		], $atts );

		cyn_get_component( '/shortcodes/showcase', $attributes );
	}



}
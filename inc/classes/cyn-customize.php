<?php

if ( ! class_exists( 'cyn_customize' ) ) {
	class cyn_customize {
		function __construct() {
			add_action( 'customize_register', [ $this, 'cyn_basic_settings' ] );
		}

		public function cyn_basic_settings( $wp_customize ) {

			$this->cyn_register_panel_general( $wp_customize );
			$this->cyn_register_panel_shortcode( $wp_customize );
			$this->cyn_register_panel_custom_code( $wp_customize );

		}

		/**
		 * Summary of cyn_add_control
		 * @param mixed $wp_customize
		 * @param string $section name of section that this control related to
		 * @param string $type 'text' | 'textarea' | 'tel' | 'image' | 'file'
		 * @param string $id name that saved on wp_option table on database
		 * @param string $label 
		 * @param string $description
		 * @return void
		 */
		private function cyn_add_control( $wp_customize, $section, $type, $id, $label, $description = '' ) {
			$wp_customize->add_setting(
				$id,
				[ 'type' => 'option' ]
			);


			if ( $type == "file" ) {
				$wp_customize->add_control(
					new WP_Customize_Upload_Control(
						$wp_customize,
						$id,
						[ 
							'label' => $label,
							'section' => $section,
							'settings' => $id,
							'description' => $description,
						]
					)
				);
			}

			if ( $type != 'file' ) {
				$wp_customize->add_control(
					$id,
					[ 
						'label' => $label,
						'section' => $section,
						'settings' => $id,
						'type' => $type,
						'description' => $description,
					]
				);
			}
		}

		private function cyn_register_panel_general( $wp_customize ) {

			$wp_customize->add_panel(
				'general_panel',
				[ 
					'title' => 'تنظیمات عمومی قالب',
					'priority' => 1
				]
			);


			$wp_customize->add_section(
				'header_section',
				[ 
					'title' => 'سربرگ',
					'priority' => 1,
					'panel' => 'general_panel'
				]
			);

			$wp_customize->add_section(
				'social_section',
				[ 
					'title' => 'شبکه های اجتماعی',
					'priority' => 1,
					'panel' => 'general_panel'
				]
			);

			$wp_customize->add_section(
				'footer_section',
				[ 
					'title' => 'فوتر - پابرگ',
					'priority' => 1,
					'panel' => 'general_panel'
				]
			);

			$wp_customize->add_section(
				'order_section',
				[ 
					'title' => 'سفارشات',
					'priority' => 1,
					'panel' => 'general_panel'
				]
			);


			//header
			$this->cyn_add_control( $wp_customize, 'header_section', 'file', 'header_custom_logo', 'لوگو موبایل' );


			//social
			$this->cyn_add_control( $wp_customize, 'social_section', 'text', 'link_instagram', 'اینستاگرام' );
			$this->cyn_add_control( $wp_customize, 'social_section', 'text', 'link_telegram', 'تلگرام' );
			$this->cyn_add_control( $wp_customize, 'social_section', 'text', 'link_whatsapp', 'واتس اپ' );

			//footer
			$this->cyn_add_control( $wp_customize, 'footer_section', 'file', 'footer_logo', 'لوگو فوتر' );
			//$this->cyn_add_control( $wp_customize, 'footer_section', 'text', 'footer_inperson', 'خرید حضوری' );
			$this->cyn_add_control( $wp_customize, 'footer_section', 'text', 'footer_support', 'پشتیبانی سایت' );
			$this->cyn_add_control( $wp_customize, 'footer_section', 'text', 'footer_hours', 'ساعات پاسخگویی' );
			// $this->cyn_add_control( $wp_customize, 'footer_section', 'text', 'btn_link_whatsapp', 'لینک دکمه ارتباط در واتس اپ' );
			// $this->cyn_add_control( $wp_customize, 'footer_section', 'text', 'btn_link_phones', 'لینک دکمه شماره تماس ها' );
			// $this->cyn_add_control( $wp_customize, 'footer_section', 'text', 'btn_link_instagram', 'لینک دکمه اینستاگرام ها' );
			$this->cyn_add_control( $wp_customize, 'footer_section', 'textarea', 'enamad', 'کد ای نماد' );

			//orders
			$this->cyn_add_control( $wp_customize, 'order_section', 'text', 'cyn_order_text_notice', 'متن ' );
			$this->cyn_add_control( $wp_customize, 'order_section', 'text', 'cyn_order_link_notice', 'لینک ' );
		}

		private function cyn_register_panel_shortcode( $wp_customize ) {
			$wp_customize->add_panel(
				'shortcode_panel',
				[ 
					'title' => 'تنظیمات کدهای کوتاه',
					'priority' => 1
				]
			);

			$wp_customize->add_section(
				'showcase_section',
				[ 
					'title' => 'تنظیمات ویترین',
					'priority' => 1,
					'panel' => 'shortcode_panel'
				]
			);

			$this->cyn_add_control( $wp_customize, 'showcase_section', 'text', 'cyn_shortcode_showcase_link', 'لینک ویترین' );
			$this->cyn_add_control( $wp_customize, 'showcase_section', 'text', 'cyn_shortcode_showcase_text', 'متن ویترین' );

		}

		private function cyn_register_panel_custom_code( $wp_customize ) {
			$wp_customize->add_panel(
				'custom_code',
				[ 
					'title' => 'تنظیمات کدهای سفارشی',
					'priority' => 1
				]
			);

			$wp_customize->add_section(
				'head_section',
				[ 
					'title' => 'داخل تگ head',
					'priority' => 1,
					'panel' => 'custom_code'
				]
			);


			for ( $i = 1; $i <= 10; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'head_section', 'textarea', "cyn_head_code_$i", "کد سفارشی $i" );
			}

			$wp_customize->add_section(
				'start_body_section',
				[ 
					'title' => 'ابتدای تگ body',
					'priority' => 1,
					'panel' => 'custom_code'
				]
			);

			for ( $i = 1; $i <= 10; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'start_body_section', 'textarea', "cyn_start_body_code_$i", "کد سفارشی $i" );
			}


			$wp_customize->add_section(
				'end_body_section',
				[ 
					'title' => 'انتهای تگ body',
					'priority' => 1,
					'panel' => 'custom_code'
				]
			);

			for ( $i = 1; $i <= 10; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'end_body_section', 'textarea', "cyn_end_body_code_$i", "کد سفارشی $i" );
			}
		}
	}
}

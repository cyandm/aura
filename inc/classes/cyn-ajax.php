<?php

if (! class_exists('cyn_ajax')) {
	class cyn_ajax
	{

		function __construct()
		{
			add_action('rest_api_init', [$this, 'register_routes']);
		}


		function register_routes()
		{
			register_rest_route('cynApi/v1', '/formatPrice', [
				'methods' => 'POST',
				'callback' => [$this, 'format_price'],
			]);

			register_rest_route('cynApi/v1', '/contactForm', [
				'methods' => 'POST',
				'callback' => [$this, 'contactForm'],
				'permission_callback' => '__return_true',
			]);
		}


		function format_price(WP_REST_Request $req)
		{
			return wc_price($req->get_param('price'));
		}



		public function contactForm(WP_REST_Request $request)
		{

			$formData = $request->get_params();

			$new_post_ID = wp_insert_post([
				'post_type' => 'contact_form',
				'post_title' => $formData['phone'] . "  (فرم تماس با ما)  ",
				'post_content' => "نام و نام خانوادگی: $formData[name] <br> شماره تلفن: $formData[phone] <br> ایمیل: $formData[email] <br> موضوع: $formData[subject] <br> پیام: $formData[message]",
				'post_status' => 'publish',
			]);


			if ($new_post_ID === 0 || is_wp_error($new_post_ID)) {
				wp_send_json_error(['error' => 'not created'], 403);
			}

			$to = "auraaastyle@gmail.com"; // ایمیل شما
			$subject = "درخواست تماس با شما ثبت شد";
			$message = "<h2>اطلاعات درخواست تماس:</h2>\n\n" .
				"نام و نام خانوادگی: {$formData['name']}\n" .
				"ایمیل: {$formData['email']}\n" .
				"تلفن: {$formData['phone']}\n" .
				"موضوع: {$formData['subject']}\n" .
				"پیام: {$formData['message']}\n";
			$headers = ['Content-Type: text/html; charset=UTF-8'];

			wp_mail($to, $subject, nl2br($message), $headers);

			wp_send_json_success(['new_post' => $new_post_ID]);
		}
	}
}

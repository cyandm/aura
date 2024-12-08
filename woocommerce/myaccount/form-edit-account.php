<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account "
	  action=""
	  method="post"
	  <?php do_action( 'woocommerce_edit_account_form_tag' ); ?>>

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<h2 class="text-2xl font-bold">
		اطلاعات حساب کاربری
	</h2>

	<div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-4">
		<p class="">
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
				   for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span
					  class="text-red-600">*</span></label>
			<input type="text"
				   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				   name="account_first_name"
				   id="account_first_name"
				   autocomplete="given-name"
				   value="<?php echo esc_attr( $user->first_name ); ?>" />
		</p>
		<p class="">
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
				   for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span
					  class="text-red-600">*</span></label>
			<input type="text"
				   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				   name="account_last_name"
				   id="account_last_name"
				   autocomplete="family-name"
				   value="<?php echo esc_attr( $user->last_name ); ?>" />
		</p>

		<p class="">
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
				   for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span
					  class="text-red-600">*</span></label>
			<input type="text"
				   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				   name="account_display_name"
				   id="account_display_name"
				   value="<?php echo esc_attr( $user->display_name ); ?>" />
			<span
				  class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></span>
		</p>


		<p class="">
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
				   for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span
					  class="text-red-600">*</span></label>
			<input type="email"
				   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				   name="account_email"
				   id="account_email"
				   autocomplete="email"
				   value="<?php echo esc_attr( $user->user_email ); ?>" />
		</p>
	</div>



	<?php
	/**
	 * Hook where additional fields should be rendered.
	 *
	 * @since 8.7.0
	 */
	do_action( 'woocommerce_edit_account_form_fields' );
	?>

	<fieldset>
		<legend class="text-2xl font-bold"><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>

		<div class="py-4 grid gap-4">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
					   for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="text"
					   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					   name="password_current"
					   id="password_current"
					   autocomplete="off" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
					   for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="text"
					   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					   name="password_1"
					   id="password_1"
					   autocomplete="off" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
					   for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
				<input type="text"
					   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					   name="password_2"
					   id="password_2"
					   autocomplete="off" />
			</p>
		</div>
	</fieldset>

	<?php
	/**
	 * My Account edit account form.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_edit_account_form' );
	?>

	<p class="flex justify-end">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit"
				class="primary-btn small-btn max-md:w-full"
				name="save_account_details"
				value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">
			<?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden"
			   name="action"
			   value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
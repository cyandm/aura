<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<form method="post">

		<h3 class="text-2xl font-bold">
			<?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?>
		</h3>
		<?php // @codingStandardsIgnoreLine ?>

		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper my-4 grid gap-4 grid-cols-1 md:grid-cols-2">
				<?php foreach ( $address as $key => $field ) : ?>

					<?php if ( $field['type'] === 'state' ) : ?>
						<div
							 class="[&_label]:block [&_label]:mb-2 [&_label]:!text-sm [&_label]:font-medium [&_label]:text-gray-900 [&_.select2-selection--single]:p-1.5 [&_.select2-selection--single]:!h-auto [&_.select2-selection--single]:bg-gray-50 [&_.select2-selection--single]:border [&_.select2-selection--single]:border-gray-300 [&_.select2-selection--single]:text-gray-900 [&_.select2-selection--single]:text-sm [&_.select2-selection--single]:rounded-lg ">
							<?php woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) ); ?>
						</div>

					<?php else : ?>

						<div class="">
							<label for="<?php echo $key ?>"
								   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><?php echo $field['label'] ?>
								<?php if ( $field['required'] ) : ?>
									<span class="text-red-600">*</span>
								<?php endif; ?>
							</label>
							<input type="<?php echo $field['type'] ?>"
								   id="<?php echo $key ?>"
								   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
								   autocomplete="<?php echo $field['autocomplete'] ?>"
								   placeholder="<?php echo $field['label'] ?>"
								   value="<?php echo $field['type'] === 'country' ? 'ایران' : $field['value'] ?>"
								   <?php echo $field['type'] === 'country' ? 'disabled' : '' ?>
					   			<?php echo $field['required'] ? 'required' : '' ?>/>
						</div>

					<?php endif; ?>

				<?php endforeach; ?>
			</div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p class="flex justify-end">
				<button type="submit"
						class="primary-btn small-btn max-md:w-full"
						name="save_address"
						value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>">
					<?php esc_html_e( 'Save address', 'woocommerce' ); ?>
				</button>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
				<input type="hidden"
					   name="action"
					   value="edit_address" />
			</p>
		</div>

	</form>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
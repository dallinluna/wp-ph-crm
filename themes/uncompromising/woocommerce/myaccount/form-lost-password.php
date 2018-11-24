<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="mb-3">
	<a href="/my-account" class="btn btn-primary"><i class="fal fa-angle-left"></i> Back to Profile</a>
</div>

<?php

wc_print_notices(); ?>

<div class="card">
	<div class="card-block">

		<form method="post" class="woocommerce-ResetPassword lost_reset_password">

			<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>

			<div class="row">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row-first form-group col-lg-6">
					<label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label>
					<input class="form-control woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" />
				</p>
			</div>

			<div class="clear"></div>

			<?php do_action( 'woocommerce_lostpassword_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<input type="hidden" name="wc_reset_password" value="true" />
				<input type="submit" class="btn btn-primary btn-lg mt-3" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>" />
			</p>

			<?php wp_nonce_field( 'lost_password' ); ?>

		</form>

	</div>
</div>

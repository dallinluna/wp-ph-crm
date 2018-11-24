<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="card">
	<div class="card-block-list">
		<div class="list">
			<div class="item">
				<div class="avatar avatar-lg">
					<i class="fal fa-user"></i>
				</div>
				<div class="item-inner">
					<div class="input-wrapper">
						<div class="item-label">
							<h2><?php
								/* translators: 1: user display name 2: logout url */
								printf(
									__( '%1$s', 'woocommerce' ),esc_html( $current_user->display_name )
								);
							?></h2>
							<p>
								<?php
									/* translators: 1: user display name 2: logout url */
									printf(
										__( 'not %1$s? <a href="%2$s">Log out</a>', 'woocommerce' ),
										esc_html( $current_user->display_name ), wp_logout_url()
									);
								?>
							</p>
						</div>
					</div>
				</div>
				<a class="item-end btn btn-primary" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fal fa-shopping-cart"></i> (<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>)</a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">

		<?php do_action( 'woocommerce_account_navigation' ); ?>
	
	</div>
	
	<div class="col-lg-8">

		<div class="card">
			<div class="card-block">

				<?php
				if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
					<div class="widget-column footer-widget-2">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div>
				<?php } ?>

				<p><small><?php
					printf(
						__( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a> and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ),
						esc_url( wc_get_endpoint_url( 'orders' ) ),
						esc_url( wc_get_endpoint_url( 'edit-address' ) ),
						esc_url( wc_get_endpoint_url( 'edit-account' ) )
					);
				?></small></p>

				<?php
					/**
					* My Account dashboard.
					*
					* @since 2.6.0
					*/
					do_action( 'woocommerce_account_dashboard' );

					/**
					* Deprecated woocommerce_before_my_account action.
					*
					* @deprecated 2.6.0
					*/
					do_action( 'woocommerce_before_my_account' );

					/**
					* Deprecated woocommerce_after_my_account action.
					*
					* @deprecated 2.6.0
					*/
					do_action( 'woocommerce_after_my_account' );
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

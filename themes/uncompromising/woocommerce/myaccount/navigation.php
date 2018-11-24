<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php do_action( 'woocommerce_before_account_navigation' ); ?>

<nav class="woocommerce-MyAccount-navigation">
	<div class="card">
		<div class="card-block-list">
			<h4 class="font-bold text-uppercase m-3">Account Links</h4>
			<div class="list">
				<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
					<a class="item clickable clickable-bg" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
						<div class="item-inner">
							<div class="input-wrapper">
								<div class="item-label">
									<h2 class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> mb-0">
										<?php echo esc_html( $label ); ?>
									</h2>
								</div>
							</div>
						</div>
						<div class="item-end item-end-caret"><i class="fal fa-angle-right"></i></div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>

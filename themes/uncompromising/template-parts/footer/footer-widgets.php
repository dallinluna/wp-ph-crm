<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'footer-1' ) ||
	 is_active_sidebar( 'footer-2' ) ||
	 is_active_sidebar( 'footer-3' )
	) :
?>

	<aside class="widget-area" role="complementary">
		<div class="row">
			<div class="col-lg-4">
				<?php
				if ( is_active_sidebar( 'footer-1' ) ) { ?>
					<div class="widget-column footer-widget-1">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-lg-4">
				<?php
				if ( is_active_sidebar( 'footer-2' ) ) { ?>
					<div class="widget-column footer-widget-2">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-lg-4">
				<?php
				if ( is_active_sidebar( 'footer-3' ) ) { ?>
					<div class="widget-column footer-widget-2">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</aside><!-- .widget-area -->

<?php endif; ?>

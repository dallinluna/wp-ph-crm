<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'sidebar-4' )  ) :
?>

	<aside class="widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'footer-cta' ) ) { ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'footer-cta' ); ?>
			</div>
		<?php } ?>
		
	</aside><!-- .widget-area -->

<?php endif; ?>

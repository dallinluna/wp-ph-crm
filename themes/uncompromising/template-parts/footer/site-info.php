<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<a href="<?php echo esc_url( __( 'https://www.productheartbeat.com/', 'uncompromising' ) ); ?>"><?php printf( __( '&copy; 2017 Product Heartbeat', 'uncompromising' ), 'WordPress' ); ?></a>
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'uncompromising' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . uncompromising_get_svg( array( 'icon' => 'chain' ) ),
				) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>
</div><!-- .site-info -->

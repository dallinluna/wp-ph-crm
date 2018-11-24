<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
 * @since 1.0
 * @version 1.0
 */

?>

</div><!-- .usd-body -->

<footer id="colophon" class="site-footer usd-footer" role="contentinfo">
	<section id="footer-widgets" class="bg-white">
		<div id="footer-container" class="container-fluid">
			<div id="footer-animated" class="animated fadeIn">
				<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
			</div><!--footer-animated -->
		</div><!-- #footer-container -->
	</section><!-- #footer-widgets -->		
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>

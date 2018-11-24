<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Product Heartbeat
 * @subpackage Uncompromising
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php //uncompromising_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			/*wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'uncompromising' ),
				'after'  => '</div>',
			) );*/
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
